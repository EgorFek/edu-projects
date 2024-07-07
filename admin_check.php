<?php
session_start();
if (!$_SESSION['auth'] || $_SESSION['status'] != 'admin') {
    header("Location: index.php");
    exit;
}
