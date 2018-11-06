<?php
 
spl_autoload_register(function ($Manager) {
include $Manager . '.php';
}); 
 
class EditoManager extends Manager
{
     public function edito()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT edito FROM edito');
        $req= $req->fetch(); 
        $req= $req['edito'];
        return $req;
    }
    public function updateEdito()
    {
       $db=$this->dbConnect();
       $req1=$db->prepare("UPDATE edito SET edito = :edit ");
       $req1->execute(array(
       'edit' => htmlspecialchars($_POST['edito'])
       )); 
    }
}
