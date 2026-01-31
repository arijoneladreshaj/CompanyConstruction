<?php
include_once 'ProjectRepository.php';
$repo = new ProjectRepository();

if(isset($_GET['delete'])){
$id = (int)$_GET['delete'];
$repo->deleteProject($id);
header("Location: dashboard.php");
exit;
}

$projects = $repo->getAllProjects();
?>
<!DOCTYPE html>
<html lang="sq">
<head>
<meta charset="UTF-8">
<title>Projects Dashboard</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="dashboard.css">
</head>
<body>

<header class="site-header">
<div class="container header-inner">
<a class="logo" href="../index.php">
<img src="../assets/logo.png" alt="">
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
<h2>Projects Dashboard</h2>
<p>Menaxho projektet (Add / Edit / Delete)</p>
</div>
<a class="add-btn" href="addProject.php">+ Add Project</a>
</div>

<div class="table-card">
<div class="table-wrap">

<table>
<tr>
<th>ID</th>
<th>Image</th>
<th>Title</th>
<th>Location</th>
<th>Type</th>
<th>Size</th>
<th>Price</th>
<th>Status</th>
<th>Edit</th>
<th>Delete</th>
</tr>

<?php foreach($projects as $p): ?>
<tr>
<td><?= $p['id'] ?></td>
<td><?php if(!empty($p['image'])): ?><img class="thumb" src="<?= htmlspecialchars($p['image']) ?>"><?php endif; ?></td>
<td><?= htmlspecialchars($p['title']) ?></td>
<td><?= htmlspecialchars($p['location']) ?></td>
<td><?= htmlspecialchars($p['type']) ?></td>
<td><?= htmlspecialchars($p['size']) ?></td>
<td><?php if($p['price']!=='') echo "€".number_format((float)$p['price'],0,',','.'); ?></td>
<td><?= htmlspecialchars($p['status']) ?></td>
<td class="action"><a class="edit" href="editProject.php?id=<?= $p['id'] ?>">Edit</a></td>
<td class="action"><a class="delete" href="delete.php?id=<?= $p['id'] ?>" onclick="return confirm('A je i sigurt?')">Delete</a></td>
</tr>
<?php endforeach; ?>

</table>

</div>
</section>

</body>
</html>