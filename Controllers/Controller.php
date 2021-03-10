<?php
require_once('../Models/User.php');

class Controller {
    private $request; //リクエストパラメータ(GET,POST)
    private $User;

    public function __construct() {
        //リクエストパラメータの取得
        $this->request['get'] = $_GET;
        $this->request['post'] = $_POST;

        //モデルオブジェクトの生成
        $this->User = new User();
    }

// お店のトップ画面
    public function History_ALL() {
        $contact = $this->User->History();
        $params = [
            'contact' => $contact,
        ];
        return $params;
    }

    // お店の詳細画面
        public function History_details($id) {
            $contact = $this->User->details($id);
            $params = [
                'players' => $contact,
            ];
            return $params;
        }

        // 企業のトップ画面
            public function History_1_details($id) {
                $contact = $this->User->details1($id);
                $params = [
                    'players' => $contact,
                ];
                return $params;
            }


            // 登録　企業
            public function new_enterprise_gg($id,$name,$URL,$phone,$mail,$category,$text) {

            $this->User->new_enterprise_data($id,$name,$URL,$phone,$mail,$category,$text);
                }

// 編集
    public function update($id,$name,$URL,$phone,$mail,$category,$text) {

        $this->User->updateID($id,$name,$URL,$phone,$mail,$category,$text);
    }

// 削除
    public function delete($id) {

        $this->User->contactDelete($id);
    }

//  contact
public function validate($name,$kana,$tel,$mail,$content) {
    $err = $this->User->contactValidate($name,$kana,$tel,$mail,$content);
    return $err;
}


// ログインのIDとパスワードの処理
    public function loginpw($email,$password) {
      // $players = $this->Player->login($email,$password);
        $players = $this->User->login($email,$password);
        $params = [
            'players' => $players,
        ];
        return $params;
    }

    // パスワードリセットその1
        public function resetpw_1($email,$secret) {
          // $players = $this->Player->login($email,$password);
            $players = $this->User->reset_1($email,$secret);
            $params = [
                'players' => $players,
            ];
            return $params;
        }

        // パスワードリセットその2
            public function resetpw_2($id,$password) {

                $this->User->reset_2($id,$password);
            }

    // 新規作成　店
        public function new_shop($mail,$password,$secret) {

            $this->User->new_shop_ID($mail,$password,$secret);
        }

        // 新規作成　企業
        public function new_enterprise($mail,$password,$secret) {

        $this->User->new_enterprise_ID($mail,$password,$secret);
            }

  // 検索
      public function Search_1($search_name) {
        // $players = $this->Player->login($email,$password);
          $contact = $this->User->Search($search_name);
          $params = [
              'contact' => $contact,
          ];
          return $params;
      }

      // お店の編集
          public function History_details_shop($id) {
              $contact = $this->User->details_shop($id);
              $params = [
                  'players' => $contact,
              ];
              return $params;
          }

      // 店舗情報編集
          public function update_shop($id,$name,$URL,$phone,$mail) {

              $this->User->update_shop_ID($id,$name,$URL,$phone,$mail);
          }

          // 新規作成　店舗新規
          public function new_enterprise2($id,$name,$URL,$phone,$mail) {

          $this->User->new_enterprise_ID2($id,$name,$URL,$phone,$mail);
              }

}

?>
