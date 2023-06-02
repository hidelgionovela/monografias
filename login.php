<?php
session_start();
ob_start();
?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-DOXMLfHhQkvFFp+rWTZwVlPVqdIhpDVYT9csOnHSgWQWPX0v5MCGtjCJbY6ERspU" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
	<link rel="stylesheet" href="static/css/style.css">
	<link rel="shortcut icon" href="/images/icon.png" type="image/x-icon">

	<title>Login</title>
</head>

<body>

	<nav class="navbar navbar-expand-lg bg-dark"><?php include __DIR__ . '/div2.php'; ?></nav><br><br>

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h1>Faca Login como admin</h1>
				<form th:action="" method="post">


					<div class="form-group">
						<label for="username">username : </label> <input id="username" name="username" type="text" class="form-control" required autofocus="autofocus" placeholder="Digite seu username">
					</div>

					<div class="form-group">
						<label for="password">Password : </label> <input id="password" type="password" name="password" class="form-control" required autofocus="autofocus" placeholder="Digite sua Senha">
					</div><br>
					<p class="text-danger">
						<?php
						if (isset($_SESSION['loginError'])) {
							$a = $_SESSION['loginError'];
							echo "$a";
							unset($_SESSION['loginError']);
						}
						?>
					</p>
					<p class="text-danger">
						<?php
						if (isset($_SESSION['msg'])) {
							$a = $_SESSION['msg'];
							echo "$a";
							unset($_SESSION['msg']);
						}
						?>
					</p>

					<div class="form-group">
						<div class="row">
							<div class="col-md-6 col-md-offset-3">
								<input type="submit" class="form-control btn btn-primary" name="login-submit" id="login-submit" value="Login" />
							</div>
						</div>
					</div>
				</form><br>

				<!-- <div class="form-group">
					<span>Se nao tem um username <a th:href="@{/userRegister}">registra - te aqui</a></span>
				</div> -->

			</div>
		</div>
	</div>



	<?php

	include __DIR__ . '/conf/DB.php';

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$dadoss = filter_input_array(INPUT_POST, FILTER_DEFAULT);
		// var_dump($dadoss);

		if ($dadoss['username'] == "") {
			# code...
			echo "Campo email vazio";
			$_SESSION['loginError'] = "O campo email vazio, presisa ser preenchido";
			header("Location: login.php");
			die();
		}

		if ($dadoss['password'] == "") {
			# code...
			echo "Campo password vazio";
			$_SESSION['loginError'] = "O campo password vazio, presisa ser preenchido";
			header("Location: login.php");
			die();
		}


		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$senha = $_POST['password'];
			$data = [
				'username' => $_POST['username']
			];

			//consulta para verificar se o user existe na bd e retornar 1 ou mais caso existe
			$sql = "SELECT * FROM user WHERE username = :username";
			$usuarioExiste = countRow($sql, $data);
			if ($usuarioExiste > 0) {
				//pega os dados do usuario existente
				$dados = readOne($sql, $data);

				//senha vinda da bd
				

				$senhaUser = $dados['senha'];
				// var_dump($senhaUser);
				// var_dump($senha);

				// verifica se a senha da Db e igual inserida e retorna a senha caso verdade
				// retorna null caso senhas incompativeis

				if ($senha === $senhaUser) {
					# code...
					$senhaVerificada = $senhaUser;
					echo "ola Mundo";
					// die();
				} else {
					# code...
					$senhaVerificada = null;
					echo "null";
				}

				//se retornar null da senha significa senhas diferentes
				// retornar para login com messagem de senhas erradas
				if ($senhaVerificada != null) {
					// chegou aqui porque a senha inserida e igual da base dados
					// verificar se existe um usuario com nome, senha e estado activo na base dados
					$sql = "SELECT * FROM user WHERE username = :username AND senha = :senha";
					$data = [
						'username' => $_POST['username'],
						'senha' => $senhaUser
					];

					// se retornar um 1 significa que existe um user activo com 
					// um determinado perfil 
					$contaVerificada = countRow($sql, $data);
					if ($contaVerificada == 1) {

						// pegar os dados desse usuario para poder redirecionar no lugar certo
						$dados = readOne($sql, $data);
						$_SESSION['user_id'] = $dados['id'];

						// if(){
							
						// }else {
						// 	# code...
						// }

						$link =  $_SESSION['ms'];
						unset($_SESSION['ms']);
						header("Location: $link");
						var_dump($dados);
					} else {

						$_SESSION['loginError'] = "Email ou Password incorrectos!";
						header("Location: login.php");
						die();
					}

					
				} else {
					$_SESSION['loginError'] = "Email ou Password incorrectos!";
					header("Location: login.php");
					die();
				}
			} else {
				$_SESSION['loginError'] = "Email ou Password incorrectos!";
				header("Location: login.php");
				die();
			}
		}
	}
	?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>