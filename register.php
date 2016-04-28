<?php 
require_once($filePath."tool/conn.php");
$username=$msg->name;
$password=$msg->password;
$sql = "select * from user where name='".$username."'";
$num = $conne->getRowsNum($sql);
if($num == 0)//可以注册
{
	$time = time();
	$sql = "insert into user(name,password,last_land) values('".$username."','".$password."',".$time.")";
	$num = $conne->uidRst($sql);
	if($num == 1){
		$sql = "select last_insert_id() as id";
		$result = $conne->getRowsRst($sql);
		$result['cdkey'] = getCDKey($result['id'],$time);
		$result['last_land'] = $time;
		$returnData->data = $result;
	}
	else
	{
		$returnData -> fail = 1;
		errorLog('register:'.json_encode($msg));
	}
}
else //用户名已被使用
{
	$returnData -> fail = 2;
}
?> 