<?php
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');
require_once("model/EditoManager.php");
 
function update(){
         session_start();
        if (!isset($_SESSION['admin']) or (!$_SESSION['admin']=="admin")){
               echo"Pour accéder à cette page, vous devez vous connecter";
        }
         else{        
 
               $postManager = new PostManager();
               $post = $postManager->getPost($_GET['id']);   
               require('view/backend/viewUpdateSide.php');                           
       }
}
 
function delete(){
        $postManager = new PostManager();
        $post = $postManager->getPost($_GET['id']);
        require('delete.php');
}
 
function confirmUpdate(){
        $postManager = new PostManager();
        $post = $postManager->getPost($_GET['id']);   
        require('controller/update.php');                           
}
function updateEdito(){
        session_start();
        if (!isset($_SESSION['admin']) or (!$_SESSION['admin']=="admin")){
               echo"Pour accéder à cette page, vous devez vous connecter";
        }
        else{ 
               $req= new EditoManager();
               $req=$req->edito(); 
               require_once("view/backend/updateEditoView.php");
        }
}
 
function notReadComment(){
        $postManager = new PostManager();
        $post = $postManager->getPost($_GET['id']);     
        require('controller/notReadToRead.php');
}
 
function reported(){
        $postManager = new PostManager();
        $post = $postManager->getPost($_GET['id']);
        require('reported.php');
}
 
function deleteReportedComment(){
        $postManager = new PostManager();
        $post = $postManager->getPost($_GET['id']);
        $comment= new CommentManager();
        $cmt=$comment->getComments($_GET['id']);
        require_once("controller/deleteReportedComment.php");
}
 
function reportedCommentsManager(){
        $postManager = new PostManager();
        $post = $postManager->getPost($_GET['id']);
        require('controller/reportedCommentsManager.php');
}
function adChapter(){
        $req=new PostManager();
        $req=$req->adChapter();
        require_once("view/backend/viewAddChapter.php");
}
function disconnect(){      
        session_start();
        if (isset($_SESSION['admin'])){                
               session_destroy(); 
               $fp=fopen("../view/backend/.htaccess", "w"); 
               fwrite($fp,"Order deny,\n allow Deny from all.htaccess");  
               header('Location:index.php');     
        }
        else{ 
               echo "Vous n'êtes pas connecté.";
       }
}
