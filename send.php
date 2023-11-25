<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'secretphp/lockSecretphp.php';

$test = 'Cher(e) '.@$_POST["name"]."
<br>Je tenais à vous remercier chaleureusement pour l'intérêt que vous portez à
notre entreprise de rédaction en ligne, Calame Rédaction. En tant que rédactrice,
je suis ravie de savoir que notre site web a su capter votre attention et que vous avez décidé
de nous contacter.<br>
Je viens de recevoir votre message et je tiens à vous assurer que nous y porterons
toute notre attention. Calame Redaction est prêt à vous aider dans tous vos besoins de rédaction,
qu'il s'agisse de la création de contenus pour votre site web, de la rédaction de
documents professionnels ou de la correction de textes.
<br> N'hésitez pas à nous faire part de vos besoins spécifiques,
nous sommes là pour vous aider. Et si vous avez des questions supplémentaires,
je me tiens à votre disposition pour y répondre.<br>
Veuillez noter que ceci est un message automatique et qu'il n'est pas nécessaire d'y répondre.
Toutefois,soyez assuré(e) que nous prendrons le temps de vous répondre personnellement
dès que possible.
<br>
Encore une fois, merci de l'intérêt que vous portez à Calame Rédaction.
Nous avons hâte de travailler avec vous et de vous aider à atteindre vos objectifs.
<br>
Cordialement <br> <br>
L'équipe de Calame Rédaction";
$Calame = 'fabricejordanramos@esp.sn';
$subject = "Un client de Calame tente de vous contacter";
$subject2 = "Merci de votre intérêt pour Calame Rédaction !";
if (isset($_POST["send"])) {
    $mail = new PHPMailer(true);
    $mail2= new PHPMailer(true);

    $mail->isSMTP();
    $mail2->isSMTP();

//contacte l'admin
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true ;
    $mail->Username = 'calameredactionclient@gmail.com';
    $mail->Password = EMAIL_PASSWORD;
    $mail->SMTPSecure = 'ssl';
    $mail->CharSet = 'UTF-8';
    $mail->Port = 465;

    $mail->setFrom('calameredactionclient@gmail.com');

    $mail->addAddress($Calame);

    $mail->isHTML(true);

    $mail->Subject =  $subject;
    $mail->Body = $_POST["email"]." du nom de ".$_POST["name"]." vous a envoyer le nessage suivant : <br> " .  $_POST["message"];

    $mail->send();
// contacte le client

    $mail2->Host = 'smtp.gmail.com';
    $mail2->SMTPAuth = true ;
    $mail2->Username = 'calameredactionclient@gmail.com';
    $mail2->Password = EMAIL_PASSWORD;
    $mail2->SMTPSecure = 'ssl';
    $mail2->CharSet = 'UTF-8';
    $mail2->Port = 465;

    $mail2->setFrom('calameredactionclient@gmail.com');

    $mail2->addAddress($_POST["email"]);

    $mail2->isHTML(true);

    $mail2->Subject = $subject2;
    $mail2->Body = $test;

    $mail2->send();
    echo
    "
    <script>
    alert ('Nous avons recus votre message, nous vous reconctacterons dans les plus brefs délais');
    document.location.href = 'index.html' ;
    </script>
    ";
}else {
    header("location:index.html");
}
?>