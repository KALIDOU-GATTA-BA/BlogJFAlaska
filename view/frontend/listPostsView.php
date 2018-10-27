<?php $title = 'Jean Forteroche'; 
require_once('secureForm.php');?>
<?php ob_start(); ?>
<div class="container">
        <div class="row"> <br>
           <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">   
               <p>   ÉDITO... <br><?php 
                         require_once("model/PostManager.php");
                         $req=new PostManager();
                         $req=$req->edito();
                         echo  $req['edito'] ;
                         ?>
               </p>
            </div><br> 
    <h1> <br>BILLET SIMPLE POUR L'ALASKA</h1>
            <?php
                while ($dat = $posts->fetch()){?>
                    <div class="col-md-4 col-xs-12 col-sm-4 col-lg-4">
                       <div class="news"> 
                          <h3>
                              <?= $dat['title'] ?>
                                  <em>le <?= $data['creation_date'] ?></em>
                          </h3>
                           
                              <?php $t=$dat['content']; ?>
                              <p> <?php echo substr ( $t, 0, 200).htmlspecialchars('[...]') ; ?> 
                              <a href="index.php?action=post&amp;id=<?= $dat['id'] ?>"><em>Lire la suite</em></a>
                          </p>
                    </div>
                  </div>
                <?php
                    }
                    $posts->closeCursor();    
                ?>
        </div>
    </div>       
<div class="pagination_numbers">
    <ul class="pagination">
          <li>
              <?php 
                     require_once("model/PostManager.php");
                     $req=new PostManager();
                     $req=$req->pagination();
              ?>
          </li>
    </ul>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');?>	