<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MusicCorner</title>

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
	<br>
	<!-- SHOW SELLER AND CUSTOMER REVIEW -->
	<section id="show-all-reviews">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					{if count($reviews)>0}
						<h1 class="text-center">Tutte le recensioni: </h1>
						<br>
						<ul class="list-unstyled">
							{foreach from=$reviews item=review}
							{assign var="sellershopname" value=FPersistentManager::getInstance()->retrieveObj(ESeller::class,$review->getSeller())}
							{assign var="customerusername" value=FPersistentManager::getInstance()->retrieveObj(ECustomer::class,$review->getCustomer())}

							<li class="review-item mb-4">
								<div class="row">
									<div class="col-md-4">
										<div class="review-heading">
											<p id="justified">Venditore: <span class="seller-valutation">{$review->getSeller()}</span></p>	
											<p id="justified">Cliente: <span class="product-valutation">{$review->getCustomer()}</span></p>																																										
										</div>
									</div>
									<div class="col-md-8">
										<div class="review-body">
											<p id="justified"><span class="review-text">{$review->getReviewText()}</span></p>	
										</div>
									</div>
								</div>
								<br>
								<form action="/MusicCorner/Admin/deleteReview" method="post">			
								<button class="btn btn-outline-primary btn-lg dashboard-button" name="review" value={$review->getId()}><strong>Cancella review e sospendi utente</strong></button>
								</form>
							</li>
							<br>
							{/foreach}
						</ul>
                    {else}
                        <br>
                        <h1>Non ci sono recensioni</h1>
                    {/if}
					<a href="/MusicCorner/Admin/dashboard" class="btn btn-outline-primary btn-lg dashboard-button-inverse" ><strong>Torna alla dashboard</strong></a>
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
