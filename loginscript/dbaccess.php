<?php
class Database
{

      public function connect()
      {

            try {


                  $username = "CCPDBUser";
                  $password = "CCPDBPassword";


                  $conn = new PDO("mysql:host=10.0.1.4;dbname=grubuy", $username, $password);

                  return $conn;
            } catch (PDOException $e) {
                  echo "<br>Connection failed: " . $e->getMessage() . "<br/>";
            }
      }
}
