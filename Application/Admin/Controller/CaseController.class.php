<?php
/**
 *name:案例管理模块
 *date:2013-09-12
 *
 */

namespace Admin\Controller;

use Think\Upload;

class CaseController extends CommonController
{

    /**
     * 案例列表
     */
    public function case_list()
    {
        $list = D('Case')
                ->field('id,sort,jianyan,name')
                ->order('sort DESC')
                ->select();
        $this->assign('list', $list);
        $this->display();
    }

    /**
     * 添加案例
     */
    public function case_add()
    {
        $case = D('Case');
        if (IS_POST) {
//            $data = $_POST;
//            if (!$data['related']) {
//                $data['related'] = 0;
//            }
            /*            if ($data['img_url'] !== '' && $data['list_url'] !== '' && $data['min_url'] !== '') {
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
                        }*/
            $data = $case->create();
            //判断是否有图片上

            if ($_FILES['img_url']['name'] != '') {

                $config = array(
                    'colnum' => 'img_url',
                    'path' => 'case',
                );
                $this->up_image($data, $config);
            }

            if($_FILES['list_url']['name'] != ''){
                $config = array(
                    'width' => 380,
                    'height' => 260,
                    'path' => 'case',
                    'colnum' => 'list_url'
                );
                $this->up_image($data, $config);
            }
            if($_FILES['min_url']['name'] != ''){
                $config = array(
                    'width' => 60,
                    'height' => 60,
                    'path' => 'case',
                    'colnum' => 'min_url'
                );
                $this->up_image($data, $config);
            }
            //dump($data);die();
            if ($case->add($data)) {
                $this->success('添加成功!', U('Admin/Case/case_list'));
            } else {
                $this->error('添加失败!');
            }

        } else {
            $this->display();
        }
    }

    public function case_edit()
    {
        $case = D('Case');

        if (IS_POST) {

            $data = $case->create();
            $info = $case->field('id,img_url,list_url,min_url')->find($data['id']);

            if ($_FILES['img_url']['name'] != '') {
                $config = array(
                    'colnum' => 'img_url',
                    'path' => 'case',
                );
                $this->up_image($data, $config);
                @unlink($info['img_url']);
            }
            if($_FILES['list_url']['name'] != ''){
                $config = array(
                    'width' => 380,
                    'height' => 260,
                    'path' => 'case',
                    'colnum' => 'list_url'
                );
                $this->up_image($data, $config);
                @unlink($info['list_url']);
            }
            if($_FILES['min_url']['name'] != ''){
                $config = array(
                    'width' => 60,
                    'height' => 60,
                    'path' => 'case',
                    'colnum' => 'min_url'
                );
                $this->up_image($data, $config);
                @unlink($info['min_url']);
            }

            /*            $re_data = $case->where('id = "' . $data['id'] . '"')->find();
                        if (!$data['related']) {
                            $data['relate] = 0;
                        }

            /*            //判断是否有图片上传
                        if ($data['list_url'] !== $re_data['list_url']) {
                            $upload_info = $this->upload();
                            $data['list_url'] = $upload_info[0]['savename'];
                            @unlink('./Public/Uploads/case/list_' . $re_data['list_url']);
                            @unlink('./Public/Uploads/case/info_' . $re_data['list_url']);
                            @unlink('./Public/Uploads/case/min_' . $re_data['list_url']);
                        }

                        //判断是否有图片上传
                        if ($data['min_url'] !== $re_data['min_url']) {
                            $upload_info = $this->upload();
                            $data['min_url'] = $upload_info[0]['savename'];
                            @unlink('./Public/Uploads/case/list_' . $re_data['min_url']);
                            @unlink('./Public/Uploads/case/info_' . $re_data['min_url']);
                            @unlink('./Public/Uploads/case/min_' . $re_data['min_url']);
                        }

                        //判断是否有新图片上传
                        if ($data['img_url'] !== $re_data['img_url']) {
                            $upload_info = $this->upload();
                            $data['img_url'] = $upload_info[0]['savename'];
                            //删除之前的原图
                            @unlink('./Public/Uploads/case/list_' . $re_data['img_url']);
                            @unlink('./Public/Uploads/case/info_' . $re_data['img_url']);
                            @unlink('./Public/Uploads/case/min_' . $re_data['img_url']);
                        }

                        if ($data['list_url'] !== $re_data['list_url'] && $data['img_url'] !== $re_data['img_url'] && $data['min_url'] !== $re_data['min_url']) {
                            $upload_info = $this->upload();
                            $data['img_url'] = $upload_info[0]['savename'];
                            $data['list_url'] = $upload_info[1]['savename'];
                            $data['min_url'] = $upload_info[2]['savename'];
                            @unlink('./Public/Uploads/case/list_' . $re_data['list_url']);
                            @unlink('./Public/Uploads/case/info_' . $re_data['list_url']);
                            @unlink('./Public/Uploads/case/min_' . $re_data['list_url']);
                            @unlink('./Public/Uploads/case/list_' . $re_data['img_url']);
                            @unlink('./Public/Uploads/case/info_' . $re_data['img_url']);
                            @unlink('./Public/Uploads/case/min_' . $re_data['img_url']);
                            @unlink('./Public/Uploads/case/list_' . $re_data['min_url']);
                            @unlink('./Public/Uploads/case/info_' . $re_data['min_url']);
                            @unlink('./Public/Uploads/case/min_' . $re_data['min_url']);
                        }*/

            $re = $case->save($data);
            if ($re) {
                $this->success('修改成功!', U('Admin/Case/case_list'));
            } else {
                $this->error('修改失败!');
            }
        } else {
            $id = I('get.id');
            $info = $case->where(array('id' => $id))->find();
            $this->assign('info', $info);
            $this->display();
        }
    }

    /**
     * 删除案例
     */
    public function case_del()
    {
        $id = I('get.id');

        $re = D('case')->where(array('id' => $id))->delete();
        if ($re) {
            $this->success('删除成功!', U('Admin/Case/case_list'));
        } else {
            $this->error('删除失败!');
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
        $upload->maxSize = -1;
        //设置文件保存规则唯一
        $upload->saveRule = 'uniqid';
        //设置上传文件的格式
        $upload->allowExts = array('jpg', 'png', 'jpeg');
        //保存路径
        $upload->savePath = './Public/Uploads/case/';
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
        if (!$upload->upload()) {
            return $upload->getErrorMsg();
        } else {
            //返回上传文件的信息
            return $upload->getUploadFileInfo();
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
//        $width = isset($config['width']) ? $config['width'] : 200;
//        $height = isset($config['height']) ? $config['height'] : 200;
        $path = isset($config['path']) ? $config['path'] : 'comm';
//        $type = isset($config['type']) ? $config['type'] : 6;
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
        }

    }

    /**
     *实现案例相册图片的批量上传处理
     * @param [int] $goods_id 给该$goods_id的商品进行相册上传和缩略图制作处理
     */
    private function deal_pics(&$data, $config)
    {
        $path = isset($config['path']) ? $config['path'] : 'comm';
        $type = isset($config['type']) ? $config['type'] : 6;

            //实现批量相册上传
            $cfg = array(
                'rootPath' => './Public/Uploads/' . $path . '/', //保存根路径
            );
            $up = new Upload($cfg);
            $result = $up->upload($_FILES);
            //遍历$z,对各个上传好的"相册"进行对应的处理
            dump($result);

            foreach ($result as $k => $v) {
                //原图路径名
                $img_url = $up->rootPath . $v['savepath'] . $v['savename'];

                $list_url = $up->rootPath . $v['savepath'] . $v['savename'];

                $min_url = $up->rootPath . $v['savepath'] . $v['savename'];

                $data['img_url'] = $img_url;
                $data['list_url'] = $list_url;
                $data['min_url'] = $min_url;

            }


    }


}