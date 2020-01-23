<html>
	<head>
		<title>Contador de Linhas de Código</title>
		<style>
			body {
				background: #FFFFFF url("http://arquivo.devmedia.com.br/naoexclusivo/JoelRodrigues/Documentacao/css-background/bg1.jpg") right top fixed;
			}
		</style>
	</head>
	<body>
		<center>
			<h1>Selecione seu código fonte:</h1> 
			<br>
			<form action="#" method="POST" enctype="multipart/form-data">
				<fieldset>
					<legend>ARQUIVO</legend>
						<table cellspacing="10">
							<tr>
								<td>
									<input type="file" name="arquivo">
									<input type="submit" value="CONTAR!">
								</td>
							</tr>
						</table>
				</fieldset>
			</form>
	</center>
	</body>
</html>

<?php
	if(isset($_FILES['arquivo'])){

		$arquivo = $_FILES['arquivo'];
		$contagem = fopen($arquivo['tmp_name'], 'r');		
		$linhas = 0;

		echo "<fieldset>
			<legend>DADOS</legend>
				<table>
					<tr>
						<td>";
		while(!feof($contagem)){
			$linha = fgets($contagem);			
			echo $linha. '<br>';

			if(preg_split('/[\s\r\n\t[:punct:]]/', $linha, -1, PREG_SPLIT_NO_EMPTY)){
				$linhas++;
			}
		}
		echo "</td>
					</tr>
				</table>
			</legend>";
		echo "<fieldset>
			<legend>CONTAGEM</legend>
				<table>
					<tr>
						<td>";
		echo "<center><b><font face='verdana' size='5'>O código fonte escolhido contém <font size='6' color='green'>" .$linhas. "</font><font size='5'> linhas de código efetivo.</font>";
		echo "</td>
					</tr>
				</table>
			</legend>";
	}
?>