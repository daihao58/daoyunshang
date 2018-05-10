<?php
// 开始测试，待定使用
namespace App\Controller;

class IndexController extends BaseController
{
    public function index()
    {

        $this->redirect("Shop/index");
    }

    // 通用版帮助中心
    public function help()
    {
        $this->display();
    }

    public function shop()
    {
        if (IS_AJAX) {
            $name=I('post.name');
            $map['name']=array('like',"%$name%");//搜索
            $shoplist = D('ShopSet')->getList($map, true);
            $this->ajaxReturn($shoplist);
        }

        $wxConfig = D("Set")->getJsSign();
        $this->assign("wxConfig",json_encode($wxConfig));

        $shoplist = D('ShopSet')->getList($map, true);
        $this->assign('shoplist', $shoplist);

        $this->display();
    }  

    public function getShopList(){
        $lng = I("post.lng");
        $lat = I("post.lat");
        // $lat = '34.7913';
        // $lng = '113.673';
        $name=I('post.name');

        $range = 180 / pi() * 150000000000 / 6372.797; //里面的 15 就代表搜索 15km 之内，单位km 
        $lngR = $range / cos($lat * pi() / 180);
        $maxLat = $lat + $range;//最大纬度
        $minLat = $lat - $range;//最小纬度 
        $maxLng = $lng + $lngR;//最大经度 
        $minLng = $lng - $lngR;//最小经度 


        $map['lng'] = array('between',array($minLng,$maxLng)); //经度值
        $map['lat'] = array('between',array($minLat,$maxLat)); //纬度值
        if($name){
            $map['name']=array('like',"%$name%");//搜索
        }
        $map['status']=2;

        $list = D("ShopSet")->getList($map,true);
        $shop = $this->range($lat,$lng,$list);
        
        
        $this->ajaxReturn($shop);
        
    }

    public function range($u_lat,$u_lng,$list)
    {
        /*
        *u_lat 用户纬度
        *u_lng 用户经度
        *list sql语句
        */
        if(!empty($u_lat) && !empty($u_lng)){
            foreach ($list as $row) {
                $row['km'] = $this->nearby_distance($u_lat, $u_lng, $row['lat'], $row['lng']);
                $row['km'] = round($row['km'], 1);
                $res[] = $row;
            }
            if (!empty($res)) {
                foreach ($res as $user) {
                    $ages[] = $user['km'];
                }
                array_multisort($ages, SORT_ASC, $res);
                return $res;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
        
    //计算经纬度两点之间的距离
    public function nearby_distance($lat1, $lng1, $lat2, $lng2) 
    {
        $EARTH_RADIUS = 6378.137;
        $radLat1 = $this->rad($lat1);
        $radLat2 = $this->rad($lat2);
        $a = $radLat1 - $radLat2;
        $b = $this->rad($lng1) - $this->rad($lng2);
        $s = 2 * asin(sqrt(pow(sin($a / 2), 2) + cos($radLat1) * cos($radLat2) * pow(sin($b / 2), 2)));
        $s1 = $s * $EARTH_RADIUS;
        $s2 = round($s1 * 10000) / 10000;
        return $s2;
        //print_r($s2);
    }

    private function rad($d) {
        return $d * 3.1415926535898 / 180.0;
    }
  



}