<?php
session_start();
$_SESSION = NULL;
setcookie(session_name(), "", time());
session_destroy();
header("Location: index.php");
