	<?php include "./include/header.php"; ?>
	<section id="content">
		<div class="container">
			<div class="content-page">
				
				<!-- ENd Banner -->
				<div class="content-cart-checkout woocommerce">
					<h2 class="title30 font-bold text-uppercase">Cart</h2>
					<form method="post">
						<div class="table-responsive">
						<form action="" method="post" enctype="multipart/form-data">
							<table class="shop_table cart table">
								<thead>
								
									<tr>
										<th class="product-remove">Remove;</th>
										<th class="product-thumbnail">&nbsp;</th>
										<th class="product-name">Product</th>
										<th class="product-quantity">Quantity</th>
										
										
									</tr>
								</thead>
								<tbody>
									 <?php
					  $total=0;
						global $con;
						$ip=getIp();
						$sel_price="select * from cart where ip_add='$ip'";
						$run_price=mysqli_query($con,$sel_price);
						while($p_price=mysqli_fetch_array($run_price))
						{
							$pro_id=$p_price['p_id'];
							$pro_price="select * from product where product_id='$pro_id'";
							$run_pro_price=mysqli_query($con,$pro_price);
							while($pp_price=mysqli_fetch_array($run_pro_price))
							   { 
								 $product_price=array($pp_price['product_price']);
								  $product_title=$pp_price['product_title'];
								  $product_image=$pp_price['product_image'];
								  $single_price=$pp_price['product_price'];
								  $values=array_sum($product_price);
								   $total+=$values;
						?>
										 <tr align="center">
								<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"/></td>
								<td><?php echo $product_title; ?><br>
								<img src="admin_area/product_images/<?php echo $product_image;?>" width="60" height="60"/>
								</td>
								<?php $qty=1;
								if(!isset($SESSION['qty']))
								{
									$_SESSION['qty']=$qty; 
								}
								
								?>
								
								<td><input type="text" size="4" name="qty" value="<?php echo $_SESSION['qty'];?>"/></td>
								<?php 
								
								global $con;
						         $ip=getIp();
								if(isset($_POST['update_cart'])){
								    
									$qty = $_POST['qty'];
									
									$update_qty = "update cart set qty='$qty' where p_id='p_id' AND ip_add='$ip' ";
									
									$run_qty = mysqli_query($con, $update_qty); 
									
									$_SESSION['qty']=$qty;
									
									$total = $total*$qty;
								}
						
						
						        ?>
						
						
						<td><?php echo "$" . $single_price; ?></td>
					</tr>
					
							 						  
						<?php }} ?>
						 <tr>
							  <td colspan="4" align="right"><b>Sub total</b></td>
							  <td><?php echo $total;?></td>
                             </tr>
                              <tr>
							  <td><input type="submit" name="update_cart" value="Update Cart"></td>
							  <td><input type="submit" name="continue" value="Continue Shopping"></td>
                             <td> <button><a href="checkout.php" style="text-decoration:none; color:black;"> CheckOut</a></button></td>
							 </tr>							 
				   </table>
				</form>
				<?php
				function updatecart()
				{
			    global $con;
				$ip = getIp();
				
				if(isset($_POST['update_cart']))
				{   
					foreach($_POST['remove'] as $remove_id)
					{
						$delete_product="delete from cart where p_id='$remove_id' AND ip_add='$ip' ";				
						 $run_delete=mysqli_query($con,$delete_product);
						 if($run_delete)
						 {
							 echo"<script>window.open('cart.php','_self')</script>";
						 }
				   }
				}
				if(isset($_POST['continue']))
				{
				   echo"<script>window.open('grid.php','_self')</script>";
			    }	
				}
				echo @$up_cart=updatecart();
				?>
<?php include "./include/footer.php" ?>
	<a href="#" class="scroll-top round"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
	<div id="loading">
		<div id="loading-center">
			<div id="loading-center-absolute">
				<div class="object" id="object_four"></div>
				<div class="object" id="object_three"></div>
				<div class="object" id="object_two"></div>
				<div class="object" id="object_one"></div>
			</div>
		</div>
	</div>
	<!-- End Preload -->

<!-- Mirrored from demo.7uptheme.com/html/fruitshop/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Sep 2017 02:29:28 GMT -->
</html>