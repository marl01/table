<?php

// oturum ac
session_start();

require("tablo/tablo.php");

if(!isset($_SESSION['sepet'])){

	$_SESSION['sepet'] = array();

}

// Mesajlar
$mesaj = "";

if (!empty($_SESSION['mesaj'])) {
 	$mesaj = $_SESSION['mesaj'];
 	unset($_SESSION['mesaj']);
}


$toplam = 0;

$tablo = new tablo();

if($_GET){

	if(!empty($_GET['id'])  && !empty($_GET['islem'])){

		// urun id
		$id = intval($_GET['id']);

		// islem ekle
		if($_GET['islem'] == "ekle"){
		
			$urun = $tablo->urun_goster($id);

			$_SESSION['sepet'][$id] = $urun;

			$mesaj = "Ürün sepete eklendi.";

		}
		// islem sil
		else if ($_GET['islem'] == "sil") {
			// sil hemencik
			unset($_SESSION['sepet'][$id]);
			$mesaj = "Ürün sepetten silindi.";

		} else {
			// gelecekte lazim olur
		}

		$sepet = $_SESSION['sepet'];

	}

}
?>

<?php include("tablo/ust.php"); ?>


<!-- Page Content -->
    <div class="container">

      <div class="row">

        <?php include("tablo/menusol.php"); ?>

        <div class="col-lg-9 pt-5">

        <h3 class="mb-3">Sepet</h3>

          <?php if($mesaj){ ?> <div class="alert alert-success" role="alert"><?php print $mesaj; ?></div><?php } ?>

          <div class="container">

          <div class="row">

			<table class="table table-bordered table-hover">
			  <thead>
			    <tr>
			      <th scope="col">Ürün resmi</th>
			      <th scope="col">Ürün adı</th>
			      <th scope="col">Ürün boyutu</th>
			      <th scope="col">Ürün fiyat</th>
			      <th scope="col">Sil</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	if(!empty($sepet)){


			  	foreach ($sepet as $urun) {


		        $toplam = $toplam + $urun['fiyat'];

			  	?>
			    <tr>
			      <th><img src="<?php print $urun['resim']; ?>" width="50" heigth="50"></th>
			      <td><?php print $urun['ad']; ?></td>
			      <td><?php print $urun['en']; ?>x<?php print $urun['boy']; ?></td>
			      <td><b><?php print $urun['fiyat']; ?> TL</b></td>
			      <td><a href="sepet.php?islem=sil&amp;id=<?php print $urun['id']; ?>" class="btn btn-danger">Sil</a></td>
			    </tr>
			    <?php } } else {?>
			    <tr>
			    	<td colspan=5 class="text-center">Sepet boş</td>
			    </tr>
				<?php } ?>
			  </tbody>
			</table>

			
			

          </div>
        </div>

        <form method="post" action="siparis_tamamla.php">
				<div class="form-group">
				<div class="mb-auto">
		          	<div class="card mb-3">
					  <div class="card-header">Sepet Özeti</div>
					  <div class="card-body">
					    <h4 class="card-text">Toplam <?php print $toplam; ?> TL</h4>
					  </div>
					</div>
				</div>

				<?php
				// kullanici giris kontrolu
				if(!empty($_SESSION['id'])) {?>
					<input type="hidden" name="siparis" value="1"/>
					<button type="submit" class="btn btn-primary btn-lg btn-block float-right" >Sipariş oluştur</button>
					<?php } else { ?>
					<div class="alert alert-danger" role="alert">Sipariş oluşturmak için öncellikle giriş yapınız veya kayıt olunuz.</div>
				<?php } ?>
					</div>


				</div>
			</form>

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->


<?php include("tablo/alt.php"); ?>