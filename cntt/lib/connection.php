<?php
// $server_username = "id17709912_root";
// $server_password = '~pDEKFs11$G]WuXY';
// $server_host = "localhost";
// $database = 'id17709912_dbgame';
$server_username = "root";
$server_password = '';
$server_host = "localhost";
$database = 'dbgame';
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");
