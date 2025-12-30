<?php
include "config/db.php";

$username = "admin";
$password = password_hash("12345", PASSWORD_DEFAULT);

mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username', '$password')");
echo "User dibuat";
