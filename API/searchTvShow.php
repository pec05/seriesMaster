<!DOCTYPE html>
<html>
<head>
  <title>Search Series &bull; SeriesMaster</title>
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

    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
    
    <script type="text/javascript" src="../js/genre.js"></script>
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
          <li class="nav-item"><a href="../index.php" class="nav-link">ACCUEIL</a></li>
          <!--*********************************Menu Séries***************************************************-->  
          <li class="nav-item dropdown">
            <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">MENU SERIES<b class="caret"></b></a>
            <ul class="dropdown-menu">          
              <li><a href="mostPopular.php" class="dropdown-item">Most Popular</a></li>
              <li><a href="topRated.php" class="dropdown-item">Best rated</a></li>
            </ul>
          </li>
          <!--*********************************Menu Genres***************************************************-->  
          <li class="nav-item dropdown">
            <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">MENU GENRES<b class="caret"></b></a>
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
        </ul>
        <!--*********************************Gestion des comptes de***************************************************-->
          <?php if(isset($_SESSION['login_admin'])):?>
                <?php if($_SESSION['login_admin'] == 1): ?>
          <li class="nav-item"><a href="../gestion.php" class="nav-link">Gestion</a></li>
          <?php endif;?>
                <?php endif; ?>

        <!--*********************************Recherche***************************************************-->
        <form class="navbar-form form-inline">
          <div class="search">       
            <input type="text" id="search" placeholder="Search series" onKeyPress="return checkSubmit(event)">
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
    <strong>Success!</strong> You are connected.
  </div>
        <?php 
        $_SESSION['first_co'] = false;
        endif; ?>
  <?php endif; ?>
</div>

<!--***************************************************Genre **************************************************************-->
<div class="genre-main">
  <div class="genre-section">
    <h3 class="genre-title">
     Recherche
    </h3>
    <?php if(isset($_SESSION['login_email'])): ?>
    <div class="row text-center main">
    </div>
    <div class="row text-center row-eq-height bottom">
      <div class="col-sm-12">
        <i class="fas fa-plus-circle moreTV"></i>
      </div>  
    </div>
  </div>
</div>
</body>    
 <script type="text/javascript" src="../js/genre.js"></script>
</body>

</html>