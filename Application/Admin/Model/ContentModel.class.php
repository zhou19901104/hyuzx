<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 16-9-16
 * Time: 上午11:04
 */

namespace Admin\Model;

use Think\Model;

class ContentModel extends Model
{
    /**
     * 检查文章数据完整性
     * @var array
     */
    protected $_validate = array(

        array('title', 'require', '文章标题不能为空'),
        array('title', '', '文章标题已经存在', 0, 'unique', 1),
        array('title', '1,50', '文章标题长度在1-50位之间', 1, 'length', 1),
        array('description', 'require', '文章简介不能为空'),
        array('content', 'require', '文章内容不能为空'),
    );

    /**
     * 删除数据
     * @param $data
     * @param $options
     */
    protected function _before_delete($data, $options)
    {
        $info = D('Content')->field('img_url,id')->find($data['where']['id']);
        @unlink($info['img_url']);

    }



}