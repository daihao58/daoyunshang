<?php
// 验证管理的Controller App模块
namespace App\Controller;

class YanzhengController extends BaseController
{
    public function _initialize()
    {
        //你可以在此覆盖父类方法
        parent::_initialize();
    }

//    public function index()
//    {
//        echo "非法操作";
//        exit();
//    }
     public function yzphone(){
          if(IS_POST){
              $data['vipid']=I('vipid');
              if(empty($data['vipid'])){
                  $cc['res']=3;
                  $cc['msg']='不合法的参数名';
                  $this->ajaxReturn($cc);
                  exit;
              }
              $user=M('vip')->where('id='.$data['vipid'])->find();
              if(empty($user)){
                  $cc['res']=3;
                  $cc['msg']='不合法的参数名';
                  $this->ajaxReturn($cc);
                  exit;
              }
              if(empty($user['mobile'])){
                  $cc['res']=0;
              }else{
                  $cc['res']=1;
              }
              $this->ajaxreturn($cc);
          }
     }
     //发端信信息
   public function getSms(){
        if(IS_POST){

        $res = array();
            $phone = I('phone');
            $type= I('gettype')?I('gettype'):1;//1-注册;2-登录;3-修改密码;7验证短信
//        $data['client'] = I('client');//0-web,0-android,2-IOS,3-…
        //$api = new \Common\Common\Api();
        //  $result = json_decode($api->postMethod("user/SendSmsMsg",$data),true);
        if (empty($phone)) {
            $result["res"] = 0;
            $result["msg"] = '手机号码不能为空!';
            $this->ajaxReturn($result);
            exit;
        }

        //echo $type;exit;
        $sms_templateM=M('sms_template');
         $code=rand(1000,9999);
        $yanzhengxinxi=$sms_templateM->where('type='. $type)->field('id,content,active_time')->find();
        $yanzhengcontent=str_replace('[code]',$code,$yanzhengxinxi['content']);
        $yanzhengcontent=str_replace('[username]',$phone,$yanzhengcontent);
        $activetime=$yanzhengxinxi['active_time']*60;
        $http='http://message.4008289828.com/index.php?g=Message&m=Index&a=createSendNews_interface';
        $para['app_id']=1;
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
        $sms_info_json=$this->post($http,$para);
        // $line_info_arr=json_decode($sms_info_json,true);
        //短信记录
        $phonexinxi['phone']=$phone;//手机
        $phonexinxi['content']=$yanzhengcontent;//验证内容
        $phonexinxi['create_time']=date("Y-m-d H:i:s", time());//创建时间
        $phonexinxi['dead_time']=date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s", time()))+$activetime);//过期时间
        $phonexinxi['smstempid']=$yanzhengxinxi['id'];//模版id
        $phonexinxi['is_send']=0;
        $phonexinxi['status']=1;
        $phonexinxi['code']=$code;
        $phonexinxi['send_time']=date("Y-m-d H:i:s", time());//创建时间

        $chaxun=M('sms_phone')->where('phone='.$phone.' and smstempid='.$type)->select();
        if(!empty($chaxun)){
            $status['status']=2;
            M('sms_phone')->where('phone='.$phone.' and smstempid='.$type)->save($status);
            $res["res"]=1;
            $res["msg"] = '重新发送成功';
        }else{
            $res["res"]=0;
            $res["msg"] = '短信已发送';

        }
        M('sms_phone')->add($phonexinxi);
        }else{
            $res["res"]=0;
            $res["msg"] = '参数错误';
        }
        $this->ajaxReturn($res);
    }
//验证验证信息
    public function valmobile(){
            $data = array();
            $data['phone'] = I('phone');
            $data['code'] = I('code');
            $result = $this->CheckMobilePhone($data);
            $this->ajaxReturn($result);

    }
    //验证手机号是否已注册
    public function  validatePhone(){
        $data['phone'] = I('phone');
        //$api = new \Common\Common\Api();
        $result = $this->GetPhoneStatus($data);
        $this->ajaxReturn($result);

    }
    //绑定用户手机
    public function bangding(){
        $data=array();
        $data1=array();
        $data['mobile']=I('phone');
        $data1['id']=I('vipid');
        if(empty($data1['id'])){
            $res["res"] = 0;
            $res["msg"] = 'id参数错误,绑定失败';
            $this->ajaxreturn($res);
        }
        if(empty($data['mobile'])){
            $res["res"] = 0;
            $res["msg"] = '手机参数错误,绑定失败';
            $this->ajaxreturn($res);
        }
        $userd= M('vip')->where($data1)->find();
        if(empty($userd)){
            $res["res"] = 0;
            $res["msg"] = '未查到对应会员信息,绑定失败';
            $this->ajaxreturn($res);
        }
        $vipupdate=M('vip')->where($data1)->save($data);
        if($vipupdate){
            $res["res"] = 1;
            $res["msg"] = '绑定成功';
        }else{
            $res["res"] = 0;
            $res["msg"] = '绑定失败';
        }
        $this->ajaxreturn($res);
    }

   private function post($url, $params) {
    $ch = curl_init();
    if(stripos($url, "https://") !== false) {
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    }
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    $content = curl_exec($ch);
    $status = curl_getinfo($ch);
    curl_close($ch);
    if(intval($status["http_code"]) == 200) {
        return $content;
    } else {
        echo $status["http_code"];
        return false;
    }
  }
    //验证验证码是否过期
    private function checkMobilePhone($param) {
        $Dao=M();
        $phone = trim($param['phone']);
        $code = trim($param['code']);
        if (empty($phone)) {
            $res["res"] = 0;
            $res["msg"] = '手机号码不能为空';
            return $res;exit();
        }
        if (empty($code)) {
            $res["res"] = 0;
            $res["msg"] = '动态验证码不能为空';
            return $res;exit();
        }
        $ip = $param['ip'] ? $param['ip'] : '127.0.0.1';
        //$user=M('vip')->where('mobile='.$phone)->find();
//        $userone =M('sms_phone')->join('Left Join wfx_sms_template On wfx_sms_phone.smstempid=wfx_sms_template.id')
//            ->where('wfx_sms_template.type=3 and wfx_sms_phone.phone='.$phone.' and wfx_sms_phone.code='.$code.' AND wfx_sms_phone.STATUS = 1 AND wfx_sms_phone.dead_time >= now()')->find();
        $sql = "SELECT * FROM wfx_sms_phone usp LEFT JOIN wfx_sms_template usl ON usp.smstempid = usl.id WHERE usp.phone = '$phone' and usp.code = '$code' and usp.STATUS = 1 AND usp.dead_time >= now()";
//        $sqlone = "SELECT * from u_user where phone = ".intval($phone)." and `status` = 1";
        $userone = $Dao->query($sql);

        if(empty($userone)){
            $res["res"] = 0;
            $res["msg"] = '验证信息不对或者验证信息已过期';
        }else{
            $res["res"] = 1;
            $res["msg"] = '验证手机号成功';
        }

        return $res;
    }
    //验证手机号是否可以绑定
     private function getPhoneStatus($param) {
         $phone = $param['phone'];
         if (empty($phone)) {
             $res["res"] = 0;
             $res["msg"] = '手机号码不能为空';
             return $res;exit();
         }
         $user = M('vip')->where('mobile='.$phone)->find();
         if (empty($user)) {
             $res["res"]  = 1;
             $res["msg"]= '该手机号可以注册';
             return $res;exit();
         } else {
                 $res["res"]= 0;
                 $res["msg"] = '该手机号已注册过';
                 return $res;exit();
          }
         return $res;
     }
    // 正常绑定设置
    public function vipAlloc()
    {
            if (IS_POST) {
            $data['tuijianma']=I('code');
            $data['shop_id']=21;
            $employee=M('employee')->where($data)->find();
            if(empty($employee)){
                $res['res']=0;
                $res['msg']='推荐码输入错误,请确认后再试试';
                $this->ajaxreturn($res);
            }
            $dvip = D('Vip');
            $id = I('vipid1');//用户id
            $eid = $employee['id'];//员工id
            $employee = M('employee')->where(array('id' => $eid))->find();
            $vip = M('vip')->where(array('id' => $id, 'plv' => 1))->find();
            if ($employee && $vip) {
                $re = $this->setEmployee($id, $eid);
                if ($re) {
                    $info['status'] = 1;
                    $info['msg'] = "员工账户绑定成功";
                } else {
                    $info['status'] = 0;
                    $info['msg'] = "员工账户绑定失败";
                }
            } else {
                $info['status'] = 0;
                $info['msg'] = "员工账户不存在";
            }
            $this->ajaxReturn($info);

        }
    }
    // 取消绑定设置
    public function vipAllocquxiao()
    {
        if (IS_POST) {
            $data['tuijianma']='860839';
            $data['shop_id']=21;
            $employee=M('employee')->where($data)->find();
            if(empty($employee)){
                $res['res']=0;
                $res['msg']='推荐码输入错误,请确认后再试试';
                $this->ajaxreturn($res);
            }
            $dvip = D('Vip');
            $id = I('vipid1');//用户id
            $eid = $employee['id'];//员工id
            $employee = M('employee')->where(array('id' => $eid))->find();
            $vip = M('vip')->where(array('id' => $id, 'plv' => 1))->find();
            if ($employee && $vip) {
                $re = $this->setEmployee($id, $eid);
                if ($re) {
                    $info['status'] = 1;
                    $info['msg'] = "员工账户绑定成功";
                } else {
                    $info['status'] = 0;
                    $info['msg'] = "员工账户绑定失败";
                }
            } else {
                $info['status'] = 0;
                $info['msg'] = "员工账户不存在";
            }
            $this->ajaxReturn($info);

        }
    }
    // 设置导师，只能设置一级用户
    public function setEmployee($id, $eid)
    {
        $vip = M('vip')->where(array('id' => $id))->find();
        $employee = M('employee')->where(array('id' => $eid))->find();
        // 容错
        if (!($vip && $employee)) {
            return false;
        }
        // 一定要第一级并且没有上级员工
        if ($vip['old'] != 0) {
            return false;
        }
        $target = array();
        $tempp = array();
        $temps = array();
        $tempp[] = $id + 0;
        $mark = true;
        do {
            $temp = M('vip')->field('id')->where(array('id' => array('in', in_parse_str($tempp))))->select();
            foreach ($temp as $v) {
                array_push($tempp, $v['id'] + 0);
            }
            $temp = M('vip')->field('id')->where(array('pid' => array('in', in_parse_str($tempp))))->select();
            foreach ($temp as $v) {
                array_push($temps, $v['id'] + 0);
            }
            $target = array_merge($target, $tempp, $temps);
            if (count($temps) == 0) {
                $mark = false;
            } else {
                //$target = array_merge($target,$tempp,$temps);
                $tempp = $temps;
                $temps = array();
            }
        } while ($mark);
        $map = array();
        $map['employee'] = $eid;
        //return $target;
        $re = M('vip')->where(array('id' => array('in', in_parse_str($target))))->save($map);
        // 发送信息给员工========================
        $empvip = M('vip')->where(array('id' => $employee['vipid']))->find();
        if ($employee['vipid'] && $empvip) {
            $customeremp = M('Wx_customer')->where(array('type' => 'emp'))->find();
            $set = M('Set')->find();
            $options['appid'] = $set['wxappid'];
            $options['appsecret'] = $set['wxappsecret'];
            $wx = new \Util\Wx\Wechat($options);
            $shopset = M('Shop_set')->find();
            $cache = M('vip')->where(array('id' => array('in', in_parse_str($target))))->select();
            foreach ($cache as $k => $v) {
                $msg = array();
                $msg['touser'] = $empvip['openid'];
                $msg['msgtype'] = 'text';
                $str = "[" . $v['nickname'] . "]通过您的推广，成为了您的[" . $shopset['fxname'] . "]，" . $customeremp['value'];
                $msg['text'] = array('content' => $str);
                $ree = $wx->sendCustomMessage($msg);
            }
        }
        // 发送信息给员工========================
        if ($re) {
            return true;
        } else {
            return false;
        }
    }
}
