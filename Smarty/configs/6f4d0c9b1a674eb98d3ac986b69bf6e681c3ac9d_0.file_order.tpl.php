<?php
/* Smarty version 5.1.0, created on 2024-06-24 12:02:11
  from 'file:order.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_667944231fae88_13454308',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6f4d0c9b1a674eb98d3ac986b69bf6e681c3ac9d' => 
    array (
      0 => 'order.tpl',
      1 => 1719223327,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667944231fae88_13454308 (\Smarty\Template $_smarty_tpl) {
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
    
    <?php if ($_smarty_tpl->getValue('allowed')) {?>
    <!-- ORDER DETAILS -->
    <div class="section">
        <div class="container">
            <div class="row">
                <!-- Cart Items -->
                <div class="col-md-8">
                    <h1>Ordine del <?php echo $_smarty_tpl->getValue('order')->getOrderDateTime();?>
</h1>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('order')->getOrderItems(), 'orderItem');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('orderItem')->value) {
$foreach0DoElse = false;
?>
                    <?php $_smarty_tpl->assign('article', FPersistentManager::getInstance()->retrieveObj(EArticleDescription::class,$_smarty_tpl->getValue('orderItem')->getArticle()), false, NULL);?>    
                    <?php $_smarty_tpl->assign('seller', FPersistentManager::getInstance()->retrieveObj(ESeller::class,$_smarty_tpl->getValue('orderItem')->getSeller()), false, NULL);?>
                    <!-- product -->
                    <div class="row">
                        <div class="col-md-5">
                            <div class="product">
                                <div class="product-img">
                                    <img src="https://www.ibs.it/images/<?php echo $_smarty_tpl->getValue('article')->getId();?>
_0_536_0_75.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <p></p>
                            <h4 class="product-category"><?php echo $_smarty_tpl->getValue('article')->getArtist();?>
</h4>
                            <h3 class="product-name"><a href="https://localhost/musiccorner/Search/article/<?php echo $_smarty_tpl->getValue('article')->getId();?>
"><?php echo $_smarty_tpl->getValue('article')->getName();?>
</a></h3>
                            <?php if ($_smarty_tpl->getValue('article')->getFormat() == 1) {?>
                                <h4 class="product-category">LP</h4>
                            <?php } elseif ($_smarty_tpl->getValue('article')->getFormat() == 2) {?>
                                <h4 class="product-category">Cassetta</h4>
                            <?php } else { ?>
                                <h4 class="product-category">CD</h4>
                            <?php }?>	
                            <h4 class="product-price">€<?php echo $_smarty_tpl->getValue('orderItem')->getPrice();?>
</h4>
                            <h4 class="product-price">Quantità: <?php echo $_smarty_tpl->getValue('orderItem')->getQuantity();?>
</h4>
                            <h4 class="product-price">Venduto da: <?php echo $_smarty_tpl->getValue('seller')->getShopName();?>
</h4>
                            <?php if (FPersistentManager::getInstance()->isOrderItemReviewed($_smarty_tpl->getValue('orderItem')->getId()) == false) {?>
                                <form action="/MusicCorner/Customer/reviewArticle/" method="post">
                                    <button class="primary-btn-center btn-block" name="orderItemID" value=<?php echo $_smarty_tpl->getValue('orderItem')->getId();?>
>Recensisci articolo</button>
                                </form>
                            <?php } else { ?>
                                <button class="primary-btn-center btn-block" disabled>Articolo già recensito</button>
                            <?php }?>
                        </div>
                    </div>
                    <!-- /product -->
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    <br>
                    <a href="/MusicCorner/Customer/orders" class="btn btn-outline-primary btn-lg dashboard-button-inverse" ><strong>Torna agli ordini</strong></a>
                </div>

                <!-- Cart Summary -->
                <div class="col-md-4">
                    <div class="section-title">
                        <h3 class="title">RIEPILOGO ORDINE</h3>
                    </div>
                    <div class="cart-summary">
                        <h4>Articoli: <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('order')->getOrderItems());?>
</h4>
                        <h3>TOTALE: €<?php echo $_smarty_tpl->getValue('order')->getPrice();?>
</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /ORDER DETAILS -->
    <?php } else { ?>
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
    <?php }?>

    

</body>
</html><?php }
}
