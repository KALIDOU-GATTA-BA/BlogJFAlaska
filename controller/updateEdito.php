<?php
require_once("../model/PostManager.php");

$req= new PostManager();
$req=$req->updateEdito(); 

?>
 <a href="../view/backend/indexBackend.php">Retour</a> 