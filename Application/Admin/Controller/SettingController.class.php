<?php
/**
 *name:网站管理模块
 *date:2013-09-12
 *
 */

namespace Admin\Controller;

use Think\Page;

class SettingController extends CommonController
{


   //栏目列表
   public function class_list()
   {

      $class_list = M('class')->where('pid = 0')->order('sort desc')->select();

      for ($i = 0; $i < count($class_list); $i++) {
         $class_list[$i]['pp_class'] = M('class')->where('pid = "' . $class_list[$i]['id'] . '"')->order('sort desc')->select();
         for ($k = 0; $k < count($class_list[$i]['pp_class']); $k++) {
            $class_list[$i]['pp_class'][$k]['kk_class'] = M('class')->where('pid = "' . $class_list[$i]['pp_class'][$k]['id'] . '"')->order('sort desc')->select();
            for ($c = 0; $c < count($class_list[$i]['pp_class'][$k]['kk_class']); $c++) {
               $class_list[$i]['pp_class'][$k]['kk_class'][$c]['cc_class'] = M('class')->where('pid = "' . $class_list[$i]['pp_class'][$k]['kk_class'][$c]['id'] . '"')->order('sort desc')->select();
            }
         }
      }


      $this->assign('class_list', $class_list);
      $this->display();
   }

   //添加栏目
   public function class_add()
   {
      if ($_POST) {
         $class_data = I('post.');
         $check = M('class')->where('class_name = "' . $class_data['class_name'] . '"')->find();
         if (!$check) {
            $re = M('class')->add($class_data);
            if ($re) {
               $this->success('添加成功', U('Admin/Setting/class_list'));
            } else {
               $this->error('添加失败！');
            }
         } else {
            $this->error('栏目名称有重复，请重新输入！');
         }
      } else {
         $class_list = M('class')->where('pid = 0')->order('sort desc')->select();

         for ($i = 0; $i < count($class_list); $i++) {
            $class_list[$i]['p_class'] = M('class')->where('pid = "' . $class_list[$i]['id'] . '"')->select();
            for ($k = 0; $k < count($class_list[$i]['p_class']); $k++) {
               $class_list[$i]['p_class'][$k]['k_class'] = M('class')->where('pid = "' . $class_list[$i]['p_class'][$k]['id'] . '"')->select();
               for ($c = 0; $c < count($class_list[$i]['p_class'][$k]['k_class']); $c++) {
                  $class_list[$i]['p_class'][$k]['k_class'][$c]['c_class'] = M('class')->where('pid = "' . $class_list[$i]['p_class'][$k]['k_class'][$c]['id'] . '"')->select();
               }
            }
         }
         $this->assign('class_list', $class_list);
         $this->display();
      }
   }

   //修改栏目
   public function class_edit()
   {
      if ($_POST) {
         $class_data = I('post.');
         $check = M('class')->where('class_name = "' . $class_data['id'] . '"')->find();
         if (!$check) {
            $re = M('class')->where('id = "' . $class_data['id'] . '"')->save($class_data);
            if ($re) {
               $this->success('修改成功！', U('Admin/Setting/class_list'));
            } else {
               $this->error('修改失败！');
            }
         } else {
            $this->error('栏目名称有重复，请重新输入！');
         }
      } else {
         $id = I('get.id');
         $class_info = M('class')->where('id = "' . $id . '"')->find();
         $class_list = M('class')->where('pid = 0')->order('sort desc')->select();

         for ($i = 0; $i < count($class_list); $i++) {
            $class_list[$i]['p_class'] = M('class')->where('pid = "' . $class_list[$i]['id'] . '"')->select();
            for ($k = 0; $k < count($class_list[$i]['p_class']); $k++) {
               $class_list[$i]['p_class'][$k]['k_class'] = M('class')->where('pid = "' . $class_list[$i]['p_class'][$k]['id'] . '"')->select();
               for ($c = 0; $c < count($class_list[$i]['p_class'][$k]['k_class']); $c++) {
                  $class_list[$i]['p_class'][$k]['k_class'][$c]['c_class'] = M('class')->where('pid = "' . $class_list[$i]['p_class'][$k]['k_class'][$c]['id'] . '"')->select();
               }
            }
         }
         $this->assign('class_info', $class_info);
         $this->assign('class_list', $class_list);
         $this->display();
      }
   }

   //删除栏目
   public function class_del()
   {
      $id = I('get.id');

      $class_re = M('class')->where('id = "' . $id . '"')->delete();
      $class_list_del = M('class')->where('pid = "' . $id . '"')->delete();

      if ($class_re || $class_list_del) {
         $this->success('删除成功！', U('Admin/Setting/class_list'));
      } else {
         $this->error('删除失败！');
      }
   }

   //友情链接列表
   public function link_list()
   {
      //import('ORG.Util.Page');
      $count = M('link')->count();
      $page = new Page($count, 20);
      $limit = $page->firstRow . ',' . $page->listRows;
      $list = M('link')->limit($limit)->order('createtime desc')->select();
      $show = $page->show();
      $this->assign('page', $show);
      $this->assign('link_list', $list);
      $this->display();
   }

   //添加友情链接
   public function link_add()
   {
      if ($_POST) {
         $data = I('post.');
         $data['time'] = time();
         if ($data['link_url'] == '' || $data['link_name'] == '') {
            $this->error('名称和URL都不能为空！');
            exit();
         }
         $check = M('link')->where('link_name = "' . $data['link_name'] . '"')->find();
         if (!$check) {
            $re = M('link')->add($data);
            if ($re) {
               $this->success('添加成功！', U('Admin/Setting/link_list'));
            } else {
               $this->error('添加失败！');
            }
         } else {
            $this->error('友情链接名称重复！');
         }
      } else {
         $this->display();
      }
   }

   //修改友情链接
   public function link_edit()
   {
      if ($_POST) {
         $data = I('post.');
         $check = M('link')->where('link_name = "' . $data['link_name'] . '"')->find();
         if (!$check) {
            $re = M('link')->where('id = "' . $data['id'] . '"')->save($data);
            if ($re) {
               $this->success('修改成功！', U('Admin/Setting/link_list'));
            } else {
               $this->error('修改失败！');
            }
         } else {
            $this->error('友情链接名称重复！');
         }
      } else {
         $id = I('get.id');
         $info = M('link')->where('id = "' . $id . '"')->find();
         $this->assign('info', $info);
         $this->display();
      }
   }

   //删除友情链接
   public function link_del()
   {
      $id = I('get.id');
      $re = M('link')->where('id = "' . $id . '"')->delete();
      if ($re) {
         $this->success('删除成功！', U('Admin/Setting/link_list'));
      } else {
         $this->error('删除失败！');
      }
   }

   //首页banner列表
   public function banner_list()
   {
      $banner_list = M('banner')->order('sort desc')->select();
      for ($i = 0; $i < count($banner_list); $i++) {
         $img_list[$i]['id'] = $banner_list[$i]['id'];
         $img_list[$i]['img_url'] = $banner_list[$i]['banner_url'] . $banner_list[$i]['banner_filename'];
      }

      $this->assign('img_list', $img_list);
      $this->display();
   }

   //首页banner添加
   public function banner_add()
   {
      if ($_POST) {
         $data = $_POST;
         if ($data['img_url'] == '') {
            $this->error('请上传图片！');
            exit();
         }

         $upload_info = $this->upload();

         $path = str_replace('.', '', $upload_info[0]['savepath']);
         /*$filename = $upload_info[0]['savename'];
         $path = $path.$filename;*/


         $save_data['banner_filename'] = $upload_info[0]['savename'];
         $save_data['banner_url'] = $path;
         $save_data['sort'] = $data['sort'];
         $save_data['url'] = $data['url'];
         $save_data['createtime'] = time();

         $check = M('banner')->select();
         if (count($check) <= 5) {
            $re = M('banner')->add($save_data);
            if ($re) {
               $this->success('添加成功！', U('Admin/Setting/banner_list'));
            } else {
               $this->error('添加失败！');
            }
         } else {
            $this->error('幻灯片最多添加5个！');
         }

      } else {
         $this->display();
      }
   }

   //首页banner修改
   public function banner_edit()
   {
      if ($_POST) {
         $data = $_POST;
         if ($data['img_url'] == '') {
            $this->error('请上传图片！');
            exit();
         }

         $check = M('banner')->where('id = "' . $data['id'] . '"')->find();
         $check_url = $check['banner_url'] . $check['banner_filename'];
         if ($check_url !== $data['img_url']) {
            $upload_info = $this->upload();
            $path = str_replace('.', '', $upload_info[0]['savepath']);
            $save_data['banner_filename'] = $upload_info[0]['savename'];
            $save_data['banner_url'] = $path;
            @unlink('.' . $check['banner_url'] . $check['banner_filename']);
            @unlink('.' . $check['banner_url'] . 'thum_' . $check['banner_filename']);
         }
         $save_data['sort'] = $data['sort'];
         $save_data['url'] = $data['url'];
         $re = M('banner')->where('id = "' . $data['id'] . '"')->save($save_data);
         if ($re) {
            $this->success('修改成功！', U('Admin/Setting/banner_list'));
         } else {
            $this->error('修改失败！');
         }

      } else {
         $id = I('get.id');
         $info = M('banner')->where('id = "' . $id . '"')->find();
         $this->assign('info', $info);
         $this->display();
      }
   }

   ///首页banner删除
   public function banner_del()
   {
      $id = I('get.id');
      $dir_re = M('banner')->where('id = "' . $id . '"')->find();
      $re = M('banner')->where('id = "' . $id . '"')->delete();
      @unlink('.' . $dir_re['banner_url'] . $dir_re['banner_filename']);
      @unlink('.' . $dir_re['banner_url'] . 'thum_' . $dir_re['banner_filename']);
      if ($re) {
         $this->success('删除成功！', U('Admin/Setting/banner_list'));
      } else {
         $this->error('删除失败！');
      }
   }

   //上传图片方法
   function upload()
   {
      //引入UploadFile类
      import('ORG.Net.UploadFile');
      //实例化UploadFile类
      $upload = new UploadFile();
      //设置文件大小
      $upload->maxSize = 52428800;
      //设置文件保存规则唯一
      $upload->saveRule = 'uniqid';
      //设置上传文件的格式
      $upload->allowExts = array('jpg', 'png', 'jpeg');
      //保存路径
      $upload->savePath = './Public/Banner/';
      //设置需要生成缩略图，仅对图像文件有效
      $upload->thumb = true;
      //设置需要生成缩略图的文件前缀
      $upload->thumbPrefix = 'thum_';  //生产缩略图也可以根据需要生成1张或多张，2张：'m_,s_'
      //设置缩略图最大宽度
      $upload->thumbMaxWidth = '145';//2张的不同设置：'150,200'
      //设置缩略图最大高度
      $upload->thumbMaxHeight = '65';
      //删除原图
      // $upload->thumbRemoveOrigin = true;
      //上传失败返回错误信息
      if (!$upload->upload()) {
         return $upload->getErrorMsg();
      } else {
         //返回上传文件的信息
         return $upload->getUploadFileInfo();
      }
   }
}