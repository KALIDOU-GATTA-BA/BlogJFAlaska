<?php
 
spl_autoload_register(function ($Manager) {
include $Manager . '.php';
});
 
final class MailsManager extends Manager

{
	public function emails()
	{ 
               if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
              
		$db=$this->dbConnect();
		 
		$req = $db->prepare("INSERT INTO contacts( emails, messages) VALUES(?, ?)");
		$req = $req->execute(array(htmlspecialchars($_POST['email']), htmlspecialchars($_POST['message'])));
		 
		$req=$db->query("SELECT emails, messages from contacts order by id desc limit 0,1 ");
		$req = $req->fetch();
		return $req;
             }
	}
}
