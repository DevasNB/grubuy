<?php
    
    class Login extends Database {

        protected function getUser($email, $password) {
            $stmt = $this->connect()->prepare('SELECT userPassword FROM users WHERE userEmail = ?;');

            if(!$stmt->execute(array($email))) {
                $stmt = null;
                header("location: ../login.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../login.php?error=usernotfound");
                exit();
            }
            
            $passwordHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $checkPassword = password_verify($password, $passwordHashed[0]["userPassword"]);

            if($checkPassword == false) {
                $stmt = null;
                header("location: ../login.php?error=wrongpassword");
                exit();
            }
            else if($checkPassword == true) {
                $stmt = $this->connect()->prepare('SELECT * FROM users WHERE userEmail = ? AND userPassword = ?;');

                if(!$stmt->execute(array($email, $passwordHashed[0]["userPassword"]))) {
                    $stmt = null;
                    header("location: ../login.php?error=stmtfailed");
                    exit();
                }

                if($stmt->rowCount() == 0) {
                    header("location: ../login.php?error=usernotfound{$stmt->rowCount()}");
                    $stmt = null;
                    
                    exit();
                }

                $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

                session_start();
                $_SESSION["user_ID"] = $user[0]["userID"];
                $_SESSION["user_Name"] = $user[0]["userName"];
                $_SESSION["user_Email"] = $user[0]["userEmail"];
                $_SESSION["user_Website"] = $user[0]["userWebsite"];
                $_SESSION["user_Location"] = $user[0]["userLocation"];
                $_SESSION["user_Phone"] = $user[0]["userPhone"];
                $_SESSION["user_Birthday"] = $user[0]["userBirtday"];
                $_SESSION["user_Image"] = $user[0]["userImage"];
            }
            
            $stmt = null;
        }
    }
?>