<?php
/**
 *name:医生管理模块
 *date:2013-09-12
 *
 */


namespace Admin\Controller;

use Think\Upload;

class DoctorController extends CommonController
{

    /**
     * 医生列表
     */
    public function doctor_list()
    {
        $list = D('doctor')
                    ->alias('d')
                    ->field('d.id as did,d.name,d.type,d.zhicheng,c.id,c.class_name')
                    ->join('__DOCTOR_CLASS__ as  c on d.type=c.id')
                    ->select();
        $this->assign('list', $list);
        $this->display();
    }

    /**
     * 添加医生信息
     */
    public function doctor_add()
    {
        $doctor = D('Doctor');

        if (IS_POST) {
            $data = $doctor->create();

            if($_FILES['img_url']['name'] != ''){
                $config = array(
                    'colnum' => 'img_url',
                    'path' => 'doctor',
                );
                $this->up_image($data, $config);
            }
            if($_FILES['index_url']['name'] != ''){
                $config = array(
                    'colnum' => 'index_url',
                    'path' => 'doctor',
                );
                $this->up_image($data, $config);
            }
            $re = $doctor->add($data);
            if ($re) {
                $this->success('添加成功!', U('Admin/Doctor/doctor_list'));
            } else {
                $this->error('添加失败!');
            }

        } else {
            $class_list = M('doctor_class')->select();
            $this->assign('class_list', $class_list);
            $this->display();
        }
    }

    /**
     * 修改医生信息
     */
    public function doctor_edit()
    {
        $doctor = D('Doctor');

        if (IS_POST) {
            $data = $doctor->create();

            $info = $doctor->field('index_url,img_url,id')->find($data['id']);

            if ($_FILES['img_url']['name'] != '') {
                $config = array(
                    'colnum' => 'img_url',
                    'path' => 'doctor'
                );
                $this->up_image($data, $config);
                @unlink($info['img_url']);
            }
            if($_FILES['index_url']['name'] != ''){
                $config = array(
                    'path' => 'doctor',
                    'colnum' => 'index_url'
                );
                $this->up_image($data, $config);
                @unlink($info['index_url']);
            }

            $re = $doctor->where('id = "' . $data['id'] . '"')->save($data);
            if ($re) {
                $this->success('修改成功!', U('Admin/Doctor/doctor_list'));
            } else {
                $this->error('修改失败!');
            }

        } else {
            $id = I('get.id');
            $info = $doctor->where('id = "' . $id . '"')->find();
            $class_list = M('doctor_class')->select();
            $this->assign('class_list', $class_list);
            $this->assign('info', $info);
            $this->display();
        }
    }

    /**
     * 删除医生信息
     */
    public function doctor_del()
    {
        $doctor = D('Doctor');
        $id = I('get.id');

        $re = $doctor->where(array('id' => $id))->delete();
        if ($re) {
            $this->success('删除成功!', U('Admin/Doctor/doctor_list'));
        } else {
            $this->error('删除失败!');
        }
    }

    /**
     * 医生类别列表
     */
    public function doctor_class_list()
    {
        $list = M('doctor_class')->select();
        $this->assign('list', $list);
        $this->display();
    }

    /**
     * 添加医生类别
     */
    public function doctor_class_add()
    {
        if ($_POST) {
            $data = $_POST;
            $check = M('doctor_class')->where('class_name = "' . $data['class_name'] . '"')->find();
            if (!$check) {
                $re = M('doctor_class')->add($data);
                if ($re) {
                    $this->success('添加成功!', U('Admin/Doctor/doctor_class_list'));
                } else {
                    $this->error('添加失败!');
                }
            } else {
                $this->error('类别名称重复!');
            }
        } else {
            $this->display();
        }
    }

    /**
     * 修改医生类别
     */
    public function doctor_class_edit()
    {
        if (IS_POST) {
            $data = $_POST;
            $check = M('doctor_class')->where('class_name = "' . $data['class_name'] . '"')->find();
            if (!$check) {
                $re = M('doctor_class')->where('id = "' . $data['id'] . '"')->save($data);
                if ($re) {
                    $this->success('修改成功!', U('Admin/Doctor/doctor_class_list'));
                } else {
                    $this->error('修改失败!');
                }
            } else {
                $this->error('类别名称重复!');
            }
        } else {
            $id = I('get.id');
            $info = M('doctor_class')->where('id = "' . $id . '"')->find();
            $this->assign('info', $info);
            $this->display();
        }
    }


    /**
     * 删除医生类别
     */
    public function doctor_class_del()
    {
        $id = I('get.id');
        $re = M('doctor_class')->where('id = "' . $id . '"')->delete();
        if ($re) {
            $this->success('删除成功!', U('Admin/Doctor/doctor_class_list'));
        } else {
            $this->error('删除失败!');
        }
    }

    /**
     * @param $data   接收的数据;
     * @param $width  缩略图的宽度;
     * @param $height 缩略图的高度;
     * @param $path  图片上传的子路径;
     */
    private function up_image(&$data, $config)
    {

        $path = isset($config['path']) ? $config['path'] : 'comm';
        $colnum = isset($config['colnum']) ? $config['colnum'] : 'img_url';

        //判断上传的附件没有问题才进行处理
        if ($_FILES[$colnum]['error'] === 0) {
            $cfg = array(
                'rootPath' => './Public/Uploads/' . $path . '/'  //保存根路径
            );
            $upload = new Upload($cfg);
            echo $upload->getError();

            $info = $upload->uploadOne($_FILES[$colnum]);
            //附件上传后的信息保存在数据库中
            if ($info) {
                $img_url = $upload->rootPath . $info['savepath'] . $info['savename'];
                $data[$colnum] = $img_url;
            }
        }

    }

}
