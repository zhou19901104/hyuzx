<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 16-9-12
 * Time: 下午5:26
 */

namespace Home\Controller;


class NewsController extends CommonController
{
    public function news_info()
    {

        $related_list = M('content')->where('related = 1')->limit(6)->select();
        $this->assign('related_list', $related_list);

        $doctor_list = M('doctor')->limit(3)->order('sort desc')->select();
        $this->assign('doctor_list', $doctor_list);

        $case_info = M('case')->order('sort desc')->find();
        $this->assign('case_info', $case_info);


        $id = I('get.id');
        $info = M('content')->where('id = "' . $id . '"')->find();

        $class_info = M('class')->where('pid = "' . $info['cid'] . '"')->find();

        if ($class_info == '') {
            $class_info = M('class')->where('class_name = "新闻动态"')->find();
        }

        $this->assign('class_info', $class_info);

        $data['read_num'] = $info['read_num'] + 1;
        M('content')->where('id = "' . $info['id'] . '"')->save($data);

        $this->assign('info', $info);
        $this->display();
    }

}