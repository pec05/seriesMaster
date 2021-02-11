<!DOCTYPE html>
<html>
<head>
  <title>Link TMDb &bull; SeriesMaster</title>
  <meta charset="utf-8"> 

    <link rel="stylesheet" 
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous"
    >

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>

    <script src="js/token.js"></script>
    
</head>
<body>
  <?php
    session_start();
    ?>
    <!--*********************************BARRE DE NAVIGATION***************************************************-->
    <nav class="navbar navbar-default navbar-expand-lg navbar-dark bg-dark">
      <div class="navbar-header d-flex col">
        <a class="navbar-brand" href="/index.php">Series<b>Master</b></a>      
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
          <li class="nav-item"><a href="/index.php" class="nav-link">ACCUEIL</a></li>
          <!--*********************************Menu Séries***************************************************-->  
          <li class="nav-item dropdown">
            <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">MENU SERIES<b class="caret"></b></a>
            <ul class="dropdown-menu">          
              <li><a href="API/mostPopular.php" class="dropdown-item">Most Popular</a></li>
              <li><a href="API/topRated.php" class="dropdown-item">Best rated</a></li>
            </ul>
          </li>
          <!--*********************************Menu Genres***************************************************-->  
          <li class="nav-item dropdown">
            <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">MENU GENRES<b class="caret"></b></a>
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
        </ul>
        <!--*********************************Gestion des comptes de***************************************************-->
          <?php if(isset($_SESSION['login_admin'])):?>
                <?php if($_SESSION['login_admin'] == 1): ?>
          <li class="nav-item"><a href="../gestion.php" class="nav-link">Gestion</a></li>
          <?php endif;?>
                <?php endif; ?>

        <!--*********************************Recherche***************************************************-->
        <form class="navbar-form form-inline">
          <div class="input-group search-box">                
            <input type="text" id="search" class="form-control" placeholder="Rechercher ici...">
            <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
          </div>
        </form>

        <!--*********************************Log-in & Inscriptions***************************************************-->
        <ul class="nav navbar-nav navbar-right ml-auto">
          <?php if(isset($_SESSION['login_email'])): ?>
          <li class="nav-item"><a href="../logout.php" class="nav-link">Déconnexion</a></li>
          <?php else: ?>
          <li class="nav-item"><a href="../register.html" class="nav-link">Inscription</a></li>

          <li class="nav-item"><a href="../login.php" class="nav-link">Connexion</a></li>
          <?php endif; ?>
          
        </ul>

      </div>
    </nav>

  <div class="container">
  

    <?php if(isset($_SESSION['login_email'])): ?>
        <?php if($_SESSION['first_co'] == true): ?>

            <div class="alert alert-success alert-dismissible">
            <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Succès!</strong> Vous êtes connecté.
            </div>
        <?php 
            $_SESSION['first_co'] = false;
        endif; ?>
    <?php endif; ?>
    </div>

</body>
<body >
    
    <div class="main-block">
        <div class="about">
            <div class="about__masthead about-section">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="about-masthead">
                                <h1 class="about-primary-title">Link to the The Movie Database site</h1>
                                <p class="about-body-text"> In order to use all the features of the site, please link to the tmdb site </p>
                                <a id="link_tmdb" href="https://www.themoviedb.org/authenticate/?redirect_to=http://seriesmaster.online/link_out.php"/><img src="css/images/312x276-primary-green-74212f6247252a023be0f02a5a45794925c3689117da9d20ffe47742a665c518.png" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function(){
            var tok =token();
            console.log(tok);
            $("#link_tmdb").attr("href","https://www.themoviedb.org/authenticate/"+tok+"?redirect_to=http://seriesmaster.online/link_out.php");
            console.log($("#link_tmdb").attr("href","https://www.themoviedb.org/authenticate/"+tok+"?redirect_to=http://seriesmaster.online/link_out.php"));
		})
    </script>
    
    
</body>

</html>