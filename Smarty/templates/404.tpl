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
									<img src="/MusicCorner/Smarty/templates/img/hhh.png" alt="">
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

        
        <!-- BREADCRUMB -->
        <div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">ERRORE 404</h3>
						<ul class="breadcrumb-tree">
							<li>Non abbiamo trovato la pagina che cercavi</li>
							
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
        <!-- /BREADCRUMB -->

		<!-- jQuery Plugins -->
		<script src="/MusicCorner/Smarty/templates/js/jquery.min.js"></script>
		<script src="/MusicCorner/Smarty/templates/js/bootstrap.min.js"></script>
		<script src="/MusicCorner/Smarty/templates/js/slick.min.js"></script>
		<script src="/MusicCorner/Smarty/templates/js/nouislider.min.js"></script>
		<script src="/MusicCorner/Smarty/templates/js/jquery.zoom.min.js"></script>
		<script src="/MusicCorner/Smarty/templates/js/main.js"></script>

	</body>
</html>
