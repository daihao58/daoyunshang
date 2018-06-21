<?php
namespace Multi\Controller;

class VipController extends BaseController
{

    public function _initialize()
    {
        //你可以在此覆盖父类方法
        parent::_initialize();
    }
    //CMS后台Vip提现订单
    public function cashback()
    {
        //设置面包导航，主加载器请配置
        $bread = array(
            '0' => array(
                'name' => '财务管理',
                'url' => U('Multi/Vip/#'),
            ),
            '1' => array(
                'name' => '返现管理',
                'url' => U('Multi/Vip/cashback'),
            ),
        );
        $this->assign('breadhtml', $this->getBread($bread));
        // $status = I('status');
        // $this->assign('status', $status);
        // if ($status || $status == '0') {
        //     $map['status'] = $status;
        // }
        // $this->assign('status', $status);
        //绑定搜索条件与分页
        $m = M('Cashback');
        $p = $_GET['p'] ? $_GET['p'] : 1;
        $name = I('order_id') ? I('order_id') : '';
        if ($name) {
            //提现人姓名
            $map['order_id'] = $name;
            $this->assign('name', $name);
        }
        $psize = self::$CMS['set']['pagesize'] ? self::$CMS['set']['pagesize'] : 20;
        $cashback = $m->where($map)->page($p, $psize)->select();
        $count = $m->where($map)->count();
        $this->getPage($count, $psize, 'App-loader', '会员返现订单', 'App-search');
        $this->assign('cashback', $cashback);
        $this->display();
    }

   public function cashbackExport()
    {
        $id = I('id');
        $data = M('Cashback')->where($map)->select();
        foreach ($data as $k => $v) {
            switch ($v['status']) {
                case 0:
                    $data[$k]['status'] = "正在进行中...";
                    break;
                case 1:
                    $data[$k]['status'] = "返现完成";
                    break;
            }
            $data[$k]['lasttime'] = date('Y-m-d H:i:s', $v['lasttime']);
        }
        $title = array('ID', '会员ID', '返现金额', '订单号', '每天返现金额', '上一次返现时间', '已经返现天数', '返现状态','时间');
        $this->exportexcel($data, $title, $tt . '订单' . date('Y-m-d H:i:s', time()));
    }

    public function set()
    {
        $m = M('vip_set');
        $data = $m->find();
        if (IS_POST) {
            $post = I('post.');
            if ($post['isgift'] == 1) {
                $post['gift_detail'] = $post['gift_type'] . "," . $post['gift_money'] . "," . $post['gift_days'] . "," . $post['gift_usemoney'];
            }
            unset($post['gift_type']);
            unset($post['gift_money']);
            unset($post['gift_days']);
            unset($post['gift_usemoney']);
            $r = $data ? $m->where('id=' . $data['id'])->save($post) : $m->add($post);
            if (FALSE !== $r) {
                $info['status'] = 1;
                $info['msg'] = '设置成功！';
            } else {
                $info['status'] = 0;
                $info['msg'] = '设置失败！';
            }
            $this->ajaxReturn($info, "json");
        } else {
            //设置面包导航，主加载器请配置
            $bread = array(
                '0' => array(
                    'name' => '会员中心',
                    'url' => U('Multi/Vip/#'),
                ),
                '1' => array(
                    'name' => '会员设置',
                    'url' => U('Multi/Vip/set'),
                ),
            );
            $this->assign('breadhtml', $this->getBread($bread));
            $data = $m->find();
            if ($data['isgift'] == 1) {
                $gift = explode(",", $data['gift_detail']);
                $data['gift_type'] = $gift[0];
                $data['gift_money'] = $gift[1];
                $data['gift_days'] = $gift[2];
                $data['gift_usemoney'] = $gift[3];
            }
            $this->assign('data', $data);
            $this->display();
        }
    }

    // 获取层级
    public function vipTree()
    {
        $mvip = M('vip');
        $data = I('data');
        $id = I('id');
        $str = '<br>';
        $vipids = explode('-', $data);
        $vip = $mvip->where('id=' . $id)->find();
        if (count($vipids) <= 1) {
            $str .= "<div style='float:left;position:absolute'><img style='width:30px' src='" . $vip['headimgurl'] . "'/>" . "&nbsp&nbsp&nbsp&nbsp" . $vip['nickname'] . "(当前用户)" . "</div>";
        } else {
            foreach ($vipids as $k => $v) {
                # code...
                if ($k == 0) {
                } else {
                    $temp = $mvip->where('id=' . $v)->find();
                    $str .= "<div style='float:left;position:absolute'><img style='width:30px' src='" . $temp['headimgurl'] . "'/>" . "&nbsp&nbsp&nbsp&nbsp" . $temp['nickname'] . "<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp↑<br></div>";
                    $str .= "<br><br><br>";
                }
            }
            $str .= "<div style='float:left;position:absolute'><img style='width:30px' src='" . $vip['headimgurl'] . "'/>" . "&nbsp&nbsp&nbsp&nbsp" . $vip['nickname'] . "(当前用户)" . "</div>";
        }

        $this->ajaxReturn(array('msg' => $str), "json");
    }

    // 层级树
    public function vipTrack()
    {
        // 获取模型
        $dvip = D('Vip');
        if (IS_POST) {
            $vipid = I('vipid');
            $cache = D('Vip')->getChildren($vipid);
            $str = '<ul>';
            // 组装返回数据
            if (count($cache) > 0) {
                foreach ($cache as $k => $vip) {
                    if ($vip['type'] == 1) {
                        $str .= '<li id="node' . $vip['id'] . '" data-id="' . $vip['id'] . '" class="parent">';
                        $str .= '<span onclick="javascript:pathopen(this);"><i class="glyphicon glyphicon-plus"></i> ' . $vip['nickname'] . '</span> <a href="javascript:;"></a><span class="numPer redCol">' . $vip['count1'] . '</span><span class="numPer blueCol">' . $vip['count2'] . '</span><span class="numPer greenCol">' . $vip['count3'] . '</span><span class="numPer rouCol">' . $vip['ocount'] . '单：共计' . $vip['osum'] . '</span><span class="numPer eyeCol" data-id="' . $vip['id'] . '" onclick="userInfo(this)"><i class="glyphicon glyphicon-eye-open"></i></span>';
                    } else {
                        $str .= '<li id="node' . $vip['id'] . '" data-id="' . $vip['id'] . '" class="leaf">';
                        $str .= '<span><i class="glyphicon glyphicon-leaf"></i> ' . $vip['nickname'] . '</span> <a href="javascript:;"></a><span class="numPer rouCol" style="color:black">' . $vip['ocount'] . '单：共计' . $vip['osum'] . '</span><span class="numPer eyeCol eyeColCol" data-id="' . $vip['id'] . '" onclick="userInfo(this)"><i class="glyphicon glyphicon-eye-open"></i></span>';
                    }
                    $str .= '</li>';
                }
            }
            $str .= '</ul>';
            $this->ajaxReturn(array('msg' => $str, 'id' => $vipid), "json");
            exit();
        }
        $top = $dvip->getChildren();
        $this->assign('cache', $top);
        $this->display();
    }

    // 获取个人信息
    public function vipInfo()
    {
        if (IS_AJAX) {
            $id = I('id');
            $mvip = D('Vip');
            $str = $mvip->getVipForMessage($id);
            if ($str) {
                $this->ajaxReturn(array('msg' => $str), "json");
            } else {
                $this->ajaxReturn(array('msg' => "通信失败"), "json");
            }
        }
    }

    // 设置
    public function vipReborn()
    {
        if (IS_AJAX) {
            $dvip = D('Vip');
            $id = I('id');
            $ppid = I('ppid');

            if ($ppid == $id) {
                $info['status'] = 0;
                $info['msg'] = "调配失败";
            }

            $re = $dvip->vipReborn($id, $ppid);
            if ($re) {
                $info['status'] = 1;
                $info['msg'] = "调配成功";
            } else {
                $info['status'] = 0;
                $info['msg'] = "调配失败";
            }
            $this->ajaxReturn($info);
        }
    }

    // Vip未分配会员列表
    public function vipRebornList()
    {
        //设置面包导航，主加载器请配置
        $bread = array(
            '0' => array(
                'name' => '可调配会员',
            ),
        );
        $this->assign('breadhtml', $this->getBread($bread));

        // 员工介入
        $temp = M('employee')->select();
        $employee = array();
        foreach ($temp as $k => $v) {
            $employee[$v['id']] = $v;
        }

        //绑定搜索条件与分页
        $m = M('vip');
        $p = $_GET['p'] ? $_GET['p'] : 1;
        $search = I('search') ? I('search') : '';
        if ($search) {
            $map['nickname|mobile'] = array('like', "%$search%");
            $this->assign('search', $search);
        }
        $psize = self::$CMS['set']['pagesize'] ? self::$CMS['set']['pagesize'] : 20;
        $map['plv'] = 1;
        $map['pid'] = 0;
        $map['isfx'] = 0;
        $map['total_xxlink'] = 0;
        //$map['employee']=0;
        $cache = $m->where($map)->page($p, $psize)->select();
        foreach ($cache as $k => $v) {
            $cache[$k]['levelname'] = M('vip_level')->where('id=' . $cache[$k]['levelid'])->getField('name');
            if ($v['isfxgd']) {
                $cache[$k]['fxname'] = '超级VIP';
            } else {
                if ($v['isfx']) {
                    $cache[$k]['fxname'] = $_SESSION['SHOP']['set']['fxname'];
                } else {
                    $cache[$k]['fxname'] = '会员';
                }
            }

            // 写入员工数据
            if ($v['employee']) {
                $cache[$k]['employee'] = $employee[$v['employee']]['nickname'];
            } else {
                $cache[$k]['employee'] = '无';
            }
        }
        $count = $m->where($map)->count();
        $this->getPage($count, $psize, 'App-loader', '会员列表', 'App-search');
        $this->assign('cache', $cache);
        $this->display();
    }


    // 设置
    public function vipAlloc()
    {
        if (IS_AJAX) {
            $dvip = D('Vip');
            $id = I('vipid');
            $eid = I('empid');
            $employee = M('employee')->where(array('id' => $eid))->find();
            $vip = M('vip')->where(array('id' => $id, 'plv' => 1))->find();

            if ($employee && $vip) {
                $re = $dvip->setEmployee($id, $eid);
                if ($re) {
                    $info['status'] = 1;
                    $info['msg'] = "员工账户绑定成功";
                } else {
                    $info['status'] = 0;
                    $info['msg'] = "员工账户绑定失败";
                }
                //$info['msg'] = json_encode($re);

            } else {
                $info['status'] = 0;
                $info['msg'] = "员工账户不存在";
            }
            $this->ajaxReturn($info);

        }
    }

    // Vip未分配会员列表
    public function vipAllocList()
    {
        //设置面包导航，主加载器请配置
        $bread = array(
            '0' => array(
                'name' => '会员分配中心',
                'url' => U('Multi/Vip/#'),
            ),
        );
        $this->assign('breadhtml', $this->getBread($bread));
        // 员工介入
        $temp = M('employee')->select();
        $employee = array();
        foreach ($temp as $k => $v) {
            $employee[$v['id']] = $v;
        }
        //绑定搜索条件与分页
        $m = M('vip');
        $p = $_GET['p'] ? $_GET['p'] : 1;
        $search = I('search') ? I('search') : '';
        if ($search) {
            $map['nickname|mobile'] = array('like', "%$search%");
            //$map['mobile'] = array('like', "%$search%");
            //$map['_logic'] = 'OR';
            $this->assign('search', $search);
        }
        $psize = self::$CMS['set']['pagesize'] ? self::$CMS['set']['pagesize'] : 20;
        $map['plv'] = 1;
        //$map['employee']=0;
        $cache = $m->where($map)->page($p, $psize)->select();
        foreach ($cache as $k => $v) {
            $cache[$k]['levelname'] = M('vip_level')->where('id=' . $cache[$k]['levelid'])->getField('name');
            if ($v['isfxgd']) {
                $cache[$k]['fxname'] = '超级VIP';
            } else {
                if ($v['isfx']) {
                    $cache[$k]['fxname'] = $_SESSION['SHOP']['set']['fxname'];
                } else {
                    $cache[$k]['fxname'] = '会员';
                }
            }

            // 写入员工数据
            if ($v['employee']) {
                $cache[$k]['employee'] = $employee[$v['employee']]['nickname'];
            } else {
                $cache[$k]['employee'] = '无';
            }
        }
        $count = $m->where($map)->count();
        $this->getPage($count, $psize, 'App-loader', '会员列表', 'App-search');
        $this->assign('cache', $cache);
        $this->display();
    }

    // VIP列表
    public function vipList()
    {
        //设置面包导航，主加载器请配置
        $bread = array(
            '0' => array(
                'name' => '会员中心',
                'url' => U('Multi/Vip/#'),
            ),
            '1' => array(
                'name' => '会员列表',
                'url' => U('Multi/Vip/vipList'),
            ),
        );
        $this->assign('breadhtml', $this->getBread($bread));
        // 员工介入
        $temp = M('employee')->select();
        $employee = array();
        foreach ($temp as $k => $v) {
            $employee[$v['id']] = $v;
        }
        //绑定搜索条件与分页
        $m = M('vip');
        $p = $_GET['p'] ? $_GET['p'] : 1;
        $search = I('search') ? I('search') : '';
        $plv = I('plv') ? I('plv') : 0;
        if ($search) {
            $map['nickname|mobile'] = array('like', "%$search%");
            $this->assign('search', $search);
            $map['mobile'] = array('exp','is not null');
        }
        if ($plv) {
            $map['plv'] = $plv;
            $this->assign('plv', $plv);
            $map['mobile'] = array('exp','is not null');
        }
        $psize = self::$CMS['set']['pagesize'] ? self::$CMS['set']['pagesize'] : 20;
        $cache = $m->where($map)->page($p, $psize)->select();
        foreach ($cache as $k => $v) {
            $cache[$k]['levelname'] = M('vip_level')->where('id=' . $cache[$k]['levelid'])->getField('name');
            if ($v['isfxgd']) {
                $cache[$k]['fxname'] = '超级VIP';
            } else {
                if ($v['isfx']) {
                    $cache[$k]['fxname'] = $_SESSION['SHOP']['set']['fxname'];
                } else {
                    $cache[$k]['fxname'] = '会员';
                }
            }
            // 写入员工数据
            if ($v['employee']) {
                $cache[$k]['employee'] = $employee[$v['employee']]['nickname'];
            } else {
                $cache[$k]['employee'] = '无';
            }
        }
        $count = $m->where($map)->count();
        $this->getPage($count, $psize, 'App-loader', '会员列表', 'App-search');
        $this->assign('cache', $cache);
        $this->display();
    }

    //CMS后台商品设置
    public function vipSet()
    {
        $id = I('id');
        $m = M('Vip');
        //dump($m);
        //设置面包导航，主加载器请配置
        $bread = array(
            '0' => array(
                'name' => '会员中心',
                'url' => U('Multi/Vip/#'),
            ),
            '1' => array(
                'name' => '会员列表',
                'url' => U('Multi/Vip/vipList'),
            ),
            '2' => array(
                'name' => '会员编辑',
                'url' => U('Multi/Vip/vipSet', array('id' => $id)),
            ),
        );
        $this->assign('breadhtml', $this->getBread($bread));

        $vip_level_model=M('vip_level');
        $vip_level_data=$vip_level_model->select();
        $this->assign('vip_level_data',$vip_level_data);

        //处理POST提交
        if (IS_POST) {
            //die('aa');
            $data = I('post.');
            if ($id) {
                $re = $m->save($data);
                if (FALSE !== $re) {
                    $info['status'] = 1;
                    $info['msg'] = '设置成功！';
                } else {
                    $info['status'] = 0;
                    $info['msg'] = '设置失败！';
                }
            } else {
                $info['status'] = 0;
                $info['msg'] = '未获取会员ID！';
            }
            $this->ajaxReturn($info);
        }

        //处理编辑界面
        if ($id) {
            $cache = $m->where('id=' . $id)->find();
            $this->assign('cache', $cache);
        } else {
            $info['status'] = 0;
            $info['msg'] = '未获取会员ID！';
            $this->ajaxReturn($info);
        }
        $this->display();
    }

    //CMS后台商品设置
    public function vipFxtj()
    {
        header("Content-type: text/html; charset=utf-8");
        $id = I('id');
        $mvip = M('Vip');
        //dump($m);
        //设置面包导航，主加载器请配置
        //		$bread=array(
        //			'0'=>array(
        //				'name'=>'会员中心',
        //				'url'=>U('Multi/Vip/#')
        //			),
        //			'1'=>array(
        //				'name'=>'会员列表',
        //				'url'=>U('Multi/Vip/vipList')
        //			),
        //			'1'=>array(
        //				'name'=>'会员编辑',
        //				'url'=>U('Multi/Vip/vipSet',array('id'=>$id))
        //			)
        //		);
        //		$this->assign('breadhtml',$this->getBread($bread));

        $vip = $mvip->where('id=' . $id)->find();
        if (!$vip) {
            $this->die('不存在此用户！');
        }
        echo '会员分销统计预估开始：<br><br>';
        echo '<br><br>*********************************************<br><br>';
        echo '会员名：' . $vip['nickname'] . '<br>';
        echo '会员层级：' . $vip['plv'] . '<br>';
        echo '会员路由：' . $vip['path'] . '<br>';
        echo '会员余额：' . $vip['money'] . '<br>';
        echo '<br><br>*********************************************<br><br>';
        echo '第一步：取出3层下线所有用户<br><br>';
        $maxlv = $vip['plv'] + 3;
        $likepath = $vip['path'] . '-' . $vip['id'];
        echo '层级条件：最大层级不超过' . $maxlv . '<br>';
        echo '路由条件：' . $likepath . '<br>';
        //两次模糊查询
        //1:取出第一层，2:取出其他层
        $firstlv = $vip['plv'] + 1;
        $firstpath = $likepath;
        $mapfirst['plv'] = $firstlv;
        $mapfirst['path'] = $firstpath;
        $firstsub = $mvip->field('id,plv,path,nickname')->where($mapfirst)->select();
        if ($firstsub) {
            //模糊查询第二层和第三层
            $maplike['plv'] = array('gt', $firstlv);
            $maplike['plv'] = array('elt', $maxlv);
            $maplike['path'] = array('like', $likepath . '-%');
            $sesendsub = $mvip->field('id,plv,path,nickname')->where($maplike)->select();
            //dump($firstsub);
            //dump($sesendsub);
            //合并两个数组
            if ($sesendsub) {
                $sub = array_merge($firstsub, $sesendsub);
            } else {
                $sub = $firstsub;
            }
            echo '3层下线总数：' . count($sub) . ' 人<br>';
            echo '列出所有下线会员：<br>';
            dump($sub);
            echo '将下线会员按照层级与会员ID重新整理：<br>';
            $subarr = array();
            foreach ($sub as $v) {
                //按层级分组
                $subarr[$v['plv']] = $subarr[$v['plv']] . $v['id'] . ',';
                //array_push($subarr[$v['plv']],$v['id']);
            }
            dump($subarr);
            echo '再次整理下线分层数组：<br>';
            $subarr = array_values($subarr);
            dump($subarr);
            echo '<br><br>*********************************************<br><br>';
            echo '第二步：取出系统佣金比例设置<br><br>';
            $shopset = M('Shop_set')->find();
            $morder = M('Shop_order');
            $fx1rate = $shopset['fx1rate'];
            $fx2rate = $shopset['fx2rate'];
            $fx3rate = $shopset['fx3rate'];
            echo '第一层分销比例：' . $fx1rate . '%<br>';
            echo '第二层分销比例：' . $fx2rate . '%<br>';
            echo '第三层分销比例：' . $fx3rate . '%<br>';
            echo '<br><br>*********************************************<br><br>';
            echo '第三步：逐级分析算出分销佣金<br><br>';
            if ($fx1rate && $subarr[0]) {
                $tmprate = $fx1rate;
                $tmplv = $data['plv'] + 1;
                $maporder['ispay'] = 1;
                $maporder['status'] = array('in', array('2', '3'));
                $maporder['vipid'] = array('in', in_parse_str($subarr[0]));
                echo '第一层分销佣金统计开始：<br>';
                echo '列出订单检索条件：<br>';
                echo '订单支付条件：已支付<br>';
                echo '订单状态条件：已支付或已发货<br>';
                echo '订单购买会员ID：' . $subarr[0] . '<br><br>';
                $tmpod = $morder->field('id,oid,vipid,vipname,payprice,paytime')->where($maporder)->select();
                if ($tmpod) {
                    $tmpodtotal = count($tmpod);
                    echo '根据条件检索出：' . $tmpodtotal . '个订单，列出所有结果<br>';
                    dump($tmpod);
                } else {
                    echo '没有第一层的订单，支付总额为0<br>';
                }

                $tmptotal = $morder->where($maporder)->sum('payprice');
                if (!$tmptotal) {
                    $tmptotal = 0;
                }
                echo '第一层会员所有订单合计支付总额：' . $tmptotal . '元<br>';
                $fx1total = $tmptotal * ($tmprate / 100);
                echo '第一层会员所有订单应贡献佣金[公式=支付总额*(第一层分销率/100)]：' . $fx1total . '元<br>';
                echo '第一层统计结束。<br><br>';
            } else {
                $fx1total = 0;
                echo '不存在第一层会员，该层分销佣金为0。<br><br>';
            }
            if ($fx2rate && $subarr[1]) {
                $tmprate = $fx2rate;
                $tmplv = $data['plv'] + 2;
                $maporder['ispay'] = 1;
                $maporder['status'] = array('in', array('2', '3'));
                $maporder['vipid'] = array('in', in_parse_str($subarr[1]));
                echo '第二层分销佣金统计开始：<br>';
                echo '列出订单检索条件：<br>';
                echo '订单支付条件：已支付<br>';
                echo '订单状态条件：已支付或已发货<br>';
                echo '订单购买会员ID：' . $subarr[1] . '<br><br>';
                $tmpod = $morder->field('id,oid,vipid,vipname,payprice,paytime')->where($maporder)->select();
                if ($tmpod) {
                    $tmpodtotal = count($tmpod);
                    echo '根据条件检索出：' . $tmpodtotal . '个订单，列出所有结果<br>';
                    dump($tmpod);
                } else {
                    echo '没有第二层的订单，支付总额为0<br>';
                }

                $tmptotal = $morder->where($maporder)->sum('payprice');
                if (!$tmptotal) {
                    $tmptotal = 0;
                }
                echo '第二层会员所有订单合计支付总额：' . $tmptotal . '元<br>';
                $fx2total = $tmptotal * ($tmprate / 100);
                echo '第二层会员所有订单应贡献佣金[公式=支付总额*(第二层分销率/100)]：' . $fx2total . '元<br>';
                echo '第二层统计结束。<br><br>';
            } else {
                $fx2total = 0;
                echo '不存在第二层会员，该层分销佣金为0。<br><br>';
            }
            if ($fx3rate && $subarr[2]) {
                $tmprate = $fx3rate;
                $tmplv = $data['plv'] + 3;
                $maporder['ispay'] = 1;
                $maporder['status'] = array('in', array('2', '3'));
                $maporder['vipid'] = array('in', in_parse_str($subarr[2]));
                echo '第三层分销佣金统计开始：<br>';
                echo '列出订单检索条件：<br>';
                echo '订单支付条件：已支付<br>';
                echo '订单状态条件：已支付或已发货<br>';
                echo '订单购买会员ID：' . $subarr[2] . '<br><br>';
                $tmpod = $morder->field('id,oid,vipid,vipname,payprice,paytime')->where($maporder)->select();
                if ($tmpod) {
                    $tmpodtotal = count($tmpod);
                    echo '根据条件检索出：' . $tmpodtotal . '个订单，列出所有结果<br>';
                    dump($tmpod);
                } else {
                    echo '没有第三层的订单，支付总额为0<br>';
                }

                $tmptotal = $morder->where($maporder)->sum('payprice');
                if (!$tmptotal) {
                    $tmptotal = 0;
                }
                echo '第三层会员所有订单合计支付总额：' . $tmptotal . '元<br>';
                $fx3total = $tmptotal * ($tmprate / 100);
                echo '第三层会员所有订单应贡献佣金[公式=支付总额*(第三层分销率/100)]：' . $fx3total . '元<br>';
                echo '第三层统计结束。<br><br>';
            } else {
                $fx3total = 0;
                echo '不存在第三层会员，该层分销佣金为0。<br><br>';
            }
            $totalfxmoney = number_format(($fx1total + $fx2total + $fx3total), 2);
            echo '当前会员的代收佣金预估值为[公式=第一层贡献佣金+第二层贡献佣金+第三层贡献佣金，保留2位小数格式化处理]：' . $totalfxmoney . '<br><br>';
            echo '**********************本次分析结束！*****************';

        } else {
            echo '此会员没有下线成员，代收佣金为0，直接结束统计分析！';
        }

    }

    public function vipExport()
    {
        $id = I('id');
        if ($id) {
            $map['id'] = array('in', in_parse_str($id));
        }

        $data = M('Vip')->where($map)->select();
        foreach ($data as $k => $v) {
            unset($data[$k]['pid']);
            unset($data[$k]['path']);
            unset($data[$k]['password']);
            unset($data[$k]['cur_exp']);
            unset($data[$k]['levelid']);
            unset($data[$k]['language']);
            unset($data[$k]['headimgurl']);
            unset($data[$k]['status']);
            unset($data[$k]['sign']);
            unset($data[$k]['signtime']);
            unset($data[$k]['total_buy']);
            unset($data[$k]['total_yj']);
            $data[$k]['ctime'] = $v['ctime'] ? date('Y-m-d H:i:s', $v['ctime']) : '无';
            $data[$k]['cctime'] = $v['cctime'] ? date('Y-m-d H:i:s', $v['cctime']) : '无';
        }
        $title = array('会员ID', '会员层级', '真实电话', '真实姓名', 'E-mail', '金钱', '积分', '经验', 'openid', '微信昵称', '性别', '城市', '省份', '国家', '关注情况', '关注时间', '创建时间', '交互时间', '是否分销商', '是否正常', '历史佣金', '团队人数', '下线关注次数', '下线取消关注次数', '下线购买次数', '提现金额', '提现姓名', '提现电话', '提现银行', '提现分行', '提现银行所在地', '提现银行卡卡号');
        $this->exportexcel($data, $title, '会员数据' . date('Y-m-d H:i:s', time()));
    }

    public function message()
    {
        //设置面包导航，主加载器请配置
        $bread = array(
            '0' => array(
                'name' => '会员中心',
                'url' => U('Multi/Vip/#'),
            ),
            '1' => array(
                'name' => '消息管理',
                'url' => U('Multi/Vip/message'),
            ),
        );
        $this->assign('breadhtml', $this->getBread($bread));
        //绑定搜索条件与分页
        $m = M('vip_message');
        $p = $_GET['p'] ? $_GET['p'] : 1;
        $search = I('search') ? I('search') : '';
        if ($search) {
            $map['title'] = array('like', "%$search%");
            $this->assign('search', $search);
        }
        $psize = self::$CMS['set']['pagesize'] ? self::$CMS['set']['pagesize'] : 20;
        $cache = $m->where($map)->order('id desc')->page($p, $psize)->select();
        $count = $m->where($map)->count();
        $this->getPage($count, $psize, 'App-loader', '消息管理', 'App-search');
        $this->assign('cache', $cache);
        $this->display();
    }

    public function messageSet()
    {
        $id = I('id');
        $m = M('vip_message');
        //设置面包导航，主加载器请配置
        $bread = array(
            '0' => array(
                'name' => '会员中心',
                'url' => U('Multi/Vip/#'),
            ),
            '1' => array(
                'name' => '消息管理',
                'url' => U('Multi/Vip/message'),
            ),
            '2' => array(
                'name' => '消息设置',
                'url' => $id ? U('Multi/Vip/messageSet', array('id' => $id)) : U('Multi/Vip/messageSet'),
            ),
        );
        $this->assign('breadhtml', $this->getBread($bread));
        //处理POST提交
        if (IS_POST) {
            $data = I('post.');
            $data['ctime'] = time();
            if ($id) {
                $re = $m->save($data);
                if (FALSE !== $re) {
                    $info['status'] = 1;
                    $info['msg'] = '设置成功！';
                } else {
                    $info['status'] = 0;
                    $info['msg'] = '设置失败！';
                }
            } else {
                $re = $m->add($data);
                if ($re) {
                    $info['status'] = 1;
                    $info['msg'] = '设置成功！';
                } else {
                    $info['status'] = 0;
                    $info['msg'] = '设置失败！';
                }
            }
            $this->ajaxReturn($info);
        }
        //处理编辑界面
        if ($id) {
            $cache = $m->where('id=' . $id)->find();
            $this->assign('cache', $cache);
        }
        if (I('pids')) {
            $cache['pids'] = I('pids');
            $this->assign('cache', $cache);
        }
        $this->display();
    }

    public function mailSet()
    {
        $pids = I('pids');
        //设置面包导航，主加载器请配置
        $bread = array(
            '0' => array(
                'name' => '会员中心',
                'url' => U('Multi/Vip/#'),
            ),
            '1' => array(
                'name' => '会员列表',
                'url' => U('Multi/Vip/viplist'),
            ),
            '2' => array(
                'name' => '发送邮件',
                'url' => U('Multi/Vip/messageSet'),
            ),
        );
        $this->assign('breadhtml', $this->getBread($bread));
        //处理POST提交
        if (IS_POST) {
            $m = M('vip');
            $data = I('post.');
            $id_arr = explode(',', $data['pids']);
            foreach ($id_arr as $k => $v) {
                $mail_addr = $m->where('id=' . $v)->getField('email');
                if ($mail_addr != '') {
                    think_send_mail($mail_addr, '系统会员', $data['title'], $data['content']);
                }
            }

            $info['status'] = 1;
            $info['msg'] = ' 发送成功！';

            $this->ajaxReturn($info);
        }
        $this->assign('pids', $pids);
        $this->display();
    }

    public function messageDel()
    {
        $id = $_GET['id']; //必须使用get方法
        $m = M('vip_message');
        if (!id) {
            $info['status'] = 0;
            $info['msg'] = 'ID不能为空!';
            $this->ajaxReturn($info);
        }
        $re = $m->delete($id);
        if ($re) {
            //删除消息浏览记录
            M('vip_log')->where('type=5 and opid in (' . $id . ')')->delete();
            $info['status'] = 1;
            $info['msg'] = '删除成功!';
        } else {
            $info['status'] = 0;
            $info['msg'] = '删除失败!';
        }
        $this->ajaxReturn($info);
    }

    public function card()
    {
        //设置面包导航，主加载器请配置
        $bread = array(
            '0' => array(
                'name' => '会员中心',
                'url' => U('Multi/Vip/#'),
            ),
            '1' => array(
                'name' => '卡券列表',
                'url' => U('Multi/Vip/card'),
            ),
        );
        $this->assign('breadhtml', $this->getBread($bread));
        //绑定搜索条件与分页
        $this->assign('status', $status);
        $m = M('vip_card');
        $p = $_GET['p'] ? $_GET['p'] : 1;
        $search = I('search') ? I('search') : '';
        if ($search) {
            $map['cardno'] = array('like', "%$search%");
            $this->assign('search', $search);
        }
        $type = I('type');
        if ($type) {
            $map['type'] = $type;
            $this->assign('type', $type);
        }
        $psize = self::$CMS['set']['pagesize'] ? self::$CMS['set']['pagesize'] : 20;
        $cache = $m->where($map)->order('id desc')->page($p, $psize)->select();
        $count = $m->where($map)->count();
        $this->getPage($count, $psize, 'App-loader', '卡券列表', 'App-search');
        $this->assign('cache', $cache);
        $this->display();
    }

    public function cardSet()
    {
        $m = M('vip_card');
        //设置面包导航，主加载器请配置
        $bread = array(
            '0' => array(
                'name' => '会员中心',
                'url' => U('Multi/Vip/#'),
            ),
            '1' => array(
                'name' => '充值卡列表',
                'url' => U('Multi/Vip/card'),
            ),
            '2' => array(
                'name' => '充值卡设置',
                'url' => U('Multi/Vip/cardSet'),
            ),
        );
        $this->assign('breadhtml', $this->getBread($bread));
        //处理POST提交
        if (IS_POST) {
            $data = I('post.');
            $data['ctime'] = time();
            if ($data['usetime'] != '') {
                $timeArr = explode(" - ", $data['usetime']);
                $data['stime'] = strtotime($timeArr[0]);
                $data['etime'] = strtotime($timeArr[1]);
            }
            $num = $data['num'];
            unset($data['usetime']);
            unset($data['num']);
            for ($i = 0; $i < $num; $i++) {
                $cardnopwd = $this->getCardNoPwd();
                $data['cardno'] = $cardnopwd['no'];
                $data['cardpwd'] = $cardnopwd['pwd'];
                $r = $m->add($data);
            }
            if ($r) {
                $info['status'] = 1;
                $info['msg'] = '设置成功！';
            } else {
                $info['status'] = 0;
                $info['msg'] = '设置失败！';
            }
            $this->ajaxReturn($info);
        } else {
            $this->display();
        }

    }

    public function cardDel()
    {
        $id = $_GET['id']; //必须使用get方法
        $m = M('vip_card');
        if (!id) {
            $info['status'] = 0;
            $info['msg'] = 'ID不能为空!';
            $this->ajaxReturn($info);
        }
        $re = $m->delete($id);
        if ($re) {
            $info['status'] = 1;
            $info['msg'] = '删除成功!';
        } else {
            $info['status'] = 0;
            $info['msg'] = '删除失败!';
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

    public function sendCard()
    {
        $post = I('post.');
        $m = M('vip_card');
        if ($post['vipid'] == '') {
            $info['status'] = 0;
            $info['msg'] = '请输入发送会员ID！';
            $this->ajaxReturn($info);
        }
        if (!M('vip')->where('id=' . $post['vipid'])->find()) {
            $info['status'] = 0;
            $info['msg'] = '该会员不存在！';
            $this->ajaxReturn($info);
        }
        $data['vipid'] = $post['vipid'];
        $data['status'] = 1;
        $re = $m->where('id=' . $post['cardid'])->save($data);
        if ($re) {
            $info['status'] = 1;
            $info['msg'] = '发送成功!';
        } else {
            $info['status'] = 0;
            $info['msg'] = '发送失败!';
        }
        $this->ajaxReturn($info);
    }

    //CMS后台会员等级列表
    public function level()
    {
        //设置面包导航，主加载器请配置
        $bread = array(
            '0' => array(
                'name' => '会员中心',
                'url' => U('Multi/Vip/#'),
            ),
            '1' => array(
                'name' => '分组列表',
                'url' => U('Multi/Vip/level'),
            ),
        );
        $this->assign('breadhtml', $this->getBread($bread));
        //绑定搜索条件与分页
        $m = M('Vip_level');
        $p = $_GET['p'] ? $_GET['p'] : 1;
        $name = I('name') ? I('name') : '';
        if ($name) {
            $map['name'] = array('like', "%$name%");
            $this->assign('name', $name);
        }
        $psize = self::$CMS['set']['pagesize'] ? self::$CMS['set']['pagesize'] : 20;
        $cache = $m->where($map)->order('exp')->page($p, $psize)->select();
        $count = $m->where($map)->count();
        $this->getPage($count, $psize, 'App-loader', '分组列表', 'App-search');
        $this->assign('cache', $cache);
        $this->display();
    }

    //CMS后台会员等级设置
    public function levelSet()
    {
        $id = I('id');
        $m = M('vip_level');
        //设置面包导航，主加载器请配置
        $bread = array(
            '0' => array(
                'name' => '会员中心',
                'url' => U('Multi/Vip/#'),
            ),
            '1' => array(
                'name' => '分组列表',
                'url' => U('Multi/Vip/level'),
            ),
            '2' => array(
                'name' => '分组设置',
                'url' => $id ? U('Multi/Vip/levelSet', array('id' => $id)) : U('Multi/Vip/levelSet'),
            ),
        );
        $this->assign('breadhtml', $this->getBread($bread));
        //处理POST提交
        if (IS_POST) {
            $data = I('post.');
            $re = $id ? $m->save($data) : $m->add($data);
            if (FALSE !== $re) {
                $info['status'] = 1;
                $info['msg'] = '设置成功！';
            } else {
                $info['status'] = 0;
                $info['msg'] = '设置失败！';
            }
            $this->ajaxReturn($info);
        } else {
            if ($id) {
                $cache = $m->where('id=' . $id)->find();
                $this->assign('cache', $cache);
            }
            $this->display();
        }
    }

    public function levelDel()
    {
        $id = $_GET['id']; //必须使用get方法
        $m = M('Vip_level');
        if (!id) {
            $info['status'] = 0;
            $info['msg'] = 'ID不能为空!';
            $this->ajaxReturn($info);
        }
        $re = $m->delete($id);
        if ($re) {
            $info['status'] = 1;
            $info['msg'] = '删除成功!';
        } else {
            $info['status'] = 0;
            $info['msg'] = '删除失败!';
        }
        $this->ajaxReturn($info);
    }

    public function cardExport()
    {
        $id = I('id');
        $type = I('type');
        if ($id) {
            $map['id'] = array('in', in_parse_str($id));
        } else {
            $map['type'] = $type;
        }
        $data = M('vip_card')->where($map)->field('id,type,cardno,cardpwd,status')->select();
        foreach ($data as $k => $v) {
            switch ($v['type']) {
                case 1:
                    $data[$k]['type'] = "充值卡";
                    break;
                case 2:
                    $data[$k]['type'] = "代金券";
                    break;
            }
            switch ($v['status']) {
                case 0:
                    $data[$k]['status'] = "可制作";
                    break;
                case 1:
                    $data[$k]['status'] = "已发放";
                    break;
                case 2:
                    $data[$k]['status'] = "已使用";
                    break;
            }
        }
        $title = array('id', '类型', '卡号', '卡密', '状态');
        $this->exportexcel($data, $title, '卡券数据');
    }

    //挂靠
    public function txorder()
    {
        //设置面包导航，主加载器请配置
        $bread = array(
            '0' => array(
                'name' => '挂靠申请',
                'url' => U('Multi/Vip/txorder'),
            ),
        );
        $this->assign('breadhtml', $this->getBread($bread));


        $status = I('status');
        $this->assign('status', $status);
        if ($status || $status == '0') {
            $map['status'] = $status;
        }
        $this->assign('status', $status);
        //绑定搜索条件与分页
        $m = M('Anchored');
        $p = $_GET['p'] ? $_GET['p'] : 1;
        $name = I('name') ? I('name') : '';
        if ($name) {
            //提现人姓名
            $map['aname'] = array('like', "%$name%");
            $this->assign('name', $name);
        }
        $psize = self::$CMS['set']['pagesize'] ? self::$CMS['set']['pagesize'] : 20;
        $cache = $m->where($map)->page($p, $psize)->order('time desc')->select();
        $count = $m->where($map)->count();
        $this->getPage($count, $psize, 'App-loader', '挂靠申请列表', 'App-search');
        $this->assign('cache', $cache);
        $this->display();
    }

    //现金币充值
    public function recharge()
    {
        $m =M('Vip');

        //设置面包导航，主加载器请配置
        $bread = array(
            '0' => array(
                'name' => '现金币充值',
                'url' => U('Multi/Vip/recharge'),
            ),
        );
        $this->assign('breadhtml', $this->getBread($bread));

        if (IS_POST) {
            $mobile= I('mobile');
            $money= I('money');
            if(empty($money)){
                $info['status'] = 0;
                $info['msg'] = '请填写充值金额！';
                $this->ajaxReturn($info);
                return;
            }
            if(empty($mobile)){
                $info['status'] = 0;
                $info['msg'] = '请填写会员账号！';
                $this->ajaxReturn($info);
                return;
            }
            $map['mobile'] = $mobile;
            $user_data=M('Vip')->where($map)->find();
            if(empty($user_data)){
                $info['status'] = 0;
                $info['msg'] = '此会员账号不存在！';
                $this->ajaxReturn($info);
                return;
            }

            $map['mobile']=$mobile;

            if($money > 0){
                $res= $m->where($map)->setInc('money',$money);
            }

            if($money <= 0){
                $res= $m->where($map)->setDec('money',$money * -1);
            }

            $mvip=M('Vip');
            $m_recharge_info=M('Recharge_info');
            $vip=$mvip->where(array('mobile'=>$mobile))->find();
            $data['name']=$vip['nickname'];
            $data['mobile']=$mobile;
            $data['money']=$money;
            $data['time']=date("Y-m-d H:i:s");
            $m_recharge_info->add($data);

            if($res){
                $info['status'] = 1;
                $info['msg'] = '充值成功！';

                $phone="18015885851";
                $nickname=$vip['nickname'];
                $sms_templateM=M('sms_template');
                $yanzhengxinxi=$sms_templateM->where('type=2')->field('id,content,active_time')->find();
                $yanzhengcontent=str_replace('[nickname]',$nickname,$yanzhengxinxi['content']);
                $yanzhengcontent=str_replace('[money]',$money,$yanzhengcontent);


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

                // var_dump($sms_info_json);die;
//                if($sms_info_json['status']==0){
                    $sms_phone=M('sms_phone');
                    $data['phone'] = $phone;
                    $data['content'] = $yanzhengcontent;
                    $data['create_time'] = date("Y-m-d H:i:s");
                    $mm=5*60;
                    $data['dead_time']=date("Y-m-d H:i:s",strtotime($data['create_time'])+$mm);
                    $data['smstempid'] = 1;
                    //$data['code'] = $code;
                    $res=$sms_phone->add($data);
                /*    if($res){
                        $result['id']=$res;
                        $result['state_code']=1;
                        $result['msg']='发送成功';
                        $this->ajaxReturn($result);
                    }
                }else{
                    $result['state_code']=2;
                    $result['msg']='发送失败';
                    $this->ajaxReturn($result);
                }*/
            }else{
                $info['status'] = 0;
                $info['msg'] = '充值失败！';
            }
            $this->ajaxReturn($info);
        }
        $this->display();
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



    //充值明细
    public function recharge_info()
    {
        $m =M('Vip');

        //设置面包导航，主加载器请配置
        $bread = array(
            '0' => array(
                'name' => '充值明细',
                'url' => U('Multi/Vip/recharge_info'),
            ),
        );
        $this->assign('breadhtml', $this->getBread($bread));

        $m_recharge_info=M('Recharge_info');
        $p = $_GET['p'] ? $_GET['p'] : 1;
        $name = I('name') ? I('name') : '';
        if ($name) {
            //提现人姓名
            $map['name'] = array('like', "%$name%");
            $this->assign('name', $name);
        }

        $psize = self::$CMS['set']['pagesize'] ? self::$CMS['set']['pagesize'] : 20;
        $data = $m_recharge_info->where($map)->page($p, $psize)->order('time desc')->select();
        $count = $m_recharge_info->where($map)->count();
        $this->getPage($count, $psize, 'App-loader', '充值明细', 'App-search');

        $this->assign('data',$data);
        $this->display();
    }

    //保证金
    public function bond()
    {
        $m =M('Vip');

        //设置面包导航，主加载器请配置
        $bread = array(
            '0' => array(
                'name' => '保证金',
                'url' => U('Multi/Vip/bond'),
            ),
        );
        $this->assign('breadhtml', $this->getBread($bread));

        $p = $_GET['p'] ? $_GET['p'] : 1;
        $name = I('name') ? I('name') : '';
        if ($name) {
            //搜索
            $map['name'] = array('like', "%$name%");
            $this->assign('name', $name);
        }

        $map['bond_status']=1;

        $psize = self::$CMS['set']['pagesize'] ? self::$CMS['set']['pagesize'] : 20;
        $data = $m->where($map)->page($p, $psize)->select();
        $count = $m->where($map)->count();
        $this->getPage($count, $psize, 'App-loader', '保证金', 'App-search');

        foreach($data as $k => &$v){
            $v['fx_level_name']=M('vip_level')->where('id=' . $v['fx_level'])->getField('name');
            $v['fx_level_money']=M('vip_level')->where('id=' . $v['fx_level'])->getField('exp');
           /* if($v['bond_status']){
                $v['bond_ch']='已交';
            }else{
                $v['bond_ch']='未交';
            }*/
        }
        $this->assign('data',$data);
        $this->display();
    }


    //返利明细
    public function rebateinfo(){
        //设置面包导航，主加载器请配置
        $bread = array(
            '0' => array(
                'name' => '返利明细',
                'url' => U('Multi/Vip/bond'),
            ),
        );
        $this->assign('breadhtml', $this->getBread($bread));
        $p = $_GET['p'] ? $_GET['p'] : 1;
        $name = I('name') ? I('name') : '';
        if ($name) {
            //搜索
            $map['name'] = array('like', "%$name%");
            $this->assign('name', $name);
        }
        $m=M('Rebate');
        $psize = self::$CMS['set']['pagesize'] ? self::$CMS['set']['pagesize'] : 20;
        $data = $m->where($map)->page($p, $psize)->select();
        $count = $m->where($map)->count();
        $this->getPage($count, $psize, 'App-loader', '保证金', 'App-search');

        foreach($data as $k => &$v){
            $v['buyname'] = M('Vip')->find($v['buyid'])['nickname'];
            $v['pname'] = M('Vip')->find($v['pid'])['nickname'];
        }
        $this->assign('data',$data);
        $this->display();
    }

    public function txorderOk()
    {
        $options['appid'] = self::$SYS['set']['wxappid'];
        $options['appsecret'] = self::$SYS['set']['wxappsecret'];
        $wx = new \Util\Wx\Wechat($options);

        $arr = array_filter(explode(',', $_GET['id'])); //必须使用get方法
        $m = M('Vip_tx');
        $mlog = M('Vip_message');
        $mvip = M('Vip');

        $err = TRUE;
        foreach ($arr as $k => $v) {
            if ($v) {
                $old = $m->where('id=' . $v)->find();
                $old['status'] = 2;
                $old['txtime'] = time();
                $rv = $m->save($old);
                if ($rv !== FALSE) {
                    $data_msg['pids'] = $old['vipid'];
                    $data_msg['title'] = "亲爱的用户，提现已完成！" . $old['txprice'] . self::$SHOP['set']['yjname'] . "已成功发放到您的提现帐户里面了！";
                    $data_msg['content'] = "提现订单编号：" . $old['id'] . "<br><br>提现申请" . self::$SHOP['set']['yjname'] . "：" . $old['txprice'] . "<br><br>提现完成时间：" . date('Y-m-d H:i', $old['txtime']) . "<br><br>您的提现申请已完成，如有异常请联系客服！";
                    $data_msg['ctime'] = time();

                    // 发送信息===============
                    $customer = M('Wx_customer')->where(array('type' => 'tx2'))->find();
                    $vip = $mvip->where(array('id' => $old['vipid']))->find();
                    $msg = array();
                    $msg['touser'] = $vip['openid'];
                    $msg['msgtype'] = 'text';
                    $str = $customer['value'];
                    $msg['text'] = array('content' => $str);
                    $ree = $wx->sendCustomMessage($msg);
                    // 发送消息完成============

                    $rmsg = $mlog->add($data_msg);
                } else {
                    $err = FALSE;
                }
            } else {
                $err = FALSE;
            }
        }
        if ($err) {
            $info['status'] = 1;
            $info['msg'] = '批量设置成功!';
        } else {
            $info['status'] = 0;
            $info['msg'] = '批量设置可能存在部分失败，请刷新后重新尝试!';
        }
        $this->ajaxReturn($info);
    }

    public function txorderCancel()
    {
        $id = I('id');
        if (!$id) {
            $info['status'] = 0;
            $info['msg'] = '未正常获取ID数据！';
            $this->ajaxReturn($info);
        }
        $m = M('Anchored');
        $mvip = M('Vip');
        $mlog = M('Shop_order_log');
        $anchored_one = $m->where('id=' . $id)->find();

        if ($anchored_one['status'] == 1) {
            $info['status'] = 0;
            $info['msg'] = '只可以操作新申请订单！';
            $this->ajaxReturn($info);
        }

        $vip = $mvip->where('id=' . $anchored_one['aid'])->find();
        if (!$vip) {
            $info['status'] = 0;
            $info['msg'] = '未正常获取相关会员信息！';
            $this->ajaxReturn($info);
        }

        $rold = $m->where('id=' . $id)->setField('status', 1);
        if ($rold !== FALSE) {
            $rvip = $mvip->where('id=' . $anchored_one['aid'])->setField('anchored_id', $anchored_one['bid']);
            if ($rvip) {
                $data_msg['pids'] = $vip['id'];
                $data_msg['title'] = "您的挂靠申请已通过" ;
                $data_msg['content'] = "您申请挂靠在：" . $anchored_one['bname'] . "<br><br>的申请已经通过"  . "<br><br>如有疑问请联系客服！";
                $data_msg['ctime'] = time();
                $rmsg = M('Vip_message')->add($data_msg);
                $info['status'] = 1;
                $info['msg'] = '挂靠申请成功！' ;

                // 发送信息===============
                $customer = M('Wx_customer')->where(array('type' => 'tx1'))->find();
                $options['appid'] = self::$SYS['set']['wxappid'];
                $options['appsecret'] = self::$SYS['set']['wxappsecret'];
                $wx = new \Util\Wx\Wechat($options);
                $msg = array();
                $msg['touser'] = $vip['openid'];
                $msg['msgtype'] = 'text';
                $str = $customer['value'];
                $msg['text'] = array('content' => $str);
                $ree = $wx->sendCustomMessage($msg);
                // 发送消息完成============

                $this->ajaxReturn($info);
            }
        } else {
            $info['status'] = 0;
            $info['msg'] = '操作失败，请重新尝试！';
            $this->ajaxReturn($info);
        }
    }

    public function txorderExport()
    {
        $id = I('id');
        $status = I('status');
        if ($id) {
            $map['id'] = array('in', in_parse_str($id));
        } else {
            $map['status'] = $status;
        }
        switch ($status) {
            case 0:
                $tt = "提现失败";
                break;
            case 1:
                $tt = "新申请";
                break;
            case 2:
                $tt = "提现完成";
                break;
        }
        $data = M('Vip_tx')->where($map)->select();
        foreach ($data as $k => $v) {
            switch ($v['status']) {
                case 0:
                    $data[$k]['status'] = "提现失败";
                    break;
                case 1:
                    $data[$k]['status'] = "新申请";
                    break;
                case 2:
                    $data[$k]['status'] = "提现完成";
                    break;
            }
            $data[$k]['txsqtime'] = date('Y-m-d H:i:s', $v['txsqtime']);
            $data[$k]['txtime'] = $v['txtime'] ? date('Y-m-d H:i:s', $v['txtime']) : '未执行';
        }
        $title = array('ID', '会员ID', '提现金额', '提现姓名', '提现电话', '提现银行', '提现分行', '提现银行所在地', '提现银行卡卡号', '提现申请时间', '提现完成时间', '订单状态');
        $this->exportexcel($data, $title, $tt . '订单' . date('Y-m-d H:i:s', time()));
    }

    /**
     * 导出数据为excel表格
     * @param $data    一个二维数组,结构如同从数据库查出来的数组
     * @param $title   excel的第一行标题,一个数组,如果为空则没有标题
     * @param $filename 下载的文件名
     * @examlpe
     *$stu = M ('User');
     * $arr = $stu -> select();
     * exportexcel($arr,array('id','账户','密码','昵称'),'文件名!');
     */
    private function exportexcel($data = array(), $title = array(), $filename = 'report')
    {
        header("Content-type:application/octet-stream");
        header("Accept-Ranges:bytes");
        header("Content-type:application/vnd.ms-excel");
        header("Content-Disposition:attachment;filename=" . $filename . ".xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        //导出xls 开始
        if (!empty($title)) {
            foreach ($title as $k => $v) {
                $title[$k] = iconv("UTF-8", "GB2312", $v);
            }
            $title = implode("\t", $title);
            echo "$title\n";
        }
        if (!empty($data)) {
            foreach ($data as $key => $val) {
                foreach ($val as $ck => $cv) {
                    $data[$key][$ck] = iconv("UTF-8", "GB2312", $cv);
                }
                $data[$key] = implode("\t", $data[$key]);

            }
            echo implode("\n", $data);
        }

    }

    //获取用户信息
    public function getUserInfo(){

        $map['mobile'] = $_POST['mobile'];
        
        if(empty($map['mobile'])){
            $result['state_code']=0;
            $result['msg']='手机号不能为空!';
            $this->ajaxReturn($result);
        }

        $user_data = M('Vip')->where($map)->field("exp,money,mobile,my_recommend_code,nickname")->select();
        
        if($user_data){
            $result['state_code'] = 1;
            $result['msg']= $user_data;
        }
        else{
            $result['state_code'] = 0;
            $result['msg'] = '此会员用户不存在!';
        }
        $this->ajaxReturn($result);
    }

}