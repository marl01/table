<?php

// oturum ac
session_start();


require("tablo/tablo.php");

// Mesajlar
$mesaj = "";

$tablo = new tablo();


if($_GET){

  if(!empty($_GET['kategori'])){

    $kategori_id = intval($_GET['kategori']);

    $urunler = $tablo->kategori_urunler_goster($kategori_id);

  } else if(!empty($_GET['sirala'])){
    
    $siralama = $_GET['sirala'];

    $urunler = $tablo->siralama_urunler_goster($siralama);
    
  } else if(!empty($_GET['arama']) && !empty($_GET['kelime'])){
    
    $kelime = $_GET['kelime'];

    $urunler = $tablo->arama_urunler_goster($kelime);
    
  } else {
    $urunler = $tablo->urunler();
  }

} else {
  $urunler = $tablo->urunler();
}

?>

<?php include("tablo/ust.php"); ?>
<!-- Page Content -->
    <div class="container">

      <div class="row">

        <?php include("tablo/menusol.php"); ?>

        <div class="col-lg-9 pt-5">


          <div class="row">
				    <?php 
				      if($urunler){

		          	foreach ($urunler as $urun) { 

		          	?>
		          	<div class="col-lg-4 col-md-6 mb-4">
		          		<div class="card h-100">
						  <img class="card-img-top" src="<?php print $urun['resim']; ?>" width="150" height="150" alt="Card image cap">
						  <div class="card-body text-center">
						    <h4 class="card-title"><a href="urun_goster.php?id=<?php print $urun['id']; ?>" ><?php print $urun['ad']; ?></a></h4>
						    <h4 class="text-danger"><?php print $urun['fiyat']; ?> TL</h4>
						    <a href="sepet.php?islem=ekle&amp;id=<?php print $urun['id']; ?>" class="btn btn-primary">Sepete Ekle</a>
						  </div>
						</div>
					</div>

		        <?php } } else { ?>
            <h2>Listenecek urunler bulunamadi
            <?php } ?>

          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

<?php include("tablo/alt.php"); ?>