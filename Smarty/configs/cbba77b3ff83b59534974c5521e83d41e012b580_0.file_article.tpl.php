<?php
/* Smarty version 5.1.0, created on 2024-06-24 13:02:31
  from 'file:article.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_667952474247d4_98587309',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cbba77b3ff83b59534974c5521e83d41e012b580' => 
    array (
      0 => 'article.tpl',
      1 => 1719226751,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667952474247d4_98587309 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\MusicCorner\\Smarty\\templates';
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>MusicCorner - Music for you - Article</title>

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
											<?php $_smarty_tpl->assign('cartarticle', FPersistentManager::getInstance()->retrieveObj(EArticleDescription::class,FPersistentManager::getInstance()->retrieveObj(EStock::class,$_smarty_tpl->getValue('stock'))->getArticle()), false, NULL);?>
											<?php $_smarty_tpl->assign('stock', FPersistentManager::getInstance()->retrieveObj(EStock::class,$_smarty_tpl->getValue('stock')), false, NULL);?>	
												<div class="product-widget">
													<div class="product-img">
														<img src="https://www.ibs.it/images/<?php echo $_smarty_tpl->getValue('cartarticle')->getId();?>
_0_536_0_75.jpg" alt="">
													</div>
													<div class="product-body">
														<h3 class="product-name"><a href="#"><?php echo $_smarty_tpl->getValue('cartarticle')->getName();?>
</a></h3>
														<h4 class="product-price"><span class="qty"><?php echo $_smarty_tpl->getValue('quantity');?>
x</span>€<?php echo $_smarty_tpl->getValue('stock')->getPrice();?>
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
											<a href="/MusicCorner/Orders/cart">View Cart</a>
											<a href="#">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<!-- /Cart -->

                            
								<!-- Account -->
								<div>
									<a href="../../User/login">
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
					<div class="col-md-7">
						<!-- Product main img -->
						<div class="col-lg-10">
							<div id="product-main-img">
								<div class="product-preview">
									<img src="https://www.ibs.it/images/<?php echo $_smarty_tpl->getValue('article')->getId();?>
_0_536_0_75.jpg" alt="">
								</div>
							</div>
						</div>
						<!-- /Product main img -->
					</div>

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<br>
							<h2 class="product-name"><?php echo $_smarty_tpl->getValue('article')->getName();?>
</h2>
							<p><?php echo $_smarty_tpl->getValue('article')->getArtist();?>
</p>
							
							<div>
								<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('article')->getReviews()) > 0) {?>
								<div class="product-rating">
									<?php
$_smarty_tpl->assign('i', null);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->getValue('article')->averageRatingInt()-1+1 - (0) : 0-($_smarty_tpl->getValue('article')->averageRatingInt()-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
										<i class="fa fa-star"></i>
									<?php }
}
?>
									<?php if ($_smarty_tpl->getValue('article')->averageRatingDecimal() >= 0.5) {?>
										<i class="fa fa-star-half-o"></i>
										<?php
$_smarty_tpl->assign('i', null);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 3+1 - ($_smarty_tpl->getValue('article')->averageRatingInt()) : $_smarty_tpl->getValue('article')->averageRatingInt()-(3)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->getValue('article')->averageRatingInt(), $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
											<i class="fa fa-star-o empty"></i>
										<?php }
}
?>
									<?php } else { ?>
										<?php
$_smarty_tpl->assign('i', null);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 4+1 - ($_smarty_tpl->getValue('article')->averageRatingInt()) : $_smarty_tpl->getValue('article')->averageRatingInt()-(4)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->getValue('article')->averageRatingInt(), $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
											<i class="fa fa-star-o empty"></i>
										<?php }
}
?>
									<?php }?>
								</div>
								<?php }?>
								<a class="review-link"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('article')->getReviews());?>
 Review(s)</p>
							</div>
							
							

							<div class="product-options">
								<?php if ($_smarty_tpl->getValue('article')->getLowestPrice() == 0) {?>
								<div>
									<span class="product-unavailable">Non in stock</span>
								</div>
							</div>				
								<?php } else { ?>
								<div>
									<h4 class="product-price">€<?php echo $_smarty_tpl->getValue('article')->getLowestPrice();?>
</h4>
									<span class="product-available">In Stock</span>
								</div>
								<label>
									Negozi&nbsp&nbsp
									<form action="/MusicCorner/Orders/addToCart/" method="post">
									<select class="store-select" name="stockId">
										<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('article')->getStocks(), 'stock');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('stock')->value) {
$foreach1DoElse = false;
?>
										<option value=<?php echo $_smarty_tpl->getValue('stock')->getId();?>
><?php echo FPersistentManager::getInstance()->retrieveObj(ESeller::class,$_smarty_tpl->getValue('stock')->getSeller())->getShopName();?>
 : €<?php echo $_smarty_tpl->getValue('stock')->getPrice();?>
</option>
										<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>	
									</select>
									<button class="add-to-cart-btn" formaction="/MusicCorner/Search/store"><i class="fa fa-shopping-bag"></i>Vai al negozio</button>
								</label>
								
							</div>
							

							<div class="add-to-cart">
								<div class="qty-label">
									Quantità&nbsp&nbsp
									<div class="input-number">
										<input type="number" name="quantity" value="1">
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
								</div>
								
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Aggiungi al carrello</button>
								</form>
							</div>
							<?php }?>
							

							<ul class="product-links">
								<li>Formato</li>
								<?php if ($_smarty_tpl->getValue('article')->getFormat() == 1) {?>
									<li><a href="/MusicCorner/Search/format/Vinyl">LP</a></li>
								<?php } elseif ($_smarty_tpl->getValue('article')->getFormat() == 1) {?>
									<li><a href="/MusicCorner/Search/format/Cassette">Cassetta</a></li>
								<?php } else { ?>
									<li><a href="/MusicCorner/Search/format/CD">CD</a></li>
								<?php }?>								
							</ul>
						</div>
					</div>
					<!-- /Product details -->
					

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab3">Reviews (<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('article')->getReviews());?>
)</a></li>
							</ul>
							<!-- /product tab nav -->
								<!-- tab3  -->
								<div id="tab3" class="tab-pane fade in">
									<div class="row">
										<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('article')->getReviews()) == 0) {?>
											<title class="title">Non ci sono recensioni per questo prodotto</title>
										<?php } else { ?>
										<!-- Rating -->
										<div class="col-md-3">
											<div id="rating">
												<div class="rating-avg">
													<span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('article')->averageRatingInt()+$_smarty_tpl->getValue('article')->averageRatingDecimal(),1);?>
</span>
													<div class="rating-stars">
														<?php
$_smarty_tpl->assign('i', null);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->getValue('article')->averageRatingInt()-1+1 - (0) : 0-($_smarty_tpl->getValue('article')->averageRatingInt()-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
															<i class="fa fa-star"></i>
														<?php }
}
?>
														<?php if ($_smarty_tpl->getValue('article')->averageRatingDecimal() >= 0.5) {?>
															<i class="fa fa-star-half-o"></i>
															<?php
$_smarty_tpl->assign('i', null);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 3+1 - ($_smarty_tpl->getValue('article')->averageRatingInt()) : $_smarty_tpl->getValue('article')->averageRatingInt()-(3)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->getValue('article')->averageRatingInt(), $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
																<i class="fa fa-star-o empty"></i>
															<?php }
}
?>
														<?php } else { ?>
															<?php
$_smarty_tpl->assign('i', null);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 4+1 - ($_smarty_tpl->getValue('article')->averageRatingInt()) : $_smarty_tpl->getValue('article')->averageRatingInt()-(4)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->getValue('article')->averageRatingInt(), $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
																<i class="fa fa-star-o empty"></i>
															<?php }
}
?>
														<?php }?>
													</div>
												</div>
												<ul class="rating">
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
														</div>
														<div class="rating-progress">
															<div style="width: <?php echo 100*$_smarty_tpl->getValue('article')->fivestars()/$_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('article')->getReviews());?>
%;"></div>
														</div>
														<span class="sum"><?php echo $_smarty_tpl->getValue('article')->fivestars();?>
</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width: <?php echo 100*$_smarty_tpl->getValue('article')->fourstars()/$_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('article')->getReviews());?>
%;"></div>
														</div>
														<span class="sum"><?php echo $_smarty_tpl->getValue('article')->fourstars();?>
</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width: <?php echo 100*$_smarty_tpl->getValue('article')->threestars()/$_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('article')->getReviews());?>
%;"></div>
														</div>
														<span class="sum"><?php echo $_smarty_tpl->getValue('article')->threestars();?>
</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width: <?php echo 100*$_smarty_tpl->getValue('article')->twostars()/$_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('article')->getReviews());?>
%;"></div>
														</div>
														<span class="sum"><?php echo $_smarty_tpl->getValue('article')->twostars();?>
</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width: <?php echo 100*$_smarty_tpl->getValue('article')->onestar()/$_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('article')->getReviews());?>
%;"></div>
														</div>
														<span class="sum"><?php echo $_smarty_tpl->getValue('article')->onestar();?>
</span>
													</li>
												</ul>
											</div>
										</div>
										<!-- /Rating -->

										<!-- Reviews -->
										<div class="col-md-7">
											<div id="reviews">
												<ul class="reviews">
													<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('article')->getReviews(), 'review');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('review')->value) {
$foreach2DoElse = false;
?>
														<li class="review-item mb-7">
															<div class="review-heading">
																<h5 class="name"><?php echo $_smarty_tpl->getValue('review')->getCustomer();?>
</h5>
																<div class="review-rating">
																	<?php
$_smarty_tpl->assign('i', null);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->getValue('review')->getArticleRating()-1+1 - (0) : 0-($_smarty_tpl->getValue('review')->getArticleRating()-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
																		<i class="fa fa-star"></i>
																	<?php }
}
?>
																	<?php
$_smarty_tpl->assign('i', null);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 4+1 - ($_smarty_tpl->getValue('review')->getarticleRating()) : $_smarty_tpl->getValue('review')->getarticleRating()-(4)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->getValue('review')->getarticleRating(), $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
																		<i class="fa fa-star-o empty"></i>
																	<?php }
}
?>																	
																</div>
															</div>
															<div class="review-body">
																<p><?php echo $_smarty_tpl->getValue('review')->getReviewText();?>
</p>
															</div>
														</li>
													<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
												</ul>
											</div>
										</div>
										<!-- /Reviews -->
										<?php }?>
									</div>
								</div>
								<!-- /tab3  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Altro di <?php echo $_smarty_tpl->getValue('article')->getArtist();?>
</h3>
						</div>
					</div>

					<!-- product -->
					<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, FArticleDescription::getArticlesByArtist($_smarty_tpl->getValue('article')->getArtist()), 'product');
$foreach3DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('product')->value) {
$foreach3DoElse = false;
?>
					<?php $_smarty_tpl->assign('stocks', $_smarty_tpl->getValue('product')->getStocks(), false, NULL);?>
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="https://www.ibs.it/images/<?php echo $_smarty_tpl->getValue('product')->getId();?>
_0_536_0_75.jpg" alt="">
							</div>
							<div class="product-body">
								<p class="product-category"><?php echo $_smarty_tpl->getValue('product')->getArtist();?>
</p>
								<h3 class="product-name"><a href="/MusicCorner/Search/article/<?php echo $_smarty_tpl->getValue('product')->getId();?>
#"><?php echo $_smarty_tpl->getValue('product')->getName();?>
</a></h3>
								<p class="product-category"><?php echo $_smarty_tpl->getValue('Format')[$_smarty_tpl->getValue('product')->getFormat()];?>
</p>
								<br>
								<?php if ($_smarty_tpl->getValue('product')->getLowestPrice() == 0) {?>
								<h4 class="product-price">Non in stock</h4>
								<?php } else { ?>
								<h4 class="product-price">€<?php echo $_smarty_tpl->getValue('product')->getLowestPrice();?>
</h4>
								<?php }?>
								<div class="product-rating">
								</div>
							</div>
							<?php if ($_smarty_tpl->getValue('product')->getLowestPrice() != 0) {?>
								<form action="/MusicCorner/Orders/addToCart/" method="post">
									<div class="add-to-cart">
										<button class="add-to-cart-btn" name="stockId" value=<?php echo $_smarty_tpl->getValue('stocks')[0]->getId();?>
><i class="fa fa-shopping-cart"></i> add to cart</button>
									</div>
								</form>
							<?php }?>
						</div>
					</div>
					<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
					<!-- /product -->

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->

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
