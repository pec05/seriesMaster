<?php

include ('config.php');
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['email']);
	  $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
	  
      //$mysession = mysqli_real_escape_string($db, $_POST['session_id']);
      
	  $sql = "SELECT * FROM user WHERE email like '$myusername' and pass like '$mypassword'";

	  $result = mysqli_query($db,$sql);
		if (!$result) {
			printf("Error: %s\n", mysqli_error($db));
			exit();
		}
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row
		
	  $_SESSION['login_admin'] = $row["admin"];
	  $_SESSION['first_co'] = true;
		// $_SESSION['isAdmin'] = $sql -> $row['admin'] 


      if($count == 1) {
		 $_SESSION['login_email'] = $myusername;
		 //$_SESSION['sessionID'] = $mysession;
         header("location: index.php");
      }else {
		 $error = "Your Login Name or Password is invalid";
		 print('<font color="red">'.$error.'</font>'); 
      }
   }

?>

<head>
	<title>Page Client</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
	 <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<div class="container">

		<form class="form-signin" action="" method="POST">
			<h2 class="form-signin-heading">Connectez-vous</h2>
			<label for="inputPassword" class="sr-only">Adresse Email</label>
			<input type="email" id="inputEmail" name="email" class="form-control" placeholder="Adresse Email" required autofocus>
			<label for="inputPassword" class="sr-only">Mot de passe</label>
			<input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" required>
			<button class="btn btn-lg btn-primary btn-block" name="connexion" type="submit">Se connecter</button>
			<br/> Pas encore inscrit?
			<a href="register.html">Inscrivez vous</a>
		
		</form>

	</div>

</body>

</html>






