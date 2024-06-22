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
							<div>

							</div>
							<!-- Wishlist -->
							<div>
								<a href="/MusicCorner/User/login">
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
	
	<!-- MODIFY STOCK -->
	<section id="modify-stock">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-12">
						<br>
						<h2>Aggiorna Stock</h2>
						<br>
						{foreach from=$seller->getStocks() item=stock}
						{assign var="article" value=FPersistentManager::getInstance()->retrieveObj(EArticleDescription::class,$stock->getArticle())}
						<div class="row">
							<div class="col-md-4">
								<div class="product">
									<div class="product-img">
										<img src="https://www.ibs.it/images/{$article->getId()}_0_536_0_75.jpg" alt="">
									</div>
								</div>
							</div>
							<div class="col-md-8">
								<div class="product-details"></div>
									<br>
									<p class="product-category">{$article->getArtist()}</p>
									<h3 class="product-name"><a href="https://localhost/musiccorner/Search/article/{$article->getId()}">{$article->getName()}</a></h3>
									{if $article->getFormat()==1}
										<p class="product-category">LP</p>
									{elseif $article->getFormat()==1}
										<p class="product-category">Cassetta</p>
									{else}
										<p class="product-category">CD</p>
									{/if}
									<div class="row">
										<div class="col-md-5">
											<smallbr></smallbr>
											<h4 id="right" class="product-qty">Prezzo: €</h4>
										</div>
										<div class="col-md-3">
											<div class="input-number">
												<form action="/MusicCorner/Orders/updateCart/" method="post">
													<input type="number" step="0.01" name="price" value={$stock->getPrice()}>
													<span class="qty-up">+</span>
													<span class="qty-down">-</span>
											</div>
											<smallbr></smallbr>
										</div>
									</div>
									<div class="row">
										<div class="col-md-5">
											<smallbr></smallbr>
											<h4 id="right" class="product-qty">Quantità:</h4>
										</div>
										<div class="col-md-3">
											<div class="input-number">
												<form action="/MusicCorner/Seller/updateStock/" method="post">
													<input type="number" name="quantity" value={$stock->getQuantity()}>
													<span class="qty-up">+</span>
													<span class="qty-down">-</span>
											</div>
											<smallbr></smallbr>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
												<button class="primary-btn-center btn-block" name="stockId" value={$stock->getId()}>Aggiorna</button>
											</form>
										</div>
										<div class="col-md-6">
											<form action="/MusicCorner/Seller/removeFromStock/" method="post">
												<button class="primary-btn-center btn-block" name="stockId" value={$stock->getId()}>Rimuovi</button>
											</form>
										</div>
									</div>
								</div>
							</div>
							<br>
						{/foreach}
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /MODIFY STOCK -->

	<!-- jQuery Plugins -->
	<script src="/MusicCorner/Smarty/templates/js/jquery.min.js"></script>
	<script src="/MusicCorner/Smarty/templates/js/bootstrap.min.js"></script>
	<script src="/MusicCorner/Smarty/templates/js/slick.min.js"></script>
	<script src="/MusicCorner/Smarty/templates/js/nouislider.min.js"></script>
	<script src="/MusicCorner/Smarty/templates/js/jquery.zoom.min.js"></script>
	<script src="/MusicCorner/Smarty/templates/js/main.js"></script>

</body>
</html>
						