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
                <li><a href="aluno.php"><p>Cadastrar Aluno</p></a></li>
                <li><a href="professor.php"><p>Cadastrar Professor</p></a></li>
                <li class="active"><a href="curso.php"><p>Cadastrar Curso</p></a></li>
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
                        <h2>Cadastrar Novo Curso</h2>
                        <h4>Dados do Curso</h4>
                        <!-- Formulário -->
                        <form action="processacurso.php" method="POST" name="form1">
                            <div class="margin-contato">
                                <input type="text" name="nome" class="form-control" placeholder="Nome" required />
                            </div>
                            <div class="margin-contato">
                                <input type="text" name="coordenador" class="form-control" placeholder="Matricula do Coordenador" required />
                            </div>
                            <div class="margin-contato">
                                <input type="text" name="dpto" class="form-control" placeholder="Departamento" required />
                            </div>
                            <div class="margin-contato">
                                <input type="text" name="nivel" class="form-control" placeholder="Nivel" required />
                            </div>

                            <h4>Matriz Currícular</h4>
                            <div class="margin-contato">
                                <input type="text" name="semestre" class="form-control" placeholder="Semestre" required />
                            </div>
                            <div class="margin-contato">
                                <input type="text" name="componente" class="form-control" placeholder="Componente Currícular" required />
                            </div>
                            <div class="margin-contato">
                                <input type="text" name="ch" class="form-control" placeholder="Carga Horária" required />
                            </div>
                            <div class="margin-contato">
                                <input type="text" name="prereq" class="form-control" placeholder="Pré-requisito (caso não possua pré-requisito digite 0)" required />
                            </div>
							<div class="margin-contato">
                                <input type="text" name="professor" class="form-control" placeholder="Matricula do Professor" required />
                            </div>

                            <button class="btn btn-block " type="submit" name="criar"><i class="fa fa-sign-in"></i> Enviar dados do Curso</button>
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
