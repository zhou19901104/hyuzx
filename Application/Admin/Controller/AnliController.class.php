<?php
/**
 *name:文章管理模块
 *date:2013-09-12
 *
 */

namespace Admin\Controller;

class AnliController extends CommonController
{
	
	public function anli_list () {
		$list = M('case')->select();
		$this->assign('list',$list);
		$this->display();
	}
	
	public function anli_add() {
		if ($_POST) {
			$data = $_POST;
			if (!$data['related']) {
				$data['related'] = 0;
			}
			
			//判断是否有图片上传
			if ($data['img_url'] !== '' && $data['list_url'] !== '' && $data['min_url'] !== '') {
				$upload_info = $this->upload();
				$data['img_url'] = $upload_info[0]['savename'];
				$data['list_url'] = $upload_info[1]['savename'];
				$data['min_url'] = $upload_info[2]['savename'];
			} else {
				if ($data['list_url'] !== '') {
					$upload_info = $this->upload();
					$data['list_url'] = $upload_info[0]['savename'];
				} else {
					$data['list_url'] = '';
				}
				
				if ($data['img_url'] !== '') {
					$upload_info = $this->upload();
					$data['img_url'] = $upload_info[0]['savename'];
				} else {
					$data['img_url'] = '';
				}
				
				if ($data['min_url'] !== '') {
					$upload_info = $this->upload();
					$data['min_url'] = $upload_info[0]['savename'];
				} else {
					$data['min_url'] = '';
				}
			}
			
			$re = M('case')->add($data);
			if ($re) {
				$this->success('添加成功!',U('Admin/Anli/anli_list'));
			} else {
				$this->error('添加失败!');
			}
		} else {
			$this->display();
		}
	}
	
	public function anli_edit() {
		if ($_POST) {
			$data = $_POST;
			$re_data = M('case')->where('id = "'.$data['id'].'"')->find();
			if (!$data['related']) {
				$data['related'] = 0;
			}
			
			//判断是否有图片上传
			if ($data['list_url'] !== $re_data['list_url']) {
				$upload_info = $this->upload();
				$data['list_url'] = $upload_info[0]['savename'];
				@unlink('./Public/Uploads/anli/list_'.$re_data['list_url']);
				@unlink('./Public/Uploads/anli/info_'.$re_data['list_url']);
				@unlink('./Public/Uploads/anli/min_'.$re_data['list_url']);
			}
			
			//判断是否有图片上传
			if ($data['min_url'] !== $re_data['min_url']) {
				$upload_info = $this->upload();
				$data['min_url'] = $upload_info[0]['savename'];
				@unlink('./Public/Uploads/anli/list_'.$re_data['min_url']);
				@unlink('./Public/Uploads/anli/info_'.$re_data['min_url']);
				@unlink('./Public/Uploads/anli/min_'.$re_data['min_url']);
			}
			
			//判断是否有新图片上传
			if ($data['img_url'] !== $re_data['img_url']) {
				$upload_info = $this->upload();
				$data['img_url'] = $upload_info[0]['savename'];
				//删除之前的原图
				@unlink('./Public/Uploads/anli/list_'.$re_data['img_url']);
				@unlink('./Public/Uploads/anli/info_'.$re_data['img_url']);
				@unlink('./Public/Uploads/anli/min_'.$re_data['img_url']);
			}
			
			if ($data['list_url'] !== $re_data['list_url'] && $data['img_url'] !== $re_data['img_url'] && $data['min_url'] !== $re_data['min_url']) {
				$upload_info = $this->upload();
				$data['img_url'] = $upload_info[0]['savename'];
				$data['list_url'] = $upload_info[1]['savename'];
				$data['min_url'] = $upload_info[2]['savename'];
				@unlink('./Public/Uploads/anli/list_'.$re_data['list_url']);
				@unlink('./Public/Uploads/anli/info_'.$re_data['list_url']);
				@unlink('./Public/Uploads/anli/min_'.$re_data['list_url']);
				@unlink('./Public/Uploads/anli/list_'.$re_data['img_url']);
				@unlink('./Public/Uploads/anli/info_'.$re_data['img_url']);
				@unlink('./Public/Uploads/anli/min_'.$re_data['img_url']);
				@unlink('./Public/Uploads/anli/list_'.$re_data['min_url']);
				@unlink('./Public/Uploads/anli/info_'.$re_data['min_url']);
				@unlink('./Public/Uploads/anli/min_'.$re_data['min_url']);
			}
			
			$re = M('case')->where('id = "'.$data['id'].'"')->save($data);
			if ($re) {
				$this->success('修改成功!',U('Admin/Anli/anli_list'));
			} else {
				$this->error('修改失败!');
			}
		} else {
			$id = I('get.id');
			$info = M('case')->where('id = "'.$id.'"')->find();
			$this->assign('info',$info);
			$this->display();
		}
	}
	
	public function anli_del () {
		$id = I('get.id');
		$re = M('case')->where('id = "'.$id.'"')->find();
		@unlink('./Public/Uploads/anli/list_'.$re['img_url']);
		@unlink('./Public/Uploads/anli/info_'.$re['img_url']);
		@unlink('./Public/Uploads/anli/min_'.$re['img_url']);
		@unlink('./Public/Uploads/anli/list_'.$re['list_url']);
		@unlink('./Public/Uploads/anli/info_'.$re['list_url']);
		@unlink('./Public/Uploads/anli/min_'.$re['list_url']);
		@unlink('./Public/Uploads/anli/list_'.$re['min_url']);
		@unlink('./Public/Uploads/anli/info_'.$re['min_url']);
		@unlink('./Public/Uploads/anli/min_'.$re['min_url']);
		$re = M('case')->where('id = "'.$id.'"')->delete();
		if ($re) {
			$this->success('删除成功!',U('Admin/Anli/anli_list'));
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
        $upload->savePath ='./Public/Uploads/anli/';
        //设置需要生成缩略图，仅对图像文件有效
        $upload->thumb = true;
        //设置需要生成缩略图的文件前缀
        $upload->thumbPrefix = 'info_,list_,min_';  //生产缩略图也可以根据需要生成1张或多张，2张：'m_,s_'
        //设置缩略图最大宽度
        $upload->thumbMaxWidth = '1100,380,60';//2张的不同设置：'150,200'
        //设置缩略图最大高度
        $upload->thumbMaxHeight = '593,260,60';
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