<?php
session_start();
include_once 'aboutRepository.php';
include_once 'statsRepository.php';

$aboutRepo = new aboutRepository();
$statsRepo = new statsRepository();

$about = $aboutRepo->getAboutById(1);
$stats = $statsRepo->getAllStats();

$success = "";

if (isset($_POST['saveAbout'])) {
    $aboutRepo->updateAbout(
        1,
        $_POST['year'],
        $_POST['title'],
        $_POST['text1'],
        $_POST['text2'],
        $about['img']
    );
    $success = "About u ruajt me sukses!";
}

if (isset($_POST['saveStat'])) {
    $statsRepo->updateStat($_POST['stat_id'], $_POST['nr'], $_POST['txt']);
    $success = "Stat u ruajt me sukses!";
}
?>
<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <title>Edit About | PrimeConstruct</title>
  <link rel="stylesheet" href="about.css">
</head>
<body>
  <div class="back-wrapper">
  <a href="about.php" class="back-button">Back</a>
</div>


<div class="contact-page">
  <div class="container">
 
    <h2 class="contact-title">Edit About</h2>

    <?php if ($success): ?>
      <div class="success-message-center"><?=$success?></div>
    <?php endif; ?>

    <form class="contact-form" method="POST">
      <div class="form-row">
        <input type="text" name="year" value="<?=$about['year']?>" placeholder="Year">
        <input type="text" name="title" value="<?=$about['title']?>" placeholder="Title">
      </div>

      <div class="form-row">
        <textarea name="text1" rows="5" placeholder="Text 1"><?=$about['text1']?></textarea>
      </div>

      <div class="form-row">
        <textarea name="text2" rows="5" placeholder="Text 2"><?=$about['text2']?></textarea>
      </div>

      <button type="submit" name="saveAbout" class="btn-access-yellow">
        Save About
      </button>
    </form>

    <hr>

    <h2 class="contact-title">Edit Stats</h2>

    <?php foreach($stats as $s): ?>
      <form class="contact-form" method="POST" style="margin-bottom:15px;">
        <input type="hidden" name="stat_id" value="<?=$s['id']?>">

        <div class="form-row">
          <input type="text" name="nr" value="<?=$s['nr']?>" placeholder="Number">
          <input type="text" name="txt" value="<?=$s['txt']?>" placeholder="Text">
        </div>

        <button type="submit" name="saveStat" class="btn-access-yellow">
          Save Stat
        </button>
      </form>
    <?php endforeach; ?>

  </div>
</div>

</body>
</html>

