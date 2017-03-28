<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>搜索车辆</title>

<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<table class="table table-striped table-bordered table-hover table-responsive">
  <thead>
    <tr class="warning">
      <th>车次</th>
      <th>出发站</th>
      <th>到达站</th>
      <th>出发时间</th>
      <th>到达时间</th>
      <th>历时</th>
      <th>距离</th>
      <th>硬座</th>
      <th>硬卧</th>
      <th>无座</th>
      <th>备注</th>
      <th>预定</th>
    </tr>
  </thead>
  <tbody>
  
<?php
if(isset($_POST["fromStation"])&&isset($_POST["toStation"])){
	$fromStation=$_POST["fromStation"];
	$toStation=$_POST["toStation"];
	$sttime=$_POST["sttime"];
	$endtime=$_POST["endtime"];
	$infostring="查询到".$sttime." 日从 ".$fromStation." 到 ".$toStation." 的车次有:";
	echo "<b>".$infostring."</b><br>";
	include_once("../mysql/conn_mysql.php");
	$sql="select area_id,train_num,start_station,end_station,start_time,end_time,distance from stations where start_station = '{$fromStation}' and end_station = '{$toStation}'";
	//echo $sql;
	$result = mysql_query($sql);
	if(mysql_num_rows($result)==0){
		echo "<script language=\"JavaScript\">alert(\"查无相关站点信息!\");</script>";
		exit;
	}
while($row = mysql_fetch_array($result))
  {
	  $datetime1 = new DateTime($row['start_time']);
	  $datetime2 = new DateTime($row['end_time']);
      $interval = $datetime1->diff($datetime2);
      $time_sub=$interval->format('%H:%I');
	  $sql1="select run_id,wo,ying,wu from runtime where area_id='{$row['area_id']}' and run_date='{$sttime}' ";

	  $result1= mysql_query($sql1);
	  if(mysql_num_rows($result1)==0){
		   $wo="暂未售票";
	  		$ying="暂未售票";
	  		$wu="暂未售票";
			$runid="";
		}else{
			$row1=mysql_fetch_array($result1);
	 		$wo=$row1["wo"]."张";
	  		$ying=$row1["ying"]."张";
	  		$wu=$row1["wu"]."张";
			$runid=$row1["run_id"];
		}
		
  		echo "<tr><td>{$row['train_num']}</td><td>{$row['start_station']}</td><td>{$row['end_station']}</td><td>{$row['start_time']}</td><td>{$row['end_time']}</td><td>{$time_sub}</td><td>{$row['distance']}</td><td>{$wo}</td><td>{$ying}</td><td>{$wu}</td><td>无</td> <td style='background-color:#FCFCFC' align='center'> <a href='comorders.php?runid={$runid}' target='_blank' class='btn btn-success'>订票</a></td></tr>";
  }

}
?>
 
    </tr>
  </tbody>
</table>
<script src='js/jquery-1.4.2.min.js'></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.min.js"></script>
</body>
</html>
