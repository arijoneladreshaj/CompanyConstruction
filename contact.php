<?php
require_once 'ContactRepository.php';

$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {

    $name    = trim($_POST['name']);
    $email   = trim($_POST['email']);
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message']);

    if ($name !== '' && $email !== '' && $message !== '') {
        $repo = new ContactRepository();
        $repo->insertMessage($name, $email, $subject, $message);
        $success = true; 
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us | PrimeConstruct</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>


<header class="site-header">
  <div class="container header-inner">

    <a href="index.html" class="logo1">
      <div class="logo">
        <img src="Logoo.png" alt="PrimeConstruct">
        <div class="logo-text">
          <span class="logo-title">PrimeConstruct</span>
          <span class="logo-subtitle">Construction Company</span>
        </div>
      </div>
    </a>

    <nav class="main-nav">
      <a href="index.php">Home</a>
      <a href="about.php">About</a>
      <a href="index.php#services">Services</a>
      <a href="contact.php" class="active">Contact</a>
      <a href="projects.php">Projects</a>
      
    </nav>

  </div>
</header>


<section class="contact-page">
  <div class="container">

    <h1 class="contact-title">Get in Touch</h1>
    <p class="contact-subtitle">
      Tell us about your project and we’ll get back to you as soon as possible.
    </p>
    
    <?php if ($success): ?>
  <div id="success-message" class="success-message-center">
    Mesazhi u dërgua me sukses!
  </div>
<?php endif; ?>

    <form class="contact-form" action="contact.php" method="POST">
      <div class="form-row">
        <input type="text" name = "name" placeholder="Your Name" required>
        <input type="email" name ="email" placeholder="Your Email" required>
      </div>

      <div class="form-row">
        <input type="text" name="subject" placeholder="Subject">
      </div>

      <div class="form-row">
        <textarea name="message" rows="6" placeholder="Your Message" required></textarea>
      </div>

      <button type="submit" class="btn-access-yellow">
        Send Message
      </button>
    </form>

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
  <script>
  setTimeout(() => {
    const msg = document.getElementById('success-message');
    if (msg) {
      msg.style.opacity = '0'; 
      setTimeout(() => msg.remove(), 1500); 
    }
  }, 3000); 
</script>

</body>
</html>