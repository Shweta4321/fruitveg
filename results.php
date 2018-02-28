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
								<form class="search-form">
									<input onblur="if (this.value=='') this.value = this.defaultValue" onfocus="if (this.value==this.defaultValue) this.value = ''" value="Search..." type="text">
									<input type="submit" value="">
								</form>
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
											<a class="list-view" href="#"></a>
										</div>
									</li>
								</ul>
							</div>
							<div class="product-grid-view">
								<div class="row">
									
									<?php cart();?>
									<?php getCatPro();?>
				                    <?php getBrandPro();?>
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