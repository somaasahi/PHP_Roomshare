
<?php

require_once(ROOT_PATH .'/Models/Db.php');

class Post_user extends Db {

  public function __construct($dbh = null) {
      parent:: __construct($dbh);
    }

      public function post_register($data){
        $this->dbh->beginTransaction();
        try{
        $sql = 'INSERT INTO post_users(name,mail,tel,password)
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

        $sql = ' SELECT * FROM post_users WHERE mail = :mail ';
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(':mail', $data['mail'], PDO::PARAM_STR);
        $sth->execute();
        $user = $sth->fetch();
        return $user;
      }

      public function post_login($login) {
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

      public function mypost($id = 0){
        $sql = 'SELECT p.id, p.post_user_id, p.area_id, p.address, p.title, p.content, p.save_path,
                ifnull(updated_at, created_at) AS orderdt FROM posts p
                WHERE p.post_user_id = :id AND p.del_flg = 0 ORDER BY orderdt DESC';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':id',$id,PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetchall(PDO::FETCH_ASSOC);
        return $result;
      }

      public function post_forget($pass){

       $result['bool'] = false;
       $user = $this->userByEmail($pass);

       if($user['name'] == $pass['name'] && $user['mail'] == $pass['mail'] && $user['tel'] == $pass['tel']){
         $result['bool'] = true;

         return $result;
        }
         var_dump($result);
        return $result;
      }

      public function post_my_update($new){
        $this->dbh->beginTransaction();
        try{
        $sql = 'UPDATE post_users
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


      public function post_pass_update($new){
        $this->dbh->beginTransaction();
        try{
        $sql = 'UPDATE post_users
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

      public function post($data){
        $this->dbh->beginTransaction();
        try{
        $sql = 'INSERT INTO posts(post_user_id,area_id,address,title,content,save_path)
                VALUES (:post_user_id,:area_id,:address,:title,:content,:save_path)';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':post_user_id',$data['post_user_id'],PDO::PARAM_INT);
        $sth->bindParam(':area_id',$data['area_id'],PDO::PARAM_INT);
        $sth->bindParam(':address',$data['address'],PDO::PARAM_STR);
        $sth->bindParam(':title',$data['title'],PDO::PARAM_STR);
        $sth->bindParam(':content',$data['content'],PDO::PARAM_STR);
        $sth->bindParam(':save_path',$data['save_path'],PDO::PARAM_STR);
        $sth->execute();
        $this->dbh->commit();
        } catch(PDOException $e) {
          echo '失敗しました。'.$e->getMessage();
          $this->dnh->rollBack();
        } finally {
          $this->dbh = null;
        }
      }

      public function post_view($id = 0){
        $sql = 'SELECT * FROM posts WHERE id = :id';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':id',$id,PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        return $result;
      }

      public function re_post($new){
        $this->dbh->beginTransaction();
        try{
        $sql = 'UPDATE posts
                SET area_id = :area_id, address = :address, title = :title, content = :content, save_path = :save_path
                WHERE id = :id';
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(':id',$new['id'],PDO::PARAM_INT);
        $sth->bindValue(':area_id',$new['area_id'],PDO::PARAM_INT);
        $sth->bindValue(':address',$new['address'],PDO::PARAM_STR);
        $sth->bindValue(':title',$new['title'],PDO::PARAM_STR);
        $sth->bindValue(':content',$new['content'],PDO::PARAM_STR);
        $sth->bindValue(':save_path',$new['save_path'],PDO::PARAM_STR);
        $sth->execute();
        $this->dbh->commit();
        } catch(PDOException $e) {
          echo '失敗しました。'.$e->getMessage();
          $this->dnh->rollBack();
        } finally {
          $this->dbh = null;
        }
      }

      public function post_delete($id = 0) {
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

?>
