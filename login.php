<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $valid_username = "PBL";
    $valid_password = "2025";

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: formbuku.html");
        exit;
    } else {
        header("Location: login.html?error=" . urlencode("Username atau password salah."));
        exit;
    }
}
?>
