<?php
session_start();
include "config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$id = $_POST['id'];
$user_id = $_SESSION['user_id'];

$get = mysqli_query($conn, "SELECT status FROM tasks WHERE id=$id AND user_id=$user_id");
$data = mysqli_fetch_assoc($get);

$new_status = ($data['status'] == 'pending') ? 'done' : 'pending';

mysqli_query($conn, "UPDATE tasks SET status='$new_status' WHERE id=$id AND user_id=$user_id");

header("Location: dashboard.php");
exit;
