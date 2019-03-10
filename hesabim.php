<?php

// oturum ac
session_start();

// yonetici kontrolu
if(!$_SESSION['id']){
	header("Location: giris.php");
	die();
}

require("tablo/tablo.php");


$sayfa = "hesabim";

// Mesajlar
$mesaj = "";

if (!empty($_SESSION['mesaj'])) {
 	$mesaj = $_SESSION['mesaj'];
 	unset($_SESSION['mesaj']);
}

$tablo = new tablo();

$id 	= $_SESSION['id'];

if($_POST){


	if($_POST['eposta'] && $_POST['sifre']  && $_POST['ad']  && $_POST['soyad']  ){


		$eposta = $_POST['eposta'];
		$sifre 	= $_POST['sifre'];

		$ad 	= $_POST['ad'];
		$soyad 	= $_POST['soyad'];

		$sonuc = $tablo->kullanici_duzenle ($eposta, $sifre, $ad, $soyad, $id);

		if($sonuc){

			$_SESSION['mesaj'] 	= "Bilgiler başarıyla düzenlendi";
			// Ana sayfaya yonlendir
			header("Location: hesabim.php");

		} else {
			$mesaj = "Kategori düzenlenmedı";
		}




	}


}

$kullanici = $tablo->kullanici_goster($id);

?>
<?php include("tablo/ust.php"); ?>
<!-- Page Content -->
    <div class="container">

      <div class="row">

        <?php include("tablo/menusolkullanici.php"); ?>

        <div class="col-lg-9 pt-5">

			<h1 class="jumbotron-heading">Hesabım</h1>

		          <?php if($mesaj){ ?> <div class="alert alert-success" role="alert"><?php print $mesaj; ?></div><?php } ?>
		          	<form action="" method="post">

		          	  <div class="form-group">
					    <label for="eposta">Eposta</label>
					    <input type="email" class="form-control" id="eposta" name="eposta" value="<?php print $kullanici['eposta']; ?>" required>
					  </div>
					  <div class="form-group">
					    <label for="sifre">Şifre</label>
					    <input type="password" class="form-control" id="sifre" name="sifre" value="<?php print $kullanici['sifre']; ?>" required>
					  </div>
					  <div class="form-group">
					    <label for="ad">Ad</label>
					    <input type="text" class="form-control" id="ad" name="ad" value="<?php print $kullanici['ad']; ?>" required>
					  </div>
					  <div class="form-group">
					    <label for="soyad">Soyad</label>
					    <input type="text" class="form-control" id="soyad" name="soyad" value="<?php print $kullanici['soyad']; ?>" required>
					  </div>

					  <button type="submit" class="btn btn-primary btn-block btn-block">Kaydet</button>
					
					</form>
					<br>

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

<?php include("tablo/alt.php"); ?>