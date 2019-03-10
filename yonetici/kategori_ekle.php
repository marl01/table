<?php

// oturum ac
session_start();

// yonetici kontrolu
if($_SESSION['tur'] != 1){
	header("Location: index.php");
	die();
}

set_include_path('..');

require("tablo/tablo.php");

$sayfa = "kategoriler";

// Mesajlar
$mesaj = "";

if($_POST){

	if($_POST['kategori_ad']){

		$kategori_ad 	= $_POST['kategori_ad'];

		$tablo = new tablo();

		$sonuc = $tablo->kategori_ekle ($kategori_ad);

		if($sonuc){

			$_SESSION['mesaj'] 	= "Kategori başarıyla eklendi";
			// Ana sayfaya yonlendir
			header("Location: kategoriler.php");

		} else {
			$mesaj = "Kategori eklenmedi. Bir hata oluştu";
		}
	}
}

?>
<?php include("tablo/ust.php"); ?>
<!-- Page Content -->
    <div class="container">

      <div class="row">

        <?php include("tablo/menusolyonetici.php"); ?>

        <div class="col-lg-9 pt-5">


         <h1 class="jumbotron-heading">Kategori ekle</h1>

		          <?php if($mesaj){ ?> <div class="alert alert-danger" role="alert"><?php print $mesaj; ?></div><?php } ?>


		          	<form action="" method="post">
					  <div class="form-group">
					    <label for="urun_ad">Kategori adı</label>
					    <input type="text" class="form-control" id="kategori_ad" name="kategori_ad" required>
					  </div>

					  <button type="submit" class="btn btn-block btn-lg btn-primary">Kaydet</button>
					</form>

					<br>


        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

<?php include("tablo/alt.php"); ?>

