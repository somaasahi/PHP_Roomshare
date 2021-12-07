<?php

require_once(ROOT_PATH .'/Models/Db.php');

class View_user extends Db {

  public function __construct($dbh = null) {
      parent:: __construct($dbh);
    }

public function view_register($data){
  $this->dbh->beginTransaction();
  try{

  $sql = 'INSERT INTO view_users(name,mail,tel,password)
          VALUES (:name, :mail, :tel, :password)';
  $sth = $this->dbh->prepare($sql);

  $hash = password_hash($data['password'], PASSWORD_DEFAULT);

  $sth->bindValue(':name',$data['name'],PDO::PARAM_STR);
  $sth->bindValue(':mail',$data['mail'],PDO::PARAM_STR);
  $sth->bindValue(':tel',$data['tel'],PDO::PARAM_STR);
  $sth->bindValue(':password',$hash,PDO::PARAM_STR);
  $sth->execute();

  $this->dbh->commit();
  } catch(PDOException $e) {
    echo '失敗しました。'.$e->getMessage();
    $this->dnh->rollBack();
  } finally {
    $this->dbh = null;
  }
}

public function userByEmail($data) {
  $sql = ' SELECT * FROM view_users WHERE mail = :mail ';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':mail', $data['mail'], PDO::PARAM_STR);
  $sth->execute();
  $user = $sth->fetch();
  return $user;
}

public function view_login($login) {
    $result['bool'] = false;
    $user = $this->userByEmail($login);
    if($user){
    if(password_verify($login['password'], $user['password'])) {
      session_regenerate_id(true);
      $result = [
        'bool' => true,
        'user' => $user
      ];
      return $result;
      }
    }
    return $result;
  }

  public function mylikes($id = 0){
    $sql = 'SELECT p.id, p.post_user_id, p.address, p.title, p.content, p.save_path, ifnull(updated_at, created_at) AS orderdt
            FROM likes l JOIN posts p ON l.post_id = p.id
            WHERE l.view_user_id = :id AND p.del_flg = 0 ORDER BY orderdt DESC';
    $sth = $this->dbh->prepare($sql);
    $sth->bindValue(':id',$id,PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetchall(PDO::FETCH_ASSOC);
    return $result;
  }

  public function view_my_update($new){
    $this->dbh->beginTransaction();
    try{
    $sql = 'UPDATE view_users
            SET name = :name, mail = :mail, tel = :tel WHERE id = :id';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':id',$new['id'],PDO::PARAM_INT);
    $sth->bindParam(':name',$new['name'],PDO::PARAM_STR);
    $sth->bindParam(':mail',$new['mail'],PDO::PARAM_STR);
    $sth->bindParam(':tel',$new['tel'],PDO::PARAM_STR);
    $sth->execute();
    $this->dbh->commit();
    } catch(PDOException $e) {
      echo '失敗しました。'.$e->getMessage();
      $this->dnh->rollBack();
    } finally {
      $this->dbh = null;
    }
  }

  public function view_pass_forget($pass){
    $result['bool'] = false;
    $user = $this->userByEmail($pass);
      if($user['name'] == $pass['name'] && $user['mail'] == $pass['mail'] && $user['tel'] == $pass['tel']){
        $result['bool'] = true;
        return $result;
        }
        return $result;
  }


  public function view_pass_update($new){
    $this->dbh->beginTransaction();
    try{
    $sql = 'UPDATE view_users
            SET password = :password WHERE mail = :mail';
    $sth = $this->dbh->prepare($sql);
    $hash = password_hash($new['new_password']['new_password'], PASSWORD_DEFAULT);
    $sth->bindParam(':mail',$new['mail'],PDO::PARAM_STR);
    $sth->bindParam(':password',$hash,PDO::PARAM_STR);
    $sth->execute();
    $this->dbh->commit();
    } catch(PDOException $e) {
      echo '失敗しました。'.$e->getMessage();
      $this->dnh->rollBack();
    } finally {
      $this->dbh = null;
    }
  }

      public function area_countALl():Int {

      $sql = 'SELECT count(*) as count FROM posts WHERE del_flg = 0';
      $sth = $this->dbh->prepare($sql);
      $sth->execute();
      $count = $sth->fetchColumn();
      return $count;
     }

     public function area_findall($id,$page):Array {

       $sql = 'SELECT p.id, p.post_user_id, p.area_id, p.address, p.title, p.content, p.save_path,
               ifnull(updated_at, created_at) AS orderdt FROM posts p
               WHERE p.area_id = :id AND p.del_flg = 0 ORDER BY orderdt DESC';
     $sql .= ' LIMIT 7 OFFSET '.(7 * $page);
     $sth = $this->dbh->prepare($sql);
     $sth->bindValue(':id',$id,PDO::PARAM_INT);
     $sth->execute();
     $result = $sth->fetchall(PDO::FETCH_ASSOC);
     return $result;
    }

    public function key_countALl():Int {

    $sql = 'SELECT count(*) as count FROM posts WHERE del_flg = 0';
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $count = $sth->fetchColumn();
    return $count;
    }

    public function key_findall($key,$page):Array {

      $sql = 'SELECT p.id, p.post_user_id, p.area_id, p.address, p.title, p.content, p.save_path,
              ifnull(updated_at, created_at) AS orderdt FROM posts p
              WHERE p.del_flg = 0 AND p.content LIKE ? ORDER BY orderdt DESC';
      $sql .= ' LIMIT 7 OFFSET '.(7 * $page);
      $sth = $this->dbh->prepare($sql);
      $sth->bindValue(1, '%' . addcslashes($key, '\_%') . '%', PDO::PARAM_STR);
      $sth->execute();
      $result = $sth->fetchall(PDO::FETCH_ASSOC);
      return $result;
      }

        public function view_view($id = 0){
        $sql = 'SELECT * FROM posts WHERE id = :id';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':id',$id,PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        return $result;
      }

        public function checkGood($post_id,$view_user_id){
          $sql = 'SELECT COUNT(*) FROM likes WHERE post_id = :post_id AND view_user_id = :view_user_id';
          $sth = $this->dbh->prepare($sql);
          $sth->bindValue(':post_id',$post_id,PDO::PARAM_INT);
          $sth->bindValue(':view_user_id',$view_user_id,PDO::PARAM_INT);
          $sth->execute();
          $result = $sth->fetch(PDO::FETCH_ASSOC);
          $result = intval($result["COUNT(*)"]);
          return $result;
         }

      public function saveGood($post_id,$view_user_id){
         $this->dbh->beginTransaction();
         try{
         $sql = 'INSERT INTO likes(post_id,view_user_id)
                  VALUES(:post_id, :view_user_id)';
         $sth = $this->dbh->prepare($sql);
          $sth->bindValue(':post_id',$post_id,PDO::PARAM_INT);
          $sth->bindValue(':view_user_id',$view_user_id,PDO::PARAM_INT);
          $sth->execute();
          $this->dbh->commit();
          } catch(PDOException $e) {
            echo '失敗しました。'.$e->getMessage();
            $this->dnh->rollBack();
          } finally {
            $this->dbh = null;
          }
        }

  public function deleteGood($post_id,$view_user_id){
    $this->dbh->beginTransaction();
    try{
      $sql = 'DELETE FROM likes WHERE post_id = :post_id AND view_user_id = :view_user_id';
    $sth = $this->dbh->prepare($sql);
    $sth->bindValue(':post_id',$post_id,PDO::PARAM_INT);
    $sth->bindValue(':view_user_id',$view_user_id,PDO::PARAM_INT);
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
