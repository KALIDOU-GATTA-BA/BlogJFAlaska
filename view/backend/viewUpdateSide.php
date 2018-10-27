<!DOCTYPE html>
<html lang="fr">
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>
tinymce.init({ selector:'textarea',
                entity_encoding : "raw", encoding: "UTF-8" });
</script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link href="../../public/css/style.css" rel="stylesheet" /> 
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
    	       <form action="../../index.php?action=confirmUpdate&amp;id=<?= $post['id'] ?>" method="post">
                <div class="container">
                  <label> Le titre du chapitre: <br></label>
                  <input type="text" rows="2" cols="2" name="tempChapterTitle" value="<?= htmlspecialchars($post['title']) ?>"><br><br>
                        <div class="form-group">
                          <label> Le contenu du chapitre: <br></label>
                          <textarea class="form-control" rows="25" id="comment" name="tempChapterContent">
                            <?= nl2br(htmlspecialchars($post['content'])) ?> 
                          </textarea>
                         <pre> <input  type="submit" value="Publier"  />                            <a href="view/backend/indexBackend.php"><strong>Annuler</strong></a> <br><br></pre>
                </div>
              </form><br><br> 
 
    </body>
</html>	