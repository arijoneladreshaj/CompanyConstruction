<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once 'aboutRepository.php';
require_once 'statsRepository.php';

$aboutRepo = new AboutRepository();
$statsRepo = new StatsRepository();

$a = $aboutRepo->getAboutById(1);
$stats = $statsRepo->getAllStats();

?>

<!DOCTYPE html>
<head>
  <meta charset="UTF-8" />
  <title>About Us | PrimeConstruct</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>

<header class="site-header">
  <div class="container header-inner">

    <a href="index.php" class="logo1">
      <div class="logo">
        <img src="Logoo.png" alt="PrimeConstruct">
        <div class="logo-text">
          <span class="logo-title">PrimeConstruct</span>
          <span class="logo-subtitle">Construction Company</span>
        </div>
      </div>
    </a>

  <nav class="main-nav">
      <a href="index.php#home">Home</a>
      <a href="about.php">About</a>
      <a href="index.php#services">Services</a>
      <a href="index.php#contact">Contact</a>
      <a href="projects.php">Projects</a>
                  <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
            <a href="dashboard.php">Dashboard</a>
<?php endif; ?>
    </nav>

  </div>
</header>



  <!--<section class="about-block" id="about">
    <div class="container about-inner">

      <div class="about-image">
        <img src="team.jpg" alt="PrimeConstruct" />
      </div>

      <div class="about-text">
        <p class="since-label">Since 2014</p>

        <h2>Our goal then and now is to provide quality, on-time projects.</h2>

        <p>
          Me një ekip inxhinierësh dhe arkitektësh me përvojë, PrimeConstruct
          merret me projekte banimi, komerciale dhe industriale. Planifikimi i
          kujdesshëm dhe menaxhimi i kantierit sigurojnë që çdo objekt të
          dorëzohet në kohë dhe sipas standardeve.
        </p>

        <p>
          Ne besojmë në komunikim të hapur me investitorët, dokumentacion të
          qartë teknik dhe respektim të rreptë të parametrave të sigurisë.
        </p>
                  -->
        <section class="about-block" id="about">
  <div class="container about-inner">

    <div class="about-image">
      <img src="<?= $a['img'] ?>" alt="PrimeConstruct" />
    </div>

    <div class="about-text">
      <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
  <a href="editAbout.php" class="about-edit-link"> Edit</a>
<?php endif; ?>

      <p class="since-label">Since <?= $a['year'] ?></p>

      <h2><?= $a['title'] ?></h2>

      <p><?= nl2br($a['text1']) ?></p>

      <p><?= nl2br($a['text2']) ?></p>


        <div class="team">
          <p>
            Për tu informuar më shumë rreth ekipit tonë klikoni
            <a href="team.php">këtu</a>
          </p>
        </div>

      </div>
    </div>
  </section>
<!--
  <section class="stats">
    <div class="container stats-inner">
      <div class="stat-box">
        <h3>120+</h3>
        <p>Completed Projects</p>
      </div>
      <div class="stat-box">
        <h3>15+</h3>
        <p>Years of Experience</p>
      </div>
      <div class="stat-box">
        <h3>50+</h3>
        <p>Professional Engineers</p>
      </div>
      <div class="stat-box">
        <h3>100%</h3>
        <p>Client Satisfaction</p>
      </div>
    </div>
  </section>
                  -->
  <section class="stats">
  <div class="container stats-inner">
    <?php foreach ($stats as $r): ?>
      <div class="stat-box">
        <h3><?= $r['nr'] ?></h3>
        <p><?= $r['txt'] ?></p>
      </div>
    <?php endforeach; ?>
  </div>
</section>

  <section class="why-us">
    <div class="container">
      <h2>Why Choose PrimeConstruct?</h2>

      <div class="why-grid">
        <div class="why-box">
          <h4>Quality Materials</h4>
          <p>We use only certified and high-quality construction materials.</p>
        </div>

        <div class="why-box">
          <h4>On-Time Delivery</h4>
          <p>Every project is completed according to the agreed timeline.</p>
        </div>

        <div class="why-box">
          <h4>Safety First</h4>
          <p>Strict safety standards on every construction site.</p>
        </div>

        <div class="why-box">
          <h4>Professional Team</h4>
          <p>Experienced engineers, architects, and project managers.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="cta">
    <div class="container cta-inner">
      <h2>Ready to start your project?</h2>
      <p>Contact us today and let’s build something great together.</p>
      <a href="contact.php" class="cta-btn">Get in Touch</a>
    </div>
  </section>

 
   <section class="bottom-strip" id="contact">
    <div class="container bottom-inner">
     
  
      <div class="bottom-contact">
        <span>Tel: +383 XX XXX XXX</span>
        <span>Email: info@primeconstruct.com</span>
      </div>
    </div>
  </section>


 
  <footer class="site-footer">
    <div class="container footer-inner">
      <span>© PrimeConstruct - All rights reserved</span>
    
    </div>
  </footer>
</body>
</html>
 