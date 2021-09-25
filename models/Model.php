<?php

abstract class Model {

    private static $_bdd;

    private static function setBdd() {
        self::$_bdd = new PDO("mysql:host=localhost;dbname=remla;charset=utf8;","root","");
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    }

    protected function getBdd() {
        if(self::$_bdd == NULL) 
            self::setBdd();
        return self::$_bdd;
    }

    protected function getAll($table, $obj) {
        $var = [];
        $req = $this->getBdd()->prepare("SELECT * FROM ".$table." ORDER BY id asc");
        $req->execute();

        //TRANSFORMER LES INFORMATION RECUPERE A PARTIR DE LA BDD EN UN TABLEAU 
        while($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new $obj($data);
        }

        return $var;
        $req->closeCursor();
    }

    protected function getLigneByEmailPwd($table,$obj,array $data) {
        $email = $data["email"];
        $pwd = $data["pwd"];

        $req = $this->getBdd()->prepare("SELECT COUNT(*) FROM $table WHERE email='$email' AND pwd='$pwd'");
        $req->execute();
        $b = $req->fetch(PDO::FETCH_ASSOC);

        if ($b["COUNT(*)"] == 1) {
            $req = $this->getBdd()->prepare("SELECT * FROM $table WHERE email='$email' AND pwd='$pwd'");
            $req->execute();
            $db_data = $req->fetch(PDO::FETCH_ASSOC);
            
            $line = new $obj($db_data);
            return $line;
        } else {
            return NULL;
        }

    }


    protected function deleteById($table,$id) {
        $req = $this->getBdd()->prepare("DELETE FROM $table where id='$id'");
        $req->execute();
    }

    protected function getLigneById($table,$obj,$id) {
        $req = $this->getBdd()->prepare("SELECT * from $table where id=$id");
        $req->execute();

        $data = $req->fetch(PDO::FETCH_ASSOC);
        $var = new $obj($data);

        return $var;
    } 


}

?>