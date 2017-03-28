<?php
include_once("../users/iflogin.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="chrome=1">
<title>订单管理</title>
<link rel="stylesheet" type="text/css" href="css/style1.css">
<link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css " />
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/easyResponsiveTabs.js"></script>
<style>
.wrapper {
	border: solid 1px gray;
	opacity: 0.4;
}
</style>
</head>

<body>
<div class="container">
  <div class="header">
    <div class="logo"> <a href="first_page.html"><span>Studio</span>112</a> </div>
    <div class="header-right"> <a class="rheader" href="#">个人中心</a> <a class="rheader" href="../index.php">系统首页</a> </div>
  </div>
  <div class="position">
    <label style="font-size:18px;">您现在的位置：系统首页>><span style="font-weight:bolder;">订单管理</span></label>
  </div>
  <br />
  <br />
  <div id="parentVerticalTab" style="font-family:幼圆" >
    <ul class="resp-tabs-list hor_1">
      <li>未支付订单</li>
      <li>已支付订单</li>
      <li>退票</li>
      <li>改签</li>
    </ul>
    <div class="resp-tabs-container hor_1">
      <div>
        <div>
          <h4 style="font-family:幼圆">查看未支付订单</h4>
          </a> </div>
        <div>
          <ul>
            <table border="1" cellpadding="10" style="border-style:groove;border-collapse: collapse;" width="95%">
              
                <th>订单编号</th>
                <th>车次</th>
                <th>出发站</th>
                <th>到达站</th>
                <th>出发时间</th>
                <th>票种</th>
                <th>价格</th>          
                <th>操作</th>
                <?php
					include_once("getorders.php");
					printorderswei();
				?>
            </table>
          </ul>
        </div>
      </div>
      <div>
        <div>
          <h4 style="font-family:幼圆">查看已支付订单</h4>
          </a> </div>
        <div>
          <ul>
            <table border="1" cellpadding="10"  style="border-style:groove;border-collapse: collapse;" width="95%">
              
                <th>订单编号</th>
                <th>车次</th>
                <th>出发站</th>
                <th>到达站</th>
                <th>出发时间</th>
                <th>票种</th>
                <th>价格</th>
                <th>操作</th>
                <?php
                	include_once("getorders.php");
					printorderswan();
				?>
            </table>
          </ul>
        </div>
      </div>
      <div>
        <div>
          <h4 style="font-family:幼圆">已经退票</h4>
          </a> </div>
        <div>
          <ul>
            <table border="1" cellpadding="10"  style="border-style:groove;border-collapse: collapse;" width="95%">
                <th>订单编号</th>
                <th>车次</th>
                <th>出发站</th>
                <th>到达站</th>
                <th>出发时间</th>
                <th>票种</th>
                <th>价格</th>
                <?php
                	include_once("getorders.php");
					printorders(0);
				?>
            </table>
          </ul>
        </div>
      </div>
      <div>
        <div>
          <h4 style="font-family:幼圆">已经改签</h4>
          </a> </div>
        <div>
          <ul>
            <table border="1" cellpadding="10"  style="border-style:groove;border-collapse: collapse;" width="95%">
              
                <th>订单编号</th>
                <th>车次</th>
                <th>出发站</th>
                <th>到达站</th>
                <th>出发时间</th>
                <th>票种</th>
                <th>价格</th>
             <?php
                	include_once("getorders.php");
					printorders(3);
				?>
            </table>
          </ul>
        </div>
      </div>
    </div>
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