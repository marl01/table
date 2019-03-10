<?php

// oturum ac
session_start();


require("tablo/tablo.php");

// Mesajlar
$mesaj = "";

if($_POST){


	if($_POST['eposta'] && $_POST['sifre']  && $_POST['ad']  && $_POST['soyad']  ){


		$eposta = $_POST['eposta'];
		$sifre 	= $_POST['sifre'];

		$ad 	= $_POST['ad'];
		$soyad 	= $_POST['soyad'];

		$tablo = new tablo();

		$sonuc = $tablo->kayit($eposta, $sifre, $ad, $soyad);

		if($sonuc){
			$sonuc = $tablo->giris($eposta, $sifre);

			$_SESSION['id'] 	= $sonuc['id'];

			$_SESSION['eposta'] = $sonuc['eposta'];

			$_SESSION['ad'] 	= $sonuc['ad'];

			$_SESSION['soyad'] 	= $sonuc['soyad'];

			$_SESSION['tur'] 	= $sonuc['tur'];
			// Ana sayfaya yonlendir
			header("Location: index.php");

		} else {
			$mesaj = "Kayit olmadi!";
		}




	}


}?>

<?php include("tablo/ust.php"); ?>

      <section class="jumbotron">
        <div class="container">
        	<div class="row justify-content-md-center">
    			<div class="col-5">
		          <h1 class="jumbotron-heading">Kayıt ol</h1>
		          <?php if($mesaj){ ?> <div class="alert alert-danger" role="alert"><?php print $mesaj; ?></div><?php } ?>
		          <form action="" method="post">
					  <div class="form-group">
					    <label for="eposta">Eposta</label>
					    <input type="email" class="form-control" id="eposta" name="eposta" required>
					  </div>
					  <div class="form-group">
					    <label for="sifre">Şifre</label>
					    <input type="password" class="form-control" id="sifre" name="sifre" required>
					  </div>
					  <div class="form-group">
					    <label for="ad">Ad</label>
					    <input type="text" class="form-control" id="ad" name="ad" required>
					  </div>
					  <div class="form-group">
					    <label for="soyad">Soyad</label>
					    <input type="text" class="form-control" id="soyad" name="soyad" required>
					  </div>
					  <button type="submit" class="btn btn-primary">Kayit ol</button>
					</form>
				</div>
			</div>
        </div>
      </section>




<?php include("tablo/alt.php"); ?>



