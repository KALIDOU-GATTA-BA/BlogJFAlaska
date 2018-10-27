<?php

    require_once("model/CommentManager.php");
   
   $req= new CommentManager();
   $req= $req->notReadToRead();