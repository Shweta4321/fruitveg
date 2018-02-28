 <?php
 
 include "./include/header.php"; ?>
	<!-- End Header -->
	<section id="content">
		<div class="container">
			
			<!-- ENd Banner -->
			<div class="content-shop">
				<div class="row">
					<div class="col-md-3 col-sm-4 col-xs-12">
						<aside class="sidebar-left sidebar-shop">
							<div class="widget widget-search">
								
							</div>
							<!-- End Widget -->
							<div class="widget widget-category">
								<h2 class="title18 title-widget font-bold">Product Categories</h2>
								<ul class="list-none wg-list-cat">
									 <?php getCats();?>
								</ul>
							</div>
							<div class="widget widget-category">
								<h2 class="title18 title-widget font-bold">Product Brands</h2>
								<ul class="list-none wg-list-cat">
									  <?php getBrands();?>
								</ul>
							</div>
							<!-- ENd Widget -->
							<div class="widget widget-filter-price">
								<h2 class="title18 title-widget font-bold">Filter bY Price</h2>
								<div class="range-filter">
									<div class="slider-range"></div>
									<div class="silver table">
										<div class="text-left"><button class="btn-filter-price text-uppercase shop-button">Filter</button></div>
										<div class="text-right"><div class="amount"></div></div>
									</div>
								</div>
							</div>
							<!-- End Filter Price -->
							
						</aside>
					</div>
					<div class="col-md-9 col-sm-8 col-xs-12">
						<div class="main-content-shop">
							<div class="shop-pagibar clearfix">
								<p class="desc silver pull-left">Showing All results</p>
								<ul class="wrap-sort-view list-inline-block pull-right">
									<li>
										
									</li>
									<li>
										<div class="view-bar">
											<a class="grid-view active" href="grid.php"></a>
											<a class="list-view" href="grid.php"></a>
										</div>
									</li>
								</ul>
							</div>
							<div class="product-grid-view">
								<div class="row">
									<?php 
				
									$get_pro="select * from product  ";
									$run_pro=mysqli_query($con,$get_pro);
									while($row_pro=mysqli_fetch_array($run_pro))
									{
									   $pro_id=$row_pro['product_id'];
										$pro_cat=$row_pro['product_cat'];
										$pro_brand=$row_pro['product_brand'];
										$pro_tittle=$row_pro['product_title'];
										$pro_price=$row_pro['product_price'];
										$pro_image=$row_pro['product_image'];
										echo"
				                        <div class='col-md-4 col-sm-6 col-xs-6'>
										<div class='item-product item-product-grid text-center'>
											<div class='product-thumb'>
												<a href='detail-fullwidth.php' class='product-thumb-link rotate-thumb'>
													<img src='admin_area/product_images/$pro_image' alt=''>
													<img src='admin_area/product_images/$pro_image' alt=''>
												</a>
												<a href='#' class='quickview-link fancybox fancybox.iframe'><i class='fa fa-search' aria-hidden='true'></i></a>
											</div>
											<div class='product-info'>
												<h3 class='product-title'><a href='detail-fullwidth.php'><h3>$pro_tittle</h3></a></h3>
												<div class='product-price'>
													<ins class='color'><span><p><b>RS/-$pro_price</b></p></span></ins>
												</div>
												<div class='product-rate'>
													<div class='product-rating' style='width:100%'></div>
												</div>
												<div class='product-extra-link'>
												<a href='detail-fullwidth.php?pro_id=$pro_id' class='addcart-link'>Details</a>
												<a href='index.php?add_cart=$pro_id' class='addcart-link'>Add to cart </a>

													
												</div>
											</div>
										</div>
									  </div>
									 ";
									}
									?>
									<?php getCatPro();?>
				                    <?php getBrandPro();?>
									<?php cart();?>
									</div>
							<div class="pagibar text-center">
								<a href="#" class="current-page">1</a>
								<a href="#">2</a>
								<a href="#">3</a>
								<a href="#" class="next-page"> <i class="icon ion-ios-arrow-thin-right"></i></a>
							</div>
						</div>
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