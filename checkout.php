<?php include "./include/header.php"; ?>

	<div id="content">
		<div class="content-page">
			<div class="container">
				<div class="shop-banner banner-adv line-scale zoom-image">
					<a href="#" class="adv-thumb-link"><img src="images/page/about.jpg" alt="" /></a>
					<div class="banner-info">
						<h2 class="title30 color">Check Out</h2>
						<div class="bread-crumb white"><a href="#" class="white">Home</a><span>Check Out</span></div>
					</div>
				</div>
				<!-- ENd Banner -->
				<div class="content-cart-checkout woocommerce">
					<h2 class="title30 font-bold text-uppercase text-center">Checkout</h2>
					<div class="row">
						<div class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1">
							<div class="row">
								<div class="col-md-6 col-sm-6 col-ms-12">
									<div class="check-billing">
										<form class="form-my-account" action="checkout.php"  method="post"  enctype="multipart/form-data">
											<h2 class="title title18 rale-font font-bold text-uppercase">Billing Details</h2>
											<p class="clearfix box-col2">
												<input type="text" value="First Name *"  name="first_name" />
												<input type="text" value="last name *" name="last_name" />
											      <input type="text" value="phone" name="phone" />
												<input type="text" value="Email *" name="email" />
											</p>
											
												
											
											<p><input type="text" value="Address *" name="address" />
											<p class="clearfix box-col2">
												<input type="text" value="Postcode / Zip" name="zip"/>
												<input type="text" value="Town / City*"  name="town"/>
												<input type="text" value="country / City*" name="country"/>
												</p>
											<p>
												<input type="submit" name="register" value="Create Account"/>
											</p>
										</form>
									</div>
								</div>
								<div class="col-md-6 col-sm-6 col-ms-12">
									<div class="check-address">
										<form class="form-my-account">
											<p class="ship-address">
												<input type="checkbox"  id="address" /> <label for="address">Ship to a different address?</label>
											</p>
											<p>
												<textarea cols="30" rows="10" onblur="if (this.value=='') this.value = this.defaultValue" onfocus="if (this.value==this.defaultValue) this.value = ''">Order Notes</textarea>
											</p>
										</form>
									</div>		
								</div>
							</div>
							<h3 class="order_review_heading bg-color">Your order</h3>
							<div class="woocommerce-checkout-review-order" id="order_review">
								<div class="table-responsive">
									<table class="shop_table woocommerce-checkout-review-order-table">
										<thead>
											<form action="" method="post" enctype="multipart/form-data">
							<table class="shop_table cart table">
								<thead>
								
									<tr>
										
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
								
						
						
						<td><?php echo "$" . $single_price; ?></td>
					</tr>
					
							 						  
						<?php }} ?>
						 <tr>
							  <td colspan="4" align="right"><b>Sub total</b></td>
							  <td><?php echo $total;?></td>
                             </tr>
                             
							  							 
				   </table>
				</form>
											<tr class="shipping">
												<th>Shipping</th>
												<td>
													<ul class="list-none" id="shipping_method">
														<li>
															<input type="radio" class="shipping_method" checked="checked" value="free_shipping" id="shipping_method_0_free_shipping" data-index="0" name="shipping_method[0]">
															<label for="shipping_method_0_free_shipping">Free Shipping</label>
														</li>
														<li>
															<input type="radio" class="shipping_method" value="local_delivery" id="shipping_method_0_local_delivery" data-index="0" name="shipping_method[0]">
															<label for="shipping_method_0_local_delivery">Local Delivery (Free)</label>
														</li>
														<li>
															<input type="radio" class="shipping_method" value="local_pickup" id="shipping_method_0_local_pickup" data-index="0" name="shipping_method[0]">
															<label for="shipping_method_0_local_pickup">Local Pickup (Free)</label>
														</li>
													</ul>
												</td>
											</tr>
											
										</tfoot>
									</table>
								</div>
								<div class="woocommerce-checkout-payment" id="payment">
									<ul class="payment_methods methods list-none">
										<li class="payment_method_bacs">
											<input type="radio" data-order_button_text="" value="bacs" name="payment_method" class="input-radio" id="payment_method_bacs" checked="checked">
											<label for="payment_method_bacs">Direct Bank Transfer 	</label>
											<div style="" class="payment_box payment_method_bacs">
												<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
											</div>
										</li>
										<li class="payment_method_cheque">
											<input type="radio" data-order_button_text="" value="cheque" name="payment_method" class="input-radio" id="payment_method_cheque">
											<label for="payment_method_cheque">Cheque Payment 	</label>
												<div style="display:none;" class="payment_box payment_method_cheque">
												<p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
											</div>
										</li>
										<li class="payment_method_cod">
											<input type="radio" data-order_button_text="" value="cod" name="payment_method" class="input-radio" id="payment_method_cod">
											<label for="payment_method_cod">Cash on Delivery 	</label>
											<div style="display:none;" class="payment_box payment_method_cod">
												<p>Pay with cash upon delivery.</p>
											</div>
										</li>
										<li class="payment_method_paypal">
											<input type="radio" data-order_button_text="Proceed to PayPal" value="paypal" name="payment_method" class="input-radio" id="payment_method_paypal">
											<label for="payment_method_paypal">
												PayPal <img alt="PayPal Acceptance Mark" src="images/icon/payment.png"><a title="What is PayPal?" onclick="javascript:window.open('https://www.paypal.com/gb/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;" class="about_paypal" href="https://www.paypal.com/gb/webapps/mpp/paypal-popup">What is PayPal?</a>	
											</label>
											<div style="display:none;" class="payment_box payment_method_paypal">
												<p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
											</div>
										</li>
									</ul>
									<div class="form-row place-order">
										<input type="submit" data-value="Place order" value="Place order" id="place_order" name="woocommerce_checkout_place_order" class="button alt bg-color">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<!-- End Content Pages -->
	</div>
	<!-- End Content -->
	<footer id="footer">
		<div class="footer3">
			<div class="newsletter-box bg-color">
				<div class="container">
					<ul class="inner-newsletter white list-inline-block">
						<li><h2 class="title30"><i class="fa fa-envelope-open"></i>Newsletter</h2></li>
						<li><p>Sign up for Kelis tips, news and advice</p></li>
						<li>
							<form class="email-form">
								<input onblur="if (this.value=='') this.value = this.defaultValue" onfocus="if (this.value==this.defaultValue) this.value = ''" value="E-mail" type="text">
								<input type="submit" value="Sign Up">
							</form>
						</li>
					</ul>
				</div>
			</div>
			<!-- End Newsletter -->
			<div class="footer-top3">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="footer-box3">
								<h2 class="title30 font-bold">Follow us</h2>
								<div class="social-network">
									<a href="#" class="float-shadow"><img src="images/icon/icon-fb.png" alt=""></a>
									<a href="#" class="float-shadow"><img src="images/icon/icon-tw.png" alt=""></a>
									<a href="#" class="float-shadow"><img src="images/icon/icon-ig.png" alt=""></a>
									<a href="#" class="float-shadow"><img src="images/icon/icon-gp.png" alt=""></a>
									<a href="#" class="float-shadow"><img src="images/icon/icon-pt.png" alt=""></a>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="footer-box3">
								<h2 class="title30 font-bold">Contact us</h2>
								<p class="desc">Phone 084 366 4723 or 5560 724 850 for those outside of Hanoi.</p>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<p class="desc more-contact3">For Product Registration and general enquires please <a href="#" class="color">contact us</a></p>
						</div>
					</div>
				</div>
			</div>
			<!-- End Footer Top -->
			<div class="footer-bottom3">
				<div class="container">
					<div class="brand-slider brand-slider3">
						<div class="wrap-item" data-pagination="false" data-autoplay="true" data-itemscustom="[[0,2],[480,3],[768,4],[990,5]]">
							<div class="item-brand">
								<a href="#" class="pulse-grow"><img src="images/home/home1/br1.png" alt="" /></a>
							</div>
							<div class="item-brand">
								<a href="#" class="pulse-grow"><img src="images/home/home1/br2.png" alt="" /></a>
							</div>
							<div class="item-brand">
								<a href="#" class="pulse-grow"><img src="images/home/home1/br3.png" alt="" /></a>
							</div>
							<div class="item-brand">
								<a href="#" class="pulse-grow"><img src="images/home/home1/br4.png" alt="" /></a>
							</div>
							<div class="item-brand">
								<a href="#" class="pulse-grow"><img src="images/home/home1/br5.png" alt="" /></a>
							</div>
							<div class="item-brand">
								<a href="#" class="pulse-grow"><img src="images/home/home1/br1.png" alt="" /></a>
							</div>
							<div class="item-brand">
								<a href="#" class="pulse-grow"><img src="images/home/home1/br2.png" alt="" /></a>
							</div>
							<div class="item-brand">
								<a href="#" class="pulse-grow"><img src="images/home/home1/br3.png" alt="" /></a>
							</div>
							<div class="item-brand">
								<a href="#" class="pulse-grow"><img src="images/home/home1/br4.png" alt="" /></a>
							</div>
							<div class="item-brand">
								<a href="#" class="pulse-grow"><img src="images/home/home1/br5.png" alt="" /></a>
							</div>
						</div>
					</div>
					<!-- End List Brand -->
					<div class="policy-payment3 border-top">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<ul class="text-left list-inline-block term-policy">
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Term and Conditions</a></li>
								</ul>
								<p class="desc copyright3">Copyright © 2017 Fruit Store - All Rights Reserved.</p>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="payment-method text-right">
									<a href="#" class="wobble-top"><img src="images/icon/pay1.png" alt=""></a>
									<a href="#" class="wobble-top"><img src="images/icon/pay2.png" alt=""></a>
									<a href="#" class="wobble-top"><img src="images/icon/pay3.png" alt=""></a>
									<a href="#" class="wobble-top"><img src="images/icon/pay4.png" alt=""></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- End Footer -->
	<div class="wishlist-mask">
		<div class="wishlist-popup">
			<span class="popup-icon color"><i class="fa fa-bullhorn" aria-hidden="true"></i></span>
			<p class="wishlist-alert">"Fruit Product" was added to wishlist</p>
			<div class="wishlist-button">
				<a href="#">Continue Shopping (<span class="wishlist-countdown">10</span>)</a>
				<a href="#">Go To Shopping Cart</a>
			</div>
		</div>
	</div>
	<!-- End Wishlist Mask -->
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
</div>
<script type="text/javascript" src="js/libs/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/libs/bootstrap.min.js"></script>
<script type="text/javascript" src="js/libs/jquery.fancybox.js"></script>
<script type="text/javascript" src="js/libs/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/libs/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/libs/jquery.jcarousellite.min.js"></script>
<script type="text/javascript" src="js/libs/jquery.elevatezoom.js"></script>
<script type="text/javascript" src="js/libs/jquery.mCustomScrollbar.min.js"></script>
<script type="text/javascript" src="js/libs/slick.js"></script>
<script type="text/javascript" src="js/libs/popup.js"></script>
<script type="text/javascript" src="js/libs/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="js/libs/timecircles.js"></script>
<script type="text/javascript" src="js/libs/wow.js"></script>
<script type="text/javascript" src="js/theme.js"></script>
</body>

<!-- Mirrored from demo.7uptheme.com/html/fruitshop/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Sep 2017 02:35:05 GMT -->
</html>