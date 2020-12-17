<?php
session_start();
include_once('include/dbconnect.php');
$query = "SELECT * FROM page_tbl WHERE PageType='contact'";
$result = mysqli_query($con, $query);
$contact_infor = array();
while ($row = mysqli_fetch_assoc($result)) {
	$tem_array = array(
		'pagedesc' => $row['PageDescription'],
		'address' => $row['Address'],
		'email' => $row['Email'],
		'phone' => $row['Phone']
	);
	array_push($contact_infor, $tem_array);
}
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="vi">
<!-- Basic -->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width">

	<!-- Site Metas -->
	<title>Ultraman Company</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="lib/bootstrap/bootstrap.min.css" />
	<!-- Pogo Slider CSS -->
	<link rel="stylesheet" href="lib/pogo-slider/pogo-slider.min.css" />
	<!-- Site CSS -->
	<link rel="stylesheet" href="css/style.css" />
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="css/responsive.css" />
	<!-- Footer CSS -->
	<link rel="stylesheet" href="css/footer.css" />
	<!-- Contact CSS -->
	<link rel="stylesheet" href="css/contact/contact.css" />

</head>

<body id="contact" class="inner_page" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

	<!-- LOADER -->
	<div id="preloader">
		<div class="loader">
			<img src="images/loader.gif" alt="#" />
		</div>
	</div>
	<!-- END LOADER -->

	<!-- ====== HEADER SECTION ====== -->
	<?php include("include/header.php") ?>

	<!-- Start Banner -->
	<div class="section inner_page_header">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="full">
						<h3>Liên hệ</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end Banner -->

	<!-- Map -->
	<div class="map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3295.715150387603!2d106.69761278518709!3d10.789247245392188!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f35548ebbed%3A0x53800e03a8b9b2e!2zNjAgTmd1eeG7hW4gxJDDrG5oIENoaeG7g3UsIMSQYSBLYW8sIFF14bqtbiAxLCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1606558644948!5m2!1svi!2s" aria-hidden="false" tabindex="0">
		</iframe>
	</div>

	<!-- section -->
	<div class="section layout_padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<p class="title">Liên hệ với Ultraman</p>
					<p> <?php echo $contact_infor[0]['pagedesc'] ?> </p>
				</div>
			</div>
			<div class="row margin-top_30">

				<div class="col-lg-7 col-sm-7 col-xs-12 margin-top_30">
					<div class="contact-block">
						<form id="contactForm">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" id="name" name="name" placeholder="Tên" required data-error="Please enter your name">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" placeholder="Email" id="email" class="form-control" name="name" required data-error="Please enter your email">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="text" placeholder="Số điện thoại" id="number" class="form-control" name="number" required data-error="Please enter your number">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<textarea class="form-control" id="message" placeholder="Tin nhắn của bạn" rows="8" data-error="Write your message" required></textarea>
										<div class="help-block with-errors"></div>
									</div>
									<div class="submit-button text-center">
										<button class="btn btn-common" id="submit" type="submit">Gửi tin nhắn</button>
										<div id="msgSubmit" class="h3 text-center hidden"></div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>


				<div class="col-lg-5 col-sm-5 col-xs-12 margin-top_30">
					<div class="left-contact">
						<div class="media cont-line">
							<div class="media-left icon-b">
								<i class="fa fa-location-arrow" aria-hidden="true"></i>
							</div>
							<div class="media-body dit-right">
								<h4>Địa chỉ</h4>
								<p> <?php echo $contact_infor[0]['address'] ?> </p>
							</div>
						</div>
						<div class="media cont-line">
							<div class="media-left icon-b">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</div>
							<div class="media-body dit-right">
								<h4>Email</h4>
								<a href="#"><?php echo $contact_infor[0]['email'] ?></a><br>
								<a href="#"><?php echo $contact_infor[1]['email'] ?></a>
							</div>
						</div>
						<div class="media cont-line">
							<div class="media-left icon-b">
								<i class="fa fa-volume-control-phone" aria-hidden="true"></i>
							</div>
							<div class="media-body dit-right">
								<h4>Số điện thoại</h4>
								<a href="#"><?php echo $contact_infor[0]['phone'] ?></a><br>
								<a href="#"><?php echo $contact_infor[1]['phone'] ?></a>
							</div>
						</div>
					</div>
				</div>


			</div>
		</div>
	</div>
	<!-- end section -->

	<!-- ====== FOOTER ====== -->
	<?php include("include/footer.php") ?>

	<a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a>


	<!-- ALL JS FILES -->
	<script src="lib/bootstrap/jquery.min.js"></script>
	<script src="lib/bootstrap/popper.min.js"></script>
	<script src="lib/bootstrap/bootstrap.min.js"></script>
	<!-- ALL PLUGINS -->
	<script src="js/contact/contact-form-script.js"></script>
	<script src="js/smoothscroll.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/custom.js"></script>
	<script>
		$(document).ready(function() {
			$("a#contact").css("color", "#f2184f");
		})
	</script>

</body>

</html>