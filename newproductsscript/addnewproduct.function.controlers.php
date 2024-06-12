<?php

use LDAP\Result;

    class NewProductsControlers extends NewProducts {

        private $product_name;
        private $product_description;
        private $product_image;
        private $product_quantity;
        private $product_price;
        private $user_creator;
        
        //as variaveis dentro do construct não são as mesmas do private
        public function __construct($product_name, $product_description, $user_creator, $product_image, $product_quantity, $product_price) {
            $this->product_name = $product_name;
            $this->product_description = $product_description;
            $this->product_image = $product_image; 
            $this->product_quantity = $product_quantity;
            $this->product_price = $product_price; 
            $this->user_creator = $user_creator;  

        }

        public function newProductsUser() {

            if($this->emptyName() == false) {
                //echo "<p class="error-log">Empty input</p>";
                header("location: ../addnewproduct.php?error=emptyname");
                exit();
            }
            if($this->emptyDescription() == false) {
                //echo "<p class="error-log">Empty input</p>";
                header("location: ../addnewproduct.php?error=emptydescription");
                exit();
            }
            if($this->emptyPrice() == false) {
                //echo "<p class="error-log">Empty input</p>";
                header("location: ../addnewproduct.php?error=emptyprice");
                exit();
            }
            if($this->emptyQuantity() == false) {
                //echo "<p class="error-log">Empty input</p>";
                header("location: ../addnewproduct.php?error=emptyquantity");
                exit();
            }

            $this->setNewProduct($this->product_name, $this->product_description, $this->user_creator, $this->product_image, $this->product_quantity, $this->product_price);
        }

        private function emptyName() {
            $result = false;
            if(empty($this->product_name)) {
                $result = false;
            }
            else {
                $result = true;
            }
            return $result;
        }

        private function emptyDescription() {
            $result = false;
            if(empty($this->product_description)) {
                $result = false;
            }
            else {
                $result = true;
            }
            return $result;
        }

        private function emptyPrice() {
            $result = false;
            if(empty($this->product_price)) {
                $result = false;
            }
            else {
                $result = true;
            }
            return $result;
        }

        private function emptyQuantity() {
            $result = false;
            if(empty($this->product_quantity)) {
                $result = false;
            }
            else {
                $result = true;
            }
            return $result;
        }
    }
?>