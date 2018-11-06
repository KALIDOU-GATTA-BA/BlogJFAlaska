<?php
 
    require_once("../model/UserManager.php");
 
    $req=new UserManager();
    $req=$req-> verification();
    if(isset ($_SESSION["admin"]) &&  ($_SESSION["admin"]=="admin")){
                    $fichier = '../view/backend/.htaccess';
                    @unlink( $fichier ) ;
                    header('Location:../view/backend/indexBackend.php');    
    }
    else{
                    echo"Identifiant ou mot de passe incorrect, veuillez" ; ?> <a href="login.php"> réessayer </a>
<?php } ?>
