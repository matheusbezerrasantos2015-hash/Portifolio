<?php
// RECEIVING EMAIL
$receiving_email_address = 'matheusbezerra7gbs@gmail.com';

if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    require($php_email_form);
} else {
    die('Unable to load PHP Email Form Library!');
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

// SMTP CONFIG - GMAIL
$contact->smtp = array(
'host' => 'smtp.gmail.com',
'username' => 'matheusbezerra7gbs@gmail.com',
'password' => 'bylnuxpteqowzxlj', // coloque a senha de app do Gmail
'port' => '587',
'secure' => 'tls'
);

// FORM DATA
$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = "Novo contato do site";

// EMAIL BODY
$contact->add_message($_POST['name'], 'Nome');
$contact->add_message($_POST['email'], 'Email');
if (!empty($_POST['phone'])) {
    $contact->add_message($_POST['phone'], 'Telefone');
}
$contact->add_message($_POST['message'], 'Mensagem', 10);

// SEND
echo $contact->send();
?>
