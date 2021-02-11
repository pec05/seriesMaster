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

    <script src="js/session_id.js"></script>
    
</head>
<body>
  <?php
    session_start();
    ?>
    <!--*********************************BARRE DE NAVIGATION***************************************************-->
    <nav class="navbar navbar-default navbar-expand-lg navbar-dark bg-dark">
      <div class="navbar-header d-flex col">
        <a class="navbar-brand" href="#">Series<b>Master</b></a>      
        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle navbar-toggler ml-auto">
          <span class="navbar-toggler-icon"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
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
    <?php
    $token = $_GET['request_token'];
    ?>
    <div class="main-block">
        <div class="about">
            <div class="about__masthead about-section">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="about-masthead">
                                <h1 class="about-primary-title">It's done !</h1>
                                <p class="about-body-text"> Thank you for linked! Enjoy our website. </p>
                                <form method="post" action="ajouterSessionID.php">
                                 <input type="hidden" name="email" value = "<?php echo $_SESSION['login_email']?>"></input>  
                                  <input type="hidden" id="session_id" name="session_id">
                                  <button type="submit" class="form-control">Back to lobby.</button>
                                </form>	
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
		$(document).ready(function(){
			var session = get_session_id('<?php  echo $token ?>');
			console.log(session);
		})
	</script>
    
    
</body>

</html>