<?php
return array(
   //'配置项'=>'配置值'
  'MODULE_ALLOW_LIST' => array('Home', 'Admin'),

   //'TMPL_DENY_PHP'      =>true,
  'DEFAULT_MODULE'        =>  'Home',  // 默认模块
  'DEFAULT_CONTROLLER'    =>  'Index', // 默认控制器名称
  'DEFAULT_ACTION'        =>  'index', // 默认操作名称

  'DB_TYPE'   => 'mysql', // 数据库类型
  'DB_HOST'   => 'localhost', // 服务器地址
  'DB_NAME'   => 'huanyu', // 数据库名
  'DB_USER'   => 'root', // 用户名
  'DB_PWD'    => '', // 密码
  'DB_PORT'   => 3306, // 端口
  'DB_PREFIX' => 'sd_', // 数据库表前缀


  'SHOW_PAGE_TRACE'  =>  false,//开启页面跟踪信息


   //配置站点绝对路径
  'SITE_URL' => 'http://www.huanyu.com',

  //'URL_MODEL'             =>  2,       // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
  //'URL_PATHINFO_DEPR'     =>  '-',	// PATHINFO模式下，各参数之间的分割符号
  'UPLOAD_MAX_FILESIZE'=>'2M',//设置允许上传单个文件的大小
  'UPLOAD_ALLOW_EXT'=>array('jpg','jpeg','bmp','gif','png'),//设置允许上传文件的类型

   'SHANG_WU' => 'http://pkt.zoosnet.net/LR/Chatpre.aspx?id=PKT67204838&cid=1469000068684805339274&lng=cn&sid=1469000068684805339274&p=http%3A//hyuzx.com/&rf1=&rf2=&e=%25u6765%25u81EA%25u9996%25u9875%25u7684%25u5BF9%25u8BDD&bid=&d=1469000257113',



);