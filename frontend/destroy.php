<?php
session_start();
unset($_SESSION['usuario_id']);
session_destroy();
header("location: index.php?Message=" . "successfully logged out!!");
?>