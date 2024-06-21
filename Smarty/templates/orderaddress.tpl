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
								<a href="/MusicCorner/" class="logo">
									<img src="/MusicCorner/Smarty/templates/img/biglogo.png" alt="" class="center">
								</a>
						<!-- /LOGO -->																						
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
						<!-- Shipping Details -->
						<div class="shipping-details">
							<div class="section-title">
								<h3 class="title">Shipping address</h3>
							</div>
							<form action="/MusicCorner/Orders/payment/" method="post">
							<div class="form-group">
								<input class="input" type="text" name="first-name" placeholder="First Name" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="last-name" placeholder="Last Name" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address" placeholder="Address" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="city" placeholder="City" required>
							</div>
							<div class="form-group">
								<input class="input" type="number" name="zip-code" placeholder="ZIP Code" required>
							</div>
						</div>
						<!-- /Shipping Details -->
						<div class="input-checkbox">
							<div class="form-group">
								<input type='hidden' value='false' name='saveAddress'>
								<input type="checkbox" id="terms" name="saveAddress" value="true">
								<label for="terms">
									<span></span>
									Save this address for next time
								</label>
							</div>
						</div>
						{if count($customer->getAddresses())>0}
						<br>
							<!-- Saved Addresses -->
								<div class="shiping-details">
									<div class="section-title">
										<h3 class="title">Saved Addresses</h3>
									</div>
									{foreach from=$customer->getAddresses() item=address}
										<div class="form-group">
											<input type="radio" name="address" value="{$address->getId()}">
											<label for="address">{$address->getStreet()}, {$address->getCity()}, {$address->getCap()}</label>
										</div>
									{/foreach}
								</div>
							<!-- /Saved Addresses -->
						{/if}
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Your Order</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>
							<div class="order-products">
								{foreach from=$cart->getCartItems() item=quantity key=stock}
                        		{assign var="article" value=FPersistentManager::getInstance()->retrieveObj(EArticleDescription::class,FPersistentManager::getInstance()->retrieveObj(EStock::class,$stock)->getArticle())}
                        		{assign var="stock" value=FPersistentManager::getInstance()->retrieveObj(EStock::class,$stock)}
								{assign var="format" value=$Format[$article->getFormat()]}
									<div class="order-col">
										<div>{$quantity}x {$article->getName()} {$format}</div>
										<div>€{$stock->getPrice()}</div>
									</div>
								{/foreach}
							</div>
							<div class="order-col">
								<div>Shipping</div>
								<div><strong>FREE</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total">€{$cart->getTotalPrice()}</strong></div>
							</div>
						</div>
							<br>
							<button class="primary-btn btn-block">Continue to Payment</button>
						</form>
					</div>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->


		<!-- jQuery Plugins -->
		<script src="/MusicCorner/Smarty/templates/js/jquery.min.js"></script>
		<script src="/MusicCorner/Smarty/templates/js/bootstrap.min.js"></script>
		<script src="/MusicCorner/Smarty/templates/js/slick.min.js"></script>
		<script src="/MusicCorner/Smarty/templates/js/nouislider.min.js"></script>
		<script src="/MusicCorner/Smarty/templates/js/jquery.zoom.min.js"></script>
		<script src="/MusicCorner/Smarty/templates/js/main.js"></script>

	</body>
</html>
