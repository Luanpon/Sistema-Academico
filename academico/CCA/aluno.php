<!DOCTYPE html>

<?php
	session_start();
	$mensagem = $_SESSION['mensagem'];
	$_SESSION['mensagem']="";
?>

<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SISACAD sistema academico da cadeira de engenharia de software." />
    <meta name="keywords" content="sistema, academico, engenharia, software" />
    <meta name="author" content="Rubens Barbosa" />
    <link rel="shortcut icon" type="image/x-icon" href="imgs/favicon.png">
    <title>SISACAD</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/aluno.css">
    <link rel="stylesheet" type="text/css" href="css/light-bootstrap-dashboard.css" />
    <link rel="stylesheet" media="all" type="text/css" href="css/826c8a7ccfa5aa3095f443193840923843299023.css">
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-image="">
    	<div class="sidebar-wrapper">
        <div class="logo">
          <h3><b>SISACAD</b></h3>
          <div><img src="imgs/iconcca.png" class="len"></div>
        </div>
            <ul class="nav">
                <li><a href="inicio.php"><p>Início</p></a></li>
                <li class="active"><a href="aluno.php"><p>Cadastrar Aluno</p></a></li>
                <li><a href="professor.php"><p>Cadastrar Professor</p></a></li>
                <li><a href="curso.php"><p>Cadastrar Curso</p></a></li>
                <li><a href="logout.php"><p>Logout</p></a></li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="">Home</a></li>
                        <li><a href="#">Sobre</a></li>
                        <li><a href="#">Contato</a></li>
                    </ul>
                </div>
            </div>
        </nav>

<!-- Inicio do painel -->
<div class="content">
    <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                    <div class="panel">
                      <div class="panel-body txt-block">
						<?php
							
							echo "<h3 align='center'>".
							$mensagem."</h3>";
							
						?>
						
                        <h2>Cadastrar Novo Aluno</h2>
                        <h4>Dados Pessoais</h4>
                        <!-- Formulário -->
                        <form action="processaaluno.php" method="POST" name="form1">
                            <div class="margin-contato">
                                <input type="text" name="nome" class="form-control" placeholder="Nome Completo" required />
                            </div>
                            <div class="margin-contato">
                                <input type="text" name="data" class="form-control" placeholder="Data de Nascimento (aaaa-mm-dd)" required />
                            </div>
                            <div class="margin-contato">
                                <input type="text" name="pai" class="form-control" placeholder="Nome do Pai" required />
                            </div>
                            <div class="margin-contato">
                                <input type="text" name="mae" class="form-control" placeholder="Nome do Mãe" required />
                            </div>
                            <div class="margin-contato">
                                <input type="text" name="sangue" class="form-control" placeholder="Tipo Sanguíneo" required />
                            </div>
                            <div class="margin-contato">
                                <input type="text" name="naturalidade" class="form-control" placeholder="Naturalidade" required />
                            </div>
                            <div class="margin-contato">
                                <input type="text" name="nacionalidade" class="form-control" placeholder="Nacionalidade" required />
                            </div>
                            <div class="margin-contato">
                              <input type="radio" name="gender" value="Masculino" checked> Masculino<br>
                              <input type="radio" name="gender" value="Feminino"> Feminino<br>
                            </div>

                            <h4>Endereço</h4>
                            <div class="margin-contato">
                                <input type="text" name="rua" class="form-control" placeholder="Rua" required />
                            </div>
                            <div class="margin-contato">
                                <input type="text" name="numero" class="form-control" placeholder="Número" required />
                            </div>
                            <div class="margin-contato">
                                <input type="text" name="complemento" class="form-control" placeholder="Complemento" required />
                            </div>
                            <div class="margin-contato">
                                <input type="text" name="bairro" class="form-control" placeholder="Bairro" required />
                            </div>
                            <div class="margin-contato">
                                <input type="text" name="cep" class="form-control" placeholder="CEP" required />
                            </div>
                            <div class="margin-contato">
                                <input type="text" name="cidade" class="form-control" placeholder="Cidade" required />
                            </div>

                            <h4>Contatos</h4>
                            <div class="margin-contato">
                                <input type="text" name="celular" class="form-control" placeholder="Celular" required />
                            </div>
                            <div class="margin-contato">
                                <input type="text" name="email" class="form-control" placeholder="E-mail" required />
                            </div>
                            <div class="margin-contato">
                                <input type="text" name="page" class="form-control" placeholder="Home-Page" required />
                            </div>

                            <h4>Documentos</h4>
                            <div class="margin-contato">
                                <input type="text" name="rg" class="form-control" placeholder="RG" required />
                            </div>
                            <div class="margin-contato">
                                <input type="text" name="cpf" class="form-control" placeholder="CPF" required />
                            </div>
                            <div class="margin-contato">
                                <input type="text" name="titulo" class="form-control" placeholder="Título de Eleitor" required />
                            </div>

                            <h4>Matrícula</h4>
                            <div class="margin-contato">
                                <input type="text" name="curso" class="form-control" placeholder="Nome do Curso" required />
                            </div>
                            <div class="margin-contato">
                                <input type="text" name="turno" class="form-control" placeholder="Turno" required />
                            </div>
							<div class="margin-contato">
                                <input type="text" name="semestreentrada" class="form-control" placeholder="Semestre de Entrada (apenas números)" required />
                            </div>

                            <button class="btn btn-block " type="submit" name="criar"><i class="fa fa-sign-in"></i> Enviar dados do Aluno</button>
							
                        </form>
                      </div>
                    </div>
                  </div>

                <!-- Inicio do rodapé -->
                <footer class="footer">
                    <div class="container-fluid">
                        <p class="copyright text-center txt-block">
                            Copyright &copy; SISACAD 2017.
                        </p>
                    </div>
                </footer>
                <!-- Fim do rodapé -->
            </div>
        </div>
    </div>
</div>

<!-- javascript -->
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="js/javascript.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
