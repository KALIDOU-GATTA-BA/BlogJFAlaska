<?php
     require_once("model/PostManager.php");
    $req=new PostManager();
    $req=$req->delete();
    echo "Le Chapitre a bien été supprimé!" .'<br><br>'.'<a href="../view/backend/indexBackend.php"> Retour </a>';