<?php
// oturum ac
session_start();

require("tablo/tablo.php");

if(!isset($_SESSION['sepet'])){
	$_SESSION['sepet'] = array();
}

if(!isset($_SESSION['id'])){
	header("Location: sepet.php");
	exit();
}

$sepet = $_SESSION['sepet'];

// Mesajlar
$mesaj = "";

$siparis_id = 0;
$toplam = 0;

$tablo = new tablo();


if($_POST){

	if(!empty($_POST['siparis'])){

		$siparis_id = mt_rand(100000, 999999);

		$kullanici_id = $_SESSION['id'];

		$toplam = 0;

		// tum fiyatlari topla
		if(!empty($sepet)){
			foreach ($sepet as $urun) {
				$toplam = $toplam + $urun['fiyat'];
			}
		}

		if($toplam <= 0){
			$_SESSION['mesaj'] = "Sepette ürün yok veya toplam ürün fiyatı 0 TL'den az.";
			header("Location: sepet.php");
		} else {

			// siparis olustur
			$siparis = $tablo->siparis_ekle ($siparis_id, $kullanici_id, $toplam);

			// siparis urunleri ekle
			if(!empty($sepet)){
				foreach ($sepet as $urun) {
					$siparis_urunler = $tablo->siparis_urun_ekle ($siparis_id, $urun['id']);
					$siparis_urun_satis = $tablo->siparis_urun_satis($urun['id']);
				}
			}

			unset($_SESSION['sepet']);
		}

	}

}
?>

<?php include("tablo/ust.php"); ?>


<!-- Page Content -->
    <div class="container">

      <div class="row">

        <?php include("tablo/menusol.php"); ?>

        <div class="col-lg-9 pt-5">

        <h3 class="mb-3">Sipariş</h3>

          	<div class="container">

	          <div class="row">
	          	<div class="float-right">
			        <div class="card">
						<div class="card-header">Sipariş alındı</div>
						 <div class="card-body">
						   <h4 class="card-text">Sipariş No <?php print $siparis_id; ?>.<br><br>Teşekkür ederiz. <br><br> En kısa zamanda sipariş verdiğiniz ürünler kargolanacak. <br><br> Sipariş verdiğiniz ürünleri üst menüden takıp edebilirsiniz.</h4>
						 </div>
					</div><br>
				</div>
	          </div>
        	</div>
        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->


<?php include("tablo/alt.php"); ?>