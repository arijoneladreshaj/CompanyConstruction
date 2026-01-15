<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PrimeConstruct - Projektet</title>
  <link rel="stylesheet" href="project.css" />
</head>
<body>

<header class="site-header">
  <div class="container header-inner">

    <a href="#home" class="logo">
      <img src="Logoo.png" alt="Prime Construction">
      <div class="logo-text">
        <span class="logo-title">PrimeConstruct</span>
        <span class="logo-subtitle">Construction Company</span>
      </div>
    </a>

    <nav class="main-nav">
      <a href="index.php#home">Home</a>
      <a href="index.php#about">About</a>
      <a href="index.php#services">Services</a>
      <a href="team.php">Team</a>
      <a href="index.php#contact">Contact</a>
      <a href="index.php#projects.html">Projects</a>
    </nav>
        </div>
      </header>


  <section class="search-wrap">
    <div class="container">
      <div class="search-bar">

        <div class="search-chip">
          <div class="search-label">Tipi</div>
          <div class="search-value">Rezidencial / Komercial</div>
        </div>

        <div class="search-chip">
          <div class="search-label">Lokacioni</div>
          <div class="search-value">Prishtinë, Tiranë, Shkup</div>
        </div>

        <div class="search-chip">
          <div class="search-label">Statusi</div>
          <div class="search-value">Në ndërtim / I përfunduar</div>
        </div>

        <div class="search">
          <input class="search-input" type="text" placeholder="Kërko projekt..." />
          <button class="search-btn" type="button">Kërko</button>
        </div>

      </div>
    </div>
  </section>


  <section class="projects">
    <div class="container">

      <div class="projects-head">
        <div>
          <h2>Projektet</h2>
          <p>Projektet kryesore të realizuara nga PrimeConstruct.</p>
        </div>
        <a class="projects-all" href="#">Shiko të gjitha</a>
      </div>

      <div class="grid">

      
        <article class="card">
          <img src="complex.jpg" alt="Kompleksi Banesor Verona">
          <div class="card-body">
            <h3>Kompleksi Banesor Verona</h3>
            <p class="loc">Prishtinë, Kosovë</p>
            <p class="short">Kompleks modern banimi me fasadë termike dhe parkim nëntokësor.</p>

            <div class="meta-row">
              <span class="pill">8 kate</span>
              <span class="pill">72 apartamente</span>
              <span class="price">€4,200,000</span>
            </div>

            
            <div class="details">
              <span class="details-title">Detaje</span>
              <p>
                Kompleksi “Verona” përbëhet nga objekte shumëkatëshe me apartamente familjare,
                hapësira të gjelbra dhe infrastrukturë moderne. Përfshin izolim termik & akustik,
                sistem sigurie dhe garazhe nëntokësore.
              </p>

              <div class="actions">
                <a href="" class="btn1">Kërko ofertë</a>
                <a href="" class="btn2">Reviews</a>
              </div>
            </div>

          </div>
        </article>

    
       <article class="card">
  <div class="slider">
    <img id="slideshow" src="center.jpg" alt="Prime Tower">
  </div>

  <div class="card-body">
    <h3>Qendra e Biznesit Prime Tower</h3>
    <p class="loc">Tiranë, Shqipëri</p>
    <p class="short">
      Godinë premium për zyra me fasadë xhami dhe sistem smart-building.
    </p>

    <div class="meta-row">
      <span class="pill">12 kate</span>
      <span class="pill">Zyra A+</span>
      <span class="price">€9,800,000</span>
    </div>

    <div class="details">
      <span class="details-title">Detaje</span>
      <p>
        Projektuar për biznese moderne me hapësira fleksibile zyrash,
        sallë konferencash dhe menaxhim inteligjent energjie.
      </p>

      <div class="actions">
        <a href="#" class="btn1">Kërko ofertë</a>
        <a href="#" class="btn2">Reviews</a>
      </div>
    </div>
  </div>
</article>


        <article class="card">
          <img src="factory.jpg" alt="TechPlant">
          <div class="card-body">
            <h3>Fabrika Industriale TechPlant</h3>
            <p class="loc">Shkup, Maqedonia e Veriut</p>
            <p class="short">Objekt industrial për prodhim dhe logjistikë me strukturë çeliku.</p>

            <div class="meta-row">
              <span class="pill">12,000 m²</span>
              <span class="pill">Çelik</span>
              <span class="price">€6,500,000</span>
            </div>

            <div class="details">
              <span class="details-title">Detaje</span>
              <p>
                Objekt industrial i dimensioneve të mëdha me dysheme industriale të armuar dhe
                hapësira të personalizuara për linja prodhimi, depo dhe logjistikë.
              </p>

              <div class="actions">
                <a href="" class="btn1">Kërko ofertë</a>
                <a href="" class="btn2">Reviews</a>
              </div>
            </div>

          </div>
        </article>

      </div>
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

  <script src="Slider.js"></script>
</body>
</html>


