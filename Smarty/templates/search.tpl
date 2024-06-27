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

							<!-- Account -->
							<div>
								<a href="/MusicCorner/User/login">
									<i class="fa fa-user-o"></i>
									<span>{$username}</span>
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
					<!-- store products -->
					<div class="row">
						{foreach from=$result item=article}
						{assign var="stocks" value=$article->getStocks()}
							<!-- product -->
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="https://www.ibs.it/images/{$article->getId()}_0_536_0_75.jpg" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">{$article->getArtist()}</p>
										<h3 class="product-name"><a href="/MusicCorner/Search/article/{$article->getId()}">{$article->getName()}</a></h3>
										{if $article->getFormat()==1}
											<p class="product-category">LP</p>
										{else}
											<p class="product-category">CD</p>
										{/if}	
										{if $article->getLowestPrice() == 0}
										<h4 class="product-price">Non in stock</h4>
										{else}
										<h4 class="product-price">€{$article->getLowestPrice()}</h4>
										{/if}
									</div>
									{if $article->getLowestPrice() != 0}
										<form action="/MusicCorner/Orders/addToCart/" method="post">
											<div class="add-to-cart">
												<button class="add-to-cart-btn" name="stockId" value={$stocks[0]->getId()}><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
										</form>
									{/if}
								</div>
							</div>
							<!-- /product -->
						{/foreach}
					</div>
					<!-- /store products -->
				<!-- /STORE -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- jQuery Plugins -->
	<script src="/MusicCorner/Smarty\templates\js/jquery.min.js"></script>
	<script src="/MusicCorner/Smarty\templates\js/bootstrap.min.js"></script>
	<script src="/MusicCorner/Smarty\templates\js/slick.min.js"></script>
	<script src="/MusicCorner/Smarty\templates\js/nouislider.min.js"></script>
	<script src="/MusicCorner/Smarty\templates\js/jquery.zoom.min.js"></script>
	<script src="/MusicCorner/Smarty\templates\js/main.js"></script>

</body>
</html>
