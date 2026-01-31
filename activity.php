<?php
session_start();
include_once 'ProjectRepository.php';

$repo = new ProjectRepository();
$logs = $repo->getLogs();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Activity Dashboard</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="dashboard.css">
</head>
<body>

<header class="site-header">
<div class="container header-inner">
<a class="logo" href="index.php">
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
<h2>Activity Dashboard</h2>
<p>Who changed what and when</p>
</div>
<a class="add-btn" href="dashboard.php">← Back</a>
</div>

<div class="table-card">
<div class="table-wrap">

<table>
<tr>
<th>User</th>
<th>Action</th>
<th>Date</th>
</tr>

<?php if(empty($logs)): ?>
<tr>
<td colspan="3" class="empty">No activity yet.</td>
</tr>
<?php else: ?>
<?php foreach($logs as $l): ?>
<tr>
<td><?= htmlspecialchars($l['username'] ?? '-') ?></td>
<td><?= htmlspecialchars($l['module']) ?> #<?= (int)$l['item_id'] ?> — <?= htmlspecialchars($l['action']) ?></td>
<td><?= htmlspecialchars($l['created_at']) ?></td>
</tr>
<?php endforeach; ?>
<?php endif; ?>

</table>

</div>
</div>

</div>
</section>

</body>
</html>
