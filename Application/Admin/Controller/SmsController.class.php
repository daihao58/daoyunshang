<?php
/**
 * Created by PhpStorm.
 * User: heqing
 * Date: 15/9/10
 * Time: 14:32
 */

namespace Admin\Controller;


class SmsController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $bread = array(
            '0' => array(
                'name' => '短信模版列表',
                'url' => U('Admin/Sms/index'),
            ),
        );
        $this->assign('breadhtml', $this->getBread($bread));
        //绑定分页
        $m = M('sms_template');
        $p = $_GET['p'] ? $_GET['p'] : 1;
        $search = I('search') ? I('search') : '';
        $psize = self::$CMS['set']['pagesize'] ? self::$CMS['set']['pagesize'] : 20;
        $cache = $m->page($p, $psize)->select();
        $count = $m->count();
        $this->getPage($count, $psize, 'App-loader', '短信模版列表', 'App-search');
        $this->assign('cache', $cache);
        $this->display();
    }

    public function set()
    {
        if (IS_POST) {
            if (M("Sms")->find()) {
                M("Sms")->where(array("id" => "1"))->save($_POST);
            } else {
                M("Sms")->add($_POST);
            }
            $this->ajaxReturn(array("status"=>"1","msg"=>"设置成功"));
        } else {
            $sms = M("Sms")->find();
            $this->assign("sms", $sms);
            $this->display();
        }
    }
    public function dxset()
    {
        if (IS_POST) {
            $data['id'] = I('id');
            $data['content']=I('content');
            $data['active_time']=I('active_time');
            M("sms_template")->where(array("id" => $data['id']))->save($data);
            $this->ajaxReturn(array("status"=>"1","msg"=>"设置成功"));
        } else {
            $tep_id='';
            if ($_GET['id']) {
                $tep_id = I('id');
                $sms = M("sms_template")->where('id='.$tep_id)->find();
                $this->assign("sms", $sms);
            }
            $this->assign('sid', $tep_id);
            $this->display();
        }
    }
    public function phone_index(){
        $bread = array(
            '0' => array(
                'name' => '短信记录列表',
                'url' => U('Admin/Sms/index'),
            ),
        );
        $this->assign('breadhtml', $this->getBread($bread));
        //绑定分页
        $m = M('sms_phone');
        $p = $_GET['p'] ? $_GET['p'] : 1;
        $search = I('name') ?I('name') : '';
        if ($search) {
            $map['phone'] = array('like', "%$search%");
            $this->assign('search', $search);
        }
        $psize = self::$CMS['set']['pagesize'] ? self::$CMS['set']['pagesize'] : 20;
        $cache = $m->where($map)->page($p, $psize)->select();
        $count = $m->where($map)->count();
        $this->getPage($count, $psize, 'App-loader', '短信记录列表', 'App-search');
        $this->assign('cache', $cache);
        $this->display();
    }
}