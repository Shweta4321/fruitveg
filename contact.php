<?php include "./include/header.php"; ?>
	<!-- End Header -->
	<section id="content">
		<div class="container">
			<div class="content-page">
				<div class="contact-map border">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d151986.00533938778!2d-2.3636687929445515!3d53.472367954780005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487a4d4c5226f5db%3A0xd9be143804fe6baa!2sManchester%2C+UK!5e0!3m2!1sen!2s!4v1472467262148" style="border:0" allowfullscreen="" width="1170" height="380"></iframe>
				</div>
				<div class="contact-info-page">
					<div class="list-contact-info">
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-12">
								<div class="item-contact-info text-center">
									<a class="contact-icon color wobble-horizontal" href="#"><i class="fa fa-mobile"></i></a>
									<h2 class="title18 text-upperrcase font-bold">Shweta Jacker: <a href="#">9408594205</a></h2>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<div class="item-contact-info text-center">
									<a class="contact-icon color wobble-horizontal" href="#"><i class="fa fa-phone"></i></a>
									<h2 class="title18 text-upperrcase font-bold">Shashi Bhushan: <a href="#">9408594205</a></h2>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<div class="item-contact-info text-center">
									<a class="contact-icon color wobble-horizontal" href="mailto:7uptheme@gmail.com"><i class="fa fa-envelope"></i></a>
									<h2 class="title18 text-upperrcase font-bold"><a href="mailto:7uptheme@gmail.com">201552042@gmail.com</a></h2>
								</div>
							</div>
						</div>
					</div>
					<p class="desc">If the supplier fails to ship your products on time or the product quality does not meet the standards set in your contract, Aloshop will refund the covered amount of your payment.</p>
				</div>
				<div class="contact-form-page">
					<h2 class="title30 text-uppercase font-bold">contact from</h2>
					<div class="form-contact">
						<form  action="contact_pro.php"  method="post"  enctype="multipart/form-data"">

							<div class="row">
								<div class="col-md-4 col-sm-4 col-xs-12">
									 <input type="text" class="form-control"  name="c_name" value="name"
                                   onfocus="if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" />
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<input type="text" name="c_email" class="form-control"  value="Email" onfocus="if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" type="text">
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<input type="text" name="c_contact" class="form-control" value="Contact" onfocus="if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" type="text">
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<input type="text" name="c_text" class="form-control" value="Message" onfocus="if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" type="text">
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<input type="submit" name="send" value="Send" class="shop-button"/>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>	
			<!-- End Content Page -->
		</div>
	</section>
	<!-- End Content -->
	
<?php include "./include/footer.php"; ?>
</body>


</html>