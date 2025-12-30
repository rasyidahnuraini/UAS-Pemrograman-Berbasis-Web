<?php
session_start();
include "config/db.php";

$task = $_POST['task'];
$user_id = $_SESSION['user_id'];

mysqli_query($conn, "INSERT INTO tasks (user_id, task) VALUES ('$user_id', '$task')");

header("Location: dashboard.php");
