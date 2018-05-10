<?php
// +----------------------------------------------------------------------
// | 自定义用户模型
// +----------------------------------------------------------------------
namespace Multi\Model;

use Think\Model\RelationModel;

class UploadImgModel extends RelationModel
{

    public function add($data)
    {
        $id = parent::add($data);
        return $id;
    }

    public function del($id,$relation = false)
    {
        $data = $this->where(array ("id" => $id))
                     ->relation($relation)
                     ->delete();

        return $data;
    }

    public function edit($map,$data){
        $result=$this->where($map)
                     ->save($data);

        return $result;
    }

    public function get($map, $relation = false)
    {
        $data = $this->where($map)
                     ->relation($relation)
                     ->find();

        return $data;
    }

    public function getList($map, $relation = false, $order = "id desc", $p = 0, $num = 0, $limit = 0)
    {
        $data = $this->where($map)
                     ->relation($relation)
                     ->page($p . ',' . $num . '')
                     ->order($order)
                     ->select();

        return $data;
    }


















}

?>