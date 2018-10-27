<html>
    <head>
        <meta charset="utf-8">
        
        <link rel="stylesheet" href="../public/css/styleForm.css" media="screen" type="text/css" />
    </head>
    <body style='background:#fff;'>
        <div id="content">
          
            <?php
                session_start();
                if($_SESSION['username'] !== ""){
                    $user = $_SESSION['username'];
                    echo "Bonjour $user, vous êtes connecté";
                }
            ?>
                        <?php
                session_start();
                if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {  
                      session_unset();
                      header("location:login.php");
                   }
                }
                else if($_SESSION['username'] !== ""){
                    $user = $_SESSION['username'];
                }
            ?>
            
        </div>
    </body>
</html>