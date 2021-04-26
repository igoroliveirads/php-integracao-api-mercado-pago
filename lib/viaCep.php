
  <?php
  
  $address = (object) [
    'cep' => '',
    'logradouro' => '',
    'bairro' => '',
    'localidade' => '',
    'uf' => '',
  ];
  $_SESSION["zip"] ="";
    if ( isset ($_POST['zip'])) {
      $cep = $_POST['zip'];
      $cep = preg_replace('/[^0-9]/','',$cep);
      if (preg_match('/^[0-9]{5}-?[0-9]{3}$/',$cep)) {
        $url = "https://viacep.com.br/ws/{$cep}/json/";
        
        $address = json_decode(file_get_contents($url));     
        $_SESSION["zip"] = $address->cep;
      }else{
        $address->cep = "CEP inválido!";
      }
    }
  
?>
