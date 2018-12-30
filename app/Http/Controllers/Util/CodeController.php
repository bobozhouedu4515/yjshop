<?php

    namespace App\Http\Controllers\Util;

    use App\Notifications\UserNotification;
    use App\User;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Qcloud\Sms\SmsSingleSender;

    class CodeController extends Controller
    {
        public function send ()
        {
            $account = \request () -> only ('account');
            $appid = 1400171400; // 1400开头

// 短信应用SDK AppKey
            $appkey = "39a220012d9ca25cfddbde311f52c259";
// 短信模板ID，需要在短信应用中申请
            $templateId = 251815;  // NOTE: 这里的模板ID`7839`只是一个示例，真实的模板ID需要在短信控制台中申请

            $smsSign = '周波个人学习分享'; // NOTE: 这里的签名只是示例，请使用真实的已申请的签名，签名参数使用的是`签名内容`，而不是`签名ID`
            $preg_email = '/^\w+@\w+\.\w+$/';
            $preg_pho = '/[0-9]{11}/';
            $code = $this -> makeCode ();
            //如果匹配到的是邮箱
            if (preg_match ($preg_email, $account[ 'account' ])) {
                $user = User ::firstOrNew ([ 'email' => $account[ 'account' ] ]);
                $user -> notify (new UserNotification($code));
                if ($user) {
//                \Cache ::put ('code', $code, 1);
                    session ()->put ('code',$code);
                    return [ 'code' => 1, 'msg' => '发送成功' ];
                } else {
                    return [ 'code' => 0, 'msg' => '服务器繁忙' ];
                }
            } else {
//                dd (1);
                // 需要发送短信的手机号码
                $phoneNumbers = $account['account'];
                //发送手机短信
                try {
                    $ssender = new SmsSingleSender($appid, $appkey);
                    $params = [$code];
                    $result = $ssender -> sendWithParam ("86", $phoneNumbers, $templateId,
                        $params, $smsSign, "", "");  // 签名参数未提供或者为空时，会使用默认签名发送短信
                    $rsp = json_decode ($result);
                    session ()->put ('code',$code);
                    return [ 'code' => 1, 'msg' => '发送成功' ];

                } catch (\Exception $e) {
                    echo var_dump ($e);
                }
            }

            //成功后的提示



        }
        //随机验证码
        public function makeCode ()
        {
            $code = '';
            for ($i = 0; $i < 4; $i ++) {
                $code .= mt_rand (0, 9);
            }
            return $code;
        }
    }
