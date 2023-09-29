<?php
	session_start(); // Inicie a sessão

	if (isset($_SESSION['login_incorreto']) && $_SESSION['login_incorreto'] === true) {
		echo "<script> alert('Usuário ou senha incorreto.')</script>";
		$_SESSION['login_incorreto'] = false; // Defina a variável de sessão como false após exibir o alerta
	}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../css/p_login.css">
	<link rel="stylesheet" type="text/css" href="../css/navbar_TC.css">

	<!-- Configuração de media query-->
	<script src="php/conexao/conexaoBD.php"></script>
	<script src="php/classes/usuarios.php"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- ÍCONES -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- JavaScript -->
	<script type="text/javascript" src="../js/mudar-tema.js" defer=""></script>

	<title>Página de Login</title>
</head>

<body class="tema-claro" id="body">
	<div class="icone-mudar-tema" onclick="trocarTema()">
		<i id="mode-icon" class="fa-solid fa-moon"></i>
	</div>	
	
	<fieldset class="caixa">
		<h1>MonitoraLab</h1>
		<form method="post" action="../php/classes/usuarios.php" class="Forms">
			<label>Entrar como:</label>
			
			<!-- <br> -->
			<select name="identificacao" class="Select">
				<option value="Selec"> Selecione</option>
				<option value="Dir"> Diretoria</option>
				<option value="Prof"> Professor</option> 
				<option value="Mon"> Monitor</option>
			</select>
			<!-- <br> -->

			<label>Login:</label>
			<input class="Txt" type="text" name="login" placeholder="Digite aqui" required>
			<!-- <br><br> -->
			<label>Senha:</label>
			<input class="Txt" type="password" name="senha" placeholder="Digite aqui" required>
			<!-- <br><br> -->
			<div class="Botao">
				<button type="submit" id="Btn" name="entrar">Entrar</button>
			</div>
		</form>
	</fieldset>
</body>
</html>