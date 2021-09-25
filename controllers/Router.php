<?php
require_once("views/View.php");
class Router
{
    private $_ctrl;
    private $_view;

    public function routeReq()
    {
        try
        {
            //Chargement automatique des classes du model
            spl_autoload_register(function($class)
            {
                require_once("models/".$class.".php");
            });

            $url = "";
            
            //SI IL Y'A QUELQUE CHOSE DANS LE L'URL
            if (isset($_GET["url"]))
            {
                
                $url = explode("/",filter_var($_GET["url"],FILTER_SANITIZE_URL));

                $controller = $url[0];
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";
                
                if(file_exists($controllerFile))
                {
                    require_once($controllerFile);
                    $this->_ctrl = new $controllerClass($url);
                }
                else 
                   throw new Exception("Error : page not found");    
            }
            else
            {
                require_once("controllers/ControllerAccueil.php");
                $this->_ctrl = new ControllerAccueil($url);
            }  
        }
        catch(Exception $e)
        {
            $errorMsg = $e->getMessage();
            $this->_view = new View("Error");
            $this->_view->generate(array ("errorMsg" => $errorMsg));
        }
    }
}

?>