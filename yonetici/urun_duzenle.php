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


	if($_POST['urun_ad'] && $_POST['urun_kategori'] && $_POST['urun_en'] &&  $_POST['urun_boy'] && $_POST['urun_aciklama'] && $_POST['urun_resim'] && $_POST['urun_fiyat'] && $_POST['urun_id']){


		$urun_ad 		= $_POST['urun_ad'];
		$urun_kategori 	= $_POST['urun_kategori'];
		$urun_en    	= $_POST ['urun_en'];
		$urun_boy   	= $_POST ['urun_boy'];
		$urun_resim 	= $_POST['urun_resim'];
		$urun_fiyat 	= $_POST['urun_fiyat'];
		$urun_aciklama = $_POST['urun_aciklama'];
		$urun_id 		= $_POST['urun_id'];

		$sonuc = $tablo->urun_duzenle ($urun_ad, $urun_kategori, $urun_en, $urun_boy, $urun_aciklama, $urun_resim, $urun_fiyat, $urun_id);

		if($sonuc){

			$_SESSION['mesaj'] 	= "Ürün başarıyşa düzenlendi";
			// Ana sayfaya yonlendir
			header("Location: urunler.php");

		} else {
			$mesaj = "Ürün düzenlenmedı";
		}




	}


}

if($_GET){

	if(!empty($_GET['id'])){

		$urun_id = $_GET['id'];

		$urun = $tablo->urun_goster($urun_id);

	}

}


?>
<?php include("tablo/ust.php"); ?>
<!-- Page Content -->
    <div class="container">

      <div class="row">

        <?php include("tablo/menusolyonetici.php"); ?>

        <div class="col-lg-9 pt-5">


          <h1 class="jumbotron-heading">Ürün düzenle</h1>

		          

		          <?php if($mesaj){ ?> <div class="alert alert-danger" role="alert"><?php print $mesaj; ?></div><?php } ?>


		          	<form action="" method="post">
					  <div class="form-group">
					    <label for="urun_ad">Ürün adı</label> 
					    <input type="text" class="form-control" id="urun_ad" name="urun_ad" value="<?php print $urun['ad']; ?>" required>
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
					    <input type="number" class="form-control" id="urun_en" name="urun_en"  value="<?php print $urun['en']; ?>" required >
					  </div>
					  <div class="form-group">
					    <label for="urun_boy">Ürün boy</label>
					    <input type="number" class="form-control" id="urun_boy" name="urun_boy" value="<?php print $urun['boy']; ?>" required>
					  </div>
					  <div class="form-group">
					    <label for="urun_resim">Ürün resim</label>
					    <input type="text" class="form-control" id="urun_resim" name="urun_resim" value="<?php print $urun['resim']; ?>" required>
					  </div>
					  <div class="form-group">
					    <label for="urun_fiyat">Ürün fiyat</label>
					    <input type="text" class="form-control" id="urun_fiyat" name="urun_fiyat" value="<?php print $urun['fiyat']; ?>" required>
					  </div>
					  <div class="form-group">
					    <label for="urun_aciklama">Ürün açıklama</label>
					    <textarea class="form-control" id="urun_aciklama" name="urun_aciklama" rows="3"><?php print $urun['aciklama']; ?> </textarea>
					  </div>
					  <input type="hidden" name="urun_id" value="<?php print $urun['id']; ?>">
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