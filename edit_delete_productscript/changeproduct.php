<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["submit"])) {

    include "../loginscript/dbaccess.php";

    $productedit = new Database();
    $drena = $productedit->connect();

    //data
    $product_name = $_POST["productname"];
    $product_description = $_POST["productdescription"];
    $product_price = $_POST["productprice"];
    $product_quantity = $_POST["productquantity"];
    $product_image = $_FILES['productimage'];
    $product_id = $_POST['productID'];

    //image upload
    // Destinaiton path
    // Concatenating uploaded file name with destination path
    $destination_path = "/home/grubuy/www/cabanao/uploads/products/" . $product_image['name'];

    if (is_uploaded_file($product_image['tmp_name'])) {
        if (!move_uploaded_file($product_image['tmp_name'], $destination_path)) {
            header("location: ../myproducts.php?error=imagenotsent");
            exit();
        }
    } else {
        header("location: ../myproducts.php?error=fail_to_upload_image");
        exit();
    }
    
    $stmt = $drena->prepare('UPDATE products set productName = ?, productDescription = ?, productImage = ?, productQuantity = ?, productPrice = ? WHERE productID = ?;');
    $stmt->execute(array($product_name, $product_description, $product_image['name'], $product_quantity, $product_price, $product_id));
    
    $stmt->fetchAll(PDO::FETCH_ASSOC);

    header("location: ../myproducts.php?error=productedited");
}
?>


