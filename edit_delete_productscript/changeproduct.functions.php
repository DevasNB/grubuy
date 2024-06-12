<?php    
    class EditedProducts extends Database {

        protected function setEditProduct($product_name, $product_description, $product_image, $product_quantity ,$product_price, $product_id) {
            
            $stmt = $this->connect()->prepare('UPDATE products SET productName = ?, productDescription = ?, productImage = ?, productQuantity = ?, productPrice = ? WHERE productID = ?');

            if(!$stmt->execute(array($product_name, $product_description, $product_image, $product_quantity ,$product_price, $product_id))) {
                $stmt = null;
                header("location: ../addnewproduct.php?error=stmtfailed");
                exit();
            }
        }
    }
    
?>
