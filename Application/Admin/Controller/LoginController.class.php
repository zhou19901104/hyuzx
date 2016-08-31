<?php
/*
* Home分组公共类
*/

namespace Admin\Controller;

class LoginController extends CommonController
{
    public function _initialize()
    {
		 parent::_initialize();  //RBAC 验证接口初始化
    }
    
	/*
	* 空操作
	* 前台模块操作指定错误时调用
	*/
    public function _empty()
    {
    	$this->display(C('ERROR_PAGE'));
    	exit;
    }

    //加载验证码
    public function verify ()
    {
        header("Content-type:image/png");
        import('ORG.Util.Image');
        Image::buildImageVerify();
    }

    //验证码

    //登陆验证
     public function checkLogin()
     {

        $username = $this->_post('username');
        $password =  $this->_post('password');
        $verify   = $this->_post('verify');
        //生成认证条件
        $map            =   array();
        // 支持使用绑定帐号登录
        $map['username'] = $username;
        $map['status']        = 1;
        if(session('verify') != md5($verify)) {
            $this->error('验证码错误！');
        }
        import('ORG.Util.RBAC');
        $authInfo = RBAC::authenticate($map);
        //使用用户名、密码和状态的方式进行认证
        if(false == $authInfo) {
            $this->error('帐号不存在或已禁用！');
        }else {
            if($authInfo['password'] != md5($password) ) {
                $this->error('密码错误！');
            }
            session(C('USER_AUTH_KEY'), $authInfo['uid']);
            session('userid',$authInfo['uid']);  //用户ID
            session('username',$authInfo['username']);   //用户名
            session('roleid',$authInfo['role_id']);    //角色ID
            if($authInfo['username']==C('SPECIAL_USER')) {
                session(C('ADMIN_AUTH_KEY'), true);
            }
           echo '你好';
            //保存登录信息
            $User   =   M(C('USER_AUTH_MODEL'));
            $ip     =   get_client_ip();
            $data = array();
            if($ip){    //如果获取到客户端IP，则获取其物理位置
                import('ORG.Net.IpLocation');// 导入IpLocation类
                $Ip = new IpLocation(); // 实例化类
                //$ip = '103.246.246.3';
                $location = $Ip->getlocation($ip); // 获取某个IP地址所在的位置
                $data['last_location'] = '';
                if($location['country'] && $location['country']!='CZ88.NET') $data['last_location'].=$location['country'];
                if($location['area'] && $location['area']!='CZ88.NET') $data['last_location'].=' '.$location['area'];

            }

            $data['uid'] =   $authInfo['uid'];
            $data['last_login']    =   time();
            $data['last_login_ip']  =   get_client_ip();
            $User->save($data);
          
            // 缓存访问权限
           $list =  RBAC::saveAccessList();
           
    		    // var_dump($list);
          //       die();
           echo '你好';
            redirect(U('/Admin/Index/index'));
        }
    }

    // 用户登出
    public function logout()
    {
    	if(session('?'.C('USER_AUTH_KEY'))) {
            session(C('USER_AUTH_KEY'),null);
            session();
            redirect(U('/Admin/Login/Index'));
        }
    }

}