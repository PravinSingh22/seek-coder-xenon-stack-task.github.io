<?php

//to view data from a database table

$con=mysqli_connect("localhost","root","","seekcoding");
//localhost-server name
//root-mysql default user name
//"" - empty password
//test-database name

if(!$con)
    die("cannot connect to server");
?>