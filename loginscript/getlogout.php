<?php
session_start();
session_unset();
session_destroy();

//back to index
header("location: ../index.php?error=none");
?>