<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 16-9-12
 * Time: 下午5:42
 */

namespace Admin\Controller;

use Think\Upload;


class NewsController extends CommonController
{
    /**
     * 新闻列表
     */
    public function news_list()
    {
        $new = D('News');
        $new_data = $new
            ->field('id,title,intro,time')
            ->select();
        $this->assign('new_data', $new_data);
        $this->display();
    }

    /**
     * 添加新闻
     */
    public function news_add()
    {
        if (IS_POST) {
            $new = D('News');
            if ($data = $new->create()) {

                if ($_FILES['img_url']['name'] != '') {
                    $config = array(
                        'width' => 300,
                        'height' => 400,
                        'path' => 'news'
                    );
                    $this->up_image($data, $config);
                }
                $data['content'] = html_entity_decode($data['content']);
                $data['time'] = time();
                if ($new->add($data)) {
                    $this->success('新闻添加成功', U('News/news_list'), 2);
                } else {
                    $this->error('新闻添加失败', U('News/news_list'), 2);
                }

            } else {
                $this->error($new->getError());
            }

        } else {
            $this->display();
        }

    }

    /**
     * 新闻删除
     */
    public function news_del()
    {
        $id = I('get.id');
        $new = D('News');
        if ($new->delete($id)) {

            //删除对应的图片
            $this->success('删除成功', U('News/news_list'), 2);
        } else {
            $this->error('删除失败', U('News/news_list'), 2);
        }

    }

    /**
     * 新闻动态修改
     */
    public function news_edit()
    {
        $new = D('News');

        if(IS_POST){

            if($data = $new->create()){

                if($_FILES['img_url']['error'] == 0){
                    $config = array(
                        'path' => 'news'
                    );
                    $this->up_image($data, $config);
                }
                $data['content'] = html_entity_decode($data['content']);
                if($new->save()){
                    $this->success('新闻修改成功', U('News/news_list'), 2);
                }else{
                    $this->error('新闻修改失败', U('News/news_list'), 2);
                }
            }else{
                $this->error($new->getError());
            }
        }else{
            $id = I('get.id');

            $info = $new
                    ->field('id,title,content,intro,bg_img_url')
                    ->find($id);
            $this->assign('info', $info);
            $this->display();
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
//        $width = isset($config['width']) ? $config['width'] : 200;
//        $height = isset($config['height']) ? $config['height'] : 200;
        $path = isset($config['path']) ? $config['path'] : 'comm';
//        $type = isset($config['type']) ? $config['type'] : 6;

        //判断上传的附件没有问题才进行处理
        if ($_FILES['img_url']['error'] === 0) {
            //如果是修改图片则删除旧图片
//            if (!empty($data['id'])) {
//                $old_data = D('Case')
//                    ->field('th_img_url,bg_img_url')
//                    ->find($data['id']);
//                //通过图片位置删除图片
//                @unlink($old_data['th_img_url']);
//                @unlink($old_data['bg_img_url']);
//            }

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
//         //给图片做缩略图
//         $img = new Image();
//         $img->open($bg_img_url); //打开原图
//         $img->thumb($width, $height, $type);
//         //输出保存缩略图
//         $th_img_url = $upload->rootPath . $info['savepath'] . 'th_' . $info['savename'];
//         $img->save($th_img_url);
//         $data['th_img_url'] = $th_img_url;
        }

    }

}