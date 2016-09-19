<?php
/**
 *name:文章管理模块
 *date:2013-09-12
 *
 */

namespace Admin\Controller;

use Think\Upload;
use Think\Page;
use Think\Image;

class ContentController extends CommonController
{

    //文章列表
    public function content_list()
    {
//        $class_list = M('class')->where('pid = "12"')->select();
//        $class_afer = M('class')->where('id <> "12" and id = "11"')->select();
//
//        $id = I('get.id');
//
//        if ($id == '') {
//            $id = '13';
//        }
//        if ($id == 98) {
//            $where = M('class')->where('pid = "' . $id . '"')->select();
//            for ($i = 0; $i < count($where); $i++) {
//                $list = M('content')->where('cid = "' . $where[$i]['id'] . '"')->select();
//                for ($k = 0; $k < count($list); $k++) {
//                    $content_list[] = $list[$k];
//                }
//            }
//        } else {
//
//            $where = M('class')->where('pid = "' . $id . '"')->select();
//            for ($i = 0; $i < count($where); $i++) {
//                $list_class = M('class')->where('pid = "' . $where[$i]['id'] . '"')->select();
//                // dump($list_class);
//                if ($list_class == NULL) {
//                    $c_list = M('content')->where('cid = "' . $where[$i]['id'] . '"')->select();
//                    for ($c = 0; $c < count($c_list); $c++) {
//                        $content_list[] = $c_list[$c];
//                    }
//                }
//                for ($k = 0; $k < count($list_class); $k++) {
//                    $list = M('content')->where('cid = "' . $list_class[$k]['id'] . '"')->order('sort desc')->select();
//
//                    for ($c = 0; $c < count($list); $c++) {
//                        $content_list[] = $list[$c];
//                    }
//                }
//            }
//
//            if ($id == 11) {
//                $content_list = M('content')->where('cid = "' . $id . '"')->select();
//            }
//
//        }
//
//        for ($i = 0; $i < count($list); $i++) {
//            $re = M('keyword')->where('content_id = "' . $list[$i]['id'] . '"')->find();
//            $list[$i]['keyword'] = $re['keyword'];
//        }
//
//        $this->assign('class_list', $class_list);
//        $this->assign('class_afer', $class_afer);

        $content = D('Content');

        $count = $content->count('id');
        $page = new Page($count, 17);
        $show = $page->show();

//        $content_list = $content
//                        ->alias('d')
//                        ->field('d.id as did,d.cid,d.title,d.description,d.createtime,c.id,c.pid,a.id,a.class_name')
//                        ->join('__CLASS__ as c on d.cid=c.id')
//                        ->join('__CLASS__ as a on a.id=c.pid')
//                        ->where('d.cid=c.id')
//                        ->limit($page->firstRow,$page->listRows)
//                        ->select();

                $content_list = $content
                        ->alias('d')
                        ->field('d.id,d.cid,d.title,d.description,d.createtime')
                        ->limit($page->firstRow,$page->listRows)
                        ->order('d.id ASC')
                        ->select();

        $this->assign('content_list', $content_list);
        $this->assign('show', $show);
        $this->display('content_list1');

    }

    /**
     * 添加文章
     */
    public function content_add()
    {
        $content = D('Content');

        if (IS_POST) {

            if($data = $content->create()){
                if($data['cid'] == 0){
                    $this->error('请选择文章类别', U('Content/content_list'), 2);
                    exit();
                }
                if($_FILES['img_url']['name'] != ''){
                    $config = array(
                        'width' => 380,
                        'height' => 284,
                        'colnum' => 'img_url',
                        'path' => 'content'
                    );
                    $this->up_image($data, $config);
                }

                $data['createtime'] = time();
                $data['read_num'] = 0;
                $data['content'] = html_entity_decode($data['content']);

                if($content->add($data)){
                    $this->success('添加成功！', U('Admin/Content/content_add'));
                }else{
                    $this->error('添加失败！');
                }
            }else{
                $this->error($content->getError());
            }

        } else {

            $class_list = getTree(M('Class')->field('id,pid,class_name')->select());

            $this->assign('class_list', $class_list);
            $this->display();
        }
    }

    /**
     * 修改文章
     */
    public function content_edit()
    {
        $content = D('Content');
        if (IS_POST) {

            if(!$data = $content->create()){
                exit($content->getError());

            }else{

                $info = D('Content')->field('img_url,id')->find($data['id']);

                if($_FILES['img_url']['name'] != ''){
                    $config = array(
                        'width' => 380,
                        'height' => 284,
                        'colnum' => 'img_url',
                        'path' => 'content'
                    );
                    $this->up_image($data, $config);
                    @unlink($info['img_url']);
                }
                $data['content'] = html_entity_decode($data['content']);
                if($content->save($data)){
                    $this->success('修改成功！', U('Admin/Content/content_list'));
                }else{
                    $this->error('修改失败！');
                }

            }

        } else {

            $id = I('get.id');

            $info = $content
                    ->field('id,cid,title,description,content,img_url,sort,hot')
                    ->where(array('id' => $id))
                    ->find();

            $class_list = getTree(D('Class')->field('id,pid,class_name')->select());

            $this->assign('class_list', $class_list);
            $this->assign('info', $info);
            $this->display();
        }
    }

    /**
     * 删除文章
     */
    public function content_del()
    {
        $content = D('Content');
        $id = I('get.id');

        if ($content->where(array('id' => $id))->delete()) {

            $this->success('删除成功！', U('Admin/Content/content_list'));
        } else {
            $this->error('删除失败！');
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
        $width = isset($config['width']) ? $config['width'] : 200;
        $height = isset($config['height']) ? $config['height'] : 200;
        $colnum = isset($config['colnum']) ? $config['colnum'] : 'img_url';
        $type = isset($config['type']) ? $config['type'] : 6;

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