<?php
/* Smarty version 5.1.0, created on 2024-06-23 18:30:40
  from 'file:cart.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_66784db05efe25_86437941',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '877427908a7821b4ed1da18ac67ff530318a332d' => 
    array (
      0 => 'cart.tpl',
      1 => 1719160236,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66784db05efe25_86437941 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\MusicCorner\\Smarty\\templates';
?><!DOCTYPE html>
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
		  <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"><?php echo '</script'; ?>
>
		  <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
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
										<span><?php echo $_smarty_tpl->getValue('username');?>
</span>
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

        <!-- Shopping Cart Section -->
        <div class="section">
            <div class="container">
                <div class="row">
                    <!-- Cart Items -->
                    <div class="col-md-8">
                        <div class="section-title">
							<?php if ($_smarty_tpl->getValue('cart')->getCartQuantity() == 0) {?>
								<h3 class="title">Il carrello è vuoto</h3>
							<?php } else { ?>
                            	<h3 class="title">Carrello</h3>
								<?php if ($_smarty_tpl->getValue('error')) {?>
									<h4 class="error-message">Non puoi acquistarne così tanti!</h4>
								<?php }?>
							<?php }?>
                        </div>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('cart')->getCartItems(), 'quantity', false, 'stock');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('stock')->value => $_smarty_tpl->getVariable('quantity')->value) {
$foreach0DoElse = false;
?>
                        <?php $_smarty_tpl->assign('article', FPersistentManager::getInstance()->retrieveObj(EArticleDescription::class,FPersistentManager::getInstance()->retrieveObj(EStock::class,$_smarty_tpl->getValue('stock'))->getArticle()), false, NULL);?>
                        <?php $_smarty_tpl->assign('stock', FPersistentManager::getInstance()->retrieveObj(EStock::class,$_smarty_tpl->getValue('stock')), false, NULL);?>    
                        <!-- product -->
						<div class="row">
                            <div class="col-md-4">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="https://www.ibs.it/images/<?php echo $_smarty_tpl->getValue('article')->getId();?>
_0_536_0_75.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <p></p>
                                <p class="product-category"><?php echo $_smarty_tpl->getValue('article')->getArtist();?>
</p>
                                <h3 class="product-name"><a href="https://localhost/musiccorner/Search/article/<?php echo $_smarty_tpl->getValue('article')->getId();?>
"><?php echo $_smarty_tpl->getValue('article')->getName();?>
</a></h3>
                                <?php if ($_smarty_tpl->getValue('article')->getFormat() == 1) {?>
                                    <p class="product-category">LP</p>
                                <?php } elseif ($_smarty_tpl->getValue('article')->getFormat() == 2) {?>
                                    <p class="product-category">Cassetta</p>
                                <?php } else { ?>
                                    <p class="product-category">CD</p>
                                <?php }?>	
                                <h4 class="product-price">€<?php echo $_smarty_tpl->getValue('stock')->getPrice();?>
</h4>
								<br>
								<div class="row">
									<div class="col-md-5">
										<smallbr></smallbr>
										<h4 id="right" class="product-qty">Quantità:</h4>
									</div>
									<div class="col-md-3">
										<div class="input-number">
											<form action="" method="post">
											<input type="number" name="quantity" value=<?php echo $_smarty_tpl->getValue('quantity');?>
>
											<span class="qty-up">+</span>
											<span class="qty-down">-</span>
										</div>
										<smallbr></smallbr>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
											<button class="primary-btn-center btn-block" name="stockId" value=<?php echo $_smarty_tpl->getValue('stock')->getId();?>
>Aggiorna</button>
										</form>
									</div>
									<div class="col-md-6">
										<form action="/MusicCorner/Orders/removeFromCart/" method="post">
											<button class="primary-btn-center btn-block" name="stockId" value=<?php echo $_smarty_tpl->getValue('stock')->getId();?>
>Rimuovi</button>
										</form>
									</div>
								</div>
                            </div>
						</div>
						<br>
                        <!-- /product -->
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
						<?php if ($_smarty_tpl->getValue('cart')->getCartQuantity() != 0) {?>
							<form action="/MusicCorner/Orders/clearCart/" method="post">
								<button class="primary-btn-center btn-block">Svuota carrello</button>
							</form>
						<?php }?>
                    </div>

                    <!-- Cart Summary -->
                    <div class="col-md-4">
                        <div class="section-title">
                            <h3 class="title">RIEPILOGO</h3>
                        </div>
                        <div class="cart-summary">
                            <h4>Articoli: <?php echo $_smarty_tpl->getValue('cart')->getCartQuantity();?>
</h4>
                            <h3>TOTALE: €<?php echo $_smarty_tpl->getValue('cart')->getTotalPrice();?>
</h3>
							<form action="/MusicCorner/Orders/checkout" method="post">
                            	<button class="primary-btn btn-block">Procedi al checkout</button>
							</form>
                        </div>
                    </div>
					<!-- /Cart Summary -->
                </div>
            </div>
        </div>
		<!-- /Shopping Cart Section -->

		<!-- jQuery Plugins -->
		<?php echo '<script'; ?>
 src="/MusicCorner/Smarty/templates/js/jquery.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="/MusicCorner/Smarty/templates/js/bootstrap.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="/MusicCorner/Smarty/templates/js/slick.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="/MusicCorner/Smarty/templates/js/nouislider.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="/MusicCorner/Smarty/templates/js/jquery.zoom.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="/MusicCorner/Smarty/templates/js/main.js"><?php echo '</script'; ?>
>
	</body>
</html>
<?php }
}
