<?php

echo "<meta charset='utf-8'>";
if (isset($_POST["id"]) && isset($_POST["psw"])) {
	$id = $_POST["id"];
	$psw = md5($_POST["psw"]);
	include "../mysql/conn_mysql.php";
	$sql = "select distinct user_id,name,identity from users where phone={$id} and pw='{$psw}'";
	//$result = mysql_query($sql);
	$query = mysql_query($sql);
	//echo $sql;
	$num = mysql_num_rows($query);
	if ($num == 0) {
		echo "<script language=\"JavaScript\">alert(\"用户名或密码错误请重新登陆!\");</script>";
	} else {
		$row = mysql_fetch_array($query);
		$username = $row['name'];
		$userid = $row['user_id'];
		$identity=$row['identity'];
		//echo $name."登陆成功";
		include "setcookie.php";
	}
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>login Studio112</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="../js/myjs.js" type="text/javascript"></script>
</head>

<body>
<div class="container"><div class="aa">
   <div class="header">
	  <div class="logo">
		<a href="first_page.html"><span>Studio</span>112</a>
	  </div>
	  <div class="header-right">
		<a class="rheader" href="register.php">注册新用户</a>
		<a class="rheader" href="../index.php">系统首页</a>
      </div>
   </div>
   <div class="position"><label style="font-size:18px;">您现在的位置：系统首页>><span style="font-weight:bolder;">登录</span></label>
   </div>


  <div class="login_center">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
      <div class="username_input"><span>手机号</span><input name="id" id="user" type="text" value="<?php if(isset($_POST["id"])) echo $_POST["id"]; else echo"您的手机号码"?>" onfocus="this.value='';" onblur="if(this.value==''){this.value='您的手机号码';}"name="user_name"></input>
      	</div>
      <div class="username_input"><span>密&nbsp;&nbsp;码</span><input name="psw" id="psw" type="password" name="psw"></input><a href="psw_forget.php">忘记密码</a></div>
      <input class="key" type="submit" value="登录" onclick="return yanzheng0();" >
      <input class="key" type="reset" value="重置" onClick="clean_data();">
      <div class="footer"></div>
    </form>
  </div>
  <footer class="diff">
	 <p class="text-center">&copy 2016 Studio112. All Rights Reserved | Design by <a href="first_page.html" target="_blank">Studio112.</a></p>
  </footer>
  </div>
</div>
</body>
</html>
