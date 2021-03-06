		<div class="col-lg-3 pt-4">

          <div class="list-group">
          	<h5 class="mb-1">Kategoriler</h5>
            <?php 
            $kategoriler = $tablo->kategoriler();

            if($kategoriler) {
              foreach ($kategoriler as $kategori) {

              $kategori_toplam = $tablo->kategori_toplam($kategori['id']);

              ?>
              <a href="index.php?kategori=<?php print $kategori['id']; ?>" class="list-group-item d-flex justify-content-between align-items-center"><?php print $kategori['ad']; ?> <span class="badge badge-primary badge-pill"><?php print $kategori_toplam['sonuc']; ?></span></a>
            
            <?php } } ?>
          </div>
          <div class="list-group pt-4">
          	<h5 class="mb-1">Siralama</h5>
            <a href="index.php?sirala=satilan" class="list-group-item">En çok satılan</a>
            <a href="index.php?sirala=eklenen" class="list-group-item">Son eklenler</a>
            <a href="index.php?sirala=azalan" class="list-group-item">Fiyat azalan</a>
            <a href="index.php?sirala=artan" class="list-group-item">Fiyat artan</a>
          </div>
        </div>
        <!-- /.col-lg-3 -->