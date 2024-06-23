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
				<!-- row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /MAIN HEADER -->
	</header>
	<!-- /HEADER -->

    {if $success==false}
    <!-- REVIEW FORM -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="review-form">
                        <h2>Scrivi una recensione per</h2>
                        {assign var=article value=FPersistentManager::getInstance()->retrieveObj(EArticleDescription::class,$orderItem->getArticle())}    
                        {assign var=seller value=FPersistentManager::getInstance()->retrieveObj(ESeller::class,$orderItem->getSeller())}
                        {assign var=order value=FPersistentManager::getInstance()->retrieveObj(EOrder::class,$orderItem->getOrderId())}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="https://www.ibs.it/images/{$article->getId()}_0_536_0_75.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <p></p>
                                <br>
                                <h4 class="product-category">{$article->getArtist()}</h4>
                                <h3 class="product-name"><a href="https://localhost/musiccorner/Search/article/{$article->getId()}">{$article->getName()}</a></h3>
                                {if $article->getFormat()==1}
                                    <h4 class="product-category">LP</h4>
                                {elseif $article->getFormat()==2}
                                    <h4 class="product-category">Cassetta</h4>
                                {else}
                                    <h4 class="product-category">CD</h4>
                                {/if}	
                                <h4 class="product-price">€{$orderItem->getPrice()}</h4>
                                <h4 class="product-price">Quantità: {$orderItem->getQuantity()}</h4>
                                <h4 class="product-price">Venduto da: {$seller->getShopName()}</h4>
                                <h4 class="product-price">Comprato il: {$order->getOrderDateTime()}</h4>
                            </div>
                        </div>
                        <h3>Sarà pubblicata a nome: {$customer->getUsername()}</h3>
                        <form class="review-form" action="/MusicCorner/Customer/sendReview/" method="post">
                            <textarea class="input" placeholder="Scrivi qui la recensione" name="reviewText" required></textarea>
                            <input class="hidden" type="text" name="orderItemId" value="{$orderItem->getId()}">
                            <div class="input-rating">
                                <span><h4>Voto dell'articolo: </h4></span>
                                <div class="stars">
                                    <input id="star5a" name="ratinga" value="5" type="radio"><label for="star5a"></label>
                                    <input id="star4a" name="ratinga" value="4" type="radio"><label for="star4a"></label>
                                    <input id="star3a" name="ratinga" value="3" type="radio"><label for="star3a"></label>
                                    <input id="star2a" name="ratinga" value="2" type="radio"><label for="star2a"></label>
                                    <input id="star1a" name="ratinga" value="1" type="radio"><label for="star1a"></label>
                                </div>
                            </div>
                            <div class="input-rating">
                                <span><h4>Voto del venditore: </h4></span>
                                <div class="stars">
                                    <input id="star5s" name="ratings" value="5" type="radio"><label for="star5s"></label>
                                    <input id="star4s" name="ratings" value="4" type="radio"><label for="star4s"></label>
                                    <input id="star3s" name="ratings" value="3" type="radio"><label for="star3s"></label>
                                    <input id="star2s" name="ratings" value="2" type="radio"><label for="star2s"></label>
                                    <input id="star1s" name="ratings" value="1" type="radio"><label for="star1s"></label>
                                </div>
                            </div>
                            {if $error}
                                <div class="error-message">
                                    Devi indicare i voti prima di inviare la recensione!
                                </div>
                            {/if}
                            <button class="primary-btn">Invia recensione</button>
                        </form>
                    </div>
                    <br><br>
                    <a href="/MusicCorner/Customer/orders/" class="btn btn-outline-primary btn-lg dashboard-button-inverse" ><strong>Torna agli ordini</strong></a>
                </div>
            </div>
        </div>
    </div>
    <!-- /REVIEW FORM -->
    {else}
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>La recensione è stata inviata con successo!</h1>
                        <br><br>
                        <a href="/MusicCorner/Customer/orders/" class="btn btn-outline-primary btn-lg dashboard-button-inverse" ><strong>Torna agli ordini</strong></a>
                    </div>
                </div>
            </div>
        </div>
    {/if}    
</body>
</html>