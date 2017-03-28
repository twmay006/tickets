<?php
echo "<meta charset='utf-8'>";
include "../mysql/conn_mysql.php";
if (isset($_POST["name"]) && isset($_POST["psw"]) && isset($_POST["cardid"])) {
	$user_id = "user_" . time() . str_pad(mt_rand(1, 999), 3, '0', STR_PAD_LEFT);
	$card_id = $_POST["cardid"];
	$name = $_POST["name"];
	$pw = md5($_POST["psw"]);
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$iden = $_POST["iden"];
	$sql = "insert into users (user_id,card_id,name,pw,phone,email,identity) values ('{$user_id}',{$card_id},'{$name}','{$pw}',{$phone},'{$email}',{$iden})";
	//echo $sql;
	if (!mysql_query($sql)) {
		echo "Mysql Wrong!";
		exit ;
	}
	echo "<script language=\"JavaScript\">alert(\"注册成功!\");</script>";
	echo "<meta http-equiv='Refresh' content='0;url=login.php' />";
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>login Studio112</title>
<link rel="stylesheet" type="text/css" href="css/reg_style.css">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
   <script src="../js/jquery.min.js"></script>
   <script src="../js/bootstrap.min.js"></script>
<script src="../js/myjs.js" type="text/javascript"></script>
<script>$(function () 
      { 
      	$("[data-toggle='popover']").popover();
      });
   </script>
</head>

<body>
<div class="containe">
  <div class="aa">
    <div class="header">
      <div class="logo"> <a href="first_page.html"><span>Studio</span>112</a> </div>
      <div class="header-right"> <a class="rheader" href="login.php">用户登录</a> <a class="rheader" href="../index.php">系统首页</a> </div>
    </div>
    <div class="position">
      <label style="font-size:18px;">您现在的位置：系统首页>><span style="font-weight:bolder;">注册</span></label>
    </div>
    <div class="reg_center" style="font-family: 幼圆;font-weight: bold;">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >
        <div class="username_input"><span>用户名</span>
          <input type="text" name="name"	data-container="body" data-toggle="popover" data-placement="right" data-content='用户名为6-30位字母或数字'>
          </input>
        </div>
        <div class="username_input"><span>密&nbsp;&nbsp;&nbsp;码</span>
          <input type="password" name="psw" id="psw" data-container="body" data-toggle="popover" data-placement="right" data-content='密码长度6-20位、不能为同一个字符、不能全是数字、只能有数字、字母和常用特殊字符'>
				</input>
        </div>
        <div class="username_input"><span>确认密码</span>
          <input type="password" name="psw1" id="psw1">
          </input>
        </div>
        <div class="username_input"><span>电话号码</span>
          <input type="text" name="phone" id="phone" data-container="body" data-toggle="popover" data-placement="right" data-content='电话号码必须为正确的11位数字'>
          </input>
        </div>
        <div class="username_input"><span>邮&nbsp;&nbsp;&nbsp;箱</span>
          <input name="email" id="email" id="email" type="text" data-container="body" data-toggle="popover" data-placement="right" data-content='邮箱示例:address@example.com'>
          </input>
        </div>
        <div class="username_input"><span>身份证号</span>
          <input name="cardid" id="cardid" type="text" data-container="body" data-toggle="popover" data-placement="right" data-content='身份证号码必须为正确的18位数字(或X)'>
          </input>
        </div>
        <div class="username_input"><span>用户类型</span>
          <select id="ss" class="username_input" name="iden">
            <option value="1">成人</option>
            <option value="2">学生</option>
            <option value="3">小孩</option>
            <option value="4">残疾人</option>
            <option value="5">军人</option>
          </select>
        </div>
        <div align="center">
        <input type="radio" name="agree" value="1" /> 同意我们的服务协议</input><br/>
        <input class="key" type="submit" value="注册" onClick="return IsEmail();">
        </div>
        <div class="footer"></div>
      </form>
    </div>
    <footer class="diff" >
      <p class="text-center">&copy 2016 Studio112. All Rights Reserved | Design by <a href="first_page.html" target="_blank">Studio112.</a></p>
    </footer>
  </div>
</div>
</body>
</html>
