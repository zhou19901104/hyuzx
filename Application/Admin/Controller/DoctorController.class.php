<?php
/**
 *name:医生管理模块
 *date:2013-09-12
 *
 */


namespace Admin\Controller;

use Think\Upload;
use Think\Image;

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

            if(!$data = $doctor->create()){
                $this->error($doctor->getError());
            }else{

                if($data['class_list'] == '0'){
                    $this->error('请选择医生类别');
                }

                if($_FILES['img_url']['name'] != ''){
                    $config = array(
                        'width' => 372,
                        'height' => 372,
                        'colnum' => 'img_url',
                        'path' => 'doctor',
                    );
                    $this->th_image($data, $config);
                }

                if($_FILES['th_img_url']['name'] != ''){
                    $config = array(
                        'width' => 100,
                        'height' => 124,
                        'colnum' => 'th_img_url',
                        'path' => 'doctor',
                    );
                    $this->up_image($data, $config);
                }

                if($_FILES['bg_img_url']['name'] != ''){
                    $config = array(
                        'width' => 422,
                        'height' => 612,
                        'colnum' => 'bg_img_url',
                        'path' => 'doctor',
                    );
                    $this->up_image($data, $config);
                }
                               // dump($data);die();

                if ($doctor->add($data)) {
                    $this->success('添加成功!');
                } else {
                    $this->error('添加失败!');
                }
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
            if(!$data = $doctor->create()){
                $this->error($doctor->getError());
            }else{
                if($data['class_list'] == '0'){
                    $this->error('请选择医生类别');
                }
                $info = $doctor->field('index_url,img_url,th_img_url,bg_img_url,id')->find($data['id']);

                    if($_FILES['img_url']['name'] != ''){
                        $config = array(
                            'width' => 372,
                            'height' => 372,
                            'colnum' => 'img_url',
                            'path' => 'doctor',
                        );
                        $this->th_image($data, $config);
                        @unlink($info['img_url']);
                        @unlink($info['index_url']);
                    }

                    if($_FILES['th_img_url']['name'] != ''){
                        $config = array(
                            'width' => 100,
                            'height' => 124,
                            'colnum' => 'th_img_url',
                            'path' => 'doctor',
                        );
                        $this->up_image($data, $config);
                        @unlink($info['th_img_url']);
                    }

                    if($_FILES['bg_img_url']['name'] != ''){
                        $config = array(
                            'width' => 422,
                            'height' => 612,
                            'colnum' => 'bg_img_url',
                            'path' => 'doctor',
                        );
                        $this->up_image($data, $config);
                        @unlink($info['bg_img_url']);
                    }
                    //dump($data);die();

                if ($doctor->save($data)) {
                    $this->success('修改成功!', U('Admin/Doctor/doctor_list'));
                } else {
                    //echo $doctor->_sql();die();
                    $this->error('修改失败');
                }
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
        $width = isset($config['width']) ? $config['width'] : 200;
        $height = isset($config['height']) ? $config['height'] : 200;
        $type = isset($config['type']) ? $config['type'] : 6;
        $path = isset($config['path']) ? $config['path'] : 'comm';
        $colnum = isset($config['colnum']) ? $config['colnum'] : 'img_url';

        //判断上传的附件没有问题才进行处理
        if ($_FILES[$colnum]['error'] === 0) {
            $cfg = array(
                'rootPath' => './Public/Uploads/' . $path . '/'  //保存根路径
            );
            $upload = new Upload($cfg);

            $info = $upload->uploadOne($_FILES[$colnum]);
            //附件上传后的信息保存在数据库中
            if ($info) {
                $img_url = $upload->rootPath . $info['savepath'] . $info['savename'];
                $data[$colnum] = $img_url;
            }
            //给图片做缩略图
            // $img = new Image();
            // $img->open($img_url); //打开原图
            // $img->thumb($width, $height, $type);
            // //输出保存缩略图
            // $th_img_url = $upload->rootPath . $info['savepath'] . 'th_' . $info['savename'];
            // $img->save($th_img_url);
            // $data[$colnum] = $th_img_url;

        }

    }

    private function th_image(&$data, $config)
    {
        $width = isset($config['width']) ? $config['width'] : 200;
        $height = isset($config['height']) ? $config['height'] : 200;
        $type = isset($config['type']) ? $config['type'] : 6;
        $path = isset($config['path']) ? $config['path'] : 'comm';
        $colnum = isset($config['colnum']) ? $config['colnum'] : 'img_url';

        //判断上传的附件没有问题才进行处理
        if ($_FILES[$colnum]['error'] === 0) {
            $cfg = array(
                'rootPath' => './Public/Uploads/' . $path . '/'  //保存根路径
            );
            $upload = new Upload($cfg);

            $info = $upload->uploadOne($_FILES[$colnum]);
            //附件上传后的信息保存在数据库中
            if ($info) {
                $img_url = $upload->rootPath . $info['savepath'] . $info['savename'];
                $data['index_url'] =  $img_url;
            }
            //给图片做缩略图
            $img = new Image();
            $img->open($img_url); //打开原图
            $img->thumb($width, $height, $type);
            //输出保存缩略图
            $th_img_url = $upload->rootPath . $info['savepath'] . 'th_' . $info['savename'];
            $img->save($th_img_url);
            $data['img_url'] = $th_img_url;

        }

    }

}
