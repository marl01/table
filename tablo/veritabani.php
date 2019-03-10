<?php

require("ayarlar.php");


class Veritabani {


	private $vt;
	private $vt_ka;
	private $vt_si;
	private $vt_ad;
	private $vt_ba;



	function __construct(){

		$this->vt_baglan();
	}


	public function vt_baglan(){

		$this->vt_ka = $GLOBALS['veri_tabani_kullanici_adi'];
		$this->vt_si = $GLOBALS['veri_tabani_sifre'];
		$this->vt_ad = $GLOBALS['veri_tabani_adi'];
		$this->vt_ba = $GLOBALS['veri_tabani_baglanti'];
		

		$this->vt = new mysqli ($this->vt_ba, $this->vt_ka, $this->vt_si, $this->vt_ad);

		if(!$this->vt){
			die("Baglanti yok");
		}

	}


	public function vt_sorgula($sorgu){

		$sorgula = $this->vt->query($sorgu);

		if($sorgula){
			return $sorgula->fetch_assoc();
		} else {
			return false;
		}

	}


	public function vt_sorgula_cok($sorgu){
		$sorgula = $this->vt->query($sorgu);

		if($sorgula){

			if($sorgula->num_rows > 0){

				while($satir = $sorgula->fetch_array())
				{
					$satirlar[] = $satir;
				}


				return $satirlar;
			} else {
				return false;
			}



		} else {
			return false;
		}


	}


	public function vt_sorgula_basit($sorgu){
		$sorgula = $this->vt->query($sorgu);

		if($sorgula){
			return true;
		} else {
			return false;
		}


	}






}



?>