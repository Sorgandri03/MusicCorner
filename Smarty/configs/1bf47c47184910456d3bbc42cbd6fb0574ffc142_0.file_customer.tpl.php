<?php
/* Smarty version 5.1.0, created on 2024-07-10 17:19:36
  from 'file:customer.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_668ea68821da90_64053952',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1bf47c47184910456d3bbc42cbd6fb0574ffc142' => 
    array (
      0 => 'customer.tpl',
      1 => 1720620853,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_668ea68821da90_64053952 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\MusicCorner\\Smarty\\templates';
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title><?php echo $_smarty_tpl->getValue('username');?>
 dashboard</title>

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
		</header>
		
		<!-- MAIN HEADER -->
		<div id="header">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- LOGO -->
							<a href="/MusicCorner/" class="logo">
								<img src="/MusicCorner/Smarty/templates/img/biglogo.png" alt="" class="center">
							</a>
					<!-- /LOGO -->																						
				</div>
				<!-- row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /MAIN HEADER -->
	</header>
	<!-- /HEADER -->
	 <!-- CUSTOMER DASHBOARD -->
	<div class="customer-dashboard section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Benvenuto <?php echo $_smarty_tpl->getValue('username');?>
 </h1>
					<ul>
						<li><a href="/MusicCorner/Customer/orders" class="btn btn-outline-primary btn-lg dashboard-button" ><strong>Lista Ordini</strong></a></li>
						<li><a href="/MusicCorner/Customer/customerReviews" class="btn btn-outline-primary btn-lg dashboard-button" ><strong>Lista Recensioni</strong></a></li>
						<li><a href="/MusicCorner/" class="btn btn-outline-primary btn-lg dashboard-button-inverse" ><strong>Torna alla home</strong></a></li>
						<li><a href="/MusicCorner/User/logout" class="btn btn-outline-primary btn-lg dashboard-button-inverse-red" ><strong>Logout</strong></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- /CUSTOMER DASHBOARD -->

</body>
</html><?php }
}
