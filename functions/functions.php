<?php
$con=mysqli_connect("localhost","root","","ecommerce");
//get ip
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}
 
//cart function
function cart()
{
   if(isset($_GET['add_cart']))
   {
	   global $con;
	  $ip=getIp();
	  $pro_id=$_GET['add_cart'];
      $check_pro="select * from cart where ip_add='$ip' AND p_id='$pro_id'";
      $run_check=mysqli_query($con,$check_pro);
      if(mysqli_num_rows($run_check)>0)
	  {
		  echo "already added in the cart";
	  }
     else
	 {
		 $insert_pro="insert into cart(p_id,ip_add) values('$pro_id','$ip')";
	     $run_pro=mysqli_query($con,$insert_pro);
		 echo "<script>window.open('grid.php','_self')</script>";
	 }		 
   }	   
}
//getting the total added items
function total_items()
{
	if(isset($_GET['add_cart']))
	{
		global $con;
		$ip=getIp();
		$get_items="select * from cart where ip_add='$ip'";
	    $run_items=mysqli_query($con,$get_items);
		$count_items=mysqli_num_rows($run_items);
	}
	else
	{
		global $con;
		$ip=getIp();
		$get_items="select * from cart where ip_add='$ip'";
	    $run_items=mysqli_query($con,$get_items);
		$count_items=mysqli_num_rows($run_items);
	}
	echo $count_items;
}
//tatal price
function total_price()
{
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
		      $values=array_sum($product_price);
		       $total+=$values;
		   }
	}
	echo $total;
}
//getting the categories
function getCats()
{
	global $con;
	$get_cats="select * from categories";
	$run_cats=mysqli_query($con,$get_cats);
	while($row_cats=mysqli_fetch_array($run_cats))
	{
		$cat_id=$row_cats['cat_id'];
		$cat_title=$row_cats['cat_tittle'];
		echo"<li><a href='results.php?cat=$cat_id'>$cat_title</a></li>";
	}
}

//getting the categories
function getBrands()
{
	global $con;
	$get_brands="select * from brands";
	$run_brands=mysqli_query($con,$get_brands);
	while($row_cats=mysqli_fetch_array($run_brands))
	{
		$brand_id=$row_cats['brand_id'];
		$brand_title=$row_cats['brand_tittle'];
		echo"<li><a href='results.php?brand=$brand_id'>$brand_title</a></li>";
	}
}

function getPro()
{
	if(!isset($_GET['cat']))
	{
		if(!isset($_GET['brand']))
		{
			global $con;
			$get_pro="select * from product order by RAND() LIMIT 0,4 ";
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
												        <button><a href='detail_fullwidth.php?pro_id=$pro_id' class='addcart-link'>Details</a></button>
												<button><a href='index.php?add_cart=$pro_id' class='addcart-link'>Add to cart </a></button>
                                              </div>
										</div>
									</div>
									 ";
			}
				  
	    }
	}
}

function getCatPro()
{
	if(isset($_GET['cat']))
	{
		 $cat_id=$_GET['cat'];
			global $con;
			$get_cat_pro="select * from product where product_cat='$cat_id'";
			$run_cat_pro=mysqli_query($con,$get_cat_pro);
			$count_cats=mysqli_num_rows($run_cat_pro);
			if($count_cats==0)
			{
				echo "<h2 style='padding:20px;'> There is no product is  found</h2>";
			}
			while($row_cat_pro=mysqli_fetch_array($run_cat_pro))
			{
			   $pro_id=$row_cat_pro['product_id'];
				$pro_cat=$row_cat_pro['product_cat'];
				$pro_brand=$row_cat_pro['product_brand'];
				$pro_tittle=$row_cat_pro['product_title'];
				$pro_price=$row_cat_pro['product_price'];
				$pro_image=$row_cat_pro['product_image'];
				
			
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
													<button><a href='detail_fullwidth.php?pro_id=$pro_id' class='addcart-link'>Details</a></button>
												<button><a href='index.php?add_cart=$pro_id' class='addcart-link'>Add to cart </a></button>
                                                 </div>
										</div>
									</div>
									 ";
			}
	}
				  
 }

function getBrandPro()
{
	if(isset($_GET['brand']))
	{
		 $brand_id=$_GET['brand'];
			global $con;
			$get_brand_pro="select * from product where product_brand='$brand_id'";
			$run_brand_pro=mysqli_query($con,$get_brand_pro);
			$count_cats=mysqli_num_rows($run_brand_pro);
			if($count_cats==0)
			{
				echo "<h2 style='padding:20px;'> There is no product is Found</h2>";
			}
			while($row_brand_pro=mysqli_fetch_array($run_brand_pro))
			{
			   $pro_id=$row_brand_pro['product_id'];
				$pro_cat=$row_brand_pro['product_cat'];
				$pro_brand=$row_brand_pro['product_brand'];
				$pro_tittle=$row_brand_pro['product_title'];
				$pro_price=$row_brand_pro['product_price'];
				$pro_image=$row_brand_pro['product_image'];
				
			
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
													<button><a href='detail_fullwidth.php?pro_id=$pro_id' class='addcart-link'>Details</a></button>
												<button><a href='index.php?add_cart=$pro_id' class='addcart-link'>Add to cart </a></button>
                                                 </div>
										</div>
									</div>
									 ";
			}
	}
				  
 }
?>