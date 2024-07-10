<?php
/* Smarty version 5.1.0, created on 2024-06-22 13:03:42
  from 'file:registrationseller.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_6676af8ef388a1_22460310',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '362b2e13437e5342aa4705eae77122c64a751ef0' => 
    array (
      0 => 'registrationseller.tpl',
      1 => 1718898415,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6676af8ef388a1_22460310 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\MusicCorner\\Smarty\\templates';
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Seller Registration</title>

 		<!-- Google font -->
 		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

 		<!-- Bootstrap -->
 		<link type="text/css" rel="stylesheet" href="/MusicCorner/Smarty/templates/css/bootstrap.min.css"/>

 		<!-- Slick -->
 		<link type="text/css" rel="stylesheet" href="/MusicCorner/Smarty/templates/css/slick.css"/>
 		<link type="text/css" rel="stylesheet" href="/MusicCorner/Smarty/templates/css/slick-theme.css"/>

 		<!-- nouislider -->
 		<link type="text/css" rel="stylesheet" href="/MusicCorner/Smarty/templates/css/nouislider.min.css"/>

 		<!-- Font Awesome Icon -->
 		<link rel="stylesheet" href="/MusicCorner/Smarty/templates/css/font-awesome.min.css">

 		<!-- Custom stlylesheet -->
 		<link type="text/css" rel="stylesheet" href="/MusicCorner/Smarty/templates/css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"><?php echo '</script'; ?>
>
		  <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
		<![endif]-->

    </head>
	<body>
		<!-- HEADER -->
		<header>
		    <!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
								<a href="/MusicCorner/" class="logo">
									<img src="/MusicCorner/Smarty/templates/img/biglogo.png" alt="" class="center"  >
								</a>
						<!-- /LOGO -->																						
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Registration Form -->
					<div class="container-small">
						<div class="section-title-center">
							<h1 class="title">Register to our site!</h1>
						</div>
						<form class="registration-form" action="/MusicCorner/User/registrationSeller" method="post">
							<div class="form-group">
								<input class="input" type="text" name="shopname" placeholder="Shopname" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="email" placeholder="Email" required>
							</div>
							<div class="form-group">
								<input class="input" type="password" name="password" placeholder="Password" required>
							</div>
							<div class="form-group">
								<input class="input" type="password" name="confirm-password" placeholder="Confirm Password" required>
							</div>
							<div class="form-group">
								<button type="submit" class="submit-btn-custom">Register</button>
								<a href="/MusicCorner/User/login" class="centered-link">Return to login page</a>
							</div>
						</form>
						<!-- /Registration Form -->
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
						
		<!-- jQuery Plugins -->
		<?php echo '<script'; ?>
 src="js/jquery.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="js/bootstrap.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="js/slick.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="js/nouislider.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="js/jquery.zoom.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="js/main.js"><?php echo '</script'; ?>
>

	

</body></html><?php }
}
