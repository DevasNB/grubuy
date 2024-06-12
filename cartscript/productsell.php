<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["submit"])) {

    include '../loginscript/dbaccess.php';

    $productincart = new Database();
    $drena = $productincart->connect();

    $usrID = $_POST['usrID'];

    $stmt = $drena->prepare('SELECT prodID, prodQuantity FROM cart WHERE usrID = ?;');
    $stmt->execute(array($usrID));
    $picprd = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $i = 0;
    for($i = 0; $i <= count($picprd); $i++) {

        $stmt3 = $drena->prepare('SELECT productQuantity FROM products WHERE productID = ?;');
        $stmt3->execute(array($picprd[$i]["prodID"]));
    
        $totalquant = $stmt3->fetchAll(PDO::FETCH_ASSOC);


        $newprodQuantity = $totalquant[$i]["productQuantity"] - $picprd[$i]["prodQuantity"];

        if($newprodQuantity > 0) {
            $stmt2 = $drena->prepare('UPDATE products set productQuantity = ? WHERE productID = ?;');
            $stmt2->execute(array($newprodQuantity, $picprd[$i]["prodID"]));

            $stmt2->fetch(PDO::FETCH_ASSOC);

            $stmt4 = $drena->prepare('DELETE FROM cart WHERE prodID = ?;');
            $stmt4->execute(array($picprd[$i]["prodID"]));

            $stmt4->fetch(PDO::FETCH_ASSOC);

            header("location: ../mycart.php?success=productincartdeleted");

        }
        else if($newprodQuantity == 0) {

            $stmt1 = $drena->prepare("SET foreign_key_checks=0");
            $stmt1->execute();

            $stmt3 = $drena->prepare('DELETE FROM products WHERE productID = ?');
            $stmt3->execute(array($picprd[$i]["prodID"]));
            
            $stmt3->fetch(PDO::FETCH_ASSOC);

            $stmt5 = $drena->prepare("SET foreign_key_checks=1");
            $stmt5->execute();

            $stmt4 = $drena->prepare('DELETE FROM cart WHERE prodID = ?;');
            $stmt4->execute(array($picprd[$i]["prodID"]));

            $stmt4->fetch(PDO::FETCH_ASSOC);

            header("location: ../mycart.php?success=productincartdeleted");
        }
        else if($newprodQuantity < 0) {
            header("location: ../mycart.php?error=havenoproductstosell");
        }
        else {
            header("location: ../mycart.php?error=prodTotalNotFound");
        }
    }
    }
?>