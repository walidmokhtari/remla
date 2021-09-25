<?php
class SellerManager extends Model {
    public function insertSeller(array $data) {
        $storeName = $data["storeName"];
        $email = $data["email"];
        $pwd = $data["pwd"];

        $req = $this->getBdd()->prepare("INSERT INTO seller VALUES (NULL,'$storeName', '$email', '$pwd')");
        $req->execute();
    }

    public function modifySellerById($id, array $data) {
        $storeName = $data["storeName"];
        $email = $data["email"];
        $pwd = $data["pwd"];

        $req = $this->getBdd()->prepare("update seller set storeName ='$storeName' , email ='$email' , pwd ='$pwd' where id = '$id'");
        $req->execute();
    }

    public function getSellers() {
        return $this->getAll("seller","Seller");
    }

    public function getSeller(array $data) {
        return $this->getLigneByEmailPwd("seller","Seller",$data);
    }

    public function deleteSellerById($id) {
        $this->deleteById("seller",$id);
    }


}

?>