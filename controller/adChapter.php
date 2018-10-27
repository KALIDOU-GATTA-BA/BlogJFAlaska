<?php
	 require_once("../model/PostManager.php");
        $req=new PostManager();
        $req=$req->adChapter();
        echo "Le chapitre à bien été ajouté. ".'<br><br>';
        echo "Cliquez ".'<a href="../index.php">ici</a> pour le consulter.';