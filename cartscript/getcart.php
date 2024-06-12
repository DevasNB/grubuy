
<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["submit"])) {

    //data
    $product_id = $_POST["productID"];
    $product_quantity = $_POST["productQuantity"];
    $product_price = $_POST["productPrice"];

    include "../loginscript/dbaccess.php";
    include "../cartscript/getcart.function.php";

    $user_id = $_SESSION["user_ID"];

    //Other variables - like date and creator

    $addcart = new AddCart();

    //running errors and handlers
    $addcart->setProductCart($product_id, $product_quantity, $product_price, $user_id);

    //Going to back to front page
    header("location: ../mycart.php?error=productaddedtocart");
}

?>