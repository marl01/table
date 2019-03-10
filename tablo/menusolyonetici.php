		<div class="col-lg-3 pt-4">
          <div class="list-group">
          	<h5 class="mb-1">Ürünler</h5>
            <a href="urunler.php" class="<?php if($sayfa == "urunler"){ print "active"; }; ?> list-group-item d-flex justify-content-between align-items-center">Ürünler</a>
            <a href="kategoriler.php" class="<?php if($sayfa == "kategoriler"){ print "active"; }; ?> list-group-item d-flex justify-content-between align-items-center">Kategoriler</a>
          </div>
          <div class="list-group pt-4">
          	<h5 class="mb-1">Siparişler</h5>
            <a href="siparis.php?islem=bekleyen" class="list-group-item">Bekleyen</a>
            <a href="siparis.php?islem=onaynalan" class="list-group-item">Onaylanan</a>
            <a href="siparis.php?islem=tamamlanan" class="list-group-item">Kargolanan</a>
            <a href="siparis.php?islem=hepsi" class="list-group-item">Tümü</a>
          </div>
        </div>
        <!-- /.col-lg-3 -->

