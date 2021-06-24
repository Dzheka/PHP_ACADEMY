<?php
include '../config.php';

 if ($_SERVER["REQUEST_METHOD"]=="POST"){
htmlspecialchars($countryNmame = $_POST['countryName']);
if (empty($countryNmame)){
    echo "write anythink";
}
else {
    mysqli_query($link, 'insert into `countries`(name) value ("' . $countryNmame . '")');
    redirect('http://localhost/countries/');
}
 }
