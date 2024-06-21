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
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Dettagli Prodotto</h3>
							</div>
							<form action="/MusicCorner/Seller/addArticle" method="post"></form>
							<div class="form-group">
								<form action="/MusicCorner/Seller/searchEAN" method="post">
									<input class="input" type="text" name="EAN" placeholder="Inserisci EAN" required>
									<button class="btn btn-sm btn-primary" type="submit">Verifica Esistenza</button>
								</form>
							</div>
						
								{if $found=="true"}
									<p style="color: green;">EAN verificato con successo!</p>
								{else if $found=="false"}
									<p style="color: red;">EAN non valido!</p>
								{/if}
							
							<div class="form-group">
								<input class="input" type="text" name="artist-name" placeholder="Inserisci nome/i artista/i" required>
							</div>
							<div class="form-group">
								<select class="input" name="format" required>
									<option value="">Seleziona il formato</option>
									<option value="CD">CD</option>
									<option value="LP">LP</option>
									<option value="Cassette">Cassette</option>
								</select>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="price" placeholder="Inserisci prezzo articolo" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="quantity" placeholder="Inserisci numero articoli in vendita" required>
							</div>
						</form>
						</div>
						<!-- /Billing Details -->
					</div>
					<div><br></div>
					<div><br></div>
					<div><br></div>
					<div><br></div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
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
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

	

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>
