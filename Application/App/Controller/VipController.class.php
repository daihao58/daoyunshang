<?php
// 本类由系统自动生成，仅供测试用途
namespace App\Controller;
use Think\Model;

class VipController extends BaseController
{
    public function _initialize()
    {
        //你可以在此覆盖父类方法
        parent::_initialize();
    }


  // 每日返现
    public function cashback(){
        
        $vipid = self::$WAP['vipid'];
        $cashback = D('Cashback')->getList(array('vip_id' => $vipid));

        $time = strtotime(date("Y-m-d"));//当前时间
        foreach ($cashback as $key => $value) {
            //计算据上次发钱相隔时间
            $lasttime = $value["lasttime"];
            $num = ($time - $lasttime)/(24*60*60);
            $totalnum = ($value["money"]/$value["dayback"])-$value["backday"];

            if($num >= $totalnum){

                //一次性返给用户所有money
                $map["id"] = $value["vip_id"];
                $User = M("Vip"); // 实例化User对象
                $User->where($map)->setInc('money',$value["dayback"]*$totalnum); // 用户的money增加

                // 插入返现记录表，更改状态返现完成
                $map["id"] = $value["id"];
                $data["status"] = "1";
                $data["lasttime"] = $time;
                $data["backday"] = $value["money"]/$value["dayback"];
                $result = D('Cashback')->edit($map,$data);

            }else{
                //每日用户money增加
                $map["id"] = $value["vip_id"];
                $User = M("Vip"); // 实例化User对象
                $User->where($map)->setInc('money',$value["dayback"]*$num); // 用户的money增加

                //每日用户返现次数增加
                $map2["id"] = $value["id"];
                $data2["lasttime"] = $time;
                $data2["backday"] = $value["backday"]+$num;
                $result = D('Cashback')->edit($map2,$data2);

            }

        }

    }  

    public function index()
    {
        // $this->cashback();
        $vipid = self::$WAP['vipid'];
        $data = self::$WAP['vip'];
        //var_dump($data);die;
        if(empty($data['mobile']) || $data['mobile']=='15295121323' ){
            $this->redirect('App/vip/login');exit;
        }else{
            $backurl = base64_encode(U('App/Vip/index'));
            $this->checkLogin($backurl);

            //判断签到状态
            $d1 = date('Y-m-d', time());
            $d2 = date('Y-m-d', $data['signtime']);
            $data['issign'] = ($d1 == $d2) ? 1 : 0;
            //计算未读消息
            $msglist = M('vip_message')->select();
            $msg_pids = '';
            foreach ($msglist as $k => $v) {
                if ($v['pids'] == '') {
                    $msg_pids = $msg_pids . ',' . $v['id'];
                } else {
                    if (in_array($vipid, explode(',', $v['pids']))) {
                        $msg_pids = $msg_pids . ',' . $v['id'];
                    }
                }
            }
            if ($msg_pids) {
                $map['id'] = array('in', in_parse_str($msg_pids));
                $msg = M('vip_message')->where($map)->select();
                $msgread = M('vip_log')->where('vipid=' . $vipid . ' and type=5')->select();
                $data['unread'] = count($msg) - count($msgread);
            } else {
                $data['unread'] = 0;
            }
            //加上今天返现后的money
            $vip = M('Vip')->where(array('id' => $vipid))->find();
            $data['money'] = $vip['money'];
            //计算未使用卡券
            $today = strtotime(date('Y-m-d'));
            $map_card['etime'] = array('EGT', $today);
            $map_card['vipid'] = $vipid;
            $map_card['status'] = 1;
            $data['cardnum'] = M('vip_card')->where($map_card)->count();

            if($data['fx_level']){
                $res_name=M('VipLevel')->where("id= {$data['fx_level']}")->getField('name');
                if($res_name){
                    $data['fxname']=$res_name;
                }else{
                    $data['fxname']='普通会员';
                }
            }else{
                $data['fxname']='普通会员';
            }


            $father = M('Vip')->where('id=' . self::$WAP['vip']['pid'])->find();
            if ($father) {
                $this->assign('showfather', 1);
                $this->assign('father', $father);
            }

            $service_tel = '';
            $vip = M('Vip')->where(array('id' =>$vipid))->find();
            if(!empty($vip['employee'])){
                $employee = M('Employee')->where(array('id' => $vip['employee']))->find();
                if(!empty($employee['mobile'])){
                    $service_tel= $employee['mobile'];
                }else{
                    $service_tel='051988980188';
                }
            }else{
                $service_tel='051988980188';
            }
            $this->assign('service_tel', $service_tel);

            $this->assign('data', $data);
            $this->assign('actname', 'ftvip');
            $this->assign('isqiandao', $_SESSION['WAP']['vipset']['isqiandao']);
            $this->assign('ispaihang', $_SESSION['WAP']['vipset']['ispaihang']);
            $this->assign('shopid', session("shop_id"));

            $moren_tb='wode';
            $this->assign('moren_tb', $moren_tb);

            $this->display();
        }


    }

    public function sign()
    {
        $backurl = base64_encode(U('App/Vip/index'));
        $this->checkLogin($backurl);
        $vipid = self::$WAP['vipid'];

        $sign_score = explode(',', self::$WAP['vipset']['sign_score']);
        $sign_exp = explode(',', self::$WAP['vipset']['sign_exp']);
        $vip = self::$WAP['vip'];
        $d1 = date_create(date('Y-m-d', $vip['signtime']));
        $d2 = date_create(date('Y-m-d', time()));
        $diff = date_diff($d1, $d2);
        $late = $diff->format("%a");
        //判断是否签到过
        if ($late < 1) {
            $info['status'] = 0;
            $info['msg'] = "您今日已经签过到了！";
            $this->ajaxReturn($info);
        }
        //正常签到累计流程
        if ($late >= 1 && $late < 2) {
            $vip['sign'] = $vip['sign'] ? $vip['sign'] : 0; //防止空值

            $data_vip['sign'] = $vip['sign'] + 1; //签到次数+1
            //积分
            if ($data_vip['sign'] >= count($sign_score)) {
                $score = $sign_score[count($sign_score) - 1];
            } else {
                $score = $sign_score[$data_vip['sign']];
            }
            //经验
            if ($data_vip['sign'] >= count($sign_exp)) {
                $exp = $sign_exp[count($sign_exp) - 1];
            } else {
                $exp = $sign_exp[$data_vip['sign']];
            }
        } else {
            $data_vip['sign'] = 0; //签到次数置零
            $score = $sign_score[0];
            $exp = $sign_exp[0];
        }
        $data_vip['score'] = array('exp', 'score+' . $score);
        $data_vip['exp'] = array('exp', 'exp+' . $exp);
        $data_vip['signtime'] = time();
        $data_vip['cur_exp'] = array('exp', 'cur_exp+' . $exp);
        $level = $this->getlevel(self::$WAP['vip']['cur_exp'] + $exp);
        $data_vip['levelid'] = $level['levelid'];
        $m = M('Vip');
        $r = $m->where(array('id' => $vipid))->save($data_vip);

        if ($r) {
            //增加签到日志
            $data_log['ip'] = get_client_ip();
            $data_log['vipid'] = $vipid;
            $data_log['event'] = '会员签到-连续' . $data_vip['sign'] . '天';
            $data_log['score'] = $score;
            $data_log['exp'] = $exp;
            $data_log['type'] = 2;
            $data_log['ctime'] = time();
            M('vip_log')->add($data_log);
            $info['status'] = 1;
            $info['msg'] = "签到成功！";
            $data_log['levelname'] = $level['levelname'];
            $info['data'] = $data_log;
        } else {
            $info['status'] = 0;
            $info['msg'] = "签到失败！" . $r;
        }
        $this->ajaxReturn($info);
    }



    private function getCardNoPwd()
    {
        $dict_no = "0123456789";
        $length_no = 10;
        $dict_pwd = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $length_pwd = 10;
        $card['no'] = "";
        $card['pwd'] = "";
        for ($i = 0; $i < $length_no; $i++) {
            $card['no'] .= $dict_no[rand(0, (strlen($dict_no) - 1))];
        }
        for ($i = 0; $i < $length_pwd; $i++) {
            $card['pwd'] .= $dict_pwd[rand(0, (strlen($dict_pwd) - 1))];
        }
        return $card;
    }

    //发送短信
    public function sendmsg(){
        $phone=$_POST['phone'];
        $gettype=$_POST['gettype'];

        $sms_templateM=M('sms_template');
        $code=rand(100000,999999);
        $yanzhengxinxi=$sms_templateM->where("type={$gettype}")->field('id,content,active_time')->find();
        $yanzhengcontent=str_replace('[code]',$code,$yanzhengxinxi['content']);


        $http='http://message.4008289828.com/index.php?g=Message&m=Index&a=createSendNews_interface';
        $para['app_id']=10;
        $para['content']=$yanzhengcontent;
        $para['type']=1;
        $para['usage']=1;
        $para['mobiles']=$phone;
        $o = "";
        foreach ( $para as $k => $v )
        {
            $o.= "$k=" . urlencode( $v ). "&" ;
        }
        $para = substr($o,0,-1);

        $sms_info_json=$this->request_post($http,$para);

        //var_dump($sms_info_json);die;
        if($sms_info_json['status']==0){
            $sms_phone=M('sms_phone');
            $data['phone'] = $phone;
            $data['content'] = $yanzhengcontent;
            $data['create_time'] = date("Y-m-d H:i:s");
            $mm=5*60;
            $data['dead_time']=date("Y-m-d H:i:s",strtotime($data['create_time'])+$mm);
            $data['smstempid'] = 1;
            $data['code'] = $code;
            $res=$sms_phone->add($data);
            if($res){
                $result['id']=$res;
                $result['state_code']=1;
                $result['msg']='发送成功';
                $this->ajaxReturn($result);
            }
        }else{
            $result['state_code']=2;
            $result['msg']='发送失败';
            $this->ajaxReturn($result);
        }
    }

    public function request_post($url = '', $post_data = array()) {
        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_URL,$url);//抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        $data = curl_exec($ch);//运行curl
        curl_close($ch);
        return $data;
    }


    public function ewm(){
        $this->assign('ercode',$_GET['ercode']);
        $this->display();
    }

    public function retrieve(){
        $this->display();
    }

    public function retrieve_ajax(){
        $phone = $_POST['phone'];
        $code = $_POST['code'];

        $sms_phone=M('sms_phone');
        $where['phone'] = $phone;
        $where['_string'] = 'dead_time > now()' ;
        $yzm_code=$sms_phone->field('code')->where($where)->order("create_time desc")->find()['code'];

        if($code == $yzm_code){
            $res=M('vip')->where("mobile= {$phone}")->select();
            if(!$res){
                $result['state_code']=2;
                $result['msg']='该用户不存在';
                $this->ajaxReturn($result);
            }else{

                $result['state_code']=1;
                $result['msg']='找回成功';
                $this->ajaxReturn($result);
            }
        }else{
            $result['state_code']=2;
            $result['msg']='验证码错误';
            $this->ajaxReturn($result);
        }
    }

    public function editpwd(){
        $phone=$_GET['phone'];

        $this->assign('phone',$phone);
        $this->display();
    }

    public function editpwd_ajax(){
        $phone=$_POST['phone'];
        $password=$_POST['password'];
        $ppassword=$_POST['ppassword'];
        if($password != $ppassword){
            $result['state_code']=2;
            $result['msg']='两次密码不一致';
            $this->ajaxReturn($result);
        }else{
            $data['password']=md5($password);
            $map['mobile']=$phone;
            $res=M('Vip')->where($map)->save($data);
            if($res){
                $result['state_code']=1;
                $result['msg']='密码设置成功';
                $this->ajaxReturn($result);
            }else{
                $result['state_code']=2;
                $result['msg']='密码设置失败';
                $this->ajaxReturn($result);
            }
        }
    }

    public function reset(){
        $phone=$_GET['phone'];
        $this->assign('phone',$phone);
        $this->display();
    }

    public function reset_ajax(){
        $phone=$_POST['phone'];
        $password=$_POST['password'];
        $ppassword=$_POST['ppassword'];
        if($password != $ppassword){
            $result['state_code']=2;
            $result['msg']='两次密码不一致';
            $this->ajaxReturn($result);
        }else{
            $data['password']=md5($password);
            $map['mobile']=$phone;
            $res=M('Vip')->where($map)->save($data);
            if($res){
                $result['state_code']=1;
                $result['msg']='密码设置成功';
                $this->ajaxReturn($result);
            }else{
                $result['state_code']=2;
                $result['msg']='密码设置失败';
                $this->ajaxReturn($result);
            }
        }

    }

    public function reg(){
        $tui_code=$_GET['tui_code'];
        $this->assign('tui_code',$tui_code);
        $this->display();
    }

    public function regist(){
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $code_id = $_POST['code_id'];
        $recommend_code = $_POST['recommend_code'];
        $code = $_POST['code'];
        $sms_phone=M('sms_phone');
        $where['phone'] = $phone;

//            $where['true_name'] = $true_name;
        $where['_string'] = 'dead_time > now()' ;
        $yzm_code=$sms_phone->field('code')->where($where)->order("create_time desc")->find()['code'];

//var_dump($yzm_code);die;
        if($code == $yzm_code){
            if(M('vip')->where("mobile= {$phone}")->select()){
                $result['state_code']=2;
                $result['msg']='该手机已经注册';
                $this->ajaxReturn($result);
            }else{
                $mvip=M('Vip');
                $data['mobile'] = $phone;
                $data['nickname'] = $phone;
                $data['password'] = md5($password);
                $data['headimgurl'] = '/Public/Common/img/moren.jpg';
                $data['recommend_code'] = $recommend_code;
                $data['ctime'] = date("Y-m-d H:i:s");
                $puser= M('Vip')->where("my_recommend_code = '{$recommend_code}'")->find();
                if($puser){
                    $data['pid']=$puser['id'];
                    $data['plv']=$puser['plv']+1;
                    $data['path']=$puser['path'].'-'.$puser['id'];
                    if($recommend_code == 'df00001'){
                        $head_code='df';
                    }elseif($recommend_code == 'df00002'){
                        $head_code='llq';
                        $data['fx_level'] = '2';
                        $data['score'] = '3000';
                        $data['exp'] = '3000';
                        $data['cur_exp'] = '3000';
                        $data['levelid'] = '2';
                    }else{
                        $head_code='';
                    }
                    $data['my_recommend_code'] =$head_code.$this->getRandomString(6);
                    $data['ctime']=date('Y-m-d H:i:s');
                    $res=$mvip->add($data);
                    if($res){
                        $result['state_code']=1;
                        $result['msg']='注册成功';
                        $this->ajaxReturn($result);
                    }else{
                        $result['state_code']=2;
                        $result['msg']='注册失败';
                        $this->ajaxReturn($result);
                    }
                }else{
                    $result['state_code']=2;
                    $result['msg']='该推荐人不存在';
                    $this->ajaxReturn($result);
                }

            }
        }else{
            $result['state_code']=2;
            $result['msg']='验证码错误';
            $this->ajaxReturn($result);
        }
    }

    function getRandomString($len, $chars=null)
    {
        if (is_null($chars)) {
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        }
        mt_srand(10000000*(double)microtime());
        for ($i = 0, $str = '', $lc = strlen($chars)-1; $i < $len; $i++) {
            $str .= $chars[mt_rand(0, $lc)];
        }
        return $str;
    }

    public function login(){
        unset($_SESSION['sqopenid']);
        unset($_SESSION['WAP']['vip']);
        $this->display();
    }



    public function login_ajax(){
        $map['mobile'] = $_POST['mobile'];
        $map['password'] = md5($_POST['password']);

        $user_data=M('Vip')->where($map)->find();
        if($user_data){

            $_SESSION['sqmode']='wecha';
            $_SESSION['sqopenid']=$_POST['mobile'];
            if ($_SESSION['sqmode'] && $_SESSION['sqopenid']) {
                $openid = $_SESSION['sqopenid'];
                $vip = M('Vip')->where(array('mobile' => $openid))->find();

                /*if (!$vip) {
                    $this->redirect('App/Baseoa/index');
                }*/
                self::$WAP['vipid'] = $_SESSION['WAP']['vipid'] = $vip['id'];
                self::$WAP['vip'] = $_SESSION['WAP']['vip'] = $vip;


                //注销高级鉴权缓存
                unset($_SESSION['oappid']);
                unset($_SESSION['oaurl']);
            } else {
                session(null);
                $this->diemsg(0, '未正常获取会员数据，请尝试重新访问！');
            }


            $result['state_code']=1;
            $result['msg']='登录成功';
            $this->ajaxReturn($result);
        }else{
            $result['state_code']=2;
            $result['msg']='用户不存在或密码错误';
            $this->ajaxReturn($result);
        }

    }

    public function bingding(){
        $vipid = self::$WAP['vipid'];
        $data = self::$WAP['vip'];

        $map['mobile'] = $_POST['mobile'];
        $map['password'] = md5($_POST['password']);

        $user_data=M('Vip')->where($map)->find();
        $del_res=M('Vip')->delete($user_data['id']);
        //
        if($user_data && $del_res){
            $data['mobile']=$user_data['mobile'];
            $data['password']=$user_data['password'];
            $data['pid']=$user_data['pid'];
            $data['plv']=$user_data['plv'];
            $data['path']=$user_data['path'];
            $data['recommend_code']=$user_data['recommend_code'];
            if($user_data['recommend_code'] == 'df00001'){
                $head_code='df';
            }elseif($user_data['recommend_code'] == 'df00002'){
                $head_code='llq';
            }else{
                $head_code='';
            }
            if(empty($data['my_recommend_code'])){
                $data['my_recommend_code'] =$head_code.$this->getRandomString(6);
            }

            $res=M('Vip')->save($data);
            if($res){
                $result['state_code']=1;
                $result['msg']='登录成功';
                $this->ajaxReturn($result);
            }else{
                $result['state_code']=2;
                $result['msg']='登录失败';
                $this->ajaxReturn($result);
            }
        }else{
            $result['state_code']=2;
            $result['msg']='账号密码错误';
            $this->ajaxReturn($result);
        }
    }

    /*public function sendCode()
    {
        $m = M('vip_log');
        $post = I('get.');

        //已验证次数
        $counts = $m->where('mobile=' . $post['mobile'])->count();
        if ($counts >= self::$WAP['vipset']['ver_times']) {
            $info['status'] = 0;
            $info['msg'] = "超出验证次数！";
            $this->ajaxReturn($info);
        }
        $data_log['ip'] = get_client_ip();
        $post['code'] = rand(1000, 9999);
        $post['ctime'] = time();
        $post['event'] = "注册获取验证码";
        $post['type'] = 1;
        $r = $m->add($post);

        if ($r) {
            $info['status'] = 1;
            $info['msg'] = "验证码发送成功！";
            $info['times'] = self::$WAP['vipset']['ver_interval'] * 60;
            $_SESSION['mobile_tmp'] = $post['mobile'];
        } else {
            $info['status'] = 0;
            $info['msg'] = "发送失败！";
        }
        $this->ajaxReturn($info);
    }*/

   /* public function login()
    {
        if (IS_POST) {
            $m = M('vip');
            $post = I('post.');
            $r = $m->where("mobile='" . $post['mobile'] . "' and password='" . md5($post['password']) . "'")->find();
            if ($r) {
                //记录日志
                $data_log['ip'] = get_client_ip();
                $data_log['vipid'] = $r['id'];
                $data_log['ctime'] = time();
                $data_log['event'] = "会员登陆";
                $data_log['type'] = 3;
                M('vip_log')->add($data_log);
                //记录最后登陆
                $data_vip['cctime'] = time();
                $m->where('id=' . $r['id'])->save($data_vip);

                $info['status'] = 1;
                $info['msg'] = "登陆成功！";

                $_SESSION['WAP']['vipid'] = $r['id'];
                $_SESSION['WAP']['vip'] = $r;
            } else {
                $info['status'] = 0;
                $info['msg'] = "账号密码错误！";
            }
            $this->ajaxReturn($info);
        } else {
            $this->assign('mobile', I('mobile'));
            $this->assign('backurl', base64_decode(I('backurl')));
            $this->display();
        }
    }*/



    public function bill(){
        $vipid = self::$WAP['vipid'];
        $data = self::$WAP['vip'];
        //var_dump($vipid);die;

        $type = I('type') ? I('type') : 1;
        if($type == 1){
            $data_pay=M('Shop_order')->where("vipid = {$vipid}")->order("paytime desc")->select();
            $this->assign('cur',1);
        }

        if($type == 2){
            $data_pay=M('Rebate')->where("pid = {$vipid}")->order("time desc")->select();
            $this->assign('cur',2);
        }

        if($type == 3){
            $data_pay=M('Recharge_info')->where("mobile = {$data['mobile']}")->order("time desc")->select();
            $this->assign('cur',3);
        }

        $this->assign('data_pay',$data_pay);
        $this->display();
    }

    //我的下级
    public function tuiguang(){

        $my_recommend_code = self::$WAP['vip']['my_recommend_code'];

        $Model = new Model(); 
        $sql = "select a.nickname,a.exp,b.name as gradename from wfx_vip a left join wfx_vip_level";
        $sql .= " b on a.fx_level = b.id where a.recommend_code = '".my_recommend_code."' order by a.exp desc"; 
        var_dump($sql);
        exit;
             
        $user_list = $Model->query($sql);

        $this->assign('user_list',$user_list);
        $this->display();
    }

    //检测是否有未读站内信
    public function isReadMessage(){

        $vipid = self::$WAP['vipid'];

        $sql = "select a.id,a.pids,a.title,a.content,b.opid from wfx_vip_message a left join ";
        $sql .= "wfx_vip_log b on a.id = b.opid where a.pids like '%".$vipid."%' and b.opid is null"; 

        $Model = new Model(); 
        $message_list = $Model->query($sql);

        $data["status"]=0;
        if(count($message_list)>=0){
            $data["status"]=1;
        }
        $this->ajaxReturn($data);
    }


    public function feedback(){
        $this->display();
    }
    public function feedback_ajax(){
        $user = self::$WAP['vip'];
        $feedback=$_POST['feedback'];
        //var_dump($feedback);die;
        $data['uid'] = $user['id'];
        $data['name'] = $user['nickname'];
        $data['mobile'] = $user['mobile'];
        $data['content'] = $feedback;
        $res = M('Feedback')->add($data);
        if($res){
            $result['state_code']=1;
            $result['msg']='提交成功';
            $this->ajaxReturn($result);
        }else{
            $result['state_code']=2;
            $result['msg']='提交成功';
            $this->ajaxReturn($result);
        }
    }

    public function collection(){
        $user = self::$WAP['vip'];
        $data=M('Collection')->where("uid = {$user['id']}")->order('time desc')->select();

        foreach ($data as $k => $v) {
            $listpic = $this->getPic($v['img']);
            $data[$k]['imgurl'] = $listpic['imgurl'];
        }
        $this->assign('data',$data);
        $this->display();
    }

    public function quxiao(){
        $id=$_POST['id'];
        $res=M('Collection')->delete($id);
        if($res){
            $result['state_code']=1;
            $result['msg']='取消收藏';
            $this->ajaxReturn($result);
        }else{
            $result['state_code']=2;
            $result['msg']='取消失败';
            $this->ajaxReturn($result);
        }
    }

    public function agency(){
        $this->display();
    }

    public function agency_img_ajax(){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
        $upload->savePath  =     ''; // 设置附件上传（子）目录
        // 上传文件
        $info   =   $upload->upload();
        $this->ajaxReturn($info);
    }

    public function agency_ajax(){
        $user = self::$WAP['vip'];
        $aname=$_POST['aname'];
        $amobile=$_POST['amobile'];
        $savename=$_POST['savename'];
        $savepath=$_POST['savepath'];

        if($user['experience_hall']){
            if($amobile == $user['mobile']){
                $result['state_code']=2;
                $result['msg']='自己不能挂靠自己';
                $this->ajaxReturn($result);
            }else{
                $aid=M("Vip")->where("mobile = {$amobile}")->getField('id');
                if($aid){
                    $data['aid'] = $aid;
                    $data['aname'] = $aname;
                    $data['amobile'] = $amobile;
                    $data['img'] = '/Uploads/'.$savepath.$savename;
                    $data['bid'] = $user['id'];
                    $data['bname'] = $user['nickname'];
                    $data['time'] = date("Y-m-d H:s:i");
                    $data['status'] = 0;
                    $res=M('Anchored')->add($data);
                    if($res){
                        $result['state_code']=1;
                        $result['msg']='申请成功';
                        $this->ajaxReturn($result);
                    }else{
                        $result['state_code']=2;
                        $result['msg']='申请失败';
                        $this->ajaxReturn($result);
                    }
                }else{
                    $result['state_code']=2;
                    $result['msg']='此号码未注册';
                    $this->ajaxReturn($result);
                }
            }
        }else{
            $result['state_code']=2;
            $result['msg']='体验馆未开';
            $this->ajaxReturn($result);
        }



    }

    public function userinfo(){
        $data = self::$WAP['vip'];
        $this->assign('nickname',$data['nickname']);
        $this->assign('mobile',$data['mobile']);
        $this->assign('ercode',$data['my_recommend_code']);
        //var_dump($data);die;
        $this->display();
    }

    public function userinfo_ajax(){
        $user = self::$WAP['vip'];


        $savename=$_POST['savename'];
        $savepath=$_POST['savepath'];
        $data['nickname']=$_POST['nickname'];
        $data['headimgurl'] = '/Uploads/'.$savepath.$savename;

        $res=M('Vip')->where("id= {$user['id']}")->save($data);

        if($res){
            $result['state_code']=1;
            $result['msg']='修改成功';
            $this->ajaxReturn($result);
        }else{
            $result['state_code']=2;
            $result['msg']='修改失败';
            $this->ajaxReturn($result);
        }



    }

    public function logout()
    {
        session(null);
        $this->redirect('App/Vip/login');
    }

    public function message()
    {
        $backurl = base64_encode(U('App/Vip/message'));
        $this->checkLogin($backurl);
        $vipid = self::$WAP['vipid'];
        $m = M('vip_message');

        $msglist = $m->select();
        $msg_pids = '';
        foreach ($msglist as $k => $v) {
            if ($v['pids'] == '') {
                $msg_pids = $msg_pids . ',' . $v['id'];
            } else {
                if (in_array($vipid, explode(',', $v['pids']))) {
                    $msg_pids = $msg_pids . ',' . $v['id'];
                }
            }
        }
        $map['id'] = array('in', in_parse_str($msg_pids));
        $data = $m->where($map)->order('ctime desc')->select();
        foreach ($data as $k => $val) {
            $read = M('vip_log')->where('vipid=' . $vipid . ' and opid=' . $val['id'] . ' and type=5')->find();
            $data[$k]['read'] = $read ? 1 : 0;
        }
        $this->assign('data', $data);
        $this->assign('actname', 'ftvip');
        $this->display();
    }

    public function msgRead()
    {
        $backurl = base64_encode(U('App/Vip/message'));
        $this->checkLogin($backurl);
        $vipid = self::$WAP['vipid'];

        $m = M('vip_message');
        $id = I('id');

        $msgread = M('vip_log')->where('opid=' . $id . ' and vipid=' . $vipid)->find();

        if ($msgread) {
            $info['status'] = 0;
        } else {
            $data_log['ip'] = get_client_ip();
            $data_log['event'] = "会员浏览消息";
            $data_log['type'] = 5;
            $data_log['vipid'] = $vipid;
            $data_log['opid'] = $id;
            $data_log['ctime'] = time();
            M('vip_log')->add($data_log);
            $info['status'] = 1;
        }
        $data = $m->where('id=' . $id)->find();
        $info['data'] = $data;
        $this->ajaxReturn($info);
    }

    public function info()
    {
        $backurl = base64_encode(U('App/Vip/info'));
        $this->checkLogin($backurl);
        $vipid = self::$WAP['vipid'];

        if (IS_POST) {
            $m = M('vip');
            $post = I('post.');
            $r = $m->where("id=" . $vipid)->save($post);
            if ($r) {
                $info['status'] = 1;
                $info['msg'] = "资料修改成功！";
            } else {
                $info['status'] = 0;
                $info['msg'] = "资料修改失败！";
            }
            $this->ajaxReturn($info);
        } else {
            $data = self::$WAP['vip'];
            $this->assign('data', $data);
            $this->display();
        }
    }

    public function tx()
    {
        $backurl = base64_encode(U('App/Vip/tx'));
        $this->checkLogin($backurl);
        $vipid = self::$WAP['vipid'];

        if (IS_POST) {
            $m = M('vip');
            $post = I('post.');
            $r = $m->where("id=" . $vipid)->save($post);
            //dump($m->getLastSql());
            //die('ok');
            if ($r !== FALSE) {

                $this->success('提现资料修改成功！');
            } else {
                $this->error('提现资料修改失败！');
            }
        } else {
            $data = self::$WAP['vip'];
            $this->assign('data', $data);
            $this->display();
        }
    }

    public function txOrder()
    {
        $backurl = base64_encode(U('App/Vip/txOrder'));
        $this->checkLogin($backurl);
        $vipid = self::$WAP['vipid'];
        $m = M('vip');
        $vip = $m->where('id=' . $vipid)->find();
        $this->assign('vip', $vip);
        if (IS_POST) {

            $mtx = M('vip_tx');
            $mwxtx = M('vip_wxtx');
            $post = I('post.');
            if (!$post['txprice']) {
                $this->error('提现' . $_SESSION['SHOP']['set']['yjname'] . '不能为空！');
            }
            if ($post['txprice'] < self::$WAP['vipset']['tx_money']) {
                $this->error('提现' . $_SESSION['SHOP']['set']['yjname'] . '不得少于' . self::$WAP['vipset']['tx_money'] . '个！');
            }

            if ($post['txprice'] > $vip['money']) {
                $this->error('您的' . $_SESSION['SHOP']['set']['yjname'] . '不足！');
            }
            $vip['money'] = $vip['money'] - $post['txprice']*(1 + self::$WAP['vipset']['tx_fee']/100);
            $rvip = $m->save($vip);

            if (FALSE !== $rvip) {
                $post['vipid'] = $vipid;
                $post['txsqtime'] = time();
                $post['status'] = 1;
                if($post['type'] == 'wx'){
                    $wxtx["billno"] = $this->GenBillNo();
                    $wxtx["vip_id"] = $vipid;
                    $wxtx["txprice"] = $post['txprice'];
                    $wxtx["txname"] = $post['txname'];
                    $wxtx["txmobile"] = $post['txmobile'];
                    $wxtx["txcard"] = $vip['nickname'];
                    $wxtx["status"] = 0;
                    $wxtx["txtime"] = time();
                    $r = $mwxtx->add($wxtx);
                }else{
                    $r = $mtx->add($post);
                }
                if ($r) {
                    $data_msg['pids'] = $vipid;
                    $data_msg['title'] = "您的" . $post['txprice'] . $_SESSION['SHOP']['set']['yjname'] . "提现申请已成功提交！会在三个工作日内审核完毕并发放！";
                    $data_msg['content'] = "提现订单编号：" . $r . "<br><br>提现申请数量：" . $post['txprice'] . "<br><br>提现申请时间：" . date('Y-m-d H:i', time()) . "<br><br>提现申请将在三个工作日内审核完成，如有问题，请联系客服！";
                    $data_msg['ctime'] = time();
                    $rmsg = M('vip_message')->add($data_msg);

                    // 发送信息===============
                    $customer = M('Wx_customer')->where(array('type' => 'tx1'))->find();
                    $options['appid'] = self::$_wxappid;
                    $options['appsecret'] = self::$_wxappsecret;
                    $wx = new \Util\Wx\Wechat($options);
                    $msg = array();
                    $msg['touser'] = $vip['openid'];
                    $msg['msgtype'] = 'text';
                    $str = $customer['value'];
                    $msg['text'] = array('content' => $str);
                    $ree = $wx->sendCustomMessage($msg);
                    // 发送消息完成============

                    $this->success('提现申请成功！');
                } else {
                    $data_msg['pids'] = $vipid;
                    $data_msg['title'] = "您的" . $post['txprice'] . $_SESSION['SHOP']['set']['yjname'] . "提现申请已成功提交！会在三个工作日内审核完毕并发放！";
                    $data_msg['content'] = "提现订单编号：" . $r . "<br><br>提现申请数量：" . $post['txprice'] . "<br><br>提现申请时间：" . date('Y-m-d H:i', time()) . "<br><br>" . $_SESSION['SHOP']['set']['yjname'] . "余额已扣除，但未成功生成提现订单，凭此信息联系客服补偿损失！";
                    $data_msg['ctime'] = time();
                    $rmsg = M('vip_message')->add($data_msg);
                    $this->error($_SESSION['SHOP']['set']['yjname'] . '余额扣除成功，但未成功生成提现申请，请联系客服！');
                }
            } else {
                $this->error('提现申请失败！请重新尝试！');
            }

        } else {
            $data = self::$WAP['vip'];
            $this->assign('data', $data);
            $this->display();
        }
    }

    public function address()
    {
        $backurl = base64_encode(U('App/Vip/address'));
        $this->checkLogin($backurl);
        $vipid = self::$WAP['vipid'];
        $m = M('VipAddress');
        $data = $m->where('vipid=' . $vipid)->select();
        $this->assign('data', $data);
        $this->display();
    }

    public function addressSet()
    {
        $backurl = base64_encode(U('App/Vip/address'));
        $this->checkLogin($backurl);
        $vipid = self::$WAP['vipid'];
        $m = M('VipAddress');
        if (IS_POST) {
            $post = I('post.');
            $post['vipid'] = $vipid;
            $r = $post['id'] ? $m->save($post) : $m->add($post);
            if ($r) {
                $info['status'] = 1;
                $info['msg'] = "地址保存成功！";
            } else {
                $info['status'] = 0;
                $info['msg'] = "地址保存失败！";
            }
            $this->ajaxReturn($info);
        } else {
            $data['mobile'] = self::$WAP['vip']['mobile'];
            $data['name'] = self::$WAP['vip']['name'];
            if (I('id')) {
                $data = $m->where('id=' . I('id'))->find();
            }

            if($data['province']){
                $province = $data['province'];
                $city		= $data['city'];
                $area		= $data['area'];

                $provinceRs = M('City')->where("parent_id= 1")->select();
                $cityRs = M('City')->where("parent_id= '{$province}'")->select();
                $areaRs = M('City')->where("parent_id= '{$city}'")->select();

            }else{
                $provinceRs = M('City')->where("parent_id= 1")->select();
            }

            $this->assign('province',$province);
            $this->assign('provinceRs',$provinceRs);
            $this->assign('city',$city);
            $this->assign('cityRs',$cityRs);
            $this->assign('area',$area);
            $this->assign('areaRs',$areaRs);

            $this->assign('data', $data);
            $this->display();
        }
    }

    public function getCityByPid(){
        $pid=$_POST['pid'];
        $data=M('City')->where("parent_id= '{$pid}'")->select();
        //return $data;
        $this->ajaxReturn($data);
    }

    public function addressDel()
    {
        $backurl = base64_encode(U('App/Vip/address'));
        $this->checkLogin($backurl);
        $vipid = self::$WAP['vipid'];
        $m = M('VipAddress');
        if (IS_POST) {
            $r = $m->where('id=' . I('id') . ' and vipid=' . $vipid)->delete();
            if ($r) {
                $info['status'] = 1;
                $info['msg'] = "地址删除成功！";
            } else {
                $info['status'] = 0;
                $info['msg'] = "地址删除失败！";
            }
            $this->ajaxReturn($info);
        }
    }

    public function xqChoose()
    {
        $m = M('xq');
        if (IS_POST) {
            $post = I('post.');
            $post['vipid'] = $vipid;
            $post['xqgroupid'] = M('xq')->where('id=' . $post['xqid'])->getField('groupid');
            $r = $post['id'] ? $m->save($post) : $m->add($post);
            if ($r) {
                $info['status'] = 1;
                $info['msg'] = "地址保存成功！";
            } else {
                $info['status'] = 0;
                $info['msg'] = "地址保存失败！";
            }
            $this->ajaxReturn($info);
        } else {
            $data = $m->ORDER("convert(name USING gbk)")->select();
            foreach ($data as $k => $v) {
                $data[$k]['char'] = $this->getfirstchar($v['name']);
                if ($data[$k]['char'] == $data[$k - 1]['char']) {
                    $data[$k]['charshow'] = 0;
                } else {
                    $data[$k]['charshow'] = 1;
                }
            }
            if (I('addressid')) {
                $this->assign('addressid', I('addressid'));
            }
            $this->assign('data', $data);
            $this->display();
        }
    }

    //获取中文首字拼音字母
    public function getfirstchar($s0)
    {
        //手动添加未识别记录
        if (mb_substr($s0, 0, 1, 'utf-8') == "怡") {
            return "Y";
        }

        if (mb_substr($s0, 0, 1, 'utf-8') == "泗") {
            return "S";
        }

        $fchar = ord(substr($s0, 0, 1));
        if (($fchar >= ord("a") and $fchar <= ord("z")) or ($fchar >= ord("A") and $fchar <= ord("Z"))) {
            return strtoupper(chr($fchar));
        }

        $s = iconv("UTF-8", "GBK", $s0);
        $asc = ord($s{0}) * 256 + ord($s{1}) - 65536;
        //dump($s0.':'.$asc);
        if ($asc >= -20319 and $asc <= -20284) {
            return "A";
        }

        if ($asc >= -20283 and $asc <= -19776) {
            return "B";
        }

        if ($asc >= -19775 and $asc <= -19219) {
            return "C";
        }

        if ($asc >= -19218 and $asc <= -18711) {
            return "D";
        }

        if ($asc >= -18710 and $asc <= -18527) {
            return "E";
        }

        if ($asc >= -18526 and $asc <= -18240) {
            return "F";
        }

        if ($asc >= -18239 and $asc <= -17923) {
            return "G";
        }

        if ($asc >= -17922 and $asc <= -17418) {
            return "H";
        }

        if ($asc >= -17417 and $asc <= -16475) {
            return "J";
        }

        if ($asc >= -16474 and $asc <= -16213) {
            return "K";
        }

        if ($asc >= -16212 and $asc <= -15641) {
            return "L";
        }

        if ($asc >= -15640 and $asc <= -15166) {
            return "M";
        }

        if ($asc >= -15165 and $asc <= -14923) {
            return "N";
        }

        if ($asc >= -14922 and $asc <= -14915) {
            return "O";
        }

        if ($asc >= -14914 and $asc <= -14631) {
            return "P";
        }

        if ($asc >= -14630 and $asc <= -14150) {
            return "Q";
        }

        if ($asc >= -14149 and $asc <= -14091) {
            return "R";
        }

        if ($asc >= -14090 and $asc <= -13319) {
            return "S";
        }

        if ($asc >= -13318 and $asc <= -12839) {
            return "T";
        }

        if ($asc >= -12838 and $asc <= -12557) {
            return "W";
        }

        if ($asc >= -12556 and $asc <= -11848) {
            return "X";
        }

        if ($asc >= -11847 and $asc <= -11056) {
            return "Y";
        }

        if ($asc >= -11055 and $asc <= -10247) {
            return "Z";
        }

        return "?";
    }

    public function about()
    {
        $temp = M('Shop_set')->where('id='.session("shop_id"))->find();
        $this->assign('shop', $temp);
        $this->display();
    }

    public function intro()
    {
        $this->display();
    }

    public function cz()
    {
        $this->display();
    }

    public function zxczSet()
    {
        $backurl = base64_encode(U('App/Vip/cz'));
        $this->checkLogin($backurl);
        $vipid = self::$WAP['vipid'];
        $money = I('money');
        $type = I('type');
        //记录充值log，同时作为充值返回数据调用
        $data_log['ip'] = get_client_ip();
        $data_log['vipid'] = $vipid;
        $data_log['ctime'] = time();
        $data_log['event'] = "会员在线充值";
        $data_log['money'] = $money;
        $data_log['score'] = round($money * self::$WAP['vipset']['cz_score'] / 100);
        $data_log['exp'] = round($money * self::$WAP['vipset']['cz_exp'] / 100);
        $data_log['opid'] = date('Ymd') . substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
        $data_log['status'] = 1;
        $data_log['type'] = 7;
        $re = M('vip_log')->add($data_log);
        //跳转充值页面
        if ($re) {
            switch ($type) {
                case '1':
                    $this->redirect('App/Alipay/alipay', array('price' => $money, 'oid' => $data_log['opid']));
                    break;
                case '2':
                    $this->redirect('Home/Wxpay/pay', array('price' => $money, 'oid' => $data_log['opid']));
                    break;
                default:
                    $this->error('支付方式未知！');
                    break;
            }
        } else {
            $this->error('出错啦！');
        }

    }

    public function card()
    {
        $backurl = base64_encode(U('App/Vip/card'));
        $this->checkLogin($backurl);
        $vipid = self::$WAP['vipid'];
        $m = M('vip_card');
        $status = I('status') ? intval(I('status')) : 1;
        $map['status'] = $status;
        $today = strtotime(date('Y-m-d'));
        if ($status == 3) {
            $map['etime'] = array('LT', $today);
            $map['status'] = 1;
        } else if ($status == 1) {
            $map['etime'] = array('EGT', $today);
        }
        $map['vipid'] = $vipid;
        $map['type'] = 2; //代金券

        $data = $m->where($map)->select();

        $this->assign('data', $data);
        $this->assign('status', $status);
        $this->display();
    }

    public function addCard()
    {
        $backurl = base64_encode(U('App/Vip/card'));
        $this->checkLogin($backurl);
        $vipid = self::$WAP['vipid'];
        $m = M('VipCard');
        $map = I('post.');
//        $map['type'] = 2; //充值卡充值
        $card = $m->where($map)->find();
        if ($card) {
            if ($card['status'] == 0) {
                //未发卡
                $info['status'] = 0;
                $info['msg'] = '此卡尚未激活，请重试或联系管理员！';
            } else if ($card['status'] == 2) {
                //已使用
                $info['status'] = 0;
                $info['msg'] = '此卡已使用过了哦！';
            } else if ($card['status'] == 1) {
                //修改会员信息：账户金额、积分、经验、等级
                $data_vip['money'] = array('exp', 'money+' . $card['money']);
                $data_vip['score'] = array('exp', 'score+' . round($card['money'] * self::$WAP['vipset']['cz_score'] / 100));
                if (round($card['money'] * self::$WAP['vipset']['cz_exp'] / 100) > 0) {
                    $data_vip['exp'] = array('exp', 'exp+' . round($card['money'] * self::$WAP['vipset']['cz_exp'] / 100));
                    $data_vip['cur_exp'] = array('exp', 'cur_exp+' . round($card['money'] * self::$WAP['vipset']['cz_exp'] / 100));
                    $level = $this->getLevel(self::$WAP['vip']['cur_exp'] + round($card['money'] * self::$WAP['vipset']['cz_exp'] / 100));
                    $data_vip['levelid'] = $level['levelid'];
                }
                $re = M('vip')->where('id=' . $vipid)->save($data_vip);
                if ($re) {
                    //修改卡状态
                    $card['status'] = 2;
                    $card['vipid'] = $vipid;
                    $card['usetime'] = time();
                    $m->save($card);
                    //记录日志
                    $data_log['ip'] = get_client_ip();
                    $data_log['vipid'] = $vipid;
                    $data_log['ctime'] = time();
                    $data_log['event'] = "会员充值卡充值";
                    $data_log['money'] = $card['money'];
                    $data_log['score'] = round($card['money'] * self::$WAP['vipset']['cz_score'] / 100);
                    $data_log['exp'] = round($card['money'] * self::$WAP['vipset']['cz_exp'] / 100);
                    $data_log['opid'] = $card['id'];
                    $data_log['type'] = 6;
                    M('vip_log')->add($data_log);

                    $info['status'] = 1;
                    $info['msg'] = '充值成功！前往会员中心查看？';
                } else {
                    $info['status'] = 0;
                    $info['msg'] = '充值失败，请重试或联系管理员！';
                }
            } else {
                $info['status'] = 0;
                $info['msg'] = '此卡状态异常，请重试或联系管理员！';
            }
        } else {
            $info['status'] = 0;
            $info['msg'] = '卡号密码有误，请核对后重试！';
        }
        $this->ajaxReturn($info);
    }

    public function addVipCard()
    {
        $backurl = base64_encode(U('App/Vip/card'));
        $this->checkLogin($backurl);
        $vipid = self::$WAP['vipid'];
        $m = M('VipCard');
        $map = I('post.');
        $map['type'] = 2; //代金券
        $card = $m->where($map)->find();
        if ($card) {
            if ($card['status'] == 0) {
                $m->where(array("id"=>$card["id"]))->save(array("vipid"=>$vipid ,"status"=>1));
                $this->ajaxReturn(array("info"=>"充值成功"));
            }else{
                $this->ajaxReturn(array("info"=>"充值失败"));
            }
        }
        $this->ajaxReturn(array("info"=>"充值失败"));

    }
    //生在订单号
    public function GenBillNo(){
        $rnd_num = array('0','1','2','3','4','5','6','7','8','9');
        $rndstr = "";
        while(strlen($rndstr)<10){
            $rndstr .= $rnd_num[array_rand($rnd_num)];    
        }

        return $this->mchid.date("Ymd").$rndstr;
    }
    public function erweima(){
        //追入分享特效
        $options['appid'] = self::$_wxappid;
        $options['appsecret'] = self::$_wxappsecret;
        $wx = new \Util\Wx\Wechat($options);

        //生成JSSDK实例
        $opt['appid'] = self::$_wxappid;
        $opt['token'] = $wx->checkAuth();
        $opt['url'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

        $jssdk = new \Util\Wx\Jssdk($opt);
        $jsapi = $jssdk->getSignPackage();
        if (!$jsapi) {
            die('未正常获取数据！');
        }
        $this->assign('jsapi', $jsapi);
        $this->display();
    }
    public function guizefenxiang(){
        //追入分享特效
        $options['appid'] = self::$_wxappid;
        $options['appsecret'] = self::$_wxappsecret;
        $wx = new \Util\Wx\Wechat($options);

        //生成JSSDK实例
        $opt['appid'] = self::$_wxappid;
        $opt['token'] = $wx->checkAuth();
        $opt['url'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

        $jssdk = new \Util\Wx\Jssdk($opt);
        $jsapi = $jssdk->getSignPackage();
        if (!$jsapi) {
            die('未正常获取数据！');
        }
        $vipid = self::$WAP['vipid'];
        $this->assign('ppid',$vipid);
        $this->assign('jsapi', $jsapi);
        $this->display();
    }
}
