<?php
require_once("views/View.php");

class ControllerAccueil {
    private $_adminManager;
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && count( (array)$url ) > 3)
            throw new Exception("Page introuvable");
        else
        {
            if (isset($url[1]) && method_exists($this,$url[1]))
            {
                 $action = $url[1];
                 $this->$action();
            }
        else
            $this->admin();
    }
    }


    private function admin() {
        $this->_view = new View("Accueil");
        $this->_view->generate("");
    }
}
?>