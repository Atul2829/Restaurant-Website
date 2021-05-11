<?php
@include "configuration/connection.php";
session_start();
if (!isset($_SESSION['email'])){
    header('Location:login.html');
}
$qAll = "SELECT * FROM confirmedbooking";
$query = mysqli_query($conn, $qAll);
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);


$currentDate = new DateTime(date('y-m-d'));


$globalInsert = null;
$globalDelete = null;

foreach ($result as $r) {
    $date = new DateTime($r['date']);
    if ($date < $currentDate) {
        $newId = $r['id'];
        $sql = "SELECT * FROM confirmedbooking WHERE id='$newId' ";
        $selectQuery = mysqli_query($conn, $sql);
        $fetchResult = mysqli_fetch_assoc($selectQuery);
        if ($fetchResult) {
            $fetchId = $fetchResult['id'];
            $fetchName = $fetchResult['name'];
            $fetchMobile = $fetchResult['mobile'];
            $fetchEmail = $fetchResult['email'];
            $fetchSize = $fetchResult['size'];
            $fetchDate = $fetchResult['date'];
            $fetchTime = $fetchResult['time'];

            $insertSql = "INSERT INTO servicedone(name,mobile,email,size,date,time) VALUES ('$fetchName','$fetchMobile','$fetchEmail','$fetchSize','$fetchDate','$fetchTime')";
            $insertQuery = mysqli_query($conn, $insertSql);

            $globalInsert = $insertSql;

            $deleteSql = "DELETE FROM confirmedbooking WHERE id='$fetchId'";
            $deleteQuery = mysqli_query($conn, $deleteSql);

            $globalDelete = $deleteSql;

            if ($insertSql && $deleteSql) {
                echo "<script>alert('Data Refreshed');</script>";
                echo "<script>location.href='reservations.php'</script>";
            }
        }
    }
}
if ($globalInsert == null && $globalDelete == null){
    echo "<script>alert('No Data To Refresh!! Try again after 24 hours.');</script>";
    echo "<script>location.href='reservations.php'</script>";
}

$previousDay = date('Y-m-d', strtotime('now - 7day'));

$deleteServiceDone="DELETE FROM servicedone WHERE date='$previousDay' ";
$oldServiceQuery=mysqli_query($conn, $deleteServiceDone);

mysqli_close($conn);