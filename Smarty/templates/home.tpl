<!DOCTYPE html>
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
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
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
										<div class="qty">{$cart->getCartQuantity()}</div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
											{foreach from=$cart->getCartItems() item=quantity key=stock}
												<div class="product-widget">
													<div class="product-img">
														<img src="https://www.ibs.it/images/{FPersistentManager::getInstance()->retrieveObj(EArticleDescription::class,FPersistentManager::getInstance()->retrieveObj(EStock::class,$stock)->getArticle())->getId()}_0_536_0_75.jpg" alt="">
													</div>
													<div class="product-body">
														<h3 class="product-name"><a href="#">{FPersistentManager::getInstance()->retrieveObj(EArticleDescription::class,FPersistentManager::getInstance()->retrieveObj(EStock::class,$stock)->getArticle())->getName()}</a></h3>
														<h4 class="product-price"><span class="qty">{$quantity}x</span>€{FPersistentManager::getInstance()->retrieveObj(EStock::class,$stock)->getPrice()}</h4>
													</div>
													<button class="delete"><i class="fa fa-close"></i></button>
												</div>
											{/foreach}
										</div>
										<div class="cart-summary">
											<small>{$cart->getCartQuantity()} Item(s) selected</small>
											<h5>SUBTOTAL: €{$cart->getTotalPrice()}</h5>
										</div>
										<div class="cart-btns">
											<a href="#">View Cart</a>
											<a href="#">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<!-- /Cart -->

								<!-- Wishlist -->
								<div>
									<a href="./User/login">
										<i class="fa fa-user-o"></i>
										<span>{$username}</span>
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
										{foreach from=$result item=article}
										<!-- product -->
										<div class="col-md-4 col-xs-6">
											<div class="product">
												<div class="product-img">
													<img src="https://www.ibs.it/images/{$article->getId()}_0_536_0_75.jpg" alt="">
												</div>
												<div class="product-body">
													<p class="product-category">{$article->getArtist()}</p>
													<h3 class="product-name"><a href="https://localhost/musiccorner/Search/article/{$article->getId()}">{$article->getName()}</a></h3>
													{if $article->getFormat()==1}
														<p class="product-category">LP</p>
													{elseif $article->getFormat()==1}
														<p class="product-category">Cassetta</p>
													{else}
														<p class="product-category">CD</p>
													{/if}	
													{if $article->getLowestPrice() == 0}
													<h4 class="product-price">Non in stock</h4>
													{else}
													<h4 class="product-price">€{$article->getLowestPrice()}</h4>
													{/if}
												</div>
												<div class="add-to-cart">
													<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
												</div>
											</div>
										</div>
										<!-- /product -->
										{/foreach}
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


		<!-- FOOTER -->
		<footer id="footer">
			<!-- bottom footer -->
			<div id="fixed-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This website was made by Andrea Sorge, Leonardo Pinterpe and Gianmarco Cavuoto</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="/MusicCorner/Smarty/templates/js/jquery.min.js"></script>
		<script src="/MusicCorner/Smarty/templates/js/bootstrap.min.js"></script>
		<script src="/MusicCorner/Smarty/templates/js/slick.min.js"></script>
		<script src="/MusicCorner/Smarty/templates/js/nouislider.min.js"></script>
		<script src="/MusicCorner/Smarty/templates/js/jquery.zoom.min.js"></script>
		<script src="/MusicCorner/Smarty/templates/js/main.js"></script>

	</body>
</html>
