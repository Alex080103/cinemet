<?php

// Paramètres SMTP de Gmail
$smtpHost = "smtp.gmail.com";
$smtpPort = 22;
$smtpUsername = "derrire.alexandre0103@gmail.com";
$smtpPassword = "Gh9uzxk08";
var_dump ($_POST['name']);


if (isset($_POST['name']) & isset($_POST['email']) & isset($_POST['message'])) {

  $mailTo = $_POST['email'];
  $name = $_POST['name'];
  $message = $_POST['message'];

  var_dump($mailTo);

  // Destinataire et expéditeur
  $to = "derrire.alexandre0103@gmail.com";
  $from = "$mailTo";

  // Sujet et message

  // Headers
  $headers = "From: $from\r\n";
  $headers .= "Reply-To: $from\r\n";
  $headers .= "Content-Type: text/html\r\n";

  // Envoi du message
  if (mail($to, $message, $headers, "-f $from", "-r $from -f $from", "-r $from")) {
      echo "Message envoyé avec succès.";
  } else {
      echo "Erreur lors de l'envoi du message.";
  }
  } else {
    header('Location: ../index.php'); 
    exit();
}
?>
