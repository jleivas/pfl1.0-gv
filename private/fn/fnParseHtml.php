<?php
$contentHtml = "";

$contentHtml = $contentHtml . '
<!DOCTYPE HTML>

<html>
	<head>
		<?php include("complements/title.php") ?>

		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta property="og:site_name" content="Softdirex">
        
        <meta property="og:title" content="'.$titulo.'">
        <meta property="og:description" content="'.$longTitle.'">
        <meta property="og:type" content="website">
        <meta property="og:image" content="https://www.softdirex.cl/assets/pages/img/posts/'.$img1.'"><!-- link to image for socio -->
        <meta property="og:url" content="https://www.softdirex.cl/'.$anio.'/'.$mes.'/'.$dia.'/'.$fileName.'">

		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/ionicons-2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/owl.carousel.css">

		<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	</head>

    <body>
    <!-- API FACEBOOK BEGIN -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = \'https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.12&appId=598270976878270&autoLogAppEvents=1\';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, \'script\', \'facebook-jssdk\'));</script>
    <!-- API FACEBOOK END -->

    
		<?php include("complements/head.php") ?>

		<section id="innerheader" class="innerheader innerheader">
			<div class="overlay"></div>
			<div class="container">
				<div class="row pad-small">
					<div class="col-sm-12">
						<div class="inner-title">
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="paragraph">
			<div class="container">
				<h1>GrowVision está creciendo y llegando donde nadie más llega</h1>
			</div>				
		</section>

		<section class="image-text">
			<div class="container">						
				<div class="row">
					<div class="col-md-4">
						<img src="assets/images/4.jpg" class="img-responsive" alt="Responsive image"/>
					</div>
					<div class="col-md-8">
						<p class="image-text-text">Lorem Ipsum available, but the majority have suffered This alteration in some form, by injected is a humour, or randomised words which don’t look even sligh is made  believable. If  to use and yammi passage of Lorem Ipsum, you need to be sure there isn’t by pioneer designer anything embarrassing hidden in the middle of text.<br><br>
						Lorem Ipsum available, but the majority have suffered This alteration in some form, by injected is a humour, or randomised words which don’t look even sligh is made  believable. If  to use and yammi passage of Lorem Ipsum, you need to be sure there isn’t by pioneer designer anything embarrassing hidden in the middle of text.</p>	
					</div>
				</div>												
				<div class="row">
					<div class="col-md-12">
						<p class="image-text-text">Lorem Ipsum available, but the majority have suffered This alteration in some form, by injected is a humour, or randomised words which don’t look even sligh is made  believable. If  to use and yammi passage of Lorem Ipsum, you need to be sure there isn’t by pioneer designer anything embarrassing hidden in the middle of text.<br><br>
						Lorem Ipsum available, but the majority have suffered This alteration in some form, by injected is a humour, or randomised words which don’t look even sligh is made  believable. If  to use and yammi passage of Lorem Ipsum, you need to be sure there isn’t by pioneer designer anything embarrassing hidden in the middle of text.</p>	
					</div>
				</div>						
            </div>
            
            <div class="paragraph">
                <a class="twitter-follow-button"
                href="https://twitter.com/softdirex">
                Follow @Softdirex</a>
                

                <a class="twitter-share-button"
                href="https://twitter.com/intent/tweet?text='.$longTitle.' @softdirex">
                Tweet</a>

                <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: es_ES</script>
                <script type="IN/Share" data-url="https://www.softdirex.cl/'.$anio.'/'.$mes.'/'.$dia.'/'.$fileName.'"></script>
                
                <div class="fb-like" data-href="https://www.softdirex.cl/'.$anio.'/'.$mes.'/'.$dia.'/'.$fileName.'" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                
                <a href="https://api.whatsapp.com/send?text=Me%20gustaría%20compartirte%20esta%20info%20https://www.softdirex.cl/'.$anio.'/'.$mes.'/'.$dia.'/'.$fileName.'" style="border-radius: 7px; -moz-border-radius: 7px; -webkit-border-radius: 7px; display: inline-block; text-decoration: none; text-align: center; font-size: x-small; padding: 4px; color: white; background-color: green;" target="_blank"><i class="fa fa-whatsapp"></i>Compartir</a>         

            </div>
		</section>
		<hr>

		<?php include("complements/footer.php") ?>
		<!-- Scripts -->
		<script src="assets/js/jquery-3.1.0.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/jquery.magnific-popup.min.js"></script>
		<script src="assets/js/owl.carousel.min.js"></script>

		<script src="assets/js/script.js"></script>

	</body>
</html> ';

?>