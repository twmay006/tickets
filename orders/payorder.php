<?php
echo "<meta charset='utf-8'>";
include_once("../users/iflogin.php");
if(!isset($_GET["orderid"])){
	echo "请选择订单";
	exit;	
}
$userid=$_COOKIE["userid"];
$orderid="order_".$_GET["orderid"];
include_once("../mysql/conn_mysql.php");
$sql="update orders set state=2 where order_id='{$orderid}' and user_id='{$userid}' ";
if(!mysql_query($sql)){
	echo "MySql Wrong!";
	exit;
}
echo "<script language=\"JavaScript\">alert(\"支付成功!\");</script>";
echo "<meta http-equiv='Refresh' content='0;url=userorders.php' />";
?>
