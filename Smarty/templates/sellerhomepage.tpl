<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>MusicCorner - {$seller->getShopName()}</title>

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

    <!-- SELLER HOMEPAGE FOR CUSTOMERS -->
    <section id="seller-homepage-for-customers">
        <div class="container">
            <div class="row">
                <br>
                <br>
                <h2>{$seller->getShopName()}</h2>
                <br>
                {if $seller->getShopRating() != 0}
                    <div class="rating-avg">
                        <span>Voto: {number_format($seller->averageRatingInt() + $seller->averageRatingDecimal(),1)}</span>
                        <div class="rating-stars">
                            {for $i=0 to $seller->averageRatingInt()-1}
                                <i class="fa fa-star"></i>
                            {/for}
                            {if $seller->averageRatingDecimal() >=0.5}
                                <i class="fa fa-star-half-o"></i>
                                {for $i=$seller->averageRatingInt() to 3}
                                    <i class="fa fa-star-o empty"></i>
                                {/for}
                            {else}
                                {for $i=$seller->averageRatingInt() to 4}
                                    <i class="fa fa-star-o empty"></i>
                                {/for}
                            {/if}
                        </div>
                    </div>                    
                {/if}
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
                    <div class="col-md-6">
                        <br><br>
                        <div class="product-details">
                            <p class="product-category">{$article->getArtist()}</p>
                            <h3 class="product-name"><a href="https://localhost/musiccorner/Search/article/{$article->getId()}">{$article->getName()}</a></h3>
                            {if $article->getFormat()==1}
                                <p class="product-category">LP</p>
                            {elseif $article->getFormat()==1}
                                <p class="product-category">Cassetta</p>
                            {else}
                                <p class="product-category">CD</p>
                            {/if}
                            <h4 class="product-category">Prezzo: €{$stock->getPrice()}</h4>
                            <h4 class="product-category">Quantità: {$stock->getQuantity()}</h4>
                        </div>
                    </div>
                </div>
                <br>
                {/foreach}
                <a href="/MusicCorner/" class="btn btn-outline-primary btn-lg dashboard-button-inverse" ><strong>Torna alla home</strong></a>
            </div>
        </div>
    </section>
    
    
    
</body>
</html>