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

  $sql = "SELECT turma.idTurma, aluno.idAluno, turma.anoSemestre, disciplina.descricao, disciplina.cargaHoraria
	FROM turma
    LEFT JOIN turmaaluno ON turmaaluno.Turma_idTurma = turma.idTurma
    LEFT JOIN aluno ON turmaaluno.Aluno_idAluno = aluno.idAluno
    LEFT JOIN disciplinacurso ON turma.DisciplinaCurso_Disciplina_idDisciplina = disciplinacurso.Disciplina_idDisciplina AND turma.DisciplinaCurso_Curso_idCurso = disciplinacurso.Curso_idCurso AND turma.DisciplinaCurso_Professor_idProfessor = disciplinacurso.Professor_idProfessor
    LEFT JOIN disciplina ON disciplinacurso.Disciplina_idDisciplina = disciplina.idDisciplina
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
                <li><a href="diario.php"><p>Diários</p></a></li>
                <li class="active"><a href="boletim.php"><p>Boletim</p></a></li>
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

                          <h2>Boletim</h2>
                          <h3>Estrutura de Curso - Vigente - Graduação</h3>
                          <h4><?php echo $usuario; ?> - <?php echo $nome; ?></h4>
						  
						  <table style="width:100%">
                          <tr>
                            <th>Componente Curricular</th>
                            <th>CH</th>
                            <th>T. Faltas</th>
							<th>N1</th>
                            <th>Faltas N1</th>
                            <th>N2</th>
                            <th>Faltas N2</th>
                            <th>Média Parcial</th>
                            <th>Prova Final</th>
                            <th>Média Final</th>
                            <th>Situação</th>
                          </tr>
						  
						  <?php 
							
							if(mysql_num_rows($result)>0){
								
								$lista = array();
								
								while($row = mysql_fetch_assoc($result)){
									
									$idTurma = $row['idTurma'];
									
									$n1 = array();
									$n2 = array();
									$faltasn1 = 0;
									$faltasn2 = 0;
									
									// notas n1 
									
									$sql2 = "SELECT aluno.idAluno, turma.idTurma, prova.idProva, prova.data_2, nota.Valor FROM turma LEFT JOIN 
									prova ON prova.Turma_idTurma = turma.idTurma LEFT JOIN nota ON nota.Prova_idProva = 
									prova.idProva AND nota.Prova_Turma_idTurma = prova.Turma_idTurma LEFT JOIN aluno ON nota.Aluno_idAluno = aluno.idAluno 
									WHERE aluno.idAluno=".$idAluno." AND turma.idTurma=".$idTurma." 
									AND prova.data_2>=(SELECT calendario.datainicio FROM calendario WHERE calendario.semestre = 
									( SELECT MAX(calendario.semestre) FROM calendario ) ) 
									AND prova.data_2< (SELECT DATE_ADD(calendario.datainicio, INTERVAL 
									(SELECT DATEDIFF(calendario.datafim,calendario.datainicio)/2 FROM calendario WHERE calendario.semestre=
									(SELECT MAX(calendario.semestre) FROM calendario)) day) FROM calendario WHERE calendario.semestre = 
									(SELECT MAX(calendario.semestre) FROM calendario))";
									
									$result2 = mysql_query($sql2,$conn) or die(mysql_error());
									
									if(mysql_num_rows($result2)>0){
										
										while($row2 = mysql_fetch_assoc($result2)){
											
											array_push($n1,$row2['Valor']);
											
										}
										
									}
									
									// notas n2 
									
									$sql3 = "SELECT aluno.idAluno, turma.idTurma, prova.idProva, prova.data_2, nota.Valor FROM turma LEFT JOIN 
									prova ON prova.Turma_idTurma = turma.idTurma LEFT JOIN nota ON nota.Prova_idProva = 
									prova.idProva AND nota.Prova_Turma_idTurma = prova.Turma_idTurma LEFT JOIN aluno ON nota.Aluno_idAluno = aluno.idAluno 
									WHERE aluno.idAluno=".$idAluno." AND turma.idTurma=".$idTurma." 
									AND prova.data_2<=(SELECT calendario.datafim FROM calendario WHERE calendario.semestre = 
									( SELECT MAX(calendario.semestre) FROM calendario ) ) 
									AND prova.data_2>= (SELECT DATE_ADD(calendario.datainicio, INTERVAL 
									(SELECT DATEDIFF(calendario.datafim,calendario.datainicio)/2 FROM calendario WHERE calendario.semestre=
									(SELECT MAX(calendario.semestre) FROM calendario)) day) FROM calendario WHERE calendario.semestre = 
									(SELECT MAX(calendario.semestre) FROM calendario))";
									
									$result3 = mysql_query($sql3,$conn) or die (mysql_error());
									
									if(mysql_num_rows($result3)>0){
										
										while($row3 = mysql_fetch_assoc($result3)){
											
											array_push($n2,$row3['Valor']);
											
										}
										
									}
									
									// frequencia n1 
									
									$sql4 = "SELECT aluno.idAluno, turma.idTurma, frequencia.data_2, frequencia.presente
									FROM aluno
									LEFT JOIN turmaaluno ON turmaaluno.Aluno_idAluno = aluno.idAluno
									LEFT JOIN frequencia ON frequencia.TurmaAluno_Turma_idTurma = 
									turmaaluno.Turma_idTurma AND frequencia.TurmaAluno_Aluno_idAluno = turmaaluno.Aluno_idAluno
									LEFT JOIN turma ON turmaaluno.Turma_idTurma = turma.idTurma
									WHERE aluno.idAluno=".$idAluno." AND turma.idTurma=".$idTurma." 
									AND frequencia.data_2>=(SELECT calendario.datainicio FROM calendario WHERE calendario.semestre = 
									( SELECT MAX(calendario.semestre) FROM calendario ) ) 
									AND frequencia.data_2< (SELECT DATE_ADD(calendario.datainicio, INTERVAL 
									(SELECT DATEDIFF(calendario.datafim,calendario.datainicio)/2 FROM calendario WHERE calendario.semestre=
									(SELECT MAX(calendario.semestre) FROM calendario)) day) FROM calendario WHERE calendario.semestre = 
									(SELECT MAX(calendario.semestre) FROM calendario))";
									
									$result4 = mysql_query($sql4,$conn) or die(mysql_error());
									
									if(mysql_num_rows($result4)>0){
										
										while($row4 = mysql_fetch_assoc($result4)){
											
											if($row4['presente']==0){
												$faltasn1 += 2;
											}
											
										}
										
									}
									
									// frequencia n2
									
									$sql5 = "SELECT aluno.idAluno, turma.idTurma, frequencia.data_2, frequencia.presente
									FROM aluno
									LEFT JOIN turmaaluno ON turmaaluno.Aluno_idAluno = aluno.idAluno
									LEFT JOIN frequencia ON frequencia.TurmaAluno_Turma_idTurma = 
									turmaaluno.Turma_idTurma AND frequencia.TurmaAluno_Aluno_idAluno = turmaaluno.Aluno_idAluno
									LEFT JOIN turma ON turmaaluno.Turma_idTurma = turma.idTurma
									WHERE aluno.idAluno=".$idAluno." AND turma.idTurma=".$idTurma." 
									AND frequencia.data_2<=(SELECT calendario.datafim FROM calendario WHERE calendario.semestre = 
									( SELECT MAX(calendario.semestre) FROM calendario ) ) 
									AND frequencia.data_2>= (SELECT DATE_ADD(calendario.datainicio, INTERVAL 
									(SELECT DATEDIFF(calendario.datafim,calendario.datainicio)/2 FROM calendario WHERE calendario.semestre=
									(SELECT MAX(calendario.semestre) FROM calendario)) day) FROM calendario WHERE calendario.semestre = 
									(SELECT MAX(calendario.semestre) FROM calendario))";
									
									$result5 = mysql_query($sql5,$conn) or die (mysql_error());
									
									if(mysql_num_rows($result5)>0){
										
										while($row5 = mysql_fetch_assoc($result5)){
											
											if($row5['presente']==0){
												$faltasn2 += 2;
											}
											
										}
										
									}
									
									// calculos n1 
									$tnotasn1 = count($n1);
									$somanotasn1 = array_sum($n1);
									
									$median1 = 0;
									if($tnotasn1!=0){
										$median1 = $somanotasn1 / $tnotasn1;
									}
									
									// calculos n2 
									
									$tnotasn2 = count($n2);
									$somanotasn2 = array_sum($n2);
									
									$median2 = 0;
									if($tnotasn2!=0){
										$median2 = $somanotasn2 / $tnotasn2;
									}
									
									array_push($lista,array($idTurma,$row['cargaHoraria'],$row['descricao'],$median1,$median2,$faltasn1,$faltasn2));
									
								}
								
							}
						  
							?>
							
							
						<?php foreach($lista as $value3){ ?>
						  
                          <tr>
                            <td><?php echo $value3[2]; ?></td>
                            <td><?php echo $value3[1]; ?></td>
                            <td><?php echo $value3[5]+$value3[6] ; ?></td>
                            <td><?php echo $value3[3]; ?></td>
                            <td><?php echo $value3[5]; ?></td>
                            <td><?php echo $value3[4]; ?></td>
                            <td><?php echo $value3[6]; ?></td>
                            <td><?php echo (($value3[3]*2)+($value3[4]*2))/5 ; ?></td>
                            <td></td>
                            <td>8,7</td>
                            <td>Aprovado</td>
                          </tr>
						  
						<?php } ?>
						
                        </table>

                        <p id="media">Média das disciplinas: 8,7</p>
                        <p id="ira">IRA: 7,9</p>
                        <p id="situacao">Situação: Aprovado</p>
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
