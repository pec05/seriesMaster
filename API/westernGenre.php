<!DOCTYPE html>
<html>
<head>
  <title>Western series &bull; SeriesMaster</title>
  <meta charset="utf-8"> 

    <link rel="stylesheet" 
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous"
    >

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
   
    
</head>
<body>
  <?php
    session_start();
    ?>
    <!--*********************************BARRE DE NAVIGATION***************************************************-->
    <nav class="navbar navbar-default navbar-expand-lg navbar-dark bg-dark">
      <div class="navbar-header d-flex col">
        <a class="navbar-brand" href="../index.php">Series<b>Master</b></a>      
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
          <li class="nav-item"><a href="../index.php" class="nav-link">Home</a></li>
          <!--*********************************Menu Séries***************************************************-->  
          <li class="nav-item dropdown">
            <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Best of<b class="caret"></b></a>
            <ul class="dropdown-menu">          
              <li><a href="mostPopular.php" class="dropdown-item">Most Popular</a></li>
              <li><a href="topRated.php" class="dropdown-item">Best rated</a></li>
            </ul>
          </li>
          <!--*********************************Menu Genres***************************************************-->  
          <li class="nav-item dropdown">
            <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Genres<b class="caret"></b></a>
            <ul class="dropdown-menu">          
              <li><a href="actionGenre.php" class="dropdown-item">Action & Adventure </a></li>
              <li><a href="animationGenre.php" class="dropdown-item">Animation</a></li>
              <li><a href="comedyGenre.php" class="dropdown-item">Comedy</a></li>
              <li><a href="crimeGenre.php" class="dropdown-item">Crime</a></li>
              <li><a href="documentaryGenre.php" class="dropdown-item">Documentary</a></li>
              <li><a href="dramaGenre.php" class="dropdown-item">Drama</a></li>
              <li><a href="familyGenre.php" class="dropdown-item">Family</a></li>
              <li><a href="kidsGenre.php" class="dropdown-item">Kids</a></li>
              <li><a href="mysteryGenre.php" class="dropdown-item">Mystery</a></li>
              <li><a href="newsGenre.php" class="dropdown-item">News</a></li>
              <li><a href="realityGenre.php" class="dropdown-item">Reality</a></li>
              <li><a href="scFantGenre.php" class="dropdown-item">Sci-Fi & Fantasy</a></li>
              <li><a href="soapGenre.php" class="dropdown-item">Soap</a></li>
              <li><a href="talkGenre.php" class="dropdown-item">Talk</a></li>
              <li><a href="warGenre.php" class="dropdown-item">War & Politics</a></li>
              <li><a href="westernGenre.php" class="dropdown-item">Western</a></li>
            </ul>
          </li>
          <!--*********************************A propos de***************************************************-->
          <li class="nav-item"><a href="/about.php" class="nav-link">About</a></li>  
          <!--*********************************Contact***************************************************-->
          <li class="nav-item"><a href="/about.php#contact" class="nav-link">Contact</a></li>
        
        <!--*********************************Gestion des comptes de***************************************************-->
          <?php if(isset($_SESSION['login_admin'])):?>
                <?php if($_SESSION['login_admin'] == 1): ?>
          <li class="nav-item"><a href="../gestion.php" class="nav-link">Gestion</a></li>
          <?php endif;?>
                <?php endif; ?>
		</ul>
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

        <!--*********************************Log-in & Inscriptions***************************************************-->
        <ul class="nav navbar-nav navbar-right ml-auto">
          <?php if(isset($_SESSION['login_email'])): ?>
          <li class="nav-item"><a href="../logout.php" class="nav-link">Logout</a></li>
          <?php else: ?>
          <li class="nav-item"><a href="" class="btn btn-default btn-rounded nav-link" data-toggle="modal" data-target="#darkModalLRForm">Login/Sign Up</a></li>
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
  <?php endif; ?>
</div>

<!--*****************Séries les plus populaires ***-->

<div class ="main_search">
	<div class="main_search_remove">
    <div class="genre-main">
      <div class="genre-section">
        <h3 class="genre-title">
          All western series
        </h3>
        <?php if(isset($_SESSION['login_email'])): ?>
        <body onload="sortTv('western','connected','<?php echo $_SESSION['sessionID']?>');">
        <?php else: ?>
        <body onload="sortTv('western','notconnected','undefined');">
        <?php endif; ?>

        <div class="row text-center main">
        </div>
        <div class="row text-center row-eq-height bottom">
          <div class="col-sm-12">
            <i class="fas fa-plus-circle moreTV"></i>
          </div>  
        </div>
      </div>
    </div>
  </div>
</div>
<!--*********************************Modal: Login / Register Form***************************************************-->
<div class="modal fade" id="darkModalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog cascading-modal form-dark" role="document">
			<!--Content-->
			<div class="modal-content card card-image" style="background-image: url('../css/images/wallhaven-665436.jpg');">
				<div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">
					<!--Modal cascading tabs-->
					<div class="modal-c-tabs">
						<!-- Nav tabs / headers -->
						<button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
						</button>
						<ul class="nav nav-tabs md-tabs tabs-2 " role="tablist">
							<li class="nav-item" >
								<a class="nav-link active" data-toggle="tab" href="#login_modal" role="tab" ><i class="fas fa-user mr-1"></i>
									<h3 class="modal-title w-100 white-text font-weight-bold" id="myModalLabel"><strong>Log<h3 class=" font-weight-bold inline" style="color:green;"> IN </h3></strong>
									</h3>
								</a>
							</li>
							<li class="nav-item" >
								<a class="nav-link" data-toggle="tab" href="#signup_modal" role="tab"><i class="fas fa-user-plus mr-1"></i>
									<h3 class="modal-title w-100 white-text font-weight-bold" id="myModalLabel"><strong>Sign <h3 class=" font-weight-bold inline" style="color:green;"> UP </h3></strong>
									</h3>
								</a>
							</li>							
						</ul>
						<!-- Tab panels -->
						<div class="tab-content">
							<!--Panel login_modal-->
							<div class="tab-pane fade in show active" id="login_modal" role="tabpanel">
								<!--Body-->
								<form class="form-signin" action="../login.php" method="POST">
									<div class="modal-body mb-1">
									
										<div class="md-form form-sm mb-5">
											<i class="fas fa-envelope prefix"></i>
											<input type="email" id="inputEmail" name="email" class="form-control form-control-sm white-text validate" required autofocus>
											<label data-error="wrong" data-success="right" for="inputEmail">Your email</label>
										</div>
										
										<div class="md-form form-sm mb-4">
											<i class="fas fa-lock prefix"></i>
											<input type="password" name="password" id="password" class="form-control form-control-sm white-text validate" required>
											<label data-error="wrong" data-success="right" for="password">Your password</label>
										</div>
										<div class="text-center mb-3 col-md-12">
											<button type="submit" class="form-control btn btn-success btn-block btn-rounded z-depth-1">Log in</button>
										</div>
									</div>
								</form>
								<div class="modal-footer">
									<button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
								</div>
							</div>
							<!--Fin panel login-->
							<!--Panel SignUp_modal-->
							<div class="tab-pane fade" id="signup_modal" role="tabpanel">
								<!--Body-->
								<form method="post" action="../ajouterClient.php">
									<div class="modal-body mb-1">
										<div class="md-form form-sm mb-5">
											<i class="fas fa-user-circle"></i>
											<input type="text" id="su_name" name="nom" class="form-control form-control-sm validate white-text">
											<label data-error="wrong" data-success="right" for="su_name">Your name</label>
										</div>

										<div class="md-form form-sm mb-5">
											<i class="fas fa-signature"></i>
											<input type="text" id="su_first_name" name="prenom" class="form-control form-control-sm validate white-text">
											<label data-error="wrong" data-success="right" for="su_first_name">Your first name</label>
										</div>

										<div class="md-form form-sm mb-5">
											<i class="fas fa-map-pin"></i>
											<input type="text" id="su_adress" name="adresse" class="form-control form-control-sm validate white-text">
											<label data-error="wrong" data-success="right" for="su_adress">Your address</label>
										</div>

										<div class="md-form form-sm mb-5">
											<i class="fas fa-city"></i>
											<input type="text" id="su_city" name="ville" class="form-control form-control-sm validate white-text">
											<label data-error="wrong" data-success="right" for="su_city">Your city</label>
										</div>

										<div class="md-form form-sm mb-5">
											<i class="fas fa-box"></i>
											<input type="text" id="su_cp" name="cp" class="form-control form-control-sm validate white-text">
											<label data-error="wrong" data-success="right" for="su_cp">Your Postal Code</label>
										</div>

										<div class="md-form form-sm mb-5">
											<i class="fas fa-globe-europe"></i>
											<input type="text" id="su_country" name="pays" class="form-control form-control-sm validate white-text">
											<label data-error="wrong" data-success="right" for="su_country">Your country</label>
										</div>

										<div class="md-form form-sm mb-5">
											<i class="fas fa-mobile-alt"></i>
											<input type="tel" id="su_phone" name="tel" class="form-control form-control-sm validate white-text">
											<label data-error="wrong" data-success="right" for="su_phone">Your phone</label>
										</div>

										<div class="md-form form-sm mb-5">
											<i class="fas fa-envelope prefix"></i>
											<input type="email" id="su_email" name="email" class="form-control form-control-sm validate white-text">
											<label data-error="wrong" data-success="right" for="su_email">Your email</label>
										</div>

										<div class="md-form form-sm mb-5">
											<i class="fas fa-lock prefix"></i>
											<input type="password" id="su_mdp" name="mdp" class="form-control form-control-sm validate white-text">
											<label data-error="wrong" data-success="right" for="su_mdp">Your password</label>
										</div>

										<div class="text-center form-sm mt-2">
											<button type="submit" class="form-control btn btn-success btn-block btn-rounded z-depth-1">Sign up</button>
										</div>
									</div>
								</form>
								<div class="modal-footer">
									<button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
								</div>
							</div>
							<!--END OF PANEL SIGN UP-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>   
 <script type="text/javascript" src="../js/genre.js"></script>
</body>

</html>