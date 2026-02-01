<?php
session_start();
require_once 'HomeRepository.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
  die('Access denied');
}

$repo = new HomeRepository();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $repo->saveHome(
    $_POST['hero_title'],
    $_POST['hero_text'],
    $_POST['services_intro'],
    $_POST['cta_text'],
    $_SESSION['user_id']
  );

  header("Location: editHome.php?success=1");
  exit;
}

$home = $repo->getHome();
?>
<!DOCTYPE html>
<html lang="sq">
<head>
  <meta charset="UTF-8">
  <title>Edit Home Page</title>
  <link rel="stylesheet" href="dashboard.css">
</head>
<body>

<section class="add-project-section">
  <div class="add-project-box">

    <h2>Edit Home Page</h2>

    <?php if (isset($_GET['success'])): ?>
      <p style="color:green; text-align:center; font-weight:800;">
        Home page u përditësua me sukses!
      </p>
    <?php endif; ?>

    <form method="post">

      <div class="form-group">
        <label>Hero Title</label>
        <textarea name="hero_title"><?= htmlspecialchars($home['hero_title']) ?></textarea>
      </div>

      <div class="form-group">
        <label>Hero Text</label>
        <textarea name="hero_text"><?= htmlspecialchars($home['hero_text']) ?></textarea>
      </div>

      <div class="form-group">
        <label>Services Intro</label>
        <textarea name="services_intro"><?= htmlspecialchars($home['services_intro']) ?></textarea>
      </div>

      <div class="form-group">
        <label>CTA Text</label>
        <textarea name="cta_text"><?= htmlspecialchars($home['cta_text']) ?></textarea>
      </div>

      <button class="add-btn-submit">Save Home Page</button>
    </form>

    <a href="dashboard.php" class="back-link">← Back to Dashboard</a>

  </div>
</section>

</body>
</html>
