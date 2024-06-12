<?php    
    class NewProducts extends Database {

        protected function setNewProduct($product_name, $product_description, $user_creator, $product_image, $product_quantity ,$product_price) {
            
            $stmt = $this->connect()->prepare('INSERT INTO products (productName, productDescription, productCreator, productImage, productQuantity, productPrice) VALUES (?, ?, ?, ?, ?, ?);');

            if(!$stmt->execute(array($product_name, $product_description, $user_creator, $product_image, $product_quantity ,$product_price))) {
                $stmt = null;
                header("location: ../addnewproduct.php?error=stmtfailed");
                exit();
            }
        }
    }
    
?>