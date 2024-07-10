<?php
/* Smarty version 5.1.0, created on 2024-06-24 13:14:47
  from 'file:sellerhomepage.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_667955279314c3_04112473',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '95ce9a458aa6cdc24838fae51267ce062676b2e9' => 
    array (
      0 => 'sellerhomepage.tpl',
      1 => 1719227685,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667955279314c3_04112473 (\Smarty\Template $_smarty_tpl) {
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

    <!-- SELLER HOMEPAGE FOR CUSTOMERS -->
    <section id="seller-homepage-for-customers">
        <div class="container">
            <div class="row">
                <br>
                <br>
                <h2><?php echo $_smarty_tpl->getValue('seller')->getShopName();?>
</h2>
                <br>
                <?php if ($_smarty_tpl->getValue('seller')->getShopRating() != 0) {?>
                    <div class="rating-avg">
                        <span>Voto: <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('seller')->averageRatingInt()+$_smarty_tpl->getValue('seller')->averageRatingDecimal(),1);?>
</span>
                        <div class="rating-stars">
                            <?php
$_smarty_tpl->assign('i', null);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->getValue('seller')->averageRatingInt()-1+1 - (0) : 0-($_smarty_tpl->getValue('seller')->averageRatingInt()-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                                <i class="fa fa-star"></i>
                            <?php }
}
?>
                            <?php if ($_smarty_tpl->getValue('seller')->averageRatingDecimal() >= 0.5) {?>
                                <i class="fa fa-star-half-o"></i>
                                <?php
$_smarty_tpl->assign('i', null);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 3+1 - ($_smarty_tpl->getValue('seller')->averageRatingInt()) : $_smarty_tpl->getValue('seller')->averageRatingInt()-(3)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->getValue('seller')->averageRatingInt(), $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                                    <i class="fa fa-star-o empty"></i>
                                <?php }
}
?>
                            <?php } else { ?>
                                <?php
$_smarty_tpl->assign('i', null);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 4+1 - ($_smarty_tpl->getValue('seller')->averageRatingInt()) : $_smarty_tpl->getValue('seller')->averageRatingInt()-(4)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->getValue('seller')->averageRatingInt(), $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                                    <i class="fa fa-star-o empty"></i>
                                <?php }
}
?>
                            <?php }?>
                        </div>
                    </div>                    
                <?php }?>
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
                    <div class="col-md-6">
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
                <a href="/MusicCorner/" class="btn btn-outline-primary btn-lg dashboard-button-inverse" ><strong>Torna alla home</strong></a>
            </div>
        </div>
    </section>
    
    
    
</body>
</html><?php }
}
