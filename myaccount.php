<?php
include 'getlogin.php';
include './loginscript/dbaccess.php';

session_start();
if (isset($_SESSION["user_Name"])) {
    echo '';
} else {
    header("location: ../login.php?error=startyoursession");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Grubuy - My Account</title>

    <link rel="shortcut icon" type="image/x-icon" href="/imagens/grubuy5.png" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body class="color-background">
    <?php
    require "header.php";
    ?>

    <div class="container px-4 mt-4">
        <div class="row">
            <?php

            class user extends Database
            {
                public function pickProduct($userID)
                {
                    $stmt = $this->connect()->prepare('SELECT * FROM users WHERE userID = ?;');
                    $stmt->execute(array($userID));

                    $euser = $stmt->fetch(PDO::FETCH_ASSOC);

                    return $euser;
                }
            }

            $myuser = new user();

            $userID = $_SESSION["user_ID"];
            $user_edit = $myuser->pickProduct($userID);

            $date = new DateTime($user_edit["userBirthday"]);
            $result = $date->format('Y-m-d');

            echo '
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card style-border4 mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->';
                        
                        if (empty($user_edit["userImage"])) {
                            echo '<img class="style-border5 card-img-top card-image-size3" src="./imagens/image icons/person_icon.png" alt="null">';
                        }
                        else {
                            echo '<img class="style-border5 card-img-top card-image-size" src="./uploads/users/'.$user_edit["userImage"].'" alt="notnull">';
                        }
                        
                    echo '
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4 style-border4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                                        <label class="small mb-1 bold" for="inputUsername">Your name: </label>
                                        <input class="form-control" type="text" placeholder="' . $user_edit["userName"] . '" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label class="small mb-1 bold" for="inputEmailAddress">Email address: </label>
                                        <input class="form-control" id="inputEmailAddress" type="email" placeholder="' .$user_edit["userEmail"] . '" disabled>
                                    </div>
                                    
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (organization name)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputOrgName">Web site: </label>
                                            <input class="form-control" id="inputOrgName" type="text" placeholder="' . $user_edit["userWebsite"] . '" disabled>
                                        </div>
                                        <!-- Form Group (location)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputLocation">Location: </label>
                                            <input class="form-control" id="inputLocation" type="text" placeholder="' . $user_edit["userLocation"] . '" disabled>
                                        </div>
                                    </div>
                        
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (phone number)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputPhone">Phone number: </label>
                                            <input class="form-control" id="inputPhone" placeholder="' . $user_edit["userPhone"] . '" disabled>
                                        </div>
                                        <!-- Form Group (birthday)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputBirthday">Birthday: </label>
                                            <input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="' . $result . '" disabled>
                                        </div>
                                    </div>
                                    <a href="../editprofile.php" class="btn btn-warning" type="button">Edit profile</a>';
            ?>
        </div>
    </div>
    </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>