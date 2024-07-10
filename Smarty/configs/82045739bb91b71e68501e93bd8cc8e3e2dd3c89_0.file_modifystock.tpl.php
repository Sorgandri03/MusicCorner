<?php
/* Smarty version 5.1.0, created on 2024-06-23 17:27:56
  from 'file:modifystock.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_66783efc7c7077_75559660',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '82045739bb91b71e68501e93bd8cc8e3e2dd3c89' => 
    array (
      0 => 'modifystock.tpl',
      1 => 1719140811,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66783efc7c7077_75559660 (\Smarty\Template $_smarty_tpl) {
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

	<!-- MODIFY STOCK -->
	<section id="modify-stock">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<br>
					<h2>Aggiorna Stock</h2>
					<br>
					<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('seller')->getStocks(), 'stock');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('stock')->value) {
$foreach0DoElse = false;
?>
					<?php $_smarty_tpl->assign('article', FPersistentManager::getInstance()->retrieveObj(EArticleDescription::class,$_smarty_tpl->getValue('stock')->getArticle()), false, NULL);?>
					<div class="row mb-4">
						<div class="col-md-4">
							<div class="product">
								<div class="product-img">
									<img src="https://www.ibs.it/images/<?php echo $_smarty_tpl->getValue('article')->getId();?>
_0_536_0_75.jpg" alt="">
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<div class="product-details">
								<p class="product-category"><?php echo $_smarty_tpl->getValue('article')->getArtist();?>
</p>
								<h3 class="product-name"><a href="https://localhost/musiccorner/Search/article/<?php echo $_smarty_tpl->getValue('article')->getId();?>
"><?php echo $_smarty_tpl->getValue('article')->getName();?>
</a></h3>
								<?php if ($_smarty_tpl->getValue('article')->getFormat() == 1) {?>
									<p class="product-category">LP</p>
								<?php } elseif ($_smarty_tpl->getValue('article')->getFormat() == 2) {?>
									<p class="product-category">Cassetta</p>
								<?php } else { ?>
									<p class="product-category">CD</p>
								<?php }?>
								<form action="/MusicCorner/Seller/updateStock/" method="post">
									<h4 class="product-price">€ <input type="number" id="price" name="price" step="0.01" value="<?php echo $_smarty_tpl->getValue('stock')->getPrice();?>
"></h4>
									<br>
									<div class="row">
										<div class="col-md-5">
											<smallbr></smallbr>
											<h4 id="right" class="product-qty">Quantità:</h4>
										</div>
										<div class="col-md-3">
											<div class="input-number">
												<input type="number" name="quantity" value="<?php echo $_smarty_tpl->getValue('stock')->getQuantity();?>
">
											</div>
											<smallbr></smallbr>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<button class="primary-btn-center btn-block" name="stockId" value="<?php echo $_smarty_tpl->getValue('stock')->getId();?>
">Aggiorna</button>
										</div>
										<div class="col-md-6">
											<form action="/MusicCorner/Seller/removeFromStock/" method="post">
												<button class="primary-btn-center btn-block" name="stockId" value="<?php echo $_smarty_tpl->getValue('stock')->getId();?>
">Rimuovi</button>
											</form>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
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
