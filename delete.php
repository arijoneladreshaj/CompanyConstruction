<?php
include_once 'ProjectRepository.php';

if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $repo = new ProjectRepository();
    $repo->deleteProject((int)$_GET['id']);
}

header("Location: Dashboard.php");
exit;
?>

