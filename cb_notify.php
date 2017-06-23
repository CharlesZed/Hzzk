<?php
//file_put_contents('log.log', 'Success notify  => '.serialize($_GET)."\r\n", FILE_APPEND); 
//$rs = unserialize('a:12:{s:2:"p7";s:16:"2016042699551014";s:2:"p6";s:16:"8699800000107940";s:2:"p5";s:28:"4009522001201604265232618853";s:2:"p4";s:1:"0";s:1:"t";s:13:"1461638791637";s:1:"s";s:32:"B80137A9BE6949F6B068EC39B3930552";s:2:"p3";s:2:"49";s:2:"p2";s:14:"20160426104630";s:1:"r";s:8:"ky53yr1v";s:1:"c";s:1:"0";s:2:"p1";s:1:"2";s:2:"p0";s:26:"A9A6929C02B0252D0000000017";}');
//echo "<pre/>";
//var_dump($rs);
//c=0 成功  p0 酷贝交易号   p2 p2	支付完成时间  p3 支付金额  p5 支付订单号
$parameter = "?stauts=".$_REQUEST['c']."&order_sn=".$_REQUEST['p7']."&pay_time=".$_REQUEST['p2']."&pay_accomt=".$_REQUEST['p3']."&pay_sn=".$_REQUEST['p5'];
$url = "http://$_SERVER[HTTP_HOST]/addon/Shop/PayNotifyCallBack/kupai_notify.html".$parameter;
//file_put_contents('log.log', 'Success notify  => '.$url."\r\n", FILE_APPEND); 
Header("Location: $url");