<?php
echo "<meta charset='utf-8'>";
include_once("../mysql/conn_mysql.php");
include_once("../users/iflogin.php");

if($_COOKIE["identity"]!=7) {
	echo "请用管理员登录";
	exit;
}
if(isset($_POST['from1'])&&isset($_POST['to1'])&&isset($_POST['sttime1'])&&isset($_POST['endtime1'])&&isset($_POST['dist1'])){
	$from='from';
	$to='to';
	$sttime='sttime';
	$endtime='endtime';
	$dist='dist';
	$trainum=$_POST['trainum'];
	$commander=$_POST['commander'];
	
	for($i=1;$i<50;$i++){
		if(isset($_POST[$from.$i])&&isset($_POST['to1'])&&isset($_POST[$sttime.$i])&&isset($_POST[$endtime.$i])&&isset($_POST[$dist.$i])){
			//echo $_POST[$from.$i]." ".$_POST[$to.$i]." ".$_POST[$sttime.$i]." ".$_POST[$endtime.$i]." ".$_POST[$dist.$i];
			$area_id='area_'.time().str_pad(mt_rand(1, 999), 3, '0', STR_PAD_LEFT);
			$start_station=$_POST[$from.$i];
			$end_station=$_POST[$to.$i];
			$start_time=$_POST[$sttime.$i];
			$end_time=$_POST[$endtime.$i];
			$distance=$_POST[$dist.$i];
			$position=$i;
			//插入所有相关站点信息
			$sql="insert into stations (area_id,train_num,start_station,end_station,start_time,end_time,distance,position) values('{$area_id}','{$trainum}','{$start_station}','{$end_station}','{$start_time}','{$end_time}',$distance,$position)";
			//echo $sql;
			if( !mysql_query($sql) ){
				echo "Mysql Wrong!";
				exit;
			}
			for($j=0;$j<10;$j=$j+1){
				$run_id='area_'.time().str_pad(mt_rand(1, 999), 3, '0', STR_PAD_LEFT);	
				$run_date=date('Y-m-d',strtotime('+'.$j.' day'));
				//$wo=90;$ying=150;$wu=200;
				//这里随机生成作为数，作为测试使用
				$wo=mt_rand(5,90);$ying=mt_rand(20,150);$wu=mt_rand(60,200);
				
				$sql_1="insert into runtime (run_id,area_id,run_date,wo,ying,wu) values('{$run_id}','$area_id','{$run_date}',{$wo},{$ying},{$wu})";
				//echo $sql_1;
				if( !mysql_query($sql_1) ){
					echo "Mysql Wrong!";
					exit;
				}
		
			}	
		}
	}	
	echo "<script language=\"JavaScript\">alert(\"添加车次成功!\");</script>";
}
?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<title>增加车辆</title>
		<script src="js/myjs.js" type="text/javascript"></script>
		<style type="text/css">
			.container {
				padding: 0;
				width: 70%;
				font-family: 'Open Sans', sans-serif;
				background: #fff;
				margin: auto;
				height: 800px;
				position: relative;
				border: 1px solid #B6B6B6;
			}
			
			.header {
				padding-left: 20px;
				background-color: #EEE;
				border-bottom: 1px solid #B6B6B6;
			}
			
			.logo {
				display: inline-block;
			}
			
			.logo a {
				font-family: 'Ubuntu Condensed', sans-serif;
				font-size: 50px;
				color: #01a185;
				text-decoration: none;
			}
			
			.logo a span {
				color: #f3c500;
			}
			
			a.rheader {
				float: right;
				margin-top: 20px;
				margin-right: 20px;
				font-size: 15px;
				color: #fff;
				background-color: #01a185;
				padding: 6px 10px;
				text-decoration: none;
			}
			
			a.rheader:hover {
				background-color: #f3c500;
			}
			
			.header-right {
				padding-right: 20px;
				display: inline-block;
				float: right;
			}
			
			table {
				border-collapse: collapse;
				width: 60%;
				margin: auto;
			}
			
			.tit th {
				text-align: right;
			}
			
			.tit td input[type="text"] {
				width: 100%;
			}
			
			.tit input[type="button"],
			.tit input[type="submit"] {
				display: inline-block;
				margin-left: 20px;
				;
			}
			
			.container footer {
				width: 100%;
				bottom: 5px;
				position: absolute;
				left: auto;
				right: auto;
				text-align: center;
			}
			
			.diff p {
				color: #979797;
				font-size: 14px;
			}
			
			.diff p a {
				color: #F3C506;
				margin-left: 2px;
			}
			
			.diff p a:hover {
				color: #01A185;
			}
			
			footer.diff {
				text-align: center;
				padding: 0 15px;
			}
		</style>
		<script>
			$(document).ready(function() {
				//<tr/>居中
				$("#tab tr").attr("align", "center");

				//增加<tr/>
				$("#but").click(function() {
					var _len = $("#tab tr").length;
					$("#tab").append("<tr id=" + _len + " align='center'>" + "<td>" + _len + "</td>" + "<td> <input size='5' type='text' name='from" + _len + "' id='from" + _len + " ' /> </td>" + "<td><input size='5' type='text' name='to" + _len + "' id='to" + _len + "' /></td>" + "<td><input size='5' type='text' name='sttime" + _len + "' id='sttime" + _len + "' /></td>" + "<td><input size='5' type='text' name='endtime" + _len + "' id='endtime" + _len + "' /></td>" + "<td><input size='5' type='text' name='dist" + _len + "' id='dist" + _len + "' /></td>" + "<td><a href=\'#\' onclick=\'deltr(" + _len + ")\'>删除</a></td>" + "</tr>");
				})
			})

			//删除<tr/>
			var deltr = function(index) {
				var _len = $("#tab tr").length;
				$("tr[id='" + index + "']").remove(); //删除当前行
				for (var i = index + 1, j = _len; i < j; i++) {
					var nextTxtVal = $("#desc" + i).val();
					$("tr[id=\'" + i + "\']")
						.replaceWith("<tr id=" + (i - 1) + " align='center'>" + "<td>" + (i - 1) + "</td>" + "<td><input size='5' type='text' name='from" + _len + "' id='from" + (i - 1) + "' /></td>" + "<td><input size='5' type='text' name='to" + (i - 1) + "' id='to" + (i - 1) + "' /></td>" + "<td><input size='5' type='text' name='sttime" + (i - 1) + "' id='sttime" + (i - 1) + "' /></td>" + "<td><input size='5' type='text' name='endtime" + (i - 1) + "' id='endtime" + (i - 1) + "' /></td>" + "<td><input size='5' type='text' name='dist" + (i - 1) + "' id='dist" + (i - 1) + "' /></td>" + "<td><a href=\'#\' onclick=\'deltr(" + (i - 1) + ")\'>删除</a></td>" + "</tr>");
				}

			}
		</script>
	</head>

	<body>
		<div class="container">
			<div class="header">
				<div class="logo">
					<a href="first_page.html"><span>Studio</span>112</a>
				</div>
				<div class="header-right">
               		 <a class="rheader" href="../users/logoff.php">注销</a>
					<a class="rheader" href="../tickets/query_ticket.html">立即购票</a>
					<a class="rheader" href="../index.php">系统首页</a>
				</div>
			</div>
			<div class="position"><label style="font-size:18px;">您现在的位置：系统首页>><span style="font-weight:bolder;">车辆管理</span></label>
			</div>

			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="cardStations">
				<table class="tit" style="margin-top:30px;">
					<tr>
						<th>车次</th>
						<td><input type="text" name="trainum" id="trainum"> </td>
						<th>列车长</th>
						<td><input type="text" name="commander" id="commander"></td>
						<td><input type="button" id="but" value="增加" /></td>
						<td><input type="submit" value="添加车次" onClick="return subTrain();"></td>
					</tr>
				</table>
				<table id="tab" border="1" align="center" style="margin-top:20px">
					<tr>
						<th width="40px">序号</th>
						<th width="80px">出发站</th>
						<th width="80px">到达站</th>
						<th width="80px">发车时间</th>
						<th width="80px">到达时间</th>
						<th width="80px">里程</th>
						<th width="80px">操作</th>
					</tr>
				</table>
			</form>
			<footer class="diff">
				<p class="text-center">&copy 2016 Studio112. All Rights Reserved | Design by <a href="first_page.html" target="_blank">Studio112.</a></p>
			</footer>
		</div>
	</body>

	</html>