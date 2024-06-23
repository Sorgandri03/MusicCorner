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
    
    {if $allowed}
    <!-- ORDER DETAILS -->
    <div class="section">
        <div class="container">
            <div class="row">
                <!-- Cart Items -->
                <div class="col-md-8">
                    <h1>Ordine del {$order->getOrderDateTime()}</h1>
                    {foreach from=$order->getOrderItems() item=orderItem}
                    {assign var=article value=FPersistentManager::getInstance()->retrieveObj(EArticleDescription::class,$orderItem->getArticle())}    
                    {assign var=seller value=FPersistentManager::getInstance()->retrieveObj(ESeller::class,$orderItem->getSeller())}
                    <!-- product -->
                    <div class="row">
                        <div class="col-md-5">
                            <div class="product">
                                <div class="product-img">
                                    <img src="https://www.ibs.it/images/{$article->getId()}_0_536_0_75.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <p></p>
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
                            <form action="/MusicCorner/Customer/reviewArticle/" method="post">
                                <button class="primary-btn-center btn-block" name="orderItemId" value={$orderItem->getId()}>Recensisci articolo</button>
                            </form>
                        </div>
                    </div>
                    <!-- /product -->
                    {/foreach}
                    <br>
                    <a href="/MusicCorner/Customer/orders" class="btn btn-outline-primary btn-lg dashboard-button-inverse" ><strong>Torna agli ordini</strong></a>
                </div>

                <!-- Cart Summary -->
                <div class="col-md-4">
                    <div class="section-title">
                        <h3 class="title">RIEPILOGO ORDINE</h3>
                    </div>
                    <div class="cart-summary">
                        <h4>Articoli: {count($order->getOrderItems())}</h4>
                        <h3>TOTALE: €{$order->getPrice()}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /ORDER DETAILS -->
    {else}
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Non hai i permessi per visualizzare questa pagina</h1>
                    <br><br>
                    <a href="/MusicCorner/" class="btn btn-outline-primary btn-lg dashboard-button-inverse" ><strong>Torna alla Home</strong></a>
                </div>
            </div>
        </div>
    </div>
    {/if}

    

</body>
</html>