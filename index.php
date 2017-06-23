<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------
error_reporting ( E_ERROR );
// /调试、找错时请去掉///前空格
//ini_set ( 'display_errors', true );
//error_reporting ( E_ALL );
//set_time_limit ( 0 );
$the_host = $_SERVER['HTTP_HOST'];//取得当前域名
$the_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';//判断地址后面部分
$the_url = strtolower($the_url);//将英文字母转成小写

/*if($the_url=="/index.php")//判断是不是首页

{

	$the_url="";//如果是首页,赋值为空

}*/
//mshb.szsnqg.com  //网页的域名
//mshb.wg138.cn //二维码的域名
//if($the_host !== 'xx.mqfly.net'){
    //header('HTTP/1.1 301 Moved Permanently');//发出301头部
//	header('Location:http://xx.mqfly.net/'.$the_url);//跳转到带www的网址
//}

date_default_timezone_set ( 'PRC' );
if (version_compare ( PHP_VERSION, '5.3.0', '<' )) {
    die ( 'Your PHP Version is ' . PHP_VERSION . ', But WeiPHP require PHP > 5.3.0 !' );
}

define ( 'SYSTEM_TOKEN', 'hzedu31132877' );
/**
 * 微信接入验证
 * 在入口进行验证而不是放到框架里验证，主要是解决验证URL超时的问题
 */
if (! empty ( $_GET ['echostr'] ) && ! empty ( $_GET ["signature"] ) && ! empty ( $_GET ["nonce"] )) {
    $signature = $_GET ["signature"];
    $timestamp = $_GET ["timestamp"];
    $nonce = $_GET ["nonce"];
    
    $tmpArr = array (
            SYSTEM_TOKEN,
            $timestamp,
            $nonce
    );
    sort ( $tmpArr, SORT_STRING );
    $tmpStr = sha1 ( implode ( $tmpArr ) );
    
    if ($tmpStr == $signature) {
        echo $_GET ["echostr"];
    }
    exit ();
}


/**
 * 系统调试设置
 * 项目正式部署后请设置为false
 */
define('BASE_PATH', str_replace('\\', '/', realpath(dirname(__FILE__).'/'))."/");
define ( 'CALLBACK_URL', 'http://hzzk.newltd.cn' );
define ( 'QRCODE_URL', 'http://hzzk.newltd.cn' );
define ( '__JS__', '/Public/Common/js/' );
define ( '__CSS__', '/Public/Common/css/' );
define ( 'APP_DEBUG', true );
define ( 'SHOW_ERROR', false );

define ( 'IN_WEIXIN', true );
define ( 'DEFAULT_TOKEN', '-1' );
/**
 * 官方远程同步服务器地址
 * ..
 * 应用于后台应用商店、在线升级，配置教程等功能
 */
define ( 'REMOTE_BASE_URL', 'http://www.weiphp.cn' );

// 网站根路径设置
define ( 'SITE_PATH', dirname ( __FILE__ ) );
/**
 * 应用目录设置
 * 安全期间，建议安装调试完成后移动到非WEB目录
 */
define ( 'APP_PATH', './Application/' );

if (! is_file ( SITE_PATH . '/Data/install.lock' )) {
    header ( 'Location: ./install.php' );
    exit ();
}
define ( 'ADDONS_TMP_PATH', './Addons/Distribution/View/default/Public/' );
/**
 * 缓存目录设置
 * 此目录必须可写，建议移动到非WEB目录
 */

define ( 'RUNTIME_PATH', './Cache/' );
//文件上传路径
define ( 'UPLOAD_PATH', './Uploads/' );
//二维码目录
define ( 'QRCODE_PATH', UPLOAD_PATH.'QRCode/' );
//define('BIND_MODULE','Mall');
define('DEFAULT_MODULE', 'Mobile');
/**
 * 引入核心入口
 * ThinkPHP亦可移动到WEB以外的目录
 */
require './Core/ThinkPHP.php';
