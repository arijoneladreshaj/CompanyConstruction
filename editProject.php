<?php
session_start();
include_once 'ProjectRepository.php';

if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
header("Location: Dashboard.php");
exit;
}

$repo=new ProjectRepository();
$project=$repo->getProjectById((int)$_GET['id']);

if(!$project){
header("Location: Dashboard.php");
exit;
}

if(isset($_POST['editBtn'])){

$imageName=$project['image'];

if(isset($_FILES['image']) && !empty($_FILES['image']['name'])){
$imageFile=$_FILES['image']['name'];
$tmpName=$_FILES['image']['tmp_name'];

$uniqueName=time()."_".basename($imageFile);
move_uploaded_file($tmpName,$uniqueName);

$imageName=$uniqueName;
}

$repo->updateProject(
(int)$project['id'],
$_POST['title'],
$_POST['location'],
$_POST['description'],
$_POST['price'],
$_POST['size'],
$_POST['type'],
$imageName,
$_POST['link'],
$_POST['status']
);

header("Location: Dashboard.php");
exit;
}
?>


<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>Edit Project</title>
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
<a href="projects.php">Projects</a>
<a class="active" href="Dashboard.php">Dashboard</a>
</nav>
</div>
</header>

<section class="add-project-section">
<div class="container">
<div class="add-project-box">

<h2>Edit Project</h2>

<form method="post" enctype="multipart/form-data">

<div class="form-group">
<label>Title</label>
<input type="text" name="title" placeholder="Project title" required
       value="<?= htmlspecialchars($project['title']) ?>">
</div>

<div class="form-group">
<label>Location</label>
<input type="text" name="location" placeholder="Location"
       value="<?= htmlspecialchars($project['location']) ?>">
</div>

<div class="form-group">
<label>Description</label>
<textarea name="description" placeholder="Description"><?= htmlspecialchars($project['description']) ?></textarea>
</div>

<div class="form-group">
<label>Price (€)</label>
<input type="number" step="0.01" name="price" placeholder="Price"
       value="<?= htmlspecialchars($project['price']) ?>">
</div>

<div class="form-group">
<label>Size</label>
<input type="text" name="size" placeholder="Size ( 12000 m²)"
       value="<?= htmlspecialchars($project['size']) ?>">
</div>

<div class="form-group">
<label>Type</label>
<input type="text" name="type" placeholder="Type"
       value="<?= htmlspecialchars($project['type']) ?>">
</div>

<div class="form-group">
<label>Current Image</label><br>
<?php if(!empty($project['image'])): ?>
    <img src="<?= htmlspecialchars($project['image']) ?>" width="160" alt="">
<?php else: ?>
    <p>No image</p>
<?php endif; ?>
</div>

<div class="form-group">
<label>Change Project Image</label>
<input type="file" name="image" accept="image/*">
</div>

<div class="form-group">
<label>Link</label>
<input type="text" name="link" placeholder="Link (optional)"
       value="<?= htmlspecialchars($project['link']) ?>">
</div>

<div class="form-group">
<label>Status</label>
<input type="text" name="status" placeholder="Completed"
       value="<?= htmlspecialchars($project['status']) ?>">
</div>

<button type="submit" name="editBtn" class="add-btn-submit">Save Changes</button>
<a class="back-link" href="Dashboard.php">← Back to Dashboard</a>

</form>

</div>
</div>
</section>

</body>
</html>
