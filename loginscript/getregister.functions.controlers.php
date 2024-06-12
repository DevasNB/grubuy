<?php

use LDAP\Result;

    class RegisterControlers extends Register {

        private $name;
        private $email; 
        private $password; 
        private $Rpassword;

        //as variaveis dentro do construct não são as mesmas do private
        public function __construct($name, $email, $password, $Rpassword) {
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
            $this->Rpassword = $Rpassword;
        }

        public function registerUser() {

            if($this->emptyInput() == false) {
                //echo "<p class="error-log">Empty input</p>";
                header("location: ../register.php?error=emptyinput");
                exit();
            }
            if($this->invalidName() == false) {
                //echo "<p class="error-log">Enter a valid name</p>";
                header("location: ../register.php?error=invalidname");
                exit();
            }
            if($this->invalidEmail() == false) {
                //echo "<p class="error-log">This is not a valid email</p>";
                header("location: ../register.php?error=invalidemail");
                exit();
            }
            if($this->passwordMath() == false) {
                //echo "<p class="error-log">Passwords doesn't match</p>";
                header("location: ../register.php?error=passwordsnotmatch");
                exit();
            }
            if($this->emailTaken() == false) {
                //echo "<p class="error-log">Email already taken</p>";
                header("location: ../register.php?error=emailtaken");
                exit();
            }

            $this->setUser($this->name, $this->email, $this->password);
        }

        private function emptyInput() {
            $result = false;
            if(empty($this->name) || empty($this->email) || empty($this->password) || empty( $this->Rpassword)) {
                $result = false;
            }
            else {
                $result = true;
            }
            return $result;
        }

        private function invalidName() {
            $result = false;
            if(!preg_match("/^[a-zA-Z\s\p{L}]*$/u", $this->name)) {
                $result = false;
            }
            else {
                $result = true;
            }
            return $result;
        }

        private function invalidEmail() {
            $result = false;
            if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $result = false;
            }
            else {
                $result = true;
            }
            return $result;
        }
        
        private function passwordMath() {
            $result = false;
            if($this->password != $this->Rpassword) {
                $result = false;
            }
            else {
                $result = true;
            }
            return $result;
        }
        
        private function emailTaken() {
            $result = false;
            if(!$this->checkUser($this->email)) {
                $result = false;
            }
            else {
                $result = true;
            }
            return $result;
        }
    }
?>