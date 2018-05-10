<?php
namespace Multi\Controller;
use Think\Controller;
class  SetController extends BaseController
{
    public function _initialize()
    {
        //你可以在此覆盖父类方法
        parent::_initialize();

    }
    //小米粉分销图片
    public function index(){
        $lineid=I('id');//产品详情页id
        $xinxi=M('shop_goods')->where('id='.$lineid)->find();
        $lines_info=$this->getadpic($xinxi['adpic']);
        $base64_img=$lines_info[0]['imgurl'];
        $this->assign("lines_info",$base64_img);
        $this->assign("lineid",$lineid);
        $this->assign('cache',$xinxi);
        $set = M('Set')->find();
        $options['appid'] = 'wxc987766182edaaaf';
        $options['appsecret'] = '43f2122c03de556f4b3f837f3d13b2a3';
//        $lineid = I('lineid')?:0;
//        $lines_info = json_decode($this->Api->postMethod("user/xmfPic",array('lineid'=>$lineid)),true);
//        $base64_img = $lines_info['message']['data'];
//        $this->assign("lines_info",$base64_img);
////        var_dump($base64_img);
//        $this->assign("lineid",$lineid);
        $wx = new \Util\Wx\Wechat($options);
        //生成JSSDK实例
        $opt['appid'] = $options['appid'];
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



    public function dis_confirm()
    {
       $res=array();
       $this->ajaxreturn($res);
    }
    //获取广告图
    public function getadpic($ids)
    {
        $m = M('UploadImg');
        $map['id'] = array('in', in_parse_str($ids));
        $list = $m->where($map)->order('id asc')->limit(1)->select();
        foreach ($list as $k => $v) {
            $list[$k]['imgurl'] = __ROOT__ . "/Upload/" . $list[$k]['savepath'] . $list[$k]['savename'];
        }
        return $list ? $list : "";
    }
}