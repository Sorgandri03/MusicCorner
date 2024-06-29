<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>MusicCorner - Risposta Recensione</title>

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

    {if $success==false}
    <!-- REVIEW FORM -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="review-form">
                        <h2>Rispondi recensione per</h2>
                        {assign var=article value=FPersistentManager::getInstance()->retrieveObj(EArticleDescription::class,$review->getArticle())}    
                        {assign var=seller value=FPersistentManager::getInstance()->retrieveObj(ESeller::class,$review->getSeller())}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="https://www.ibs.it/images/{$article->getId()}_0_536_0_75.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <p></p>
                                <br>
                                <h4 class="product-category">{$article->getArtist()}</h4>
                                <h3 class="product-name"><a href="https://localhost/musiccorner/Search/article/{$article->getId()}">{$article->getName()}</a></h3>
                                {if $article->getFormat()==1}
                                    <h4 class="product-category">LP</h4>
                                {elseif $article->getFormat()==2}
                                    <h4 class="product-category">Cassetta</h4>
                                {else}
                                    <h4 class="product-category">CD</h4>
                                {/if}
                                <h3>Comprato da: {$customer->getUsername()}</h3>
                            </div>
                        </div>
                        <br>
                        <h2>Nella sua recensione, {$customer->getUsername()} ha scritto:</h2>
                        <br>
                        <h3 id="blue">{$review->getReviewText()}</h3>
                        <br>
                        <h2>Quanti giorni vuoi sospendere {$customer->getUsername()}?</h2>
                        <div class="col-md-5"></div>
                        <div class="col-md-2">
                            <div class="input-number">
                                <form action="" method="post">
                                <input type="number" name="days" value=1>
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                            <smallbr></smallbr>
                        </div>
                        <div class="col-md-5"></div>
                        <br>
                    </div>
                    <input type="hidden" name="review" value="{$review->getId()}">
                    <button class="btn btn-outline-primary btn-lg dashboard-button-inverse-red"><strong>Sospendi l'utente e cancella la recensione</strong></button>
                    </form>
                    <br><br>
                    <a href="/MusicCorner/Admin/moderateReviews/" class="btn btn-outline-primary btn-lg dashboard-button" ><strong>Torna alle recensioni</strong></a>
                </div>
            </div>
        </div>
    </div>
    <!-- /REVIEW FORM -->
    {else}
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>La recensione è stata cancellata con successo!</h1>
                        <br><br>
                        <a href="/MusicCorner/Admin/moderateReviews/" class="btn btn-outline-primary btn-lg dashboard-button" ><strong>Torna alle recensioni</strong></a>
                    </div>
                </div>
            </div>
        </div>
    {/if}    

    <!-- jQuery Plugins -->
		<script src="/MusicCorner/Smarty/templates/js/jquery.min.js"></script>
		<script src="/MusicCorner/Smarty/templates/js/bootstrap.min.js"></script>
		<script src="/MusicCorner/Smarty/templates/js/slick.min.js"></script>
		<script src="/MusicCorner/Smarty/templates/js/nouislider.min.js"></script>
		<script src="/MusicCorner/Smarty/templates/js/jquery.zoom.min.js"></script>
		<script src="/MusicCorner/Smarty/templates/js/main.js"></script>

</body>
</html>