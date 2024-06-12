<?php

class Register extends Database
{

    protected function setUser($name, $email, $password)
    {
        $stmt = $this->connect()->prepare('INSERT INTO users (userName, userEmail, userPassword) VALUES (?, ?, ?);');

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($name, $email, $hashedPassword))) {
            $stmt = null;
            header("location: ../register.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function checkUser($email)
    {
        $stmt = $this->connect()->prepare('SELECT userEmail FROM users WHERE userEmail = ?;');

        if (!$stmt->execute(array($email))) {
            $stmt = null;
            header("location: ../register.php?error=stmtfailed");
            exit();
        }

        $resultCheck = false;
        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }
}
