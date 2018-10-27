<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="../public/css/style.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <form action="contact1.php" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Entrez votre email" name="email" required>
    </div>
    <div class="form-group">
      <label for="pwd">Message:</label><br>
     <textarea  style="width:100%; height:120px" name="message"> </textarea>
    </div>
    <input type="submit"  value="Envoyer" class="btn btn-default">
  </form> <br>
 <a href="../index.php"><span class="glyphicon glyphicon-remove"> </span> <strong>Annuler</strong></a>
</div>
</body>
</html>