<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>{$username} dashboard</title>

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
			<!-- /container -->
		</div>
		<!-- /MAIN HEADER -->
	</header>
	<!-- /HEADER -->

	<!-- SELLER DASHBOARD -->
	<div class="seller-dashboard section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Benvenuto {$username}</h1>
					<ul>
						<li><a href="/MusicCorner/Seller/soldProducts" class="btn btn-outline-primary btn-lg dashboard-button"><strong>Ordini Recenti</strong></a></li>
						<li><a href="/MusicCorner/Seller/addArticle" class="btn btn-outline-primary btn-lg dashboard-button"><strong>Carica Articolo</strong></a></li>
						<li><a href="/MusicCorner/Seller/modifyCatalogue" class="btn btn-outline-primary btn-lg dashboard-button"><strong>Aggiorna Catalogo</strong></a></li>
						<li><a href="/MusicCorner/Seller/showReviews" class="btn btn-outline-primary btn-lg dashboard-button"><strong>Visualizza Recensioni</strong></a></li>
						<li><a href="/MusicCorner/" class="btn btn-outline-primary btn-lg dashboard-button-inverse" ><strong>Home</strong></a></li>
						<li><a href="/MusicCorner/User/logout" class="btn btn-outline-primary btn-lg dashboard-button-inverse-red" ><strong>Logout</strong></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>	

</body>
</html>