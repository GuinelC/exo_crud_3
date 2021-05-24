
<!-- Envoi de Mail -->

<?php
$name = 'charly';
$to      = 'nobody@example.com'; // Destinataire du msg
$subject = 'the subject'; // sujet
$message = file_get_contents("monMail.php?name=$name"); // msg
$headers = array(
    'From' => 'webmaster@example.com', // l'expediteur du msg
    'Reply-To' => 'webmaster@example.com',
    'X-Mailer' => 'PHP/' . phpversion()
);

mail($to, $subject, $message, $headers);
?>