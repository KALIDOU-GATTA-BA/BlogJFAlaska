<?php
require_once("Manager.php");

class UserManager extends Manager
{
      public function verification(){

          $db=$this->dbConnect();
          $req=$db->query('SELECT * FROM user');
          $data=$req->fetch();
          $usn=$data['username'];
          $hash=$data['password'];
         if (password_verify($_POST['password'], $hash)&&($_POST['username'] === $usn))
                { 
                
                $_SESSION['username'] = $username;
                header('Location:../view/backend/indexBackend.php');
           }       
        else
            {
           echo"Utilisateur ou mot de passe incorrect !"; ?>
            <a href="login.php">Réessayer</a> <?php
        } 

      }

}