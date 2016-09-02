<?php
/**
 *name:员工管理模块
 *date:2013-09-12
 *
 */

namespace Admin\Controller;

use Think\Model;
use Think\Page;

class UserController extends CommonController
{

   /**
    *
    */
   public function index()
   {
      if ($_POST['ssubmit']) {
         $wher['wher'] = '%' . $_POST['ming'] . '%';
      } else {
         $wher = '';
      }

      //$city = M('City')->where()->select();

      $roles = M('role')->where('id in(1,6,9,2)')->select();

      //echo 'nia';die();
      $fi = array(
        'cityid' => intval(I('get.cityid')),
        'roleid' => intval(I('get.roleid')),
      );

      $fi_tmp = $fi;
      //城市
/*      foreach ($city as $k => $v) {
         if ($fi['cityid'] == $v['cid']) {
            $fi_tmp['cityid'] = '';
            $u['cityid'][$v['cid']] = $this->furl($fi_tmp);
         } else {
            $fi_tmp['cityid'] = $v['cid'];
            $u['cityid'][$v['cid']] = $this->furl($fi_tmp);
         }
      }*/

      $fi_tmp = $fi;

      foreach ($roles as $k => $v) {
         if ($fi['roleid'] == $v['id']) {
            $fi_tmp['roleid'] = '';
            $u['roleid'][$v['id']] = $this->furl($fi_tmp);
         } else {
            $fi_tmp['roleid'] = $v['id'];
            $u['roleid'][$v['id']] = $this->furl($fi_tmp);
         }
      }

      $city_id =I('get.cityid');
      $role_id = I('get.roleid');

      $Model = new Model();
/*
      $sql = "select *," . C('DB_PREFIX') . "users.status as ustatus ," . C('DB_PREFIX') . "users.uid as uuid
               FROM " . C('DB_PREFIX') . "users
               LEFT JOIN " . C('DB_PREFIX') . "userinfo ON " . C('DB_PREFIX') . "userinfo.uid = " . C('DB_PREFIX') . "users.uid
               LEFT JOIN " . C('DB_PREFIX') . "city ON " . C('DB_PREFIX') . "city.cid = " . C('DB_PREFIX') . "userinfo.city
               LEFT JOIN " . C('DB_PREFIX') . "role ON " . C('DB_PREFIX') . "users.role_id = " . C('DB_PREFIX') . "role.id";*/

      $sql = "select *," . C('DB_PREFIX') . "users.status as ustatus ," . C('DB_PREFIX') . "users.uid as uuid
               FROM " . C('DB_PREFIX') . "users
               LEFT JOIN " . C('DB_PREFIX') . "role ON " . C('DB_PREFIX') . "users.role_id = " . C('DB_PREFIX') . "role.id";

      $where = " WHERE " . C('DB_PREFIX') . "users.uid !=''";

      if ($wher) {
         $where .= " AND " . C('DB_PREFIX') . "users.username like '" . $wher['wher'] . "'";
      }

      if ($city_id) {
         $where .= " AND " . C('DB_PREFIX') . "userinfo.city = " . $city_id . "";
         $map['cityid'] = $city_id;
      }
      if ($role_id) {
         $where .= " AND " . C('DB_PREFIX') . "users.role_id = " . $role_id . "";
         $map['roleid'] = $city_id;
      }


      $sql = $sql . $where . $order_by;

      $count = count($Model->query($sql));


      //import('ORG.Util.Page');// 导入分页类

      $count = count($Model->query($sql)) - 1;// 查询满足要求的总记录数
      $Page = new Page($count, 50);// 实例化分页类 传入总记录数和每页显示的记录数
      $sql = $sql . " limit " . $Page->firstRow . "," . $Page->listRows . "";
      $list = $Model->query($sql);
      foreach ($map as $key => $val) {
         $Page->parameter .= "$key=" . urlencode($val) . '&';
      }
      $show = $Page->show();// 分页显示输出
      $this->assign('city', $city);// 赋值数据集
      $this->assign('roles', $roles);// 赋值数据集
      $this->assign('list', $list);// 赋值数据集

      $this->assign('url', $u);// 赋值数据集
      $this->assign('fi', $fi);
      $this->assign('page', $show);// 赋值分页输出

      $this->display(); // 输出模板
   }

   public function add()
   {

      $um = M('users');
      $role = M('role')->select();
      $this->assign('cre', $cre);
      $this->assign('role', $role);
      if (isset($_POST['submit'])) {
         if ($_POST['username'] !== '' && $_POST['password'] !== '') {
            if ($_POST['username'] == 'admin' || $_POST['username'] == 'root' || $_POST['username'] == 'master') {
               $this->error('不能用admin,root,master做为账号!');
               exit();
            }
            $cre = $um->where('username = "' . $_POST['username'] . '"')->find();

            if ($cre > 1) {
               $this->error('账号重复，请重新输入');
            }

            $udata = $this->_post();
            $udata['password'] = md5($udata['password']);
            $udata['reg_time'] = time();
            $ure = $um->add($udata);
            if ($ure) {
               $mm = M('role_user');
               $data['uid'] = $ure;
               $data['role_id'] = $udata['role_id'];
               $data['user_id'] = $ure;
               $mre = $mm->add($data);
               if ($mre) {
                  $this->success('添加成功！', U('User/index'));
               } else {
                  $this->error('添加失败');
               }
            } else {
               $this->error('添加失败');
            }
         } else {
            $this->error('必须输入用户名或者密码！');
         }
      } else {
         $this->display();
      }
   }

   public function edit()
   {
      $id = intval($_GET['id']);
      $um = M('users');
      if ($_POST['submit']) {
         $data = I('post.');
         if ($_POST['password'] == '') {
            unset($data['password']);
         } else {
            $data['password'] = md5($data['password']);
         }
         $ure = $um->where('uid = "' . $_POST['uid'] . '"')->save($data);
         $ro = M('role_user');
         $ro->where('user_id = "' . $_POST['uid'] . '"')->save($data);
         //$cre = M('userinfo');
         //$chre = $cre->where('uid = "' . $_POST['uid'] . '"')->save($data);
         if ($ure) {
            $this->success('修改成功', U('User/index'));
         } else {
            $this->error('修改失败');
         }

      } else {
         //$cit = M('city');
         $role = M('role');
         $role_info = $role->select();
         //$cre = $cit->select();
         //$this->assign('cre', $cre);
         $ure = $um->where('uid = "' . $id . '"')->find();
         //$im = M('userinfo');
         //$ire = $im->where('uid = "' . $id . '"')->find();
         $valu = $ure;
        // $valu += $ire;

         $this->assign('valu', $valu);
         $this->assign('role', $role_info);

         $this->display();
      }
   }

   public function del()
   {
      $in = intval($_GET['id']);
      $um = M('users');
      //$im = M('userinfo');
      //$ire = $im->where('uid = "' . $in . '"')->delete();
      $re = $um->where('uid = "' . $in . '"')->delete();

      if ($re > 0) {
         $this->success('删除成功', U('User/index'));
      } else {
         $this->error('删除失败！');
      }
   }

   function furl($fi)
   {
      $url = '?s=/User/index/';
      if (count($fi) > 0) {
         foreach ($fi as $k => $v) {
            if ($k && $v) {

               $url = $url . $k . '/' . urlencode($v) . '/';
            }
         }
      }
      return $url;
   }

}