<!DOCTYPE html>

<?php
	session_start();
	if(isset($_SESSION['mensagem'])){
		$mensagem = $_SESSION['mensagem'];
		session_destroy();
	}
	else{
		$mensagem="";
	}


?>


<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SISACAD sistema academico da cadeira de engenharia de software." />
    <meta name="keywords" content="sistema, academico, SISACAD" />
    <meta name="author" content="Rubens Barbosa" />
    <link rel="shortcut icon" type="image/x-icon" href="imgs/favicon.png">
    <title>SISACAD</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" media="all" type="text/css" href="css/826c8a7ccfa5aa3095f443193840923843299023f.css">
  </head>
  <body>

    <div class="jumbotron text-center">
      <div><img src="imgs/icon.png" class=""></div>
        <h1>Sistema Acadêmico</h1>
        <p>Bem vindo ao <b>SISACAD</b></p>
    </div>

    <div class="container login-form">
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="processa.php" method="POST" name="form1">
                    <h2 class="login-title">Login</h2>
					<h2 align='center'><?php
					echo "<font color='red'>".
					$mensagem.
					"</font>";
					?><h2>
                    <div class="margin-contato">
                        <input type="text" name="login" id="login" class="form-control" placeholder="Usuário" required />
                    </div>
                    <div class="margin-contato">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Senha" required />
                    </div>
                    <button class="btn btn-primary btn-block login-button" type="submit" name="criar"><i class="fa fa-sign-in"></i> Entrar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </body>
<html>
