<?php

// oturum ac
session_start();


require("tablo/tablo.php");

// Mesajlar
$mesaj = "";

if($_POST){


	if($_POST['eposta'] && $_POST['sifre']){

		$eposta = $_POST['eposta'];
		$sifre 	= $_POST['sifre'];

		$tablo = new tablo();

		$sonuc = $tablo->giris($eposta, $sifre);

		if($sonuc){
			$_SESSION['id'] 	= $sonuc['id'];

			$_SESSION['eposta'] = $sonuc['eposta'];

			$_SESSION['tur'] 	= $sonuc['tur'];

			// Ana sayfaya yonlendir
			header("Location: index.php");
		} else {
			$mesaj = "Hatali giris";
		}
	}
}
?>


<?php include("tablo/ust.php"); ?>

      <section class="jumbotron">
        <div class="container">
        	<div class="row justify-content-md-center">
    			<div class="col-5">
		          <h1 class="jumbotron-heading">Giriş yap</h1>
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
					  <button type="submit" class="btn btn-primary">Giriş yap</button>
					</form>
				</div>
			</div>
        </div>
      </section>
<?php include("tablo/alt.php"); ?>



