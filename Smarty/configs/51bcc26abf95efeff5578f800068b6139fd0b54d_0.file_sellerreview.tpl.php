<?php
/* Smarty version 5.1.0, created on 2024-06-26 11:06:29
  from 'file:sellerreview.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_667bda15c88e65_52798660',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '51bcc26abf95efeff5578f800068b6139fd0b54d' => 
    array (
      0 => 'sellerreview.tpl',
      1 => 1719249091,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667bda15c88e65_52798660 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\MusicCorner\\Smarty\\templates';
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MusicCorner - Music for you</title>

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
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /MAIN HEADER -->
	</header>
	<!-- /HEADER -->

	<!-- SHOW SELLER REVIEW -->
	<section id="show-seller-reviews">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="text-center">Tutte le recensioni</h2>
					<br>
					<ul class="list-unstyled">
						<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('seller')->getReviews(), 'review');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('review')->value) {
$foreach0DoElse = false;
?>
						<li class="review-item mb-4">
							<div class="row">
								<div class="col-md-3">
									<div class="review-heading">
										<h5 class="name"><?php echo FPersistentManager::getInstance()->retrieveObj(ECustomer::class,$_smarty_tpl->getValue('review')->getCustomer())->getShopName();?>
</h5>
											<div class="review-rating-wide">
												<?php
$_smarty_tpl->assign('i', null);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->getValue('review')->getSellerRating()-1+1 - (0) : 0-($_smarty_tpl->getValue('review')->getSellerRating()-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
													<i class="fa fa-star"></i>
												<?php }
}
?>
												<?php
$_smarty_tpl->assign('i', null);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 4+1 - ($_smarty_tpl->getValue('review')->getSellerRating()) : $_smarty_tpl->getValue('review')->getSellerRating()-(4)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->getValue('review')->getSellerRating(), $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
													<i class="fa fa-star-o empty"></i>
												<?php }
}
?>																	
											</div>																																										
									</div>
								</div>
								<div class="col-md-9">
									<div class="review-body">
										<h4 id="center">Recensione relativa a: <span class="album-name"> <?php echo FPersistentManager::getInstance()->retrieveObj(EArticleDescription::class,$_smarty_tpl->getValue('review')->getArticle())->getName();?>
</span> Formato: <span><?php echo FPersistentManager::getInstance()->retrieveObj(EArticleDescription::class,$_smarty_tpl->getValue('review')->getArticle())->getFormatString();?>
</span></h4>
										<p><span class="review-text">class="review-text"><?php echo $_smarty_tpl->getValue('review')->getReviewText();?>
</span></p>	
									</div>
								</div>
							</div>
						</li>
						<br>
						<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
				</div>
			</div>
		</div>
	</section>

 
     
	<!-- jQuery Plugins -->
	<?php echo '<script'; ?>
 src="/MusicCorner/Smarty/templates/js/jquery.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="/MusicCorner/Smarty/templates/js/bootstrap.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="/MusicCorner/Smarty/templates/js/slick.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="/MusicCorner/Smarty/templates/js/nouislider.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="/MusicCorner/Smarty/templates/js/jquery.zoom.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="/MusicCorner/Smarty/templates/js/main.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
