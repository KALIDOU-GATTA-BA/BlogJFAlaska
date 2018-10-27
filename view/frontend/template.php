<!DOCTYPE html>
<html lang="fr">
    <head>
        <link rel="icon" href="public/images/jf.ico" />
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $title ?></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="public/css/style.css" rel="stylesheet" />
    </head>
    <body>
    <header>  
                 <strong>
                   <a href="http://kalidougattaba.fr/"><span class="glyphicon">&#xe021; Accueil</span></a> <br>
                   <a href="controller/contact.php"><span class="glyphicon">&#x2709; Contact</span></a> </br>
                  <a href="controller/login.php"><span class="glyphicon glyphicon-user"> Administration</span></a>
                </strong> 
    </header>
      <div class="content">  
        <?= $content ?> 
      </div><br><br>
<div class="foot">
Copyright 2018 <br><strong>Kalidou Gatta BA</strong> </br>
            Tous droits réservés </br></br></br>
</div>     
</body>
</html>
