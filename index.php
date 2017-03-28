
<!DOCTYPE html>
<html>
<head>
<title>Studio112</title>
<link rel="stylesheet" href="css/bootstrap.min.css">


<link href="css/bootstrap.min.css" rel="stylesheet">
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>


<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<link rel="stylesheet" href="css/font-awesome.min.css" />
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Resale Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->

<!-- js -->

<!-- js -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script>
  $(document).ready(function () {
    var mySelect = $('#first-disabled2');

    $('#special').on('click', function () {
      mySelect.find('option:selected').prop('disabled', true);
      mySelect.selectpicker('refresh');
    });

    $('#special2').on('click', function () {
      mySelect.find('option:disabled').prop('disabled', false);
      mySelect.selectpicker('refresh');
    });

    $('#basic2').selectpicker({
      liveSearch: true,
      maxOptions: 1
    });
  });
</script>


<!-- Source -->

<script>
			$( document ).ready( function() {
				$( '.uls-trigger' ).uls( {
					onSelect : function( language ) {
						var languageName = $.uls.data.getAutonym( language );
						$( '.uls-trigger' ).text( languageName );
					},
					quickList: ['en', 'hi', 'he', 'ml', 'ta', 'fr'] //FIXME
				} );
			} );
		</script>
</head>


<body>
	<div class="header">
		<div class="container">
			<div class="logo"><a href="first_page.html"><span>Studio</span>112</a></div>
			<div class="header-right">
				<?php 
					if(isset($_COOKIE['username'])){
						echo "<a class='rheader' href='users/logoff.php'>退出登录</a>".
								"<a class='rheader'>{$_COOKIE['username']} 欢迎回来</a>";
						if( $_COOKIE['identity']==7 ){ //7表示管理员
							echo"<a class='rheader' href='trainmanage/addtrains.php'>车辆管理</a>";
						}
						//echo "<a class='rheader' href='register.php'>好咯</a>";
					}else{
						echo "<a class='rheader' href='users/register.php'>注册</a>".
			  					"<a class='rheader' href='users/login.php'>登录</a>";
						
					}
				?>
			 
		    </div>
		</div>
	</div>
	<div class="main-banner banner text-center">
	  <div class="container">    
			<h1>欢迎使用112铁路服务系统</h1>
			<p>Easy Life , Easy Happy</p>
	  </div>
	</div>
		<!-- content-starts-here -->
		<div class="content">
			<div class="categories">
				<div class="container">
                    <div class="col-md-2 focus-grid">
						<a href="tickets/query_ticket.html">
							<div class="focus-border">
								<div class="focus-layout">
									<div class="focus-image"><i class="fa fa-money"></i></div>
									<h4 class="clrchg"> 购票</h4>
								</div>
							</div>
						</a>
					</div>
                    <div class="col-md-2 focus-grid">
						<a href="orders/userorders.php">
							<div class="focus-border">
								<div class="focus-layout">
									<div class="focus-image"><i class="fa fa-list-alt"></i></div>
									<h4 class="clrchg">订单查询</h4>
								</div>
							</div>
						</a>
					</div>	
					<div class="col-md-2 focus-grid" data-toggle="modal" 
   data-target="#myModal">

							<div class="focus-border">
								<div class="focus-layout">
									<div class="focus-image"><i class="fa fa-search"></i></div>
									<h4 class="clrchg">中转站查询</h4>
								</div>
							</div>
	
					</div>
					<div class="col-md-2 focus-grid" data-toggle="modal" 
   data-target="#myModal">
							<div class="focus-border">
								<div class="focus-layout">
									<div class="focus-image"><i class="fa fa-truck"></i></div>
									<h4 class="clrchg">货运服务</h4>
								</div>
							</div>
					</div>	
					
					<div class="col-md-2 focus-grid">
						<a href="users/personinfo.php">
							<div class="focus-border">
								<div class="focus-layout">
									<div class="focus-image"><i class="fa fa-user"></i></div>
									<h4 class="clrchg">个人中心</h4>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-2 focus-grid">
						<a href="aboutus/index.html">
							<div class="focus-border">
								<div class="focus-layout">
									<div class="focus-image"><i class="fa fa-comments-o"></i></div>
									<h4 class="clrchg">联系我们</h4>
								</div>
							</div>
						</a>
					</div>	
				</div>
			</div>
			
		</div>
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" 
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title" id="myModalLabel">
               系统提示
            </h4>
         </div>
         <div class="modal-body" align="center">
           功能尚在开发，敬请期待！
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" 
               data-dismiss="modal">关闭
            </button>
         </div>
      </div><!-- /.modal-content -->
</div><!-- /.modal -->
</div>
		<!--footer section start-->		
		<footer>
			<div class="footer-bottom text-center">
			<div class="container">
				<div class="footer-logo">
					<a href="first_page.html"><span>Studio</span>112</a>
				</div>
				<div class="footer-social-icons">
					<ul>
						<li><a class="facebook" href="#"><span>Facebook</span></a></li>
						<li><a class="twitter" href="#"><span>Twitter</span></a></li>
						<li><a class="flickr" href="#"><span>Flickr</span></a></li>
						<li><a class="googleplus" href="#"><span>Google+</span></a></li>
						<li><a class="dribbble" href="#"><span>Dribbble</span></a></li>
					</ul>
				</div>
				<div class="copyrights">
					<p> © 2016 Studio112. All Rights Reserved | Design by  <a href="http://w3layouts.com/">Studio112</a></p>
				</div>
			</div>
		</div>
		</footer>
        <!--footer section end-->
</body>
</html>