<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/logout.css">
    <link rel="stylesheet" href="../css/swiper-bundle.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="icon" type="image/png" href="../img/logo.png">
    <script src="../js/validation.js" defer></script>
    <script src="../js/carousel.js" defer></script> <!-- Novo JavaScript para o carrossel -->
    <title>Home - LUMI</title>
</head>
<body>
<div class="wrapper">
    <header>
        <h1>Light Up My Imagination</h1>
        <img src="../img/logo.png" alt="Logo Lumi" class="logo-imagem">
    </header>

    <nav>
        <ul>
            <li class="home"><a href="home.php">Home</a></li>
            <li class="filmes"><a href="filmes.php">Filmes</a></li>
            <li class="series"><a href="series.php">Séries</a></li>
            <li class="avaliacao"><a href="avaliacoes.php">Avaliações</a></li>
            <li class="logout"><a href="logout.php" class="btn-logout">Sair</a></li>
            <?php if (isset($_SESSION['user_id'])): ?> 
                <li class="logout"><a href="logout.php" class="btn-logout">Sair</a></li>
            <?php endif; ?>        
        </ul>
    </nav>

    <br>
    <h2 class="pub">Aclamados pelo público:</h2>
    <div class="container swiper" id="carousel1">
      <div class="slide-container">
        <div class="card-wrapper swiper-wrapper">
          <div class="card swiper-slide">
            <div class="image-box">
            <?php
              echo "<a href='avaliarFilmes.php?id=2'><img src='../img/poster_02.jpg' alt=''></a>";
            ?>
            </div>
            <div class="profile-details">
              <div class="name-job">
                <h3 class="name">
                  <?php
                    echo "<a href='avaliarFilmes.php?id=2'>Interstelar</a>";
                  ?>
                </h3>
              </div>
            </div>
          </div>
          <div class="card swiper-slide">
            <div class="image-box">
              <?php
                echo "<a href='avaliarSeries.php?id=3'><img src='../img/poster_23.jpg' alt=''></a>";
              ?>
            </div>
            <div class="profile-details">
              <div class="name-job">
                <h3 class="name">
                  <?php
                    echo "<a href='avaliarSeries.php?id=3'>Breaking Bad</a>";
                  ?>
                </h3>
              </div>
            </div>
          </div>

          <div class="card swiper-slide">
            <div class="image-box">
              <?php
                echo "<a href='avaliarSeries.php?id=14'><img src='../img/poster_34.jpg' alt=''></a>";
              ?>
            </div>
            <div class="profile-details">
              <div class="name-job">
                <h3 class="name">
                  <?php
                    echo "<a href='avaliarSeries.php?id=14'>Peaky Blinders</a>";
                  ?>
                </h3>
              </div>
            </div>
          </div>

          <div class="card swiper-slide">
            <div class="image-box">
              <?php
                echo "<a href='avaliarFilmes.php?id=6'><img src='../img/poster_06.jpg' alt=''></a>";
              ?>
            </div>
            <div class="profile-details">
              <div class="name-job">
                <h3 class="name">
                  <?php
                    echo "<a href='avaliarFilmes.php?id=6'>Ultimato</a>";
                  ?>
                </h3>
              </div>
            </div>
          </div>

          <div class="card swiper-slide">
            <div class="image-box">
              <?php
                echo "<a href='avaliarSeries.php?id=8'><img src='../img/poster_28.jpg' alt=''></a>";
              ?>
            </div>
            <div class="profile-details">
              <div class="name-job">
                <h3 class="name">
                  <?php
                    echo "<a href='avaliarSeries.php?id=8'>La Casa de Papel</a>";
                  ?>
                </h3>
                </div>
          </div>
        </div>


        </div>
        </div>
      <div class="swiper-button-next swiper-navBtn1"></div>
      <div class="swiper-button-prev swiper-navBtn1"></div>
      <div class="swiper-pagination pagination1"></div>
    </div>

    <h2 class="pub">Top 10 Filmes da Semana:</h2>
    <div class="container swiper" id="carousel2">
      <div class="slide-container">
        <div class="card-wrapper swiper-wrapper">
        <div class="card swiper-slide">
          <div class="image-box">
            <?php
              echo "<a href='avaliarFilmes.php?id=18'><img src='../img/poster_18.jpg' alt=''></a>";
            ?>
          </div>
          <div class="profile-details">
            <div class="name-job">
              <h3 class="name">
                <?php
                  echo "<a href='avaliarFilmes.php?id=18'>Django Livre</a>";
                ?>
              </h3>
            </div>
          </div>
        </div>

        <div class="card swiper-slide">
          <div class="image-box">
            <?php
              echo "<a href='avaliarFilmes.php?id=7'><img src='../img/poster_07.jpg' alt=''></a>";
            ?>
          </div>
          <div class="profile-details">
            <div class="name-job">
              <h3 class="name">
                <?php
                  echo "<a href='avaliarFilmes.php?id=7'>Lobo de Wall Street</a>";
                ?>
              </h3>
            </div>
          </div>
        </div>

        <div class="card swiper-slide">
          <div class="image-box">
            <?php
              echo "<a href='avaliarFilmes.php?id=11'><img src='../img/poster_11.jpg' alt=''></a>";
            ?>
          </div>
          <div class="profile-details">
            <div class="name-job">
              <h3 class="name">
                <?php
                  echo "<a href='avaliarFilmes.php?id=11'>Matrix</a>";
                ?>
              </h3>
            </div>
          </div>
        </div>

        <div class="card swiper-slide">
          <div class="image-box">
            <?php
              echo "<a href='avaliarFilmes.php?id=4'><img src='../img/poster_04.jpg' alt=''></a>";
            ?>
          </div>
          <div class="profile-details">
            <div class="name-job">
              <h3 class="name">
                <?php
                  echo "<a href='avaliarFilmes.php?id=4'>Fight Club</a>";
                ?>
              </h3>
            </div>
          </div>
        </div>

        <div class="card swiper-slide">
          <div class="image-box">
            <?php
              echo "<a href='avaliarFilmes.php?id=20'><img src='../img/poster_20.jpg' alt=''></a>";
            ?>
          </div>
          <div class="profile-details">
            <div class="name-job">
              <h3 class="name">
                <?php
                  echo "<a href='avaliarFilmes.php?id=20'>A Teoria de Tudo</a>";
                ?>
              </h3>
            </div>
          </div>
        </div>


        </div>
        </div>
      <div class="swiper-button-next swiper-navBtn2"></div>
      <div class="swiper-button-prev swiper-navBtn2"></div>
    <div class="swiper-pagination pagination2"></div>
  </div>

      <h2 class="pub">Top 10 Séries da Semana:</h2>
      <div class="container swiper" id="carousel3">
      <div class="slide-container">
        <div class="card-wrapper swiper-wrapper">
          <div class="card swiper-slide">
            <div class="image-box">
              <?php
                echo "<a href='avaliarSeries.php?id=5'><img src='../img/poster_25.jpg' alt=''></a>";
              ?>
            </div>
            <div class="profile-details">
              <div class="name-job">
                <h3 class="name">
                  <?php
                    echo "<a href='avaliarSeries.php?id=5'>The Boys</a>";
                  ?>
                </h3>
              </div>
            </div>
          </div>

          <div class="card swiper-slide">
            <div class="image-box">
              <?php
                echo "<a href='avaliarSeries.php?id=19'><img src='../img/poster_39.jpg' alt=''></a>";
              ?>
            </div>
            <div class="profile-details">
              <div class="name-job">
                <h3 class="name">
                  <?php
                    echo "<a href='avaliarSeries.php?id=19'>The Umbrella Academy</a>";
                  ?>
                </h3>
              </div>
            </div>
          </div>

          <div class="card swiper-slide">
            <div class="image-box">
              <?php
                echo "<a href='avaliarSeries.php?id=11'><img src='../img/poster_31.jpg' alt=''></a>";
              ?>
            </div>
            <div class="profile-details">
              <div class="name-job">
                <h3 class="name">
                  <?php
                    echo "<a href='avaliarSeries.php?id=11'>The Witcher</a>";
                  ?>
                </h3>
              </div>
            </div>
          </div>

          <div class="card swiper-slide">
            <div class="image-box">
              <?php
                echo "<a href='avaliarSeries.php?id=6'><img src='../img/poster_26.jpg' alt=''></a>";
              ?>
            </div>
            <div class="profile-details">
              <div class="name-job">
                <h3 class="name">
                  <?php
                    echo "<a href='avaliarSeries.php?id=6'>Round 6</a>";
                  ?>
                </h3>
              </div>
            </div>
          </div>

          <div class="card swiper-slide">
            <div class="image-box">
              <?php
                echo "<a href='avaliarSeries.php?id=15'><img src='../img/poster_35.jpg' alt=''></a>";
              ?>
            </div>
            <div class="profile-details">
              <div class="name-job">
                <h3 class="name">
                  <?php
                    echo "<a href='avaliarSeries.php?id=15'>Ozark</a>";
                  ?>
                </h3>
                </div>
          </div>
        </div>


        </div>
        </div>
      <div class="swiper-button-next swiper-navBtn3"></div>
      <div class="swiper-button-prev swiper-navBtn3"></div>
     <div class="swiper-pagination pagination3"></div>
    </div>

    <h2 class="pub">Usuários como você também curtiram:</h2>
    <div class="container swiper" id="carousel4">
      <div class="slide-container">
        <div class="card-wrapper swiper-wrapper">
          <div class="card swiper-slide">
          <div class="image-box">
            <?php
              echo "<a href='avaliarSeries.php?id=1'><img src='../img/poster_21.jpg' alt=''></a>";
            ?>
          </div>
          <div class="profile-details">
            <div class="name-job">
              <h3 class="name">
                <?php
                  echo "<a href='avaliarSeries.php?id=1'>Stranger Things</a>";
                ?>
              </h3>
            </div>
          </div>
        </div>

        <div class="card swiper-slide">
          <div class="image-box">
            <?php
              echo "<a href='avaliarFilmes.php?id=8'><img src='../img/poster_08.jpg' alt=''></a>";
            ?>
          </div>
          <div class="profile-details">
            <div class="name-job">
              <h3 class="name">
                <?php
                  echo "<a href='avaliarFilmes.php?id=8'>Parasita</a>";
                ?>
              </h3>
            </div>
          </div>
        </div>

        <div class="card swiper-slide">
          <div class="image-box">
            <?php
              echo "<a href='avaliarSeries.php?id=4'><img src='../img/poster_24.jpg' alt=''></a>";
            ?>
          </div>
          <div class="profile-details">
            <div class="name-job">
              <h3 class="name">
                <?php
                  echo "<a href='avaliarSeries.php?id=4'>The Mandalorian</a>";
                ?>
              </h3>
            </div>
          </div>
        </div>

        <div class="card swiper-slide">
          <div class="image-box">
            <?php
              echo "<a href='avaliarSeries.php?id=9'><img src='../img/poster_29.jpg' alt=''></a>";
            ?>
          </div>
          <div class="profile-details">
            <div class="name-job">
              <h3 class="name">
                <?php
                  echo "<a href='avaliarSeries.php?id=9'>Dark</a>";
                ?>
              </h3>
            </div>
          </div>
        </div>

        <div class="card swiper-slide">
          <div class="image-box">
            <?php
              echo "<a href='avaliarSeries.php?id=7'><img src='../img/poster_27.jpg' alt=''></a>";
            ?>
          </div>
          <div class="profile-details">
            <div class="name-job">
              <h3 class="name">
                <?php
                  echo "<a href='avaliarSeries.php?id=7'>The Crown</a>";
                ?>
              </h3>
              </div>
          </div>
        </div>


        </div>
        </div>
      <div class="swiper-button-next swiper-navBtn4"></div>
      <div class="swiper-button-prev swiper-navBtn4"></div>
      <div class="swiper-pagination pagination4"></div>
    </div>
    <script src="../js/swiper-bundle.min.js"></script>
    <script src="../js/script.js"></script>
    <br>
    <br>
    <footer>
        <p>Lumi © 2024 - Todos os direitos reservados.</p>
    </footer>
</div>
</body>
</html>
