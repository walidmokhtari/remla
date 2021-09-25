<?php
class Haveing {
    private $_idSeller;
    private $_idProduct;
    private $_price;
    private $_available;

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


    //Setters

    public function setIdseller($idSeller) {
        $idSeller = (int) $idSeller;

        if($idSeller > 0) 
            $this->_idSeller = $idSeller;
    }

    public function setIdproduct($idProduct) {
        $idProduct = (int) $idProduct;

        if($idProduct > 0) 
            $this->_idProduct = $idProduct;
    }

    public function setPrice($price) {
        $price = (double) $price;

        if($price > 0) 
            $this->_price = $price;
    }

    public function setAvailable($available) {
        $available = (int) $available;

        if($available > 0) 
            $this->_available = $available;
    }


    //Getters

    public function getIdseller() {
        return $this->_idSeller;
    }

    public function getIdproduct() {
        return $this->_idProduct;
    }

    public function getPrice() {
        return $this->_price;
    }

    public function getAvailable() {
        return $this->_available;
    }


}

?>