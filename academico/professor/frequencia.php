<!DOCTYPE html>

<?php
	
	session_start();
	
	if(isset($_SESSION['mensagem'])){
		$mensagem = $_SESSION['mensagem'];
		unset($_SESSION['mensagem']);
	}
	else{
		$mensagem="";
	}
	
	$conn = mysql_connect("localhost","root","");
	mysql_select_db("academico");

	$nome = $_SESSION['nomeusuario'];
	$idProfessor = $_SESSION['idProfessor'];
	$usuario = $_SESSION['usuario'];

	$_SESSION['nomeusuario'] = $nome;
	$_SESSION['idProfessor'] = $idProfessor;
	$_SESSION['usuario'] = $usuario;
	
	if(isset($_GET['idTurma'])){
		
		$idTurma = $_GET['idTurma'];
		$curso = $_GET['curso'];
		$disciplina = $_GET['disciplina'];
		
		$lista2 = array();

		$sql2 = "SELECT aluno.nome, aluno.idAluno, aluno.semestreentrada, turma.idTurma
		FROM turma
		LEFT JOIN turmaaluno ON turmaaluno.Turma_idTurma = turma.idTurma
		LEFT JOIN aluno ON turmaaluno.Aluno_idAluno = aluno.idAluno
		WHERE (turma.idTurma =".$idTurma.") ORDER BY idAluno ASC ";
		
		$result2 = mysql_query($sql2,$conn) or die(mysql_error());
		
		if(mysql_num_rows($result2)>0){
			
			while($row2 = mysql_fetch_assoc($result2)){
				
				array_push($lista2,array($row2['idAluno'],$row2['nome'],$row2['semestreentrada']));
				
			}

		}
		
	}
	else{
		$idTurma="nulo";
		$lista2 = array();
		$curso = "";
		$disciplina = "";
	}

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
	
	$lista1 = array();
	
	if(mysql_num_rows($result)>0){
		
		while($row = mysql_fetch_assoc($result)){
			
			if($row['idTurma']!=NULL){
				
				array_push($lista1,array($row['descricao'],$row['descricao2'],$row['idTurma']));
				
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
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" </head>

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
                        <li>
                            <a href="minhas-turmas.php">
                                <p>Minhas turmas</p>
                            </a>
                        </li>
                        <li class="active">
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
                <!-- Inicio do painel das vagas -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="panel">
                                        <div class="panel-body txt-block">
                                            <!-- Inicio da tabela -->
											
											<?php echo '<h4 align="center" >'.
											$mensagem.
											'</h4>';
											?>
											
											<form action="processa_frequencia.php ?idTurma=<?php echo $idTurma; ?>
											" method="POST" name="form1">
											
                                            <h2>Frequência</h2> <input class="but" type="image" name="tEnviar" src="imgs/but.png" onClick="this.form.submit()" />
                                            <h4 class="sub-header">Turma:
											
											<select name="tEst" id="cEst" onchange="window.location.href=this.value" >
											
												<option value="frequencia.php"> Escolha uma opção </option>
											
											<?php 
											
											foreach($lista1 as $value){												
											
											?>
											
														
												<option 
													value="frequencia.php ?idTurma=<?php echo $value[2]; ?> &curso=<?php echo $value[1]?> &disciplina=<?php echo $value[0]?> "> 
													<?php echo $value[0]?> - <?php echo $value[1]?> 
												</option>
													
									
											<?php
											
											}; 
											
											?>
											
											</select>
											
											</h4>
											
											<h4>Data da aula (aaaa-mm-dd): <input type="text" id="dataaula" name="dataaula"/></h4>
											<h4>Conteúdo dado: <input type="text" id="conteudo" name="conteudo"/></h4><br><br>
											
											<h4><?php echo $disciplina." - ".$curso; ?></h4>
											
											<div class="table-responsive">
                                                <table class="table table-striped" style="width:100%">
                                                    <tr>
                                                        <th>Matriculas</th>
                                                        <th>Alunos</th>
                                                        <th>Presente</th>
                                                    </tr>
													
												<?php 
												
												$sn = 0;
												foreach($lista2 as $value2){ ?>
											
												<tr>
													<td><?php echo $value2[2]; ?><?php echo $value2[0]; ?></td>
													<td><?php echo $value2[1]; ?></td>
													<td>
														<div class="margin-contato">
														<input type="radio" name="simnao<?php echo $sn; ?>" value="sim" checked> Sim <br>
														<input type="radio" name="simnao<?php echo $sn; ?>" value="nao"> Não
														</div>
													</td>
												</tr>
												
												<?php 
												
												$sn+=1;
												
												}; ?>
											
                                                </table>
                                            </div>
											
											
											</form>
											
                                        </div>
                                    </div>
                                </div>
                                <!-- Fim da tabela -->
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
            </div>
        </div>
        </div>

        <!-- javascript -->
        <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="js/wow.min.js"></script>
        <script type="text/javascript" src="js/javascript.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    </body>

</html>