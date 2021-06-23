<?php

 $mysqli = mysqli_connect("localhost", "root", "root", "hw_database");
 if (mysqli_connect_errno()) {
     echo "Не удалось подключиться к MySQL: " . mysqli_connect_error();
 }


//$mysqli = new mysqli("localhost", "root", "root", "hw_database");
//if ($mysqli->connect_errno) {
//    echo "Не удалось подключиться к MySQL: " . $mysqli->connect_error;
//}

 