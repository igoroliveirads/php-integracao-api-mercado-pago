
  <?php
  // Pré-setamos a variavel addres para nao ocorrer erros
  $address = (object) [
    'cep' => '',
    'logradouro' => '',
    'bairro' => '',
    'localidade' => '',
    'uf' => '',
  ];
  $_SESSION["zip"] ="";
    // É realizado um storage em session do zip para não ocorrer erros
    // E a verificação se alguma subimissão post foi realizada
    if ( isset ($_POST['zip'])) {
      $cep = $_POST['zip'];
      $cep = preg_replace('/[^0-9]/','',$cep);
      if (preg_match('/^[0-9]{5}-?[0-9]{3}$/',$cep)) {
        // Depois de realizada uma verificação por expressão regulares
        // Utilizamos a API com o CEP informado
        $url = "https://viacep.com.br/ws/{$cep}/json/";
        
        $address = json_decode(file_get_contents($url));   
        // Decodificamos e salvamos em session o cep 
        $_SESSION["zip"] = $address->cep;
      }else{
        $address->cep = "CEP inválido!";
      }
    }
  
?>
