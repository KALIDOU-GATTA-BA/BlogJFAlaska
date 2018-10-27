<?php
    require_once("model/PostManager.php");
    
   $req=new PostManager();
   $req= $req->update();

   require_once("view/backend/viewUpdateConfirmation.php");