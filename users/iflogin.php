<?php
echo "<meta charset='utf-8'>";
if(!( isset($_COOKIE["username"])&&isset($_COOKIE["userid"])&&isset($_COOKIE["psw"]) )) {
	echo "暂未登陆,<a href='../users/login.php'>点此登录</a>";
	exit;
	}
?>