<?php
/* Smarty version 5.1.0, created on 2024-06-24 12:01:54
  from 'file:reviewarticle.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_667944126d3193_92109829',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f104b8a344b2fea017023156d8897d8b3b94a1ef' => 
    array (
      0 => 'reviewarticle.tpl',
      1 => 1719222787,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667944126d3193_92109829 (\Smarty\Template $_smarty_tpl) {
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

    <?php if ($_smarty_tpl->getValue('success') == false) {?>
    <!-- REVIEW FORM -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="review-form">
                        <h2>Scrivi una recensione per</h2>
                        <?php $_smarty_tpl->assign('article', FPersistentManager::getInstance()->retrieveObj(EArticleDescription::class,$_smarty_tpl->getValue('orderItem')->getArticle()), false, NULL);?>    
                        <?php $_smarty_tpl->assign('seller', FPersistentManager::getInstance()->retrieveObj(ESeller::class,$_smarty_tpl->getValue('orderItem')->getSeller()), false, NULL);?>
                        <?php $_smarty_tpl->assign('order', FPersistentManager::getInstance()->retrieveObj(EOrder::class,$_smarty_tpl->getValue('orderItem')->getOrderId()), false, NULL);?>
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
                                <br>
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
                                <h4 class="product-price">Comprato il: <?php echo $_smarty_tpl->getValue('order')->getOrderDateTime();?>
</h4>
                            </div>
                        </div>
                        <h3>Sarà pubblicata a nome: <?php echo $_smarty_tpl->getValue('customer')->getUsername();?>
</h3>
                        <form class="review-form" action="" method="post">
                            <textarea class="input" placeholder="Scrivi qui la recensione" name="reviewText" required></textarea>
                            <input class="hidden" type="text" name="orderItemID" value="<?php echo $_smarty_tpl->getValue('orderItem')->getId();?>
">
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
                            <?php if ($_smarty_tpl->getValue('error')) {?>
                                <div class="error-message">
                                    Devi indicare i voti prima di inviare la recensione!
                                </div>
                            <?php }?>
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
    <?php } else { ?>
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
    <?php }?>    
</body>
</html><?php }
}
