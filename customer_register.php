<?php
session_start();
include("include/dp.php");
include("functions/functions.php");
?>
<?php
 if(isset($_POST['register']))
 {
	$ip=getIp();
    $c_name=$_POST['c_name'];
	$c_email=$_POST['c_email'];	
	$c_pass=$_POST['c_pass'];	
	$c_image=$_FILES['c_image']['name'];
    $c_image_tmp=$_FILES['c_image']['tmp_name'];	 
	$c_country=$_POST['c_country'];	
	$c_city=$_POST['c_city'];	
    $c_contact=$_POST['c_contact'];
    $c_address=$_POST['c_address'];
     move_uploaded_file($c_image_tmp,"customer/customer_image/$c_image");
   $insert_c ="insert into customers(customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image) 
	values('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";	 
 
  $run_c=mysqli_query($con,$insert_c);
  $sel_cart="select * from cart where ip_add='$ip'";
  $run_cart=mysqli_query($con,$sel_cart);
  $check_cart=mysqli_num_rows($run_cart);
  if($check_cart==0)
  {
	 $_SESSION['customer_email']=$c_email; 
	 $_SESSION['customer_name']=$c_name; 
	  echo "<script>alert('Registration Successful!')</script>";
      echo "<script> window.open('customer/my_account.php','_self')</script>";
  }
  else
  {
	  
   $_SESSION['customer_email']=$c_email; 
   $_SESSION['customer_name']=$c_name; 
	  echo "<script>alert('Registration Successful!')</script>";
      echo "<script> window.open('grid.php','_self')</script>";
  }
 }
?>
	   