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


if($_GET){

	if(!empty($_GET['id']) && !empty($_GET['islem'])){

		$siparis = intval($_GET['id']);
		$islem 	 = $_GET['islem'];

		$tablo = new tablo();

		$urun = $tablo->siparis_yonetici_guncelle($siparis, $islem);
		
		$_SESSION['mesaj'] 	= "Sipariş başarıyla güncellendi.";
		header("Location: siparis_goster.php?id=" . $siparis);
	}


}




?>