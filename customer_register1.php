<?php 

if (!isset($_POST['doSubmit'])) {
    die(header("Location: col"));
}

 include('database/db.php');

// Date command
date_default_timezone_set('UTC');
 
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
  
	$webmaster = 'noreply@shweta.com'; //this is optional
	
	$emailsubject= 'Welcome to Our Website.';
	$rName='Shweta';
	$hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.
	
	$body = 
<<<EOF
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	
	<body>
	<p>Dear <span style="color:#060"><b>$c_name</b></span>,</p>
	
	<p>Welcome to our newly redesigned innovative <span style="color:#F00"><i><strong>CollegeMitra!</strong></i></span> It  is in our stature in order for breaking new grounds &amp; by providing  helping hand to develop new innovative ideas  &amp; strengthen skills, policies &amp; practice, we have rebuilt our site to  make it much easier to find &amp; share resources &amp; to enlighten all  accomplishments of knowledge.</p>
	<p>We continue to be inspired by the passion &amp; dedication  we see in practitioners &amp; researchers, program directors and policymakers  that are working on the behalf of students &amp; employees. 
	</p>
	<p><b> OUR MOTTO:</b></p>
	  <p><strong>  One's Adept is never fulfilled</strong><br>
	  <strong>  Until possesses a depth of  knowledge </strong><br>
	  <strong>  Creating one's for own is  worthless</strong><br>
	  <strong>  Falling together in this ocean</strong><br>
	<strong>  Is the real excitement. </strong></p>
	<p>
	Keeping prime motto in mind &amp; work easily accessible, we  have created a more navigable website with additional resources, better tools  &amp; a new visual design to support your interest in the areas of education,  complementary leaving, education reforms &amp; evaluation. </p>
	<p>
	Stay tuned in the up-coming time for new resources in every prospective  areas. We would be adding new email updates to help you for staying up to date to the  latest research &amp; evolution results &amp; new policies and practice  innovation.</p>
	<p>
	We thank you for registering with <span style="color:#090">"$firm"</span> and proud to have you as a part of the  <span style="color:#F00"><i><strong>CollegeMitra</strong></i></span> family. </p>
	<p>
	  Please check your details below: </p>
	<p>---------------------------------------------------------<br>
	<span style="color:#820003">Email ID:&nbsp;</span><span style="color:#090">$c_email</span><br />
	<span style="color:#820003"> Username:</span>&nbsp;<span style="color:#090">$c_name</span><br />
	<span style="color:#820003"> Password:</span>&nbsp;<span style="color:#090">$c_pass</span><br />
	---------------------------------------------------------</p>
	<p>Please click this link <b>"http://www.shweta.com/verify?email=$email&hash=$hash"</b> to activate your account:<br/></p>
	<p>Your given details are highly valuable to us &amp; keeping them secretly is our responsibility, for any queries please feel free to  contact us at <a href="mailto:info@shweta.com" target="_blank">info@collegemitra.com</a>.</p>
	<p>
	Reflecting our long-standing commitment to learning &amp;  continuous improvement, we welcome your feedback as we continue to improve this  site with gravity stage.</p>
	<p>
	We will be glad you to hear from you.</p>
	<p>
	You can visit this link <a href="student.icetl.in/web">Website</a></p>
	<p>
	  Sincerely,<br>
	  Shweta (Founder)<br>
	
	</body>
	</html>    
EOF;

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