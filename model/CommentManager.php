<?php
    spl_autoload_register(function ($Manager) {
    include $Manager . '.php';
    });
    class CommentManager extends Manager
    {
        public function getComments($postId)
        {
            $db = $this->dbConnect();
            $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
            $comments->execute(array($postId));
            return $comments;
        }
        public function postComment($postId, $author, $comment)
        {
            $db = $this->dbConnect();
            $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, reported, notReadComment, comment_date) VALUES(?, ?, ?, 0, 1, NOW())');
            $affectedLines = $comments->execute(array($postId, $author, $comment));
            return $affectedLines;
        }
       public function deleteReportedComment()
        {
           $db=$this->dbConnect();
           $id=$_GET['id'];
           $req=$db->prepare("SELECT COUNT(comment) as nbCmt FROM comments WHERE post_id < ? ");
           $req->execute(array($id));
           $data= $req->fetch();
           $_= $data['nbCmt'];
           $req1=$db->prepare("DELETE FROM comments where id = :id");
           $req1->execute(array(
            'id' => $id
            ));
           $req1 = $db->prepare("UPDATE posts SET countComment = :countCmt WHERE id = $id ");
                  $req->execute(array(
                  'countCmt' => $_
                  ));
       }
 
        public function countComment($postId)
     {
             $db=$this->dbConnect();
             $req=$db->prepare("SELECT COUNT(comment) as nbCmt FROM comments WHERE post_id = ? ");
             $req->execute(array($postId));
             $data= $req->fetch();
             $insert= $data['nbCmt'];
             $req1=$db->prepare("UPDATE posts SET countComment = :countCmt WHERE id = $postId ");
             $req1->execute(array(
             'countCmt' => $insert
             )); 
     }  
     public function notReadToRead()
    {
         $db=$this->dbConnect();
         $id=$_GET['id'];
         $idC=$_GET['idC'];
         header("Location:index.php?action=post&id=$id");
   	 $req = $db->prepare("UPDATE comments SET notReadComment = :read WHERE post_id ='$id' and id='$idC'");
         $req->execute(array(
         'read' => 0
         ));
    }
   public function reported()
   {
        $db=$this->dbConnect();
    	$id=$_GET['id'];
   	$idC=$_GET['idC'];
        $req= $db->prepare("SELECT alreadyReported FROM comments where id = ? and post_id= ? ");
        $req->execute(array($idC, $id));
        $bool=$req->fetch();
        $_= $bool['alreadyReported'];
        if ($_==0){ 
                  $req = $db->prepare("UPDATE comments SET reported = :_reported, alreadyReported = :_alreadyReported WHERE id = '$idC' and post_id= '$id'");
                  $req->execute(array(
                  '_reported' => 1,
                  '_alreadyReported' => 1
                  ));
                 echo "Merci pour votre contribution, le commentaire a bien été signalé et va être modéré par l'administrateur.";?>
                  <br> <a href="/index.php?action=post&amp;id=<?= $id?>">Retour</a>
       <?php  }
        else {
            echo"Ce commentaire a déjà été signalé par un lecteur et est en cours de modération par l'administrateur "; ?>
            <br> <a href="/index.php?action=post&amp;id=<?= $id?>">Retour</a>
        <?php }
   }
  public function reportedCommentsManager()
  {
    $db=$this->dbConnect();
    $id=$_GET['id'];
    $idC=$_GET['idC'];
    $req = $db->prepare("UPDATE comments SET reported = :read WHERE post_id ='$id' and id='$idC'");
    $req->execute(array(
    'read' => 0
    ));
  }
  }
