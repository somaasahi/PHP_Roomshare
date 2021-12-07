<?php

require_once(ROOT_PATH .'/Models/Db.php');

class Contact extends Db {

  public function __construct($dbh = null) {
      parent:: __construct($dbh);
    }


    public function get_contact_data($data){
    $sql = 'SELECT posts.id, post_users.id, post_users.mail
            FROM posts
            JOIN post_users
            ON posts.post_user_id = post_users.id
            WHERE posts.id = :id';
    $sth = $this->dbh->prepare($sql);
    $sth->bindValue(':id',$data['id'],PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

    public function contact_submit($contact){
      $this->dbh->beginTransaction();
      try{
      $sql = 'INSERT INTO contacts(post_id,post_user_id,view_user_id,content)
              VALUES (:post_id, :post_user_id, :view_user_id, :content)';
      $sth = $this->dbh->prepare($sql);
      $sth->bindValue(':post_id',$contact['post_id'],PDO::PARAM_INT);
      $sth->bindValue(':post_user_id',$contact['post_user_id'],PDO::PARAM_INT);
      $sth->bindValue(':view_user_id',$contact['view_user_id'],PDO::PARAM_INT);
      $sth->bindValue(':content',$contact['content'],PDO::PARAM_STR);
      $sth->execute();
      $this->dbh->commit();
      } catch(PDOException $e) {
        echo '失敗しました。'.$e->getMessage();
        $this->dnh->rollBack();
      } finally {
        $this->dbh = null;
      }
    }

}

?>
