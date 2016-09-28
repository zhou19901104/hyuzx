<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2016/9/1
 * Time: 8:56
 */

namespace Home\Controller;

use Think\Controller;

class CommonController extends Controller
{

   public function __construct()
   {
      parent::__construct();

      if (ismobile()) {
         //设置默认默认主题为  跳转到手机端
         header("location: http://m.hyuzx.com/");
      }

      $class = M('Class');
//     F('foot_list',null);
//     F('class_list',null);
      if(F('foot_list') == ''){
         //footer页面底部
         $foot_list = $class
             ->field('id,pid,class_name,sort')
             ->where(array('pid' => 12, 'id' => array('neq',98)))
             ->select();

         foreach($foot_list as $key => $val){ //遍历追加到数组中
            $foot_list[$key]['zi_list'] = $class->where(array('pid' => $foot_list[$key]['id']))->select();
         }
         F('foot_list', $foot_list);
      }

      $foot_list = F('foot_list');

      $this->assign('foot_list', $foot_list);

      //nav导航栏

      if(F('class_list') == ''){

         $class_list = $class->where('pid = 0')->order('sort desc')->select();

         for ($i = 0; $i < count($class_list); $i++) {
            $class_list[$i]['p_class'] = $class->where('pid = "' . $class_list[$i]['id'] . '"')->order('sort desc')->select();
            for ($k = 0; $k < count($class_list[$i]['p_class']); $k++) {
               $class_list[$i]['p_class'][$k]['k_class'] = $class->where('pid = "' . $class_list[$i]['p_class'][$k]['id'] . '"')->order('sort desc')->select();
               for ($l = 0; $l < count($class_list[$i]['p_class'][$k]['k_class']); $l++) {
                  $class_list[$i]['p_class'][$k]['k_class'][$l]['tid'] = M('content')->where('cid = "' . $class_list[$i]['p_class'][$k]['k_class'][$l]['id'] . '"')->field('id')->find();
               }
               for ($c = 0; $c < count($class_list[$i]['p_class'][$k]['k_class']); $c++) {
                  $class_list[$i]['p_class'][$k]['k_class'][$c]['c_class'] = $class->where('pid = "' . $class_list[$i]['p_class'][$k]['k_class'][$c]['id'] . '"')->select();
               }
            }
         }

         F('class_list', $class_list);
      }

      $class_list = F('class_list');

      $this->assign('class_list', $class_list);



//      foreach($class_list as $k => $val){
//
//         $class_list[$k]['p_class'] = $class->where(array('pid' => $class[$k]['id']))->select();
//
//         foreach($class_list[$k]['p_class'] as $k1 => $val1){
//
//            $class_list[$k]['p_class'][$k1]['k_class'] = $class->where(array('pid' => $class_list[$k]['p_class'][$k]['id']))->select();
//
//             foreach($class_list[$k]['p_class'][$k1]['k_class'] as $k2 => $val2){
//                $class_list[$k]['p_class'][$k1]['k_class'][$k2]['tid'] = M('content')->where(array('cid' => $class_list[$k]['p_class'][$k1]['k_class'][$k2]['id']))->field('id')->find();
//               }
//             foreach($class_list[$k]['p_class'][$k1]['k_class'] as $k3 => $val3){
//                $class_list[$k]['p_class'][$k1]['k_class'][$k3]['c_class'] = $class->where(array('pid' => $class_list[$k]['p_class'][$k1]['k_class'][$k3]['id']))->select();
//             }
//
//         }
//      }



         //footer页面底部
//         $foot_list = $class
//             ->field('id,pid,class_name,sort')
//             ->where(array('pid' => 12, 'id' => array('neq',98)))
//             ->select();
//
//         foreach($foot_list as $key => $val){ //遍历追加到数组中
//            $foot_list[$key]['zi_list'] = $class->where(array('pid' => $foot_list[$key]['id']))->select();
//         }
//
//
//      $this->assign('foot_list', $foot_list);
//
//      //nav导航栏
//
//         $class_list = $class->where('pid = 0')->order('sort desc')->select();
//
//         for ($i = 0; $i < count($class_list); $i++) {
//            $class_list[$i]['p_class'] = $class->where('pid = "' . $class_list[$i]['id'] . '"')->select();
//            for ($k = 0; $k < count($class_list[$i]['p_class']); $k++) {
//               $class_list[$i]['p_class'][$k]['k_class'] = $class->where('pid = "' . $class_list[$i]['p_class'][$k]['id'] . '"')->select();
//               for ($l = 0; $l < count($class_list[$i]['p_class'][$k]['k_class']); $l++) {
//                  $class_list[$i]['p_class'][$k]['k_class'][$l]['tid'] = M('content')->where('cid = "' . $class_list[$i]['p_class'][$k]['k_class'][$l]['id'] . '"')->field('id')->find();
//               }
//               for ($c = 0; $c < count($class_list[$i]['p_class'][$k]['k_class']); $c++) {
//                  $class_list[$i]['p_class'][$k]['k_class'][$c]['c_class'] = $class->where('pid = "' . $class_list[$i]['p_class'][$k]['k_class'][$c]['id'] . '"')->select();
//               }
//            }
//         }
//
//      $this->assign('class_list', $class_list);

   }

}
