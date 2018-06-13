<?php
// 本类由系统自动生成，仅供测试用途
namespace App\Controller;

class ShopController extends BaseController
{

    public function _initialize()
    {
        //$_SESSION['shop_id']=21;
        //你可以在此覆盖父类方法
        parent::_initialize();
//         $shopset = M('Shop_set')->where('id='.session("shop_id"))->find();
/*         $shopset = M('Shop_set')->where('id=21')->find();
         if ($shopset['pic']) {
             $listpic = $this->getPic($shopset['pic']);
             $shopset['sharepic'] = $listpic['imgurl'];
         }
         if ($shopset) {
             self::$WAP['shopset'] = $_SESSION['WAP']['shopset'] = $shopset;
             $this->assign('shopset', $shopset);
         } else {
             $this->diemsg(0, '您还没有进行商城配置！');
         }*/
    }

// 每日返现代码
    public function cashback(){

        $cashback = D('Cashback')->getList(array('status' => "0"));

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
                $User->where($map)->setInc('money',$value["money"]); // 用户的money增加

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



    private function createNonceStr($length = 16)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $str = "";
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return $str;
    }

    public function index()
    {
		
		$vip = session("WAP");
		$vip = $vip['vip'];
        //回头恢复
		/*$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx47bc6da551275a8f&secret=5f11fb9630dd5f5ffde1379d2d46946f";
		$result_str = file_get_contents($url);
		$web_access_token = json_decode($result_str, true);
		if(!($web_access_token['errcode']=="0" || empty($web_access_token['errcode']))){
			die("接口名称：获取当前微信access_token errcode[".$web_access_token['errcode']."]  errmsg:".$web_access_token['errmsg']);
		}
		$access_token = $web_access_token['access_token'];
		
		$url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$access_token."&openid=".$vip['openid']."&lang=zh_CN";
		$result_str = file_get_contents($url);
		$web_user_infor = json_decode($result_str, true);
		if(!($web_user_infor['errcode']=="0" || empty($web_user_infor['errcode']))){
			die("接口名称：获取当前微信用户信息 errcode[".$web_user_infor['errcode']."]  errmsg:".$web_user_infor['errmsg']);
		}
		$subscribe = $web_user_infor['subscribe'];
		
		if($subscribe==1){
			//关注
			$this->assign('is_gz', 1);//是否关注
		}else{
			//未关注
			$this->assign('is_gz', 0);//是否关注
		}*/
		
		$user_vip = M('vip')->where(" id='".$vip['id']."' ")->find();
		$this->assign('is_yd', $user_vip['is_yd_1']);//是否引导
		
	
        $shopId = 21;
        session("shop_id",$shopId);
		
        $shopset = M('Shop_set')->where('id=21')->find();

        if ($shopset['pic']) {
            $listpic = $this->getPic($shopset['pic']);
            $shopset['sharepic'] = $listpic['imgurl'];
        }
        if ($shopset) {
            self::$WAP['shopset'] = $_SESSION['WAP']['shopset'] = $shopset;
            $this->assign('shopset', $shopset);
        }

        //追入分享特效
       /* $options['appid'] = self::$_wxappid;
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
        $this->assign('jsapi', $jsapi);*/

        //正常逻辑
        $m = M('Shop_goods');
        //$tmpgroup=M('Shop_group')->select();
        $tmpgroup = M('Shop_group')->where(array('shop_id' => $shopId,'status' => 1))->find();
        $this->assign('group', $tmpgroup);

        // $group=array();
        // foreach($tmpgroup as $k=>$v){
        // 	$group[$v['id']]=$v['goods'];
        // }
        //重磅推荐
        //$mrtj=$m->where(array('id'=>array('in',$group[1])))->select();
        $mrtj = $m->where(array('id' => array('in', in_parse_str($tmpgroup['goods']))))->select();
    
        foreach ($mrtj as $k => $v) {
            $listpic = $this->getPic($v['indexpic']);
            $mrtj[$k]['imgurl'] = $listpic['imgurl'];
        }

        $this->assign('mrtj', $mrtj);
        $type = intval(I('type')) ? intval(I('type')) : 0;
        $this->assign('type', $type);
        if ($type) {
            $map['cid'] = $type;
        }
        $map['status'] = 1;
        $map['shop_id'] = $shopId;    
        $map['istuisong'] = 1;

        // Louis 20180605 update 首页推荐产品无需排序,将排序号调整到类目
        // $cache = $m->where($map)->order('sorts desc')->select();
        $cache = $m->where($map)->select();
        foreach ($cache as $k => $v) {
            $listpic = $this->getPic($v['listpic']);

            if($vip['fx_level']==1){
                $cache[$k]['price']=$cache[$k]['price'];
            }elseif($vip['fx_level']==2){
                $cache[$k]['price']=$cache[$k]['price_ceo'];
            }elseif($vip['fx_level']==3){
                $cache[$k]['price']=$cache[$k]['price_center'];
            }

            $cache[$k]['imgurl'] = $listpic['imgurl'];
        }
        $this->assign('type', $type);
        $this->assign('cache', $cache);
        //分组调用
        $mapx['shop_id'] = 21;
        $indexicons = M('Shop_cate')->where($mapx)->select();

        // dump($indexicons);       
        foreach ($indexicons as $k => $v) {
            $listpic = $this->getPic($v['icon']);
            $indexicons[$k]['iconurl'] = $listpic['imgurl'];
            $indexicons[$k]['ison'] = $type == $v['id'] ? '1' : '0';
            // 获取下级
            if ($indexicons[$k]['soncate']) {
                $son = M('Shop_cate')->where(array('id' => array('in', in_parse_str($indexicons[$k]['soncate']))))->select();
                foreach ($son as $kk => $vv) {
                    $temp = $this->getPic($vv['icon']);
                    $son[$kk]['iconurl'] = $temp['imgurl'];
                    $son[$kk]['ison'] = $type == $vv['id'] ? '1' : '0';
                    $son[$kk]['url'] = U('App/Shop/index#nav', array('shopid'=>session("shop_id"),'type' => $v['id']));
                }
                $indexicons[$k]['son'] = 1;
                $indexicons[$k]['sonlist'] = $son;
                $indexicons[$k]['url'] = "javascript:;";
            } else {
                $indexicons[$k]['son'] = 0;
                $indexicons[$k]['url'] = U('App/Shop/index#nav', array('shopid'=>session("shop_id"),'type' => $v['id']));
            }

        }
        // dump($indexicons);
        //首页轮播图集
        $indexalbum = M('Shop_ads')->where(array('shop_id='. session("shop_id"),'kind'=>1))->select();

        foreach ($indexalbum as $k => $v) {
            $listpic = $this->getPic($v['pic']);
            $indexalbum[$k]['imgurl'] = $listpic['imgurl'];
        }
        $this->assign('indexalbum', $indexalbum);

        $this->assign('indexicons', $indexicons);

        //公告管理
        $notice=M('Artical')->where(array('shop_id'=>21))->select();
        $this->assign('notice',$notice);
        $this->assign('url', "http://" . I("server.HTTP_HOST"));

        //主体广告
        $main_left = M('Shop_ads')->where(array('shop_id='. session("shop_id"),'kind'=>2))->find();
        $main_left['img_url']=$this->getPic($main_left['pic'])['imgurl'];
        $this->assign('main_left',$main_left);

        $main_right_top = M('Shop_ads')->where(array('shop_id='. session("shop_id"),'kind'=>3))->find();
        $main_right_top['img_url']=$this->getPic($main_right_top['pic'])['imgurl'];
        $this->assign('main_right_top',$main_right_top);

        $main_right_bottom_left = M('Shop_ads')->where(array('shop_id='. session("shop_id"),'kind'=>4))->find();
        $main_right_bottom_left['img_url']=$this->getPic($main_right_bottom_left['pic'])['imgurl'];
        $this->assign('main_right_bottom_left',$main_right_bottom_left);

        $main_right_bottom_right = M('Shop_ads')->where(array('shop_id='. session("shop_id"),'kind'=>5))->find();
        $main_right_bottom_right['img_url']=$this->getPic($main_right_bottom_right['pic'])['imgurl'];
        $this->assign('main_right_bottom_right',$main_right_bottom_right);

        //首页分享特效
        //dump(self::$WAP['vip']['ppid']);
        if (self::$WAP['vip']['subscribe']) {
//            if (self::$WAP['vip']['pid']) {
//                $father = M('Vip')->where('id=' . self::$WAP['vip']['pid'])->find();
//                $this->assign('showsub', 1);
//                if ($father) {
//                    $this->assign('showfather', 1);
//                    $this->assign('father', $father);
//                } else {
//                    $this->assign('showfather', 0);
//                }
//
//            } else {
                $this->assign('showsub', 1);
//                $this->assign('showfather', 0);
//            }
        } else {
            $this->assign('showsub', 0);
        }
        //当前会员的上线员工电话，如果没有则使用客服电话
        $service_tel = '';
        $vip = M('Vip')->where(array('id' => $_SESSION['WAP']['vipid']))->find();
        if(!empty($vip['employee'])){
            $employee = M('Employee')->where(array('id' => $vip['employee']))->find();
            if(!empty($employee['mobile'])){
                $service_tel= $employee['mobile'];
            }else{
                $service_tel='18015885851';
            }
        }else{
            $service_tel='18015885851';
        }
        $this->assign('service_tel', $service_tel);
        $this->assign('shopid', session("shop_id"));

        $moren_tb='shouye';
        $this->assign('moren_tb', $moren_tb);

        $this->display();
    }

	public function goto_ydc_havesee(){
		$data_msg = array("data"=>Array(),"msg"=>"非法操作！","status"=>1);//0正常1错误
		$type = empty($_REQUEST['type'])?0:$_REQUEST['type'];
		
		$vip = session("WAP");
		$vip = $vip['vip'];
		
		if($type==1){
			$data['is_yd_1'] = 0;
		}elseif($type==2){
			$data['is_yd_2'] = 0;
		}
		
		M("vip")->where(" id='".$vip['id']."' ")->save($data); // 根据条件保存修改的数据
		
		$data_msg['msg'] = "修改成功。";
		$data_msg['status'] = 0;
		$this->ajaxReturn($data_msg,'JSON');
	}

    public function sousuolist(){
        $this->display();
    }

    public function goods_kind(){
        $search_key=$_GET['search_key'];
        $cid=$_GET['cid'];
        $shop_cate=M('Shop_cate')->select();
        $this->assign('shop_cate',$shop_cate);
        $this->assign('cid',$cid);

        $m = M('Shop_goods');
        $p = $_GET['p'] ? $_GET['p'] : 1;

        $price_order='asc';
        $order_num=1;

        if(!empty($_GET['price'])){
            $paixu="price {$_GET['price']}";
            if($_GET['price']=='asc'){
                $price_order='desc';
            }
            $order_num=2;
        }
        else if(!empty($_GET['time'])){
            $paixu="sorts desc,id desc";
            $order_num=3;
        }
        // else if(!empty($_GET['comprehensive'])){
        //     $paixu="sorts desc";
        //     $order_num=1;
        // }
        else{
            $paixu="sorts desc";
            $order_num=1;
        }

        $this->assign('price_order',$price_order);
        $this->assign('order_num',$order_num);


        if($search_key){
            $map['name']= array('like','%'.$search_key.'%');
        }else{
            $map['shop_id'] = 21;
            $map['cid'] = $cid;
        }

        $psize =  20;
        $goods_list = $m->where($map)->order($paixu)->page($p, $psize)->select();
        $count = $m->where($map)->count();
        $this->getPage($count, $psize, 'App-loader', '商品管理', 'App-search');

        //商品图片
        foreach ($goods_list as $k => $v) {
            $listpic = $this->getPic($v['listpic']);
            $goods_list[$k]['imgurl'] = $listpic['imgurl'];
        }

        $vip = session("WAP");
        $vip = $vip['vip'];
        $user_vip = M('vip')->where(" id='".$vip['id']."' ")->find();
        if($user_vip['fx_level']==1){
            foreach($goods_list as $k => &$v){
                $v['price']=$v['price'];
//                $v['price']=$v['price'];
            }
        }elseif($user_vip['fx_level']==2){
            foreach($goods_list as $k => &$v){
                $v['price']=$v['price_ceo'];
            }
        }elseif($user_vip['fx_level']==3){
            foreach($goods_list as $k => &$v){
                $v['price']=$v['price_center'];
            }
        }


        $this->assign('goods_list',$goods_list);
        $this->display();
    }

    public function goods()
    {
		$vip = session("WAP");
		$vip = $vip['vip'];

        $map_shoucang['good_id']=$_GET['id'];
        $map_shoucang['uid']=$vip['id'];
        $sc_res=M('Collection')->where($map_shoucang)->select();
        if($sc_res){
            $this->assign('sfsc',1);
        }

        //回头恢复
		/*$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx47bc6da551275a8f&secret=5f11fb9630dd5f5ffde1379d2d46946f";
		$result_str = file_get_contents($url);
		$web_access_token = json_decode($result_str, true);
		if(!($web_access_token['errcode']=="0" || empty($web_access_token['errcode']))){
			die("接口名称：获取当前微信access_token errcode[".$web_access_token['errcode']."]  errmsg:".$web_access_token['errmsg']);
		}
		$access_token = $web_access_token['access_token'];
		
		$url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$access_token."&openid=".$vip['openid']."&lang=zh_CN";
		$result_str = file_get_contents($url);
		$web_user_infor = json_decode($result_str, true);
		if(!($web_user_infor['errcode']=="0" || empty($web_user_infor['errcode']))){
			die("接口名称：获取当前微信用户信息 errcode[".$web_user_infor['errcode']."]  errmsg:".$web_user_infor['errmsg']);
		}
		$subscribe = $web_user_infor['subscribe'];
		
		if($subscribe==1){
			//关注
			$this->assign('is_gz', 1);//是否关注
		}else{
			//未关注
			$this->assign('is_gz', 0);//是否关注
		}*/
		
		$user_vip = M('vip')->where(" id='".$vip['id']."' ")->find();
		$this->assign('is_yd', $user_vip['is_yd_2']);//是否引导
		
		
        $id = I('id') ? I('id') : $this->diemsg(0, '缺少ID参数!');
        //回头恢复
        //追入分享特效
        /*$options['appid'] = self::$_wxappid;
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
        $this->assign('jsapi', $jsapi);*/
        $m = M('Shop_goods');
        $cache = $m->where('id=' . $id)->find();
        if (!$cache) {
            $this->error('此商品已下架！', U('App/Shop/index'));
        }
        if (!$cache['status']) {
            $this->error('此商品已下架！', U('App/Shop/index'));
        }
        //自动计数
        $rclick = $m->where('id=' . $id)->setInc('clicks', 1);
        //读取标签
        foreach (explode(',', $cache['lid']) as $k => $v) {
            $label[$k] = M('ShopLabel')->where(array('id' => $v))->getField('name');
        }
        $cache['label'] = $label;


        $vip = session("WAP");
        $vip = $vip['vip'];
        $user_vip = M('vip')->where(" id='".$vip['id']."' ")->find();

        if($user_vip['fx_level']==1){
            $cache['price']=$cache['price'];
//            $cache['price']=$cache['price'];
        }elseif($user_vip['fx_level']==2){
            $cache['price']=$cache['price_ceo'];
        }elseif($user_vip['fx_level']==3){
            $cache['price']=$cache['price_center'];
        }

        $this->assign('cache', $cache);
        if ($cache['issku']) {
            if ($cache['skuinfo']) {
                $skuinfo = unserialize($cache['skuinfo']);
                $skm = M('Shop_skuattr_item');
                foreach ($skuinfo as $k => $v) {
                    $checked = explode(',', $v['checked']);
                    $attr = $skm->field('path,name')->where('pid=' . $v['attrid'])->select();
                    foreach ($attr as $kk => $vv) {
                        $attr[$kk]['checked'] = in_array($vv['path'], $checked) ? 1 : '';
                    }
                    $skuinfo[$k]['allitems'] = $attr;
                }
                $this->assign('skuinfo', $skuinfo);
            } else {
                $this->diemsg(0, '此商品还没有设置SKU属性！');
            }
            $skuitems = M('Shop_goods_sku')->field('sku,skuattr,price,num,hdprice,hdnum')->where(array('goodsid' => $id, 'status' => 1))->select();
            if (!$skuitems) {
                $this->diemsg(0, '此商品还未生成SKU!');
            }
            $skujson = array();
            foreach ($skuitems as $k => $v) {
                $skujson[$v['sku']]['sku'] = $v['sku'];
                $skujson[$v['sku']]['skuattr'] = $v['skuattr'];
                $skujson[$v['sku']]['price'] = $v['price'];
                $skujson[$v['sku']]['num'] = $v['num'];
                $skujson[$v['sku']]['hdprice'] = $v['hdprice'];
                $skujson[$v['sku']]['hdnum'] = $v['hdnum'];
            }
            $this->assign('skujson', json_encode($skujson));
        }

        //绑定图集
        if ($cache['album']) {
            $appalbum = $this->getAlbum($cache['album']);
            if ($appalbum) {
                $this->assign('appalbum', $appalbum);
            }
        }
        //绑定图片
        if ($cache['pic']) {
            $apppic = $this->getPic($cache['pic']);
            if ($apppic) {
                $this->assign('apppic', $apppic);
            }
        }
        $re = M('Shop_basket')->where(array('sid' => 0,'shop_id' => 0, 'vipid' => self::$WAP['vipid']))->delete();
        //绑定购物车数量
        $basketnum = M('Shop_basket')->where(array('sid' => 0, 'vipid' => self::$WAP['vipid']))->sum('num');
        $this->assign('basketnum', $basketnum);
        //绑定登陆跳转地址
        $backurl = base64_encode(U('App/Shop/goods', array('id' => $id)));
        $loginback = U('App/Vip/login', array('backurl' => $backurl));
        $this->assign('loginback', $loginback);
        $this->assign('lasturl', $backurl);
        $this->assign('shopid', session("shop_id"));
        $cid=$_GET['cid'];
        $this->assign('cid',$cid);
        $this->display();
    }

    public function basket()
    {
        $vip = session("WAP");
        $vip = $vip['vip'];
        if(empty($vip['mobile']) /*|| $vip['mobile']==' '*/ ){
            $this->redirect('App/vip/login');exit;
        }


        $sid = I('sid') <> '' ? I('sid') : $this->diemsg(0, '缺少SID参数');//sid可以为0
        $lasturl = I('lasturl') ? I('lasturl') : '';
        $basketlasturl = base64_decode($lasturl);
        $basketurl = U('App/Shop/basket', array('sid' => $sid, 'lasturl' => $lasturl));
        $backurl = base64_encode($basketurl);
        $basketloginurl = U('App/Vip/login', array('backurl' => $backurl));
        $re = $this->checkLogin($backurl);
        //保存当前购物车地址
        $this->assign('basketurl', $basketurl);
        //保存登陆购物车地址
        $this->assign('basketloginurl', $basketloginurl);
        //保存购物车前地址
        $this->assign('basketlasturl', $basketlasturl);
        //保存购物车加密地址，用于OrderMaker正常返回
        $this->assign('lasturlencode', $lasturl);
        //已登陆
        $m = M('Shop_basket');
        $mgoods = M('Shop_goods');
        $msku = M('Shop_goods_sku');
        $returnurl = base64_decode($lasturl);
        $this->assign('returnurl', $returnurl);
        $sid = empty($sid)?0:$sid;
        $sess_shop_id = empty(session('shop_id'))?0:session('shop_id');
        session('shop_id',$sess_shop_id);
        $cache = $m->where(array('sid' => $sid, 'vipid' => $_SESSION['WAP']['vipid'],'shop_id'=>session('shop_id')))->select();
        //错误标记
        $errflag = 0;
        //等待删除ID
        $todelids = '';
        //totalprice
        $totalprice = 0;
        $totalprice_bate=0;
        //totalnum
        $totalnum = 0;



        $user_vip = M('vip')->where(" id='".$vip['id']."' ")->find();


        foreach ($cache as $k => $v) {
            //sku模型
            $goods = $mgoods->where('id=' . $v['goodsid'])->find();
            $pic = $this->getPic($goods['listpic']);
            if ($v['sku']) {
                //取商品数据				
                if ($goods['issku'] && $goods['status']) {
                    $map['sku'] = $v['sku'];
                    $sku = $msku->where($map)->find();
                    if ($sku['status']) {
                        if ($sku['num']) {
                            //调整购买量
                            $cache[$k]['name'] = $goods['name'];
                            $cache[$k]['skuattr'] = $sku['skuattr'];
                            $cache[$k]['num'] = $v['num'] > $sku['num'] ? $sku['num'] : $v['num'];


                            $cache[$k]['pic'] = $pic['imgurl'];
                            $totalnum = $totalnum + $cache[$k]['num'];


                            if($user_vip['fx_level']==1){
                                $cache[$k]['price'] = $goods['price'];
                                $cache[$k]['total'] = $v['num'] * $goods['price'];
                                $totalprice = $totalprice + $goods['price'] * $cache[$k]['num'];

                                $totalprice_bate = $totalprice_bate + $goods['price_ceo_bate'] * $cache[$k]['num'];
                            }elseif($user_vip['fx_level']==2){
                                $cache[$k]['price'] = $goods['price_ceo'];
                                $cache[$k]['total'] = $v['num'] * $goods['price_ceo'];
                                $totalprice = $totalprice + $goods['price_ceo'] * $cache[$k]['num'];

                                $totalprice_bate = $totalprice_bate + $goods['price_ceo_bate'] * $cache[$k]['num'];
                            }elseif($user_vip['fx_level']==3){
                                $cache[$k]['price'] = $goods['price_center'];
                                $cache[$k]['total'] = $v['num'] * $goods['price_center'];
                                $totalprice = $totalprice + $goods['price_center'] * $cache[$k]['num'];

                                $totalprice_bate = $totalprice_bate + $goods['price_ceo_bate'] * $cache[$k]['num'];
                            }else{
                                $cache[$k]['price'] = $goods['price'];
                                $cache[$k]['total'] = $v['num'] *$goods['price'];;
                                $totalprice = $totalprice + $goods['price'] * $cache[$k]['num'];

                                $totalprice_bate = $totalprice_bate + $goods['price'] * $cache[$k]['num'];

                            }


                        } else {
                            //无库存删除
                            $todelids = $todelids . $v['id'] . ',';
                            unset($cache[$k]);

                        }
                    } else {
                        //下架删除
                        $todelids = $todelids . $v['id'] . ',';
                        unset($cache[$k]);
                    }
                } else {
                    //下架删除
                    $todelids = $todelids . $v['id'] . ',';
                    unset($cache[$k]);
                }

            } else {
                if ($goods['status']) {
                    if ($goods['num']) {
                        //调整购买量
                        $cache[$k]['name'] = $goods['name'];
                        $cache[$k]['skuattr'] = $sku['skuattr'];
                        $cache[$k]['num'] = $v['num'] > $goods['num'] ? $goods['num'] : $v['num'];

                        $cache[$k]['pic'] = $pic['imgurl'];
                        $totalnum = $totalnum + $cache[$k]['num'];


                        if($user_vip['fx_level']==1){
                            $cache[$k]['price'] = $goods['price'];
                            $cache[$k]['total'] = $v['num'] * $goods['price'];
                            $totalprice = $totalprice + $goods['price'] * $cache[$k]['num'];

                            $totalprice_bate = $totalprice_bate + $goods['price_ceo_bate'] * $cache[$k]['num'];
                        }elseif($user_vip['fx_level']==2){
                            $cache[$k]['price'] = $goods['price_ceo'];
                            $cache[$k]['total'] = $v['num'] * $goods['price_ceo'];
                            $totalprice = $totalprice + $goods['price_ceo'] * $cache[$k]['num'];

                            $totalprice_bate = $totalprice_bate + $goods['price_ceo_bate'] * $cache[$k]['num'];
                        }elseif($user_vip['fx_level']==3){
                            $cache[$k]['price'] = $goods['price_center'];
                            $cache[$k]['total'] = $v['num'] * $goods['price_center'];
                            $totalprice = $totalprice + $goods['price_center'] * $cache[$k]['num'];

                            $totalprice_bate = $totalprice_bate + $goods['price_ceo_bate'] * $cache[$k]['num'];
                        }else{
                            $cache[$k]['price'] = $goods['price'];
                            $cache[$k]['total'] = $v['num'] *$goods['price'];;
                            $totalprice = $totalprice + $goods['price'] * $cache[$k]['num'];

                            $totalprice_bate = $totalprice_bate + $goods['price'] * $cache[$k]['num'];

                        }


                    } else {
                        //无库存删除
                        $todelids = $todelids . $v['id'] . ',';
                        unset($cache[$k]);
                    }
                } else {
                    //下架删除
                    $todelids = $todelids . $v['id'] . ',';
                    unset($cache[$k]);
                }
            }
        }
        if ($todelids) {
            $rdel = $m->delete($todelids);
            if (!$rdel) {
                $this->error('购物车获取失败，请重新尝试！');
            }
        }


        $this->assign('cache', $cache);
        $this->assign('totalprice', $totalprice);
        $this->assign('totalprice_bate', $totalprice_bate);
        $this->assign('totalnum', $totalnum);

        $moren_tb='gouwuche';
        $this->assign('moren_tb', $moren_tb);

        $this->display();
    }

    //收藏
    public function shoucang(){
        $vip = session("WAP");
        $vip = $vip['vip'];
        if(empty($vip['mobile']) /*|| $vip['mobile']==' '*/ ){
            $result['state_code']=5;
            $this->ajaxReturn($result);
            exit;
        }

        $good_id=$_POST['goodsid'];
        $good=M('Shop_goods')->find($good_id);
        $map['uid'] = $vip['id'];;
        $map['good_id'] =$good_id;
        $sc_res=M('Collection')->where($map)->select();
        if($sc_res){
            $res=M('Collection')->where($map)->delete();
            if($res){
                $result['state_code']=1;
                $result['msg']='取消收藏';
                $this->ajaxReturn($result);
            }else{
                $result['state_code']=2;
                $result['msg']='取消失败';
                $this->ajaxReturn($result);
            }
        }else{
            $data['good_id']=$good_id;
            $data['title']= $good['name'];
            $data['img']= $good['listpic'];
            $data['des']= $good['promotional'];
            $data['uid']= $vip['id'];
            $data['time'] = date("Y-m-d H:s:i");
            $res=M('Collection')->add($data);
            if($res){
                $result['state_code']=1;
                $result['msg']='收藏成功';
                $this->ajaxReturn($result);
            }else{
                $result['state_code']=2;
                $result['msg']='收藏失败';
                $this->ajaxReturn($result);
            }
        }

    }

    //添加购物车
    public function addtobasket()
    {
        $vip = session("WAP");
        $vip = $vip['vip'];
        if(empty($vip['mobile']) /*|| $vip['mobile']==' '*/ ){
            $info['status'] = 5;
            $this->ajaxReturn($info);
            exit;
        }

        if (IS_AJAX) {
            $m = M('Shop_basket');
            $data = I('post.');
            if (!$data) {
                $info['status'] = 0;
                $info['msg'] = '未获取数据，请重新尝试';
                $this->ajaxReturn($info);
            }
            //区分SKU模式
            if ($data['sku']) {
                $old = $m->where(array('sid' => $data['sid'], 'vipid' => $data['vipid'], 'sku' => $data['sku']))->find();
                if ($old) {
                    $old['num'] = $old['num'] + $data['num'];
                    $rold = $m->save($old);
                    if ($rold === FALSE) {
                        $info['status'] = 0;
                        $info['msg'] = '添加购物车失败，请重新尝试！';
                    } else {
                        $total = $m->where(array('sid' => $data['sid'], 'vipid' => $data['vipid']))->sum('num');
                        $info['total'] = $total;
                        $info['status'] = 1;
                        $info['msg'] = '添加购物车成功！';
                    }
                } else {
                    $data['shop_id'] = session('shop_id');
                    $rold = $m->add($data);
                    if ($rold) {
                        $total = $m->where(array('sid' => $data['sid'], 'vipid' => $data['vipid']))->sum('num');
                        $info['total'] = $total;
                        $info['status'] = 1;
                        $info['msg'] = '添加购物车成功！';
                    } else {
                        $info['status'] = 0;
                        $info['msg'] = '添加购物车失败，请重新尝试！';
                    }
                }
            } else {
                $old = $m->where(array('sid' => $data['sid'], 'vipid' => $data['vipid'], 'goodsid' => $data['goodsid']))->find();
                if ($old) {
                    $old['num'] = $old['num'] + $data['num'];
                    $rold = $m->save($old);
                    if ($rold === FALSE) {
                        $info['status'] = 0;
                        $info['msg'] = '添加购物车失败，请重新尝试！';
                    } else {
                        $total = $m->where(array('sid' => $data['sid'], 'vipid' => $data['vipid']))->sum('num');
                        $info['total'] = $total;
                        $info['status'] = 1;
                        $info['msg'] = '添加购物车成功！';
                    }
                } else {
                    $data['shop_id'] = session('shop_id');
                    $rold = $m->add($data);
                    if ($rold) {
                        $total = $m->where(array('sid' => $data['sid'], 'vipid' => $data['vipid']))->sum('num');
                        $info['total'] = $total;
                        $info['status'] = 1;
                        $info['msg'] = '添加购物车成功！';
                    } else {
                        $info['status'] = 0;
                        $info['msg'] = '添加购物车失败，请重新尝试！';
                    }
                }
            }
            $this->ajaxReturn($info);
        } else {
            $this->diemsg(0, '禁止外部访问！');
        }
    }

    //删除购物车
    public function delbasket()
    {
        if (IS_AJAX) {
            $id = I('id');
            if (!$id) {
                $info['status'] = 0;
                $info['msg'] = '未获取ID参数,请重新尝试！';
                $this->ajaxReturn($info);
            }
            $m = M('Shop_basket');
            $re = $m->where('id=' . $id)->delete();
            if ($re) {
                $info['status'] = 1;
                $info['msg'] = '删除成功，更新购物车状态...';

            } else {
                $info['status'] = 0;
                $info['msg'] = '删除失败，自动重新加载购物车...';
            }
            $this->ajaxReturn($info);
        } else {
            $this->diemsg(0, '禁止外部访问！');
        }
    }

    //清空购物车
    public function clearbasket()
    {
        if (IS_AJAX) {
            $sid = $_GET['sid'];
            //前端必须保证登陆状态
            $vipid = $_SESSION['WAP']['vipid'];
            if (!$vipid) {
                $info['status'] = 3;
                $info['msg'] = '登陆已超时，2秒后自动跳转登陆页面！';
                $this->ajaxReturn($info);
            }
            if ($sid == '') {
                $info['status'] = 0;
                $info['msg'] = '未获取SID参数,请重新尝试！';
                $this->ajaxReturn($info);
            }
            $m = M('Shop_basket');
            $re = $m->where(array('sid' => $sid, 'vipid' => $vipid))->delete();
            if ($re) {
                $info['status'] = 2;
                $info['msg'] = '购物车已清空';
                $this->ajaxReturn($info);
            } else {
                $info['status'] = 0;
                $info['msg'] = '购物车清空失败，请重新尝试！';
                $this->ajaxReturn($info);
            }
        } else {
            $this->diemsg(0, '禁止外部访问！');
        }
    }

    //购物车库存检测
    public function checkbasket()
    {
        if (IS_AJAX) {
            $sid = $_GET['sid'];
            //前端必须保证登陆状态
            $vipid = $_SESSION['WAP']['vipid'];
            if (!$vipid) {
                $info['status'] = 3;
                $info['msg'] = '登陆已超时，2秒后自动跳转登陆页面！';
                $this->ajaxReturn($info);
            }
            $arr = $_POST;
            if ($sid == '') {
                $info['status'] = 0;
                $info['msg'] = '未获取SID参数';
                $this->ajaxReturn($info);
            }
            if (!$arr) {
                $info['status'] = 0;
                $info['msg'] = '未获取数据，请重新尝试';
                $this->ajaxReturn($info);
            }
            $m = M('Shop_basket');
            $mgoods = M('Shop_goods');
            $msku = M('Shop_goods_sku');
            $data = $m->where(array('sid' => $sid, 'vipid' => $_SESSION['WAP']['vipid']))->select();
            foreach ($data as $k => $v) {
                $goods = $mgoods->where('id=' . $v['goodsid'])->find();
                if ($v['sku']) {
                    $sku = $msku->where(array('sku' => $v['sku']))->find();
                    if ($sku && $sku['status'] && $goods && $goods['issku'] && $goods['status']) {
                        $nownum = $arr[$v['id']];
                        if ($sku['num'] - $nownum >= 0) {
                            //保存购物车新库存
                            if ($nownum <> $v['num']) {
                                $v['num'] = $nownum;
                                $rda = $m->save($v);
                            }
                        } else {
                            $info['status'] = 2;
                            $info['msg'] = '存在已下架或库存不足商品！';
                            $this->ajaxReturn($info);
                        }

                    } else {
                        $info['status'] = 2;
                        $info['msg'] = '存在已下架或库存不足商品！';
                        $this->ajaxReturn($info);
                    }
                } else {
                    if ($goods && $goods['status']) {
                        $nownum = $arr[$v['id']];
                        if ($goods['num'] - $nownum >= 0) {
                            //保存购物车新库存
                            if ($nownum <> $v['num']) {
                                $v['num'] = $nownum;
                                $rda = $m->save($v);
                            }
                        } else {
                            $info['status'] = 2;
                            $info['msg'] = '存在已下架或库存不足商品！';
                            $this->ajaxReturn($info);
                        }

                    } else {
                        $info['status'] = 2;
                        $info['msg'] = '存在已下架或库存不足商品！';
                        $this->ajaxReturn($info);
                    }

                }
            }
            $info['status'] = 1;
            $info['msg'] = '跳转中...';
            $this->ajaxReturn($info);
        } else {
            $this->diemsg(0, '禁止外部访问！');
        }
    }

    //立刻购买逻辑
    public function fastbuy()
    {
        $vip = session("WAP");
        $vip = $vip['vip'];
        if(empty($vip['mobile']) /*|| $vip['mobile']==' '*/ ){
            $info['status'] = 5;
            $info['msg'] = '未获取数据，请重新尝试321';
            $this->ajaxReturn($info);
            exit;
        }
        if (IS_AJAX) {
            $m = M('Shop_basket');
            $data = I('post.');
            if (!$data) {
                $info['status'] = 0;
                $info['msg'] = '未获取数据，请重新尝试';
                $this->ajaxReturn($info);
            }


            //不清除购物车
            $sid = 0;
            //前端必须保证登陆状态
            $vipid = $_SESSION['WAP']['vipid'];
         //   $re = $m->where(array('sid' => $sid, 'vipid' => $vipid))->delete();
            //区分SKU模式
            //var_dump($data);die;

            if ($data['sku']) {
                $re = M('Shop_basket')->where(array('sid' => 0,'shop_id' => 0, 'vipid' => self::$WAP['vipid']))->delete();
               $rold = $m->add($data);
                //echo $m->getlastsql();exit;
                if ($rold) {
                    $info['status'] = 1;
                  //  $info['msg'] = '库存检测通过！2秒后自动生成订单！';
                    $info['msg'] = '跳转中...';
                } else {
                    $info['status'] = 0;
                    $info['msg'] = '通讯失败，请重新尝试！';
                }
            } else {
                $re = M('Shop_basket')->where(array('sid' => 0,'shop_id' => 0, 'vipid' => self::$WAP['vipid']))->delete();
                $rold = $m->add($data);
                if ($rold) {
                    $info['status'] = 1;
                    //$info['msg'] = '库存检测通过！2秒后自动生成订单！';
                    $info['msg'] = '跳转中...';
                } else {
                    $info['status'] = 0;
                    $info['msg'] = '通讯失败，请重新尝试！';
                }
            }
            $this->ajaxReturn($info);
        } else {
            $this->diemsg(0, '禁止外部访问！');
        }
    }

    //Order逻辑
    public function orderMake()
    {
        if (IS_POST) {
            $morder = M('Shop_order');
            $data = I('post.');

            $data['items'] = stripslashes(htmlspecialchars_decode($data['items']));
            $gou_arr=unserialize($data['items']);
            $gou_id='';
            foreach($gou_arr as $k => $v){
                $gou_id .= $v['goodsid'] .',';
            }
            //var_dump($gou_id);die;

            $data['ispay'] = 0;
            $data['status'] = 1;//订单成功，未付款
            $data['ctime'] = time();
            //totalprice
            /*$totalprice = 0;
            $totalcprice = 0;
            $cache = M('Shop_basket')->where(array('vipid' => $_SESSION['WAP']['vipid']))->select();
            foreach ($cache as $k => $v) {
                //sku模型
                $goods = M('Shop_goods')->where('id=' . $v['goodsid'])->find();
                if ($v['sku']) {
                    $map['sku'] = $v['sku'];
                    $sku = M('Shop_goods_sku')->where($map)->find();
                    $v['price'] = $sku['price'];
                    $v['cprice'] = $sku['cprice'];
                    $totalprice = $totalprice + $v['price'] * $v['num'];
                    $totalcprice=$totalcprice+ $v['cprice']* $v['num'];
                } else {
                    $v['price'] = $goods['price'];
                    $v['cprice'] = $sku['cprice'];
                    $totalprice = $totalprice + $v['price'] * $v['num'];
                    $totalcprice=$totalcprice+ $v['cprice']* $v['num'];
                }
            }*/
            //var_dump($totalprice);die;
            //$data['totalprice'] = $totalprice;
            $data['payprice'] = $data['totalprice'];
            //$data['cprice'] = $totalcprice;
            $data['shop_id'] = session("shop_id");
            //var_dump($data);die;
            //代金卷流程
           /* if ($data['djqid']) {
                $mcard = M('Vip_card');
                $djq = $mcard->where('id=' . $data['djqid'])->find();
                if (!$djq) {
                    $this->error('通讯失败！请重新尝试支付！');
                }
                if ($djq['usetime']) {
                    $this->error('此代金卷已使用！');
                }
                $djq['status'] = 2;
                $djq['usetime'] = time();
                $rdjq = $mcard->save($djq);
                if (FALSE === $rdjq) {
                    $this->error('通讯失败！请重新尝试支付！');
                }
                //修改支付价格
                $data['payprice'] = $data['totalprice'] - $djq['money'];
                //修改结算总价
                $data['cprice'] = $data['cprice'] -$djq['money'];
            }*/
            //邮费逻辑
   /*         if (self::$WAP['shopset']['isyf']) {
                if ($data['totalprice'] >= self::$WAP['shopset']['yftop']) {
                    $data['yf'] = 0;
                } else {
                    if($data['isyf'] == 0){
                        $data['yf'] = 0;
                    }else{
                        $data['yf'] = self::$WAP['shopset']['yf'];
                    }
                    $data['payprice'] = $data['payprice'] + $data['yf'];
                }

            } else {
                $data['yf'] = 0;
            }*/


            $vip = session("WAP");
            $vip = $vip['vip'];
            $data['vipopenid']=$vip['mobile'];
            $data['yf'] = $data['yf'];
            //var_dump($data['yf']);die;
            $re = $morder->add($data);
            if ($re) {
                $old = $morder->where('id=' . $re)->setField('oid', date('YmdHis') . '-' . $re);
                if (FALSE !== $old) {
                    //后端日志
                    $mlog = M('Shop_order_syslog');
                    $dlog['oid'] = $re;
                    $dlog['msg'] = '订单创建成功';
                    $dlog['type'] = 1;
                    $dlog['ctime'] = time();
                    $dlog['shop_id'] = 21;
                    $rlog = $mlog->add($dlog);
                    //清空购物车
                    $gou_map['sid']= $data['sid'];
                    $gou_map['vipid']= $data['vipid'];
                    $gou_map['goodsid']= array('in',$gou_id);
                    $rbask = M('Shop_basket')->where($gou_map)->delete();
//					$this->success('订单创建成功，转向支付界面!',U('App/Shop/pay/',array('sid'=>$data['sid'],'orderid'=>$re)));
                    $this->redirect('App/Shop/pay/', array('sid' => $data['sid'], 'orderid' => $re));
                } else {
                    $old = $morder->delete($re);
                    $this->error('订单生成失败！请重新尝试！');
                }
            } else {
                //可能存在代金卷问题
                $this->error('订单生成失败！请重新尝试！');
            }

        } else {
            //非提交状态
            $sid = $_GET['sid'] <> '' ? $_GET['sid'] : $this->diemsg(0, '缺少SID参数');//sid可以为0
            $lasturl = $_GET['lasturl'] ? $_GET['lasturl'] : '';
            $basketlasturl = base64_decode($lasturl);
            $basketurl = U('App/Shop/basket', array('sid' => $sid, 'lasturl' => $lasturl));
            $backurl = base64_encode($basketurl);
            $basketloginurl = U('App/Vip/login', array('backurl' => $backurl));
//            $re = $this->checkLogin($backurl);
            //保存当前购物车地址
            $this->assign('basketurl', $basketurl);
            //保存登陆购物车地址
            $this->assign('basketloginurl', $basketloginurl);
            //保存购物车前地址
            $this->assign('basketlasturl', $basketlasturl);
            //保存lasturlencode
            //保存购物车加密地址，用于OrderMaker正常返回
            $this->assign('lasturlencode', $lasturl);
            $this->assign('sid', $sid);

            //清空临时地址
            unset($_SESSION['WAP']['orderURL']);
            //已登陆


            $dh=$_GET['dh'];

            $this->assign('dh', $dh);

            $m = M('Shop_basket');
            $mgoods = M('Shop_goods');
            $msku = M('Shop_goods_sku');
            $dhmap['sid'] = $sid;
            $dhmap['vipid'] = $_SESSION['WAP']['vipid'];
            $dhmap['shop_id']= 0;
            if($dh){
                $dhmap['id'] = array('in',$dh);
                $dhmap['shop_id']= 21;
            }


//            $cache = $m->where(array('sid' => $sid, 'vipid' => $_SESSION['WAP']['vipid']))->select();
            $cache = $m->where($dhmap)->select();

            //错误标记
            $errflag = 0;
            //等待删除ID
            $todelids = '';
            //totalprice
            $totalprice = 0;
            $totalprice_bate=0;
            //totalnum
            $totalnum = 0;
            //ismy纯免邮商品
            $ismy = count($cache);


            $vip = session("WAP");
            $vip = $vip['vip'];
            $user_vip = M('vip')->where(" id='".$vip['id']."' ")->find();

            foreach ($cache as $k => &$v) {
                //sku模型
                $goods = $mgoods->where('id=' . $v['goodsid'])->find();
               /* if($goods['ismy'] == 1){
                    $ismy = $ismy - 1;
                }*/
                $pic = $this->getPic($goods['listpic']);
                if ($v['sku']) {
                    //取商品数据				
                    if ($goods['issku'] && $goods['status']) {
                        $map['sku'] = $v['sku'];
                        $sku = $msku->where($map)->find();
                        if ($sku['status']) {
                            if ($sku['num']) {
                                //调整购买量
                                $cache[$k]['goodsid'] = $goods['id'];
                                $cache[$k]['skuid'] = $sku['id'];
                                $cache[$k]['name'] = $goods['name'];
                                $cache[$k]['skuattr'] = $sku['skuattr'];
                                $cache[$k]['num'] = $v['num'] > $sku['num'] ? $sku['num'] : $v['num'];
                                $cache[$k]['pic'] = $pic['imgurl'];
                                $totalnum = $totalnum + $cache[$k]['num'];



                                if($user_vip['fx_level']==1){
                                    $cache[$k]['price'] = $goods['price'];
                                    $cache[$k]['cprice'] = $goods['price'];
                                    $cache[$k]['total'] = $v['num'] * $goods['price'];
                                    $totalprice = $totalprice + $goods['price'] * $cache[$k]['num'];

                                    $totalprice_bate = $totalprice_bate + $goods['price_ceo_bate'] * $cache[$k]['num'];
                                    $cache[$k]['price_ceo_bate']=$goods['price_ceo_bate'];
                                }elseif($user_vip['fx_level']==2){
                                    $cache[$k]['price'] = $goods['price_ceo'];
                                    $cache[$k]['cprice'] = $goods['price_ceo'];
                                    $cache[$k]['total'] = $v['num'] * $goods['price_ceo'];
                                    $totalprice = $totalprice + $goods['price_ceo'] * $cache[$k]['num'];

                                    $totalprice_bate = $totalprice_bate + $goods['price_ceo_bate'] * $cache[$k]['num'];
                                    $cache[$k]['price_ceo_bate']=$goods['price_ceo_bate'];
                                }elseif($user_vip['fx_level']==3){
                                    $cache[$k]['price'] = $goods['price_center'];
                                    $cache[$k]['cprice'] = $goods['price_center'];
                                    $cache[$k]['total'] = $v['num'] * $goods['price_center'];
                                    $totalprice = $totalprice + $goods['price_center'] * $cache[$k]['num'];

                                    $totalprice_bate = $totalprice_bate + $goods['price_ceo_bate'] * $cache[$k]['num'];
                                    $cache[$k]['price_ceo_bate']=$goods['price_ceo_bate'];
                                }else{
                                    $cache[$k]['price'] = $goods['price'];
                                    $cache[$k]['cprice'] = $goods['price'];
                                    $cache[$k]['total'] = $v['num'] *$goods['price'];;
                                    $totalprice = $totalprice + $goods['price'] * $cache[$k]['num'];

                                    $totalprice_bate = $totalprice_bate + $goods['price'] * $cache[$k]['num'];
                                    $cache[$k]['price_ceo_bate']=$goods['price_ceo_bate'];
                                }



                            } else {
                                //无库存删除
                                $todelids = $todelids . $v['id'] . ',';
                                unset($cache[$k]);

                            }
                        } else {
                            //下架删除
                            $todelids = $todelids . $v['id'] . ',';
                            unset($cache[$k]);
                        }
                    } else {
                        //下架删除
                        $todelids = $todelids . $v['id'] . ',';
                        unset($cache[$k]);
                    }

                } else {
                    if ($goods['status']) {
                        if ($goods['num']) {
                            //调整购买量
                            $cache[$k]['goodsid'] = $goods['id'];
                            $cache[$k]['skuid'] = 0;
                            $cache[$k]['name'] = $goods['name'];
                            $cache[$k]['skuattr'] = $sku['skuattr'];
                            $cache[$k]['num'] = $v['num'] > $goods['num'] ? $goods['num'] : $v['num'];
                            $cache[$k]['pic'] = $pic['imgurl'];
                            $totalnum = $totalnum + $cache[$k]['num'];


                            if($user_vip['fx_level']==1){
                                $cache[$k]['price'] = $goods['price'];
                                $cache[$k]['cprice'] = $goods['price'];
                                $cache[$k]['total'] = $v['num'] * $goods['price'];
                                $totalprice = $totalprice + $goods['price'] * $cache[$k]['num'];

                                $totalprice_bate = $totalprice_bate + $goods['price_ceo_bate'] * $cache[$k]['num'];
                                $cache[$k]['price_ceo_bate']=$goods['price_ceo_bate'];
                            }elseif($user_vip['fx_level']==2){
                                $cache[$k]['price'] = $goods['price_ceo'];
                                $cache[$k]['cprice'] = $goods['price_ceo'];
                                $cache[$k]['total'] = $v['num'] * $goods['price_ceo'];
                                $totalprice = $totalprice + $goods['price_ceo'] * $cache[$k]['num'];

                                $totalprice_bate = $totalprice_bate + $goods['price_ceo_bate'] * $cache[$k]['num'];
                                $cache[$k]['price_ceo_bate']=$goods['price_ceo_bate'];
                            }elseif($user_vip['fx_level']==3){
                                $cache[$k]['price'] = $goods['price_center'];
                                $cache[$k]['cprice'] = $goods['price_center'];
                                $cache[$k]['total'] = $v['num'] * $goods['price_center'];
                                $totalprice = $totalprice + $goods['price_center'] * $cache[$k]['num'];

                                $totalprice_bate = $totalprice_bate + $goods['price_ceo_bate'] * $cache[$k]['num'];
                                $cache[$k]['price_ceo_bate']=$goods['price_ceo_bate'];
                            }else{
                                $cache[$k]['price'] = $goods['price'];
                                $cache[$k]['cprice'] = $goods['price'];
                                $cache[$k]['total'] = $v['num'] *$goods['price'];;
                                $totalprice = $totalprice + $goods['price'] * $cache[$k]['num'];

                                $totalprice_bate = $totalprice_bate + $goods['price'] * $cache[$k]['num'];
                                $cache[$k]['price_ceo_bate']=$goods['price_ceo_bate'];
                            }


                        } else {
                            //无库存删除
                            $todelids = $todelids . $v['id'] . ',';
                            unset($cache[$k]);
                        }
                    } else {
                        //下架删除
                        $todelids = $todelids . $v['id'] . ',';
                        unset($cache[$k]);
                    }
                }
            }
            if ($todelids) {
                $rdel = $m->delete($todelids);
                if (!$rdel) {
                    $this->error('购物车获取失败，请重新尝试！');
                }
            }

            //将商品列表
            sort($cache);
            $allitems = serialize($cache);
            $this->assign('allitems', $allitems);
            //VIP信息
            $vipadd = I('vipadd');
            if ($vipadd) {
                $vip = M('Vip_address')->where('id=' . $vipadd)->find();

                $vip['sheng']=M('City')->where("id = '{$vip['province']}'")->find()['name'];
                $vip['shi']=M('City')->where("id = '{$vip['city']}'")->find()['name'];
                $vip['qu']=M('City')->where("id = '{$vip['area']}'")->find()['name'];
                $vip['address']=$vip['sheng'].$vip['shi']. $vip['qu'].$vip['address'];

            } else {
                $vip = M('Vip_address')->where('vipid=' . $_SESSION['WAP']['vipid'])->find();
                $vip['sheng']=M('City')->where("id = '{$vip['province']}'")->find()['name'];
                $vip['shi']=M('City')->where("id = '{$vip['city']}'")->find()['name'];
                $vip['qu']=M('City')->where("id = '{$vip['area']}'")->find()['name'];
                $vip['address']=$vip['sheng'].$vip['shi']. $vip['qu'].$vip['address'];
            }
            //var_dump($vip);die;
            $this->assign('vip', $vip);
            //可用代金卷
            $mdjq = M('Vip_card');
            $mapdjq['type'] = 2;
            $mapdjq['vipid'] = $_SESSION['WAP']['vipid'];
            $mapdjq['status'] = 1;//1为可以使用
            $mapdjq['usetime'] = 0;
            $mapdjq['etime'] = array('gt', time());
            $mapdjq['usemoney'] = array('lt', $totalprice);
            $djq = $mdjq->field('id,money')->where($mapdjq)->select();
            $this->assign('djq', $djq);
            $youfei = M('Shop_set')->where("id='".session('shop_id')."'")->find();
            //邮费逻辑
            //var_dump($youfei);die;
            if ($youfei['isyf']) {

                $this->assign('isyf', 1);
                $yf = $totalprice >= $_SESSION['SHOP']['set']['yftop'] ? 0 : $_SESSION['SHOP']['set']['yf'];
                $allshop=$totalprice;
                $totalprice=$totalprice+$yf;
                //var_dump($yf);die;
                $this->assign('yf', $yf);
                $this->assign('yftop', $youfei['yftop']);
            } else {
                $allshop=$totalprice;
                $this->assign('isyf', 0);
                $this->assign('yf', 0);
            }           
            //是否可以用余额支付
            $useryue = $_SESSION['WAP']['vip']['money'];
            $isyue = $_SESSION['WAP']['vip']['money'] - $totalprice >= 0 ? 0 : 1;
            $this->assign('isyue', $isyue);
            //
            $this->assign('cache', $cache);
            $this->assign('allshop', $allshop);
            $this->assign('totalprice', $totalprice);
            $this->assign('totalprice_bate', $totalprice_bate);
            $this->assign('totalnum', $totalnum);
            $this->display();
        }

    }

    //订单地址跳转
    public function orderAddress()
    {
        $sid = I('sid');
        $dh = I('dh');
        //var_dump($dh);die;
        $lasturlencode = I('lasturl');
        $backurl = U('App/Shop/orderMake', array('sid' => $sid, 'lasturl' => $lasturlencode,'dh'=>$dh));
        $_SESSION['WAP']['orderURL'] = $backurl;
        $this->redirect('App/Vip/address');
    }

    //订单列表
    public function orderList()
    {
        $vipid = self::$WAP['vipid'];
        $data = self::$WAP['vip'];
        //var_dump($data);die;
        if(empty($data['mobile']) /*|| $data['mobile']==' '*/ ){
            $this->redirect('App/vip/login');exit;
        }
        $sid = I('sid') <> '' ? I('sid') : $this->diemsg(0, '缺少SID参数');//sid可以为0
        $type = I('type') ? I('type') : 4;
        $this->assign('type', $type);
        $bkurl = U('App/Shop/orderList', array('sid' => $sid, 'type' => $type));
        $backurl = base64_encode($bkurl);
        $loginurl = U('App/Vip/login', array('backurl' => $backurl));
//        $re = $this->checkLogin($backurl);
        //已登陆
        $m = M('Shop_order');
        $vipid = $_SESSION['WAP']['vipid'];
        $map['sid'] = $sid;
        $map['vipid'] = $vipid;
        switch ($type) {
            case '1':
                $map['status'] = 1;
                break;
            case '2':
//                $map['status'] = array('in', array('2', '3'));
                $map['status'] = 2;
                break;
            case '3':
//                $map['status'] = array('in', array('5', '6'));
                $map['status'] = 3;
                break;
            case '4':
                //全部
                $map['status'] = array('neq', '0');
                break;
            default:
                $map['status'] = 1;
                break;
        }
        $cache = $m->where($map)->order('ctime desc')->select();
        if ($cache) {
            foreach ($cache as $k => $v) {
                if ($v['items']) {
                    $cache[$k]['items'] = unserialize($v['items']);
                }
            }
        }
        $this->assign('cache', $cache);
        $this->assign('shopset', $_SESSION['WAP']['shopset']);
        $service_tel = '';
        $vip = M('Vip')->where(array('id' => $_SESSION['WAP']['vipid']))->find();
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
        //高亮底导航
        $this->assign('actname', 'ftorder');
        $this->assign('shopid', session("shop_id"));

        $moren_tb='dingdan';
        $this->assign('moren_tb', $moren_tb);

        $this->display();
    }

    //订单详情
    //订单列表
    public function orderDetail()
    {
        $sid = I('sid') <> '' ? I('sid') : $this->diemsg(0, '缺少SID参数');//sid可以为0
        $orderid = I('orderid') <> '' ? I('orderid') : $this->diemsg(0, '缺少ORDERID参数');
        $bkurl = U('App/Shop/orderDetail', array('sid' => $sid, 'orderid' => $orderid));
        $backurl = base64_encode($bkurl);
        $loginurl = U('App/Vip/login', array('backurl' => $backurl));
        $re = $this->checkLogin($backurl);
        //已登陆
        $m = M('Shop_order');
        $vipid = $_SESSION['WAP']['vipid'];
        $map['sid'] = $sid;
        $map['id'] = $orderid;
        $cache = $m->where($map)->find();
        if (!$cache) {
            $this->diemsg('此订单不存在!');
        }
        $cache['items'] = unserialize($cache['items']);
        //order日志
        $mlog = M('Shop_order_log');
        $log = $mlog->where('oid=' . $cache['id'])->select();
        $this->assign('log', $log);
        if (!$cache['status'] == 1) {
            //是否可以用余额支付
            $useryue = $_SESSION['WAP']['vip']['money'];
            $isyue = $_SESSION['WAP']['vip']['money'] - $cache['payprice'] >= 0 ? 0 : 1;
            $this->assign('isyue', $isyue);
        }
        $this->assign('cache', $cache);
        //代金卷调用
        if ($cache['djqid']) {
            $djq = M('Vip_card')->where('id=' . $cache['djqid'])->find();
            $this->assign('djq', $djq);
        }
        $service_tel = '';
        $vip = M('Vip')->where(array('id' => $_SESSION['WAP']['vipid']))->find();
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
        //高亮底导航
        $this->assign('actname', 'ftorder');
        $this->assign('shopid', session("shop_id"));
        $this->display();
    }

    //订单取消
    public function orderCancel()
    {
        $sid = I('sid') <> '' ? I('sid') : $this->diemsg(0, '缺少SID参数');//sid可以为0
        $orderid = I('orderid') <> '' ? I('orderid') : $this->diemsg(0, '缺少ORDERID参数');
        $bkurl = U('App/Shop/orderDetail', array('sid' => $sid, 'orderid' => $orderid));
        $backurl = base64_encode($bkurl);
        $loginurl = U('App/Vip/login', array('backurl' => $backurl));
        $re = $this->checkLogin($backurl);
        //已登陆
        $m = M('Shop_order');
        $map['sid'] = $sid;
        $map['id'] = $orderid;
        $cache = $m->where($map)->find();
        if (!$cache) {
            $this->diemsg(0, '此订单不存在!');
        }
        if ($cache['status'] <> 1) {
            $this->error('只有未付款订单可以取消！');
        }
        $re = $m->where($map)->setField('status', 0);
        if ($re) {
            //订单取消只有后端日志
            $mslog = M('Shop_order_syslog');
            $dlog['oid'] = $cache['id'];
            $dlog['msg'] = '订单取消';
            $dlog['type'] = 0;
            $dlog['ctime'] = time();
            $rlog = $mslog->add($dlog);
            $this->success('订单取消成功！');
        } else {
            $this->error('订单取消失败,请重新尝试！');
        }
    }

    //自动收货
    public function auto_receipt(){

        $map['_string'] = 'paytime<unix_timestamp(DATE_ADD(now(),INTERVAL -5 day))';
        $map['status']=3;

        $data=M('Shop_order')->where($map)->select();
        //var_dump($data);die;
        foreach($data as $k =>$v){
            $this->orderOK(0,$v['id']);
        }
    }


    //确认收货
    public function orderOK($sid,$orderid)
    {
        $sid = I('sid') <> '' ? I('sid') : $sid;//sid可以为0
        $orderid = I('orderid') <> '' ? I('orderid') : $orderid;
        //var_dump($orderid);die;
        $bkurl = U('App/Shop/orderDetail', array('sid' => $sid, 'orderid' => $orderid));
        $backurl = base64_encode($bkurl);
        $loginurl = U('App/Vip/login', array('backurl' => $backurl));
//        $re = $this->checkLogin($backurl);
        //已登陆
        $m = M('Shop_order');
        $map['sid'] = $sid;
        $map['id'] = $orderid;
        $cache = $m->where($map)->find();
        if (!$cache) {
            $this->diemsg(0, '此订单不存在!');
        }
        if ($cache['status'] <> 3) {
            $this->error('只有待收货订单可以确认收货！');
        }
        $cache['etime'] = time();//交易完成时间
        $cache['status'] = 5;
        $rod = $m->save($cache);


        $commission = D('Commission');
        $orderids = array();
        $orderids[] = $cache['id'];
        if (FALSE !== $rod) {
            //修改会员账户金额、经验、积分、等级
            $data_vip['id'] = $cache['vipid'];
            $data_vip['score'] = array('exp', 'score+' . $commission->ordersCommission('fx1rate', $orderids));
            $data_vip['exp'] = array('exp', 'exp+' .$commission->ordersCommission('fx1rate', $orderids));
            $data_vip['cur_exp'] = array('exp', 'cur_exp+' . $commission->ordersCommission2('fx1rate', $orderids));
            //var_dump($commission->ordersCommission2('fx1rate', $orderids));die;
            $level = $this->getLevel(self::$WAP['vip']['cur_exp'] + $commission->ordersCommission2('fx1rate', $orderids));
            $data_vip['levelid'] = $level['levelid'];
            $data_vip['fx_level'] = $level['levelid'];
            //会员分销统计字段
            //会员购买一次变成分销商
            //$data_vip['isfx'] = 1;
            //会员合计支付
            $data_vip['total_buy'] = $data_vip['total_buy'] + $cache['payprice'];
            /*if (self::$WAP['vipset']['cz_exp'] > 0) {
                $data_vip['exp'] = array('exp', 'exp+' . round($cache['payprice'] * self::$WAP['vipset']['cz_exp'] / 100));
                $data_vip['cur_exp'] = array('exp', 'cur_exp+' . round($cache['payprice'] * self::$WAP['vipset']['cz_exp'] / 100));
                $level = $this->getLevel(self::$WAP['vip']['cur_exp'] + round($cache['payprice'] * self::$WAP['vipset']['cz_exp'] / 100));
                $data_vip['levelid'] = $level['levelid'];
                //会员分销统计字段
                //会员购买一次变成分销商
                $data_vip['isfx'] = 1;
                //会员合计支付
                $data_vip['total_buy'] = $data_vip['total_buy'] + $cache['payprice'];
            }*/
            //var_dump($data_vip);die;
            $re = M('vip')->save($data_vip);
            if (FALSE === $re) {
                $this->error('更新会员信息失败！');
            }

            //分销佣金计算


            $pid = $_SESSION['WAP']['vip']['pid'];
            $mvip = M('vip');
            $mfxlog = M('fx_syslog');
            $fxlog['oid'] = $cache['id'];
            $fxlog['fxprice'] = $fxprice = $cache['payprice'] - $cache['yf'];
            $fxlog['ctime'] = time();
            // $fx1rate=self::$WAP['shopset']['fx1rate']/100;
            // $fx2rate=self::$WAP['shopset']['fx2rate']/100;
            // $fx3rate=self::$WAP['shopset']['fx3rate']/100;
            $fxtmp = array();//缓存3级数组

            $p_user=M('Vip')->where("id = '{$pid}' ")->find();
            //var_dump($p_user['recommend_code']);die;
            if($p_user['recommend_code'] == 'df00002' && $p_user['bond_status'] == 1) {

                    if ($pid && $p_user['fx_level'] > 1 && $_SESSION['WAP']['vip']['one_buy_status'] > 0) {
                        //第一层分销
                        $fx1 = $mvip->where('id=' . $pid)->find();
                        if ($fx1['isfx']) {
                            $fxlog['fxyj'] = round($cache['totalprice_bate']) * $_SESSION['SHOP']['set']['fx1baifenbi'] / 100;
                            //var_dump($fxlog['fxyj']);die;
                            $fx1['money'] = $fx1['money'] + $fxlog['fxyj'];
                            $fx1['total_xxbuy'] = $fx1['total_xxbuy'] + 1;//下线中购买产品总次数
                            $fx1['total_xxyj'] = $fx1['total_xxyj'] + $fxlog['fxyj'];//下线贡献佣金

                            $rfx = $mvip->save($fx1);

                            $rebate_data['pid'] = $pid;
                            $rebate_data['order_id'] = $cache['id'];
                            $rebate_data['buyid'] = $_SESSION['WAP']['vip']['id'];
                            $rebate_data['rebate_money'] = $fxlog['fxyj'];
                            $rebate_data['content'] = '返利';
                            $rebate_data['time'] = date("Y-m-d H:i:s");
                            $rebate_res = M('Rebate')->add($rebate_data);
                            if($fxlog['fxyj']>0){
                                $this->sendmsg2($fx1['nickname'],$cache['oid'],$fx1['mobile'],$fxlog['fxyj'],4);
                            }


                            $fxlog['from'] = $_SESSION['WAP']['vipid'];
                            $fxlog['fromname'] = $_SESSION['WAP']['vip']['nickname'];
                            $fxlog['to'] = $fx1['id'];
                            $fxlog['toname'] = $fx1['nickname'];
                            if (FALSE !== $rfx) {
                                //佣金发放成功
                                $fxlog['status'] = 1;
                            } else {
                                //佣金发放失败
                                $fxlog['status'] = 0;
                            }
                            //单层逻辑
                            //$rfxlog=$mfxlog->add($fxlog);
                            //file_put_contents('./Data/app_debug.txt','日志时间:'.date('Y-m-d H:i:s').PHP_EOL.'纪录信息:'.$rfxlog.PHP_EOL.PHP_EOL.$mfxlog->getLastSql().PHP_EOL.PHP_EOL,FILE_APPEND);
                            array_push($fxtmp, $fxlog);
                        }
                        //第二层分销
                        if ($fx1['pid']) {
                            $fx2 = $mvip->where('id=' . $fx1['pid'])->find();
                            if ($fx2['isfx'] && $fx2['fx_level'] > 1) {
                                $fxlog['fxyj'] = round($cache['totalprice_bate']) * $_SESSION['SHOP']['set']['fx2baifenbi'] / 100;
                                $fx2['money'] = $fx2['money'] + $fxlog['fxyj'];
                                $fx2['total_xxbuy'] = $fx2['total_xxbuy'] + 1;//下线中购买产品人数计数
                                $fx2['total_xxyj'] = $fx2['total_xxyj'] + $fxlog['fxyj'];//下线贡献佣金
                                $rfx = $mvip->save($fx2);

                                $rebate_data['pid'] = $fx1['pid'];
                                $rebate_data['order_id'] = $cache['id'];
                                $rebate_data['buyid'] = $_SESSION['WAP']['vip']['id'];
                                $rebate_data['rebate_money'] = $fxlog['fxyj'];
                                $rebate_data['content'] = '返利';
                                $rebate_data['time'] = date("Y-m-d H:i:s");
                                $rebate_res = M('Rebate')->add($rebate_data);

                                if($fxlog['fxyj']>0){
                                    $this->sendmsg2($fx2['nickname'],$cache['oid'],$fx2['mobile'],$fxlog['fxyj'],4);
                                }


                                $fxlog['from'] = $_SESSION['WAP']['vipid'];
                                $fxlog['fromname'] = $_SESSION['WAP']['vip']['nickname'];
                                $fxlog['to'] = $fx2['id'];
                                $fxlog['toname'] = $fx2['nickname'];
                                if (FALSE !== $rfx) {
                                    //佣金发放成功
                                    $fxlog['status'] = 1;
                                } else {
                                    //佣金发放失败
                                    $fxlog['status'] = 0;
                                }
                                //单层逻辑
                                //$rfxlog=$mfxlog->add($fxlog);
                                //file_put_contents('./Data/app_debug.txt','日志时间:'.date('Y-m-d H:i:s').PHP_EOL.'纪录信息:'.$rfxlog.PHP_EOL.PHP_EOL.$mfxlog->getLastSql().PHP_EOL.PHP_EOL,FILE_APPEND);
                                array_push($fxtmp, $fxlog);
                            }
                        }
                        /* //第三层分销
                         if ($fx2['pid']) {
                             $fx3 = $mvip->where('id=' . $fx2['pid'])->find();
                             if ($fx3['isfx']) {
                                 $fxlog['fxyj'] = $commission->ordersCommission('fx3rate', $orderids);
                                 $fx3['money'] = $fx3['money'] + $fxlog['fxyj'];
                                 $fx3['total_xxbuy'] = $fx3['total_xxbuy'] + 1;//下线中购买产品人数计数
                                 $fx3['total_xxyj'] = $fx3['total_xxyj'] + $fxlog['fxyj'];//下线贡献佣金
                                 $rfx = $mvip->save($fx3);
                                 $fxlog['from'] = $_SESSION['WAP']['vipid'];
                                 $fxlog['fromname'] = $_SESSION['WAP']['vip']['nickname'];
                                 $fxlog['to'] = $fx3['id'];
                                 $fxlog['toname'] = $fx3['nickname'];
                                 if (FALSE !== $rfx) {
                                     //佣金发放成功
                                     $fxlog['status'] = 1;
                                 } else {
                                     //佣金发放失败
                                     $fxlog['status'] = 0;
                                 }
                                 //单层逻辑
                                 //$rfxlog=$mfxlog->add($fxlog);
                                 //file_put_contents('./Data/app_debug.txt','日志时间:'.date('Y-m-d H:i:s').PHP_EOL.'纪录信息:'.$rfxlog.PHP_EOL.PHP_EOL.$mfxlog->getLastSql().PHP_EOL.PHP_EOL,FILE_APPEND);
                                 array_push($fxtmp, $fxlog);
                             }
                         }*/
                        //多层分销
                        if (count($fxtmp) >= 1) {
                            $refxlog = $mfxlog->addAll($fxtmp);
                            if (!$refxlog) {
                                file_put_contents('./Data/app_fx_error.txt', '错误日志时间:' . date('Y-m-d H:i:s') . PHP_EOL . '错误纪录信息:' . $rfxlog . PHP_EOL . PHP_EOL . $mfxlog->getLastSql() . PHP_EOL . PHP_EOL, FILE_APPEND);
                            }
                        }
                        //花鼓分销方案
                        /*$allhg = $mvip->field('id')->where('isfxgd=1')->select();
                        if ($allhg) {
                            $tmppath = array_slice(explode('-', $_SESSION['WAP']['vip']['path']), -20);
                            $tmphg = array();
                            foreach ($allhg as $v) {
                                array_push($tmphg, $v['id']);
                            }
                            //需要计算的花鼓
                            $needhg = array_intersect($tmphg, $tmppath);
                            if (count($needhg)) {
                                $fxlog['oid'] = $cache['id'];
                                $fxlog['fxprice'] = $fxprice;
                                $fxlog['ctime'] = time();
                                $fxlog['fxyj'] = $fxprice * 0.05;
                                $fxlog['from'] = $_SESSION['WAP']['vipid'];
                                $fxlog['fromname'] = $_SESSION['WAP']['vip']['nickname'];
                                foreach ($needhg as $k => $v) {
                                    $hg = $mvip->where('id=' . $v)->find();
                                    if ($hg) {
                                        $rhg = $mvip->where('id=' . $v)->setInc('money', $fxlog['fxyj']);
                                        if ($rhg) {
                                            $fxlog['to'] = $hg['id'];
                                            $fxlog['toname'] = $hg['nickname'] . '[花股收益]';
                                            $rehgfxlog = $mfxlog->add($fxlog);
                                        }
                                    }
                                }
                            }
                        }*/

                    }
            }elseif($p_user['recommend_code'] != 'df00002'){
                //var_dump(1);die;
                if ($pid && $p_user['fx_level'] > 1 && $_SESSION['WAP']['vip']['one_buy_status'] > 0) {
                    //第一层分销
                    $fx1 = $mvip->where('id=' . $pid)->find();
                    if ($fx1['isfx']) {
                        $fxlog['fxyj'] = round($cache['totalprice_bate']) * $_SESSION['SHOP']['set']['fx1baifenbi'] / 100;
                        //var_dump($fxlog['fxyj']);die;
                        $fx1['money'] = $fx1['money'] + $fxlog['fxyj'];
                        $fx1['total_xxbuy'] = $fx1['total_xxbuy'] + 1;//下线中购买产品总次数
                        $fx1['total_xxyj'] = $fx1['total_xxyj'] + $fxlog['fxyj'];//下线贡献佣金

                        $rfx = $mvip->save($fx1);

                        $rebate_data['pid'] = $pid;
                        $rebate_data['order_id'] = $cache['id'];
                        $rebate_data['buyid'] = $_SESSION['WAP']['vip']['id'];
                        $rebate_data['rebate_money'] = $fxlog['fxyj'];
                        $rebate_data['content'] = '返利';
                        $rebate_data['time'] = date("Y-m-d H:i:s");
                        $rebate_res = M('Rebate')->add($rebate_data);

                        if($fxlog['fxyj']>0){
                            $this->sendmsg2($fx1['nickname'],$cache['oid'],$fx1['mobile'],$fxlog['fxyj'],4);
                        }

                        $fxlog['from'] = $_SESSION['WAP']['vipid'];
                        $fxlog['fromname'] = $_SESSION['WAP']['vip']['nickname'];
                        $fxlog['to'] = $fx1['id'];
                        $fxlog['toname'] = $fx1['nickname'];
                        if (FALSE !== $rfx) {
                            //佣金发放成功
                            $fxlog['status'] = 1;
                        } else {
                            //佣金发放失败
                            $fxlog['status'] = 0;
                        }
                        //单层逻辑
                        //$rfxlog=$mfxlog->add($fxlog);
                        //file_put_contents('./Data/app_debug.txt','日志时间:'.date('Y-m-d H:i:s').PHP_EOL.'纪录信息:'.$rfxlog.PHP_EOL.PHP_EOL.$mfxlog->getLastSql().PHP_EOL.PHP_EOL,FILE_APPEND);
                        array_push($fxtmp, $fxlog);
                    }
                    //第二层分销
                    if ($fx1['pid']) {
                        $fx2 = $mvip->where('id=' . $fx1['pid'])->find();
                        if ($fx2['isfx'] && $fx2['fx_level'] > 1) {
                            $fxlog['fxyj'] = round($cache['totalprice_bate']) * $_SESSION['SHOP']['set']['fx2baifenbi'] / 100;
                            $fx2['money'] = $fx2['money'] + $fxlog['fxyj'];
                            $fx2['total_xxbuy'] = $fx2['total_xxbuy'] + 1;//下线中购买产品人数计数
                            $fx2['total_xxyj'] = $fx2['total_xxyj'] + $fxlog['fxyj'];//下线贡献佣金
                            $rfx = $mvip->save($fx2);

                            $rebate_data['pid'] = $fx1['pid'];
                            $rebate_data['order_id'] = $cache['id'];
                            $rebate_data['buyid'] = $_SESSION['WAP']['vip']['id'];
                            $rebate_data['rebate_money'] = $fxlog['fxyj'];
                            $rebate_data['content'] = '返利';
                            $rebate_data['time'] = date("Y-m-d H:i:s");
                            $rebate_res = M('Rebate')->add($rebate_data);

                            if($fxlog['fxyj']>0){
                                $this->sendmsg2($fx2['nickname'],$cache['oid'],$fx2['mobile'],$fxlog['fxyj'],4);
                            }

                            $fxlog['from'] = $_SESSION['WAP']['vipid'];
                            $fxlog['fromname'] = $_SESSION['WAP']['vip']['nickname'];
                            $fxlog['to'] = $fx2['id'];
                            $fxlog['toname'] = $fx2['nickname'];
                            if (FALSE !== $rfx) {
                                //佣金发放成功
                                $fxlog['status'] = 1;
                            } else {
                                //佣金发放失败
                                $fxlog['status'] = 0;
                            }
                            //单层逻辑
                            //$rfxlog=$mfxlog->add($fxlog);
                            //file_put_contents('./Data/app_debug.txt','日志时间:'.date('Y-m-d H:i:s').PHP_EOL.'纪录信息:'.$rfxlog.PHP_EOL.PHP_EOL.$mfxlog->getLastSql().PHP_EOL.PHP_EOL,FILE_APPEND);
                            array_push($fxtmp, $fxlog);
                        }
                    }
                    /* //第三层分销
                     if ($fx2['pid']) {
                         $fx3 = $mvip->where('id=' . $fx2['pid'])->find();
                         if ($fx3['isfx']) {
                             $fxlog['fxyj'] = $commission->ordersCommission('fx3rate', $orderids);
                             $fx3['money'] = $fx3['money'] + $fxlog['fxyj'];
                             $fx3['total_xxbuy'] = $fx3['total_xxbuy'] + 1;//下线中购买产品人数计数
                             $fx3['total_xxyj'] = $fx3['total_xxyj'] + $fxlog['fxyj'];//下线贡献佣金
                             $rfx = $mvip->save($fx3);
                             $fxlog['from'] = $_SESSION['WAP']['vipid'];
                             $fxlog['fromname'] = $_SESSION['WAP']['vip']['nickname'];
                             $fxlog['to'] = $fx3['id'];
                             $fxlog['toname'] = $fx3['nickname'];
                             if (FALSE !== $rfx) {
                                 //佣金发放成功
                                 $fxlog['status'] = 1;
                             } else {
                                 //佣金发放失败
                                 $fxlog['status'] = 0;
                             }
                             //单层逻辑
                             //$rfxlog=$mfxlog->add($fxlog);
                             //file_put_contents('./Data/app_debug.txt','日志时间:'.date('Y-m-d H:i:s').PHP_EOL.'纪录信息:'.$rfxlog.PHP_EOL.PHP_EOL.$mfxlog->getLastSql().PHP_EOL.PHP_EOL,FILE_APPEND);
                             array_push($fxtmp, $fxlog);
                         }
                     }*/
                    //多层分销
                    if (count($fxtmp) >= 1) {
                        $refxlog = $mfxlog->addAll($fxtmp);
                        if (!$refxlog) {
                            file_put_contents('./Data/app_fx_error.txt', '错误日志时间:' . date('Y-m-d H:i:s') . PHP_EOL . '错误纪录信息:' . $rfxlog . PHP_EOL . PHP_EOL . $mfxlog->getLastSql() . PHP_EOL . PHP_EOL, FILE_APPEND);
                        }
                    }
                    //花鼓分销方案
                    /*$allhg = $mvip->field('id')->where('isfxgd=1')->select();
                    if ($allhg) {
                        $tmppath = array_slice(explode('-', $_SESSION['WAP']['vip']['path']), -20);
                        $tmphg = array();
                        foreach ($allhg as $v) {
                            array_push($tmphg, $v['id']);
                        }
                        //需要计算的花鼓
                        $needhg = array_intersect($tmphg, $tmppath);
                        if (count($needhg)) {
                            $fxlog['oid'] = $cache['id'];
                            $fxlog['fxprice'] = $fxprice;
                            $fxlog['ctime'] = time();
                            $fxlog['fxyj'] = $fxprice * 0.05;
                            $fxlog['from'] = $_SESSION['WAP']['vipid'];
                            $fxlog['fromname'] = $_SESSION['WAP']['vip']['nickname'];
                            foreach ($needhg as $k => $v) {
                                $hg = $mvip->where('id=' . $v)->find();
                                if ($hg) {
                                    $rhg = $mvip->where('id=' . $v)->setInc('money', $fxlog['fxyj']);
                                    if ($rhg) {
                                        $fxlog['to'] = $hg['id'];
                                        $fxlog['toname'] = $hg['nickname'] . '[花股收益]';
                                        $rehgfxlog = $mfxlog->add($fxlog);
                                    }
                                }
                            }
                        }
                    }*/

                }
            }

            //第一次购买
            //var_dump($_SESSION['WAP']['vip']['one_buy_status']);die;
            if($_SESSION['WAP']['vip']['one_buy_status'] == 0){
                //var_dump(2);die;
                $vipopenid=$_SESSION['WAP']['vip']['mobile'];
                $onemap['vipopenid']=$vipopenid;
                $onedata=M('Shop_order')->where($onemap)->order('paytime asc')->limit(1)->select()[0];
                //if($onedata['id'] == $cache['id']){
                    if($cache['totalprice']>=3000){
                        $pid_fx_level=M('Vip')->where("id = {$pid}")->getField('fx_level');
                        $p_user=M('Vip')->where("id = {$pid}")->find();
                        if($pid_fx_level>1){
                            if($cache['totalprice']>=3000 && $cache['totalprice']<10000){
                                $one_reward=$_SESSION['SHOP']['set']['first_one'];
                            }elseif($cache['totalprice'] >=10000){
                                $one_reward=$_SESSION['SHOP']['set']['first_two'];
                            }
                            $one_res=M('Vip')->where("id = {$pid}")->setInc('money',$one_reward);
                            M('Vip')->where("id = {$_SESSION['WAP']['vip']['id']}")->setField('one_buy_status',1);
                            if($one_res){
                                $rebate_data['pid']=$pid;
                                $rebate_data['order_id']=$cache['id'];
                                $rebate_data['buyid']=$_SESSION['WAP']['vip']['id'];
                                $rebate_data['rebate_money']=$one_reward;
                                $rebate_data['content']='首次购买奖励';
                                $rebate_data['time']=date("Y-m-d H:i:s");
                                $rebate_res=M('Rebate')->add($rebate_data);

                                $this->sendmsg2($p_user['nickname'],$cache['oid'],$p_user['mobile'],$one_reward,5);
                            }
                        }
                    }else{
                        //var_dump(3);die;
                        M('Vip')->where("id = {$_SESSION['WAP']['vip']['id']}")->setField('one_buy_status',1);
                    }
                //}
            }

            //挂靠人奖励
            $anchored_id=$_SESSION['WAP']['vip']['anchored_id'];
//var_dump($anchored_id);die;
            if($anchored_id){
                $anchored_reward= round($cache['totalprice_bate']) * $_SESSION['SHOP']['set']['gkbaifenbi']/100;
                $anchored_res=M('Vip')->where("id = {$anchored_id}")->setInc('money',$anchored_reward);
                $anchored_info=M('Vip')->where("id = {$anchored_id}")->find();
                if($anchored_res){
                    $rebate_data['pid']=$anchored_id;
                    $rebate_data['order_id']=$cache['id'];
                    $rebate_data['buyid']=$_SESSION['WAP']['vip']['id'];
                    $rebate_data['rebate_money']=$anchored_reward;
                    $rebate_data['content']='被挂靠人奖励';
                    $rebate_data['time']=date("Y-m-d H:i:s");
                    $rebate_res=M('Rebate')->add($rebate_data);

                    $this->sendmsg2($anchored_info['nickname'],$cache['oid'],$anchored_info['mobile'],$anchored_reward,6);
                }
            }


            $mlog = M('Shop_order_log');
            $dlog['oid'] = $cache['id'];
            $dlog['msg'] = '确认收货,交易完成。';
            $dlog['ctime'] = time();
            $rlog = $mlog->add($dlog);

            //后端日志
            $mlog = M('Shop_order_syslog');
            $dlog['oid'] = $cache['id'];
            $dlog['msg'] = '交易完成-会员点击';
            $dlog['type'] = 5;
            $dlog['paytype'] = $cache['paytype'];
            $dlog['ctime'] = time();
            $rlog = $mlog->add($dlog);
            $this->success('交易已完成，感谢您的支持！');
        } else {
            //后端日志
            $mlog = M('Shop_order_syslog');
            $dlog['oid'] = $cache['id'];
            $dlog['msg'] = '确认收货失败';
            $dlog['type'] = -1;
            $dlog['paytype'] = $cache['paytype'];
            $dlog['ctime'] = time();
            $rlog = $mlog->add($dlog);
            $this->error('确认收货失败，请重新尝试！');
        }
    }


    //发送短信
    public function sendmsg2($nickname,$oid,$mobile,$money,$gettype){
        $phone=$mobile;
        $money=$money;
        $gettype=$gettype;

        $sms_templateM=M('sms_template');
        $yanzhengxinxi=$sms_templateM->where("type={$gettype}")->field('id,content,active_time')->find();
        $yanzhengcontent=str_replace('[money]',$money,$yanzhengxinxi['content']);
        $yanzhengcontent=str_replace('[nickname]',$nickname,$yanzhengcontent);
        $yanzhengcontent=str_replace('[oid]',$oid,$yanzhengcontent);


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
//            $data['code'] = $code;
            $res=$sms_phone->add($data);

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





    //订单退货
    public function orderTuihuo()
    {
        $sid = I('sid') <> '' ? I('sid') : $this->diemsg(0, '缺少SID参数');//sid可以为0
        $orderid = I('orderid') <> '' ? I('orderid') : $this->diemsg(0, '缺少ORDERID参数');
        $bkurl = U('App/Shop/orderTuihuo', array('sid' => $sid, 'orderid' => $orderid));
        $backurl = base64_encode($bkurl);
        $loginurl = U('App/Vip/login', array('backurl' => $backurl));
        $re = $this->checkLogin($backurl);
        //已登陆
        $m = M('Shop_order');
        $vipid = $_SESSION['WAP']['vipid'];
        $map['sid'] = $sid;
        $map['id'] = $orderid;
        $cache = $m->where($map)->find();
        if (!$cache) {
            $this->diemsg('此订单不存在!');
        }
        $cache['items'] = unserialize($cache['items']);

        $this->assign('cache', $cache);
        //代金卷调用
        if ($cache['djqid']) {
            $djq = M('Vip_card')->where('id=' . $cache['djqid'])->find();
            $this->assign('djq', $djq);
        }
        $service_tel = '';
        $vip = M('Vip')->where(array('id' => $_SESSION['WAP']['vipid']))->find();
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
        //高亮底导航
        $this->assign('actname', 'ftorder');
        $this->display();
    }

    //订单取消
    public function orderTuihuoSave()
    {
        $sid = I('sid') <> '' ? I('sid') : $this->diemsg(0, '缺少SID参数');//sid可以为0
        $orderid = I('orderid') <> '' ? I('orderid') : $this->diemsg(0, '缺少ORDERID参数');
        $bkurl = U('App/Shop/orderTuihuo', array('sid' => $sid, 'orderid' => $orderid));
        $backurl = base64_encode($bkurl);
        $loginurl = U('App/Vip/login', array('backurl' => $backurl));
        $re = $this->checkLogin($backurl);
        //已登陆
        $m = M('Shop_order');
        $map['sid'] = $sid;
        $map['id'] = $orderid;
        $cache = $m->where($map)->find();
        if (!$cache) {
            $this->diemsg(0, '此订单不存在!');
        }
        if ($cache['status'] <> 3) {
            $this->error('只有待收货订单可以办理退货！');
        }
        $data = I('post.');
        $cache['status'] = 4;
        $cache['tuihuoprice'] = $data['tuihuoprice'];
        $cache['tuihuokd'] = $data['tuihuokd'];
        $cache['tuihuokdnum'] = $data['tuihuokdnum'];
        $cache['tuihuomsg'] = $data['tuihuomsg'];
        //退货申请时间
        $cache['tuihuosqtime'] = time();
        $re = $m->where($map)->save($cache);
        if ($re) {
            //后端日志
            $mlog = M('Shop_order_log');
            $mslog = M('Shop_order_syslog');
            $dlog['oid'] = $cache['id'];
            $dlog['msg'] = '申请退货';
            $dlog['ctime'] = time();
            $rlog = $mlog->add($dlog);
            $dlog['type'] = 4;
            $rslog = $mslog->add($dlog);
            $this->success('申请退货成功！请等待工作人员审核！');
        } else {
            $this->error('申请退货失败,请重新尝试！');
        }
    }

    //订单支付
    public function pay()
    {
        $sid = I('sid') <> '' ? I('sid') : $this->diemsg(0, '缺少SID参数');//sid可以为0
        $orderid = I('orderid') <> '' ? I('orderid') : $this->diemsg(0, '缺少ORDERID参数');
        $type = I('type');
        $bkurl = U('App/Shop/pay', array('sid' => $sid, 'orderid' => $orderid, 'type' => $type));
//		$backurl=base64_encode($orderdetail);
        $backurl = base64_encode($bkurl);
        $loginurl = U('App/Vip/login', array('backurl' => $backurl));
//        $re = $this->checkLogin($backurl);
        //已登陆
        $m = M('Shop_order');
        $order = $m->where('id=' . $orderid)->find();
        if (!$order) {
            $this->error('此订单不存在！');
        }
        if ($order['status'] <> 1) {
            $this->error('此订单不可以支付！');
        }
        $paytype = I('type') ? I('type') : $order['paytype'];
        switch ($paytype) {
            case 'money':
                $mvip = M('Vip');
                $vip = $mvip->where('id=' . $_SESSION['WAP']['vipid'])->find();
                $pp = $vip['money'] - $order['payprice'];
                if ($pp >= 0) {
                    $re = $mvip->where('id=' . $_SESSION['WAP']['vipid'])->setField('money', $pp);
                    if ($re) {
                        $order['paytype'] = 'money';
                        $order['ispay'] = 1;
                        $order['paytime'] = time();
                        $order['status'] = 2;
                        $rod = $m->save($order);
                        if (FALSE !== $rod) {
                            //销量计算-只减不增
                            $rsell = $this->doSells($order);

                            //返现开启
                            $order1 = D('ShopOrder')->get(array('id' => $orderid));
                            $asd = unserialize($order1["items"]);
                            $time = strtotime(date("Y-m-d"));//当前时间
                            foreach ($asd as $key => $value) {
                                $product = D('ShopGoods')->get(array('id' => $value["goodsid"]));

                                if($product["cashback"] == "1"){
                                    $data["vip_id"] = $order1["vipid"];
                                    $data["order_id"] = $order1["oid"];
                                    $data["money"] = $value["total"];
                                    $data["dayback"] = $value["total"]*$product["backratio"];
                                    $data["lasttime"] = $time;

                                    $result = D('Cashback')->add($data);
                                }
                            }                            

                            //前端日志
                            $mlog = M('Shop_order_log');
                            $dlog['oid'] = $order['id'];
                            $dlog['msg'] = '余额-付款成功';
                            $dlog['ctime'] = time();
                            $rlog = $mlog->add($dlog);
                            //后端日志
                            $mlog = M('Shop_order_syslog');
                            $dlog['type'] = 2;
                            $rlog = $mlog->add($dlog);
                            //$this->success('余额付款成功！', U('App/Shop/orderList', array('sid' => $sid, 'type' => '2')));

                            $this->redirect(U('App/Shop/pay_success', array('sid' => $sid, 'type' => '2')));

                             // 插入订单支付成功模板消息=====================
                            $templateidshort = 'OPENTM200444326';
                            $dwechat = D('Wechat');
                            $templateid = $dwechat->getTemplateId($templateidshort);
                            if ($templateid) { // 存在才可以发送模板消息
                                $data = array();
                                $data['touser'] = $vip['openid'];
                                $data['template_id'] = $templateid;
                                $data['topcolor'] = "#00FF00";
                                $data['data'] = array(
                                    'first' => array('value' => '您好，您的订单已付款成功'),
                                    'keyword1' => array('value' => $order['oid']),
                                    'keyword2' => array('value' => date("Y-m-d h:i:sa", $order['paytime'])),
                                    'keyword3' => array('value' => $order['payprice']),
                                    'keyword4' => array('value' => $order['paytype']),
                                    'remark' => array('value' => '')
                                );
                                $options['appid'] = self::$_wxappid;
                                $options['appsecret'] = self::$_wxappsecret;
                                $wx = new \Util\Wx\Wechat($options);
                                $re = $wx->sendTemplateMessage($data);
                            }
                            // 插入订单支付成功模板消息结束=================

                            //首次支付成功自动变为花蜜
                            if ($vip && !$vip['isfx']) {
                                $rvip = $mvip->where('id=' . $_SESSION['WAP']['vipid'])->setField('isfx', 1);
                                $data_msg['pids'] = $_SESSION['WAP']['vipid'];

                                $shopset = self::$WAP['shopset'] = $_SESSION['WAP']['shopset'];
                                $data_msg['title'] = "您成功升级为" . $shopset['name'] . "的" . $shopset['fxname'] . "！";
                                $data_msg['content'] = "欢迎成为" . $shopset['name'] . "的" . $shopset['fxname'] . "，开启一个新的旅程！";
                                $data_msg['ctime'] = time();
                                $rmsg = M('vip_message')->add($data_msg);
                            }

                            //代收花生米计算-只减不增
                            $rds = $this->doDs($order);

                        } else {
                            //后端日志
                            $mlog = M('Shop_order_syslog');
                            $dlog['oid'] = $order['id'];
                            $dlog['msg'] = '余额付款失败';
                            $dlog['type'] = -1;
                            $dlog['ctime'] = time();
                            $rlog = $mlog->add($dlog);
                            $this->error('余额付款失败！请联系客服！');
                        }

                    } else {
                        //后端日志
                        $mlog = M('Shop_order_syslog');
                        $dlog['oid'] = $order['id'];
                        $dlog['msg'] = '余额付款失败';
                        $dlog['type'] = -1;
                        $dlog['ctime'] = time();
                        $this->error('余额支付失败，请重新尝试！');
                    }
                } else {
                    $this->error('余额不足，请使用其它方式付款！');
                }
                break;
            case 'alipayApp':
                $this->redirect("App/Alipay/alipay", array('sid' => $sid, 'price' => $order['payprice'], 'oid' => $order['oid']));
                break;
            case 'wxpay':
                $_SESSION['wxpaysid'] = 0;
                $_SESSION['wxpayopenid'] = $_SESSION['WAP']['vip']['openid'];//追入会员openid
                $this->redirect('Home/Wxpay/pay', array('oid' => $order['oid']));
                break;
            default:
                $this->error('支付方式未知！');
                break;
        }

    }

    public function pay_success(){
        $this->assign('sid',$_GET['sid']);
        $this->assign('type',2);
        $this->display();
    }

    //销量计算
    private function doSells($order)
    {
        $mgoods = M('Shop_goods');
        $msku = M('Shop_goods_sku');
        $mlogsell = M('Shop_syslog_sells');
        //封装dlog
        $dlog['oid'] = $order['id'];
        $dlog['vipid'] = $order['vipid'];
        $dlog['vipopenid'] = $order['vipopenid'];
        $dlog['vipname'] = $order['vipname'];
        $dlog['ctime'] = time();
        $items = unserialize($order['items']);
        $tmplog = array();
        foreach ($items as $k => $v) {
            //销售总量
            $dnum = $dlog['num'] = $v['num'];
            if ($v['skuid']) {
                $rg = $mgoods->where('id=' . $v['goodsid'])->setDec('num', $dnum);
                $rg = $mgoods->where('id=' . $v['goodsid'])->setInc('sells', $dnum);
                $rg = $mgoods->where('id=' . $v['goodsid'])->setInc('dissells', $dnum);
                $rs = $msku->where('id=' . $v['skuid'])->setDec('num', $dnum);
                $rs = $msku->where('id=' . $v['skuid'])->setInc('sells', $dnum);
                //sku模式
                $dlog['goodsid'] = $v['goodsid'];
                $dlog['goodsname'] = $v['name'];
                $dlog['skuid'] = $v['skuid'];
                $dlog['skuattr'] = $v['skuattr'];
                $dlog['price'] = $v['price'];
                $dlog['num'] = $v['num'];
                $dlog['total'] = $v['total'];
            } else {
                $rg = $mgoods->where('id=' . $v['goodsid'])->setDec('num', $dnum);
                $rg = $mgoods->where('id=' . $v['goodsid'])->setInc('sells', $dnum);
                $rg = $mgoods->where('id=' . $v['goodsid'])->setInc('dissells', $dnum);
                //纯goods模式
                $dlog['goodsid'] = $v['goodsid'];
                $dlog['goodsname'] = $v['name'];
                $dlog['skuid'] = 0;
                $dlog['skuattr'] = 0;
                $dlog['price'] = $v['price'];
                $dlog['num'] = $v['num'];
                $dlog['total'] = $v['total'];
            }
            array_push($tmplog, $dlog);
        }
        if (count($tmplog)) {
            $rlog = $mlogsell->addAll($tmplog);
        }
        return true;
    }

    //代收花生米计算
    public function doDs($order)
    {
        //分销佣金计算
        $commission = D('Commission');
        $orderids = array();
        $orderids[] = $order['id'];

        $vipid = $order['vipid'];
        $mvip = M('vip');
        $vip = $mvip->where('id=' . $vipid)->find();
        if (!$vip && !$vip['pid']) {
            return FALSE;
        }
        //初始化 
        $pid = $vip['pid'];
        $mfxlog = M('fx_dslog');
        $shopset = M('Shop_set')->find();//追入商城设置
        $fxlog['oid'] = $order['id'];
        $fxlog['fxprice'] = $fxprice = $order['payprice'] - $order['yf'];
//        $fxlog['fxprice'] = $fxprice = $order['payprice'] - $order['cprice'];
        $fxlog['ctime'] = time();
        // $fx1rate=$shopset['fx1rate']/100;
        // $fx2rate=$shopset['fx2rate']/100;
        // $fx3rate=$shopset['fx3rate']/100;
        $fxtmp = array();//缓存3级数组
        if ($pid) {
            //第一层分销
            $fx1 = $mvip->where('id=' . $pid)->find();
            if ($fx1['isfx']) {
                $fxlog['fxyj'] = $commission->ordersCommission('fx1rate', $orderids);
                $fxlog['from'] = $vip['id'];
                $fxlog['fromname'] = $vip['nickname'];
                $fxlog['to'] = $fx1['id'];
                $fxlog['toname'] = $fx1['nickname'];
                $fxlog['status'] = 1;
                //单层逻辑					
                //$rfxlog=$mfxlog->add($fxlog);
                //file_put_contents('./Data/app_debug.txt','日志时间:'.date('Y-m-d H:i:s').PHP_EOL.'纪录信息:'.$rfxlog.PHP_EOL.PHP_EOL.$mfxlog->getLastSql().PHP_EOL.PHP_EOL,FILE_APPEND);
                array_push($fxtmp, $fxlog);
            }
            //第二层分销
            if ($fx1['pid']) {
                $fx2 = $mvip->where('id=' . $fx1['pid'])->find();
                if ($fx2['isfx']) {
                    $fxlog['fxyj'] = $commission->ordersCommission('fx2rate', $orderids);
                    $fxlog['from'] = $vip['id'];
                    $fxlog['fromname'] = $vip['nickname'];
                    $fxlog['to'] = $fx2['id'];
                    $fxlog['toname'] = $fx2['nickname'];
                    $fxlog['status'] = 1;
                    //单层逻辑
                    //$rfxlog=$mfxlog->add($fxlog);
                    //file_put_contents('./Data/app_debug.txt','日志时间:'.date('Y-m-d H:i:s').PHP_EOL.'纪录信息:'.$rfxlog.PHP_EOL.PHP_EOL.$mfxlog->getLastSql().PHP_EOL.PHP_EOL,FILE_APPEND);
                    array_push($fxtmp, $fxlog);
                }
            }
            //第三层分销
            if ($fx2['pid']) {
                $fx3 = $mvip->where('id=' . $fx2['pid'])->find();
                if ($fx3['isfx']) {
                    $fxlog['fxyj'] = $commission->ordersCommission('fx3rate', $orderids);
                    $fxlog['from'] = $vip['id'];
                    $fxlog['fromname'] = $vip['nickname'];
                    $fxlog['to'] = $fx3['id'];
                    $fxlog['toname'] = $fx3['nickname'];
                    $fxlog['status'] = 1;
                    //单层逻辑
                    //$rfxlog=$mfxlog->add($fxlog);
                    //file_put_contents('./Data/app_debug.txt','日志时间:'.date('Y-m-d H:i:s').PHP_EOL.'纪录信息:'.$rfxlog.PHP_EOL.PHP_EOL.$mfxlog->getLastSql().PHP_EOL.PHP_EOL,FILE_APPEND);
                    array_push($fxtmp, $fxlog);
                }
            }
            //多层分销
            if (count($fxtmp) >= 1) {
                $refxlog = $mfxlog->addAll($fxtmp);
                if (!$refxlog) {
                    file_put_contents('./Data/app_fx_error.txt', '错误日志时间:' . date('Y-m-d H:i:s') . PHP_EOL . '错误纪录信息:' . $rfxlog . PHP_EOL . PHP_EOL . $mfxlog->getLastSql() . PHP_EOL . PHP_EOL, FILE_APPEND);
                }
            }
            //花鼓分销方案
            $allhg = $mvip->field('id')->where('isfxgd=1')->select();
            if ($allhg) {
                $tmppath = array_slice(explode('-', $vip['path']), -20);
                $tmphg = array();
                foreach ($allhg as $v) {
                    array_push($tmphg, $v['id']);
                }
                //需要计算的花鼓
                $needhg = array_intersect($tmphg, $tmppath);
                if (count($needhg)) {
                    $fxlog['oid'] = $order['id'];
                    $fxlog['fxprice'] = $fxprice;
                    $fxlog['ctime'] = time();
                    $fxlog['fxyj'] = $fxprice * 0.05;
                    $fxlog['from'] = $vip['vipid'];
                    $fxlog['fromname'] = $vip['nickname'];
                    foreach ($needhg as $k => $v) {
                        $hg = $mvip->where('id=' . $v)->find();
                        if ($hg) {
                            $fxlog['to'] = $hg['id'];
                            $fxlog['toname'] = $hg['nickname'] . '[花股收益]';
                            $fxlog['ishg'] = 1;
                            $rehgfxlog = $mfxlog->add($fxlog);
                        }
                    }
                }
            }

        }
        return true;
        //逻辑完成
    }

}
