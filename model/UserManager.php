<?php
require_once("Manager.php");
 
class UserManager extends Manager
{
          public function verification(){
 
          $db=$this->dbConnect();
          $req=$db->query('SELECT * FROM user');
          $data=$req->fetch();
          return $data;   
     }
}
