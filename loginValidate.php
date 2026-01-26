<?php
session_start();

if (isset($_POST['loginBtn'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        echo "Please fill all fields!";
        exit();
    }

   
    $testUsername = "admin@gmail.com";
    $testPassword = "Admin_123"; 

    if ($username === $testUsername && $password === $testPassword) {

        $_SESSION['username'] = $username; 
        header("Location: index.php");
        exit();

    } else {
        echo "Username or Password is incorrect!";
        exit();
    }
}
?>
