<?php
include '../loginscript/dbaccess.php';

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["submit"])) {

    $myproduct = new Database();
    $drena = $myproduct->connect();

    $prodID = $_POST['prodID'];

    $stmt = $drena->prepare('DELETE FROM cart WHERE prodID = ?;');
    $stmt->execute(array($prodID));
    
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    header("location: ../mycart.php?error=productincartdeleted");

} 
?>