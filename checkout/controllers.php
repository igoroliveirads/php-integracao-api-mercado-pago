<?php
session_start();
require('../config/config.php');
require ('../lib/vendor/autoload.php');

// Primeiro passo é o recolhimento e filtragem de todos os dados do form pelo metodo post

#Variables
$email=filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
$cardNumber=filter_input(INPUT_POST,'cardNumber',FILTER_DEFAULT);
$securityCode=filter_input(INPUT_POST,'securityCode',FILTER_DEFAULT);
$cardExpirationMonth=filter_input(INPUT_POST,'cardExpirationMonth',FILTER_DEFAULT);
$cardExpirationYear=filter_input(INPUT_POST,'cardExpirationYear',FILTER_DEFAULT);
$cardholderName=filter_input(INPUT_POST,'cardholderName',FILTER_DEFAULT);
$docType=filter_input(INPUT_POST,'docType',FILTER_DEFAULT);
$docNumber=filter_input(INPUT_POST,'docNumber',FILTER_DEFAULT);
$installments=filter_input(INPUT_POST,'installments',FILTER_DEFAULT);
$amount=filter_input(INPUT_POST,'amount',FILTER_DEFAULT);
$description=filter_input(INPUT_POST,'description',FILTER_DEFAULT);
$paymentMethodId=filter_input(INPUT_POST,'paymentMethodId',FILTER_DEFAULT);
$token=filter_input(INPUT_POST,'token',FILTER_DEFAULT);


$firstName=filter_input(INPUT_POST,'firstName',FILTER_DEFAULT);
$lastName=filter_input(INPUT_POST,'lastName',FILTER_DEFAULT);
// $zip=filter_input(INPUT_POST,'zip',FILTER_DEFAULT);
$address=filter_input(INPUT_POST,'addr',FILTER_DEFAULT);
$number=filter_input(INPUT_POST,'number',FILTER_DEFAULT);
$complement=filter_input(INPUT_POST,'address2',FILTER_DEFAULT);
$country=filter_input(INPUT_POST,'country',FILTER_DEFAULT);
$state=filter_input(INPUT_POST,'state',FILTER_DEFAULT);

$infos = [
    'firstName'=> $firstName,
    'lastname'=> $lastName,
    'zip' => $_SESSION["zip"],
    'email' => $email,
    'address' => $address,
    'number' => $number,
    'complement' => $complement,
    'country'=> $country,
    'state'=> $state,
    'price'=> $amount,
    'parcelas'=> $installments]; 

// Guardamos as informações em session para serem utilizadas depois 
$_SESSION['infos']=$infos;

#Method
// Aqui onde a requisição de pagamento é feito ja levando as informações necessarias e realizando o pagamento
// Retornando um todas as informações posiveis da transação
// Necessitamos criar um objeto tipo payment, passar as informações e chamar a função save onde a requisição realizada 
MercadoPago\SDK::setAccessToken(SAND_TOKEN);
$payment = new MercadoPago\Payment();
$payment->transaction_amount = $amount;
$payment->token = $token;
$payment->description = $description;
$payment->installments = $installments;
$payment->payment_method_id = $paymentMethodId;
$payment->payer = array(
    "email" => $email
);
$payment->save();

#Result
$_SESSION['payment']=$payment;
header("location: http://localhost/api/checkout/result.php");

//echo '<pre>',print_r($payment),'</pre>';
?>