<?php 
require_once($filePath."tool/conn.php");
$password = rand(100000,999999);
$time = time();
$username = 'g'.($time-1458608647).rand(1,999).'@game.com';
$sql = "insert into user(name,password,last_land) values('".$username."','".$password."',".$time.")";

$num = $conne->uidRst($sql);
if($num == 1){
	$sql = "select last_insert_id() as id";
	$result = $conne->getRowsRst($sql,'id');
	$result['password'] = $password;
	$result['name'] = $username;
	$result['last_land'] = $time;
	$result['cdkey'] = getCDKey($result['id'],$time);
	$returnData->data = $result;
}
else
{
	$returnData -> fail = 1;
}
?> 