<?php
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function update(){
		$postManager = new PostManager();
        $post = $postManager->getPost($_GET['id']);   
        require('view/backend/viewUpdateSide.php');                           
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