<?php
@include "configuration/connection.php";
session_start();
if (!isset($_SESSION['email'])){
    header('Location:login.html');
}
mysqli_close($conn);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>See All Reservations</title>
    <link rel="stylesheet" href="./styles/reservations.css">
</head>
<body>
<div class="nav">
    <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a class="active"  href="login.html">Reservations</a></li>
        <li><a href="index.html">Menu</a></li>
        <li><a href="index.html">Contact</a></li>
        <li><a href="./logout.php">logout</a></li>

    </ul>
    <div class="reserve">
        <a href="index.html">
            <!--<button>BOOK A table</button>-->
            <h1>ATK</h1>
        </a>
    </div>
</div>

<div class="reservation-heading">
    <h1>Atk food garden</h1>
    <p>Welcome Mr. Admin</p>
</div>
<div class="check-btn">
    <a href="./reservations-status.php"><button>see reservations status</button></a>
    <br>
    <a href="./requests.php"><button>see reservations requests</button></a><br>
    <a href="./service-done.php"><button>Refresh Service Done List</button></a>
</div>


</body>
</html>