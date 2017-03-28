<?php
	function printorders($st) {
  		$userid=$_COOKIE["userid"];
		$sql="select * from orders where user_id='{$userid}' and state={$st}";
		include_once("../mysql/conn_mysql.php");
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result)){
		
		$orderid=substr($row["order_id"],6);
		$areaid=$row["area_id"];
		$runid=$row["run_id"];
		$price=$row["price"];
		$state=$row["state"];
		$type=$row["type"];
		$sql_1="select run_date from runtime where run_id='{$runid}' order by run_date desc";
		$result_1 = mysql_query($sql_1);
		$row_1=mysql_fetch_array($result_1);
		$date=$row_1["run_date"];
		$sql_2="select train_num,start_station,end_station,start_time from stations where area_id='{$areaid}' ";
		$result_2 = mysql_query($sql_2);
		$row_2=mysql_fetch_array($result_2);
		$trainum=$row_2["train_num"];
		$startion=$row_2["start_station"];
		$endstion=$row_2["end_station"];
		$sttime=$row_2["start_time"];
		$time=$date." ".$sttime;
		if($type=='1') $typetring="硬卧";
		else if($type=='2') $typetring="硬座";
		else if($type=='3') $typetring="无座";
					
		echo "<tr align='center'>
			<td>{$orderid}</td>
			<td>{$trainum}</td>
			<td>{$startion}</td>
			<td>{$endstion}</td>
			<td>{$time}</td>
			<td>{$typetring}</td>
			<td>￥{$price}</td>
		</tr>";
		}
		
	}
	
	
		function printorderswan() {
  		$userid=$_COOKIE["userid"];
		$sql="select * from orders where user_id='{$userid}' and state=2";
		include_once("../mysql/conn_mysql.php");
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result)){
		
		$orderid=substr($row["order_id"],6);
		$areaid=$row["area_id"];
		$runid=$row["run_id"];
		$price=$row["price"];
		$state=$row["state"];
		$type=$row["type"];
		$sql_1="select run_date from runtime where run_id='{$runid}' order by run_date desc";
		$result_1 = mysql_query($sql_1);
		$row_1=mysql_fetch_array($result_1);
		$date=$row_1["run_date"];
		$sql_2="select train_num,start_station,end_station,start_time from stations where area_id='{$areaid}' ";
		$result_2 = mysql_query($sql_2);
		$row_2=mysql_fetch_array($result_2);
		$trainum=$row_2["train_num"];
		$startion=$row_2["start_station"];
		$endstion=$row_2["end_station"];
		$sttime=$row_2["start_time"];
		$time=$date." ".$sttime;
		if($type=='1') $typetring="硬卧";
		else if($type=='2') $typetring="硬座";
		else if($type=='3') $typetring="无座";
					
		echo "<tr align='center'>
			<td>{$orderid}</td>
			<td>{$trainum}</td>
			<td>{$startion}</td>
			<td>{$endstion}</td>
			<td>{$time}</td>
			<td>{$typetring}</td>
			<td>￥{$price}</td>
			<td>
				<a href='canorder.php?orderid={$orderid}'>退票</a><br>
				<a href='gaiorder.php?orderid={$orderid}'>改签</a>
			</td>
		</tr>";
		}
		
	}	
	
	
	function printorderswei() {
  		$userid=$_COOKIE["userid"];
		$sql="select * from orders where user_id='{$userid}' and state=1";
		include_once("../mysql/conn_mysql.php");
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result)){
		
		$orderid=substr($row["order_id"],6);
		$areaid=$row["area_id"];
		$runid=$row["run_id"];
		$price=$row["price"];
		$state=$row["state"];
		$type=$row["type"];
		$sql_1="select run_date from runtime where run_id='{$runid}' order by run_date desc";
		$result_1 = mysql_query($sql_1);
		$row_1=mysql_fetch_array($result_1);
		$date=$row_1["run_date"];
		$sql_2="select train_num,start_station,end_station,start_time from stations where area_id='{$areaid}' ";
		$result_2 = mysql_query($sql_2);
		$row_2=mysql_fetch_array($result_2);
		$trainum=$row_2["train_num"];
		$startion=$row_2["start_station"];
		$endstion=$row_2["end_station"];
		$sttime=$row_2["start_time"];
		$time=$date." ".$sttime;
		if($type=='1') $typetring="硬卧";
		else if($type=='2') $typetring="硬座";
		else if($type=='3') $typetring="无座";
				
		echo "<tr align='center'>
			<td>{$orderid}</td>
			<td>{$trainum}</td>
			<td>{$startion}</td>
			<td>{$endstion}</td>
			<td>{$time}</td>
			<td>{$typetring}</td>
			<td>￥{$price}</td>
			<td>
				<a href='payorder.php?orderid={$orderid}'>支付</a><br>
				<a href='canorder.php?orderid={$orderid}'>取消</a>
			</td>
		</tr>";
		}
		
	}

				
?>