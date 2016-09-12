<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 16-9-12
 * Time: 下午1:28
 */

namespace Home\Controller;


class EmptyController extends CommonController
{
    /**
     * 空操作方法
     */
    public function _empty()
    {
        $this->display('Empty/_empty');
    }
}