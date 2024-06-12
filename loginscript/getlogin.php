<?php

    if(isset($_POST["submit"])) {

        //data
        $email = $_POST["email"];
        $password = $_POST["password"];


        //Instances LoginControlers
        include "../loginscript/dbaccess.php";
        include "../loginscript/getlogin.functions.php";
        include "../loginscript/getlogin.functions.controlers.php";
        
        $login = new LoginControlers($email, $password);

        //running errors and handlers
        $login->LoginUser();
        
        //Going to back to front page
        header("location: ../index.php?welcome");
    }
?>