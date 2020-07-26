<?php include_once('../classes_include.php'); ?>
<?php




if ($islem =='maildegistir'){
        $admin =new Admin();
	$guncelleme = $admin->MailDegistir($mail);
        if($guncelleme){
            echo "Güncelleme Başarılı";
        }else{
            echo "Teknik Bir Sorun Oluştu";
        }
}

if ($islem =='sifredegistir'){
    $admin = new Admin();
    $guncelleme = $admin->SifreDegistir($sifre);
    if($guncelleme){
        echo "Güncelleme Başarılı";
    }else{
        echo "Teknik Bir Sorun Oluştu";
    }
}



?>
