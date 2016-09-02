<?php

namespace Admin\Controller;

use Think\Model;

class IndexController extends CommonController{
    

    public function index()
    {
		
        $username = session('username');    // 用户名
        $roleid   = session('role_id');      // 角色ID
        if($username == C('SPECIAL_USER')){     //如果是无视权限限制的用户，则获取所有主菜单
            $sql = 'SELECT `id`,`title`,name
                    FROM `'.C('DB_PREFIX').'node`
                    WHERE ( `status` =1 AND `display`=1 AND `level`<>1 AND id not in(103,107,100,97,110))
                    ORDER BY sort DESC';
        }else{  //更具角色权限设置，获取可显示的主菜单
          $sql = "SELECT `".C('DB_PREFIX')."node`.`id` as id,`".C('DB_PREFIX')."node`.`title` as title
                 FROM `".C('DB_PREFIX')."node`,`".C('DB_PREFIX')."access`
                 WHERE `".C('DB_PREFIX')."node`.id=`".C('DB_PREFIX')."access`.node_id
                 AND `".C('DB_PREFIX')."access`.role_id=$roleid  AND  `".C('DB_PREFIX')."node`.`status` =1
                 AND `".C('DB_PREFIX')."node`.`display`=1 AND (`".C('DB_PREFIX')."node`.`level` =0 OR `".C('DB_PREFIX')."node`.`level` =2)
                 ORDER BY `".C('DB_PREFIX')."node`.sort DESC";
        }

        //$Model = new Model(); // 实例化一个model对象 没有对应任何数据表

        $main_menu = M('Node')->query($sql);

        if ($_SESSION['role_id'] == 5) {
            $m = M('seller_info');
            $re = $m->where('uid = "'.$_SESSION['userid'].'"')->find();
            $this->assign('re',$re);
        }
        $this->assign('main_menu',$main_menu);
        $this->assign('username',$username);

        $this->display();
    }
    
    public function left()
    {
        $pid = I('get.id');    //选择子菜单
        $NodeDB = D('Node');
        $datas = $this->left_child_menu($pid);
        $parent_info = $NodeDB->getNode(array('id'=>$pid),'title');
        //$sub_menu_html = '<dl>';
        $sub_menu_html = '';
        foreach($datas as $key => $_value) {
            $sub_array = $this->left_child_menu($_value['id']);
            $sub_menu_html .= "<li class=\"treemenu_on\"><a style=\"outline:none;\" hidefocus=\"true\" href=\"javascript:void(0)\" class=\"actuator\">{$_value[title]}</a><ul class=\"submenu\" style=\"display: block;\">";
            if(is_array($sub_array)){
                $i=0;
                foreach ($sub_array as $value) {
                    $i++;
                    if($i > 1) {
                        $class="submenuA";
                    }else{
                        $class = "submenuB";
                    }
                    $href = empty($value['data']) ? 'javascript:void(0)' : $value['data'];
                    $sub_menu_html .= "<li><a style=\"outline:none;\" hidefocus=\"true\" class=\"{$class}\" href=\"{$href}\" target=\"MainIframe\">{$value[title]}</a></li>";
                }
            }
          $sub_menu_html .=  '</ul></li>';
        }
       // $sub_menu_html .= '</dl>';

        $this->assign('sub_menu_title',$parent_info['title']);
        $this->assign('sub_menu_html',$sub_menu_html);
        $this->display();

    }

    /**
     * 按父ID查找菜单子项
     * @param integer $parentid   父菜单ID  
     * @param integer $with_self  是否包括他自己
     */
    private function left_child_menu($pid, $with_self = 0)
    {
        $pid = intval($pid);

        $username = session('username');    // 用户名
        $roleid   = session('roleid');      // 角色ID
        if($username == C('SPECIAL_USER')){     //如果是无视权限限制的用户，则获取所有主菜单
            $sql = "SELECT `id`,`data`,`title`
                    FROM `".C('DB_PREFIX')."node`
                    WHERE ( `status` =1 AND `display`=2 AND `level` <>1 AND `pid`=$pid )
                    ORDER BY sort DESC";
        }else{
            $sql = "SELECT `".C('DB_PREFIX')."node`.`id` as `id` , `".C('DB_PREFIX')."node`.`data` as `data`, `".C('DB_PREFIX')."node`.`title` as `title`
                    FROM `".C('DB_PREFIX')."node`,`".C('DB_PREFIX')."access`
                    WHERE `".C('DB_PREFIX')."node`.id = `".C('DB_PREFIX')."access`.node_id
                    AND `".C('DB_PREFIX')."access`.role_id = $roleid AND `".C('DB_PREFIX')."node`.`pid` =$pid
                    AND `".C('DB_PREFIX')."node`.`status` =1 AND `".C('DB_PREFIX')."node`.`display` =2
                    AND `".C('DB_PREFIX')."node`.`level` <>1
                    ORDER BY `".C('DB_PREFIX')."node`.sort DESC";
        }
        $Model = new Model(); // 实例化一个model对象 没有对应任何数据表
        $result = $Model->query($sql);

        if($with_self) {
            $NodeDB = D('Node');
            $result2[] = $NodeDB->getNode(array('id'=>$pid),`id`,`data`,`title`);
            $result = array_merge($result2,$result);
        }
        return $result;
    }
    
    public function top()
    {
        $this->display();
    }
    
    public function main()
    {
		
		
        //gd版本信息
        if (! function_exists ( "gd_info" )) {
            $gd = '不支持,无法处理图像';
        }
        if (function_exists ( gd_info )) {
            $gd = @gd_info ();
            $gd = $gd ["GD Version"];
            $gd ? '&nbsp; 版本：' . $gd : '';
        }
       $system = array(
            '操作系统' => PHP_OS,
            '主机名IP端口' => $_SERVER['SERVER_NAME'] . ' (' . $_SERVER['SERVER_ADDR'] . ':' . $_SERVER['SERVER_PORT'] . ')',
            '运行环境' => $_SERVER["SERVER_SOFTWARE"],
            'PHP运行方式' => php_sapi_name(),
            '程序目录' => WEB_ROOT,
            'MYSQL版本' => function_exists("mysql_close") ? mysql_get_client_info() : '不支持',
            'GD库版本' => $gd,
//            'MYSQL版本' => mysql_get_server_info(),
            '上传附件限制' => ini_get('upload_max_filesize'),
            '执行时间限制' => ini_get('max_execution_time') . "秒",
            '剩余空间' => round((@disk_free_space(".") / (1024 * 1024)), 2) . 'M',
            '服务器时间' => date("Y年n月j日 H:i:s"),
            '北京时间' => gmdate("Y年n月j日 H:i:s", time() + 8 * 3600),
            '采集函数检测' => ini_get('allow_url_fopen') ? '支持' : '不支持',
            'register_globals' => get_cfg_var("register_globals") == "1" ? "ON" : "OFF",
            'magic_quotes_gpc' => (1 === get_magic_quotes_gpc()) ? 'YES' : 'NO',
            'magic_quotes_runtime' => (1 === get_magic_quotes_runtime()) ? 'YES' : 'NO',
        );
        $this->assign('system', $system);
        $this->display();
        //var_dump(session());
    }

    public function footer()
    {
        $this->display();
    }

}