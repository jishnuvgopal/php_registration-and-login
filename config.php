<?php
//Database Connection
$conn = mysqli_connect("localhost","root","","reg_form");
if(!$conn){
    die("<script>alert('Connection Failed.')</script>");
}