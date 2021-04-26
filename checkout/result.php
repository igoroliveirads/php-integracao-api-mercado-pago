<?php

use Doctrine\Common\Collections\Expr\Value;

require('../lib/vendor/autoload.php');
$exception=new \Classes\ClassException();
session_start();

$info = $_SESSION['infos'];
$status = $_SESSION['payment'];
// $price = $info['price']/$info['parcelas'];
// print_r($info)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SlumberShop</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">

    <style>
        .result{display: grid; width: 100%; justify-items: center;}
            .success{width: 50%; background: #77c563; border-radius: 5px; padding: 10px; text-align: center;}
            .alert{width: 50%; background: #ff544d; border-radius: 5px; padding: 10px; text-align: center;}
            .error{width: 50%; background: #ffd809; border-radius: 5px; padding: 10px; text-align: center;}
    </style>
</head>

<body class="bg-light">
<div class="container">
      <div class="py-5 text-center">
        <h2> Status:</h2>
      </div>
    <div class="card">
    <h4>Cliente: </h4>
    <h7><?php echo $info['firstName']." ".$info['lastname']."; ".$status->card->cardholder->identification->type." : ".$status->card->cardholder->identification->number ?></h7>
    <h4>Endereço: </h4>
    <h7><?php echo "Rua: ".$info['address'].", ".$info['number'] ?></h7>
    <h7><?php echo "Complemento: ".$info['complement']." Cep: ".$info['zip']?> </h7>
    <h7><?php echo "Estado: ".$info['state'].", ".$info['country'] ?></h7>
    <h4>Valor: </h4>
    <h7><?php echo $info['parcelas']."X de ".$status->transaction_details->installment_amount." R$ ( ".$status->transaction_details->total_paid_amount." R$ )" ?></h7>

    </div>
    <div class="result">
    <!-- <?php echo '<pre>',print_r($_SESSION['payment']),'</pre>'; ?> -->
        <?php $exception->setPayment($_SESSION['payment']); ?>
        <div class="<?php echo $exception->verifyTransaction()['class']; ?>">
            <?php echo $exception->verifyTransaction()['message']; ?>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
        ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

</body>

</html>