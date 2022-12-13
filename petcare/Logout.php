<?php
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
header("location:/petcare/UNhome1.php"); //to redirect back to "index.php" after logging out
exit();
 ?>
