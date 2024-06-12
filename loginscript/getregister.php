<?php

    /*server pass: grubuy123*/

    if(isset($_POST["submit"])) {

        //data
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $Rpassword = $_POST["Rpassword"];

        //Instances RegisterControlers
        include "../loginscript/dbaccess.php";
        include "../loginscript/getregister.functions.php";
        include "../loginscript/getregister.functions.controlers.php";
        
        $register = new RegisterControlers($name, $email, $password, $Rpassword);

        //running errors and handlers
        $register->registerUser();

        //Going to back to front page
        header("location: ../index.php?error=none");
    }
?>