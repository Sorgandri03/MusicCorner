<?php
/* Smarty version 5.1.0, created on 2024-06-24 12:10:47
  from 'file:soldproducts.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_6679462727e8c0_40234340',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ffb34a85e7b481f179beb7ccb896e5ada653de2f' => 
    array (
      0 => 'soldproducts.tpl',
      1 => 1719223832,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6679462727e8c0_40234340 (\Smarty\Template $_smarty_tpl) {
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
                <div class="col-md-8">
                    <br>
                    <h2>Articoli venduti</h2>
                    <br>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('seller')->getStocks(), 'stock');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('stock')->value) {
$foreach0DoElse = false;
?>
                    <?php $_smarty_tpl->assign('article', FPersistentManager::getInstance()->retrieveObj(EArticleDescription::class,$_smarty_tpl->getValue('stock')->getArticle()), false, NULL);?>
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
                            <br><br>
                            <div class="product-details">
                                <p class="product-category"><?php echo $_smarty_tpl->getValue('article')->getArtist();?>
</p>
                                <h3 class="product-name"><a href="https://localhost/musiccorner/Search/article/<?php echo $_smarty_tpl->getValue('article')->getId();?>
"><?php echo $_smarty_tpl->getValue('article')->getName();?>
</a></h3>
                                <?php if ($_smarty_tpl->getValue('article')->getFormat() == 1) {?>
                                    <p class="product-category">LP</p>
                                <?php } elseif ($_smarty_tpl->getValue('article')->getFormat() == 1) {?>
                                    <p class="product-category">Cassetta</p>
                                <?php } else { ?>
                                    <p class="product-category">CD</p>
                                <?php }?>
                                <h4 class="product-category">Prezzo: €<?php echo $_smarty_tpl->getValue('stock')->getPrice();?>
</h4>
                                <h4 class="product-category">Quantità: <?php echo $_smarty_tpl->getValue('stock')->getQuantity();?>
</h4>
                            </div>
                        </div>
                    </div>
                    <br>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    <a href="/MusicCorner/Seller/dashboard" class="btn btn-outline-primary btn-lg dashboard-button-inverse" ><strong>Torna indietro</strong></a>
                </div>
                <!-- Summary -->
                <div class="col-md-4">
                    <div class="section-title">
                        <br>
                        <h2 class="title">RIEPILOGO</h2>
                    </div>
                    <div class="cart-summary">
                        <h3>Articoli venduti: <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('seller')->getStocks());?>
</h3>
                    </div>
                </div>
                <!-- /Summary -->
            </div>
        </div>
    </section>
    <!-- /MODIFY STOCK -->
    
    
    
</body>
</html>
					<?php }
}
