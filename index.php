<!DOCTYPE html>
<html>
	<head>
		<title>SeriesMaster</title>
		<meta charset="utf-8"> 

		<link rel="stylesheet" 
		href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
		crossorigin="anonymous"
		>

		<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
		<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
		<link rel="stylesheet" type="text/css" href="css/style.css?v=<?=time()?>"/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
      

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	  	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	


		<script type="text/javascript" src="/js/carousel_popular.js"></script>
		

		
	</head>

	<body> 
		<?php
		session_start();
		include ('config.php');
		?>
		<?php if(isset($_SESSION['login_email'])): ?>
		<!--Si on est connecté on recherche le sessionID à ne faire que sur l'index-->
		<?php 
			$myusername = $_SESSION['login_email']; 
			$sql = "SELECT session_id from user where email like '$myusername'";
			$result = mysqli_query($db,$sql);
			if (!$result) {
				printf("Error: %s\n", mysqli_error($db));
				exit();
			}
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			$_SESSION['sessionID'] = $row["session_id"];
		?>
		<?php endif;?>
		
		<!--*********************************BARRE DE NAVIGATION***************************************************-->
		<nav class="navbar navbar-default navbar-expand-lg navbar-dark bg-dark">
			<div class="navbar-header d-flex col">
				<a class="navbar-brand" href="index.php">Series<b>Master</b></a>  		
				<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle navbar-toggler ml-auto">
					<span class="navbar-toggler-icon"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- Collection of nav links, forms, and other content for toggling -->
			<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
				<ul class="nav navbar-nav">
					<!--*********************************Accueil de***************************************************-->
					<i class="fa fa-home" aria-hidden="true"></i>
					<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
					<!--*********************************Menu Séries***************************************************-->	
					<li class="nav-item dropdown">
						<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Best of<b class="caret"></b></a>
						<ul class="dropdown-menu">					
							<li><a href="API/mostPopular.php" class="dropdown-item">Most Popular</a></li>
              				<li><a href="API/topRated.php" class="dropdown-item">Best rated</a></li>
						</ul>
					</li>
					<!--*********************************Menu Genres***************************************************-->	
					<li class="nav-item dropdown">
						<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Genres<b class="caret"></b></a>
						<ul class="dropdown-menu">					
							<li><a href="API/actionGenre.php" class="dropdown-item">Action & Adventure </a></li>
							<li><a href="API/animationGenre.php" class="dropdown-item">Animation</a></li>
							<li><a href="API/comedyGenre.php" class="dropdown-item">Comedy</a></li>
							<li><a href="API/crimeGenre.php" class="dropdown-item">Crime</a></li>
							<li><a href="API/documentaryGenre.php" class="dropdown-item">Documentary</a></li>
							<li><a href="API/dramaGenre.php" class="dropdown-item">Drama</a></li>
							<li><a href="API/familyGenre.php" class="dropdown-item">Family</a></li>
							<li><a href="API/kidsGenre.php" class="dropdown-item">Kids</a></li>
							<li><a href="API/mysteryGenre.php" class="dropdown-item">Mystery</a></li>
							<li><a href="API/newsGenre.php" class="dropdown-item">News</a></li>
							<li><a href="API/realityGenre.php" class="dropdown-item">Reality</a></li>
							<li><a href="API/scFantGenre.php" class="dropdown-item">Sci-Fi & Fantasy</a></li>
							<li><a href="API/soapGenre.php" class="dropdown-item">Soap</a></li>
							<li><a href="API/talkGenre.php" class="dropdown-item">Talk</a></li>
							<li><a href="API/warGenre.php" class="dropdown-item">War & Politics</a></li>
							<li><a href="API/westernGenre.php" class="dropdown-item">Western</a></li>
						</ul>
					</li>
					<!--*********************************A propos de***************************************************-->
					<li class="nav-item"><a href="/about.php" class="nav-link">About</a></li>  
					<!--*********************************Contact***************************************************-->
					<li class="nav-item"><a href="/about.php#contact" class="nav-link">Contact</a></li>
					<!--*********************************Gestion des comptes de***************************************************-->
					<?php if(isset($_SESSION['login_admin'])):?>
            		<?php if($_SESSION['login_admin'] == 1): ?>
					<li class="nav-item"><a href="gestion.php" class="nav-link">Gestion</a></li>
					<?php endif;?>
            		<?php endif; ?>

				<!--*********************************Recherche***************************************************-->
				<form class="navbar-form form-inline">
					<div class="input-group search-box">	
						<?php if(isset($_SESSION['login_email'],$_SESSION['sessionID'])): ?>							
						<input type="text" id="search" placeholder="Search series" onKeyPress="return checkSubmit(event,'connected','<?php echo $_SESSION['sessionID']?>')">
						<?php else: ?>
						<input type="text" id="search" placeholder="Search series" onKeyPress="return checkSubmit(event,'notconnected','undefined')">
						<?php endif;?>
						<span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
					</div>
				</form>
				<!--*********************************Profil & Watchlist***************************************************-->
				<?php if(isset($_SESSION['login_email'],$_SESSION['sessionID'])): ?>
				<li class="nav-item dropdown">
					<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Account<b class="caret"></b></a>
					<ul class="dropdown-menu">					
						<li><a href="myProfil.php" class="dropdown-item">MyProfil</a></li>
              			<li><a href="watchlist.php" class="dropdown-item">Watchlist</a></li>
					</ul>
				</li>
				<?php endif; ?>

				<!--*********************************Log-in & Inscriptions***************************************************-->
				<ul class="nav navbar-nav navbar-right ml-auto">
					<?php if(isset($_SESSION['login_email'])): ?>
					<li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
					<?php else: ?>
					<li class="nav-item"><a href="register.html" class="nav-link">Sign up</a></li>

					<li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
					<?php endif; ?>
					
				</ul>

			</div>
		</nav>

	<div class="container">
  

  	<?php if(isset($_SESSION['login_email'])): ?>
		<?php if($_SESSION['first_co'] == true): ?>
		<div class="alert alert-success alert-dismissible">
		<a class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Success!</strong> You are connected. 
		</div>
		<?php 
			$_SESSION['first_co'] = false;
		endif; ?>

		<?php if(empty($_SESSION['sessionID'])): ?> 
		<div class="alert alert-warning" role="alert">
		Your account is not linked to The Movie Database. Please click here to <a href="link_in.php" class="alert-link">link it</a>.
		</div>
		<?php endif; ?>
  		<?php endif; ?>
	</div>

		<!--Div utilisé pour la méthode search-->
	<div class ="main_search">
		<div class="main_search_remove">

		<!--*********************************CAROUSEL D'IMAGES***************************************************-->
	

		<div class="tv_trending">
			<div class="container-fluid">
				<div class="row">
					<div class="trending_show_description col-md-6 col-md-push-3 col-md-12 hide-xs" id="title_carousel">
						<h3>
							Come watch the brand new series  
						</h3>
						<p>
							Stay tuned ! Each day discover the most popular shows and receive recommendations for your next experience 
						</p>
					</div>
				</div>

				

				<div class="row" id="carousel_image" dataride  >
																	
					
				</div>
			</div>
		</div>	

		<!--*********************************Data base***************************************************-->
		<div class="db_provided">
			<div class="container-fluid">
				<div class="row">
					<div class="db_provided_description col-md-6 col-md-push-3 col-md-12 hide-xs">
						<h3>
							<br />
							The Data Base we used is provided by  <a href="https://www.themoviedb.org" target="_blank"/><img src="css/images/312x276-primary-green-74212f6247252a023be0f02a5a45794925c3689117da9d20ffe47742a665c518.png"/></a>
						</h3>
					</div>
				</div>
			</div>
		</div>

		<!--*********************************Footer***************************************************-->

		<footer class="seriesm-footer edge--top--reverse">
			<div class="container">
				<div class="seriesm-footer_branding">
					Series<b>Master</b>
					<p class="made-with-love">Made with <img src="css/images/heart-small.png"> in Mons</p>
				</div>
			</div>
			<div class="container-fluid">
				<div class="container">					
					<div class="seriesm-footer_links">
						<ul class="list-unstyled list-inline" id="footer-inline">
							<li><a href="/about.php">About</a></li>
							<li><a href="/about.php#contact">Contact</a></li>
							<li><a href="https://www.themoviedb.org" target="_blank">API-TMDb</a></li>
						</ul>
					</div>
				</div>
			</div>	
		</footer>
	</div>	
	</div>	

		<script type="text/javascript">
			(function() {
				window.tmdb = {
				"api_key": "7e9bf83aab5dab37c959ba59b82e59d6",
				"base_uri": "https://api.themoviedb.org/3",
				"images_uri": "http://image.tmdb.org/t/p",
				"timeout": 5000,
				"size": "/w342",
				call: function(url, params, success, error) {
					var params_str = "api_key=" + tmdb.api_key;
					for (var key in params) {
					if (params.hasOwnProperty(key)) {
						params_str += "&" + key + "=" + encodeURIComponent(params[key]);
					}
					}
					var xhr = new XMLHttpRequest();
					xhr.timeout = tmdb.timeout;
					xhr.ontimeout = function() {
					throw ("Request timed out: " + url + " " + params_str);
					};
					xhr.open("GET", tmdb.base_uri + url + "?" + params_str, true);
					xhr.setRequestHeader('Accept', 'application/json');
					xhr.responseType = "text";
					xhr.onreadystatechange = function() {
					if (this.readyState === 4) {
						if (this.status === 200) {
						if (typeof success == "function") {
							success(JSON.parse(this.response));
						} else {
							throw ('No success callback, but the request gave results')
						}
						} else {
						if (typeof error == "function") {
							error(JSON.parse(this.response));
						} else {
							throw ('No error callback')
						}
						}
					}
					};
					xhr.send();
				}
				}
			})()

			
				tmdb.call('/trending/tv/week', {},
				function(e) {
					var carousel_image = document.getElementById('carousel_image');
					carousel_image.innerHTML = '';
					var results = Object.keys(e.results);
					console.log("Success: " + e);
					console.log(e.results);
					for (var i = 0; i < e.results.length; i++) {
					console.log(JSON.stringify(e.results[i]));
					var show = document.createElement('div');
					show.id = i;
					var json = e.results[i];
					var poster = tmdb.images_uri + tmdb.size + e.results[i].poster_path;
					var img = new Image();
					img.src = poster;
					carousel_image.appendChild(show);
					show.appendChild(img);
					if (img.src === 'http://image.tmdb.org/t/p/w500null') {
						img.src = 'http://colouringbook.org/SVG/2011/COLOURINGBOOK.ORG/cartoon_tv_black_white_line_art_scalable_vector_graphics_svg_inkscape_adobe_illustrator_clip_art_clipart_coloring_book_colouring-1331px.png';
					}
					};
					$(document).ready(function(){
						$('#carousel_image').slick({
							centerPadding: "40px",						
							slidesToShow: 4,
							slidesToScroll: 1,
							autoplay: true,
							autoplaySpeed: 3000, 	
							arrows : true,
							prevArrow : "<div class='slick-arrow--left' style='display: block;'><i class='material-icons'></i></div>",	
							nextArrow : "<div class='slick-arrow--right' style='display: block;'><i class='material-icons'></i></div>",
							responsive: [
											{
												breakpoint: 1024,
												settings: {
													slidesToShow: 4,
													slidesToScroll: 4,
												}
											},
											{
												breakpoint: 800,
												settings: {
													slidesToShow: 2,
													slidesToScroll: 2
												}
											},
											{
												breakpoint: 480,
												settings: {
													slidesToShow: 1,
													slidesToScroll: 1
												}
											}
										]
						});
					});  
				},
				function(e) {
					console.log("Error: " + e)
				})
			
		</script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="slick/slick.min.js"></script>
 		<script type="text/javascript" src="js/genre.js"></script>

	</body>
</html>


