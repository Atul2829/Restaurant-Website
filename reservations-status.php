<?php
@include "configuration/connection.php";
session_start();
if (!isset($_SESSION['email'])){
    header('Location:login.html');
}

$date = date('y-m-d');
//$date = date('h:i:s a y-m-d');

$showDate = date('d-M-Y');

$sql = "SELECT * FROM confirmedbooking WHERE date='$date' ";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);
$rows = mysqli_num_rows($query);


$result1 = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM confirmedbooking WHERE date='$date' && time='9.00 AM'"), MYSQLI_ASSOC);
$result2 = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM confirmedbooking WHERE date='$date' && time='10.00 AM'"), MYSQLI_ASSOC);
$result3 = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM confirmedbooking WHERE date='$date' && time='12.00 PM'"), MYSQLI_ASSOC);
$result4 = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM confirmedbooking WHERE date='$date' && time='1.00 PM'"), MYSQLI_ASSOC);
$result5 = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM confirmedbooking WHERE date='$date' && time='3.00 PM'"), MYSQLI_ASSOC);
$result6 = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM confirmedbooking WHERE date='$date' && time='6.00 PM'"), MYSQLI_ASSOC);
$result7 = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM confirmedbooking WHERE date='$date' && time='7.00 PM'"), MYSQLI_ASSOC);
$result8 = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM confirmedbooking WHERE date='$date' && time='8.00 PM'"), MYSQLI_ASSOC);

$time1 = count($result1);
$time2 = count($result2);
$time3 = count($result3);
$time4 = count($result4);
$time5 = count($result5);
$time6 = count($result6);
$time7 = count($result7);
$time8 = count($result8);


$arrayt1=array();
$arrayt1=$result1;


$arrayt2=array();
$arrayt2=$result2;

$arrayt3=array();
$arrayt3=$result3;

$arrayt4=array();
$arrayt4=$result4;

$arrayt5=array();
$arrayt5=$result5;

$arrayt6=array();
$arrayt6=$result6;

$arrayt7=array();
$arrayt7=$result7;

$arrayt8=array();
$arrayt8=$result8;


$i = 10;
$i2=20;
$c = 0;
$c2 = 0;

mysqli_close($conn);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reserved Tables</title>
    <link rel="stylesheet" href="./styles/reservations-status.css">
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
<div class="reservations-status-heading">
    <div class="heading">
        <h1>See All reserved table</h1>
        <p>See all booking status. <br> <?php echo $showDate ?></p>
    </div>
</div>
<div class="reservation-time">
    <h1>9.00 AM</h1>
    <div class="time-sec">
        <div class="sec">
            <?php for ($c=0; $i >= $c+1; $c++): ?>
            <div class="time time9">
                <div class="table-info">
                    <h3><?php echo $c+1 ?></h3>
                    <?php if (isset($arrayt1[$c]['token'])){ ?>
                    <p class="allP"> <?php echo $arrayt1[$c]['token'] ?></p>
                    <?php }else{ ?>
                        <p class="allP">ID</p>
                    <?php } ?>
                </div>
            </div>
            <?php endfor; ?>
        </div>
        <div class="sec">
            <?php for ($c2=10; $i2 >= $c2+1; $c2++): ?>
                <div class="time time9">
                    <div class="table-info">
                        <h3><?php echo $c2+1 ?></h3>
                        <?php if (isset($arrayt1[$c2]['token'])){ ?>
                            <p class="allP"> <?php echo $arrayt1[$c2]['token'] ?></p>
                        <?php }elseif (!isset($arrayt1[$c2]['token'])){ ?>
                            <p class="allP">ID</p>
                        <?php } ?>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>


    <h1>10.00 AM</h1>
    <div class="time-sec">
        <div class="sec">
            <?php for ($c=0; $i >= $c+1; $c++): ?>
                <div class="time time10">
                    <div class="table-info">
                        <h3><?php echo $c+1 ?></h3>
                        <?php if (isset($arrayt2[$c]['token'])){ ?>
                            <p class="allP10"> <?php echo $arrayt2[$c]['token'] ?></p>
                        <?php }else{ ?>
                            <p class="allP10">ID</p>
                        <?php } ?>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
        <div class="sec">
            <?php for ($c2=10; $i2 >= $c2+1; $c2++): ?>
                <div class="time time10">
                    <div class="table-info">
                        <h3><?php echo $c2+1 ?></h3>
                        <?php if (isset($arrayt2[$c2]['token'])){ ?>
                            <p class="allP10"> <?php echo $arrayt2[$c2]['token'] ?></p>
                        <?php }else{ ?>
                            <p class="allP10">ID</p>
                        <?php } ?>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>

    <h1>12.00 PM</h1>
    <div class="time-sec">
        <div class="sec">
            <?php for ($c=0; $i >= $c+1; $c++): ?>
                <div class="time time12">
                    <div class="table-info">
                        <h3><?php echo $c+1 ?></h3>
                        <?php if (isset($arrayt3[$c]['token'])){ ?>
                            <p class="allP12"> <?php echo $arrayt3[$c]['token'] ?></p>
                        <?php }else{ ?>
                            <p class="allP12">ID</p>
                        <?php } ?>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
        <div class="sec">
            <?php for ($c2=10; $i2 >= $c2+1; $c2++): ?>
                <div class="time time12">
                    <div class="table-info">
                        <h3><?php echo $c2+1 ?></h3>
                        <?php if (isset($arrayt3[$c2]['token'])){ ?>
                            <p class="allP12"> <?php echo $arrayt3[$c2]['token'] ?></p>
                        <?php }else{ ?>
                            <p class="allP12">ID</p>
                        <?php } ?>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>

    <h1>1.00 PM</h1>
    <div class="time-sec">
        <div class="sec">
            <?php for ($c=0; $i >= $c+1; $c++): ?>
                <div class="time time1">
                    <div class="table-info">
                        <h3><?php echo $c+1 ?></h3>
                        <?php if (isset($arrayt4[$c]['token'])){ ?>
                            <p class="allP1"> <?php echo $arrayt4[$c]['token'] ?></p>
                        <?php }else{ ?>
                            <p class="allP1">ID</p>
                        <?php } ?>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
        <div class="sec">
            <?php for ($c2=10; $i2 >= $c2+1; $c2++): ?>
                <div class="time time1">
                    <div class="table-info">
                        <h3><?php echo $c2+1 ?></h3>
                        <?php if (isset($arrayt4[$c2]['token'])){ ?>
                            <p class="allP1"> <?php echo $arrayt4[$c2]['token'] ?></p>
                        <?php }else{ ?>
                            <p class="allP1">ID</p>
                        <?php } ?>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>

    <h1>3.00 PM</h1>
    <div class="time-sec">
        <div class="sec">
            <?php for ($c=0; $i >= $c+1; $c++): ?>
                <div class="time time3">
                    <div class="table-info">
                        <h3><?php echo $c+1 ?></h3>
                        <?php if (isset($arrayt5[$c]['token'])){ ?>
                            <p class="allP3"> <?php echo $arrayt5[$c]['token'] ?></p>
                        <?php }else{ ?>
                            <p class="allP3">ID</p>
                        <?php } ?>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
        <div class="sec">
            <?php for ($c2=10; $i2 >= $c2+1; $c2++): ?>
                <div class="time time3">
                    <div class="table-info">
                        <h3><?php echo $c2+1 ?></h3>
                        <?php if (isset($arrayt5[$c2]['token'])){ ?>
                            <p class="allP3"> <?php echo $arrayt5[$c2]['token'] ?></p>
                        <?php }else{ ?>
                            <p class="allP3">ID</p>
                        <?php } ?>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>

    <h1>6.00 PM</h1>
    <div class="time-sec">
        <div class="sec">
            <?php for ($c=0; $i >= $c+1; $c++): ?>
                <div class="time time6">
                    <div class="table-info">
                        <h3><?php echo $c+1 ?></h3>
                        <?php if (isset($arrayt6[$c]['token'])){ ?>
                            <p class="allP6"> <?php echo $arrayt6[$c]['token'] ?></p>
                        <?php }else{ ?>
                            <p class="allP6">ID</p>
                        <?php } ?>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
        <div class="sec">
            <?php for ($c2=10; $i2 >= $c2+1; $c2++): ?>
                <div class="time time6">
                    <div class="table-info">
                        <h3><?php echo $c2+1 ?></h3>
                        <?php if (isset($arrayt6[$c2]['token'])){ ?>
                            <p class="allP6"> <?php echo $arrayt6[$c2]['token'] ?></p>
                        <?php }else{ ?>
                            <p class="allP6">ID</p>
                        <?php } ?>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>

    <h1>7.00 PM</h1>
    <div class="time-sec">
        <div class="sec">
            <?php for ($c=0; $i >= $c+1; $c++): ?>
                <div class="time time7">
                    <div class="table-info">
                        <h3><?php echo $c+1 ?></h3>
                        <?php if (isset($arrayt7[$c]['token'])){ ?>
                            <p class="allP7"> <?php echo $arrayt7[$c]['token'] ?></p>
                        <?php }else{ ?>
                            <p class="allP7">ID</p>
                        <?php } ?>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
        <div class="sec">
            <?php for ($c2=10; $i2 >= $c2+1; $c2++): ?>
                <div class="time time7">
                    <div class="table-info">
                        <h3><?php echo $c2+1 ?></h3>
                        <?php if (isset($arrayt7[$c2]['token'])){ ?>
                            <p class="allP7"> <?php echo $arrayt7[$c2]['token'] ?></p>
                        <?php }else{ ?>
                            <p class="allP7">ID</p>
                        <?php } ?>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>

    <h1>8.00 PM</h1>
    <div class="time-sec">
        <div class="sec">
            <?php for ($c=0; $i >= $c+1; $c++): ?>
                <div class="time time8">
                    <div class="table-info">
                        <h3><?php echo $c+1 ?></h3>
                        <?php if (isset($arrayt8[$c]['token'])){ ?>
                            <p class="allP8"> <?php echo $arrayt8[$c]['token'] ?></p>
                        <?php }else{ ?>
                            <p class="allP8">ID</p>
                        <?php } ?>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
        <div class="sec">
            <?php for ($c2=10; $i2 >= $c2+1; $c2++): ?>
                <div class="time time8">
                    <div class="table-info">
                        <h3><?php echo $c2+1 ?></h3>
                        <?php if (isset($arrayt8[$c2]['token'])){ ?>
                            <p class="allP8"> <?php echo $arrayt8[$c2]['token'] ?></p>
                        <?php }else{ ?>
                            <p class="allP8">ID</p>
                        <?php } ?>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>


    <p id="para" style="display: none"><?php echo count($result1) ?></p>
    <p id="para1" style="display: none"><?php echo $time1 ?></p>
    <p id="para2" style="display: none"><?php echo $time2 ?></p>
    <p id="para3" style="display: none"><?php echo $time3 ?></p>
    <p id="para4" style="display: none"><?php echo $time4 ?></p>
    <p id="para5" style="display: none"><?php echo $time5 ?></p>
    <p id="para6" style="display: none"><?php echo $time6 ?></p>
    <p id="para7" style="display: none"><?php echo $time7 ?></p>
    <p id="para8" style="display: none"><?php echo $time8 ?></p>


    <script src="./js/reservations-status.js"></script>
</body>
</html>