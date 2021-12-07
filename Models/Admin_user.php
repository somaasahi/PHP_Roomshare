<?php

require_once(ROOT_PATH .'/Models/Db.php');

class Admin_user extends Db {

  public function __construct($dbh = null) {
      parent:: __construct($dbh);
    }

    public function viewer_countALl():Int {

    $sql = 'SELECT count(*) as count FROM view_users WHERE del_flg = 0';
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $count = $sth->fetchColumn();
    return $count;
    }

    public function viewer_findall($page):Array {

    $sql = 'SELECT * FROM view_users WHERE del_flg = 0';
    $sql .= ' LIMIT 7 OFFSET '.(7 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchall(PDO::FETCH_ASSOC);
    return $result;
    }


    public function poster_countALl():Int {

    $sql = 'SELECT count(*) as count FROM post_users WHERE del_flg = 0';
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $count = $sth->fetchColumn();
    return $count;
   }

   public function poster_findall($page):Array {

   $sql = 'SELECT * FROM post_users WHERE del_flg = 0 AND role = 0';
   $sql .= ' LIMIT 7 OFFSET '.(7 * $page);
   $sth = $this->dbh->prepare($sql);
   $sth->execute();
   $result = $sth->fetchall(PDO::FETCH_ASSOC);
   return $result;
  }

    public function post_countALl():Int {

    $sql = 'SELECT count(*) as count FROM posts WHERE del_flg = 0';
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $count = $sth->fetchColumn();
    return $count;
   }

   public function post_findall($page):Array {

     $sql = 'SELECT p.id, p.post_user_id, p.area_id, p.address, p.title, p.content, p.save_path,
             ifnull(updated_at, created_at) AS orderdt FROM posts p
             WHERE p.del_flg = 0 ORDER BY orderdt DESC';
   $sql .= ' LIMIT 7 OFFSET '.(7 * $page);
   $sth = $this->dbh->prepare($sql);
   $sth->execute();
   $result = $sth->fetchall(PDO::FETCH_ASSOC);
   return $result;
  }


    public function poster_delete($id = 0) {
      $this->dbh->beginTransaction();
      try{
      $sql = 'UPDATE post_users SET del_flg = 1 WHERE id = :id';
      $sth = $this->dbh->prepare($sql);
      $sth->bindParam(':id', $id, PDO::PARAM_INT);
      $sth->execute();
      $this->dbh->commit();
      } catch(PDOException $e) {
        echo '失敗しました。'.$e->getMessage();
        $this->dnh->rollBack();
      }
    }

    public function viewer_delete($id = 0) {
      $this->dbh->beginTransaction();
      try{
      $sql = 'UPDATE view_users SET del_flg = 1 WHERE id = :id';
      $sth = $this->dbh->prepare($sql);
      $sth->bindParam(':id', $id, PDO::PARAM_INT);
      $sth->execute();
      $this->dbh->commit();
      } catch(PDOException $e) {
        echo '失敗しました。'.$e->getMessage();
        $this->dnh->rollBack();
      }
    }

    public function admin_post_delete($id = 0) {
      $this->dbh->beginTransaction();
      try{
      $sql = 'UPDATE posts SET del_flg = 1 WHERE id = :id';
      $sth = $this->dbh->prepare($sql);
      $sth->bindParam(':id', $id, PDO::PARAM_INT);
      $sth->execute();
      $this->dbh->commit();
      } catch(PDOException $e) {
        echo '失敗しました。'.$e->getMessage();
        $this->dnh->rollBack();
      }
    }


}
