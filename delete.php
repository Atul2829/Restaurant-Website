<?php
@include "configuration/connection.php";
session_start();
if (!isset($_SESSION['email'])){
    header('Location:login.html');
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tablebooking WHERE id='$id'";
    $q = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($q);
    $email = $result['email'];

    $sqli = "INSERT INTO deletedbooking(email) VALUE('$email') ";
    $qi = mysqli_query($conn, $sqli);


    $sqld = "DELETE FROM tablebooking WHERE id='$id'";
    $q = mysqli_query($conn, $sqld);
    if ($q) {
        echo "<script> alert('Successfully Deleted.'),
            window.location.href='requests.php';
        </script>";
    }else{
        echo "<script> alert('Error!!!'),
            window.location.href='requests.php';
        </script>";
    }

} else {
    echo "<script> alert('Request can not found!!!'),
    window.location.href='requests.php';
    </script>";
}
mysqli_close($conn);
?>

