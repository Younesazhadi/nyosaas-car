<?php
$con=new mysqli('localhost','root','','location des voitures');

if(!$con){
    die(mysqli_error($con));
}
?>