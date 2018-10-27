<?php
    session_start();
    require_once("../model/UserManager.php");
   
    $req=new UserManager();
    $req=$req-> verification();
   
 