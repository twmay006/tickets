<?php
	echo "<meta charset='utf-8'>";
	include_once("../mysql/conn_mysql.php");
	if(isset($_POST['email'])){
		$email=$_POST['email'];
		$sql = "select distinct user_id from users where email='{$email}'";
		//$result = mysql_query($sql);
		$query = mysql_query($sql);
		//echo $sql;
		$num = mysql_num_rows($query);
		if ($num == 0) {
			echo "<script language=\"JavaScript\">alert(\"此邮箱尚未注册!\");</script>";
		} else {
			echo "邮件发送成功，请登录您的邮箱继续操作";
			exit;
		}	
	}		
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>login Studio112</title>
<link rel="stylesheet" type="text/css" href="css/style6.css">
<style type="text/css">
.demo {
	width: 400px;
	margin: 40px auto 0 auto;
	min-height: 250px;
}
.demo h3 {
	line-height: 24px;
	text-align: center;
	color: #360;
	font-size: 16px
}
.demo p {
	line-height: 30px;
	padding: 4px
}
.demo p span {
	margin-left: 6px;
	color: #f30
}
.input {
	width: 240px;
	height: 24px;
	padding: 2px;
	line-height: 24px;
	border: 1px solid #999
}
.btn {
	position: relative;
	overflow: hidden;
	display: inline-block;
*display:inline;
	padding: 4px 20px 4px;
	font-size: 16px;
	line-height: 20px;
*line-height:22px;
	color: #fff;
	text-align: center;
	vertical-align: middle;
	cursor: pointer;
	background-color: #5bb75b;
	border: 1px solid #cccccc;
	border-color: #e6e6e6 #e6e6e6 #bfbfbf;
	border-bottom-color: #b3b3b3;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
}
</style>
<script type="text/javascript" src="../orders/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
$(function(){
	$("#sub_btn").click(function(){
		var email = $("#email").val();
		var preg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/; //匹配Email
		if(email=='' || !preg.test(email)){
			$("#chkmsg").html("请填写正确的邮箱");
		}else{
			document.getElementById("formw").submit();
		
		}
	});
})
</script>
</head>

<body>
<div class="container">
  <div class="header">
    <div class="logo"> <a href="first_page.html"><span>Studio</span>112</a> </div>
    <div class="header-right"> <a class="rheader" href="../index.php">个人中心</a> <a class="rheader" href="../index.php">系统首页</a> </div>
  </div>
  <div class="position">
    <label style="font-size:18px;">您现在的位置：忘记密码>><span style="font-weight:bolder;">登录</span></label>
  </div>
  <div class="reg_center">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="formw">
<span style="font-size:16px; margin-left:50px">请输入您注册时的邮箱</span><br><br>
    <div class="username_input">
      <input type="text"  name="email" id="email">
      <span id="chkmsg" style="font-size:9px; color:#FF0004" style="color:red" style="height:10px"></span> 
     </div>
    <p>
      <input type="button" class="btn" id="sub_btn" value="提 交">
    </p>
    </div>
  </form>
</div>
<footer class="diff">
  <p class="text-center">&copy 2016 Studio112. All Rights Reserved | Design by <a href="first_page.html" target="_blank">Studio112.</a></p>
</footer>
</div>
</body>
</html>
