<?php
session_start();
if (!isset($_SESSION['email'])){
    header('Location:login.html');
}

session_destroy();
header("Location:login.html");