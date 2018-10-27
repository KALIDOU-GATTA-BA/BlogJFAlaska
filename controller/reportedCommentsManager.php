<?php 
   require_once("model/CommentManager.php");

   $req= new CommentManager();
   $req= $req->reportedCommentsManager();

    echo 'Vous avez approuvé ce commentaire. <br> <br> <a href="../view/backend/indexBackend.php">Retour</a>';