<?php

@include "configuration/connection.php";

session_start();
$error = array();


if (isset($_POST['button'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $partyNumber = mysqli_real_escape_string($conn, $_POST['number']);
    $date = mysqli_real_escape_string($conn, date('y-m-d', strtotime($_POST['date'])));
    $date2 = mysqli_real_escape_string($conn, date('d-M-Y', strtotime($_POST['date'])));
    $time = mysqli_real_escape_string($conn, $_POST['time']);

    $_SESSION['inputDate'] = new DateTime($_POST['date']);

    $dateNew = new DateTime($_POST['date']);
    $currentDate = new DateTime(date('y-m-d'));

    $sql1 = "SELECT * FROM tablebooking WHERE name ='$name' && mobile='$mobile' && email='$email' && size='$partyNumber' && date='$date' && time='$time' ";
    $q = mysqli_query($conn, $sql1);
    $row = mysqli_num_rows($q);

    $sqlr=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM confirmedbooking WHERE date='$date' && time='$time'"));



//    echo $sql1;
    if ($row >= 1) {
        echo $error['u'] = "<script>alert('Request with same properties already under processing!!!')</script>";
        echo "<script>window.location.href='table-booking.html'</script>";
    }

    if ($sqlr >= 20){
        echo $error['u'] = "<script>alert('We are extremely sorry. Our all seats are booked at $date2 on $time')</script>";
        echo "<script>window.location.href='table-booking.html'</script>";
    }

    if ($partyNumber < 1) {
        echo $error["n"] = "<script>alert('party size has to be at least 1!!!')</script>";
        echo "<script>window.location.href='table-booking.html'</script>";
    }
    if ($currentDate > $dateNew) {
        echo $error["d"] = "<script>alert('date have to be in future!!!')</script>";
        echo "<script>window.location.href='table-booking.html'</script>";
    }


    if (count($error) == 0) {
        $sql = "INSERT INTO tablebooking (name, mobile, email, size, date, time) VALUES ('$name','$mobile','$email','$partyNumber','$date','$time')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
//            echo $error["n"]= "<script>alert('Confirmation message will sent to your email.')</script>";

            echo "<script>window.location.href='request-success.html'</script>";
        } else {
            echo "<script>alert('Request Unsuccessful!!!')</script>";
        }
    }

}
?>
