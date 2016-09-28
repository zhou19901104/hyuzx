<?php

namespace Admin\Controller;

use Think\Controller;
//use Org\Util\Rbac;

class CommonController extends Controller
{

   /* public function _initialize(){

       parent::_initialize();
       /*      * 载入各种扩展
       */
        //import("ORG.Util.Image"); //图像操作类库
        //Load('extend');     //Think扩展函数库

        // 后台用户权限检查
/*        if (C('USER_AUTH_ON') && !in_array(MODULE_NAME, explode(',', C('NOT_AUTH_MODULE')))) {

            //import('ORG.Util.RBAC');
           // echo '你好';die();

            if (!RBAC::AccessDecision(GROUP_NAME)) {
                //检查认证识别号GROUP_NAME
                
                if (!$_SESSION [C('USER_AUTH_KEY')]) {
                    //跳转到认证网关
                    redirect(PHP_FILE . C('USER_AUTH_GATEWAY'));
                }
              //  die();
                // 没有权限 抛出错误
                if (C('RBAC_ERROR_PAGE')) {
                    // 定义权限错误页面
                    redirect(C('RBAC_ERROR_PAGE'));
                } else {
                    if (C('GUEST_AUTH_ON')) {
                        $this->assign('jumpUrl', PHP_FILE . C('USER_AUTH_GATEWAY'));
                    }
                    // 提示错误信息
                    $this->error(L('_VALID_ACCESS_'));
                }
            } else {
                if (!$_SESSION [C('USER_AUTH_KEY')]) {
                    //跳转到认证网关
                    redirect(PHP_FILE . C('USER_AUTH_GATEWAY'));
                }
            }
        }

    }*/

   public function __construct()
   {
      parent::__construct();

      if(CONTROLLER_NAME != 'Login'){
         if(session('role_id') != 1 || session('userid') != 1){
            $this->redirect('Home/Index/index');
         }
      }

   }

}