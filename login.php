<?php 
	require_once($filePath."tool/conn.php");
	$username=$msg->name;
	$password=$msg->password;
	$sql = "select * from user where name='".$username."' and password='".$password."'";
	$mainUserData = $conne->getRowsRst($sql);
	if($mainUserData)//可以登录
	{
		$time = time();
		$mainUserData['last_land'] = $time;
		$mainUserData['cdkey'] = getCDKey($mainUserData['id'],$time);
		unset($mainUserData['password']);
		// unset($mainUserData['email']);
		$sql = "update user set last_land=".$time." where id='".$mainUserData['id']."'";
		if(!$conne->uidRst($sql))
		{
			$returnData->fail = 2;
		}
		else
		{
			$returnData->userdata = $mainUserData;
		}
	}
	else
	{
		$returnData->fail = 1;
	}
?> 