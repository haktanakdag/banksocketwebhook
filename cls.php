<?php
class Socket{

  public function MailGonder($aciklama,$tamam){
    header('Content-Type: text/html; charset=utf-8');
    include_once("PHPMailer/class.phpmailer.php");
    $phpmailer = new PHPMailer;
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.yandex.com'; // duzenlenecek
    $phpmailer->SMTPAuth = true;
    $phpmailer->Username = 'rapor@dokuzsistem.com'; // duzenlenecek
    $phpmailer->Password = 'P@ssw0rd9'; // duzenlenecek
    $phpmailer->SMTPSecure = 'tls'; // duzenlenecek
    $phpmailer->Port = '587'; // duzenlenecek
    $phpmailer->CharSet = "utf-8";
    $phpmailer->From = 'rapor@dokuzsistem.com'; // duzenlenecek
    $phpmailer->FromName = ' Dokuz Sistem Ticket Sistemi'; // duzenlenecek
    //$phpmailer->AddReplyTo($kullanicieposta,$kullaniciadsoyad);
    $phpmailer->addAddress('haktan.akdag@dokuzsistem.com', 'Dokuz SYS Bilgilendirme Servisi'); // duzenlenecek
    $phpmailer->addAddress('erman.yapici@dia.com.tr', 'Dokuz SYS Bilgilendirme Servisi'); // duzenlenecek
    $phpmailer->isHTML(true);
    $phpmailer->Subject = " Dokuz SYS Bilgilendirme Servisi !!! : "." Bank Socket Hareketi.";
    if($tamam=="1"){
        $gorevdurum = " <b>Durum :</b> Dia'ya aktarılmıştır.";
    }else{
        $gorevdurum =" <b>Durum :</b> Dia'ya aktarılamamıştır.";
    }
    $mesaj ="<b>Mesaj Konusu :</b> ".$aciklama."<br>";
    $mesaj =$mesaj. "<br>".$gorevdurum;
    $phpmailer->Body    = $mesaj;
    $phpmailer->CharSet = 'UTF-8';

    //$phpmailer->SMTPDebug = 2;
    if(!$phpmailer->send()) {
       //echo 'Mail gonderilemedi. Hata: ' . $phpmailer->ErrorInfo; 
       exit; 
    } 
    //echo 'Mail gonderildi.'; 
    }
}

?>