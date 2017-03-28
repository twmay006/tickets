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
	echo "<script language=\"JavaScript\">alert(\"购买成功!\");</script>";
	echo "<meta http-equiv='Refresh' content='0;url=../orders/userorders.php' />";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>确认购票</title>
<link rel="stylesheet" type="text/css" href="css/style7.css">
</head>

<body>
<div class="container">
  <div class="header">
    <div class="logo"> <a href="first_page.html"><span>Studio</span>112</a> </div>
    <div class="header-right"> <a class="rheader" href="#">个人中心</a> <a class="rheader" href="../index.php">系统首页</a> </div>
  </div>
  <div class="position">
    <label style="font-size:18px;">您现在的位置：系统首页>><span style="font-weight:bolder;">座位类型选择</span></label>
  </div>
  <div class="car_center">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <div class="car">
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
      </div>
      <div class="car">
        <table class="least">
          <tr>
            <td><input type="radio" name="type" value="1" checked />
              硬卧剩余<?php echo"{$wo}"?>张&nbsp;&nbsp;&nbsp;<span>票价:<?PHP echo $price_wo;?></span></td>
          </tr>
          <tr>
            <td><input type="radio" name="type" value="2" />
              硬座剩余<?php echo"{$ying}"?>张&nbsp;&nbsp;&nbsp;<span>票价:<?PHP echo $price_ying;?></span></td>
          </tr>
          <tr>
            <td><input type="radio" name="type" value="3" />
              无座剩余<?php echo"{$wu}"?>张&nbsp;&nbsp;&nbsp;<span>票价:<?PHP echo $price_ying;?></span></td>
          </tr>
        </table>
      </div>
      <div class="car">
        <table class="least">
          <tr>
            <td><input type="radio" name="ide" value="1" checked/>
              全票</td>
          </tr>
          <tr>
            <td><input type="radio" name="ide" value="2" />
              半票</td>
          </tr>
        </table>
      </div>
      <input type="hidden" name="areaid" value="<?php echo $areaid;?>">
      <input type="hidden" name="distance" value="<?php echo $distance;?>">
      <input type="hidden" name="runid" value="<?php echo $runid;?>">

      <div class="car">
        <input type="submit" value="确认">
      </div>
    </form>
  </div>
  <footer class="diff">
    <p class="text-center">&copy 2016 Studio112. All Rights Reserved | Design by <a href="first_page.html" target="_blank">Studio112.</a></p>
  </footer>
</div>
</body>
</html>