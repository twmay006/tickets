<?php
echo "<meta charset='utf-8'>";
if(isset($_POST["type"])&&isset($_POST["ide"])){
	//echo $_POST["type"];
	$type=$_POST["type"];
	$ide=$_POST["ide"];
	$areaid=$_POST["areaid"];
	$runid=$_POST["runid"];
	$distance=(float)$_POST["distance"];
	if($type=='1') {
		$price=$distance*0.21;
		$sql="update runtime set wo=wo-1 where run_id='{$runid}'";
		}
	else if($type=='2'){
		$sql="update runtime set ying=ying-1 where run_id='{$runid}'";
		$price=$distance*0.12;
		}
	else if($type=='3'){
		$sql="update runtime set wu=wu-1 where run_id='{$runid}'";
		$price=$distance*0.12;
		}
	if($ide=='2'){
		$price=$price*0.5;
		} 
		
	include_once("../mysql/conn_mysql.php");

	if( !mysql_query($sql) ){
		echo "Mysql Wrong!";
		exit;
	}
	$orderid="order_".time().str_pad(mt_rand(0, 999), 3, '0', STR_PAD_LEFT);
	$userid=$_COOKIE["userid"];
	//echo $orderid.$userid.$areaid." ".$price;
	
	$sql="insert into orders (order_id,user_id,area_id,run_id,price,type,state) values ('{$orderid}','{$userid}','{$areaid}','{$runid}','{$price}',{$type},1)";
	//echo $sql;
	if( !mysql_query($sql) ){
		echo "Mysql Wrong!";
		exit;
	}
	//echo "<script language=\"JavaScript\">alert(\"购买成功!\");</script>";
	echo "<meta http-equiv='Refresh' content='0;url=../orders/userorder.php' />";
    exit;
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>买票</title>
</head>

<body>
<h1>这个是下单选择座位的页面</h1>
<?php
include_once("../users/iflogin.php");
if(!isset($_GET['runid'])){
	echo "请先选择车辆";
	exit;
	}
$runid=$_GET['runid'];
include_once("../mysql/conn_mysql.php");
	$sql="select area_id,run_date,wo,ying,wu from runtime where run_id='{$runid}' ";
	//echo $sql;
	$result = mysql_query($sql);
	$row=mysql_fetch_array($result);
	$areaid=$row["area_id"];
	$rundata=$row["run_date"];
	$wo=$row["wo"];
	$ying=$row["ying"];
	$wu=$row["wu"];
	$name=$_COOKIE['username'];
	$sql="select train_num,start_time,end_time,distance from stations where area_id='{$areaid}'";
	$result = mysql_query($sql);
	$row=mysql_fetch_array($result);
	$trainnum=$row["train_num"];
	$distance=(int)$row["distance"];
	$sttime=$row["start_time"];
	$endtime=$row["end_time"];
	//硬卧每公里0.21块，硬座每公里0.12块
	$price_wo=$distance*0.21;
	$price_ying=$distance*0.12;
	echo "用户：".$name."&nbsp&nbsp&nbsp车次：".$trainnum."&nbsp&nbsp&nbsp出行时间：".$rundata." ".$sttime;
?>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<input type="radio" name="type" value="1" checked />硬卧剩余<?php echo"{$wo}"?>张&nbsp&nbsp&nbsp<span>票价:<?PHP echo $price_wo;?></span> <br>
<input type="radio" name="type" value="2" /> 硬座剩余<?php echo"{$ying}"?>张&nbsp&nbsp&nbsp<span>票价:<?PHP echo $price_ying;?></span> <br>
<input type="radio" name="type" value="3" /> 无座剩余<?php echo"{$wu}"?>张&nbsp&nbsp&nbsp<span>票价:<?PHP echo $price_ying;?></span> <br>
<br>
<input type="radio" name="ide" value="1" checked/>全票<br>
<input type="radio" name="ide" value="2" />半票<br>
<input type="text" name="areaid" value="<?php echo $areaid;?>" hidden="">
<input type="text" name="distance" value="<?php echo $distance;?>" hidden="">
<input type="text" name="runid" value="<?php echo $runid;?>" hidden="">
<input type="submit" value="确认">
</form>
</body>
</html>