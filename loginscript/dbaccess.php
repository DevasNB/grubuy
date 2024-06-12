<?php
class Database {

  public function connect() {
    
    try {
      
      $username = "grubuy";
      $password = "7O4@0XcY#9BXcYW*6jT%i!&5";

      $conn = new PDO("mysql:host=localhost;dbname=grubuy", $username, $password);
      
      return $conn;
    } 
    catch(PDOException $e) {
      echo "<br>Connection failed: " . $e->getMessage(). "<br/>";
    }
  }

}

?>
