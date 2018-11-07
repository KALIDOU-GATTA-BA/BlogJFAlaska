<?php
 
require_once('controller/frontend.php');
require_once('controller/backend.php');
require_once("controller/backendControl.php");
 
try{ 
        if(!isset($_GET['action'])){
            $_GET['action']='listPosts';
        }
 
        if(!isset($_GET['page']) or !is_numeric($_GET['page'])){
            $_GET['page']=1;
        }
 
        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                  case 'listPosts':  
                        listPosts();
                        break;
                  case 'post':  
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                              post();
                        }
                        else {
                              throw new Exception('Aucun identifiant de billet envoyé');
                        }
                        break;
                  case 'update':  
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                             update($_GET['id']);
                        } 
                        else{
                              throw new Exception('Aucun identifiant de billet envoyé');
                        }
                        break;
                  case 'delete':  
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                             delete($_GET['id']);
                        } 
                        else{
                             throw new Exception('Une erreur est survenu !');
                        }
                        break;
 
                  case 'confirmUpdate':  
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                           confirmUpdate();
                        } 
                        else{
                           throw new Exception('Une erreur est survenu !');
                        }
                        break;
                  case 'reported':  
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            reported();
                        } 
                        else{
                            throw new Exception('Une erreur est survenu ! !');
                        }
                        break;
                  case 'deleteReportedComment':  
                        if (isset($_GET['id']) && $_GET['id'] > 0){
                            deleteReportedComment($_GET['id']);
                        } 
                        else{
                             throw new Exception('Une erreur est survenu !');
                        }
                        break;
                  case 'notReadComment':  
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            notReadComment();
                        } 
                        else{
                              throw new Exception('Une erreur est survenu !');
                        }
                        break;
                  case 'reportedCommentsManager':  
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            reportedCommentsManager();
                        }
                        else{
                              throw new Exception('UUne erreur est survenu !');
                        }
                        break;
                  case 'addComment':  
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                                addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                            }
                            else {
                                throw new Exception('Tous les champs ne sont pas remplis !');
                            }
                        }
                        else {
                                throw new Exception('Aucun identifiant de billet envoyé');
                        }
                        break;
                  case 'dashboardConnect':  
                        dashboardConnect();
                        break;
                  case 'updateEdito':  
                        updateEdito();
                        break;
                  case 'adChapter':  
                        adChapter();
                        break;
                  case 'disconnect':  
                        disconnect();
                        break;               
            }
        }       
        else {
            listPosts();
        }
    }
catch(Exception $e) {
        echo 'Erreur : ' . $e->getMessage();
}
