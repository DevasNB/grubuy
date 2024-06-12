<?php
include '../loginscript/dbaccess.php';

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["submit"])) {

    $myproduct = new Database();
    $drena = $myproduct->connect();

    $productID = $_POST['productID'];

    $stmt = $drena->prepare('DELETE FROM products WHERE productID = ?;');
    $stmt->execute(array($productID));
    
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    header("location: ../myproducts.php?error=productdeleted");
} 
?>