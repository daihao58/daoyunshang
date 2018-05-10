<?php
// +----------------------------------------------------------------------
// | 用户后台基础类--CMS分组PUBLIC公共类
// +----------------------------------------------------------------------
namespace Multi\Controller;

class PublicController extends BaseController
{

    //默认跳转至登陆页面
    public function index()
    {
        $this->redirect('Multi/Public/login');
    }

    //通用登陆页面
    public function login()
    {
        if (IS_POST) {
            $data = I('post.');
            $verify = new \Think\Verify();
            if (!$verify->check($data['verify'])) {
                $this->error('请正确填写验证码！');
            }
            $user = M('User')->where(array('username' => $data['username'], 'userpass' => md5($data['userpass']),'type'=>'0'))->find();
            $employee = M('employee')->where(array('username' => $data['username'], 'userpass' => md5($data['userpass']),'type'=>'0'))->find();
            if ($user) {
                self::$CMS['usid'] = $_SESSION['CMS']['usid'] = $user['id'];
                self::$CMS['user'] = $_SESSION['CMS']['user'] = $user;
                self::$CMS['homeurl'] = $_SESSION['CMS']['homeurl'] = U('Multi/Public/switchShop/id/21');
                self::$CMS['backurl'] = $_SESSION['CMS']['backurl'] = FALSE;
                $this->redirect('Multi/Public/switchShop/id/21');
            } else if ($employee) {
                self::$CMS['usid'] = $_SESSION['CMS']['usid'] = $employee['id'];
                self::$CMS['user'] = $_SESSION['CMS']['user'] = $employee;
                self::$CMS['homeurl'] = $_SESSION['CMS']['homeurl'] = U('Multi/Public/switchShop/id/21');
                self::$CMS['backurl'] = $_SESSION['CMS']['backurl'] = FALSE;
                $this->redirect('Multi/Public/switchShop/id/21');
            } else {
                $this->error('用户不存在，或密码错误！');
            }
        }
        if ($_SESSION['CMS']['usid']) {
            $this->redirect('Multi/Public/switchShop/id/21');
        }
        $arr = array(4, 5, 7, 7, 7, 10, 11, 12);
        $get = $arr[mt_rand(0, count($arr) - 1)];
        $wallpaper = ROOT_URL . "Public/WallPage/" . $get . ".jpg";
        $this->assign('wallpaper', $wallpaper);
        $this->display();
    }


/*    public function shopList()
    {

        $num = 25;
        $p = I("get.page") ? I("get.page") : 1;
        cookie("prevUrl", "Multi/Public/shopList/page/" . $p);

        $condition = array("user_id" => $_SESSION['CMS']['usid']);
        $shopList = D("ShopSet")->getList($condition, true, "id desc", $p, $num);
        $this->assign('cache', $shopList);// 赋值数据集
// dump($shopList);
// die;
        $allshopList = D("ShopSet")->getList($condition);
        $count = Count($allshopList);// 查询满足要求的总记录数

        $Page = new \Think\Page($count, $num);// 实例化分页类 传入总记录数和每页显示的记录数
        $Page->setConfig('theme', "<ul class='pagination no-margin pull-right'></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><a> %HEADER%  %NOW_PAGE%/%TOTAL_PAGE% 页</a></ul>");
        $show = $Page->show();// 分页显示输出

        $this->assign('page', $show);// 赋值分页输出
        $this->assign('url', "http://" . I("server.HTTP_HOST"));
        $this->display();
    }*/

    public function addShop()
    {
        //处理POST提交
        if (IS_POST) {
            $data = I('post.');
            $data['user_id'] = $_SESSION['CMS']['usid'];
            $data['time'] = time();

            $re = D('ShopSet')->add($data);
            $data2['shop_id'] = $re;
            $data2['code'] = 'c969b336246b9de94b0694eeb3268c90';
            $data2['qrcode_background'] = 'QRcode/background/bg_1434618758.jpg';
            $data2['qrcode_emp_background'] = 'QRcode/background/default.jpg';
            $re1 = D('Autoset')->add($data2);
            if ($re) {
                $info['status'] = 1;
                $info['msg'] = '新增店铺成功！';
            } else {
                $info['status'] = 0;
                $info['msg'] = '新增店铺失败！';
            }
            $this->ajaxReturn($info);
        }else{
            $this->display();
        }   
        
    }

    public function shopStatus()
    {
        $shopid = $_GET['id']; //必须使用get方法
        $m = M('Shop_set');

        $data["status"] = $_GET['status'];
        $re = $m->where('id='.$shopid)->save($data);
        if ($re) {
            $this->redirect("Multi/Public/shopList");
        } else {
            $this->error("修改失败，请重试");
        }        
    }


    public function shopDel()
    {
        $id = $_GET['id']; //必须使用get方法
        $m = M('Shop_set');
        if (!id) {
            $info['status'] = 0;
            $info['msg'] = 'ID不能为空!';
            $this->ajaxReturn($info);
        }
        $re = $m->delete($id);
        if ($re) {
            $this->redirect("Multi/Public/shopList");
        } else {
            $this->error("删除失败");
        }
    }

    public function switchShop()
    {
        if (I("get.id")) {
            session("homeShopId", I("get.id"));

            $shop = D("ShopSet")->get(array("id" => I("get.id")));
            session("homeShop", $shop);
        } else {
            session("homeShopId", null);
        }
        $this->redirect("Multi/Index/index");
    }



    public function logout()
    {
        session(null);
        $this->redirect('Multi/Public/login');
    }

    //通用验证码
    public function verify()
    {
        $Verify = new \Think\Verify();
        $Verify->codeSet = '0123456789';
        $Verify->length = 4;
        $Verify->imageH = 0;
        $Verify->entry();
    }

    //百度地图
    public function baiduDitu()
    {
        $map['address'] = I('address');
        $map['lng'] = I('lng');
        $map['lat'] = I('lat');
        $this->assign('map', $map);
        $mb = $this->fetch();
        $this->ajaxReturn($mb);
    }


}