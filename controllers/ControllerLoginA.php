<?php
require_once("views/View.php");

class ControllerLoginA {
    private $_adminManager;
    private $_sellerManager;
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

    private function login() {
        
        if(isset($_SESSION["f_name"])) {
                $this->_view = new View("AdminControlP");
                $this->_view->generate("");
        } else {
                $this->_view = new View("LoginA");
                $this->_view->generate("");
        }
    }

    private function checkLogin() {

        if ($_POST != NULL) {
            $this->_adminManager = new AdminManager();
            $admin = $this->_adminManager->getAdmin($_POST);

            if($admin != NULL) {
        
                $_SESSION["f_name"] = $admin->getFname();
                $_SESSION["l_name"] = $admin->getLname();

                $this->_view = new View("AdminControlP");
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

    private function adminControl() {

        if(isset($_SESSION["f_name"])) {
            $this->_view = new View("AdminControlP");
            $this->_view->generate("");
        } else {
            $this->login();
        }
        
    }


    //Sellers management

    private function addSeller() {
        if(isset($_SESSION["f_name"])) {
            if(isset($_POST["enregistrer"])) {
                $this->_sellerManager = new SellerManager();
                $this->_sellerManager->insertSeller($_POST);

                $this->_view = new View("Succes");
                $this->_view->generate(array("msg" => "Vendeur ajouté avec succes"));
            } else {
                $this->_view = new View("AddSeller");
                $this->_view->generate("");
            }
            
        } else {
            $this->login();
        }
        
    }

    private function showSellers() {
        if(isset($_SESSION["f_name"])) {
            $this->_sellerManager = new SellerManager();
            $sellers = $this->_sellerManager->getSellers();

            $this->_view = new View("ShowSellers");
            $this->_view->generate(array("sellers" => $sellers));
        } else {
            $this->login();
        }
    }

    private function deleteSeller($id) {
        if(isset($_SESSION["f_name"])) {
            $this->_sellerManager = new SellerManager();
            $this->_sellerManager->deleteSellerById($id);
            
            $this->_view = new View("Succes");
            $this->_view->generate(array("msg" => "Le vendeur a été supprimé"));
        } else {
            $this->login();
        }
    }

    private function modifySeller($id) {
        if(isset($_SESSION["f_name"])) {
            if (isset($_POST["storeName"])){
                $this->_sellerManager = new SellerManager();
                $this->_sellerManager->modifySellerById($id,$_POST);

                $this->_view = new View("Succes");
                $this->_view->generate(array("msg" => "Le vendeur a été mis a jour"));
            } else {
                $this->_view = new View("EditSeller");
                $this->_view->generate(array("id" => $id));
            }
            
        } else {
            $this->login();
        }
    }

    //Product management

    private function showProducts() {
        if(isset($_SESSION["f_name"])) {
            $this->_productManager = new ProductManager();
            $products = $this->_productManager->getProducts();

            $this->_view = new View("ShowProduct");
            $this->_view->generate(array("products" => $products));
        } else {
            $this->login();
        }
    }

    private function addProduct() {
        if(isset($_SESSION["f_name"])) {
            $this->_view = new View("AddProduct");
            $this->_view->generate("");
        } else {
            $this->login();
        }
    }

    private function product() {
        if(isset($_SESSION["f_name"])) {
            if(isset($_POST["enregistrer"])) {
                $this->_productManager = new ProductManager();
                $this->_productManager->insertProduct($_POST);

                $this->_view = new View("Succes");
                $this->_view->generate(array("msg" => "Produit ajouté avec succes"));
            } else {
                $this->login();
            }
            
        } else {
            $this->login();
        }
    }

    private function deleteProduct($id) {
        if(isset($_SESSION["f_name"])) {
            $this->_productManager = new ProductManager();
            $this->_productManager->deleteProductById($id);
           
            $this->_view = new View("Succes");
            $this->_view->generate(array("msg" => "Le produit a été supprimé"));
        } else {
            $this->login();
        }
    }

    public function modifyProduct($id) {
        if(isset($_SESSION["f_name"])) {
            if (isset($_POST["nameProduct"])){
                $this->_productManager = new ProductManager();
                $this->_productManager->modifyProductById($id,$_POST);

                $this->_view = new View("Succes");
                $this->_view->generate(array("msg" => "Le produit a été mis a jour"));
            } else {
                $this->_view = new View("EditProduct");
                $this->_view->generate(array("id" => $id));
            }
            
        } else {
            $this->login();
        }
    }
}

?>