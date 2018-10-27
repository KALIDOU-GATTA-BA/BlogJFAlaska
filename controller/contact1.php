<?php

          require_once("../model/MailsManager.php");
          $req=new MailsManager();
          $req=$req->emails();
          $message=$req['messages'];
          $email=$req['emails'];
  
          mail( 'kalidougattaba@gmail.com', 'Nouveau message', 'Bonjour Jean, ' .$email. ' vous a envoyé ce message: ' .$message );

          echo"Votre message a bien été envoyé "; ?>

         <br> <a href="../index.php">Retour</a> 
