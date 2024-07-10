<?php
/* Smarty version 5.1.0, created on 2024-06-23 18:40:16
  from 'file:home.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_66784ff0a02f63_59114890',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '28d07060916d17f761aa9edad0eb43979b3d4424' => 
    array (
      0 => 'home.tpl',
      1 => 1719160813,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66784ff0a02f63_59114890 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\MusicCorner\\Smarty\\templates';
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

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
						<div class="col-md-3">
							<div class="header-logo">
								<a href="/MusicCorner/" class="logo">
									<img src="/MusicCorner/Smarty/templates/img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form id='search' action="/MusicCorner/Search/search" method="post">
									<input class="input" placeholder="Cerca qui" name="query">
									<button class="search-btn">Cerca</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<?php if ($_smarty_tpl->getValue('customer')) {?>
								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Carrello</span>
										<div class="qty"><?php echo $_smarty_tpl->getValue('cart')->getCartQuantity();?>
</div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
											<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('cart')->getCartItems(), 'quantity', false, 'stock');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('stock')->value => $_smarty_tpl->getVariable('quantity')->value) {
$foreach0DoElse = false;
?>
											<?php $_smarty_tpl->assign('article', FPersistentManager::getInstance()->retrieveObj(EArticleDescription::class,FPersistentManager::getInstance()->retrieveObj(EStock::class,$_smarty_tpl->getValue('stock'))->getArticle()), false, NULL);?>
											<?php $_smarty_tpl->assign('stock', FPersistentManager::getInstance()->retrieveObj(EStock::class,$_smarty_tpl->getValue('stock')), false, NULL);?>	
												<div class="product-widget">
													<div class="product-img">
														<img src="https://www.ibs.it/images/<?php echo $_smarty_tpl->getValue('article')->getId();?>
_0_536_0_75.jpg" alt="">
													</div>
													<div class="product-body">
														<h3 class="product-name"><a href="/MusicCorner/Search/article/<?php echo $_smarty_tpl->getValue('article')->getId();?>
"><?php echo $_smarty_tpl->getValue('article')->getName();?>
</a></h3>
														<h4 class="product-price"><span class="qty"><?php echo $_smarty_tpl->getValue('quantity');?>
x</span>€<?php echo $_smarty_tpl->getValue('stock')->getPrice();?>
</h4>
													</div>
												</div>
											<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
										</div>
										<div class="cart-summary">
											<small><?php echo $_smarty_tpl->getValue('cart')->getCartQuantity();?>
 Item(s) selected</small>
											<h5>SUBTOTAL: €<?php echo $_smarty_tpl->getValue('cart')->getTotalPrice();?>
</h5>
										</div>
										<div class="cart-btns">
											<a href="/MusicCorner/Orders/cart">View Cart</a>
											<a href="/MusicCorner/Orders/checkout">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<?php }?>
								<!-- /Cart -->

								<!-- Wishlist -->
								<div>
									<a href="/MusicCorner/User/login">
										<i class="fa fa-user-o"></i>
										<span><?php echo $_smarty_tpl->getValue('username');?>
</span>
									</a>
								</div>
								<!-- /Wishlist -->

							</div>
							<div>
								<br><br>
							</div>
						</div>
						<!-- /ACCOUNT -->
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
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="/MusicCorner/Smarty/templates/img/CD.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Catalogo<br>CD</h3>
								<a href="/MusicCorner/Search/format/CD" class="cta-btn">COMPRA ORA <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="/MusicCorner/Smarty/templates/img/Vinile.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Catalogo<br>Vinili</h3>
								<a href="/MusicCorner/Search/format/Vinyl" class="cta-btn">COMPRA ORA <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="/MusicCorner/Smarty/templates/img/Cassetta.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Catalogo<br>Cassette</h3>
								<a href="/MusicCorner/Search/format/Cassette" class="cta-btn">COMPRA ORA <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Consigli</h3>
							
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('result'), 'article');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('article')->value) {
$foreach1DoElse = false;
?>
										<?php $_smarty_tpl->assign('stocks', $_smarty_tpl->getValue('article')->getStocks(), false, NULL);?>
										<!-- product -->
										<div class="col-md-4 col-xs-6">
											<div class="product">
												<div class="product-img">
													<img src="https://www.ibs.it/images/<?php echo $_smarty_tpl->getValue('article')->getId();?>
_0_536_0_75.jpg" alt="">
												</div>
												<div class="product-body">
													<p class="product-category"><?php echo $_smarty_tpl->getValue('article')->getArtist();?>
</p>
													<h3 class="product-name"><a href="https://localhost/musiccorner/Search/article/<?php echo $_smarty_tpl->getValue('article')->getId();?>
"><?php echo $_smarty_tpl->getValue('article')->getName();?>
</a></h3>
													<?php if ($_smarty_tpl->getValue('article')->getFormat() == 1) {?>
														<p class="product-category">LP</p>
													<?php } elseif ($_smarty_tpl->getValue('article')->getFormat() == 1) {?>
														<p class="product-category">Cassetta</p>
													<?php } else { ?>
														<p class="product-category">CD</p>
													<?php }?>	
													<?php if ($_smarty_tpl->getValue('article')->getLowestPrice() == 0) {?>
													<h4 class="product-price">Non in stock</h4>
													<?php } else { ?>
													<h4 class="product-price">€<?php echo $_smarty_tpl->getValue('article')->getLowestPrice();?>
</h4>
													<?php }?>
												</div>
												<?php if ($_smarty_tpl->getValue('article')->getLowestPrice() != 0 && $_smarty_tpl->getValue('customer')) {?>
												<form action="/MusicCorner/Orders/addToCart/" method="post">
													<div class="add-to-cart">
														<button class="add-to-cart-btn" name="stockId" value=<?php echo $_smarty_tpl->getValue('stocks')[0]->getId();?>
><i class="fa fa-shopping-cart"></i> add to cart</button>
													</div>
												</form>
												<?php }?>
											</div>
										</div>
										<!-- /product -->
										<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

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
