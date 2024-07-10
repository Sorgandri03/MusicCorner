<?php
/* Smarty version 5.1.0, created on 2024-06-21 18:09:30
  from 'file:orderpayment.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_6675a5ba6f9738_61895514',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fb6a2f2f9152c6ba4936f4e969290dce76909ed0' => 
    array (
      0 => 'orderpayment.tpl',
      1 => 1718986165,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6675a5ba6f9738_61895514 (\Smarty\Template $_smarty_tpl) {
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
						<!-- Card Details -->
						<div class="billing-details">
							<form action="/MusicCorner/Orders/orderConfirm/" method="post">
							<div class="section-title">
								<h3 class="title">Dettagli della carta</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="card-number" placeholder="Numero della carta">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="card-owner" placeholder="Nome e cognome del titolare">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="expiration-date" placeholder="Data di scadenza">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="cvv" placeholder="CVV">
							</div>
						</div>
						<!-- /Card Details -->

						<!-- Billing Address -->
						<div class="shiping-details">
							<div class="section-title">
								<h3 class="title">indirizzo di fatturazione</h3>
							</div>
							<div class="input-checkbox">
								<input type='hidden' value='false' name='otherAddress'>
								<input type="checkbox" id="shiping-address" name="otherAddress" value="true">
								<label for="shiping-address">
									<span></span>
									L'indirizzo di fatturazione è diverso?
								</label>
								<div class="caption">
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
							</div>
						</div>
						<!-- /Billing Address -->

						<!-- Save Card -->
						<div class="input-checkbox">
							<div class="form-group">
								<input type='hidden' value='false' name='saveCard'>
								<input type="checkbox" id="save" name="saveCard" value="true">
								<label for="save">
									<span></span>
									Salva questa carta per la prossima volta
								</label>
							</div>
						</div>
						<!-- /Save Card -->

						<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('customer')->getCreditCards()) > 0) {?>
						<!-- Saved Cards -->
							<div class="shiping-details">
								<div class="section-title">
									<h3 class="title">Carte salvate</h3>
								</div>
								<input type="hidden" name="useSavedCard" value="0">
								<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('customer')->getCreditCards(), 'card');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('card')->value) {
$foreach0DoElse = false;
?>
									<div class="form-group">				
										<input type="radio" name="useSavedCard" value="<?php echo $_smarty_tpl->getValue('card')->getId();?>
">
										<label for="card">****-****-****-<?php echo substr((string) $_smarty_tpl->getValue('card')->getNumber(), (int) 12, (int) 4);?>
 <?php echo $_smarty_tpl->getValue('card')->getOwner();?>
</label>
									</div>
								<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
							</div>
						<!-- Saved Cards -->
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
						<?php if ($_smarty_tpl->getValue('errorTerms')) {?>
							<div class="error-message">
								Devi accettare i termini e le condizioni per fare un ordine
							</div>
						<?php } elseif ($_smarty_tpl->getValue('error')) {?>
							<div class="error-message">
								Compila tutti i campi
							</div>
						<?php }?>
							<div class="input-checkbox">
								<div class="form-group">
									<input type="hidden" name="terms" value="false">
									<input type="checkbox" id="termsandco" name="terms" value="true">
									<label for="termsandco">
										<span></span>
										Ho letto e accetto i <a href="#">termini e le condizioni</a>
									</label>
								</div>
							</div>
						<br>
						<button class="primary-btn btn-block">Invia ordine</button>
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
