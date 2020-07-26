<?php include_once('./classes_include.php'); ?>
<?php
$post = $_POST;
$dba = new dbClass();
$dba->connect();

if ($post)
foreach ($_POST as $param_name => $param_val) {
    $deger = $deger . "Param: $param_name; Value: $param_val<br />\n";
    if ($param_name =="id"){
        $hareketid = $param_val;
    }
    if ($param_name =="dc"){
        $dc = $param_val;
    }
    if ($param_name =="code"){
        $code = $param_val;
    }
    if ($param_name =="amount"){
        $amount = $param_val;
    }
    if ($param_name =="balance"){
        $balance = $param_val;
    }
    if ($param_name =="currency"){
        $currency = $param_val;
    }
    if ($param_name =="description"){
        $description = $param_val;
    }
    if ($param_name =="account_id"){
        $account_id = $param_val;
    }
    if ($param_name =="account"){
        $account = $param_val;
    }
     if ($param_name =="bank"){
        $bank = $param_val;
    }
            
   
}

$sql = $dba->query("insert into bankahareket(hareketid,dc,code,amount,balance,currency,description,account_id,account,bank) values($hareketid,'$dc','$code',$amount,$balance,'$currency','$description','$account_id','$account','$bank');");
$sonuc = $dba->insert_id($sql);
$socket = new Socket();
$socket->MailGonder($deger,"1");

?>