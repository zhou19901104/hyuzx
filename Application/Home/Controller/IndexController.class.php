<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends CommonController
{
   //主页
   public function index()
   {

      $class_list = M('Class')->where('pid = 0')->order('sort desc')->select();

      //dump($class_list);die();
      $p_list = M('class')->where('class_name = "项目系列"')->find();

      //dump($p_list);die();
      $p_list = M('class')->where('pid = "' . $p_list['id'] . '"')->select();



      for ($i = 0; $i < count($class_list); $i++) {
         $class_list[$i]['p_class'] = M('class')->where('pid = "' . $class_list[$i]['id'] . '"')->select();
         for ($k = 0; $k < count($class_list[$i]['p_class']); $k++) {
            $class_list[$i]['p_class'][$k]['k_class'] = M('class')->where('pid = "' . $class_list[$i]['p_class'][$k]['id'] . '"')->select();

            for ($l = 0; $l < count($class_list[$i]['p_class'][$k]['k_class']); $l++) {
               $class_list[$i]['p_class'][$k]['k_class'][$l]['tid'] = M('content')->where('cid = "' . $class_list[$i]['p_class'][$k]['k_class'][$l]['id'] . '"')->field('id')->find();
            }

            for ($c = 0; $c < count($class_list[$i]['p_class'][$k]['k_class']); $c++) {
               $class_list[$i]['p_class'][$k]['k_class'][$c]['c_class'] = M('class')->where('pid = "' . $class_list[$i]['p_class'][$k]['k_class'][$c]['id'] . '"')->select();
            }
         }
      }

      $hot_info = M('content')->where('hot = 1')->order('createtime desc')->find();

      $this->assign('hot_info', $hot_info);

      $foot_list = M('class')->where('pid = "12" and id <> "98"')->select();
      for ($i = 0; $i < count($foot_list); $i++) {
         $foot_list[$i]['zi_list'] = M('class')->where('pid = "' . $foot_list[$i]['id'] . '"')->select();
      }
      $this->assign('foot_list', $foot_list);

      $doctor_list = M('doctor')->order('sort desc')->select();
      for ($i = 0; $i < count($doctor_list); $i++) {
         $re = explode('；', $doctor_list[$i]['index_zhu']);
         $doctor_list[$i]['jingli'] = $re;
      }

      $anli_list = M('case')->limit(4)->select();

      $this->assign('doctor_list', $doctor_list);
      $this->assign('anli_list', $anli_list);
      $this->assign('class_list', $class_list);

      $this->assign('p_list', $p_list);

      //dump($class_list);die();

      $this->display();
   }

   //文章列表
   public function new_list()
   {

      $foot_list = M('class')->where('pid = "12" and id <> "98"')->select();
      for ($i = 0; $i < count($foot_list); $i++) {
         $foot_list[$i]['zi_list'] = M('class')->where('pid = "' . $foot_list[$i]['id'] . '"')->select();
      }
      $this->assign('foot_list', $foot_list);

      $class_list = M('class')->where('pid = 0')->order('sort desc')->select();

      for ($i = 0; $i < count($class_list); $i++) {
         $class_list[$i]['p_class'] = M('class')->where('pid = "' . $class_list[$i]['id'] . '"')->select();
         for ($k = 0; $k < count($class_list[$i]['p_class']); $k++) {
            $class_list[$i]['p_class'][$k]['k_class'] = M('class')->where('pid = "' . $class_list[$i]['p_class'][$k]['id'] . '"')->select();
            for ($l = 0; $l < count($class_list[$i]['p_class'][$k]['k_class']); $l++) {
               $class_list[$i]['p_class'][$k]['k_class'][$l]['tid'] = M('content')->where('cid = "' . $class_list[$i]['p_class'][$k]['k_class'][$l]['id'] . '"')->find();
            }
            for ($c = 0; $c < count($class_list[$i]['p_class'][$k]['k_class']); $c++) {
               $class_list[$i]['p_class'][$k]['k_class'][$c]['c_class'] = M('class')->where('pid = "' . $class_list[$i]['p_class'][$k]['k_class'][$c]['id'] . '"')->select();
            }
         }
      }
      $this->assign('class_list', $class_list);


      $id = I('get.id');

      $class_info = M('class')->where('id = "' . $id . '"')->find();

      $pp_class = M('class')->where('pid = "' . $id . '"')->select();
      for ($a = 0; $a < count($pp_class); $a++) {
         $pp_class[$a]['tid'] = M('content')->where('cid = "' . $pp_class[$a]['id'] . '"')->find();
      }

      for ($i = 0; $i < count($pp_class); $i++) {
         $list[$i] = M('class')->where('pid = "' . $pp_class[$i]['id'] . '"')->select();
         for ($k = 0; $k < count($list[$i]); $k++) {
            $pp_class[$i]['content'][] = M('content')->where('cid = "' . $list[$i][$k]['id'] . '"')->select();

         }
      }

      $this->assign('pp_class', $pp_class);
      $this->assign('class_info', $class_info);
      $this->display();
   }

   //品牌详情
   public function band_info()
   {

      $related_list = M('content')->where('related = 1')->limit(6)->select();
      $this->assign('related_list', $related_list);

      $doctor_list = M('doctor')->limit(3)->order('sort desc')->select();
      $this->assign('doctor_list', $doctor_list);

      $case_info = M('case')->order('sort desc')->find();
      $this->assign('case_info', $case_info);

      $foot_list = M('class')->where('pid = "12" and id <> "98"')->select();
      for ($i = 0; $i < count($foot_list); $i++) {
         $foot_list[$i]['zi_list'] = M('class')->where('pid = "' . $foot_list[$i]['id'] . '"')->select();
      }
      $this->assign('foot_list', $foot_list);

      $class_list = M('class')->where('pid = 0')->order('sort desc')->select();

      for ($i = 0; $i < count($class_list); $i++) {
         $class_list[$i]['p_class'] = M('class')->where('pid = "' . $class_list[$i]['id'] . '"')->select();
         for ($k = 0; $k < count($class_list[$i]['p_class']); $k++) {
            $class_list[$i]['p_class'][$k]['k_class'] = M('class')->where('pid = "' . $class_list[$i]['p_class'][$k]['id'] . '"')->select();
            for ($l = 0; $l < count($class_list[$i]['p_class'][$k]['k_class']); $l++) {
               $class_list[$i]['p_class'][$k]['k_class'][$l]['tid'] = M('content')->where('cid = "' . $class_list[$i]['p_class'][$k]['k_class'][$l]['id'] . '"')->field('id')->find();
            }
            for ($c = 0; $c < count($class_list[$i]['p_class'][$k]['k_class']); $c++) {
               $class_list[$i]['p_class'][$k]['k_class'][$c]['c_class'] = M('class')->where('pid = "' . $class_list[$i]['p_class'][$k]['k_class'][$c]['id'] . '"')->select();
            }
         }
      }
      $this->assign('class_list', $class_list);

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

   //文章详情
   public function new_info()
   {

      $foot_list = M('class')->where('pid = "12" and id <> "98"')->select();
      for ($i = 0; $i < count($foot_list); $i++) {
         $foot_list[$i]['zi_list'] = M('class')->where('pid = "' . $foot_list[$i]['id'] . '"')->select();
      }
      $this->assign('foot_list', $foot_list);

      $class_list = M('class')->where('pid = 0')->order('sort desc')->select();

      for ($i = 0; $i < count($class_list); $i++) {
         $class_list[$i]['p_class'] = M('class')->where('pid = "' . $class_list[$i]['id'] . '"')->select();
         for ($k = 0; $k < count($class_list[$i]['p_class']); $k++) {
            $class_list[$i]['p_class'][$k]['k_class'] = M('class')->where('pid = "' . $class_list[$i]['p_class'][$k]['id'] . '"')->select();
            for ($l = 0; $l < count($class_list[$i]['p_class'][$k]['k_class']); $l++) {
               $class_list[$i]['p_class'][$k]['k_class'][$l]['tid'] = M('content')->where('cid = "' . $class_list[$i]['p_class'][$k]['k_class'][$l]['id'] . '"')->field('id')->find();
            }
            for ($c = 0; $c < count($class_list[$i]['p_class'][$k]['k_class']); $c++) {
               $class_list[$i]['p_class'][$k]['k_class'][$c]['c_class'] = M('class')->where('pid = "' . $class_list[$i]['p_class'][$k]['k_class'][$c]['id'] . '"')->select();
            }
         }
      }
      $this->assign('class_list', $class_list);

      $id = I('get.id');


      $info = M('content')->where('id = "' . $id . '"')->find();

      if (!$info) {
         $info = M('content')->where('cid = "' . $id . '"')->find();
      }

      $data['read_num'] = $info['read_num'] + 1;
      M('content')->where('id = "' . $info['id'] . '"')->save($data);

      $related_list = M('content')->where('related = 1')->limit(6)->select();


      $doctor_list = M('doctor')->limit(3)->order('sort desc')->select();
      $this->assign('doctor_list', $doctor_list);

      $case_info = M('case')->order('sort desc')->find();
      $this->assign('case_info', $case_info);


      $this->assign('info', $info);
      $this->assign('related_list', $related_list);
      $this->display();
   }

   //视频列表
   public function case_info()
   {

      $foot_list = M('class')->where('pid = "12" and id <> "98"')->select();
      for ($i = 0; $i < count($foot_list); $i++) {
         $foot_list[$i]['zi_list'] = M('class')->where('pid = "' . $foot_list[$i]['id'] . '"')->select();
      }
      $this->assign('foot_list', $foot_list);

      $class_list = M('class')->where('pid = 0')->order('sort desc')->select();

      for ($i = 0; $i < count($class_list); $i++) {
         $class_list[$i]['p_class'] = M('class')->where('pid = "' . $class_list[$i]['id'] . '"')->select();
         for ($k = 0; $k < count($class_list[$i]['p_class']); $k++) {
            $class_list[$i]['p_class'][$k]['k_class'] = M('class')->where('pid = "' . $class_list[$i]['p_class'][$k]['id'] . '"')->select();
            for ($l = 0; $l < count($class_list[$i]['p_class'][$k]['k_class']); $l++) {
               $class_list[$i]['p_class'][$k]['k_class'][$l]['tid'] = M('content')->where('cid = "' . $class_list[$i]['p_class'][$k]['k_class'][$l]['id'] . '"')->field('id')->find();
            }
            for ($c = 0; $c < count($class_list[$i]['p_class'][$k]['k_class']); $c++) {
               $class_list[$i]['p_class'][$k]['k_class'][$c]['c_class'] = M('class')->where('pid = "' . $class_list[$i]['p_class'][$k]['k_class'][$c]['id'] . '"')->select();
            }
         }
      }
      $this->assign('class_list', $class_list);

      $id = I('get.id');

      if ($id == '') {
         $id = 10;
      }

      $info = M('case')->where('id = "' . $id . '"')->find();
      $related_list = M('content')->where('related = 1')->order('sort desc')->limit(6)->select();
      $doctor_list = M('doctor')->where('related = 1')->order('sort desc')->limit(5)->select();
      $anli_list = M('case')->where('related = 1 and id <> "' . $id . '"')->order('sort desc')->limit(3)->select();

      $anli_list_a = M('case')->where('id = "' . $id . '"')->select();
      $anli_list_b = M('case')->where('id <> "' . $id . '"')->select();
      for ($i = 0; $i < count($anli_list_b); $i++) {
         $k = $i + 1;
         $anli_list_a[$k] = $anli_list_b[$i];
      }

      $class_info = M('class')->where('class_name = "焕誉案例"')->find();


      $this->assign('related_list', $related_list);
      $this->assign('class_info', $class_info);
      $this->assign('doctor_list', $doctor_list);
      $this->assign('anli_list', $anli_list);
      $this->assign('anli_list_a', $anli_list_a);

      $this->assign('info', $info);

      $this->display();
   }

   //医生列表
   public function doctor_list()
   {

      $foot_list = M('class')->where('pid = "12" and id <> "98"')->select();
      for ($i = 0; $i < count($foot_list); $i++) {
         $foot_list[$i]['zi_list'] = M('class')->where('pid = "' . $foot_list[$i]['id'] . '"')->select();
      }
      $this->assign('foot_list', $foot_list);

      $class_list = M('class')->where('pid = 0')->order('sort desc')->select();

      for ($i = 0; $i < count($class_list); $i++) {
         $class_list[$i]['p_class'] = M('class')->where('pid = "' . $class_list[$i]['id'] . '"')->select();
         for ($k = 0; $k < count($class_list[$i]['p_class']); $k++) {
            $class_list[$i]['p_class'][$k]['k_class'] = M('class')->where('pid = "' . $class_list[$i]['p_class'][$k]['id'] . '"')->select();
            for ($l = 0; $l < count($class_list[$i]['p_class'][$k]['k_class']); $l++) {
               $class_list[$i]['p_class'][$k]['k_class'][$l]['tid'] = M('content')->where('cid = "' . $class_list[$i]['p_class'][$k]['k_class'][$l]['id'] . '"')->field('id')->find();
            }
            for ($c = 0; $c < count($class_list[$i]['p_class'][$k]['k_class']); $c++) {
               $class_list[$i]['p_class'][$k]['k_class'][$c]['c_class'] = M('class')->where('pid = "' . $class_list[$i]['p_class'][$k]['k_class'][$c]['id'] . '"')->select();
            }
         }
      }
      $this->assign('class_list', $class_list);

      $list = M('doctor')->order('sort desc')->select();
      $class_info = M('class')->where('class_name = "医疗团队"')->find();

      $this->assign('list', $list);
      $this->assign('class_info', $class_info);
      $this->display();
   }

   //医生详情
   public function doctor_info()
   {

      $foot_list = M('class')->where('pid = "12" and id <> "98"')->select();
      for ($i = 0; $i < count($foot_list); $i++) {
         $foot_list[$i]['zi_list'] = M('class')->where('pid = "' . $foot_list[$i]['id'] . '"')->select();
      }
      $this->assign('foot_list', $foot_list);

      $class_list = M('class')->where('pid = 0')->order('sort desc')->select();

      for ($i = 0; $i < count($class_list); $i++) {
         $class_list[$i]['p_class'] = M('class')->where('pid = "' . $class_list[$i]['id'] . '"')->select();
         for ($k = 0; $k < count($class_list[$i]['p_class']); $k++) {
            $class_list[$i]['p_class'][$k]['k_class'] = M('class')->where('pid = "' . $class_list[$i]['p_class'][$k]['id'] . '"')->select();
            for ($l = 0; $l < count($class_list[$i]['p_class'][$k]['k_class']); $l++) {
               $class_list[$i]['p_class'][$k]['k_class'][$l]['tid'] = M('content')->where('cid = "' . $class_list[$i]['p_class'][$k]['k_class'][$l]['id'] . '"')->field('id')->find();
            }
            for ($c = 0; $c < count($class_list[$i]['p_class'][$k]['k_class']); $c++) {
               $class_list[$i]['p_class'][$k]['k_class'][$c]['c_class'] = M('class')->where('pid = "' . $class_list[$i]['p_class'][$k]['k_class'][$c]['id'] . '"')->select();
            }
         }
      }

      $this->assign('class_list', $class_list);

      $id = I('get.id');
      $info = M('doctor')->where('id = "' . $id . '"')->find();
      $info['rongyu'] = explode('；', $info['honor']);
      for ($i = 0; $i < count($info['rongyu']); $i++) {
         $re = explode('-', $info['rongyu'][$i]);
         $info['rong'][$i]['nian'] = $re[0];
         $info['rong'][$i]['cheng'] = $re[1];
      }

      $class_info = M('class')->where('class_name = "医疗团队"')->find();


      $this->assign('info', $info);
      $this->assign('class_info', $class_info);
      $this->display();
   }

   public function come()
   {
      $foot_list = M('class')->where('pid = "12" and id <> "98"')->select();
      for ($i = 0; $i < count($foot_list); $i++) {
         $foot_list[$i]['zi_list'] = M('class')->where('pid = "' . $foot_list[$i]['id'] . '"')->select();
      }
      $this->assign('foot_list', $foot_list);

      $class_list = M('class')->where('pid = 0')->order('sort desc')->select();

      for ($i = 0; $i < count($class_list); $i++) {
         $class_list[$i]['p_class'] = M('class')->where('pid = "' . $class_list[$i]['id'] . '"')->select();
         for ($k = 0; $k < count($class_list[$i]['p_class']); $k++) {
            $class_list[$i]['p_class'][$k]['k_class'] = M('class')->where('pid = "' . $class_list[$i]['p_class'][$k]['id'] . '"')->select();
            for ($l = 0; $l < count($class_list[$i]['p_class'][$k]['k_class']); $l++) {
               $class_list[$i]['p_class'][$k]['k_class'][$l]['tid'] = M('content')->where('cid = "' . $class_list[$i]['p_class'][$k]['k_class'][$l]['id'] . '"')->field('id')->find();
            }
            for ($c = 0; $c < count($class_list[$i]['p_class'][$k]['k_class']); $c++) {
               $class_list[$i]['p_class'][$k]['k_class'][$c]['c_class'] = M('class')->where('pid = "' . $class_list[$i]['p_class'][$k]['k_class'][$c]['id'] . '"')->select();
            }
         }
      }

      $this->assign('class_list', $class_list);

      $related_list = M('content')->where('related = 1')->limit(6)->select();
      $this->assign('related_list', $related_list);

      $doctor_list = M('doctor')->limit(3)->order('sort desc')->select();
      $this->assign('doctor_list', $doctor_list);

      $case_info = M('case')->order('sort desc')->find();
      $this->assign('case_info', $case_info);


      $this->display();
   }

}
