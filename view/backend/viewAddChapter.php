<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>
                tinymce.init({ selector:'textarea',
                entity_encoding : "raw", encoding: "UTF-8" });
        </script>

            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link href="../../public/css/styleBackOff.css" rel="stylesheet" /> 
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
    	 <form action="../../controller/adChapter.php" method="post">
                <div class="container">
                  <label> Le titre du chapitre: <br>
                  	<input type="text" rows="2" cols="2" name="tempChapterTitle" value=""><br><br>
                  </label><br>
                        
                  <label> Le contenu du chapitre: <br></label>
                          <textarea rows="25"  name="tempChapterContent"></textarea>
                      
                         <pre> <input  type="submit" value="Publier"  />                            <a href="indexBackend.php"><strong>Annuler</strong></a> <br><br></pre>
                </div>
              </form><br><br> 
              
    </body>
 </html>