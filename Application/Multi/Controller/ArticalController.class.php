<?php
/**
 * Created by PhpStorm.
 * User: heqing
 * Date: 15/9/1
 * Time: 09:17
 */

namespace Multi\Controller;


class ArticalController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //设置面包导航，主加载器请配置
        $bread = array(
            '0' => array(
                'name' => '文章管理',
                'url' => U('Multi/Artical/index'),
            ),
        );
        $this->assign('breadhtml', $this->getBread($bread));
        $artical = M('Artical'); // 实例化User对象
        $map['shop_id'] = session("homeShopId");
        $count = $artical->where($map)->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, 12);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->setConfig('theme', "<div class='widget-content padded text-center'><ul class='pagination'></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><a> %HEADER%  %NOW_PAGE%/%TOTAL_PAGE% 页</a></ul></div>");
        $show = $Page->show();// 分页显示输出
        
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $artical = $artical->where($map)->limit($Page->firstRow . ',' . $Page->listRows)->select();

        $this->assign("artical", $artical);// 赋值数据集
        $this->assign('page', $show);// 赋值分页输出
        $this->assign('url', "http://" . I("server.HTTP_HOST"));
        $this->display(); // 输出模板
    }

    public function add()
    {
        //设置面包导航，主加载器请配置
        $bread = array(
            '0' => array(
                'name' => '文章管理',
                'url' => U('Multi/Artical/index'),
            ),
        );
        $this->assign('breadhtml', $this->getBread($bread));

        $artical = M('Artical')->where(array("id" => I("get.id")))->find();
        $this->assign("artical", $artical);
        $this->display();
    }

    public function addArtical()
    {
        if ($_POST["id"] == 0) {
            $data=I("post.");
            $data['shop_id'] = session("homeShopId");
            M("Artical")->add($data);
        } else {
            M("Artical")->save($_POST);
        }
        $this->ajaxReturn(array("status"=>"1","msg"=>"添加成功"));
    }

    public function del()
    {
        M("Artical")->where(array("id" => I("get.id")))->delete();
        $this->redirect("Multi/Artical/index");
    }

    public function feedback(){
        $bread = array(
            '0' => array(
                'name' => '客户反馈',
                'url' => U('Multi/Artical/feedback'),
            ),
        );
        $this->assign('breadhtml', $this->getBread($bread));


        $count = M('Feedback')->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, 12);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->setConfig('theme', "<div class='widget-content padded text-center'><ul class='pagination'></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><a> %HEADER%  %NOW_PAGE%/%TOTAL_PAGE% 页</a></ul></div>");
        $show = $Page->show();// 分页显示输出

        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $feedback = M('Feedback')->limit($Page->firstRow . ',' . $Page->listRows)->select();

        $this->assign("feedback", $feedback);// 赋值数据集
        $this->assign('page', $show);// 赋值分页输出
        $this->assign('url', "http://" . I("server.HTTP_HOST"));
        $this->display(); // 输出模板

    }

    public function feeddel()
    {
        M("Feedback")->where(array("id" => I("get.id")))->delete();
        $this->redirect("Multi/Artical/feedback");
    }
}