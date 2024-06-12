<?php

use LDAP\Result;

    class EditProductsControlers extends EditedProducts {

        private $product_name;
        private $product_description;
        private $product_image;
        private $product_quantity;
        private $product_price;
        private $product_id;

        //as variaveis dentro do construct não são as mesmas do private
        public function __construct($product_name, $product_description, $product_image, $product_quantity, $product_price, $product_id) {
            $this->product_name = $product_name;
            $this->product_description = $product_description;
            $this->product_image = $product_image; 
            $this->product_quantity = $product_quantity;
            $this->product_price = $product_price;
            $this->product_id = $product_id;
        }

        public function EditProducts() {
            $this->setEditProduct($this->product_name, $this->product_description, $this->product_image, $this->product_quantity, $this->product_price, $this->product_id);
        }
    }
?>