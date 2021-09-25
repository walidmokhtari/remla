<?php
class Product {
    private $_id;
    private $_nameProduct;
    private $_type;
    private $_barCode;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data) 
    {
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

    public function setNameproduct($nameProduct) {
        if(is_string($nameProduct)) 
            $this->_nameProduct = $nameProduct;
    }

    public function setType($type) {
        if(is_string($type)) 
            $this->_type = $type;
    }

    public function setPrice($price) {
        $price = (double) $price;

        if (is_double($price))
            $this->_price = $price;
    }

    public function setAvailable($available) {
        $available = (int) $available;
        if(is_int($available)) 
            $this->_available = $available;
    }

    public function setBarcode($barcode) {
        if(is_string($barcode)) 
            $this->_barCode = $barcode;
    }

    //Getters

    public function getId() {
        return $this->_id;
    }

    public function getNameProduct() {
        return $this->_nameProduct;
    }

    public function getType() {
        return $this->_type;
    }

    public function getPrice() {
        return $this->_price;
    }

    public function getAvailable() {
        return $this->_available;
    }

    public function getBarCode() {
        return $this->_barCode;
    }


} 



?>