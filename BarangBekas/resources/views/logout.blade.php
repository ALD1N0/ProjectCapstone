<?php
session_start();
session_destroy();
header("Location: dasboard.php");
exit();
?>
