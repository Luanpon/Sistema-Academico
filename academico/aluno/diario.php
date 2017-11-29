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

 $sql = "SELECT turma.idTurma, aluno.idAluno, turma.anoSemestre
	FROM turma
    LEFT JOIN turmaaluno ON turmaaluno.Turma_idTurma = turma.idTurma
    LEFT JOIN aluno ON turmaaluno.Aluno_idAluno = aluno.idAluno
	WHERE (turma.anoSemestre = ( SELECT MAX(calendario.semestre) FROM calendario) )
	AND (aluno.idAluno=".$idAluno.")";
  
  $result = mysql_query($sql,$conn) or die(mysql_error());

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
                <li class="active"><a href="diario.php"><p>Diários</p></a></li>
                <li><a href="boletim.php"><p>Boletim</p></a></li>
                <li><a href="historico.php"><p>Histórico Escolar</p></a></li>
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

                          <h2>Diários</h2>
                          <h4>Aluno: <?php echo $nome; ?><h4>

                          <?php  

                          $lista = array();

                          if(mysql_num_rows($result)>0){

                            while ($row = mysql_fetch_assoc($result)) {

                              $idTurma = $row['idTurma'];

                              $sql2 = "SELECT professor.nome, disciplina.descricao, disciplina.cargaHoraria, disciplina.quantCreditos, frequencia.data_2, frequencia.presente, frequencia.conteudoaula, aluno.idAluno, turma.idTurma
                                FROM turma
                                LEFT JOIN disciplinacurso ON turma.DisciplinaCurso_Disciplina_idDisciplina = disciplinacurso.Disciplina_idDisciplina AND turma.DisciplinaCurso_Curso_idCurso = disciplinacurso.Curso_idCurso AND turma.DisciplinaCurso_Professor_idProfessor = disciplinacurso.Professor_idProfessor
                              LEFT JOIN disciplina ON disciplinacurso.Disciplina_idDisciplina = disciplina.idDisciplina
                              LEFT JOIN professor ON disciplinacurso.Professor_idProfessor = professor.idProfessor
                              LEFT JOIN ementa ON ementa.Disciplina_idDisciplina = disciplina.idDisciplina
                              LEFT JOIN prerequisitodisciplina ON prerequisitodisciplina.Disciplina_idDisciplina = disciplina.idDisciplina
                              LEFT JOIN turmaaluno ON turmaaluno.Turma_idTurma = turma.idTurma
                              LEFT JOIN aluno ON turmaaluno.Aluno_idAluno = aluno.idAluno
                              LEFT JOIN frequencia ON frequencia.TurmaAluno_Turma_idTurma = turmaaluno.Turma_idTurma AND frequencia.TurmaAluno_Aluno_idAluno = turmaaluno.Aluno_idAluno
                              LEFT JOIN historico ON historico.Aluno_idAluno = aluno.idAluno
                              WHERE ((aluno.idAluno =".$idAluno.") AND (turma.idTurma =".$idTurma."))";

                              $result2 = mysql_query($sql2,$conn) or die(mysql_error());

                              $lista2  = array();

                              if(mysql_num_rows($result2)>0){

                                while($row2 = mysql_fetch_assoc($result2)){

                                  array_push($lista2, $row2);

                                }

                              }
							  
							  array_push($lista,$lista2);
                            
                            }


                          }


                          ?>

                          <?php $tfaltas = 0;
						  $percpres = 100;
						  $aulasmin = 0;
						  
						  foreach($lista as $value){ ?>

                          <table style="width:100%">
                          <tr>
                          <th><h5><b><?php echo $value[0]['descricao']; ?> - <?php echo $value[0]['nome']; ?> ( <?php echo $value[0]['cargaHoraria']; ?> horas )
						  </b></h5></th>
						  <th>
						  
						  <?php foreach($value as $value2){ 
								
								if($value2['presente']==0 && $value2['presente']!=NULL){
									$tfaltas +=2;
								}
								
								if($value2['data_2']!=NULL){
									$aulasmin +=2;
								}
							  
						  }; 
						  
						  $percpres = ((($value[0]['cargaHoraria'])-$tfaltas)*100)/($value[0]['cargaHoraria']);
						  
						  ?>
						  
						  <table style="width:100%">
						  
						  <tr>
							<th>Total de Creditos</th>
							<td><?php echo $value[0]['quantCreditos']; ?></td>
                          </tr>
						  
						  <tr>
							<th>Faltas</th>
							<td><?php echo $tfaltas; ?></td>
                          </tr>
						  
						  <tr>
							<th>Percentual de Presença</th>
							<td><?php echo $percpres; ?></td>
                          </tr>
						  
						  <tr>
						    <th>Aulas Ministradas </th>
							<td><?php echo $aulasmin; ?></td>
                          </tr>
						  
						  </table>
						  
						  <th>
                          </tr>
                          </table>
						  
						  <table style="width:100%">
						  
						  <tr>
							<th>Data</th>
							<th>Conteudo</th>
							<th>Presente</th>
						  </tr>
						  
						  <?php foreach($value as $value2){ 
							
							if($value2['data_2']!=NULL){
						  
						  ?>
						  
						  <tr>
						  
							<td><?php echo $value2['data_2']; ?></td>
						    <td><?php echo $value2['conteudoaula']; ?></td>
							<td><?php $sn = $value2['presente']; 
							
							if($sn==1){
								echo "SIM";
							}
							else{
								echo "NÃO";
							}
							
							?></td>
							
						  </tr>
						  
						  <?php }}; ?>
						
						  </table>
						  <br>
						  
						  <?php $tfaltas=0;
						  $percpres = 100;
						  $aulasmin = 0;
						  ?>

                          <?php }; ?>


                          <!-- Finalizar o diário -->

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
