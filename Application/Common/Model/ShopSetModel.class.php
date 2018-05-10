<?php
namespace Common\Model;

use Think\Model\RelationModel;

class ShopSetModel extends RelationModel
{
    protected $_link = array(
        'UploadImg' => array(
            'mapping_type' => self::BELONGS_TO,
            'mapping_name' => 'UploadImg',
            'foreign_key' => 'pic',//关联id
            'as_fields' => 'savename:savename,savepath:savepath',
        ),
    );

    public function add($data)
    {
            $this->save($data);
            
            return $data["id"];
    }

    public function del($map,$relation = false){
        $result=$this->where($map)
                     ->relation($relation)
                     ->delete();

        return $result;
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

