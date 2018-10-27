<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link href="../../public/css/styleBackOff.css" rel="stylesheet" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
          <div class="container">
            <form action="../../controller/updateEdito.php" method="post">
              <div class="form-group">
                <label for="pwd">Éditorial:</label><br>
               <textarea  style="width:100%; height:120px" name="edito">
                    <?php 
                         require_once("../../model/PostManager.php");
                         $req=new PostManager();
                         $req=$req->edito();
                         echo  $req['edito'] ;
                  ?>
              </textarea>
              </div>     
              <input type="submit"  value="Envoyer" class="btn btn-default">
            </form> <br>
              <a href="indexBackend.php">Annuler</a> 
          </div>
  </body>
</html>