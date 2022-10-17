<?php
require_once('classes/autoload.php');
require_once('classes/Database.php');
$DB = new Database();

?>


<!DOCTYPE html>
<html>
<head>
	<title>Search friends</title>
</head>
<body>
	<div>
		<div>
			<form method="GET">
				<label>Nome do usuario</label>
				<input type="text" name="search_query" size="50"><button name="search_btn" type="submit" style="width: 50px;">Buscar</button>
			</form>
		</div><br><br>
		<input id="enter" type="text" value="texto" />
		<?php $DB->search_user();?>
	</div>	
	

</body>
</html>

<script type="text/javascript">
	const inputEle = document.getElementById('enter');
inputEle.addEventListener('keyup', function(e){
  var key = e.which || e.keyCode;
  if (key == 13) { // codigo da tecla enter
    // colocas aqui a tua função a rodar
    alert('carregou enter o valor digitado foi: ' +this.value);
  }
});

</script>