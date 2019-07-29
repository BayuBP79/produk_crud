<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "onlen";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// mysqli_connect('localhost', 'id10261705_bay', 'zasusazi11', 'id10261705_onlen')

function generateCode($length){
    $chars = '0123456789';
    $ret   = '';
    for ($i=0; $i < $length ; ++$i) { 
        $random = str_shuffle($chars);
        $ret    .= $random[0];
    }
    return $ret;
}


?>