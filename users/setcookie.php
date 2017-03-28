<?php
echo "<meta charset='utf-8'>";
setcookie("username",$username,time()+3600,'/');
setcookie("userid",$userid,time()+3600,'/');
setcookie("psw",$psw,time()+3600,'/');
setcookie("identity",$identity,time()+3600,'/');
echo "<meta http-equiv='Refresh' content='0;url=http://172.22.113.198/shouye/index.php' />";

?>