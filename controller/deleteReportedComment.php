<?php 
     require_once("model/CommentManager.php");
   
    $req=new CommentManager();
    $req=$req->deleteReportedComment();

    echo 'Le commentaire a bien été supprimé. <br> <br> <a href="../view/backend/indexBackend.php">Retour</a>';