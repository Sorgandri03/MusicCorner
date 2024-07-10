<?php
/* Smarty version 5.1.0, created on 2024-06-21 12:19:50
  from 'file:orderaddress.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_667553c6d9c3e2_95973588',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a3932b43bb05e24bb5967a8bd00b02a22676fa5' => 
    array (
      0 => 'orderaddress.tpl',
      1 => 1718965188,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667553c6d9c3e2_95973588 (\Smarty\Template $_smarty_tpl) {
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
								<h3 class="title">Indirizzo di spedizione</h3>
							</div>
							<form action="/MusicCorner/Orders/payment/" method="post">
							<div class="form-group">
								<input class="input" type="text" name="first-name" placeholder="Nome">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="last-name" placeholder="Cognome">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="street" placeholder="Indirizzo">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="city" placeholder="Città">
							</div>
							<div class="form-group">
								<input class="input" type="number" name="zip-code" placeholder="CAP">
							</div>
						</div>
						<!-- /Shipping Details -->
						<div class="input-checkbox">
							<div class="form-group">
								<input type='hidden' value='false' name='saveAddress'>
								<input type="checkbox" id="terms" name="saveAddress" value="true">
								<label for="terms">
									<span></span>
									Salva questo indirizzo per la prossima volta
								</label>
							</div>
						</div>
						<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('customer')->getAddresses()) > 0) {?>
						<br>
							<!-- Saved Addresses -->
								<div class="shiping-details">
									<div class="section-title">
										<h3 class="title">Indirizzi salvati</h3>
									</div>
									<input type="hidden" name="useSavedAddress" value="0">
									<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('customer')->getAddresses(), 'address');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('address')->value) {
$foreach0DoElse = false;
?>
										<div class="form-group">											
											<input type="radio" name="useSavedAddress" value="<?php echo $_smarty_tpl->getValue('address')->getId();?>
">
											<label for="address"><?php echo $_smarty_tpl->getValue('address')->getStreet();?>
, <?php echo $_smarty_tpl->getValue('address')->getCity();?>
, <?php echo $_smarty_tpl->getValue('address')->getCap();?>
</label>
										</div>
									<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
								</div>
							<!-- /Saved Addresses -->
						<?php }?>
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Il tuo ordine</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODOTTI</strong></div>
								<div><strong>TOTALE</strong></div>
							</div>
							<div class="order-products">
								<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('cart')->getCartItems(), 'quantity', false, 'stock');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('stock')->value => $_smarty_tpl->getVariable('quantity')->value) {
$foreach1DoElse = false;
?>
                        		<?php $_smarty_tpl->assign('article', FPersistentManager::getInstance()->retrieveObj(EArticleDescription::class,FPersistentManager::getInstance()->retrieveObj(EStock::class,$_smarty_tpl->getValue('stock'))->getArticle()), false, NULL);?>
                        		<?php $_smarty_tpl->assign('stock', FPersistentManager::getInstance()->retrieveObj(EStock::class,$_smarty_tpl->getValue('stock')), false, NULL);?>
								<?php $_smarty_tpl->assign('format', $_smarty_tpl->getValue('Format')[$_smarty_tpl->getValue('article')->getFormat()], false, NULL);?>
									<div class="order-col">
										<div><?php echo $_smarty_tpl->getValue('quantity');?>
x <?php echo $_smarty_tpl->getValue('article')->getName();?>
 <?php echo $_smarty_tpl->getValue('format');?>
</div>
										<div>€<?php echo $_smarty_tpl->getValue('stock')->getPrice();?>
</div>
									</div>
								<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
							</div>
							<div class="order-col">
								<div>SPEDIZIONE</div>
								<div><strong>GRATIS</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTALE</strong></div>
								<div><strong class="order-total">€<?php echo $_smarty_tpl->getValue('cart')->getTotalPrice();?>
</strong></div>
							</div>
						</div>
							<br>
							<?php if ($_smarty_tpl->getValue('error')) {?>
								<div class="error-message">
									Devi riempire tutti i campi!
								</div>
							<?php }?>
							<button class="primary-btn btn-block">Vai al pagamento</button>
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
