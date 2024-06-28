<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MusicCorner - Recensioni </title>

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
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
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
					{if count($seller->getReviews()) == 0}
						<h2 class="text-center">Non hai ancora ricevuto recensioni</h2>
					{else}
					<h2 class="text-center">Tutte le recensioni</h2>
					<br>
					<ul class="list-unstyled">
						{foreach from=$seller->getReviews() item=review}
						<li class="review-item mb-4">
							<div class="row">
								<div class="col-md-3">
									<div class="review-heading">
										<h5 class="name">{FPersistentManager::getInstance()->retrieveObj(ECustomer::class,$review->getCustomer())->getShopName()}</h5>
											<div class="review-rating-wide">
												{for $i=0 to $review->getSellerRating()-1}
													<i class="fa fa-star"></i>
												{/for}
												{for $i=$review->getSellerRating() to 4}
													<i class="fa fa-star-o empty"></i>
												{/for}																	
											</div>																																										
									</div>
								</div>
								<div class="col-md-9">
									<div class="review-body">
										<h4 id="center">Recensione relativa a: <span class="album-name"> {FPersistentManager::getInstance()->retrieveObj(EArticleDescription::class,$review->getArticle())->getName()}</span> Formato: <span>{FPersistentManager::getInstance()->retrieveObj(EArticleDescription::class,$review->getArticle())->getFormatString()}</span></h4>
										<p><span class="review-text">class="review-text">{$review->getReviewText()}</span></p>	
									</div>
								</div>
							</div>
						</li>
						<br>
						{/foreach}
					</ul>
					{/if}
					<a href="/MusicCorner/Seller/dashboard" class="btn btn-outline-primary btn-lg dashboard-button-inverse" ><strong>Torna alla dashboard</strong></a>
				</div>
			</div>
		</div>
	</section>

 
     
	<!-- jQuery Plugins -->
	<script src="/MusicCorner/Smarty/templates/js/jquery.min.js"></script>
	<script src="/MusicCorner/Smarty/templates/js/bootstrap.min.js"></script>
	<script src="/MusicCorner/Smarty/templates/js/slick.min.js"></script>
	<script src="/MusicCorner/Smarty/templates/js/nouislider.min.js"></script>
	<script src="/MusicCorner/Smarty/templates/js/jquery.zoom.min.js"></script>
	<script src="/MusicCorner/Smarty/templates/js/main.js"></script>
</body>
</html>
