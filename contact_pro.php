<?php
session_start();
include("include/dp.php");
include("functions/functions.php");
?>
<?php
 if(isset($_POST['send']))
 {
	$ip=getIp();
    $c_name=$_POST['c_name'];
	$c_email=$_POST['c_email'];		
    $c_contact=$_POST['c_contact'];
    $c_text=$_POST['c_text'];
    
   $insert_c ="insert into contact_us(user_name,user_email,user_contact,user_text) 
	values('$c_name','$c_email','$c_contact','$c_text')";	 
 
  $run_c=mysqli_query($con,$insert_c);
  
	  echo "<script>alert('SEND MESSAGE!')</script>";
     echo "<script> window.open('index.php','_self')</script>";
  }
 
?>
	   