<?php
    $hname = 'localhost';
    $uname = 'root';
    $pass = '';
    $db = 'myhotelbooking';

    $con = mysqli_connect($hname, $uname, $pass,$db);

    if(!$con){
        die("Can't Connect to Database".mysqli_connect_error());
    }

?>