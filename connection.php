<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "westviewhotel";

$conn = new mysqli($servername, $username, $password, $dbname);
if (mysqli_connect_error())
{
	die("Could not connect to database");
}