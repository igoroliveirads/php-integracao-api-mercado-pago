<?php

use Doctrine\Common\Collections\Expr\Value;


// Aqui puxamos as informações necessarias para amostragem do status
require('../lib/vendor/autoload.php');
$exception=new \Classes\ClassException();
session_start();

$info = $_SESSION['infos'];
$status = $_SESSION['payment'];
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
    <!-- É criada class para cada caso possivel -->
    <style>
        .result{display: grid; width: 100%; justify-items: center;}
            .success{width: 50%; background: #77c563; border-radius: 5px; padding: 10px; text-align: center;}
            .alert{width: 50%; background: #ff544d; border-radius: 5px; padding: 10px; text-align: center;}
            .error{width: 50%; background: #ffd809; border-radius: 5px; padding: 10px; text-align: center;}
    </style>
</head>
<body class="bg-light">
<div
      class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm"
    >
      <h5 class="my-0 mr-md-auto font-weight-normal">SlumberShop</h5>
      <a
        class="btn btn-outline-primary"
        href="http://localhost/php-integracao-api-mercado-pago/"
        >Home</a
      >
    </div>
<div class="container">
      <div class="py-5 text-center">
        <h2> Status:</h2>
      </div>
      <!-- Primeiramente é mostrado as informações passadas pelo cliente -->
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
    <!-- E depois o Resultado da transação -->
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
<footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 Company Name</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>

</html>