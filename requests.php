<?php

@include "configuration/connection.php";
session_start();
if (!isset($_SESSION['email'])){
    header('Location:login.html');
}

$sql="SELECT * FROM tablebooking WHERE status='not confirmed'";
$query=mysqli_query($conn, $sql);
$results=mysqli_fetch_all($query, MYSQLI_ASSOC);
$rows=mysqli_num_rows($query);
mysqli_close($conn);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Requests</title>
    <link rel="stylesheet" href="./styles/requests.css">
</head>
<body>
<div class="nav">
    <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="login.html" class="active">Reservations</a></li>
        <li><a href="#">Menu</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="logout.php">logout</a></li>
    </ul>
    <div class="reserve">
        <a href="index.html">
            <!--<button>BOOK A table</button>-->
            <h1>ATK</h1>

        </a>
    </div>
</div>
<div class="request-heading">
    <h1>Atk food garden</h1>
    <p>All Requests Are Here</p>
</div>


<div class="main-req">
    <?php if ($rows){ ?>
    <?php foreach ($results as $result): ?>
    <div class="req-card">
       <div class="card-info">
           <h3><?php echo htmlspecialchars($result['name'])?></h3>
           <p><?php echo htmlspecialchars(date('d/M/Y', strtotime($result['date']))) ?></p>
           <p><?php echo htmlspecialchars($result['time'])?></p>
       </div>
        <div class="card-btn">
            <div class="btns">
                <a href="details.php?id=<?php echo $result['id']?>"><button class="btn1">Details</button></a>
                <a href="confirm.php?id=<?php echo $result['id']?>"><button class="btn2">Confirm</button></a>
                <a href="delete.php?id=<?php echo $result['id']?>"><button class="btn3">Delete</button></a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <?php }else{ ?>
        <div class="req-card">
            <div class="card-info">
                <h3>No Request Available!</h3>
            </div>
        </div>
    <?php } ?>
</div>

</body>
</html>
