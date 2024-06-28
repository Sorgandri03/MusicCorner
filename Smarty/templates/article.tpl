<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>MusicCorner - Articolo</title>

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
								{if $customer}
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
											{assign var="product" value=FPersistentManager::getInstance()->retrieveObj(EArticleDescription::class,FPersistentManager::getInstance()->retrieveObj(EStock::class,$stock)->getArticle())}
											{assign var="stock" value=FPersistentManager::getInstance()->retrieveObj(EStock::class,$stock)}	
												<div class="product-widget">
													<div class="product-img">
														<img src="https://www.ibs.it/images/{$product->getId()}_0_536_0_75.jpg" alt="">
													</div>
													<div class="product-body">
														<h3 class="product-name"><a href="/MusicCorner/Search/article/{$product->getId()}">{$product->getName()}</a></h3>
														<h4 class="product-price"><span class="qty">{$quantity}x</span>€{$stock->getPrice()}</h4>
													</div>
												</div>
											{/foreach}
										</div>
										<div class="cart-summary">
											<small>{$cart->getCartQuantity()} Oggetti nel carrello</small>
											<h5>SUBTOTALE: €{$cart->getTotalPrice()}</h5>
										</div>
										<div class="cart-btns">
											<a href="/MusicCorner/Orders/cart">View Cart</a>
											<a href="/MusicCorner/Orders/checkout">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								{/if}
								<!-- /Cart -->

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
									<img src="https://www.ibs.it/images/{$article->getId()}_0_536_0_75.jpg" alt="">
								</div>
							</div>
						</div>
						<!-- /Product main img -->
					</div>

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<br>
							<h2 class="product-name">{$article->getName()}</h2>
							<p>{$article->getArtist()}</p>
							
							<div>
								{if count($article->getReviews())>0}
								<div class="product-rating">
									{for $i=0 to $article->averageRatingInt()-1}
										<i class="fa fa-star"></i>
									{/for}
									{if $article->averageRatingDecimal() >=0.5}
										<i class="fa fa-star-half-o"></i>
										{for $i=$article->averageRatingInt() to 3}
											<i class="fa fa-star-o empty"></i>
										{/for}
									{else}
										{for $i=$article->averageRatingInt() to 4}
											<i class="fa fa-star-o empty"></i>
										{/for}
									{/if}
								</div>
								{/if}
								<a class="review-link">{count($article->getReviews())} Review(s)</p>
							</div>
							
							

							<div class="product-options">
								{if $article->isInStock()==false}
								<div>
									<span class="product-price">Non in stock</span>
								</div>
								</div>				
								{else}
								<div>
									<h4 class="product-price">€{$article->getLowestPrice()}</h4>
									<span class="product-available">In Stock</span>
								</div>
								<label>
									Negozi&nbsp&nbsp
									<form action="/MusicCorner/Orders/addToCart/" method="post">
									<select class="store-select" name="stockId">
										{foreach from=$article->getStocks() item=stock}
										<option value={$stock->getId()}>{FPersistentManager::getInstance()->retrieveObj(ESeller::class,$stock->getSeller())->getShopName()} : €{$stock->getPrice()}</option>
										{/foreach}	
									</select>
									<button class="add-to-cart-btn" formaction="/MusicCorner/Search/store"><i class="fa fa-shopping-bag"></i>Vai al negozio</button>
								</label>
								
							</div>
							
							{if $customer}
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
							{/if}
							{/if}
							

							<ul class="product-links">
								<li>Formato</li>
								{if $article->getFormat()==1}
									<li><a href="/MusicCorner/Search/format/Vinyl">LP</a></li>
								{elseif $article->getFormat()==1}
									<li><a href="/MusicCorner/Search/format/Cassette">Cassetta</a></li>
								{else}
									<li><a href="/MusicCorner/Search/format/CD">CD</a></li>
								{/if}								
							</ul>
						</div>
					</div>
					<!-- /Product details -->
					

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab3">Reviews ({count($article->getReviews())})</a></li>
							</ul>
							<!-- /product tab nav -->
								<!-- tab3  -->
								<div id="tab3" class="tab-pane fade in">
									<div class="row">
										{if count($article->getReviews()) == 0}
											<title class="title">Non ci sono recensioni per questo prodotto</title>
										{else}
										<!-- Rating -->
										<div class="col-md-3">
											<div id="rating">
												<div class="rating-avg">
													<span>{number_format($article->averageRatingInt() + $article->averageRatingDecimal(),1)}</span>
													<div class="rating-stars">
														{for $i=0 to $article->averageRatingInt()-1}
															<i class="fa fa-star"></i>
														{/for}
														{if $article->averageRatingDecimal() >=0.5}
															<i class="fa fa-star-half-o"></i>
															{for $i=$article->averageRatingInt() to 3}
																<i class="fa fa-star-o empty"></i>
															{/for}
														{else}
															{for $i=$article->averageRatingInt() to 4}
																<i class="fa fa-star-o empty"></i>
															{/for}
														{/if}
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
															<div style="width: {100 * $article->fivestars() / count($article->getReviews())}%;"></div>
														</div>
														<span class="sum">{$article->fivestars()}</span>
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
															<div style="width: {100 * $article->fourstars() / count($article->getReviews())}%;"></div>
														</div>
														<span class="sum">{$article->fourstars()}</span>
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
															<div style="width: {100 * $article->threestars() / count($article->getReviews())}%;"></div>
														</div>
														<span class="sum">{$article->threestars()}</span>
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
															<div style="width: {100 * $article->twostars() / count($article->getReviews())}%;"></div>
														</div>
														<span class="sum">{$article->twostars()}</span>
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
															<div style="width: {100 * $article->onestar() / count($article->getReviews())}%;"></div>
														</div>
														<span class="sum">{$article->onestar()}</span>
													</li>
												</ul>
											</div>
										</div>
										<!-- /Rating -->

										<!-- Reviews -->
										<div class="col-md-7">
											<div id="reviews">
												<ul class="reviews">
													{foreach $article->getReviews() as $review}
														<li class="review-item mb-7">
															<div class="review-heading">
																<h5 class="name">{$review->getCustomer()}</h5>
																<div class="review-rating">
																	{for $i=0 to $review->getArticleRating()-1}
																		<i class="fa fa-star"></i>
																	{/for}
																	{for $i=$review->getarticleRating() to 4}
																		<i class="fa fa-star-o empty"></i>
																	{/for}																	
																</div>
															</div>
															<div class="review-body">
																<p>{$review->getReviewText()}</p>
															</div>
														</li>
													{/foreach}
												</ul>
											</div>
										</div>
										<!-- /Reviews -->
										{/if}
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
							<h3 class="title">Altro di {$article->getArtist()}</h3>
						</div>
					</div>

					<!-- product -->
					{foreach from=FArticleDescription::getArticlesByArtist($article->getArtist()) item=product}
					{assign var="stocks" value=$product->getStocks()}
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="https://www.ibs.it/images/{$product->getId()}_0_536_0_75.jpg" alt="">
							</div>
							<div class="product-body">
								<p class="product-category">{$product->getArtist()}</p>
								<h3 class="product-name"><a href="/MusicCorner/Search/article/{$product->getId()}#">{$product->getName()}</a></h3>
								<p class="product-category">{$Format[$product->getFormat()]}</p>
								<br>
								{if $product->isInStock()==false}
								<h4 class="product-price">Non in stock</h4>
								{else}
								<h4 class="product-price">€{$product->getLowestPrice()}</h4>
								{/if}
								<div class="product-rating">
								</div>
							</div>
							{if $product->isInStock()}
								<form action="/MusicCorner/Orders/addToCart/" method="post">
									<div class="add-to-cart">
										<button class="add-to-cart-btn" name="stockId" value={$stocks[0]->getId()}><i class="fa fa-shopping-cart"></i> add to cart</button>
									</div>
								</form>
							{/if}
						</div>
					</div>
					{/foreach}
					<!-- /product -->

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->

		<!-- jQuery Plugins -->
		<script src="/MusicCorner/Smarty/templates/js/jquery.min.js"></script>
		<script src="/MusicCorner/Smarty/templates/js/bootstrap.min.js"></script>
		<script src="/MusicCorner/Smarty/templates/js/slick.min.js"></script>
		<script src="/MusicCorner/Smarty/templates/js/nouislider.min.js"></script>
		<script src="/MusicCorner/Smarty/templates/js/jquery.zoom.min.js"></script>
		<script src="/MusicCorner/Smarty/templates/js/main.js"></script>
		

	</body>
</html>
