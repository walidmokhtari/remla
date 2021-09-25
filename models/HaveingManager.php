<?php
class HaveingManager extends Model {
    public function insert($idSeller,$idProduct) {
        $req = $this->getBdd()->prepare("INSERT INTO haveing values ($idSeller,$idProduct,10,1)");
        $req->execute();
    }

    public function GetLignesByIdSeller($idSeller) {
        $var = [];
        $req = $this->getBdd()->prepare("SELECT * FROM haveing where idSeller = '$idSeller';");
        $req->execute();

        while($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new Haveing($data);
        }

        return $var;
        $req->closeCursor();
    }

    public function deleteProduct($idProduct) {
        $idSeller = $_SESSION["id"];
        $req = $this->getBdd()->prepare("DELETE FROM haveing where idSeller = $idSeller and idProduct = $idProduct;");
        $req->execute();
    }

    public function modifyProduct($idProduct,array $data) {
        $idSeller = $_SESSION["id"];
        $price = (double) $data["price"];
        $available = (int) $data["available"];

        $req = $this->getBdd()->prepare("UPDATE haveing SET price ='$price', available ='$available' where idSeller=$idSeller and idProduct=$idProduct ");
        $req->execute();

    }
}

?>