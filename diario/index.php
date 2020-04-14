<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Diario Universal</title>
  <!-- minify -->
  <link href="https://unpkg.com/nes.css@2.3.0/css/nes.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$db_name = "dbdiario";
		$link=mysqli_connect($servername, $username, $password, $db_name);
	?>
  <div class="container">
    <div class="nes-container is-dark with-title is-centered">
      <p class="title">DIARIO UNIVERSAL</p>
      <p>Aqui você pode compartilhar com o mundo seu dia e suas ideias</p>
      <span class="nes-text is-warning">Leia as REGRAS do nosso diario <a href="../termos.html" target="_blank" class="nes-badge zerar"><span class="nes-text is-warning cursor" onclick="termos()">AQUI</span></a></span>
    </div>
  </div>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <div class="nes-container is-rounded" id="container-message">
    <div class="nes-field tamanho">
      <label for="name_field">Digite seu nome:</label>
      <input type="text" id="name_field" class="nes-input" placeholder="Opcional" name="nome">
    </div>
    <div class="textarea">
      <!-- <label for="textarea_field">Textarea</label> -->
      <textarea id="textarea_field" class="nes-textarea" rows="4" name="mensagem"></textarea>
      <button type="submit" class="nes-btn is-primary" name="comentar">Comentar</button>
    </div>
  </div>
</form>
  
<?php


if (isset($_POST['comentar'])):
  $nome=mysqli_escape_string($link, $_POST['nome']);
  date_default_timezone_set('America/Sao_Paulo');
	$data = date('Y-m-d H:i:s');
	$comentario=mysqli_escape_string($link, $_POST['mensagem']);
	if(empty($_POST['nome'])): #insere somente se no form foi escrito o nome
		$nome = 'Anonimo';
	endif;
	$insert = "INSERT INTO tbcomentarios(nome,data,comentario) 
	values('$nome','$data','$comentario')";
	$resultado = mysqli_query($link, $insert);
	header('Location: index.php');
endif;

	


$sql = "SELECT * FROM tbcomentarios ORDER BY id desc";
$executar=mysqli_query($link, $sql);
while( $exibir = mysqli_fetch_array($executar)):
  ?>
    <div class="container-message">
    <section class="nes-container is-dark marginbottom">
        <p class="username"><?php  echo $exibir['nome'];?>: <?php  echo $exibir['data'];?></p>
        <p class="message"><?php  echo $exibir['comentario'];?></p>
    </section>
</section>
</div>
<?php
endwhile;

?>
<script src="../js/verificar.js"></script>
<script src="../js/showConfirm.js"></script>
</body>
</html>