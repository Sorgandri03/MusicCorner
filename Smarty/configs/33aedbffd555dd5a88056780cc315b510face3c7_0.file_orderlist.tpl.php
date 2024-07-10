<?php
/* Smarty version 5.1.0, created on 2024-07-10 17:19:56
  from 'file:orderlist.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_668ea69ca94d56_17073577',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '33aedbffd555dd5a88056780cc315b510face3c7' => 
    array (
      0 => 'orderlist.tpl',
      1 => 1720620853,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_668ea69ca94d56_17073577 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\MusicCorner\\Smarty\\templates';
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>MusicCorner - Lista Ordini</title>

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
    
	<!-- ORDER LIST -->
	<div class="customer-dashboard section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
                    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('customer')->getOrders()) > 0) {?>
                        <h1>Lista degli ordini</h1>
                        <ul>
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('customer')->getOrders(), 'order');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('order')->value) {
$foreach0DoElse = false;
?>
								<form action="/MusicCorner/Customer/order" method="post">
                                <li><button class="btn btn-outline-primary btn-lg dashboard-button" name="orderID" value="<?php echo $_smarty_tpl->getValue('order')->getId();?>
"><strong>Ordine del <?php echo $_smarty_tpl->getValue('order')->getOrderDateTime();?>
</strong></button></li>
								</form>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </ul>
                    <?php } else { ?>
                        <br>
                        <h1>Non hai ancora effettuato ordini</h1>
                    <?php }?>
					<a href="/MusicCorner/Customer/dashboard" class="btn btn-outline-primary btn-lg dashboard-button-inverse" ><strong>Torna alla dashboard</strong></a>
				</div>
			</div>
		</div>
	</div>
	<!-- /ORDER LIST -->

</body>
</html><?php }
}
