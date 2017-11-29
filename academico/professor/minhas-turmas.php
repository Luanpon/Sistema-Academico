<!DOCTYPE html>

<?php
	session_start();
	
	$conn = mysql_connect("localhost","root","");
	mysql_select_db("academico");

	$nome = $_SESSION['nomeusuario'];
	$idProfessor = $_SESSION['idProfessor'];
	$usuario = $_SESSION['usuario'];

	$_SESSION['nomeusuario'] = $nome;
	$_SESSION['idProfessor'] = $idProfessor;
	$_SESSION['usuario'] = $usuario;

?>

<?php
										
	$sql = "SELECT turma.idTurma, disciplina.descricao, curso.descricao AS descricao2, professor.idProfessor FROM professor 
	LEFT JOIN disciplinacurso ON disciplinacurso.Professor_idProfessor = professor.idProfessor 
	LEFT JOIN turma ON turma.DisciplinaCurso_Disciplina_idDisciplina = disciplinacurso.Disciplina_idDisciplina 
	AND turma.DisciplinaCurso_Curso_idCurso = disciplinacurso.Curso_idCurso AND 
	turma.DisciplinaCurso_Professor_idProfessor = disciplinacurso.Professor_idProfessor 
	LEFT JOIN disciplina ON disciplinacurso.Disciplina_idDisciplina = disciplina.idDisciplina 
	LEFT JOIN curso ON disciplinacurso.Curso_idCurso = curso.idCurso 
	WHERE (professor.idProfessor =".$idProfessor.")";
	
	$result = mysql_query($sql,$conn) or die(mysql_error());
	
	$lista_principal = array();
	
	if(mysql_num_rows($result)>0){
		
		while($row = mysql_fetch_assoc($result)){
			
			//$lista = array();
			//array_push($lista,array($row['descricao'],$row['descricao2']));
			
			if($row['idTurma']!=NULL){
				
				$idTurma = $row['idTurma'];
				$lista2 = array();
			
				$sql2 = "SELECT aluno.nome, aluno.idAluno, aluno.semestreentrada, turma.idTurma
				FROM turma
				LEFT JOIN turmaaluno ON turmaaluno.Turma_idTurma = turma.idTurma
				LEFT JOIN aluno ON turmaaluno.Aluno_idAluno = aluno.idAluno
				WHERE (turma.idTurma =".$idTurma.")";
				
				$result2 = mysql_query($sql2,$conn) or die(mysql_error());
				
				if(mysql_num_rows($result2)>0){
					
					while($row2 = mysql_fetch_assoc($result2)){
						
						$idAluno = $row2['idAluno'];
					
						$sql3 = "SELECT frequencia.presente, aluno.idAluno, turma.idTurma
						FROM aluno
						LEFT JOIN turmaaluno ON turmaaluno.Aluno_idAluno = aluno.idAluno
						LEFT JOIN frequencia ON frequencia.TurmaAluno_Turma_idTurma = turmaaluno.Turma_idTurma 
						AND frequencia.TurmaAluno_Aluno_idAluno = turmaaluno.Aluno_idAluno
						LEFT JOIN turma ON turmaaluno.Turma_idTurma = turma.idTurma
						WHERE ((aluno.idAluno =".$idAluno.") AND (turma.idTurma =".$idTurma."))";
						
						$result3 = mysql_query($sql3,$conn) or die(mysql_error());
						
						$tfaltas = 0;
						
						if(mysql_num_rows($result3)>0){
							
							while($row3 = mysql_fetch_assoc($result3)){
								
								if($row3['presente']!=NULL){
									
									if($row3['presente']==0){
										$tfaltas += 2;
									}
									
								}
								
							}																	
							
							
						}
						
						array_push($lista2,array($row2['semestreentrada'].$row2['idAluno'],$row2['nome'],$tfaltas));
							
					}
					
				}
				
				
				$sql5 = "SELECT horario.diasemana, horario.horaInicio, sala.tipo, sala.bloco, sala.numero, turma.idTurma
				FROM turma
				LEFT JOIN horario ON horario.Turma_idTurma = turma.idTurma
				LEFT JOIN sala ON horario.Sala_idSala = sala.idSala
				WHERE (turma.idTurma =".$idTurma.")";
				
				$result5 = mysql_query($sql5,$conn) or die(mysql_error());
				
				$lista5 = array();
				
				if(mysql_num_rows($result5)>0){
					
					while($row5 = mysql_fetch_assoc($result5)){
						
						array_push($lista5,array($row5['diasemana'],$row5['horaInicio'],$row5['tipo'],$row5['bloco'],$row5['numero']));
						
					}
					
				}
				
				array_push($lista_principal,array($row['descricao'],$row['descricao2'],$lista2,$lista5));
				
			}
			
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
    <meta name="author" content="Guilherme Araujo" />
    <link rel="shortcut icon" type="image/x-icon" href="imgs/favicon.png">
    <title>SISACAD</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/prof.css">
    <link rel="stylesheet" type="text/css" href="css/light-bootstrap-dashboard.css" />
    <link rel="stylesheet" type="text/css" href="css/acc-wizard.min.css" />

</head>

<body>

    <div class="wrapper">
        <div class="sidebar" data-image="">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <h3><b>SISACAD</b></h3>
                    <div><img src="imgs/favicon.png" class="len"></div>
                </div>
                <ul class="nav">
                    <li>
                        <a href="inicio.php">
                            <p>Início</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="minhas-turmas.php">
                            <p>Minhas turmas</p>
                        </a>
                    </li>
                    <li>
                        <a href="frequencia.php">
                            <p>Frequência</p>
                        </a>
                    </li>
                    <li>
                        <a href="nota-avaliacao.php">
                            <p>Notas e avaliações</p>
                        </a>
                    </li>
                    <li>
                        <a href="material-aula.php">
                            <p>Material de aula</p>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php">
                            <p>Logout</p>
                        </a>
                    </li>
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

                                        <h2>Minhas Turmas</h2>
										
										<?php $perc=0; ?>
										
										<?php foreach($lista_principal as $value){ ?>
										
											<div class="panel panel-default">
											
												<div class="panel-heading">
													<h4 class="panel-title">
														<a href="http://sathomas.me/acc-wizard/#<?php echo $perc; ?>" data-parent="#accordion-demo" data-toggle="collapse" class="collapsed">
															<h5 class="hbar"><?php echo $value[0]; ?> - <?php echo $value[1]; ?></h5>

														</a>
													</h4>
												</div>
												
												<div id="<?php echo $perc; ?>" class="panel-collapse collapse" style="height: 36.4px;">
													<div class="panel-body">
														<form id="form-viewpage">
															
															<?php foreach($value[3] as $value3){ ?>
															
															<h5> <?php echo $value3[0]; ?> - <?php echo $value3[1]; ?> - <?php echo $value3[2]; ?> <?php echo $value3[4]; ?> - bloco <?php echo $value3[3]; ?> <br></h5>
															
															<?php }; ?>
												
															<table style="width:100%">
																<tr>
																	<th>Matriculas</th>
																	<th>Alunos</th>
																	<th>Faltas</th>
																</tr>
																
																<?php foreach($value[2] as $value2){ ?>
																
																<tr>
																	<td><?php echo $value2[0]; ?></td>
																	<td><?php echo $value2[1]; ?></td>
																	<td><?php echo $value2[2]; ?></td>
																</tr>
																
																<?php }; ?>

															</table>
		
															<div class="acc-wizard-step"></div>
														</form>
													</div>
													<!--/.panel-body -->
												</div>
												
											</div>
										
											<?php $perc+=1; ?>
										
										<?php }; ?>
										
                                        <!-- /.panel.panel-default -->
                                    </div>
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
        <script src="js/acc-wizard.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>



        <script>
            function onNext(parent, panel) {
                hash = "#" + panel.id;
                $(".acc-wizard-sidebar", $(parent))
                    .children("li")
                    .children("a[href='" + hash + "']")
                    .parent("li")
                    .removeClass("acc-wizard-todo")
                    .addClass("acc-wizard-completed");
            }
            $(window).load(function() {
                $(".acc-wizard").accwizard({
                    onNext: onNext
                });
            })
        </script>
		
	</div>
	
</body>

</html>