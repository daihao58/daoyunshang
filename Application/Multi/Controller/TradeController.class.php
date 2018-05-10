<?php
namespace Multi\Controller;

class TradeController extends BaseController
{
    public function trade()
    {
        $condition = array(
            "shop_id" => session("homeShopId")
        );

        $num = 25;
        $p = I("get.page") ? I("get.page") : 1;
        $tradeList = D("Trade")->getTradeList($condition, true, "id desc", $p, $num);
        $this->assign('tradeList', $tradeList);// 赋值数据集
        $count = D("Trade")->getTradeListCount($condition);// 查询满足要求的总记录数
        $Page = new \Think\Page($count, $num);// 实例化分页类 传入总记录数和每页显示的记录数
        $Page->setConfig('theme', "<ul class='pagination no-margin pull-right'></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><a> %HEADER%  %NOW_PAGE%/%TOTAL_PAGE% 页</a></ul>");
        $show = $Page->show();// 分页显示输出
        $this->assign('page', $show);// 赋值分页输出

        // $shop = D("Shop")->getShop(array("id" => session("homeShopId")));
        // $this->assign("money", $shop["money"]);

        $tradeListMoney = M("Trade")->where(array("shop_id" => session("homeShopId")))->sum("money");
        $this->assign("allMoney", $tradeListMoney);

        $this->display();
    }

    public function tx()
    {

        $condition = array(
            "shop_id" => session("homeShopId")
        );

        $txConfig = D("Tx")->getTx($condition);
        $this->assign('txConfig', $txConfig);

        $num = 25;
        $p = I("get.page") ? I("get.page") : 1;

        $txList = D("Tx")->getTxList($condition, true, "id desc", $p, $num);
        $this->assign('txList', $txList);// 赋值数据集

        $count = D("Tx")->getTxListCount($condition);// 查询满足要求的总记录数
        $Page = new \Think\Page($count, $num);// 实例化分页类 传入总记录数和每页显示的记录数
        $Page->setConfig('theme', "<ul class='pagination no-margin pull-right'></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><a> %HEADER%  %NOW_PAGE%/%TOTAL_PAGE% 页</a></ul>");
        $show = $Page->show();// 分页显示输出
        $this->assign('page', $show);// 赋值分页输出

        if (session("homeShopId")) {
            $shop = D("ShopSet")->get(array("id" => session("homeShopId")));
            $this->assign("maxMoney", $shop["money"]);
        }

        $vipset = M('Vip_set')->where()->find();
        $this->assign("config", $vipset);

        $this->display();
    }

    public function addTx()
    {
        if (I("post.money") < 100) {
            $info['status'] = 0;
            $info['msg'] = '最少提现100元！';
            $this->ajaxReturn($info);
        }

        $data = I("post.");
        $data["user_id"] = $_SESSION['CMS']['usid'];
        $data["shop_id"] = session("homeShopId");

        $shop = D("ShopSet")->get(array("id" => $data["shop_id"]));
        if (floatval($shop["money"]) - floatval($data["money"]) >= 0) {
            $vipset = M('Vip_set')->where()->find();

            $data["fee"] = floatval($data["money"]) * floatval($vipset["tx_fee"]*0.01);
            $data["tx"] = $data["money"] - $data["fee"];

            D("Tx")->addTx($data);
            D("ShopSet")->where(array("id" => $data["shop_id"]))->setDec("money", $data["money"]);

            $info['status'] = 1;
            $info['msg'] = '申请成功!';
            $this->ajaxReturn($info);           
        } else {
            $info['status'] = 1;
            $info['msg'] = '申请失败!';
            $this->ajaxReturn($info); 
        }

    }

    public function updateTx()
    {
        $data = I("get.");

        $tx = D("Tx")->getTx(array("id" => $data["id"]));
        if ($data["status"] == $tx["status"]) {
            $this->redirect("Multi/Trade/tx");
        }

        if ($tx["status"] == 0) {
            if ($data["status"] == -1) {
                D("ShopSet")->where(array("id" => $tx["shop_id"]))->setInc("money", floatval($tx["money"]));
            }

            D("Tx")->saveTx($data);
            $this->redirect("Multi/Trade/tx");
        } else {
            $this->redirect("Multi/Trade/tx");
        }

    }

    public function export()
    {
        if (I("get.id")) {
            $trade = D("Trade")->getTradeList(array("id" => array("in", I("get.id"))));
        } else {
            $condition = array(
                "shop_id" => session("homeShopId")
            );

            $trade = D("Trade")->getTradeList($condition);
        }

        Vendor("PHPExcel.Excel#class");
        \Excel::export($trade, array('交易ID', '店铺ID', '交易流水', '用户ID', '金额', '支付方式', '备注', '时间'));
    }

    public function exportTx()
    {
        if (I("get.id")) {
            $trade = D("Tx")->getTxList(array("id" => array("in", I("get.id"))));
        } else {
            $condition = array(
                "shop_id" => session("homeShopId")
            );

            $trade = D("Tx")->getTxList($condition);
        }

        Vendor("PHPExcel.Excel#class");
        \Excel::export($trade, array('提现ID', '提现流水', '用户ID', '店铺ID', '账户', '申请人', '金额', '状态', '时间'));
    }

}