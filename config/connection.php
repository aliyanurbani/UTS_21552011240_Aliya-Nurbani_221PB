<?php
$servername = "localhost";
$db = "db_datas";
$username = "root";
$password = "";

$db = mysqli_connect($servername, $username, $password, $db);

if(!$db){
    die("koneksi gagal". mysqli_connect_error());
} else {
    echo" ";}