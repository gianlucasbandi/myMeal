<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="icon" type="image/x-icon" href="./img/logo-tiny.ico">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>myMeal</title>
</head>

<body>
  <nav class="navbar fixed-top navbar-expand-lg navbar-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="./index.html">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 116.661 36" width="116.661" height="36">
          <g fill="#00936f" color="#00936f" transform="translate(0 9.879999999999999) scale(0.2800001)">
            <svg width="100.0" height="58.0" x="0.0" y="0.0" viewBox="0 0 100 58">
              <path d="M85.223,20c3.537-8.282,3.324-16.613,3.308-17.094L88.43,0.107l-2.798-0.101c0,0-0.185-0.006-0.528-0.006  c-2.732,0-16.817,0.452-25.734,9.369C56.214,12.523,54.122,16.303,52.73,20H0v3C0,23,0,23,0,23c0,13.607,18.71,23.851,25,26.91V58  h50v-8.09c6.29-3.059,25-13.303,25-26.91c0,0,0,0,0-0.001v-3H85.223z M63.611,13.611C69.3,7.923,77.876,6.475,82.42,6.115  C82.152,9.455,81.287,15.024,78.562,20c-0.962,1.757-2.151,3.442-3.636,4.926c-0.379,0.378-0.771,0.735-1.173,1.077  c-3.846,3.271-8.674,4.908-12.702,5.727l13.874-13.874l-4.242-4.243L56.84,27.455c0.097-0.477,0.197-0.957,0.318-1.452  c0.475-1.936,1.148-3.995,2.088-6.003C60.314,17.715,61.725,15.497,63.611,13.611z M70.787,45.257l-1.784,0.791L69,52H31  l-0.003-5.952l-1.784-0.791C23.417,42.688,9.322,34.707,6.498,26c5.461,0.001,25.101,0.002,44.494,0.002  c-1.102,5.218-0.996,9.296-0.985,9.628l0.1,2.8l2.8,0.1c0,0,0.184,0.007,0.525,0.007c2.732,0,16.819-0.452,25.736-9.37  c1-1,1.888-2.063,2.686-3.166c5.41,0,9.564,0,11.648-0.001C90.678,34.707,76.583,42.688,70.787,45.257z">
              </path>
            </svg>
          </g>
          <path fill="#1c2149" fill-rule="nonzero" d="M2.96 9.22L2.96 14.07Q2.96 16.71 3.06 17.46L3.06 17.46L0 17.46L0 5.21L2.96 5.21L2.96 6.27Q4.57 4.98 6.26 4.98L6.26 4.98Q8.25 4.98 9.15 6.70L9.15 6.70Q10.05 5.78 10.65 5.48L10.65 5.48Q11.65 4.98 12.65 4.98Q13.65 4.98 14.36 5.32Q15.06 5.66 15.52 6.28L15.52 6.28Q16.44 7.54 16.44 9.73L16.44 9.73L16.44 14.39Q16.44 16.37 16.50 16.77Q16.56 17.17 16.66 17.29Q16.76 17.40 16.83 17.50L16.83 17.50L16.80 17.54Q15.87 17.46 15.42 17.46L15.42 17.46L14.54 17.46Q14.11 17.46 13.48 17.50L13.48 17.50L13.48 11.16Q13.48 8.41 12.63 7.90L12.63 7.90Q12.35 7.73 11.97 7.73Q11.59 7.73 11.30 7.82Q11.00 7.91 10.75 8.11L10.75 8.11Q10.31 8.43 9.76 9.35L9.76 9.35Q9.77 9.45 9.77 9.54Q9.77 9.63 9.77 12.63Q9.77 15.63 9.91 17.46L9.91 17.46Q8.92 17.46 8.22 17.46Q7.52 17.46 6.89 17.50L6.89 17.50L6.89 11.14Q6.89 9.23 6.66 8.66Q6.43 8.09 6.18 7.91Q5.92 7.73 5.54 7.73L5.54 7.73Q4.00 7.73 2.96 9.22L2.96 9.22ZM21.74 22.59L18.71 21.54L19.49 20.92Q21.23 19.50 22.38 16.73L22.38 16.73L22.92 15.43L18.43 5.21L21.71 5.21L24.53 12.29L27.14 5.21L30.52 5.21Q29.91 6.06 29.03 8.36L29.03 8.36L27.27 12.70Q23.74 21 21.74 22.59L21.74 22.59ZM35.31 7.58L35.31 17.53Q34.75 17.46 33.14 17.46L33.14 17.46L32.20 17.46L32.20 1.83Q32.95 1.88 33.86 1.88Q34.76 1.88 35.13 1.78L35.13 1.78L39.07 8.47L42.86 1.78Q43.23 1.88 44.29 1.88Q45.34 1.88 46.09 1.83L46.09 1.83L46.09 17.46L45.15 17.46Q43.55 17.46 42.98 17.53L42.98 17.53L42.98 7.03L39.15 13.89L35.31 7.58ZM49.30 11.44L49.30 11.44Q49.30 10.07 49.77 8.89Q50.24 7.72 51.09 6.84L51.09 6.84Q52.92 4.98 55.88 4.98L55.88 4.98Q58.37 4.98 59.88 6.63L59.88 6.63Q61.37 8.23 61.37 10.64L61.37 10.64Q61.37 11.57 61.23 11.91L61.23 11.91Q60.06 12.23 56.46 12.23L56.46 12.23L52.34 12.23Q52.64 13.49 53.75 14.19Q54.87 14.88 56.65 14.88L56.65 14.88Q58.51 14.88 59.85 14.21L59.85 14.21Q60.20 14.04 60.38 13.89L60.38 13.89Q60.35 14.38 60.32 14.89L60.32 14.89L60.19 16.72Q59.30 17.33 57.30 17.57L57.30 17.57Q56.72 17.64 56.18 17.64L56.18 17.64Q53.20 17.64 51.26 15.90L51.26 15.90Q49.30 14.16 49.30 11.44ZM58.25 9.96L58.25 9.96Q57.77 7.44 55.51 7.44L55.51 7.44Q53.73 7.44 52.80 8.98L52.80 8.98Q52.52 9.45 52.37 10.01L52.37 10.01Q52.65 10.02 53.06 10.03L53.06 10.03L53.93 10.03Q54.36 10.04 54.76 10.04L54.76 10.04L55.43 10.04Q56.03 10.04 56.60 10.03L56.60 10.03L57.56 10.00Q57.95 9.98 58.25 9.96ZM72 16.73L72 16.73Q70.34 17.64 68.99 17.64Q67.64 17.64 66.68 17.38Q65.72 17.13 65.05 16.64L65.05 16.64Q63.69 15.64 63.69 13.76L63.69 13.76Q63.69 12.07 65.36 10.95L65.36 10.95Q67.16 9.73 70.25 9.73L70.25 9.73L70.72 9.74Q70.86 9.75 71.04 9.76Q71.21 9.76 71.36 9.79L71.36 9.79Q71.26 7.91 69.74 7.59L69.74 7.59Q69.23 7.49 68.67 7.49Q68.10 7.49 67.55 7.59Q67.01 7.69 66.49 7.85L66.49 7.85Q65.36 8.21 64.86 8.68L64.86 8.68L64.83 8.66L64.48 6.07Q66.55 4.98 69.01 4.98L69.01 4.98Q72.83 4.98 73.90 7.73L73.90 7.73Q74.24 8.61 74.24 9.71L74.24 9.71L74.24 13.96Q74.24 15.32 75.20 15.81L75.20 15.81L73.08 17.75Q72.41 17.40 72 16.73ZM71.37 14.34L71.37 11.89Q71.05 11.84 70.71 11.84L70.71 11.84L70.24 11.84Q67.65 11.84 66.95 12.98L66.95 12.98Q66.74 13.32 66.74 13.70Q66.74 14.07 66.87 14.36Q67.01 14.65 67.32 14.84L67.32 14.84Q67.93 15.19 69.13 15.19Q70.34 15.19 71.38 14.61L71.38 14.61Q71.37 14.48 71.37 14.34L71.37 14.34ZM80.61 0L80.61 16.15Q80.61 17.16 80.66 17.46L80.66 17.46L77.68 17.46L77.68 0L80.61 0Z" transform="translate(36, 9.27)">
          </path>
        </svg>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="./html/creapasto/creapasto.php">Crea Pasto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./html/ricette.html">Ricette</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./html/articoli.html">Articoli</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./html/esperienze.html">Esperienze</a>
          </li>        
        </ul>
        <div class="nav-item"><a style="color: #1c2149;" class="nav-link" 
            href=<?php
              if (isset($_SESSION['user_email'])) {
                echo "./php/welcome.php";
              } else {
                echo "'./login/login.html'";
              } ?>
            ><i class="fa fa-user-circle fa-2x"></i></a></div>
        
        <form method="GET" action="./html/risultati.html" name="search" class="d-flex">
          <input class="form-control me-2" placeholder="Cerca" id="search"
                name="param" type="search" aria-label="Search">
        </form>
      </div>
    </div>
  </nav>
  <div id="carouselHomePage" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselHomePage" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselHomePage" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselHomePage" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselHomePage" data-bs-slide-to="3" aria-label="Slide 4"></button>
      <button type="button" data-bs-target="#carouselHomePage" data-bs-slide-to="4" aria-label="Slide 5"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="2000">
        <div class="overlay-image" style="background-image: url(./img/meal2.jpg);"></div>
        <div class="container-my">
          <div class="carousel-caption d-md-block">
            <h3>Crea i tuoi pasti, per un'alimentazione sana!</h3>
            <br>
            <button class="mybutton" onclick="window.location.href='./html/creapasto.html'">
              Crea Pasti
            </button>
          </div>
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <div class="overlay-image" style="background-image: url(./img/ricetta1.jpg);"></div>
        <div class="container-my">
          <div class="carousel-caption d-md-block">
            <h3>Scopri tutte le ricette salutari che incontrano il tuo gusto!</h3>
            <br>
            <button class="mybutton" onclick="window.location.href='./html/ricette.html'">
              Ricette
            </button>
          </div>
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <div class="overlay-image" style="background-image: url(./img/coach3.jpg);"></div>
        <div class="container-my">
          <div class="carousel-caption d-md-block">
            <h3>Tieniti informato su tutte le novità e gli aggiornamenti!</h3>
            <br>
            <button class="mybutton" onclick="window.location.href='./html/articoli.html'">
              Articoli
            </button>
          </div>
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <div class="overlay-image" style="background-image: url(./img/esperienze4pic.jpg);"></div>
        <div class="container-my">
          <div class="carousel-caption d-md-block">
            <h3>Segui i consigli di esperti del settore!</h3>
            <br>
            <button class="mybutton" onclick="window.location.href='./html/articoli.html'">
              Consigli Esperti
            </button>
          </div>
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <div class="overlay-image" style="background-image: url(./img/esperienze1.jpg);"></div>
        <div class="container-my">
          <div class="carousel-caption d-md-block">
            <h3>Tante persone hanno raggiunto i loro obiettivi, scopri le loro storie!</h3>
            <br>
            <button class="mybutton" onclick="window.location.href='./html/esperienze.html'">
              Scopri di più
            </button>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselHomePage" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselHomePage" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <div class="flexbox flex-md-nowrap flex-wrap">
    <div class="mybox">
      <div style="padding:20%">
        <h3>Ricette</h3>
        <p>Lasciati ispirare da ricette gustose e veloci.</p>
      </div>
    </div>
    <div class="swiper mySwiper" style="margin: 1rem; padding: 2rem; background-color: #faebd7; border-radius: 20px;">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="card" style="width: 18rem;">
            <img src="./img/pancake.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">ricetta pancake</h5>
              <p class="card-text">descrizione</p>
              <a href="./html/ricette/colazione/pancake.html" class="btn btn-outline-dark">Leggi</a>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="card" style="width: 18rem;">
            <img src="./img/avocadotoast.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">ricetta avocado</h5>
              <p class="card-text">descrizione</p>
              <a href="./html/articoli/esercizi.html" class="btn btn-outline-warning">Leggi</a>
            </div>
          </div>
        </div>
        <div class="swiper-slide">articolo 3</div>
        <div class="swiper-slide">articolo 4</div>
        <div class="swiper-slide">articolo 5</div>
        <div class="swiper-slide">articolo 6</div>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </div>
  <div class="flexbox flex-md-nowrap flex-wrap">
    <div class="mybox">
      <div style="padding:20%">
        <h3>Ultimi articoli</h3>
        <p>E' importante rimanere sempre aggiornati con gli ultimi consigli disponibili.</p>
      </div>
    </div>
    <div class="swiper mySwiper" style="margin: 1rem; padding: 2rem; background-color: #faebd7; border-radius: 20px;">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="card" style="width: 18rem;">
            <img src="./img/caffe.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">articolo caffe</h5>
              <p class="card-text">qualcosa</p>
              <a href="./html/articoli/caffe.html" class="btn btn-outline-dark">Leggi</a>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="card" style="width: 18rem;">
            <img src="./img/esperienze2.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">articolo esercizi</h5>
              <p class="card-text">qualcosa</p>
              <a href="./html/articoli/esercizi.html" class="btn btn-outline-warning">Leggi</a>
            </div>
          </div>
        </div>
        <div class="swiper-slide">articolo 3</div>
        <div class="swiper-slide">articolo 4</div>
        <div class="swiper-slide">articolo 5</div>
        <div class="swiper-slide">articolo 6</div>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="text-center text-lg-start text-white mt-5">
    <!-- Grid container -->
    <div class="container p-3">
      <!--Grid row-->
      <div class="row my-3">
        <!--Grid column-->
        <div class="mb-4 mb-md-0">
          <div class="d-flex align-items-center justify-content-center mx-auto" style="width: 150px; height: 150px;">
            <img src="./img/logo_white_large.png" height="70" />
          </div>
        </div>
        <!--Grid column-->
        <div class="row d-flex align-items-center justify-content-center mx-auto">
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0 mt-5">
            <h5 class="text-center mb-4 ">Gianluca Sbandi</h5>
            <ul class="list-unstyled">
              <li>
                <i>
                  <a class="d-flex align-items-center justify-content-center mx-auto" href="mailto:sbandi.1792041@studenti.uniroma1.it">sbandi.1792041@studenti.uniroma1.it</a>
                </i>
              </li>
            </ul>
          </div>
          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0 mt-5">
            <h5 class="text-center mb-4 ">Alessia Pontiggia</h5>
            <ul class="list-unstyled">
              <li>
                <i>
                  <a class="d-flex align-items-center justify-content-center mx-auto"
                    href="mailto:pontiggia.1892079@studenti.uniroma1.it">
                      pontiggia.1892079@studenti.uniroma1.it
                  </a>
                </i>
              </li>
            </ul>
          </div>
          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0 mt-5">
            <h5 class="text-center mb-4 ">Lorenzo Proietti Cosimi</h5>
            <ul class="list-unstyled">
              <li>
                <i>
                  <a class="d-flex align-items-center justify-content-center mx-auto"
                    href="mailto:proietticosimi.99999@studenti.uniroma1.it">
                      proietticosimi.1887440@studenti.uniroma1.it
                  </a>
                </i>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
      Progetto LTW - A.A.2021/2022
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script src="./js/functions.js"></script>
</body>

</html>