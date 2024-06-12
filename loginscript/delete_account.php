<?php
include '../loginscript/dbaccess.php';

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["submit"])) {

    $myproduct = new Database();
    $drena = $myproduct->connect();

    //disable foreign key checks before deletion
    $stmt = $drena->prepare("SET foreign_key_checks=0");
    $stmt->execute();

    $user_ID = $_SESSION["user_ID"];

    $stmt = $drena->prepare('DELETE FROM products WHERE productCreator = ?;');
    $stmt->execute(array($user_ID));

    $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt2 = $drena->prepare('DELETE FROM cart WHERE usrID = ?;');
    $stmt2->execute(array($user_ID));

    $stmt2->fetchAll(PDO::FETCH_ASSOC);

    $stmt3 = $drena->prepare('DELETE FROM users WHERE userID = ?;');
    $stmt3->execute(array($user_ID));
    $stmt3->fetchAll(PDO::FETCH_ASSOC);

    $stmt = $drena->prepare("SET foreign_key_checks=1");
    $stmt->execute();

    session_unset();
    session_destroy();

    header("location: ../index.php?error=accountdeleted");
}
