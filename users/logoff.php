
<?php
echo "<meta charset='utf-8'>";
setcookie("username","username",time()-60,'/');
setcookie("userid","userid",time()-60,'/');
setcookie("psw","psw",time()-60,'/');
echo "<script language=\"JavaScript\">alert(\"退出登陆!\");</script>";
//echo $_COOKIE['username'];
echo "<meta http-equiv='Refresh' content='0;url=http://172.22.113.198/shouye/index.php' />";
?>
