<?php

namespace  Admin\Model;

use Think\Model;

class DoctorModel extends Model
{
    protected $_validate = array(

        array('name', 'require', '医生姓名不能为空'),
        array('zhicheng', 'require', '医生职称不能为空'),
        array('zhuone', 'require', '主打方向不能为空'),
        array('jieshao', 'require', '医生介绍不能为空'),
        array('index_zhu', 'require', '医生介绍不能为空'),
        array('index_message', 'require', '主页医生寄语不能为空'),

    );
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
