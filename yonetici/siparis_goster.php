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

$sayfa = "siparisler";

// Mesajlar
$mesaj = "";

if (!empty($_SESSION['mesaj'])) {
 	$mesaj = $_SESSION['mesaj'];
 	unset($_SESSION['mesaj']);
}

$tablo = new tablo();

$siparis_id = 0;
$siparis_urunler = false;

if(!empty($_GET['id'])){
	$siparis_id = intval($_GET['id']);
}

$siparis = $tablo->siparis_yonetici_goster_tek($siparis_id);

if($siparis){
	$siparis_urunler = $tablo->siparis_urunler_goster($siparis_id);
} else {
	$_SESSION['mesaj'] = "Böyle bir sipariş yok";
	header("Location: siparis.php");
}

?>
<?php include("tablo/ust.php"); ?>
<!-- Page Content -->
    <div class="container">

      <div class="row">

        <?php include("tablo/menusolyonetici.php"); ?>

        <div class="col-lg-9 pt-5">

			<h1 class="jumbotron-heading">Sipariş detayı <?php print $siparis['siparis']; ?></h1>

		          <?php if($mesaj){ ?> <div class="alert alert-success" role="alert"><?php print $mesaj; ?></div><?php } ?>

		          <table class="table table-bordered">
					  <thead>
					    <tr>
					      <th scope="col">Sipariş no</th>
					      <th scope="col">Müşteri</th>
					      <th scope="col">Tarih</th>
					      <th scope="col">Durum</th>
					      <th scope="col">Toplam</th>
					      <th scope="col">Durumu güncelle</th>
					    </tr>
					  </thead>
					  <tbody>
				        <?php if($siparis){?>

							<tr>
							    <td><?php print $siparis['siparis']; ?></td>
							    <td><?php $kullanici = $tablo->kullanici_goster($siparis['kullanici']); print $kullanici['ad'] . " " . $kullanici['soyad']; ?></td>
							   	<td><?php print $siparis['tarih']; ?></td>
							    <td><?php if($siparis['durum'] == "1"){ print "<span class='badge badge-primary'>Beklemede</span>"; } else if($siparis['durum'] == "2"){ print "<span class='badge badge-secondary'>Onaylandı</span>"; } else if($siparis['durum'] == "3"){ print "<span class='badge badge-success'>Kargolandı</span>"; } else { print "<span class='badge badge-danger'>Geçersiz</span>"; } ?></td>
							    <td><?php print $siparis['toplam']; ?> TL</td>
							    <td><form method="GET" action="siparis_guncelle.php">
								  <div class="form-row align-items-center">
								    <div class="col-auto">
								      <label class="mr-sm-2" for="inlineFormCustomSelect"></label>
								      <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect" name="islem" required>
								        <option value="bekleyen">Beklemede</option>
								        <option value="onaynalan">Onayla</option>dd
								        <option value="tamamlanan">Kargola</option>
								      </select>
								      <input type="hidden" name="id" value="<?php print $siparis['siparis']; ?>"/>
								      <button type="submit" class="btn btn-sm btn-primary">Kaydet</button>
								    </div>
								  </div>
								</form>
								</td>




							</tr>

				         <?php } else { ?>


				          	<tr>
				          		<td colspan="4" class="text-center">Hiç bir şey yok</td>
				          	</tr>

				        <?php } ?>
		          
					    
					  </tbody>
				</table>
				<h1 class="jumbotron-heading">Sipariş verilen ürünler</h1>
					<table class="table table-bordered">
					  <thead>
					    <tr>
					      <th scope="col">Ürün resmi</th>
					      <th scope="col">Ürün adı</th>
					      <th scope="col">Ürün boyutu</th>
					      <th scope="col">Ürün fiyat</th>
					    </tr>
					  </thead>
					  <tbody>
		          <?php
		          if($siparis_urunler){
		          	foreach ($siparis_urunler as $siparis_urun) {
		          		$urun = $tablo->urun_goster($siparis_urun['urun_id']);
		          		?>
					    <tr>
					      <th><img src="/<?php print $urun['resim']; ?>" width="50" heigth="50"></th>
					      <td><?php print $urun['ad']; ?></td>
					      <td><?php print $urun['en']; ?>x<?php print $urun['boy']; ?></td>
					      <td><b><?php print $urun['fiyat']; ?> TL</b></td>
					     </tr>
		          <?php } 
		      		} else { ?>
		          	<tr>
		          		<td colspan="4" class="text-center">Hiç bir şey yok</td>
		          	</tr>
		          <?php } ?>
					  </tbody>
				</table>

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

<?php include("tablo/alt.php"); ?>