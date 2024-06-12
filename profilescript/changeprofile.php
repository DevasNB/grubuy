<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["submit"])) {

    //data
    $profile_website = $_POST["website"];
    $profile_location = $_POST["location"];
    $profile_phone = $_POST["phone"];
    $profile_birthday = $_POST["birthday"];
    $profile_image = $_FILES['profileimage'];


    //image upload
    // Destinaiton path
    // Concatenating uploaded file name with destination path
    $destination_path = "../uploads/users/" . $profile_image['name'];

    if (is_uploaded_file($profile_image['tmp_name'])) {
        if (!move_uploaded_file($profile_image['tmp_name'], $destination_path)) {
            header("location: ../editprofile.php?error=imagenotsent");
            exit();
        }
    } else {
     ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    }

    //Instances LoginControlers
    include "../loginscript/dbaccess.php";
    include "../profilescript/changeprofile.functions.php";
    include "../profilescript/changeprofile.functions.controlers.php";

    //Other variables - like date and creator

    $newdata = new EditProfileControlers($profile_website, $profile_location, $profile_phone, $profile_birthday ,$profile_image['name']);

    //running errors and handlers
    $newdata ->EditUser();

    //Going to back to front page
    header("location: ../myaccount.php?error=user_edited");
}

?>