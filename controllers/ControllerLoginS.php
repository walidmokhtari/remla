<?php
require_once("views/View.php");

class ControllerLoginS {

    private $_sellerManager;
    private $_haveingManager;
    private $_productManager;
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && count( (array)$url ) > 3)
            throw new Exception("Page introuvable");
        else
        {   
            session_start();
            if (isset($url[1]) && method_exists($this,$url[1]))
            {
                $action = $url[1];

                if(isset($url[2]))
                    $this->$action($url[2]);
                 else
                    $this->$action();
            }
            else
                $this->login();
        }
    }

    public function login() {
        if(isset($_SESSION["storeName"])) {
                $this->_view = new View("SellerControlP");
                $this->_view->generate("");
         } else {
                $this->_view = new View("LoginS");
                $this->_view->generate("");
        }
    }

    private function checkLogin() {

        if ($_POST != NULL) {
            $this->_sellerManager = new SellerManager();
            $seller = $this->_sellerManager->getSeller($_POST);

            if($seller != NULL) {
                $_SESSION["id"] = $seller->getId();
                $_SESSION["storeName"] = $seller->getStoreName();
                
                $this->_view = new View("SellerControlP");
                $this->_view->generate("");
                
            } else {
                throw new Exception("Error : email ou mot de passe invalide ");
            }
        } else {
            $this->login();
        }
    }

    
    private function logout() {
        session_unset();
        session_destroy();
     
        $this->login();
        
    }

    private function updateSeller() {
        if(isset($_SESSION["storeName"])) {
            if(isset($_POST["enregistrer"])) {
                $this->_sellerManager = new SellerManager();
                $this->_sellerManager->modifySellerById($_SESSION["id"],$_POST);
                $_SESSION["storeName"] = $_POST["storeName"];

                $this->_view = new View("Succes");
                $this->_view->generate(array("msg" => "Information modifiées avec succée !"));
            } else {
                $this->_view = new View("UpdateSeller");
                $this->_view->generate("");
            }
        } else {
            $this->login();
        }
    }

    private function chooseProduct() {

        if(isset($_SESSION["storeName"])) {
            if (isset($_POST["valider"]) && isset($_POST["tab"])) {
                $this->_haveingManager = new HaveingManager();
                foreach($_POST["tab"] as $idProduct) {
                    $this->_haveingManager->insert($_SESSION["id"], $idProduct);
                }

                $this->_view = new View("Succes");
                $this->_view->generate(array("msg" => "Produits ajoutés avec succés !"));
                
            } else {
                $this->_productManager = new ProductManager();
                $products = $this->_productManager->getProducts();

                $this->_view = new View("ChooseProduct");
                $this->_view->generate(array("products" => $products));
            }
        } else {
            $this->login();
        }
    }

    private function showProducts() {
        if(isset($_SESSION["storeName"])) {
            $this->_haveingManager = new HaveingManager();
            $haveings = $this->_haveingManager->GetLignesByIdSeller($_SESSION["id"]);

            $products = [];
            $this->_productManager = new ProductManager();
            foreach($haveings as $haveing) {
               $products[] = $this->_productManager->getProductById($haveing->getIdproduct());
            }
            
            $this->_view = new View("ShowSellerP");
            $this->_view->generate(array("products" => $products,"haveings" => $haveings));

        } else {
            $this->login();
        }
    }

    private function deleteProduct($id) {
        if(isset($_SESSION["storeName"])) {
            $this->_haveingManager = new HaveingManager();
            $this->_haveingManager->deleteProduct($id);
           
            $this->_view = new View("Succes");
            $this->_view->generate(array("msg" => "Le produit a été supprimé de votre magasin"));
        } else {
            $this->login();
        }
    }

    public function modifyProduct($id) {
        if(isset($_SESSION["storeName"])) {
            if ( isset($_POST["available"]) || isset($_POST["price"]) ){
                $this->_haveingManager = new HaveingManager();
                $this->_haveingManager->modifyProduct($id,$_POST);

                $this->_view = new View("Succes");
                $this->_view->generate(array("msg" => "Le produit a été mis a jour"));
            } else {
                $this->_view = new View("EditHave");
                $this->_view->generate(array("id" => $id));
            }
            
        } else {
            $this->login();
        }
    }


}

?>