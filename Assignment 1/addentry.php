<?php
$xmldoc = new DomDocument('1.0');
$xmldoc->preserveWhiteSpace = false;
$xmldoc->formatOutput       = true;

$name   = $_POST['username'];
$pass   = $_POST['password'];
$mobile = $_POST['mobile'];
$email  = $_POST['email'];
$age    = $_POST['age'];

if($xml = file_get_contents('database.xml'))
{
    $xmldoc->loadXML($xml,LIBXL_NOBLANKS);
    
    $root = $xmldoc->getElementsByTagName('profile')->item(0);
    
    $account = $xmldoc->createElement('account');
    
    $root->insertBefore($account,$root->lastChild);
    
    $nameElement = $xmldoc->createElement('name');
    $account->appendChild($nameElement);
    $nameText = $xmldoc->createTextNode($name);
    $nameElement->appendChild($nameText);
    
    $passElement = $xmldoc->createElement('pass');
    $account->appendChild($passElement);
    $passText = $xmldoc->createTextNode($pass);
    $passElement->appendChild($passText);
    
    $emailElement = $xmldoc->createElement('email');
    $account->appendChild($emailElement);
    $emailText = $xmldoc->createTextNode($email);
    $emailElement->appendChild($emailText);
    
    $mobileElement = $xmldoc->createElement('mobile');
    $account->appendChild($mobileElement);
    $mobileText = $xmldoc->createTextNode($mobile);
    $mobileElement->appendChild($mobileText);
    
    $ageElement = $xmldoc->createElement('age');
    $account->appendChild($ageElement);
    $ageText = $xmldoc->createTextNode($age);
    $ageElement->appendChild($ageText);
    
    $xmldoc->save('database.xml');
}
?>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <h2 style="color: white">Successfully Registered. <a href="index.html"> Login Page</a></h2>
    </body>
</html>