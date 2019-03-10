<?php

require("veritabani.php");


class Tablo {


	private $vt;
	// bu her zaman oncellik calisir
	function __construct(){

		$this->vt = new veritabani();
	}


	public function kayit ($eposta, $sifre, $ad, $soyad){

		$sorgu = "INSERT INTO `kullanicilar` (`eposta`, `sifre`, `ad`, `soyad`) VALUES ('" . $eposta . "', '" . $sifre . "', '" . $ad . "', '" . $soyad . "');";

		$sonuc = $this->vt->vt_sorgula_basit($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}


	}

	public function giris ($eposta, $sifre){

		$sorgu = "SELECT * FROM `kullanicilar` WHERE `eposta` = '" . $eposta . "' AND `sifre` = '" . $sifre . "'";

		$sonuc = $this->vt->vt_sorgula($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}

		
	}

	public function kullanici_goster ($kullanici_id){

		$sorgu = "SELECT * FROM `kullanicilar` WHERE `id` = '" . $kullanici_id . "'";

		$sonuc = $this->vt->vt_sorgula($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}
	}

	public function kullanici_duzenle ($eposta, $sifre, $ad, $soyad, $id){

		$sorgu = "UPDATE `kullanicilar` SET `eposta` = '" . $eposta . "', `sifre` = '" . $sifre . "', `ad` = '" . $ad . "', `soyad` = '" . $soyad . "' WHERE `kullanicilar`.`id` = " . $id . ";";

		$sonuc = $this->vt->vt_sorgula_basit($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}

		
	}
	public function urun_goster ($urun_id){

		$sorgu = "SELECT * FROM `urunler` WHERE `id` = " . $urun_id;

		$sonuc = $this->vt->vt_sorgula($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}

		
	}
	


	public function urun_ekle ($urun_ad, $urun_kategori, $urun_en, $urun_boy, $urun_aciklama, $urun_resim, $urun_fiyat){

		$sorgu = "INSERT INTO `urunler` (`ad`, `kategori`, `en`, `boy`, `aciklama`, `resim`, `fiyat`) VALUES ('" . $urun_ad . "', '" . $urun_kategori. "', '" . $urun_en. "','" . $urun_boy . "','" . $urun_aciklama ."', '" . $urun_resim . "', '" . $urun_fiyat . "');";

		$sonuc = $this->vt->vt_sorgula_basit($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}

		
	}
	public function urun_duzenle ($urun_ad, $urun_kategori, $urun_en, $urun_boy, $urun_aciklama, $urun_resim, $urun_fiyat, $urun_id){

		$sorgu = "UPDATE `urunler` SET `ad` = '" . $urun_ad . "', `kategori` = '" . $urun_kategori . "', `en` = '" . $urun_en . "',  `boy` = '" . $urun_boy . "', `aciklama` = '" . $urun_aciklama ."', `resim` = '" . $urun_resim . "', `fiyat` = '" . $urun_fiyat . "' WHERE `urunler`.`id` = " . $urun_id . ";";

		$sonuc = $this->vt->vt_sorgula_basit($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}

		
	}

	public function urun_sil ($urun_id){

		$sorgu = "DELETE FROM `urunler` WHERE `urunler`.`id` = " . $urun_id;

		$sonuc = $this->vt->vt_sorgula_basit($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}

		
	}

	public function urunler(){

		$sorgu = "SELECT * FROM `urunler`";

		$sonuc = $this->vt->vt_sorgula_cok($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}

	}

	public function kategoriler(){

		$sorgu = "SELECT * FROM `kategoriler`";

		$sonuc = $this->vt->vt_sorgula_cok($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}

	}

	public function kategori_toplam ($kategori_id){

		$sorgu = "SELECT COUNT(*) AS sonuc FROM `urunler` WHERE `kategori` = " . $kategori_id;

		$sonuc = $this->vt->vt_sorgula($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}

		
	}
	public function kategori_goster ($kategori_id){

		$sorgu = "SELECT * FROM `kategoriler` WHERE `id` = " . $kategori_id;

		$sonuc = $this->vt->vt_sorgula($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}
	}
	
	public function kategori_urunler_goster($kategori_id){

		$sorgu = "SELECT * FROM `urunler` WHERE `kategori` = " . $kategori_id;

		$sonuc = $this->vt->vt_sorgula_cok($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}
	}


	public function kategori_ekle ($kategori_ad){

		$sorgu = "INSERT INTO `kategoriler` (`ad`) VALUES ('" . $kategori_ad . "');";

		$sonuc = $this->vt->vt_sorgula_basit($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}
	}

	public function kategori_duzenle ($kategori_ad, $kategori_id){

		$sorgu = "UPDATE `kategoriler` SET `ad` = '" . $kategori_ad . "' WHERE `kategoriler`.`id` = " . $kategori_id . ";";

		$sonuc = $this->vt->vt_sorgula_basit($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}

		
	}

	public function kategori_sil ($kategori_id){

		$sorgu = "DELETE FROM `kategoriler` WHERE `kategoriler`.`id` = " . $kategori_id;

		$sonuc = $this->vt->vt_sorgula_basit($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}

	}

	public function siralama_urunler_goster($siralama){

		$ekstra = "";
		if($siralama == "eklenen"){
			$ekstra = "ORDER BY `urunler`.`id` DESC";
		} else if ($siralama == "azalan"){
			$ekstra = "ORDER BY `urunler`.`fiyat` DESC";
		} else if ($siralama == "artan"){
			$ekstra = "ORDER BY `urunler`.`fiyat` ASC";
		} else if ($siralama == "satilan"){
			$ekstra = "ORDER BY `urunler`.`satis` DESC";
		} else {
			$ekstra = "";
		}

		$sorgu = "SELECT * FROM `urunler` " . $ekstra;

		$sonuc = $this->vt->vt_sorgula_cok($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}
	}

	public function arama_urunler_goster($kelime){

		$sorgu = "SELECT * FROM `urunler` WHERE `ad` LIKE '%" . $kelime . "%'";

		$sonuc = $this->vt->vt_sorgula_cok($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}
	}
	public function siparis_ekle ($siparis_id, $kullanici, $toplam){

		$sorgu = "INSERT INTO `siparis` (`siparis`, `kullanici`, `toplam`) VALUES ('" . $siparis_id . "', '" . $kullanici . "', " . $toplam . ");";

		$sonuc = $this->vt->vt_sorgula_basit($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}
	}

	public function siparis_urun_ekle ($siparis_id, $urun_id){

		$sorgu = "INSERT INTO `siparis_urunler` (`siparis_id`, `urun_id`) VALUES ('" . $siparis_id . "', '" . $urun_id . "');";

		$sonuc = $this->vt->vt_sorgula_basit($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}
	}
	public function siparis_urun_satis ($urun_id){

		$sorgu = "UPDATE `urunler` SET `satis` = `satis` + 1 WHERE `urunler`.`id` = " . $urun_id . ";";

		$sonuc = $this->vt->vt_sorgula_basit($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}
	}
	public function siparis_kullanici_goster($kullanici){

		$sorgu = "SELECT * FROM `siparis` WHERE `kullanici` = " . $kullanici;

		$sonuc = $this->vt->vt_sorgula_cok($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}
	}
	public function siparis_kullanici_goster_sirala($kullanici, $islem){

		$ekstra = "";
		if($islem == "bekleyen"){
			$ekstra = " AND `durum` = '1'";
		} else if ($islem == "onaynalan"){
			$ekstra = " AND `durum` = '2'";
		} else if ($islem == "tamamlanan"){
			$ekstra = " AND `durum` = '3'";
		} else {
			$ekstra = "";
		}
		$sorgu = "SELECT * FROM `siparis` WHERE `kullanici` = '" . $kullanici . "'" . $ekstra . ";";

		$sonuc = $this->vt->vt_sorgula_cok($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}
	}
	public function siparis_yonetici_goster(){

		$sorgu = "SELECT * FROM `siparis`;";

		$sonuc = $this->vt->vt_sorgula_cok($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}
	}
	public function siparis_yonetici_goster_sirala($islem){

		$ekstra = "";
		if($islem == "bekleyen"){
			$ekstra = "`durum` = '1'";
		} else if ($islem == "onaynalan"){
			$ekstra = "`durum` = '2'";
		} else if ($islem == "tamamlanan"){
			$ekstra = "`durum` = '3'";
		} else {
			$ekstra = "";
		}
		$sorgu = "SELECT * FROM `siparis` WHERE " . $ekstra . ";";

		$sonuc = $this->vt->vt_sorgula_cok($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}
	}
	public function siparis_yonetici_guncelle($siparis, $islem){

		$ekstra = "";
		if($islem == "bekleyen"){
			$ekstra = "`durum` = '1'";
		} else if ($islem == "onaynalan"){
			$ekstra = "`durum` = '2'";
		} else if ($islem == "tamamlanan"){
			$ekstra = "`durum` = '3'";
		} else {
			$ekstra = "";
		}
		$sorgu = "UPDATE `siparis` SET ". $ekstra . " WHERE `siparis`.`siparis` = " . $siparis . ";";

		$sonuc = $this->vt->vt_sorgula_basit($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}
	}
	public function siparis_kullanici_goster_tek($kullanici, $siparis){

		$sorgu = "SELECT * FROM `siparis` WHERE `kullanici` = " . $kullanici . " AND  `siparis` = '" . $siparis . "';";

		$sonuc = $this->vt->vt_sorgula($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}
	}
	public function siparis_yonetici_goster_tek($siparis){

		$sorgu = "SELECT * FROM `siparis` WHERE `siparis` = '" . $siparis . "';";

		$sonuc = $this->vt->vt_sorgula($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}
	}
	public function siparis_urunler_goster($siparis){

		$sorgu = "SELECT * FROM `siparis_urunler` WHERE `siparis_id` = " . $siparis;
		
		$sonuc = $this->vt->vt_sorgula_cok($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}
	}


}





?>