<?php
echo"Votre message a bien été envoyé "; ?>
<br> <a href="../index.php">Retour</a>

<?php
require_once("../model/Manager.php");
$dbAcess=new Manager;
$bdd=$dbAcess->dbConnect();

$req = $bdd->prepare("INSERT INTO user( email, message, username, password) VALUES(?, ?, '', '')");
$req = $req->execute(array(htmlspecialchars($_POST['email']), htmlspecialchars($_POST['message'])));
  
$req=$bdd->query("SELECT email, message from user order by id desc limit 0,1 ");
$req = $req->fetch();
$message=$req['message'];
$email=$req['email'];
 
mail( 'kalidougattaba@gmail.com', 'Nouveau message', 'Bonjour Jean, ' .$email. ' vous a envoyé ce message: ' .$message );
/*$req=$bdd->query("SELECT max(id) as maxId from user ");
$req = $req->fetch();
$idM=$req['maxId'];
$req=$bdd->query("DELETE * FROM user where id=$idM ");