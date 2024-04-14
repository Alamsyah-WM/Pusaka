<?php
session_start();

unset($_SESSION['status']);
session_unset();
session_destroy();

header("Location: index.php");

?>