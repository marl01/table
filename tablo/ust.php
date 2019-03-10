<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Benim Tablo</title>
    <link rel="icon" href="/favicon.png">
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="http://benimtablo.tk/index.php">Benim Tablo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            
            <?php if(empty($_SESSION['id'])){ ?>
            <li class="nav-item">
              <a href="http://benimtablo.tk/kayit.php" class="nav-link">Kayıt ol</a>
            </li>
            <li class="nav-item">
              <a href="http://benimtablo.tk/giris.php" class="nav-link">Giriş yap</a>
            </li>
            <?php } else { ?>

            <li class="nav-item">
              <a href="http://benimtablo.tk/hesabim.php" class="nav-link">Hesabım</a>
            </li>
            <li class="nav-item">
              <a href="http://benimtablo.tk/siparis.php" class="nav-link">Sipariş takibi</a>
            </li>
            <li class="nav-item">
              <a href="http://benimtablo.tk/sepet.php" class="nav-link">Sepet</a>
            </li>
            <?php if($_SESSION['tur'] == 1) { ?>

            <li class="nav-item">
              <a href="http://benimtablo.tk/yonetici/urunler.php" class="nav-link">Yönetici</a>
            </li>

            <?php } ?>

            <li class="nav-item">
              <a href="http://benimtablo.tk/cikis.php" class="nav-link">Çıkıs yap</a>
            </li>
            <?php } ?>
            <form action="http://benimtablo.tk/index.php" method="GET" class="form-inline my-2 my-lg-0">
              <input type="hidden" name="arama" value="1"/>
              <input class="form-control mr-sm-2" type="text" name="kelime" placeholder="Aranacak kelime" required>              
              <button class="btn btn-secondary my-2 my-sm-0" type="submit">Ara</button>
            </form>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->

