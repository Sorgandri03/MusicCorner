<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>MusicCorner - Prodotti Venduti</title>

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
    <style>
        .dashboard-button {
            margin-top: 20px;
        }
        .product-details p {
            margin: 0;
        }
        .product-img img {
            width: 100%;
        }
    </style>
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

    <!-- MODIFY STOCK -->
    <section id="modify-stock">
        <div class="container">
            <div class="row">
                <!-- Recent Orders -->
                <div class="col-md-8">
                    {if $seller->getRecentOrders()|@count eq 0}
						<br>
						<h2>Non hai venduto nessun articolo</h2>
					{else}
                        <br>
                        <h2>Ordini recenti</h2>
                        <br>
                        {foreach from=$seller->getRecentOrders() item=order}
                            {assign var="article" value=FPersistentManager::getInstance()->retrieveObj(EArticleDescription::class, $order->getArticle())}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="https://www.ibs.it/images/{$article->getId()}_0_536_0_75.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <br><br>
                                    <div class="product-details">
                                        <p class="product-category">{$article->getArtist()}</p>
                                        <h3 class="product-name"><a href="https://localhost/musiccorner/Search/article/{$article->getId()}">{$article->getName()}</a></h3>
                                        {if $article->getFormat()==1}
                                            <p class="product-category">LP</p>
                                        {else}
                                            <p class="product-category">CD</p>
                                        {/if}
                                        <h4 class="product-category">Prezzo: €{$order->getPrice()}</h4>
                                        <h4 class="product-category">Quantità: {$order->getQuantity()}</h4>
                                    </div>
                                </div>
                            </div>
                            <br>
                        {/foreach}
                    {/if}
                    <a href="/MusicCorner/Seller/dashboard" class="btn btn-outline-primary btn-lg dashboard-button"><strong>Torna alla dashboard</strong></a>
                </div>
                <!-- /Recent Orders -->

                <!-- Summary -->
                <div class="col-md-4">
                    <div class="section-title">
                        <br>
                        <h2 class="title">RIEPILOGO</h2>
                    </div>
                    <div class="cart-summary">
                        <h3>Articoli venduti: {count($seller->getStocks())}</h3>
                    </div>
                </div>
                <!-- /Summary -->
            </div>
        </div>
    </section>
    <!-- /MODIFY STOCK -->    
</body>
</html>
