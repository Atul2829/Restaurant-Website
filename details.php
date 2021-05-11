<?php

@include "configuration/connection.php";
session_start();
if (!isset($_SESSION['email'])){
    header('Location:login.html');
}
if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "SELECT * FROM tablebooking WHERE id='$id' ";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);
}
mysqli_close($conn);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/details.css">
</head>
<body>

<div class="nav">
    <ul>
        <li><a class="active" href="index.html">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="login.html">Reservations</a></li>
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
<div class="details-heading">
    <div class="heading">
        <h1>Details of Requested user</h1>
        <?php if ($result): ?>
            <p> Details of <span> <?php echo htmlspecialchars($result['name']) ?></span></p>
        <?php else: ?>
            <p>User Account not found!!!</p>
        <?php endif; ?>
    </div>
</div>

<div class="main-req">
    <?php if ($result): ?>
        <div class="req-card">
            <div class="card-info">
                <p><span>Name:</span> <?php echo htmlspecialchars($result['name']) ?></p>
                <p><span>Email:</span> <?php echo htmlspecialchars($result['email']) ?></p>
                <p><span>Party Size:</span><?php echo htmlspecialchars($result['size']) ?></>
                <p>
                    <span>Requesting Date:</span> <?php echo htmlspecialchars(date('d/M/Y', strtotime($result['date']))) ?>
                </p>
                <p><span>Requesting Time:</span> <?php echo htmlspecialchars($result['time']) ?></p>
            </div>
            <div class="card-btn">
                <div class="btns">
                    <a href="confirm.php?id=<?php echo $result['id']?>">
                        <button class="btn2">Confirm</button>
                    </a>
                    <a href="delete.php?id=<?php echo $result['id']?>">
                        <button class="btn3">Delete</button>
                    </a>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="req-card">
            <div class="card-info">
                <h3>No User Request Found!!!</h3>
            </div>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
