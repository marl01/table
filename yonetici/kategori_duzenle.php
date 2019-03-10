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


	if($_POST['kategori_ad']  && $_POST['kategori_id']){


		$kategori_ad 	= $_POST['kategori_ad'];
		$kategori_id 	= $_POST['kategori_id'];

		$tablo = new tablo();

		$sonuc = $tablo->kategori_duzenle ($kategori_ad,  $kategori_id);

		if($sonuc){

			$_SESSION['mesaj'] 	= "Kategori başarıyşa düzenlendi";
			// Ana sayfaya yonlendir
			header("Location: kategoriler.php");

		} else {
			$mesaj = "Kategori düzenlenmedı";
		}




	}


}

if($_GET){

	if(!empty($_GET['id'])){

		$kategori_id = $_GET['id'];

		$tablo = new tablo();

		$kategori = $tablo->kategori_goster($kategori_id);

	}

}


?>
<?php include("tablo/ust.php"); ?>
<!-- Page Content -->
    <div class="container">

      <div class="row">

        <?php include("tablo/menusolyonetici.php"); ?>

        <div class="col-lg-9 pt-5">


          <h1 class="jumbotron-heading">Kategori düzenle</h1>

		          <?php if($mesaj){ ?> <div class="alert alert-danger" role="alert"><?php print $mesaj; ?></div><?php } ?>
		          	<form action="" method="post">
					  <div class="form-group">
					    <label for="kategori_ad">Kategori adı</label> 
					    <input type="text" class="form-control" id="kategori_ad" name="kategori_ad" value="<?php print $kategori['ad']; ?>" required>
					  </div>
					  <input type="hidden" name="kategori_id" value="<?php print $kategori['id']; ?>">
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