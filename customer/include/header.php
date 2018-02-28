<?php
session_start();
include("functions/functions.php");
include("include/dp.php");
?>
<!DOCTYPE HTML>
<html lang="en-US">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta name="description" content="Fruit Shop is new Html theme that we have designed to help you transform your store into a beautiful online showroom. This is a fully responsive Html theme, with multiple versions for homepage and multiple templates for sub pages as well" />
	<meta name="keywords" content="Fruit,7uptheme" />
	<meta name="robots" content="noodp,index,follow" />
	<meta name='revisit-after' content='1 days' />
	<title>FruitVeg.com | Home</title>
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/libs/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/libs/ionicons.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/libs/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/libs/bootstrap-theme.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/libs/jquery.fancybox.css"/>
	<link rel="stylesheet" type="text/css" href="../css/libs/jquery-ui.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/libs/owl.carousel.css"/>
	<link rel="stylesheet" type="text/css" href="../css/libs/owl.transitions.css"/>
	<link rel="stylesheet" type="text/css" href="../css/libs/jquery.mCustomScrollbar.css"/>
	<link rel="stylesheet" type="text/css" href="../css/libs/owl.theme.css"/>
	<link rel="stylesheet" type="text/css" href="../css/libs/slick.css"/>
	<link rel="stylesheet" type="text/css" href="../css/libs/animate.css"/>
	<link rel="stylesheet" type="text/css" href="../css/libs/hover.css"/>
	<link rel="stylesheet" type="text/css" href="../css/color.css" media="all"/>
	<link rel="stylesheet" type="text/css" href="../css/theme.css" media="all"/>
	<link rel="stylesheet" type="text/css" href="../css/responsive.css" media="all"/>
	<link rel="stylesheet" type="text/css" href="../css/browser.css" media="all"/>
	<!-- <link rel="stylesheet" type="text/css" href="css/rtl.css" media="all"/> -->
</head>
<body>
<div class="wrap">
<header id="header">
		<div class="header">
			<div class="top-header">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-4 hidden-xs">

						</div>
						<div class="col-md-8 col-sm-8 col-xs-12">
							<ul class="info-account list-inline-block pull-right">
								<li><a href="customer/my_account.php" ><span class="color"><i class="fa fa-user-o"></i></span>My Account</a></li>
								<li><a href="#" data-toggle="modal" data-target="#myModal"><span class="color"><i class="fa fa-key"></i></span>
								<?php
								 if(!isset($_SESSION['customer_email']))
								 {
									 echo "<a href='#'>Login</a>";
								 }
								 else
								 {
									echo "<a href='logout.php'>Logout</a>";
								 } 
								
								 
								 ?>
								</a></li>
								<li><a href="checkout.php"><span class="color"><i class="fa fa-check-circle-o"></i></span>Checkout</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- End Top Header -->
			<div class="main-header">
				<div class="container">
					<div class="row">
						<div class="col-md-5 col-sm-5 col-xs-12">
							<form class="search-form pull-left" method="get" action="search.php" enctype="multipart/form-data">
								<input onblur="if (this.value=='') this.value = this.defaultValue" onfocus="if (this.value==this.defaultValue)
									this.value = ''" value="search a product" type="text" name="user_query"/>
								   <input type="submit" name="search" value=""/>
								
							</form>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<div class="logo logo1">
								<h1 class="hidden">Fruit Shop</h1>
								<a href="index.php"><img src="images/home/home1/logo.png" alt="" /></a>
							</div>
						</div>
						<div class="col-md-5 col-sm-5 col-xs-12">
						<h4>
									<?php 
										if(isset($_SESSION['customer_name']))
										{
										 
										  echo "<b>Welcome:</b>" . $_SESSION['customer_name']  ;
										}
										else 
										{
										    echo "<b>Welcome :Guest</b>";
										}
										?>
										</h4>
										
							<div class="mini-cart-box mini-cart1 pull-right">
								<a class="mini-cart-link" href="#">
									<span class="mini-cart-icon title18 color"><i class="fa fa-shopping-basket"></i></span>
									
									<span class="mini-cart-number">
											<?php 
										if(isset($_SESSION['customer_name']))
										{
										 
										         echo total_items(); echo "-<span class='color'>"; echo total_price();
										}
										else 
										{
										    echo "0  - <span class='color'> 0</b>";
										}
										?>							
										</span>
									</span>
								</a>
								
									<?php cart();?>
									
									<?php
								 if(isset($_SESSION['customer_email']))
								 {
									 echo "
									 <div class='mini-cart-content text-left'>
									
									<div class='mini-cart-button'>
									 <a class='mini-cart-view shop-button' href='cart.php'>View cart </a>
										<a class='mini-cart-checkout shop-button' href='checkout.php'>Checkout</a>
										</div>
										</div>"
										;
								 }
								 
						?>
										
									
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Main Header -->
			<div class="nav-header bg-white header-ontop">
				<div class="container">
					<nav class="main-nav main-nav1">
						<ul>
							<li class="current-menu-item ">
								<a href="../index.php">Home</a>
								
							</li>
						
							<!-- <li class="has-mega-menu"><a href="#">Features</a></li>
							<li class="menu-item-has-children"><a href="#">Pages</a></li> -->
							<li class="menu-item-has-children">
								<a href="../grid.php">Shop</a>
								<ul class="sub-menu">
									<li><a href="../grid.php">Fruits</a></li>
									<li><a href="../grid.php">Vegetables</a></li>
								</ul>
							</li>
							
							<li><a href="../about.php">About</a></li>
							<li><a href="../contact.php">Contact</a></li>
						</ul>
						<a href="#" class="toggle-mobile-menu"><span></span></a>
					</nav>
				</div>
			</div>
			<!-- End Nav Header -->
		</div>
	</header>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×</button>
                <h4 class="modal-title" id="myModalLabel">
                    Login/Registration </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8" style="border-right: 1px dotted #C2C2C2;padding-right: 30px;">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#Login" data-toggle="tab">Login</a></li>
                            <li><a href="#Registration" data-toggle="tab">Registration</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="Login">
                                <form role="form" class="form-horizontal"  method="post" action="login_pro.php">
								<div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Name</label>
                                    <div class="col-sm-10">
                                        <input  class="form-control"  type="text" name="name" placeholder="enter name"/> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Email</label>
                                    <div class="col-sm-10">
                                        <input  type="text" name="email" placeholder="enter email" class="form-control"/>
                                    </div>
                                </div>
								
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input  type="password" name="pass" placeholder="enter password" class="form-control"  />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <button  class="btn btn-primary btn-sm">
                                           <input  type="submit" name="login" placeholder="Login"/></button>
                                        <a href="javascript:;">Forgot your password?</a>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="Registration">
                                <form role="form" class="form-horizontal" action="customer_register.php"  method="post"  enctype="multipart/form-data"">
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Name</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <input type="text" class="form-control"  name="c_name"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Email</label>
                                    <div class="col-sm-10">
                                       <input type="text" name="c_email" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mobile" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input  class="form-control"  type="password" name="c_pass" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">
                                        Image</label>
                                    <div class="col-sm-10">
                                        <input  class="form-control"  type="file" name="c_image"/>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">
                                        Country</label>
                                    <div class="col-sm-10">
                                        <input  class="form-control"  type="text" name="c_country"/>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label for="mobile" class="col-sm-2 control-label">
                                        City</label>
                                    <div class="col-sm-10">
                                        <input  class="form-control"  type="password" name="c_city" />
                                    </div>
                                </div>
								<div class="form-group">
                                    <label for="mobile" class="col-sm-2 control-label">
                                        Contact</label>
                                    <div class="col-sm-10">
                                        <input  class="form-control"  type="password" name="c_contact" />
                                    </div>
                                </div>
								<div class="form-group">
                                    <label for="mobile" class="col-sm-2 control-label">
                                      Address</label>
                                    <div class="col-sm-10">
                                        <input  class="form-control"  type="password" name="c_address" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <button type="button" class="btn btn-primary btn-sm">
                                           <input type="submit" name="register" value="Create Account"/></button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div id="OR" class="hidden-xs">
                            OR</div>
                    </div>
                    <div class="col-md-4">
                        <div class="row text-center sign-with">
                            <div class="col-md-12">
                                <h3>
                                    Sign in with</h3>
                            </div>
                            <div class="col-md-12">
                                <div class="btn-group btn-group-justified">
                                    <a href="#" class="btn btn-primary">Facebook</a> <a href="#" class="btn btn-danger">
                                        Google</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



