<?php
/**
 *name:文章管理模块
 *date:2013-09-12
 *
 */

namespace Admin\Controller;

use Think\Image;
use Think\Upload;

class AnliController extends CommonController
{

    public function anli_list()
    {
        $list = M('case')->select();
        $this->assign('list', $list);
        $this->display();
    }


    public function anli_add()
    {
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
                $this->success('添加成功!', U('Admin/Anli/anli_list'));
            } else {
                $this->error('添加失败!');
            }

        } else {
            $this->display();
        }
    }

    public function anli_edit()
    {
        if ($_POST) {
            $data = $_POST;
            $re_data = M('case')->where('id = "' . $data['id'] . '"')->find();
            if (!$data['related']) {
                $data['related'] = 0;
            }

            //判断是否有图片上传
            if ($data['list_url'] !== $re_data['list_url']) {
                $upload_info = $this->upload();
                $data['list_url'] = $upload_info[0]['savename'];
                @unlink('./Public/Uploads/anli/list_' . $re_data['list_url']);
                @unlink('./Public/Uploads/anli/info_' . $re_data['list_url']);
                @unlink('./Public/Uploads/anli/min_' . $re_data['list_url']);
            }

            //判断是否有图片上传
            if ($data['min_url'] !== $re_data['min_url']) {
                $upload_info = $this->upload();
                $data['min_url'] = $upload_info[0]['savename'];
                @unlink('./Public/Uploads/anli/list_' . $re_data['min_url']);
                @unlink('./Public/Uploads/anli/info_' . $re_data['min_url']);
                @unlink('./Public/Uploads/anli/min_' . $re_data['min_url']);
            }

            //判断是否有新图片上传
            if ($data['img_url'] !== $re_data['img_url']) {
                $upload_info = $this->upload();
                $data['img_url'] = $upload_info[0]['savename'];
                //删除之前的原图
                @unlink('./Public/Uploads/anli/list_' . $re_data['img_url']);
                @unlink('./Public/Uploads/anli/info_' . $re_data['img_url']);
                @unlink('./Public/Uploads/anli/min_' . $re_data['img_url']);
            }

            if ($data['list_url'] !== $re_data['list_url'] && $data['img_url'] !== $re_data['img_url'] && $data['min_url'] !== $re_data['min_url']) {
                $upload_info = $this->upload();
                $data['img_url'] = $upload_info[0]['savename'];
                $data['list_url'] = $upload_info[1]['savename'];
                $data['min_url'] = $upload_info[2]['savename'];
                @unlink('./Public/Uploads/anli/list_' . $re_data['list_url']);
                @unlink('./Public/Uploads/anli/info_' . $re_data['list_url']);
                @unlink('./Public/Uploads/anli/min_' . $re_data['list_url']);
                @unlink('./Public/Uploads/anli/list_' . $re_data['img_url']);
                @unlink('./Public/Uploads/anli/info_' . $re_data['img_url']);
                @unlink('./Public/Uploads/anli/min_' . $re_data['img_url']);
                @unlink('./Public/Uploads/anli/list_' . $re_data['min_url']);
                @unlink('./Public/Uploads/anli/info_' . $re_data['min_url']);
                @unlink('./Public/Uploads/anli/min_' . $re_data['min_url']);
            }

            $re = M('case')->where('id = "' . $data['id'] . '"')->save($data);
            if ($re) {
                $this->success('修改成功!', U('Admin/Anli/anli_list'));
            } else {
                $this->error('修改失败!');
            }
        } else {
            $id = I('get.id');
            $info = M('case')->where('id = "' . $id . '"')->find();
            $this->assign('info', $info);
            $this->display();
        }
    }

    public function anli_del()
    {
        $id = I('get.id');
        $re = M('case')->where('id = "' . $id . '"')->find();
        @unlink('./Public/Uploads/anli/list_' . $re['img_url']);
        @unlink('./Public/Uploads/anli/info_' . $re['img_url']);
        @unlink('./Public/Uploads/anli/min_' . $re['img_url']);
        @unlink('./Public/Uploads/anli/list_' . $re['list_url']);
        @unlink('./Public/Uploads/anli/info_' . $re['list_url']);
        @unlink('./Public/Uploads/anli/min_' . $re['list_url']);
        @unlink('./Public/Uploads/anli/list_' . $re['min_url']);
        @unlink('./Public/Uploads/anli/info_' . $re['min_url']);
        @unlink('./Public/Uploads/anli/min_' . $re['min_url']);
        $re = M('case')->where('id = "' . $id . '"')->delete();
        if ($re) {
            $this->success('删除成功!', U('Admin/Anli/anli_list'));
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
        $upload->savePath = './Public/Uploads/anli/';
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
     * @param $data   接收的数据
     * @param $width  缩略图的宽度
     * @param $height 缩略图的高度
     * @param $path  图片上传的子路径
     */
    private function up_image(&$data, $config)
    {
        $width = isset($config['width']) ? $config['width'] : 200;
        $height = isset($config['height']) ? $config['height'] : 200;
        $path = isset($config['path']) ? $config['path'] : 'comm';
        $type = isset($config['type']) ? $config['type'] : 6;

        //判断上传的附件没有问题才进行处理
        if ($_FILES['img_url']['error'] === 0) {
            //如果是修改图片则删除旧图片
            if (!empty($data['id'])) {
                $old_data = D('Case')
                    ->field('th_img_url,bg_img_url')
                    ->find($data['id']);
                //通过图片位置删除图片
                @unlink($old_data['th_img_url']);
                @unlink($old_data['bg_img_url']);
            }
            $cfg = array(
                'rootPath' => './Public/Uploads/' . $path . '/'  //保存根路径
            );

            $upload = new Upload($cfg);

            $info = $upload->uploadOne($_FILES['img_url']);
            //附件上传后的信息保存在数据库中
            if ($info) {
                $bg_img_url = $upload->rootPath . $info['savepath'] . $info['savename'];
                $data['bg_img_url'] = $bg_img_url;
            }
            //给图片做缩略图
            $img = new Image();
            $img->open($bg_img_url); //打开原图
            $img->thumb($width, $height, $type);
            //输出保存缩略图
            $th_img_url = $upload->rootPath . $info['savepath'] . 'th_' . $info['savename'];
            $img->save($th_img_url);
            $data['th_img_url'] = $th_img_url;
        }
    }

    /**
     *实现商品相册图片的批量上传处理
     * @param [int] $goods_id 给该$goods_id的商品进行相册上传和缩略图制作处理
     */
    private function deal_pics($goods_id)
    {
        //判断有上传相册图片
        $ishave = false;
        foreach ($_FILES['goods_pics']['error'] as $k => $v) {
            //判断至少有一个相册上传，并且该相册是ok的
            if ($v === 0) {
                $ishave = true;
            }
        }

        if ($ishave === true) {
            //有上传相册图片
            //dump($_FILES);
            //实现批量相册上传
            $cfg = array(
                'rootPath' => './Public/pics/', //保存根路径
            );
            $up = new \Think\Upload($cfg);
            //从$_FILES里边获得goods_pics的相册信息
            //upload($_FILES)
            $z = $up->upload(array($_FILES['goods_pics']));
            //dump($z);

            //遍历$z,对各个上传好的"相册"进行对应的处理
            //要制作3幅缩略图
            $im = new \Think\Image();
            foreach ($z as $k => $v) {
                //原图路径名
                $yuan_path_name = $up->rootPath . $v['savepath'] . $v['savename'];
                //给原图制作缩略图
                $im->open($yuan_path_name);
                $im->thumb(800, 800, 6);
                //保存制作好的缩略图
                $b_name = $up->rootPath . $v['savepath'] . 'b_' . $v['savename'];
                $im->save($b_name);

                $im->thumb(350, 350, 6);
                $m_name = $up->rootPath . $v['savepath'] . 'm_' . $v['savename'];
                $im->save($m_name);

                $im->thumb(50, 50, 6);
                $s_name = $up->rootPath . $v['savepath'] . 's_' . $v['savename'];
                $im->save($s_name);
                //存储3幅缩略图到数据库(sp_goods_pics)
                $arr = array(
                    'goods_id' => $goods_id,
                    'goods_pics_b' => $b_name,
                    'goods_pics_m' => $m_name,
                    'goods_pics_s' => $s_name,
                );
                D('GoodsPics')->add($arr);
            }
        }
    }


}