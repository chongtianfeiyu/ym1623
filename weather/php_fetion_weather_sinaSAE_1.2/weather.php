<?php
/**************************************************************************/
/******************* 飞信通知天气预报_sina_SAE版******************************/ 
/*************************** 2012-5-2 *************************************/
/**************************作者：xiaogg*************************************/ 
/***************************版本：1.2***************************************/
/***************************QQ:756663992***********************************/
/*********************http://www.xiaogg.org********************************/
header("content-Type: text/html; charset=utf-8");
require 'lib/function.php';
require 'lib/config.php';
require 'lib/PHPFetion.php';
if($_GET['pwd']==WEATHER_PWd){
$phone="150********|北京;134********|北京;151********|石家庄;150********|石家庄";//在些输入要发送的电话号码，多个发送用,分开。注：必须是您的飞信好友
$tophone=explode(";",$phone);
//发送短信
$fetion = new PHPFetion(PHONE_NUMBER, PHONE_PWD);	// 手机号、飞信密码
foreach($tophone as $val){
	$sys=explode("|",$val);$msg=getweather(array("city"=>$sys[1]));
	$to=$sys[0]?$sys[0]:PHONE_NUMBER;
	$fetion->send($to, $msg);	// 接收人手机号、飞信内容
}}else{echo "天气预报执行密码错误!";}
?>