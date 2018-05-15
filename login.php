<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Missão do Céu - Login</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/signin.css" rel="stylesheet">
	</head>
	<body>
		<div class="container">
			<div class="form-signin" style="background: #42dea4;">
				<h2 class="text-center">Sistema de Solicitação de Voo</h2>
                <h3 class="text-center">Area de Login</h3>
                <h5 class="text-center">Você está entrando em sua área restrita no sistema de solicitação de voos da Missão do Céu. Se ainda não tem seu login, então, por favor, faça o cadastro clicando em  "Crie seu login",  no final da pagina. Se já o tem é só entrar no sistema com seu e-mail e senha.</h5>
				<?php
					if(isset($_SESSION['msg'])){
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
					}
					if(isset($_SESSION['msgcad'])){
						echo $_SESSION['msgcad'];
						unset($_SESSION['msgcad']);
					}
				?>
				<form method="POST" action="valida.php">
					<!--<label>Usuário</label>-->
					<input type="text" name="usuario" placeholder="Digite o seu usuário" class="form-control"><br>
					
					<!--<label>Senha</label>-->
					<input type="password" name="senha" placeholder="Digite a sua senha" class="form-control"><br>
					
					<input type="submit" name="btnLogin" value="Acessar" class="btn btn-success btn-block">
					
					<div class="row text-center" style="margin-top: 20px;"> 
						<h4>Você ainda não possui uma conta?</h4>
						<a href="cadastrar.php">Crie seu login</a>
					</div>
					
					
				</form>
			</div>
		</div>			
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>