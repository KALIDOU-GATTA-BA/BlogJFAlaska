<?php

require_once('controller/frontend.php');
require_once('controller/backend.php');
 
try{ 
             if(!isset($_GET['action'])){
                    $_GET['action']='listPosts';
            }
         
            if(!isset($_GET['page']) or !is_numeric($_GET['page'])){
                        $_GET['page']=1;
            }


            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'listPosts') {
                    listPosts();
                }
                elseif ($_GET['action'] == 'post') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        post();
                    }
                    else {
                        throw new Exception('Aucun identifiant de billet envoyé');
                    }
         
                }
     
            elseif ($_GET['action'] == 'update') {
     
                 if (isset($_GET['id']) && $_GET['id'] > 0) {
                    update($_GET['id']);
                } else{
                       throw new Exception('Aucun identifiant de billet envoyé');
                   }
            }
            elseif ($_GET['action'] == 'delete') {
     
                 if (isset($_GET['id']) && $_GET['id'] > 0) {
                    delete($_GET['id']);
                } else{
                       throw new Exception('Une erreur est survenu !');
                   }
            }
     
            elseif ($_GET['action'] == 'confirmUpdate') {
     
                 if (isset($_GET['id']) && $_GET['id'] > 0) {
                    confirmUpdate();
                } else{
                       throw new Exception('Une erreur est survenu !');
                   }
            }
     
            elseif ($_GET['action'] == 'reported') {
     
                 if (isset($_GET['id']) && $_GET['id'] > 0) {
                    reported();
                } else{
                       throw new Exception('Une erreur est survenu ! !');
                   }
            } 
     
                elseif ($_GET['action'] == 'deleteReportedComment') {
     
                 if (isset($_GET['id']) && $_GET['id'] > 0){
                    deleteReportedComment($_GET['id']);
                } else{
                       throw new Exception('Une erreur est survenu !');
                   }
            }
     
            elseif ($_GET['action'] == 'notReadComment') {
     
                 if (isset($_GET['id']) && $_GET['id'] > 0) {
                    notReadComment();
                } else{
                       throw new Exception('Une erreur est survenu !');
                   }
            }
            elseif ($_GET['action'] == 'reportedCommentsManager') {
     
                 if (isset($_GET['id']) && $_GET['id'] > 0) {
                    reportedCommentsManager();
                } else{
                       throw new Exception('UUne erreur est survenu !');
                   }
            }
            elseif ($_GET['action'] == 'addComment') {
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
            }
        }
        else {
            listPosts();
        }
    }
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}