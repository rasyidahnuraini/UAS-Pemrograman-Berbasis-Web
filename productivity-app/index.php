<?php
session_start();
include "config/db.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    $data = mysqli_fetch_assoc($query);

    if ($data && password_verify($password, $data['password'])) {
        $_SESSION['user_id'] = $data['id'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Productivity App</title>

<style>
body {
  min-height: 100vh;
  margin: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  background: linear-gradient(135deg, #7bb6d6, #eaf6ff);
  font-family: 'Segoe UI', sans-serif;
}

.login-box {
  background: white;
  padding: 35px;
  width: 350px;
  border-radius: 16px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.15);
  text-align: center;
}

.login-box h1 {
  margin-bottom: 8px;
  color: #4a7fa7;
}

.login-box p {
  font-size: 14px;
  color: #666;
  margin-bottom: 25px;
}

.login-box input {
  width: 92%;
  padding: 12px;
  margin-bottom: 15px;
  border-radius: 8px;
  border: 1px solid #ccc;
  outline: none;
}

.login-box input:focus {
  border-color: #7bb6d6;
}

.login-box button {
  width: 100%;
  padding: 12px;
  background: #7bb6d6;
  border: none;
  color: white;
  font-size: 15px;
  border-radius: 8px;
  cursor: pointer;
}

.login-box button:hover {
  background: #5fa3c7;
}

.error {
  color: red;
  font-size: 13px;
  margin-bottom: 10px;
}

.footer {
  margin-top: 20px;
  font-size: 12px;
  color: #999;
}
</style>
</head>

<body>

<div class="login-box">
  <h1>Productivity App ✨</h1>
  <p>Kelola aktivitas harianmu dengan lebih rapi</p>

  <?php if (isset($error)): ?>
    <div class="error"><?= $error ?></div>
  <?php endif; ?>

  <!-- ====== FORM LOGIN ====== -->
  <form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" name="login">Login</button>
  </form>

  <div class="footer">
    © 2025 Rasyidah Nuraini  

  </div>
</div>

</body>
</html>