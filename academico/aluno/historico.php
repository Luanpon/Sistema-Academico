<!DOCTYPE html>

<?php  

  session_start();

  $nome = $_SESSION['nomeusuario'];
  $idAluno = $_SESSION['idAluno'];
  $usuario = $_SESSION['usuario'];

  $_SESSION['nomeusuario'] = $nome;
  $_SESSION['idAluno'] = $idAluno;
  $_SESSION['usuario'] = $usuario;

  $conn = mysql_connect("localhost","root","");
  mysql_select_db("academico");

  $sql = "SELECT curso.descricao,aluno.ira FROM curso,aluno WHERE curso.idCurso = aluno.idCurso AND aluno.idAluno=".$idAluno."";
  
  $result = mysql_query($sql,$conn) or die(mysql_error());
  
  if(mysql_num_rows($result)>0){
	  
	  while($row = mysql_fetch_assoc($result)){
		  $curso = $row['descricao'];
		  $ira = $row['ira'];
	  }
	  
  }

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
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-image="">
    	<div class="sidebar-wrapper">
        <div class="logo">
          <h3><b>SISACAD</b></h3>
          <div><img src="imgs/icon.png" class="len"></div>
        </div>
            <ul class="nav">
                <li><a href="inicio.php"><p>Início</p></a></li>
                <li><a href="horario.php"><p>Horário Individual</p></a></li>
                <li><a href="diario.php"><p>Diários</p></a></li>
                <li><a href="boletim.php"><p>Boletim</p></a></li>
                <li class="active"><a href="historico.php"><p>Histórico Escolar</p></a></li>
                <li><a href="matriz.php"><p>Matriz Curricular</p></a></li>
                <li><a href="material.php"><p>Material de Aula</p></a></li>
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
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Cursos<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                              <li><a href="#">Engenharia de Computação</a></li>
                              <li><a href="#">Engenharia de Telecomunicações</a></li>
                              <li><a href="#">Engenharia Civil</a></li>
                              <li><a href="#">Engenharia Elétrica</a></li>
                              <li><a href="#">Engenharia Mecânica</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Área por nível<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                              <li><a href="#">Técnico</a></li>
                              <li><a href="#">Tecnólogo</a></li>
                              <li><a href="#">Graduação</a></li>
                            </ul>
                        </li>
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

                        <h2>Histórico Escolar</h2>

                        <table class="table table-striped" style="width:100%">
                          <thead>
                            <tr>
                              <th>Matricula</th>
                              <th>Nome</th>
                              <th>Curso</th>
                              <th>Matriz Currícular</th>
                              <th>IRA</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><?php echo $usuario; ?></td>
                              <td><?php echo $nome; ?></td>
                              <td><?php echo $curso; ?></td>
                              <td>4231</td>
                              <td><?php echo $ira; ?></td>
                            </tr>
                          </tbody>
                        </table>

                        <h4>Disciplinas cursadas na matriz curricular</h4>

                        <table class="table table-striped" style="width:100%">
                          <thead>
                            <tr>
                              <th>Período</th>
                              <th>Componente Currícular</th>
                              <th>Tipo</th>
                              <th>C.H.</th>
                              <th>Créditos</th>
                              <th>Notas</th>
                              <th>Frequência</th>
                              <th>Situação</th>
                            </tr>

                          </thead>
                          <tbody>

                            <tr>
                              <td>1</td>
                              <td>Cálculo 1</td>
                              <td>OBR</td>
                              <td>80</td>
                              <td>4</td>
                              <td>8,3</td>
                              <td>100</td>
                              <td>Aprovado</td>
                            </tr>

                          </tbody>
                        </table>

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
