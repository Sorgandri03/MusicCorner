<?php
/* Smarty version 5.1.0, created on 2024-06-22 19:55:41
  from 'file:search.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_6677101dd8fcf1_21418734',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8f76264afc9629e4b3460cf999d6f2f82c05555e' => 
    array (
      0 => 'search.tpl',
      1 => 1718882122,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6677101dd8fcf1_21418734 (\Smarty\Template $_smarty_tpl) {
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
									<input class="input" placeholder="Search here" name="query">
									<button class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
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
												<div class="product-widget">
													<div class="product-img">
														<img src="https://www.ibs.it/images/<?php echo FPersistentManager::getInstance()->retrieveObj(EArticleDescription::class,FPersistentManager::getInstance()->retrieveObj(EStock::class,$_smarty_tpl->getValue('stock'))->getArticle())->getId();?>
_0_536_0_75.jpg" alt="">
													</div>
													<div class="product-body">
														<h3 class="product-name"><a href="#"><?php echo FPersistentManager::getInstance()->retrieveObj(EArticleDescription::class,FPersistentManager::getInstance()->retrieveObj(EStock::class,$_smarty_tpl->getValue('stock'))->getArticle())->getName();?>
</a></h3>
														<h4 class="product-price"><span class="qty"><?php echo $_smarty_tpl->getValue('quantity');?>
x</span>€<?php echo FPersistentManager::getInstance()->retrieveObj(EStock::class,$_smarty_tpl->getValue('stock'))->getPrice();?>
</h4>
													</div>
													<button class="delete"><i class="fa fa-close"></i></button>
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
											<a href="#">View Cart</a>
											<a href="#">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<!-- /Cart -->

								<!-- Account -->
								<div>
									<a href="/MusicCorner/User/login">
										<i class="fa fa-user-o"></i>
										<span><?php echo $_smarty_tpl->getValue('username');?>
</span>
									</a>
								</div>
								<!-- /Account -->

								

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
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
					

					<!-- STORE -->
					
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								

								<label>
									Show:
									<select class="input-select">
										<option value="0">20</option>
										<option value="1">50</option>
									</select>
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row">
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
											<h3 class="product-name"><a href="/MusicCorner/Search/article/<?php echo $_smarty_tpl->getValue('article')->getId();?>
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
										<?php if ($_smarty_tpl->getValue('article')->getLowestPrice() != 0) {?>
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
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Showing 20-100 products</span>
							<ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
						<!-- /store bottom filter -->
					
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- jQuery Plugins -->
		<?php echo '<script'; ?>
 src="/MusicCorner/Smarty\templates\js/jquery.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="/MusicCorner/Smarty\templates\js/bootstrap.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="/MusicCorner/Smarty\templates\js/slick.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="/MusicCorner/Smarty\templates\js/nouislider.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="/MusicCorner/Smarty\templates\js/jquery.zoom.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="/MusicCorner/Smarty\templates\js/main.js"><?php echo '</script'; ?>
>

	</body>
</html>
<?php }
}
