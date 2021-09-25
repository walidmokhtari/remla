<?php
class ProductManager extends Model {
    public function getProducts() {
        return $this->getAll("product","Product");
    }

    public function deleteProductById($id) {
        $this->deleteById("product",$id);
    }

    public function modifyProductById($id,array $data) {
        $nameProduct = $data["nameProduct"];
        $type = $data["type"];
        $barCode = $data["barCode"];

        $req = $this->getBdd()->prepare("UPDATE product SET nameProduct ='$nameProduct', type ='$type', barCode ='$barCode' where id=$id");
        $req->execute();

    }

    public function insertProduct(array $data) {
        $nameProduct = $_POST["nameProduct"];
        $type = $_POST["type"];
        $barCode = $_POST["barCode"];

        $req = $this->getBdd()->prepare("INSERT INTO product VALUES (NULL,'$nameProduct','$type','$barCode')");
        $req->execute();

    }

    

    public function getProductById($id) {
        return $this->getLigneById("product","Product",$id);
    }
}

?>