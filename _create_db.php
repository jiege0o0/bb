<?php 
$filePath = dirname(__FILE__).'/';
require_once($filePath."_config.php");
	
	
$connect=mysql_connect($sql_url,$sql_user,$sql_password)or die('message=F,Could not connect: ' . mysql_error()); 
// mysql_query("CREATE DATABASE ".$sql_db,$connect)or die('Could not create database'); 
mysql_select_db($sql_db,$connect)or die('Could not select database'); 
mysql_query("set names utf8");


mysql_query("
Create TABLE user(
id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
name varchar(64) NOT NULL,
password varchar(32),
last_land INT UNSIGNED,
server varchar(500) default '',
UNIQUE (name)
)",$connect)or die("message=F,Invalid query: " . mysql_error()); 

mysql_query("alter table user AUTO_INCREMENT=10000",$connect)or die("message=F,Invalid query: " . mysql_error()); 



//服务器状态信息表(openid,state_key)
//玩家数据表（科技，等级，资源。。。）(openid,nick,exp,tec_lv,tec,pk_info1,pk_info2,single1,single2,honor)
//PK表（等级，科技来分表）(info,pker,time)
//好友表（AID,BID,win1,win2,isBreak）
//好友PK表(from,to,info1,info2,type,time)
//好友对话表(from,to,type,content,time)
//赌场(from,to,info1,info2,type,step,time)
echo "成功";
?>