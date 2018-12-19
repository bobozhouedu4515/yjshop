<?php

    namespace App\Http\Controllers\Home;

    use App\User;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use function PHPSTORM_META\type;

    class UserController extends CommonController
    {
        public function register ()
        {
            //注册页面
            return view ('home.user.register');

        }

        public function registerStore ( User $user, Request $request )
        {
            //注册验证
            $this -> validate ($request, [
                'name' => 'required',
                'email' => 'email|required',
                'code' => [ 'required',
                    function ( $attribute, $value, $fail ) {
                        if (session ('code') != $value) {
                            $fail('验证码不正确');
                        }
                    }
                ],
                'password' => [
                    'required',
                    'confirmed',
                    //使用闭包对密码进行正则匹配验证
                    function ( $attribute, $value, $fail ) {
                        $preg = "/^\w{6,16}\$/";
                        if (!preg_match ($preg, $value)) {
                            $fail('密码太简单');
                        }
                    }
                ]
            ], [
                'name.required' => '昵称不能为空',
                'email.required' => '邮箱不能为空',
                'email.email' => '请输入正确邮箱',
                'password.required' => '请输入密码',
                'password.confirmed' => '两次输入密码不一致',
                'code.required' => '验证码不能为空'
            ]);
            //注册
            $data = \request () -> all ();
            $user -> name = $data[ 'name' ];
            $user -> password = bcrypt ($data[ 'password' ]);
            $user -> email = $data[ 'email' ];
            $user -> save ();
            return back () -> with ('success', '操作成功');
        }

        public function login ( User $user )
        {
            //登录页面
            return view ('home.user.login');
        }

        public function loginStore ( User $user, Request $request )
        {
            $this -> validate ($request, [
                'email' => 'required|email',
                'password' => 'required'
            ], [
                'email.required' => '密码不能为空',
                'email.email' => '邮箱格式不正确',
                'password.required' => '密码不能为空',
            ]);

            //登录验证
            $data = \request () -> only ('email', 'password');
            //使用web守卫验证用户登录,并查看是否点了自动登录
            if (!auth () -> attempt ($data, \request () -> only ('remember'))) {
                return back () -> with ('danger', '密码或者邮箱不正确');
            }
            //判断是否是from属性,有的话进行跳转
            if ($request -> query ('from')) {
                return redirect ($request -> query ('from')) -> with ('success', '登录成功');
            }
            //都不满足的话返回主页
            return redirect () -> route ('home.index') -> with ('success', '登录成功');
        }

        public function logout ()
        {
            //退出登录
            auth () -> logout ();
            return redirect () -> route ('home.index') -> with ('success', '安全退出');
        }

        public function resetPassword ()
        {
            //修改密码的页面
            return view ('home.user.reset_password');

        }

        public function resetPasswordStore ( User $user, Request $request )
        {
            $this -> validate ($request, [
                'email' => 'email|required',
                'password' => [
                    'required',
                    'confirmed',
                    //使用闭包对密码进行正则匹配验证
                    function ( $attribute, $value, $fail ) {
                        $preg = "/^\w{6,16}\$/";
                        if (!preg_match ($preg, $value)) {
                            $fail('密码太简单');
                        }
                    }
                ]
            ], [
                'email.required' => '邮箱不能为空',
                'email.email' => '请输入正确邮箱',
                'password.required' => '请输入密码',
                'password.confirmed' => '两次输入密码不一致',
            ]);
            //在users表找查找用户是否存在
            $is_exist = $user -> where ('email', \request ('email')) -> first ();
            //如果存在,那就对用户数据就行跟新
            if ($is_exist) {
                $is_exist -> update ();
                return back () -> with ('success', '修改成功');
            }
            //否则提示用户不存在
            return back () -> with ('danger', '邮箱没找到,请核对邮箱是否正确');

        }

        //个人中心
        public function userInfo ()
        {
            $id = \request () -> query ('id');
            $type = \request () -> query ('type') ?: 'info';
            return view ('home.user.user_' . $type);
        }

    }
