<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login – PrimeConstruct</title>
  <link rel="stylesheet" href="login.css">
  <script src="login.js"></script>
</head>

<body class="login-body">

  <div class="login-center">

    <div class="login-header">
      <h1 class="brand-title">PrimeConstruct</h1>
     
      <p class="brand-quote">“Nga koncepti deri te krijimi – ne ndërtojmë të ardhmen.”</p>
    </div>

    <div class="login-box">
      <h2>Mirë se erdhe!</h2>
    

      <form class="login-form" method="POST" action="./loginValidate.php">

        <div class="form-group">
          <label>Email ose Username</label>
          <input type="email" name="username" placeholder="Shkruaj emailin..." />
        </div>

        <div class="form-group">
          <label>Fjalëkalimi</label>
          <input type="password" name="password" placeholder="Shkruaj fjalëkalimin..." />
        </div>

        <button type="submit" name="loginBtn" class="login-btn">Kyçu</button>

        <p class="forgot"><a href="#">Ke harruar fjalëkalimin?</a></p>
        <p class="register-text">Nuk ke llogari? <a href="registerform.php">Krijo një të re</a></p>

      </form>
    </div>

  </div>

</body>
</html>
