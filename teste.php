<form method='post' action= 'http://localhost/app_locadora_carros/public/api/marca'>
	<input type="text" name="nome">
	<input type="text" name="imagem">
	<button type="submit">enviar</button>
</form>

<?php

$json_url = "http://localhost/app_locadora_carros/public/api/marca";
    $json     = file_get_contents($json_url);
   
        $data = json_decode($json);

        foreach($data as $value) {
  		$dados =  $value->nome.'<br>';
  		echo $dados;
}
        




?>

