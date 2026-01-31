<?php
include_once 'ProjectRepository.php';

if(isset($_POST['addBtn'])){
$imageName = $_FILES['image']['name'];
$tmpName   = $_FILES['image']['tmp_name'];

$uniqueName = time() . "_" . $imageName;
move_uploaded_file($tmpName, $uniqueName);

$repo=new ProjectRepository();
$repo->insertProject($_POST['title'],$_POST['location'],$_POST['description'],$_POST['price'],$_POST['size'],$_POST['type'],$uniqueName,$_POST['link'],$_POST['status']);
header("location:Dashboard.php");
exit;
}
?>

<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>Add Project</title>
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
<a href="projects.php">Projects</a>
<a class="active" href="Dashboard.php">Dashboard</a>
</nav>
</div>
</header>

<section class="add-project-section">
<div class="container">
<div class="add-project-box">

<h2>Add Project</h2>

 <form method="post" enctype="multipart/form-data">


<div class="form-group">
<label>Title</label>
<input type="text" name="title" placeholder="Project title" required>
</div>

<div class="form-group">
<label>Location</label>
<input type="text" name="location" placeholder="Location">
</div>

<div class="form-group">
<label>Description</label>
<textarea name="description" placeholder="Description"></textarea>
</div>

<div class="form-group">
<label>Price (€)</label>
<input type="number" step="0.01" name="price" placeholder="Price">
</div>

<div class="form-group">
<label>Size</label>
<input type="text" name="size" placeholder="Size ( 12000 m²)">
</div>

<div class="form-group">
<label>Type</label>
<input type="text" name="type" placeholder="Type ">
</div>

<div class="form-group">
<label>Project Image</label>
<input type="file" name="image" accept="image/*" required>
</div>


<div class="form-group">
<label>Link</label>
<input type="text" name="link" placeholder="Link (optional)">
</div>

<div class="form-group">
<label>Status</label>
<input type="text" name="status" placeholder="Completed">
</div>

<button type="submit" name="addBtn" class="add-btn-submit">Add Project</button>
<a class="back-link" href="Dashboard.php">← Back to Dashboard</a>

</form>

</div>
</div>
</section>

</body>
</html>

