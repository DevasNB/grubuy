<?php

    error_reporting(E_ALL);
      ini_set('display_errors', 'On');

use LDAP\Result;

    class LoginControlers extends Login {

        private $email; 
        private $password; 

        //as variaveis dentro do construct não são as mesmas do private
        public function __construct($email, $password) {
            $this->email = $email;
            $this->password = $password;
        }

        public function LoginUser() {

            if($this->emptyInput() == false) {
                //echo "<p class="error-log">Empty input</p>";
                header("location: ../login.php?error=emptyinput");
                exit();
            }

            $this->getUser($this->email, $this->password);
        }

        private function emptyInput() {
            $result = false;
            if(empty($this->email) || empty( $this->password)) {
                $result = false;
            }
            else {
                $result = true;
            }
            return $result;
        }
    }
?>