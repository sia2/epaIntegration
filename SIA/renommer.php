<?php
require_once './const.php';
require_once './MysqlManager.php';

function mail_attachment($filename, $path, $mailto, $from_mail, $from_name, $replyto, $subject, $message) {
    $file = $path;
    $file_size = filesize($file);
    $handle = fopen($file, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $content = chunk_split(base64_encode($content));
    $uid = md5(uniqid(time()));
    $header = "From: <".$from_mail.">\r\n";
    $header .= "Reply-To: ".$from_mail."\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
    $header .= "This is a multi-part message in MIME format.\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
    $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $header .= $message."\r\n\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"; // use different content types here
    $header .= "Content-Transfer-Encoding: base64\r\n";
    $header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
    $header .= $content."\r\n\r\n";
    $header .= "--".$uid."--";
    if (mail($mailto, $subject, "", $header)) {
        header("Location: test.php"); // or use booleans here
    } else {
        echo "mail send ... ERROR!";
    }
}

$id=$_GET["id"];
$mysqli = new mysqli($HOST_NAME, $USER_NAME, $PASSWORD_NAME, $DB_NAME);
$resultat = $mysqli->query ("SELECT * FROM `Test_Salim`.`FICHIER` WHERE `Test_Salim`.`FICHIER`.`id` = '".$id."'");
$ligne = $resultat->fetch_assoc();
$my_file = $ligne["nom"];
$my_path = $ligne["chemin"];
$my_name = "Olaf Lederer";
$my_mail = "sderghoum@gmail.com";
$my_replyto = "salimder@hotmail.fr";
$my_subject = "Ordre du jour";
$my_message = "Hello,\r\n voici l'ordre ci joint .\r\n\r\ngr. Olaf";
mail_attachment( $ligne["nom"], $ligne["cheminSupp"], "salimder@hotmail.fr", $my_mail, $my_name, $my_replyto, $my_subject, $my_message);

?>
