<?php

    namespace App\Http\Controllers\Home;

    use App\Models\Order;
    use App\User;
    use Illuminate\Cache\MemcachedStore;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use function PHPSTORM_META\type;
    require_once public_path ().'/'."org/Connect2.1/API/qqConnectAPI.php";

    class UserController extends CommonController
    {

        public function register ()
        {
            //注册页面
            \Cache::add('num','60',1);
            $num=\Cache::get ('num');
            \Cache::decrement ('num',1);
            return view ('home.user.register',compact ('num'));

        }

        public function registerStore ( User $user, Request $request )
        {
            $preg_email = '/^\w+@\w+\.\w+$/';
            //注册验证
            $this -> validate ($request, [
                'name' => 'required',
                'code' => [ 'required',
                    function ( $attribute, $value, $fail ) {

//               $code= \Cache::get ('code');
                        $code=session ()->get ('code');
//                        dd ($code);
                        if ($code!=$value) {
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
                ],
                'account' => 'required'
            ], [
                'name.required' => '昵称不能为空',
                'account.required' => '邮箱不能为空',
                'password.required' => '请输入密码',
                'password.confirmed' => '两次输入密码不一致',
                'code.required' => '验证码不能为空'
            ]);
            //注册
            $data = \request () -> all ();
            $user -> name = $data[ 'name' ];
            $user -> password = bcrypt ($data[ 'password' ]);
            if (preg_match ($preg_email, $data[ 'account' ])){
                $user -> email = $data[ 'account' ];
                $user->email_verified_at=now ();
            }else{
                $user->mobile=$data[ 'account' ];
                $user -> mobile_verified_at = now ();
            }
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
            $preg_email = '/^\w+@\w+\.\w+$/';
            $this -> validate ($request, [
                'account' => 'required',
                'password' => 'required'
            ], [
                'account.required' => '账号不能为空',
                'password.required' => '密码不能为空',
            ]);

            //登录验证
//            dd (11);
            $data = \request () -> only ('account', 'password');
            //使用web守卫验证用户登录,并查看是否点了自动登录
//            dd ($data);
            if (preg_match ($preg_email,$data['account'])){

                if (!auth () -> attempt (['email'=>$data['account'],'password'=>$data['password']], \request () -> only ('remember'))) {
                    return back () -> with ('danger', '密码或者账号不正确');
                }
            }else{
//                dd (1);
                if (!auth () -> attempt (['mobile'=>$data['account'],'password'=>$data['password']], \request () -> only ('remember'))) {
//                    dd (1);
                    return back () -> with ('danger', '密码或者账号不正确');
                }
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
        public function userInfo (User $user,Request $request)
        {
            //路由参数中的id
            $id =$user->id;
            if (auth ()->id ()==$id){
                $type = \request () -> query ('type') ?: 'info';
                return view ('home.user.user_' . $type);
            }
            return back ()->with ('danger','非法操作');

        }
        //确认收货
        public function receipt (Order $order)
        {
            if ($order->user_id==auth ()->id ()&&$order->status==4){
                $order->update (['status'=>5]);
                return back ()->with ('success','已收货');
            }else{
                return back ()->with ('danger','非法操作');
            }

        }
        //个人详细资料
        public function update (User $user,Request $request)
        {
            $user -> update ($request -> all ());
            return back () -> with ('success', '操作成功');


        }

        public function qqConnect ()
        {
            $qc = new \QC();
            $qc -> qq_login ();


        }

        public function qqlogin (Request $request)
        {

            $qc=new \QC();
            $token=$qc->qq_callback ();
            $openId=$qc->get_openid ();
            $qc=new \QC($token,$openId);
          $qquser= $qc->get_user_info();
//            dd ($qquser);
          $user=User::where('open_id',$openId)->first();
          if (!$user){
              $user=new User();
              $user->open_id=$openId;
              $user->username=$qquser['nickname'];
              $user->icon=$qquser['figureurl_1'];
              $user->name=$qquser['nickname'];
              $user->password='';
              $user->save ();
          }
          auth ()->login ($user);
            return redirect ('/');


        }

        public function isExist (Request $request)
        {
            $preg_email='/^\w+@\w+\.\w+$/';
            $preg_pho='/[0-9]{11}/';
            if (preg_match ($preg_email,$request->data)){
                $user= User::where('email',$request->data)->first();
                if ($user){
                    return ['code'=>0,'msg'=>'用户已经存在'];
                }
            }else{
                $user= User::where('mobile',$request->data)->first();
                if ($user){
                    return ['code'=>0,'msg'=>'用户已经存在'];
                }
            }
        }



    }
