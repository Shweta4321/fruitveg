 <?php

 include "./include/header.php"; ?>
	<!-- End Header -->
	<section id="content">
		<div class="container">
			
			<!-- ENd Banner -->
			<div class="content-shop">
				<div class="row">
					<div class="col-md-3 col-sm-4 col-xs-12">
						<div id="sidebar_title">My Account:</div>
				
				<ul id="cats">
				<?php 
			   $user = $_SESSION['customer_email'];
				
				$get_img = "select * from customers where customer_email='$user'";
				
				$run_img = mysqli_query($con, $get_img); 
				
				$row_img = mysqli_fetch_array($run_img); 
				
				$c_image = $row_img['customer_image'];
				
				$c_name = $row_img['customer_name'];
				
				echo "<p style='text-align:center;'><img src='customer_image/$c_image' width='150' height='150'/></p>";
				
				?>
				<li><a href="my_account.php?my_orders">My Orders</a></li>
				<li><a href="my_account.php?edit_account">Edit Account</a></li>
				<li><a href="my_account.php?change_pass">Change Password</a></li>
				<li><a href="my_account.php?delete_account">Delete Account</a></li>
				<li><a href="logout.php">Logout</a></li>
				
				<ul>
				
				</div>
					
		
			<div id="content_area">
			
			<?php cart(); ?>
			
			<div id="shopping_cart"> 
					
					<span style="float:right; font-size:17px; padding:5px; line-height:40px;">
					
					
					
					
					
					
					</span>
			</div>
			
				<div id="products_box">
				
				
				
				<?php 
				if(!isset($_GET['my_orders'])){
					if(!isset($_GET['edit_account'])){
						if(!isset($_GET['change_pass'])){
							if(!isset($_GET['delete_account'])){
							
				echo "
				<h2 style='padding:20px;'>Welcome:  $c_name </h2>";
				
				}
				}
				}
				}
				?>
				
				<?php 
				if(isset($_GET['edit_account'])){
				include("edit_account.php");
				}
				if(isset($_GET['change_pass'])){
				include("change_pass.php");
				}
				if(isset($_GET['delete_account'])){
				include("delete_account.php");
				}
				
				
				?>
				
				</div>
			
			</div>
		</div>
							
			<!-- End Content Shop -->
		</div>
	</section>
	<!-- End Content -->
	
	
<?php include "./include/footer.php"; ?>
</body>

<!-- Mirrored from demo.7uptheme.com/html/fruitshop/grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Sep 2017 02:34:58 GMT -->
</html>