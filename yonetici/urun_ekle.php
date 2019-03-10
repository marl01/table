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

$sayfa = "urunler";

$tablo = new tablo();

$kategoriler = $tablo->kategoriler();


// Mesajlar
$mesaj = "";

if($_POST){


	if($_POST['urun_ad'] && $_POST['urun_kategori'] && $_POST['urun_en'] &&  $_POST['urun_boy'] && $_POST['urun_aciklama'] && $_POST['urun_resim'] && $_POST['urun_fiyat']){


		$urun_ad 		= $_POST['urun_ad'];
		$urun_kategori 	= $_POST['urun_kategori'];

       	$urun_en    	= $_POST ['urun_en'];
		$urun_boy   	= $_POST ['urun_boy'];

		$urun_resim 	= $_POST['urun_resim'];
		$urun_fiyat 	= $_POST['urun_fiyat'];


		$urun_aciklama = $_POST['urun_aciklama'];


		$sonuc = $tablo->urun_ekle ($urun_ad, $urun_kategori, $urun_en, $urun_boy, $urun_aciklama, $urun_resim, $urun_fiyat);

		if($sonuc){

			$_SESSION['mesaj'] 	= "Ürün başarıyla eklendi";
			// Ana sayfaya yonlendir
			header("Location: urunler.php");

		} else {
			$mesaj = "Ürün eklenmedi";
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


         <h1 class="jumbotron-heading">Ürünler</h1>

		          <?php if($mesaj){ ?> <div class="alert alert-danger" role="alert"><?php print $mesaj; ?></div><?php } ?>

		          	<form action="" method="post">
					  <div class="form-group">
					    <label for="urun_ad">Ürün adı</label>
					    <input type="text" class="form-control" id="urun_ad" name="urun_ad" required>
					  </div>
					  <div class="form-group">
					    <label for="urun_kategori">Ürün kategori</label>
					    <select class="form-control" id="urun_kategori" name="urun_kategori" required>
					    <?php if($kategoriler){ foreach ($kategoriler as $kategori) {?>
					      <option value="<?php print $kategori['id']; ?>"><?php print $kategori['ad']; ?></option>
					    <?php }} ?>
					    </select>
					  </div>
					  <div class="form-group">
					    <label for="urun_en">Ürün en</label>
					    <input type="number" class="form-control" id="urun_en" name="urun_en" required>
					  </div>
					  <div class="form-group">
					    <label for="urun_boy">Ürün boy</label>
					    <input type="number" class="form-control" id="urun_boy" name="urun_boy" required>
					  </div>

					  <div class="form-group">
					    <label for="urun_resim">Ürün resim</label>
					    <input type="text" class="form-control" id="urun_resim" name="urun_resim" required>
					  </div>
					  <div class="form-group">
					    <label for="urun_fiyat">Ürün fiyat</label>
					    <input type="text" class="form-control" id="urun_fiyat" name="urun_fiyat" required>
					  </div>

					  <div class="form-group">
					    <label for="urun_aciklama">Ürün açıklama</label>
					    <textarea class="form-control" id="urun_aciklama" name="urun_aciklama" rows="3"></textarea>
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

