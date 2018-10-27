<?php
 
spl_autoload_register(function ($Manager) {
include $Manager . '.php';
});
 
class PostManager extends Manager
{
    public function getPosts()
    {
 
        $db = $this->dbConnect();
        $chapterByPage= 3;
        $currentPage= intval ($_GET['page']);
        $start=ceil(($currentPage-1)*$chapterByPage);
        $req = $db->query("SELECT id, title, edito, creation_date,  content  FROM posts ORDER BY creation_date DESC LIMIT $start, $chapterByPage");
        return $req ;
     }
 
    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        return $post;
    } 
 
    public function adChapter()
    {
	   	$db=$this->dbConnect();
	   	$newChapter = $db->prepare('INSERT INTO posts( title, content, creation_date) VALUES(?, ?, NOW())');
	    $insert = $newChapter->execute(array($_POST['tempChapterTitle'], $_POST['tempChapterContent']));
	    return $insert;
    }
 
    public function delete()
    {
       $db=$this->dbConnect();
       $id=$_GET['id'];
       $req=$db->query("DELETE FROM posts where id=$id");    
       $req=$db->query("DELETE FROM comments where post_id=$id"); 
    }
    public function update()
    {
       $db=$this->dbConnect();
       $id=$_GET['id'];
       $req = $db->prepare('UPDATE posts SET content = :newContent, title = :newTitle WHERE id = :iD');
       $req->execute(array(
       'newContent' => $_POST['tempChapterContent'],
       'newTitle' => $_POST['tempChapterTitle'],
       'iD' => $id
        ));
    }
    public function updateEdito()
    {
       $db=$this->dbConnect();
       $req1=$db->prepare("UPDATE posts SET edito = :edit ");
       $req1->execute(array(
       'edit' => htmlspecialchars($_POST['edito'])
       )); 
       echo "Votre éditorial a bien été mis à jour".'<br><br>';
    }
    public function pagination()
    {
       $db = $this->dbConnect();
       $totalChapterReq= $db->query('SELECT id from posts');
       $totalChapter= $totalChapterReq->rowCount();
       $chapterByPage= 3;
       $totalPage =ceil($totalChapter/$chapterByPage);
       for ($i=1; $i<=$totalPage;$i++){             
                          echo '<a href="../../index.php?action=listPosts&page='.$i.'">'.$i.'</a> ';             
        }
    }
    public function edito()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT edito FROM posts ');
        $req= $req->fetch(); 
        return $req;
    }
    public function fetchPostsBackView()
    {
         $db = $this->dbConnect();
         $posts= $db->query('SELECT title, id, countComment from posts');
         return $posts ;
    }
     public function fetchCountNotReadComments()
    {
          $db = $this->dbConnect();
          $posts= $db->query('SELECT COUNT(notReadComment) as fetchComment from comments where notReadComment = 1'); 
          $req=$posts->fetch();
          $req= $req['fetchComment'];
           return $req;
    }
    public function fetchCountReportedComments()
    {
          $db = $this->dbConnect();
          $posts= $db->query('SELECT COUNT(reported) as reportedComment from comments where reported = 1'); 
          $req=$posts->fetch();
          $req= $req['reportedComment'];
          return $req;
    }
 
    public function fetchReportedComments()
    {
          $db = $this->dbConnect();
	      $reported= $db->query('SELECT author, id, post_id, SUBSTRING(comment, 1,20) AS cmt from comments where reported=1');
          return $reported;
    }
    public function fetchNotReadComments()
    {
          $db = $this->dbConnect();
          $notRead= $db->query('SELECT SUBSTRING(comment, 1,20) AS cmt, post_id, id, comment_date from comments where notReadComment=1');
          return $notRead;
    }
    public function fetchNotReadComments2($postId)
    {
          $db = $this->dbConnect();
          $chapter= $db->query("SELECT title from posts where id=$postId");
          return $chapter;
    }
}
 