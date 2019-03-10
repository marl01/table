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


if (!empty($_SESSION['mesaj'])) {
 	$mesaj = $_SESSION['mesaj'];
 	unset($_SESSION['mesaj']);
}

$tablo = new tablo();

$kategoriler = $tablo->kategoriler();

?>
<?php include("tablo/ust.php"); ?>
<!-- Page Content -->
    <div class="container">

      <div class="row">

        <?php include("tablo/menusolyonetici.php"); ?>

        <div class="col-lg-9 pt-5">

			<h1 class="jumbotron-heading">Kategoriler <a href="kategori_ekle.php" class="btn btn-primary">Yeni</a></h1>

		          

		          <?php if($mesaj){ ?> <div class="alert alert-success" role="alert"><?php print $mesaj; ?></div><?php } ?>


					<table class="table table-bordered">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Ad</th>
					      <th scope="col">Düzenle</th>
					      <th scope="col">Sil</th>
					    </tr>
					  </thead>
					  <tbody>
		          <?php

		          if($kategoriler){


		          	foreach ($kategoriler as $kategori) {?>

					    <tr>
					      <th scope="row"><?php print $kategori['id']; ?></th>
					      <td><?php print $kategori['ad']; ?></td>
					      <td><a href="kategori_duzenle.php?id=<?php print $kategori['id']; ?>" class="btn btn-secondary">Düzenle</a></td>
					      <td><a href="kategori_sil.php?id=<?php print $kategori['id']; ?>" onclick="return confirm('Silinsin mi?')" class="btn btn-danger">Sil</a></td>
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