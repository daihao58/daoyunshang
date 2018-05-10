<?php
// +----------------------------------------------------------------------
// | 用户后台基础类--CMS分组PUBLIC公共类
// +----------------------------------------------------------------------
namespace Multi\Controller;

use Think\Controller;

class LoginController extends Controller
{

    // 发送邮箱验证码
    public function emailsms(){
        
        Vendor('Swift.swift_required');

        $emailCode = rand_code(6);
        session("emailCode", $emailCode);
        $email = I("post.email");

        $transport=\Swift_SmtpTransport::newInstance("smtp.qq.com","465","ssl")
            ->setUsername("1604583867@qq.com")
            ->setPassword("owllesvpfjvujbjb");
        $mailer =\Swift_Mailer::newInstance($transport);
        $message=\Swift_Message::newInstance()
            ->setSubject("WeMall多用户商城注册验证码")
            ->setFrom(array("1604583867@qq.com"=>"WeMall"))
            ->setTo($email)
            ->setContentType("text/html")
            ->setBody('您好，您的验证码是' . $emailCode);
            // ->attach(\Swift_Attachment::fromPath('1.jpg', 'image/jpeg'));//发送附件
        $mailer->protocol='smtp';
        $result = $mailer->send($message);
        
        if ($result == 1) {
            $this->ajaxReturn('发送成功');
        } else {
            $this->ajaxReturn('发送失败');
        }  

    }

    //通用注册页面
    public function register()
    {
        if (IS_POST) {

            if (I("post.password") != I("post.password2")) {
                $this->error("密码不匹配");
            }

            //核对验证码
            if (I("post.smsVerify") != session("emailCode")) {
                $this->error("邮箱验证码无效");
            } 

            $data["username"] = I("post.username");
            $data["userpass"] = md5(I("post.password"));
            $data["email"] = I("post.email");
            $data["oath"] = 'sys,wx,vip,shop,order,log,withdraw,card,emp,tree,normal,addon,score,artical,';
            $user_id = D("User")->add($data);
            if ($user_id) {
                // $this->redirect("Multi/Public/login");
                $this->success("注册成功", U("Multi/Public/login"));
            } else {
                $this->error("注册失败");
            }
        } else {
            $arr = array();
            for ($i = 1; $i <= 8; $i++) {
                array_push($arr, $i);
            }
            $get = $arr[mt_rand(0, count($arr) - 1)];
            $wallpaper = __ROOT__ . "/Public/WallPage/" . $get . ".jpg";
            $this->assign("wallpaper", $wallpaper);
            $this->display();
        }
    }

    public function checkName()
    {
        $user = D("User")->get(array("username" => I("get.username")));
        if ($user) {
            echo "0";
        } else {
            echo "1";
        }
    }

    public function checkemail()
    {
        $email = D("User")->get(array("email" => I("post.email")));
        if ($email) {
            echo "0";
        } else {
            echo "1";
        }
    }

    public function forgetPassword()
    {
        if (IS_POST) {

            if (I("post.smsVerify") == session("emailCode")) {
                $user = D("User")->get(array("email" => I("post.email")));
                if ($user) {
                    session("smsVerifyUserId", $user["id"]);
                    $this->redirect("Multi/Login/resetPassword");
                } else {
                    $this->error("此邮箱未注册");
                }

            } else {
                $this->error("邮箱验证码无效");
            }

        } else {
            $arr = array();
            for ($i = 1; $i <= 8; $i++) {
                array_push($arr, $i);
            }
            $get = $arr[mt_rand(0, count($arr) - 1)];
            $wallpaper = __ROOT__ . "/Public/WallPage/bg_" . $get . ".jpg";
            $this->assign("wallpaper", $wallpaper);
            $this->display();
        }
    }

    public function resetPassword()
    {
        if (session("smsVerifyUserId")) {
            if (IS_POST) {
                if (!$this->check_verify(I("post.verify"))) {
                    $this->error("验证码错误");
                }

                if (I("post.password") != I("post.password2")) {
                    $this->error("密码不匹配");
                }
                $map["id"] = session("smsVerifyUserId");
                $data["userpass"] = md5(I("post.password"));
                D("User")->edit($map,$data);
                $this->error("重置成功", U("Multi/Public/login"));
            } else {
                $arr = array(4, 5, 7, 10, 11, 12);
                $get = $arr[mt_rand(0, count($arr) - 1)];
                $wallpaper = __ROOT__ . "/Public/WallPage/" . $get . ".jpg";
                $this->assign("wallpaper", $wallpaper);

                $this->display('', false);
            }
        } else {
            $this->error("非法操作", U("Multi/Public/login"));
        }
    }

    public function getVerify()
    {
        $config = array(
            "fontSize" => 30,    // 验证码字体大小
            "length" => 4,     // 验证码位数
            "useNoise" => true, // 关闭验证码杂点
            "useCurve" => false, // 关闭验证码杂点
            "codeSet" => "0123456789",
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }

    // 检测输入的验证码是否正确，$code为用户输入的验证码字符串
    public function check_verify($code, $id = "")
    {
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }















}