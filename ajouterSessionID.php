<?php
$servername= "localhost";
$username = "u835127795_admin";
$password = "helha123";
$db = "u835127795_proj";

try 
{
	$conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    header('Location: index.php'); 
   $session_id = $_POST["session_id"];
    $email = $_POST['email'];


    echo "coucou";

	$requete=$conn->prepare("UPDATE user SET session_id = '".$session_id."' WHERE email LIKE '".$email."' "); 


	$requete->execute();


} catch (PDOexception $e) {
	echo("PDO");
	
	echo $e;

}

?>