<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 16-9-13
 * Time: 上午11:12
 */

namespace Admin\Model;

use Think\Model;

class NewsModel extends Model
{
    /**检测新闻的数据完整性
     * @var array
     */
    protected $_validate = array(

        array('title', 'require', '新闻标题不能为空'),
        array('content', 'require', '新闻内容不能为空'),
        array('intro', 'require', '新闻简介不能为空'),
        array('intro', '30,200', '新闻简介长度在30-200位之间', 1, 'length', 1),

    );

    /**
     * 删除新闻动态的图片
     * @param $data
     * @param $options
     */
    protected function _before_delete($data, $options)
    {
      $data2 = M('News')->field('bg_img_url,id')->find($data['where']['id']);
      @unlink($data2['bg_img_url']);
    }


}