<?php
/* Smarty version 5.1.0, created on 2024-06-23 17:34:45
  from 'file:addarticle.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_66784095e04a73_28008968',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd00f4e04edad0ba33f709481efc389054abcf9e5' => 
    array (
      0 => 'addarticle.tpl',
      1 => 1719156713,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66784095e04a73_28008968 (\Smarty\Template $_smarty_tpl) {
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
						<!-- Inserisci Prodotto -->
							<!-- Verifica EAN - Sempre visibile -->
						<?php if ($_smarty_tpl->getValue('found') == '') {?>
							<div class="col-md-12">
								<div class="billing-details">
									<div class="section-title">
										<h3 class="title">Inserisci Prodotto</h3>
									</div>
									<form action="" method="post" class="text-center">
										<div class="form-group">
											<input class="input form-control" type="text" name="EAN" placeholder="Inserisci qui l'EAN del tuo prodotto" required pattern="[0-9]*" minlength="0" maxlength="13" title="EAN deve essere un numero di 13 cifre">
										</div>
										<button class="primary-btn order-submit" type="submit">Verifica Esistenza</button>
									</form>
							</div>
						<?php }?>
		
							<!-- Form Inserimento Prodotto -->
						<?php if ($_smarty_tpl->getValue('found') == "true") {?>
							<div class="col-md-7">
								<p style="color: green;">EAN già utilizzato alcuni campi sono stati riempiti!</p>
								<form action="" method="post">
									<div class="form-group">
										<input class="input" type="text" name="EAN" value="<?php echo $_smarty_tpl->getValue('EAN');?>
" required readonly>
									</div>
									<div class="form-group">
										<input class="input" type="text" name="product-name" value="<?php echo $_smarty_tpl->getValue('productName');?>
" required readonly>
									</div>
									<div class="form-group">
										<input class="input" type="text" name="artist-name" value="<?php echo $_smarty_tpl->getValue('artistName');?>
" required readonly>
									</div>
									<div class="form-group">
										<input class="input" type="text" name="format" value="<?php echo $_smarty_tpl->getValue('format');?>
" required readonly>
									</div>
									<div class="form-group">
										<input class="input" type="text" name="price" placeholder="Inserisci prezzo articolo" required>
									</div>
									<div class="form-group">
										<input class="input" type="text" name="quantity" placeholder="Inserisci numero articoli in vendita" required>
									</div>
									<button class="primary-btn order-submit" type="submit">Aggiungi Articolo</button>
								</form>
							</div>
							<!-- /Form Inserimento Prodotto -->
							<br>
							<br>
							<!-- Dettagli Inserimento -->
							<div class="col-md-5 order-details" >
								<div class="section-title text-center">
									<h3 class="title">Resoconto Inserimento</h3>
								</div>
								<div class="order-summary">
									<div class="order-col">
										<div><strong>Prodotto</strong></div>
										<div><strong>Quantità</strong></div>
									</div>
									<div class="order-products">
										<div class="order-col">
											<div>Nome Articolo</div>
											<div>0,1,2</div>
										</div>
									</div>
								</div>
								<a href="#" class="primary-btn order-submit">Inserisci nel Catalogo</a>
							</div>
							<!-- /Dettagli Inserimento -->
							<?php } elseif ($_smarty_tpl->getValue('found') == "false") {?>
							<div class="col-md-7">
								<p style="color: red;">Questo EAN non è mai stato usato!</p>
								<form action="" method="post">
									<div class="form-group">
										<input class="input form-control" type="text" name="EAN" placeholder="Inserisci qui l'EAN del tuo prodotto" required pattern="[0-9]*" minlength="0" maxlength="13" title="EAN deve essere un numero di 13 cifre">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="product-name" placeholder="Inserisci nome prodotto" required>
									</div>
									<div class="form-group">
										<input class="input" type="text" name="artist-name" placeholder="Inserisci nome/i artista/i" required>
									</div>
									
									<div class="form-group">
										<input class="input" type="text" name="format" value="CD" required readonly>
									</div>
								
									<!-- DA FIXARE
									<div class="form-group">
									<select class="input" name="format" required>
										<option value="">Seleziona il formato</option> 
										<option value="CD">CD</option>
										<option value="LP">LP</option>
										<option value="Cassette">Cassette</option>
									</select>
									</div>
									-->
									
									<div class="form-group">
										<input class="input" type="text" name="price" placeholder="Inserisci prezzo articolo" required>
									</div>
									<div class="form-group">
										<input class="input" type="text" name="quantity" placeholder="Inserisci numero articoli in vendita" required>
									</div>
									<button class="primary-btn order-submit" type="submit">Aggiungi Articolo</button>
								</form>
							</div>
							<br>
							<br>
							<div class="col-md-5 order-details" >
								<div class="section-title text-center">
									<h3 class="title">Resoconto Inserimento</h3>
								</div>
								<div class="order-summary">
									<div class="order-col">
										<div><strong>Prodotto</strong></div>
										<div><strong>Quantità</strong></div>
									</div>
									<div class="order-products">
										<div class="order-col">
											<div>Nome Articolo</div>
											<div>0,1,2</div>
										</div>
									</div>
								</div>
								<a href="#" class="primary-btn order-submit">Inserisci nel Catalogo</a>
							</div>
						<?php }?>
						
						<!-- /Form Inserimento Prodotto -->
					</div>
					<div><br></div>
					<div><br></div>
					<div><br></div>
					<div><br></div>

					
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

	

		<!-- jQuery Plugins -->
		<?php echo '<script'; ?>
 src="js/jquery.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="js/bootstrap.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="js/slick.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="js/nouislider.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="js/jquery.zoom.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="js/main.js"><?php echo '</script'; ?>
>

	</body>
</html>
<?php }
}
