<?php
include_once 'ContactRepository.php';

$contactRepo = new ContactRepository();


if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $contactRepo->deleteMessage($id);
    header("Location: messages.php");
    exit;
}

$messages = $contactRepo->getAllMessages();
?>
<!DOCTYPE html>
<html lang="sq">
<head>
<meta charset="UTF-8">
<title>Messages | Dashboard</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="dashboard.css">
</head>
<body>

<header class="site-header">
  <div class="container header-inner">
    <a class="logo" href="../index.php">
      <img src="Logoo.png" alt="">
      <span class="logo-text">
        <span class="logo-title">PRIMECONSTRUCT</span>
        <span class="logo-subtitle">Construction Company</span>
      </span>
    </a>

    <nav class="main-nav">
<a href="index.php">Home</a>
<a href="about.php">About</a>
<a href="services.php">Services</a>
<a href="contact.php">Contact</a>
<a href="projects.php">Projects</a>
<a class="active" href="dashboard.php">Dashboard</a>
    </nav>
  </div>
</header>

<section class="dashboard-section">
<div class="container">

  <div class="dashboard-header">
    <div>
      <h2>Contact Messages</h2>
      <p>Mesazhet e dërguara nga përdoruesit</p>
    </div>
    
  <a href="dashboard.php" class="add-btn">← Back</a>
  </div>

  <div class="table-card">
  <div class="table-wrap">

    <table>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Message</th>
        <th>Date</th>
        <th>Delete</th>
      </tr>

      <?php if (empty($messages)): ?>
      <tr>
        <td colspan="7" style="text-align:center;">Nuk ka mesazhe</td>
      </tr>
      <?php endif; ?>

      <?php foreach ($messages as $m): ?>
      <tr>
        <td><?= $m['id'] ?></td>
        <td><?= htmlspecialchars($m['name']) ?></td>
        <td><?= htmlspecialchars($m['email']) ?></td>
        <td><?= htmlspecialchars($m['subject']) ?></td>
        <td><?= htmlspecialchars($m['message']) ?></td>
        <td><?= $m['created_at'] ?></td>
        <td class="action">
          <a class="delete"
             href="messages.php?delete=<?= $m['id'] ?>"
             onclick="return confirm('A je i sigurt?')">
             Delete
          </a>
        </td>
      </tr>
      <?php endforeach; ?>

    </table>

  </div>
  </div>

</div>
</section>


</body>
</html>
