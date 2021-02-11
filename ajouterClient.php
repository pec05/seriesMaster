<?php
$servername= "localhost";
$username = "u835127795_admin";
$password = "helha123";
$db = "u835127795_proj";

try 
{
	$conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	header('Location: login.php'); 
	//$token = $_POST['tok'];
	//header('Location: https://www.themoviedb.org/authenticate/'.$token.'?redirect_to=http://seriesmaster.online/login.php');
	

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$adresse = $_POST["adresse"];
$ville = $_POST["ville"];
$cp = $_POST["cp"];
$pays = $_POST["pays"];
$telephone = $_POST["tel"];
$email = $_POST["email"];
$mdp = $_POST["mdp"];


$requete=$conn->prepare("insert into user(nomcli, prenomcli, telcli, email, codepostal,  adresse, ville, pays, pass, admin) 
values('".$nom."', '".$prenom."', '".$telephone."', '".$email."', '".$cp."', '".$adresse."','".$ville."', '".$pays."', '".$mdp."', '0')");

$requete->execute();
	  
} catch (PDOexception $e) {
	echo("PDO");


}



?>