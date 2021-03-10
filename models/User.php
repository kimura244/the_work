<?php
require_once('dbc.php');

Class User extends Dbc {

  public function __construct($dbh = null){
      parent::__construct($dbh);
  }

// お店のトップ画面
  public function History():Array {
      $sql = 'SELECT * FROM enterprise;';
      $sth = $this->dbh->prepare($sql);
      $sth->execute();
      $result = $sth->fetchAll(PDO::FETCH_ASSOC);
      return $result;
  }

  // お店の詳細画面
    public function details($id):Array {
        $sql = 'SELECT * FROM enterprise WHERE id = :id;';
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // 企業のトップ画面
      public function details1($id):Array {
          $sql = 'SELECT * FROM enterprise WHERE target_id = :id;';
          $sth = $this->dbh->prepare($sql);
          $sth->bindParam(':id', $id, PDO::PARAM_INT);
          $sth->execute();
          $result = $sth->fetchAll(PDO::FETCH_ASSOC);
          return $result;
      }


      // 新規作成　企業top
        public function new_enterprise_data($id,$name,$URL,$phone,$mail,$category,$text) {
          $sql = "INSERT INTO enterprise
          (name,text,URL,phone,mail,category,target_id,create_datetime,update_datetime)
  VALUES(:name,
         :text,
         :URL,
         :phone,
         :mail,
         :category,
         :target_id,
         now(),
         now());";

                    $this->dbh->beginTransaction();
                    try{
                        $sth = $this->dbh->prepare($sql);
                        $sth->bindParam(':target_id',$id,PDO::PARAM_STR);
                        $sth->bindParam(':name',$name,PDO::PARAM_STR);
                        $sth->bindParam(':URL',$URL,PDO::PARAM_STR);
                        $sth->bindParam(':phone',$phone,PDO::PARAM_STR);
                        $sth->bindParam(':mail',$mail,PDO::PARAM_STR);
                        $sth->bindParam(':category',$category,PDO::PARAM_STR);
                        $sth->bindParam(':text',$text,PDO::PARAM_STR);

                        $sth->execute();

                        $this->dbh->commit();
                        echo "更新しました";

                    } catch(PDOException $e){
                        echo "更新失敗".$e->getMessage() ."\n";
                        $this->dbh->rollback();
                        exit();
                    }
            }

// 編集
  public function updateID($id,$name,$URL,$phone,$mail,$category,$text) {
    $sql = "UPDATE enterprise
            SET name=:name,URL=:URL,phone=:phone,mail=:mail,category=:category,text=:text, update_datetime=now()
            WHERE id = :id";

              $this->dbh->beginTransaction();
              try{
                  $sth = $this->dbh->prepare($sql);
                  $sth->bindParam(':name',$name,PDO::PARAM_STR);
                  $sth->bindParam(':URL',$URL,PDO::PARAM_STR);
                  $sth->bindParam(':phone',$phone,PDO::PARAM_STR);
                  $sth->bindParam(':mail',$mail,PDO::PARAM_STR);
                  $sth->bindParam(':category',$category,PDO::PARAM_STR);
                  $sth->bindParam(':text',$text,PDO::PARAM_STR);
                  $sth->bindParam(':id',$id,PDO::PARAM_STR);

                  $sth->execute();

                  $this->dbh->commit();
                  echo "更新しました";

              } catch(PDOException $e){
                  echo "更新失敗".$e->getMessage() ."\n";
                  $this->dbh->rollback();
                  exit();
              }
      }

      // ログインの処理
    public function Search($search_name):Array {
        $sql = "SELECT * FROM enterprise
                WHERE name LIKE '%" . $search_name . "%' ";
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(':search_name', $search_name, PDO::PARAM_STR);
        $sth->execute();
        $data = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

// conplete_3
      public function contactDelete($id){
              if(empty($id)){
              exit('IDが不正です');
          }

          $sql = 'DELETE FROM enterprise Where id = :id';

          $this->dbh->beginTransaction();
          try{
              $sth = $this->dbh->prepare($sql);
              $sth->bindValue(':id',(int)$id,PDO::PARAM_INT);
              $sth->execute();
              $this->dbh->commit();
              echo "更新しました";

          } catch(PDOException $e){
              echo "更新失敗".$e->getMessage() ."\n";
              $this->dbh->rollback();
              exit();
          }
      }


//  contact
      public function contactValidate($name,$kana,$tel,$mail,$content):Array {

        $error_msg = [];
        //　氏名
        if(empty($name)){
            $error_msg['name'] = "*氏名は必須項目です";
        }else if(mb_strlen($_POST['name']) > 10){
            $error_msg['name'] = "*氏名は10文字以内で入力してください";
        }

        // フリガナ
        if(empty($kana)){
            $error_msg['kana'] = "*フリガナは必須項目です";
        }else if(mb_strlen($_POST['kana']) > 10){
            $error_msg['kana'] = "*フリガナは10文字以内で入力してください";
        }

        // 電話番号
        $number = $tel;
        $pattern_num = "/^[0-9０-９]+$/";

        if(!empty($_POST['tel']) && (!preg_match($pattern_num, $number))){
            $error_msg['tel'] = "*電話番号は数字で入力してください";
        }

        // メールアドレス
        $addres = $_POST['mail'];
        $pattern_add = "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/";

        if(empty($mail)){
            $error_msg['mail'] = '*メールアドレスは必須項目です';
        }else if(!preg_match($pattern_add, $addres)){
            $error_msg['mail'] = '*メールアドレスは正しい形式で入力してください';
        }

        // お問い合わせ内容
        if(empty($content)){
            $error_msg['content'] = '*お問い合わせ内容は必須項目です';
        }

        return $error_msg;

      }

      // ログインの処理
    public function login($email,$password):Array {
        $sql = 'SELECT * FROM users
                WHERE mail = :email AND password = :password';
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(':email', $email, PDO::PARAM_INT);
        $sth->bindParam(':password', $password, PDO::PARAM_INT);
        $sth->execute();
        $data = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // PWリセットその1
    public function reset_1($email,$secret):Array {
      $sql = 'SELECT * FROM users
              WHERE mail = :email AND secret = :secret';
      $sth = $this->dbh->prepare($sql);
      $sth->bindParam(':email', $email, PDO::PARAM_INT);
      $sth->bindParam(':secret', $secret, PDO::PARAM_STR);
      $sth->execute();
      $data = $sth->fetchAll(PDO::FETCH_ASSOC);
      return $data;
    }

    // PWリセットその2
      public function reset_2($id,$password) {
        $sql = "UPDATE users
                SET password=:password, update_datetime	=now()
                WHERE id = :id";

                  $this->dbh->beginTransaction();
                  try{
                      $sth = $this->dbh->prepare($sql);
                      $sth->bindParam(':password',$password,PDO::PARAM_STR);
                      $sth->bindParam(':id',$id,PDO::PARAM_STR);

                      $sth->execute();

                      $this->dbh->commit();
                      echo "更新しました";

                  } catch(PDOException $e){
                      echo "更新失敗".$e->getMessage() ."\n";
                      $this->dbh->rollback();
                      exit();
                  }
          }

    // 新規作成　店
      public function new_shop_ID($mail,$password,$secret) {
        $sql = "INSERT INTO users
        (mail,password,secret,type, create_datetime,update_datetime)
VALUES(:mail,
       :password,
       :secret,
       0,
       now(),
       now());";

                  $this->dbh->beginTransaction();
                  try{
                      $sth = $this->dbh->prepare($sql);
                      $sth->bindParam(':mail',$mail,PDO::PARAM_STR);
                      $sth->bindParam(':password',$password,PDO::PARAM_STR);
                      $sth->bindParam(':secret',$secret,PDO::PARAM_STR);

                      $sth->execute();

                      $this->dbh->commit();
                      echo "更新しました";

                  } catch(PDOException $e){
                      echo "更新失敗".$e->getMessage() ."\n";
                      $this->dbh->rollback();
                      exit();
                  }
          }

          // 新規作成　企業
            public function new_enterprise_ID($mail,$password,$secret) {
              $sql = "INSERT INTO users
              (mail,password,secret,type, create_datetime,update_datetime)
      VALUES(:mail,
             :password,
             :secret,
             1,
             now(),
             now());";

                        $this->dbh->beginTransaction();
                        try{
                            $sth = $this->dbh->prepare($sql);
                            $sth->bindParam(':mail',$mail,PDO::PARAM_STR);
                            $sth->bindParam(':password',$password,PDO::PARAM_STR);
                            $sth->bindParam(':secret',$secret,PDO::PARAM_STR);

                            $sth->execute();

                            $this->dbh->commit();
                            echo "更新しました";

                        } catch(PDOException $e){
                            echo "更新失敗".$e->getMessage() ."\n";
                            $this->dbh->rollback();
                            exit();
                        }
                }

                // お店の編集
                  public function details_shop($id):Array {
                      $sql = 'SELECT * FROM shop WHERE target_id = :id;';
                      $sth = $this->dbh->prepare($sql);
                      $sth->bindParam(':id', $id, PDO::PARAM_INT);
                      $sth->execute();
                      $result = $sth->fetchAll(PDO::FETCH_ASSOC);
                      return $result;
                  }

                // 店舗情報編集
                  public function update_shop_ID($id,$name,$URL,$phone,$mail) {
                    $sql = "UPDATE shop
                            SET name=:name,URL=:URL,phone=:phone,mail=:mail, update_datetime=now()
                            WHERE target_id = :id";

                              $this->dbh->beginTransaction();
                              try{
                                  $sth = $this->dbh->prepare($sql);
                                  $sth->bindParam(':name',$name,PDO::PARAM_STR);
                                  $sth->bindParam(':URL',$URL,PDO::PARAM_STR);
                                  $sth->bindParam(':phone',$phone,PDO::PARAM_STR);
                                  $sth->bindParam(':mail',$mail,PDO::PARAM_STR);
                                  $sth->bindParam(':id',$id,PDO::PARAM_STR);

                                  $sth->execute();

                                  $this->dbh->commit();
                                  echo "更新しました";

                              } catch(PDOException $e){
                                  echo "更新失敗".$e->getMessage() ."\n";
                                  $this->dbh->rollback();
                                  exit();
                              }
                      }

                      // 新規作成　店舗新規
                        public function new_enterprise_ID2($id,$name,$URL,$phone,$mail) {
                          $sql = "INSERT INTO shop
                          (name,URL,phone,mail,target_id,create_datetime,update_datetime)
                  VALUES(:name,
                         :URL,
                         :phone,
                         :mail,
                         :target_id,
                         now(),
                         now());";

                                    $this->dbh->beginTransaction();
                                    try{
                                        $sth = $this->dbh->prepare($sql);
                                        $sth->bindParam(':name',$name,PDO::PARAM_STR);
                                        $sth->bindParam(':URL',$URL,PDO::PARAM_STR);
                                        $sth->bindParam(':mail',$mail,PDO::PARAM_STR);
                                        $sth->bindParam(':phone',$phone,PDO::PARAM_STR);
                                        $sth->bindParam(':target_id',$id,PDO::PARAM_STR);

                                        $sth->execute();

                                        $this->dbh->commit();
                                        echo "更新しました";

                                    } catch(PDOException $e){
                                        echo "更新失敗".$e->getMessage() ."\n";
                                        $this->dbh->rollback();
                                        exit();
                                    }
                            }

}
?>
