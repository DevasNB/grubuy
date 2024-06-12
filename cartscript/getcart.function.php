<?php    
    class AddCart extends Database {

        public function setProductCart($product_id, $product_quantity ,$product_price, $user_id) {
            
            $stmt = $this->connect()->prepare('INSERT INTO cart (prodID, prodQuantity, prodPrice, usrID) VALUES (?, ?, ?, ?);');

            if(!$stmt->execute(array($product_id, $product_quantity ,$product_price, $user_id))) {
                $stmt = null;
                header("location: ../productpage.php?error=stmtfailed");
                exit();
            }
        }
    }
    
?>