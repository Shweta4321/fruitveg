<!DOCTYPE>
<?php
  include("includes/dp.php");
  ?>
<html>
    <head>
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

	 </head>
	<body bgcolor="skyblue">
		<form action="insert_product.php" method="post" enctype="multipart/form-data">
			 <table align="center"  border="2" style= "width: 100%; background: #d4ffe5; padding: 4%;
  				border: 1px solid #656565;"">
				 <tr align="center">
					<td colspan="7"><h2><span style="font-size: 24px">Insert New Product</span>  </td>
				 </tr>
				 
				 <tr>
				     <td align="right"><b>Product Tittle:</b></td>
				     <td><input type="text" name="product_tittle"  size="60" requried/></td>
				 </tr>
				 <tr>
				     <td align="right"><b>Product Category: requried</b></td>
				     <td>
					   <select name="product_cat">
					     <option requried>Select a Category</option>
					     <?php
					        $get_cats="select * from categories";
									$run_cats=mysqli_query($con,$get_cats);
									while($row_cats=mysqli_fetch_array($run_cats))
									{
										$cat_id=$row_cats['cat_id'];
										$cat_title=$row_cats['cat_tittle'];
										echo"<option value='$cat_id'>$cat_title</option>";
									}
					     ?>
					 </td>
				 </tr>
				 <tr>
				     <td align="right"><b>Product Brand:</b></td>
				     <td>
					  <select name="product_brand">
					     <option requried>Select a Brand</option>
					     <?php
					        	$get_brands="select * from brands";
									$run_brands=mysqli_query($con,$get_brands);
									while($row_cats=mysqli_fetch_array($run_brands))
									{
										$cat_id=$row_cats['brand_id'];
										$cat_title=$row_cats['brand_tittle'];
										echo"<li><a href='#'>$cat_title</a></li>";
										echo"<option value='$cat_id'>$cat_title</option>";
									}
					     ?>
					 </td>
				 </tr>
				 <tr>
				     <td align="right"><b>Product Image:</b> </td>
				     <td><input type="file" name="product_image" requried/></td>
				 </tr>
				 <tr>
				     <td align="right"><b>Product Price:</b></td>
				     <td><input type="text" name="product_price" requried/></td>
				 </tr>
				 <tr>
				     <td align="right"><b>product  Description:</b></td>
				      <td><textarea name="product_desc" cols="20" rows="10" ></textarea></td>
				 </tr>
				 <tr>
				     <td align="right"><b>Product Keywords:</b></td>
				     <td><input type="text" name="product_keywords"  size="60" requried/></td>
				 </tr>
				 <tr align="center">
				 
				 <td colspan="7"><input type="submit" name="insert_post" value="SUBMIT"/></td>
				 </tr>
				 
			 </table>
		</form>
	</body>
	</html>
	
	<?php
	
	if(isset($_POST['insert_post']))
	{   
		$product_tittle=$_POST['product_tittle'];
		$product_cat=$_POST['product_cat'];
		$product_brand=$_POST['product_brand'];
		$product_price=$_POST['product_price'];
		$product_desc=$_POST['product_desc'];
		$product_keyword=$_POST['product_keywords'];
		$product_image=$_FILES['product_image']['name'];
		$product_image_tmp=$_FILES['product_image'] ['tmp_name'];
		move_uploaded_file($product_image_tmp,"product_images/$product_image");
	     
	  $insert_product="insert into product(product_cat,product_title,product_brand,product_price,product_desc,product_image,product_keywords) values('$product_cat','$product_tittle','$product_brand','$product_price','$product_desc','$product_image','$product_keyword')";
	 
	 $insert_pro=mysqli_query($con,$insert_product);
	 
	
	 if($insert_pro==1)
	 {
		 echo "<script>alert('product has been inserted!')</script>";
		 echo  "<script>window.open('insert_product.php','_self'</script>";
	 }
	 else
	 {
		 echo "error";
	 }
	}
	?>