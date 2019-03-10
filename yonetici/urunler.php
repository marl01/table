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

// Mesajlar
$mesaj = "";


if (!empty($_SESSION['mesaj'])) {
 	$mesaj = $_SESSION['mesaj'];
 	unset($_SESSION['mesaj']);
}

$tablo = new tablo();

$urunler = $tablo->urunler();

?>
<?php include("tablo/ust.php"); ?>
<!-- Page Content -->
    <div class="container">

      <div class="row">

        <?php include("tablo/menusolyonetici.php"); ?>

        <div class="col-lg-9 pt-5">

			<h1 class="jumbotron-heading">Ürünler <a href="urun_ekle.php" class="btn btn-primary">Yeni</a></h1>

		          

		          <?php if($mesaj){ ?> <div class="alert alert-success" role="alert"><?php print $mesaj; ?></div><?php } ?>


					<table class="table table-bordered">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Ad</th>
					      <th scope="col">Kategori</th>
					      <th scope="col">Boyut</th>
					      <th scope="col">Resim</th>
					      <th scope="col">Fiyat</th>
					      <th scope="col">Düzenle</th>
					      <th scope="col">Sil</th>
					    </tr>
					  </thead>
					  <tbody>
		          <?php

		          if($urunler){


		          	foreach ($urunler as $urun) {?>

					    <tr>
					      <th scope="row"><?php print $urun['id']; ?></th>
					      <td><?php print $urun['ad']; ?></td>
					      <td><?php $kategori = $tablo->kategori_goster($urun['kategori']); print $kategori['ad']; ?></td>
					      <td><?php print $urun['en']; ?> x <?php print $urun['boy']; ?> cm</td>
					      <td><img src="http://benimtablo.tk/<?php print $urun['resim']; ?>" width="50" heigth="50"></td>
					      <td><?php print $urun['fiyat']; ?></td>
					      <td><a href="urun_duzenle.php?id=<?php print $urun['id']; ?>" class="btn btn-secondary">Düzenle</a></td>
					      <td><a href="urun_sil.php?id=<?php print $urun['id']; ?>" onclick="return confirm('Silinsin mi?')" class="btn btn-danger">Sil</a></td>
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