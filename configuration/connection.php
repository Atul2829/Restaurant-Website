<?php

$conn = mysqli_connect('localhost','restaurant','restaurant12','restaurant');

if (!$conn){
    echo 'There is a problem in'. mysqli_connect_error();
}