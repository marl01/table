<?php

// oturum ac
session_start();

require("tablo/tablo.php");

$sayfa = "siparisler";

// Mesajlar
$mesaj = "";

if (!empty($_SESSION['mesaj'])) {
 	$mesaj = $_SESSION['mesaj'];
 	unset($_SESSION['mesaj']);
}

$tablo = new tablo();

$kullanici_id = $_SESSION['id'];

if($_GET){

  if(!empty($_GET['islem'])){

    $islem = $_GET['islem'];

    $siparisler = $tablo->siparis_kullanici_goster_sirala($kullanici_id, $islem);

  } else {
    $siparisler = $tablo->siparis_kullanici_goster($kullanici_id);
  }

} else {
  $siparisler = $tablo->siparis_kullanici_goster($kullanici_id);
}






?>
<?php include("tablo/ust.php"); ?>
<!-- Page Content -->
    <div class="container">

      <div class="row">

        <?php include("tablo/menusolkullanici.php"); ?>

        <div class="col-lg-9 pt-5">

			<h1 class="jumbotron-heading">Siparişler</h1>

		          <?php if($mesaj){ ?> <div class="alert alert-success" role="alert"><?php print $mesaj; ?></div><?php } ?>


					<table class="table table-bordered">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Sipariş no</th>
					      <th scope="col">Tarih</th>
					      <th scope="col">Durum</th>
					      <th scope="col">Toplam</th>
					      <th scope="col">Göster</th>
					    </tr>
					  </thead>
					  <tbody>
				          <?php

				          if($siparisler){


				          	foreach ($siparisler as $siparis) {?>

							    <tr>
							      <th scope="row"><?php print $siparis['id']; ?></th>
							      <td><?php print $siparis['siparis']; ?></td>
							      <td><?php print $siparis['tarih']; ?></td>
							      <td><?php if($siparis['durum'] == "1"){ print "<span class='badge badge-primary'>Beklemede</span>"; } else if($siparis['durum'] == "2"){ print "<span class='badge badge-secondary'>Onaylandı</span>"; } else if($siparis['durum'] == "3"){ print "<span class='badge badge-success'>Kargolandı</span>"; } else { print "<span class='badge badge-danger'>Geçersiz</span>"; } ?></td>
							      <td><?php print $siparis['toplam']; ?> TL</td>
							      <td><a href="siparis_goster.php?id=<?php print $siparis['siparis']; ?>" class="btn btn-primary">Göster</a></td>
							    </tr>
				          <?php } 

				      		} else { ?>


				          	<tr>
				          		<td colspan="6" class="text-center">Hiç bir şey yok</td>
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