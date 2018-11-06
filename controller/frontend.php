<?php
 
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once("model/Manager.php");
function listPosts()
{
    $postManager = new PostManager(); 
    $posts = $postManager->getPosts(); 
 
    require('view/frontend/listPostsView.php');
}
 
function post()
{
    $postManager = new PostManager();
    $post = $postManager->getPost($_GET['id']);
    $title =$post['title']; 
    $content=nl2br($post['content']);
    $post=$post['creation_date_fr'];  
    $commentManager = new CommentManager();    
    $comments = $commentManager->getComments($_GET['id']);
    require('view/frontend/postView.php');  
}
 
function addComment($postId, $author, $comment)
{
 
    $commentManager = new CommentManager();
 
    $affectedLines =$commentManager->postComment($postId, $author, $comment);
 
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {      
 
            $req= new CommentManager();
            $req=$req->countComment($postId);
            mail( 'kalidougattaba@gmail.com', 'Nouveau Commentaire', 'Bonjour Jean, quelqu\'un vient de commenter un des chapitres de votre blog' );
            header('Location: index.php?action=post&id=' . $postId);
    }
 
}
