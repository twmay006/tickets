<?php
	echo "<meta charset='utf-8'>";
	include_once("../mysql/conn_mysql.php");
	include_once("../users/iflogin.php");
	$userid=$_COOKIE['userid'];
	$sql = "select card_id,name,phone,email,identity from users where user_id='{$userid}' ";
	$query = mysql_query($sql);
	$row = mysql_fetch_array($query);
	$carid=$row['card_id'];
	$name=$row['name'];
	$phone=$row['phone'];
	$email=$row['email'];
	$identity=$row['identity'];
	if(isset($_POST['pwold'])&&isset($_POST['pwnew1'])){
		$pwold=md5($_POST['pwold']);
		$pwnew=md5($_POST['pwnew1']);
		$sql = "select name from users where user_id='{$userid}' and pw='{$pwold}' ";
		$query = mysql_query($sql);
		$num = mysql_num_rows($query);
		if ($num == 0) {
			echo "<script language=\"JavaScript\">alert(\"用户密码不正确!\");</script>";
		}else{
			$sql="update users set pw='{$pwnew}' where user_id='{$userid}' ";

			if( !mysql_query($sql) ){
				echo "Mysql Wrong!";
				exit;
			}
			echo "<script language=\"JavaScript\">alert(\"密码修改成功!\");</script>";
		}
		
		
	}

?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="chrome=1">
		<title>个人信息</title>
		<link rel="stylesheet" type="text/css" href="css/style1.css">
		<link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css " />
		<script src="js/jquery-1.9.1.min.js"></script>
		<script src="js/easyResponsiveTabs.js"></script>

		<style type="text/css">
			.code {
				background-image: url(111.jpg);
				font-family: Arial, 宋体;
				font-style: italic;
				color: green;
				border: 0;
				padding: 2px 3px;
				letter-spacing: 3px;
				font-weight: bolder;
			}
			
			.unchanged {
				border: 0;
			}
		</style>
		<script language="javascript" type="text/javascript">
			var code; //在全局 定义验证码
			function createCode() {
				code = new Array();
				var codeLength = 4; //验证码的长度
				var checkCode = document.getElementById("checkCode");
				checkCode.value = "";

				var selectChar = new Array(2, 3, 4, 5, 6, 7, 8, 9, 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'J', 'K', 'L', 'M', 'N', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

				for (var i = 0; i < codeLength; i++) {
					var charIndex = Math.floor(Math.random() * 32);
					code += selectChar[charIndex];
				}
				if (code.length != codeLength) {
					createCode();
				}
				checkCode.value = code;
			}

			function validate() {
				var inputCode = document.getElementById("input1").value.toUpperCase();
				var pwold=document.getElementById("pwold");
				var pwnew1=document.getElementById("pwnew1");
				var pwnew2=document.getElementById("pwnew2");
				if(pwold.value.length<4||pwnew1.value.length<4||pwnew2.value.length<4){
					alert("请输入至少4位密码");
					return false;	
				}
				if(pwnew1.value!=pwnew2.value){
					alert("两次密码不匹配");
					pwnew2.focus();
					return false;	
				}
				if (inputCode.length <= 0) {
					alert("请输入验证码！");
					return false;
				} else if (inputCode == code) {
					document.getElementById("register").submit();
					return true;
				} else {
					alert("验证码输入错误！");
					createCode();
					return false;
				}
			}
		</script>

	</head>

	<body onLoad="createCode();">
		<div class="container">
			<div class="header">
				<div class="logo">
					<a href="first_page.html"><span>Studio</span>112</a>
				</div>
				<div class="header-right">
                	<a class="rheader" href="logoff.php">注销</a>
					<a class="rheader" href="../tickets/query_ticket.html">立即购票</a>
					<a class="rheader" href="../index.php">系统首页</a>
				</div>
			</div>
			<div class="position">
				<label style="font-size:18px;">您现在的位置：系统首页>><span style="font-weight:bolder;">个人信息</span></label>
			</div>
			<br />
			<br />
			<div id="parentVerticalTab" style="font-family:幼圆">
				<ul class="resp-tabs-list hor_1">
					<li>查看个人信息</li>
					<li>修改密码</li>
					<li>常用联系人</li>
				</ul>
				<div class="resp-tabs-container hor_1">
					<div align="center">
						<div>
							<hr width=70% size=4 color=#01A185>
							<h4>*基本信息</h4>
							<hr width=70% size=1 color=#01A185>
						</div>
						<div>
							<dl>
								<dt>*用户名:<?php echo $name;?></dt>
								<dt>*姓名:<?php echo $name?></dt>
								<dt>*性别:<?php echo "暂无";?></dt>
								<dt>国家/地区:<?php echo "中国";?></dt>
								<dt>*证件类型:<?php echo '居民身份证号'?></dt>
								<dt>*证件号码:<?php echo $carid;?></dt>
								<dt>出生日期:<?php echo "暂无";?></dt>
								<dt>核验状态:<?php echo "已校验";?></dt>
							</dl>
						</div>

						<div>
							<hr width=70% size=4 color=#01A185>
							<h4>*联系方式</h4>
							<hr width=70% size=1 color=#01A185>
						</div>
						<div>
							<dl>
								<dt>*手机号码:<?php echo $phone;?></dt>
								<dt>电子邮件:<?php echo $email;?></dt>
								<dt>地址:<?php echo "暂无"; ?></dt>
								<dt>邮编:<?php echo "暂无"; ?></dt>
							</dl>
						</div>

						<div>
							<hr width=70% size=4 color=#01A185>
							<h4>*附加信息</h4></div>
						<hr width=70% size=1 color=#01A185>
						<div>
							<dl>
								<dt>*旅客类型:<?php echo $identity;?></dt>
							</dl>
						</div>
					</div>

					<div align="center">
						<h4>修改密码</h4>                   
                        
                       <form method="post" name="resetpw" id="resetpw" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >

							<table border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td height="50">&nbsp*用户名:&nbsp&nbsp&nbsp&nbsp</td>
									<td><input type="text" style="width: 75%;" name="passwd" class="change_psw" value=<?php echo $name;?>  readonly="true" disabled;;>
									</td>
								</tr>
								<tr>
									<td height="50">&nbsp*旧密码:&nbsp&nbsp&nbsp&nbsp</td>
									<td><input type="password" style="width: 75%;" name="pwold" class="change_psw" id='pwold' ;></td>
								</tr>
								<tr>
									<td height="50">&nbsp*新密码:&nbsp&nbsp&nbsp&nbsp</td>
									<td><input type="password" style="width: 75%;" name="pwnew1" class="change_psw" id='pwnew1';></td>
								</tr>
								<tr>
									<td height="50">&nbsp*确认新密码</td>
									<td><input type="password" style="width: 75%;" name="pwnew2" class="change_psw" id='pwnew2';>
									</td>
								</tr>
								<tr>
									<td height="50">&nbsp*验证码：&nbsp&nbsp&nbsp&nbsp</td>
									<td><input type="text" style="width: 75%;" id="input1" class="change_psw" />
									</td>
								</tr>
							</table>
							
                            
							<input type="button" id="checkCode" class="code" onClick="createCode()" style="margin-left:25%;"/><br />

							<input type=submit onClick="return validate();" name="submit" value="提交" style="margin-left: 60px">
							<input type=reset  onClick="reset" value="重置" style="margin-left: 30px" </strike>
						</form>
 
                        
                        
                        
                        
                        
                        
					</div>

					<div align="center">
						<h4>常用联系人</h4>
						<table border="1" cellspacing="0" cellpadding="4">

							<tr>
								<td>序号</td>
								<td> 姓名</td>
								<td>证件类型</td>
								<td>证件号码 </td>
								<td>手机号码</td>
								<td>旅客类型</td>
								<td>核验状态</td>
								<td>操作</td>
							</tr>
							<tr>
								<td><input type="checkbox" name="number" id="number" value="" /></td>
								<td>鸡汤姐</td>
								<td>身份证</td>
								<td>110110110110110110110</td>
								<td>12345678910</td>
								<td>学生</td>
								<td>通过</td>
								<td><input type="radio" name="name" value="1" checked>删除
									<input type="radio" name="name" value="2">编辑<br></td>
							</tr>

						</table>
					</div>

				</div>
				<!--Plug-in Initialisation-->
				<script type="text/javascript">
					$(document).ready(function() {
						//Horizontal Tab
						$('#parentHorizontalTab').easyResponsiveTabs({
							type: 'default', //Types: default, vertical, accordion
							width: 'auto', //auto or any width like 600px
							fit: true, // 100% fit in a container
							tabidentify: 'hor_1', // The tab groups identifier
							activate: function(event) { // Callback function if tab is switched
								var $tab = $(this);
								var $info = $('#nested-tabInfo');
								var $name = $('span', $info);
								$name.text($tab.text());
								$info.show();
							}
						});

						// Child Tab
						$('#ChildVerticalTab_1').easyResponsiveTabs({
							type: 'vertical',
							width: 'auto',
							fit: true,
							tabidentify: 'ver_1', // The tab groups identifier
							activetab_bg: '#fff', // background color for active tabs in this group
							inactive_bg: '#F5F5F5', // background color for inactive tabs in this group
							active_border_color: '#c1c1c1', // border color for active tabs heads in this group
							active_content_border_color: '#5AB1D0' // border color for active tabs contect in this group so that it matches the tab head border
						});

						//Vertical Tab
						$('#parentVerticalTab').easyResponsiveTabs({
							type: 'vertical', //Types: default, vertical, accordion
							width: 'auto', //auto or any width like 600px
							fit: true, // 100% fit in a container
							closed: 'accordion', // Start closed if in accordion view
							tabidentify: 'hor_1', // The tab groups identifier
							activate: function(event) { // Callback function if tab is switched
								var $tab = $(this);
								var $info = $('#nested-tabInfo2');
								var $name = $('span', $info);
								$name.text($tab.text());
								$info.show();
							}
						});
					});
				</script>
	</body>

</html>