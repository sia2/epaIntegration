
<h1>ON EST A LA MAISON</h1>
                    <?php
                    include_once('function.php');
// lire le formulaire provenant du système PayPal et ajouter 'cmd'
    $req = 'cmd=_notify-validate';
   
    foreach ($_POST as $key => $value) {
        $value = urlencode(stripslashes($value));
        $req .= "&$key=$value";
    }
     
    // renvoyer au système PayPal pour validation
 // post back to PayPal system to validate
$header .= "POST /cgi-bin/webscr HTTP/1.1\r\n";
$header .= "Host: www.sandbox.paypal.com\r\n";
$header .= "Connection: close\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);
    
    $item_name = $_POST['item_name'];
    echo $_POST['item_name'].'<br/>';
    $item_number = $_POST['item_number'];
    echo $item_number.'<br/>';
    $payment_status = $_POST['payment_status'];
    echo $payment_status.'<br/>';
    $payment_amount = $_POST['mc_gross'];
    echo $payment_amount.'<br/>';
    $payment_currency = $_POST['mc_currency'];
    echo $payment_currency.'<br/>';
    $txn_id = $_POST['txn_id'];
    echo $txn_id.'<br/>';
    $receiver_email = $_POST['receiver_email'];
    echo $receiver_email.'<br/>';
    $payer_email = $_POST['payer_email'];
    echo$payer_email.'<br/>';
    $id_user = $_POST['custom'];
    echo $id_user.'<br/>';
    $prenom = $_POST['first_name'];
    echo $prenom.'<br/>';
    $nom = $_POST['last_name'];
    echo $nom.'<br/>';
    $adresse = $_POST['address_street'];
    echo $adresse.'<br/>';
    $cp = $_POST['address_zip'];
    echo $cp.'<br/>';
    $city = $_POST['address_city'];
    echo $city.'<br/>';
    $phone = $_POST['contact_phone'];
    echo $phone.'<br/>';
    $etat = $_POST['pending_reason'];
    echo $etat.'<br/>';
    echo'fin des informations';
    if (!$fp) {
    } else {
        fputs ($fp, $header . $req);
        while (!feof($fp)) {
            $res = fgets ($fp, 1024);
            if (strcmp (trim($res), "VERIFIED") == 0){
                 if(strcmp (trim($payment_status),"Completed")==0 )
                 {
                   
                 }
                 else if (strcmp (trim($payment_status),"Pending")==0 && strcmp (trim($etat),"paymentreview")==0)
                 {
                     enregistrerDon(11, 11, $payment_amount, $payer_email, 11, 11);
                 }
            }
            else if (strcmp(trim($res), "INVALID") == 0) {
            
        } 
        
    }
        fclose ($fp);
    }

?>