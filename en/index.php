<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SAR</title>
		<meta name="description" content="The first carpooling company in Albania." />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="generator" content="Codeply">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
		<link href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.1.1/animate.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
		<link rel="stylesheet" href="css/styles.css" />
	</head>
	<body>
		<?php
			include 'navbar.php';
		?>
		
		<header id="first">
			<div class="header-content">
				<div class="inner">
					<h1 class="cursive">Share A Ride</h1>
					<h4>The first carpooling company in Albania.</h4>
					<hr>
					<a href="offeraride.php" class="btn btn-primary btn-xl">Offer a ride</a> &nbsp;
					<a href="findaride.php" class="btn btn-primary btn-xl page-scroll">Find a ride</a>
				</div>
				
				<!-- <div class="HomeBlock-inner HomeBlock-pattern">
					<h1 class="HomeBlock-title HomeBlock-title--primary u-darkGray">Bringt Leben ins Auto</h1>
					<div class="HomeBlock-content">
                    <p class="HomeBlock-contentText">Mit BlaBlaCar reisen Sie gemeinsam im Auto und teilen die Kosten für Ihre Fahrt.</p>
                    
					<form id="search-form" class="u-marginNone u-flex" action="/search" role="search">
					<div class="c-input c-input--half">
					<img src="https://d1ovtcjitiy70m.cloudfront.net/vi-1/images/homepage/2016/icon-circle.svg" alt="" aria-hidden="true" class="c-input-icon" width="20" height="20">
					<input type="text" id="search_from_name" name="fn" class="c-input-field u-fullWidth place-autocomplete" placeholder="" data-autocomplete="name" autocomplete="off" data-js="form-input-from">
					<label for="search_from_name" class="c-input-label">
					<span>Von...</span>
					</label>
					</div>
					
					<div class="c-input c-input--half">
					<img src="https://d1ovtcjitiy70m.cloudfront.net/vi-1/images/homepage/2016/icon-circle.svg" alt="" aria-hidden="true" class="c-input-icon" width="20" height="20">
					<input type="text" id="search_to_name" name="tn" class="c-input-field u-fullWidth place-autocomplete" placeholder="" data-autocomplete="name" autocomplete="off" data-js="form-input-to">
					<label for="search_to_name" class="c-input-label">
					<span>Nach...</span>
					</label>
					</div>
					
					<div class="c-input c-input--half">
					<img src="https://d1ovtcjitiy70m.cloudfront.net/vi-1/images/homepage/2016/icon-calendar.svg" alt="" aria-hidden="true" class="c-input-icon" width="20" height="20">
					<input type="text" id="search_to_date" name="db" class="c-input-field datepicker hasDatepicker" readonly="readonly">
					<label for="search_to_date" class="c-input-label">
					<span>Datum</span>
					</label>
					</div>
					
					<button type="submit" class="c-input--half Home-button c-button c-button--primary c-button--wide">Fahrt finden</button>
					
					<input type="hidden" name="fc" data-autocomplete="coordinates" data-autocomplete-ref="search_from_name">
					<input type="hidden" name="fcc" data-autocomplete="country_code" data-autocomplete-ref="search_from_name">
					<input type="hidden" name="tc" data-autocomplete="coordinates" data-autocomplete-ref="search_to_name">
					<input type="hidden" name="tcc" data-autocomplete="country_code" data-autocomplete-ref="search_to_name">
					</form>
					
					</div>
				</div>-->
			</div>
			<video autoplay="" loop="" class="fillWidth fadeIn wow collapse in" data-wow-delay="0.5s" poster="img/img.jpg" id="video-background">
				<source src="video/Traffic-blurred2.mp4" type="video/mp4">Your browser does not support the video tag. I suggest you upgrade your browser.
			</video>
		</header>
		
		
		
		<?php
			include 'footer.php';
		?>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>
		<script src="js/scripts.js"></script>
	</body>
</html>