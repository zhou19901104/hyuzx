<?php
/**
 *name:文章管理模块
 *date:2013-09-12
 *
 */

namespace Admin\Controller;

class ContentController extends CommonController{


	//文章列表
    public function content_list () {
		$class_list = M('class')->where('pid = "12"')->select();
		$class_afer = M('class')->where('id <> "12" and id = "11"')->select();
		
		$id = I('get.id');
		
		if ($id == '') {
			$id = '13';
		}
		if ($id == 98) {
			$where = M('class')->where('pid = "'.$id.'"')->select();
			for ($i=0;$i<count($where);$i++) {
				$list = M('content')->where('cid = "'.$where[$i]['id'].'"')->select();
				for ($k=0;$k<count($list);$k++) {
					$content_list[] = $list[$k];
				}
			}
		} else {
			
			$where = M('class')->where('pid = "'.$id.'"')->select();
			for ($i=0;$i<count($where);$i++) {
				$list_class = M('class')->where('pid = "'.$where[$i]['id'].'"')->select();
				// dump($list_class);
				if ($list_class == NULL) {
					$c_list = M('content')->where('cid = "'.$where[$i]['id'].'"')->select();
					for ($c=0;$c<count($c_list);$c++) {
						$content_list[] = $c_list[$c];
					}
				}
				for ($k=0;$k<count($list_class);$k++) {
					$list =M('content')->where('cid = "'.$list_class[$k]['id'].'"')->order('sort desc')->select();
					
					for ($c=0;$c<count($list);$c++) {
						$content_list[] = $list[$c];
					}
				}
			}
			
			if ($id == 11) {
				$content_list = M('content')->where('cid = "'.$id.'"')->select();
			}
			
		}
		
		for ($i=0;$i<count($list);$i++) {
			$re = M('keyword')->where('content_id = "'.$list[$i]['id'].'"')->find();
			$list[$i]['keyword'] = $re['keyword'];
		}
		
		$this->assign('class_list',$class_list);
		$this->assign('class_afer',$class_afer);
		$this->assign('content_list',$content_list);
		$this->display();
    }
	
	//添加文章
    public function content_add() {
		if ($_POST) {
			$data = $_POST;
			$data['createtime'] = time();
			$data['read_num'] = 0;

			//信息验证
			if ($data['title'] == '' || $data['description'] == '' || $data['cid'] == 0 || $data['content'] == '') {
				$this->error('文章标题，简介，栏目，内容全不能为空，请输入！');
				exit();
			} else {
				
				//判断是否有图片上传
				if ($data['img_url'] !== '') {
					$upload_info = $this->upload();
					$path = str_replace('.','',$upload_info[0]['savepath']);
					$data['img_url'] = $path.'pc_'.$upload_info[0]['savename'];
				} else {
					$data['img_url'] = '';
				}
				
				$content_check = M('content')->where('title = "'.$data['title'].'"')->find();
				if (!$content_check) {
					$content_re = M('content')->add($data);
					if ($content_re) {
						$this->success('添加成功！',U('Admin/Content/content_list'));
					} else {
						$this->error('添加失败！');
					}
				} else {
					$this->error('文章标题重复，重新输入！');
				}
			}
		} else {
			$class_list = M('class')->where('pid = 0')->order('sort desc')->select();
			
			for ($i = 0;$i<count($class_list);$i++) {
				$class_list[$i]['p_class'] = M('class')->where('pid = "'.$class_list[$i]['id'].'"')->select();
				for ($k=0;$k<count($class_list[$i]['p_class']);$k++) {
					$class_list[$i]['p_class'][$k]['k_class'] = M('class')->where('pid = "'.$class_list[$i]['p_class'][$k]['id'].'"')->select();
					for ($c=0;$c<count($class_list[$i]['p_class'][$k]['k_class']);$c++) {
						$class_list[$i]['p_class'][$k]['k_class'][$c]['c_class'] = M('class')->where('pid = "'.$class_list[$i]['p_class'][$k]['k_class'][$c]['id'].'"')->select();
					}
				}
			}
			
			
			$this->assign('class_list',$class_list);
			$this->display();
		}
    }

	//修改文章
    public function content_edit() {
		if ($_POST) {
			$data = $_POST;
			$content_re = M('content')->where('id = "'.$data['id'].'"')->find();
			
			//基本信息为空验证
			if ($data['title'] == '' || $data['description'] == '' || $data['cid'] == 0 || $data['content'] == '') {
				$this->error('文章标题，简介，栏目，内容全不能为空，请输入！');
				exit();
			}
			
			//更新关键字
			$keyword_up_re = M('keyword')->where('id = "'.$keyword_data['id'].'"')->save($keyword_data);

			//更新文章数据
			$content_data = $data;
			if (!$_POST['recommend']) {
				$content_data['recommend'] = 0;
			}
			
			if (!$_POST['hot']) {
				$content_data['hot'] = 0;
			}
			
			//判断是否有新图片上传
			if ($content_data['img_url'] !== $content_re['img_url']) {
				$upload_info = $this->upload();
				$path = str_replace('.','',$upload_info[0]['savepath']);
				$content_data['img_url'] = $path.'pc_'.$upload_info[0]['savename'];
				
				//删除之前的原图
				@unlink('.'.$content_re['img_url']);
			}
			
			//更新文章
			$content_up_re = M('content')->where('id = "'.$content_data['id'].'"')->save($content_data);
			
			//判断关键字是否修改
			if ($content_data['keyword'] !== $keyword_re['keyword'] || $content_data['target_url'] !== $keyword_re['target_url']) {
				$replace_content_re = M('content')->where("content LIKE '%".$keyword_re['according']."%'")->select();
				for ($i=0;$i<count($replace_content_re);$i++) {
					$replace_data['content'] = str_replace($keyword_re['according'],$keyword_data['according'],$replace_content_re[$i]['content']);
					$cre[] = M('content')->where('id = "'.$replace_content_re[$i]['id'].'"')->save($replace_data);
				}
			}
		
			
			if ($keyword_up_re !== NULL || $content_up_re !== NULL && count($cre) == count($replace_content_re)) {
				$this->success('更新成功！',U('Admin/Content/content_list'));
			} else {
				$this->error('更新失败！');
				exit();
			}
			
		} else {
			$id = I('get.id');
			$info = M('content')->where('id = "'.$id.'"')->find();
			$keyword_re = M('keyword')->where('content_id = "'.$id.'"')->find();
			$info['keyword'] = $keyword_re['keyword'];
			$info['target_url'] = $keyword_re['target_url'];
			$info['kid'] = $keyword_re['id'];
			$class_list = M('class')->where('pid = 0')->order('sort desc')->select();
			
			for ($i = 0;$i<count($class_list);$i++) {
				$class_list[$i]['p_class'] = M('class')->where('pid = "'.$class_list[$i]['id'].'"')->select();
				for ($k=0;$k<count($class_list[$i]['p_class']);$k++) {
					$class_list[$i]['p_class'][$k]['k_class'] = M('class')->where('pid = "'.$class_list[$i]['p_class'][$k]['id'].'"')->select();
					for ($c=0;$c<count($class_list[$i]['p_class'][$k]['k_class']);$c++) {
						$class_list[$i]['p_class'][$k]['k_class'][$c]['c_class'] = M('class')->where('pid = "'.$class_list[$i]['p_class'][$k]['k_class'][$c]['id'].'"')->select();
					}
				}
			}
			
			$keyword_list = M('keyword_re')->select();
			$this->assign('keyword_list',$keyword_list);
			$this->assign('class_list',$class_list);
			$this->assign('info',$info);
			$this->display();
		}
    }
	
	//删除文章
    public function content_del() {
		$id = I('get.id');
		$re = M('content')->where('id = "'.$id.'"')->find();
		$del_re = M('content')->where('id = "'.$id.'"')->delete();

		@unlink('.'.$re['img_url']);
		if ($del_re) {
			$this->success('删除成功！',U('Admin/Content/content_list'));
		} else {
			$this->error('删除失败！');
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
        $upload->savePath ='./Public/Uploads/'.date('Y-m-d',time()).'/';
        //设置需要生成缩略图，仅对图像文件有效
        $upload->thumb = true;
        //设置需要生成缩略图的文件前缀
        $upload->thumbPrefix = 'pc_';  //生产缩略图也可以根据需要生成1张或多张，2张：'m_,s_'
        //设置缩略图最大宽度
        $upload->thumbMaxWidth = '380';//2张的不同设置：'150,200'
        //设置缩略图最大高度
        $upload->thumbMaxHeight = '284';
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