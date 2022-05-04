<?php

session_start();
session_unset();
session_destroy();

header("location: ../Task2/rorindex.php");
exit();

?>