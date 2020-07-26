<?php
class Kullanicilar {
private $kullaniciId;
private $adsoyad;
private $email;
private $telefon;
private $seviyeid;

	var $tabloAd="kullanicilar";
	
	public function KullaniciSayiBul(){
	$dba = new dbclass();
	$dba->connect();
	$sql=$dba->query("select count(id) sayi from ".$this->tabloAd);
	$sonuc = $dba->fetch_object($sql);
	return $sonuc;
	}
	public function KullaniciGetir($kullaniciId){
	$dba = new dbClass();
	$dba->connect();
        //echo  "select * from ".$this->tabloAd ."	where id =$kullaniciId";
	$sql = $dba->query("select * from ".$this->tabloAd ." where id =$kullaniciId");
	$sonuc = $dba->fetch_object($sql);
	return $sonuc;
	}
        
        function KullaniciGirisKontrol($email,$sifre){
        $dba= new dbClass();
        $dba->connect();
        //echo "SELECT id from $this->tabloAd where email='$email' and sifre='$sifre'";
        $sql = $dba->query("SELECT id from $this->tabloAd where email='$email' and sifre='$sifre'");
        $sonuc = $dba->fetch_object($sql);
        return $sonuc;
	}
        
        function SosyalKullaniciGirisKontrol($email){
        $dba= new dbClass();
        $dba->connect();
        //echo "SELECT id from $this->tabloAd where eposta='$eposta' and sifre='$sifre'";
        $sql = $dba->query("SELECT id from $this->tabloAd where email='$email'");
        $sonuc = $dba->fetch_object($sql);
        return $sonuc;
	}
	
	public function KullanicilariGetir($pagerWhere ="",$aramaString=""){
	$dba = new dbClass();
	$dba->connect();
	$sql = $dba->query("select * from ".$this->tabloAd ." $aramaString $pagerWhere");
	while(@$sonuc =$dba->fetch_object($sql)){
		$r[] =$sonuc;
		}
	return $r;
	}
	
	
	public function KullaniciEkle($adsoyad,$email,$sifre,$telefon,$adres){
	$dba = new dbClass();
	$dba->connect();
	//echo "insert into ".$this->tabloAd ." (adsoyad,email,sifre,telefon,adres) values('$adsoyad','$email','$sifre','$telefon','$adres')";
	$sql = $dba->query("insert into ".$this->tabloAd ." (adsoyad,email,sifre,telefon,adres) values('$adsoyad','$email','$sifre','$telefon','$adres')");
	$sonuc = $dba->insert_id($sql);
	return $sonuc;
	}
	
	
	public function KullaniciDuzenle($kullaniciId,$adsoyad,$email,$sifre,$telefon,$adres){
	$dba = new dbClass();
	$dba->connect();
        //echo "update ".$this->tabloAd ." set adsoyad='$adsoyad',email='$email',sifre='$sifre',telefon ='$telefon',adres='$adres' where id =$kullaniciId";
	$sql = $dba->query("update ".$this->tabloAd ." set adsoyad='$adsoyad',email='$email',sifre='$sifre',telefon ='$telefon',adres='$adres' where id =$kullaniciId");
	$sonuc=1;
	return $sonuc;
	}
	
	public function KullaniciSil($kullaniciId){
	$dba = new dbClass();
	$dba->connect();
	$sql = $dba->query("delete from ".$this->tabloAd ." where id =$kullaniciId");
	$sonuc=1;
	return $sonuc;
	}
       
}

?>