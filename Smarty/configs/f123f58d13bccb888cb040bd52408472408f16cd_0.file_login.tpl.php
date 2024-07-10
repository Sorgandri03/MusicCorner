<?php
/* Smarty version 5.1.0, created on 2024-07-10 17:19:25
  from 'file:login.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_668ea67ddbd955_78234062',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f123f58d13bccb888cb040bd52408472408f16cd' => 
    array (
      0 => 'login.tpl',
      1 => 1720620853,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_668ea67ddbd955_78234062 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\MusicCorner\\Smarty\\templates';
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Login</title>

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
									<img src="/MusicCorner/Smarty/templates/img/biglogo.png" alt="" class="center">
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
					<div class="container-small">
						<!-- Login Form -->
						<?php if ($_smarty_tpl->getValue('error') == true) {?>
						<p class="error-message">lo username o la password è sbagliata</p>
						<?php }?>
					    <?php if ($_smarty_tpl->getValue('ban') == true) {?>
						<p class="error-message">l'utente a cui stai cercando di loggare è bannato</p>
						<?php }?>
						<form class="login-form" action="/MusicCorner/User/checkLogin" method="post">
							<div class="section-title-center">
								<h1 class="title">Login</h1>
							</div>
							<div class="form-group">
								<input class="input" type="text"  placeholder="Inserisci qui la tua Email" name="email" required>
							</div>
							<div class="form-group">
								<input class="input" type="password"  placeholder="Inserisci qui la tua Password" name="password" required>
                            </div>
							<div class="form-group">
								<button type="submit" class="submit-btn-custom">Entra</button>
								<div>Non hai un account? <a href="/MusicCorner/User/registration" class="centered-link">Registrati</a></div>
							</div>
						<!-- /Login Form -->
						</form>																																
					</div>
				</div>
				<!-- /row -->

			</div>
			<!-- /container  -->
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
