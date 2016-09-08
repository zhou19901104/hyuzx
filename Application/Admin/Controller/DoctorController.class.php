<?php
/**
 *name:文章管理模块
 *date:2013-09-12
 *
 */


namespace Admin\Controller;

class DoctorController extends CommonController{


	//医生列表
	public function doctor_list () {
		$list = M('doctor')->select();
		for ($i=0;$i<count($list);$i++) {
			$class = M('doctor_class')->where('id = "'.$list[$i]['type'].'"')->find();
			$list[$i]['type_name'] = $class['class_name'];
		}
		$this->assign('list',$list);
		$this->display();
	}
	
	//添加医生信息
	public function doctor_add () {
		if ($_POST) {
			$data = $_POST;
			if (!$data['related']) {
				$data['related'] = 0;
			}
			if ($data['type'] == 0) {
				$this->error('请选择医生类别');
				exit();
			}
			
			//判断是否有图片上传
			if ($data['img_url'] !== '' || $data['index_url'] !== '') {
				$upload_info = $this->upload();
				$data['img_url'] = $upload_info[0]['savename'];
				$data['index_url'] = $upload_info[1]['savename'];
			} else {
				$data['img_url'] = '';
				$data['index_url'] = '';
			}
			
			$re = M('doctor')->add($data);
			if ($re) {
				$this->success('添加成功!',U('Admin/Doctor/doctor_list'));
			} else {
				$this->error('添加失败!');
			}
			
		} else {
			$class_list = M('doctor_class')->select();
			$this->assign('class_list',$class_list);
			$this->display();
		}
	}
	
	//修改医生信息
	public function doctor_edit () {
		if ($_POST) {
			$data = $_POST;
			if (!$data['related']) {
				$data['related'] = 0;
			}
			$doctor_re = M('doctor')->where('id = "'.$data['id'].'"')->find();
			
			if ($data['index_url'] !== $doctor_re['index_url']) {
				$upload_info = $this->upload();
				$data['index_url'] = $upload_info[0]['savename'];
				@unlink('./Public/Uploads/doctor/index_'.$doctor_re['index_url']);
				@unlink('./Public/Uploads/doctor/list_'.$doctor_re['index_url']);
				@unlink('./Public/Uploads/doctor/info_'.$doctor_re['index_url']);
			}
			
			//判断是否有新图片上传
			if ($data['img_url'] !== $doctor_re['img_url']) {
				$upload_info = $this->upload();
				$data['img_url'] = $upload_info[0]['savename'];
				//删除之前的原图
				@unlink('./Public/Uploads/doctor/list_'.$doctor_re['img_url']);
				@unlink('./Public/Uploads/doctor/info_'.$doctor_re['img_url']);
				@unlink('./Public/Uploads/doctor/index_'.$doctor_re['img_url']);
			}
			
			if ($data['index_url'] !== $doctor_re['index_url'] && $data['img_url'] !== $doctor_re['img_url']) {
				$upload_info = $this->upload();
				$data['img_url'] = $upload_info[0]['savename'];
				$data['index_url'] = $upload_info[1]['savename'];
				@unlink('./Public/Uploads/doctor/index_'.$doctor_re['index_url']);
				@unlink('./Public/Uploads/doctor/list_'.$doctor_re['index_url']);
				@unlink('./Public/Uploads/doctor/info_'.$doctor_re['index_url']);
				@unlink('./Public/Uploads/doctor/list_'.$doctor_re['img_url']);
				@unlink('./Public/Uploads/doctor/info_'.$doctor_re['img_url']);
				@unlink('./Public/Uploads/doctor/index_'.$doctor_re['img_url']);
			}
			
			$re = M('doctor')->where('id = "'.$data['id'].'"')->save($data);
			if ($re) {
				$this->success('修改成功!',U('Admin/Doctor/doctor_list'));
			} else {
				$this->error('修改失败!');
			}
			
		} else {
			$id = I('get.id');
			$info = M('doctor')->where('id = "'.$id.'"')->find();
			$class_list = M('doctor_class')->select();
			$this->assign('class_list',$class_list);
			$this->assign('info',$info);
			$this->display();
		}
	}
	
	//删除医生信息
	public function doctor_del () {
		$id = I('get.id');
		$re = M('doctor')->where('id = "'.$id.'"')->find();
		@unlink('./Public/Uploads/doctor/list_'.$re['img_url']);
		@unlink('./Public/Uploads/doctor/info_'.$re['img_url']);
		@unlink('./Public/Uploads/doctor/index_'.$re['img_url']);
		@unlink('./Public/Uploads/doctor/list_'.$re['index_url']);
		@unlink('./Public/Uploads/doctor/info_'.$re['index_url']);
		@unlink('./Public/Uploads/doctor/index_'.$re['index_url']);
		$re = M('doctor')->where('id = "'.$id.'"')->delete();
		if ($re) {
			$this->success('删除成功!',U('Admin/Doctor/doctor_list'));
		} else {
			$this->error('删除失败!');
		}
	}
	
	//医生类别列表
	public function doctor_class_list () {
		$list = M('doctor_class')->select();
		$this->assign('list',$list);
		$this->display();
	}
	
	//添加医生类别
	public function doctor_class_add () {
		if ($_POST) {
			$data = $_POST;
			$check = M('doctor_class')->where('class_name = "'.$data['class_name'].'"')->find();
			if (!$check) {
				$re = M('doctor_class')->add($data);
				if ($re) {
					$this->success('添加成功!',U('Admin/Doctor/doctor_class_list'));
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
	
	//修改医生类别
	public function doctor_class_edit () {
		if ($_POST) {
			$data = $_POST;
			$check = M('doctor_class')->where('class_name = "'.$data['class_name'].'"')->find();
			if (!$check) {
				$re = M('doctor_class')->where('id = "'.$data['id'].'"')->save($data);
				if ($re) {
					$this->success('修改成功!',U('Admin/Doctor/doctor_class_list'));
				} else {
					$this->error('修改失败!');
				}
			} else {
				$this->error('类别名称重复!');
			}
		} else {
			$id = I('get.id');
			$info = M('doctor_class')->where('id = "'.$id.'"')->find();
			$this->assign('info',$info);
			$this->display();
		}
	}
	
	
	//删除医生类别
	public function doctor_class_del () {
		$id = I('get.id');
		$re = M('doctor_class')->where('id = "'.$id.'"')->delete();
		if ($re) {
			$this->success('删除成功!',U('Admin/Doctor/doctor_class_list'));
		} else {
			$this->error('删除失败!');
		}
	}
	
	
	//上传图片方法
	function upload() {
		 //引入UploadFile类
        import('ORG.Net.UploadFile');
        //实例化UploadFile类
        $upload  = new UploadFile();
        //设置文件大小
        $upload -> maxSize = -1;
        //设置文件保存规则唯一
        $upload->saveRule = 'uniqid';
        //设置上传文件的格式
        $upload -> allowExts = array('jpg','png','jpeg');
        //保存路径
        $upload->savePath ='./Public/Uploads/doctor/';
        //设置需要生成缩略图，仅对图像文件有效
        $upload->thumb = true;
        //设置需要生成缩略图的文件前缀
        $upload->thumbPrefix = 'list_,info_,index_';  //生产缩略图也可以根据需要生成1张或多张，2张：'m_,s_'
        //设置缩略图最大宽度
        $upload->thumbMaxWidth = '372,600,422';//2张的不同设置：'150,200'
        //设置缩略图最大高度
        $upload->thumbMaxHeight = '372,600,612';
        //删除原图
        $upload->thumbRemoveOrigin = true;
        //上传失败返回错误信息
        if(!$upload->upload()){
           return $upload->getErrorMsg();
        }else{
           //返回上传文件的信息
           return $upload->getUploadFileInfo();
        }
	}	
}