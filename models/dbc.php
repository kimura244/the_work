<?php
require_once('../database.php');

class Dbc {
    protected $dbh;

    public function __construct($dbh = null) {
        if(!$dbh){
            try{
                $this->dbh = new PDO(

                    'mysql:dbname='.DB_NAME.
                    ';host='.DB_HOST,DB_USER,DB_PASSWD
                );
                //echo "接続1";

            }catch (PDOException $e){
                echo "接続失敗".$e->getMessage() ."\n";
                exit();
            }
        }else {
            $this->dbh = $dbh;
            //echo "接続2";
        }
    }

    public function get_db_handler() {
        return $this->dbh;
    }
}
?>
