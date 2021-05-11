<?php
include "configuration/connection.php";
session_start();

if(isset($_POST["lbutton"])){
    $e = $_POST['email'];
    $p = $_POST['pass'];

    $sql = "SELECT * FROM admin WHERE email= '$e' ";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);
    $rows = mysqli_num_rows($query);

    if ($rows){
        $e=$result['email'];
        $_SESSION['email']=$result['email'];
        if ($result['password']==$p){
            echo "<script>window.location.href='reservations.php'</script>";
        }else{
            echo "<script>alert('Wrong password!!!')</script>";
            echo "<script>window.location.href='login.html'</script>";
        }
    }else{
        echo "<script>alert('email does not exist!!!')</script>";
        echo "<script>window.location.href='login.html'</script>";
    }
}

mysqli_close($conn);