<?php
$username = $_post['username'];
$password = $_post['password'];
$con = new mysqli("localhost", "root", "", "project");
if ($con->connect_error) {
    die("Failed to connect" . $con->connect_error);
} else {
    echo "ncolwijc";
}
?>