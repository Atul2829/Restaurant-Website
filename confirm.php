<?php
@include "configuration/connection.php";
session_start();
if (!isset($_SESSION['email'])){
    header('Location:login.html');
}
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM tablebooking WHERE id='$id'  ";
    $q = mysqli_query($conn, $sql);
    $result= mysqli_fetch_assoc($q);
    $row=mysqli_num_rows($q);

    $name=$result['name'];
    $mobile=$result['mobile'];
    $email=$result['email'];
    $size=$result['size'];
    $date=$result['date'];
    $time=$result['time'];

    $token = bin2hex(random_bytes(2));
    $msg="Your reservation request confirmed on $date at $time. Please save the token number & show us when you will come to our restaurant. This is must to prove your reservation. Token is $token";
    $subject="Reservation Confirmed";
    $header='From: badolmohanto2@gmail.com';

    $_SESSION['token']=$token;

    $confirmSql="INSERT INTO confirmedbooking (name,mobile,email,size,date,time,token) VALUES ('$name','$mobile','$email','$size','$date','$time','$token') ";
    $confirmQuery=mysqli_query($conn, $confirmSql);
    if ($confirmQuery){
        echo "<script>alert('Request Confirmed.')</script>";
        echo "<script>window.location.href='requests.php'</script>";
    }
    if ($confirmQuery){
        mail($email,$subject,$msg,$header);
    }

    $deleteSql="DELETE FROM tablebooking WHERE id='$id' ";
    $query=mysqli_query($conn, $deleteSql);


}

mysqli_close($conn);

?>