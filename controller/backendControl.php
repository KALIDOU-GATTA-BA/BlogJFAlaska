<?php
require_once("model/PostManager.php");
require_once("model/EditoManager.php");
require_once("model/UserManager.php");
require_once("model/CommentManager.php");

function dashboardConnect(){
    $req=new UserManager();
    $req=$req-> verification();
    $usn=$req['username'];
    $hash=$req['password'];
    if ( (password_verify($_POST['password'], $hash)&&($_POST['username'] === $usn)) ) {      
           $fichier = '../view/backend/.htaccess';
           @unlink( $fichier ) ;          
            session_start();
            $_SESSION["username"]="jean";
            $_SESSION['admin']="admin";
            $req1= new EditoManager();
            $req1=$req1->edito();
            $edito=$req1;

            $req2=new PostManager();
            $req2 = $req2->fetchPostsBackView();
            $posts=$req2;

            $req3=new PostManager();
            $count=$req3->fetchCountNotReadComments();

            $req4=new PostManager();
            $req4=$req4->fetchNotReadComments();
            $req6=new PostManager();
            $count1=$req6->fetchCountReportedComments();
            $req7=new PostManager();
            $req7=$req7->fetchReportedComments();

          require_once("view/backend/indexBackend.php");
    }else {
      echo"Pour accèder à cette page, vous devez vous ";?><a href="view/frontend/login.php">authentifier</a>
   <?php }
} ?> 