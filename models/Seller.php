<?php
class Seller {
    private $_id;
    private $_storeName;
    private $_email;
    private $_pwd;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data) {
        //PARCOURIR UNE LIGNE DE CASE EN CASE
        foreach($data as $key => $value) {
            $method = "set".ucfirst($key);

            if(method_exists($this,$method))
                $this->$method($value);
            
        }
    }

    //SETTERS

    public function setId($id) {
        $id = (int) $id;

        if($id > 0) 
            $this->_id = $id;
    }

    public function setStoreName($storeName) {
        if(is_string($storeName)) 
            $this->_storeName = $storeName;
    }

    public function setEmail($email) {
        if(is_string($email)) 
            $this->_email = $email;
    }

    public function setPwd($pwd) {
        if(is_string($pwd)) 
            $this->_pwd = $pwd;
    }

    //Getters

    public function getId() {
        return $this->_id;
    }

    public function getStoreName() {
        return $this->_storeName;
    }

    public function getEmail() {
        return $this->_email;
    }

    public function getPwd() {
        return $this->_pwd;
    }
}

?>