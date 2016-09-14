<?php

namespace  Admin\Model;

use Think\Model;

class DoctorModel extends Model
{
    /**
     * 删除图片
     * @param $data
     * @param $options
     */
    protected function _before_delete($data, $options)
    {
        $info = D('Doctor')
                ->field('index_url,img_url')
                ->find($data['where']['id']);
        @unlink($info['index_url']);
        @unlink($info['img_url']);
    }
}
