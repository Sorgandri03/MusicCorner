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

    <!-- RECENT ORDERS -->
    <section id="modify-stock">
        <div class="container">
            <div class="row">
                <!-- Recent Orders -->
                <div class="col-md-12">
                    {if $seller->getRecentOrders()|@count eq 0}
						<br>
						<h2>Non hai nessun articolo da spedire</h2>
					{else}
                        <br>
                        <h2>Ordini recenti</h2>
                        <br>
                        {foreach from=$seller->getRecentOrders() item=orderItem}
                        {assign var="article" value=FPersistentManager::getInstance()->retrieveObj(EArticleDescription::class, $orderItem->getArticle())}
                        {assign var="order" value=FPersistentManager::getInstance()->retrieveObj(EOrder::class, $orderItem->getOrderId())}
                        {assign var="customer" value=FPersistentManager::getInstance()->retrieveObj(ECustomer::class, $order->getCustomer())}
                        {assign var="shippingAddress" value=FPersistentManager::getInstance()->retrieveObj(EAddress::class, $order->getShippingAddress())}
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
                                    <smallbr></smallbr>
                                    <h3 class="product-name"><a href="https://localhost/musiccorner/Search/article/{$article->getId()}">{$article->getName()}</a></h3>
                                    <h3 class="product-name">{$article->getId()}</h3>
                                    {if $article->getFormat()==1}
                                        <p class="product-category">LP</p>
                                    {else}
                                        <p class="product-category">CD</p>
                                    {/if}
                                    <smallbr></smallbr>
                                    <p class="product-category">Prezzo: €{$orderItem->getPrice()}</p>
                                    <smallbr></smallbr>
                                    <p class="product-category">Quantità: {$orderItem->getQuantity()}</p>
                                    <smallbr></smallbr>
                                    <p class="product-category">Username: {$customer->getUsername()}</p>
                                    <br>
                                    <h4 class="product-category">Indirizzo di spedizione: {$shippingAddress->getStreet()}, {$shippingAddress->getCity()}, {$shippingAddress->getCap()}</h4>
                                    <form action="" method="post">
                                        <input type="hidden" name="orderItem" value="{$orderItem->getId()}">
                                        <button class="btn btn-outline-primary btn-lg dashboard-button"><strong>Segna come spedito</strong></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <br>
                        {/foreach}
                    {/if}
                    <a href="/MusicCorner/Seller/dashboard" class="btn btn-outline-primary btn-lg dashboard-button-inverse" ><strong>Torna alla dashboard</strong></a>               
                <!-- /Recent Orders -->

                
            </div>
        </div>
    </section>
    <!-- /MODIFY STOCK -->    
</body>
</html>
