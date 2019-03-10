<?php
// oturum ac
session_start();

require("tablo/tablo.php");

// Mesajlar
$mesaj = "";

if (!empty($_SESSION['mesaj'])) {
 	$mesaj = $_SESSION['mesaj'];
 	unset($_SESSION['mesaj']);
}

$tablo = new tablo();

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

        <?php include("tablo/menusol.php"); ?>

        <div class="col-lg-9 pt-5">

				<div class="container">

			          <div class="row">

			          	<div class="col-lg-7 col-md-7 mb-4">
				          	<div class="card mb-3">
							  <img class="card-img-top" src="<?php print $urun['resim']; ?>" width="750" heigth="50" alt="Card image cap">
							  <div class="card-body">
							    <p class="card-text"><?php print $urun['aciklama']; ?></p>
							  </div>
							</div>
							
						</div>
						<div class="col-5">
							
							<div class="card border-primary mb-3" style="max-width: 20rem;">
							  <div class="card-body text-center text-primary">
							  	
							  	<h4 class="text-center"><?php print $urun['ad']; ?></h4>
							    <h4 class="text-danger"><?php print $urun['fiyat']; ?> TL</h4>
							    <p class="card-text">Boyutları <?php print $urun['en']; ?>x<?php print $urun['boy']; ?></p>
							    <a href="sepet.php?islem=ekle&amp;id=<?php print $urun['id']; ?>" class="btn btn-primary btn-block">Sepete Ekle</a>
							  </div>
							</div>

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