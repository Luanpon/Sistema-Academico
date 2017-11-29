<?php

	session_start();
	
	$conn = mysql_connect("localhost","root","");
	mysql_select_db("academico");
	
	$nome = $_POST['nome'];
	$coordenador = $_POST['coordenador'];
	$dpto = $_POST['dpto'];
	$nivel = $_POST['nivel'];
	
	$semestre = $_POST['semestre'];
	$componente = $_POST['componente'];
	$ch = $_POST['ch'];
	$prereq = $_POST['prereq'];
	$professor = $_POST['professor'];
	
	$sql = "SELECT departamento.idDepartamento FROM departamento WHERE departamento.nome='".$dpto."'";
	$result = mysql_query($sql,$conn) or die(mysql_error());
	
	if(mysql_num_rows($result)>0){
		
		while($row = mysql_fetch_assoc($result)){
			
			$idDepartamento = $row['idDepartamento'];
			
		}
		
		$sql2 = "SELECT curso.idCurso FROM curso WHERE curso.descricao ='".$nome."' AND curso.nivel='".$nivel."' ";
		$result2 = mysql_query($sql2,$conn) or die(mysql_error());
		
		if(mysql_num_rows($result2)>0){
			
			while($row2 = mysql_fetch_assoc($result2)){
				$idCurso = $row2['idCurso'];
			}
			
			$sql3 = "SELECT disciplina.idDisciplina FROM disciplina WHERE disciplina.descricao = '".$prereq."' ";
			$result3 = mysql_query($sql3,$conn) or die(mysql_error());
			
			if(mysql_num_rows($result3)>0){
				
				while($row3 = mysql_fetch_assoc($result3)){
					$idPrereq = $row3['idDisciplina'];
				}
				
				$sql6 = "SELECT professor.idProfessor FROM professor WHERE professor.matricula=".$professor."";
				$result6 = mysql_query($sql6,$conn) or die(mysql_error());
				
				if(mysql_num_rows($result6)>0){
					
					while($row6 = mysql_fetch_assoc($result6)){
						$idProfessor = $row6['idProfessor'];
					}
					
					$sql4 = "INSERT INTO disciplina (idDisciplina, descricao, cargaHoraria, quantCreditos) 
					VALUES (NULL, '".$componente."', '".$ch."', '".($ch/20)."')";
					$result4 = mysql_query($sql4,$conn) or die(mysql_error());
					
					$sql5 = "SELECT LAST_INSERT_ID()"; 
					$result5 = mysql_query($sql5,$conn) or die(mysql_error());
					
					while($row5 = mysql_fetch_assoc($result5)){
						$idDisciplina = $row5['LAST_INSERT_ID()'];
					}
					
					$sql7 = "INSERT INTO disciplinacurso (Disciplina_idDisciplina, Curso_idCurso, Professor_idProfessor, periodo) 
					VALUES (".$idDisciplina.", ".$idCurso.", ".$idProfessor.", ".$semestre.") ";
					$result7 = mysql_query($sql7,$conn) or die(mysql_error());
					
					$sql8 = "INSERT INTO prerequisitos (idPreRequisitos) VALUES (".$idPrereq.") ";
					$result8 = mysql_query($sql8,$conn) or die(mysql_error());
					
					$sql9 = "INSERT INTO prerequisitodisciplina (PreRequisitos_idPreRequisitos, Disciplina_idDisciplina) 
					VALUES (".$idPrereq.", ".$idDisciplina.") ";
					$result9 = mysql_query($sql9,$conn) or die(mysql_error());
					
					$_SESSION['mensagem']= "
					<font color='green'>
					Disciplina ".$componente." cadastrada com sucesso !<br>
					ID da Disciplina: ".$idDisciplina."<br>
					</font>";
					
					header('Location:curso.php');
					
				}
				else{
					
					$_SESSION['mensagem']= "<font color='red'>
					Professor não cadastrado. Por favor verifique !
					</font>";
			
					header('Location:curso.php');
					
				}
				
				
			}
			else{
				
				if($prereq=='0'){
					
					$sql6 = "SELECT professor.idProfessor FROM professor WHERE professor.matricula=".$professor."";
					$result6 = mysql_query($sql6,$conn) or die(mysql_error());
					
					if(mysql_num_rows($result6)>0){
						
						while($row6 = mysql_fetch_assoc($result6)){
							$idProfessor = $row6['idProfessor'];
						}
						
						$sql4 = "INSERT INTO disciplina (idDisciplina, descricao, cargaHoraria, quantCreditos) 
						VALUES (NULL, '".$componente."', '".$ch."', '".($ch/20)."')";
						$result4 = mysql_query($sql4,$conn) or die(mysql_error());
						
						$sql5 = "SELECT LAST_INSERT_ID()"; 
						$result5 = mysql_query($sql5,$conn) or die(mysql_error());
						
						while($row5 = mysql_fetch_assoc($result5)){
							$idDisciplina = $row5['LAST_INSERT_ID()'];
						}
						
						$sql7 = "INSERT INTO disciplinacurso (Disciplina_idDisciplina, Curso_idCurso, Professor_idProfessor, periodo) 
						VALUES (".$idDisciplina.", ".$idCurso.", ".$idProfessor.", ".$semestre.") ";
						$result7 = mysql_query($sql7,$conn) or die(mysql_error());
						
						$_SESSION['mensagem']= "
						<font color='green'>
						Disciplina ".$componente." cadastrada com sucesso !<br>
						ID da Disciplina: ".$idDisciplina."<br>
						</font>";
						
						header('Location:curso.php');
						
					}
					else{
						
						$_SESSION['mensagem']= "<font color='red'>
						Professor não cadastrado. Por favor verifique !
						</font>";
				
						header('Location:curso.php');
						
					}
						
				}
				else{
					
					$_SESSION['mensagem']= "<font color='red'>
					Pre-requisito não está cadastrado. Por favor verifique !
					</font>";
			
					header('Location:curso.php');
					
				}
				
			}
			
		}
		else{
			
			$sql10 = "SELECT professor.idProfessor FROM professor WHERE professor.matricula=".$coordenador."";
			$result10 = mysql_query($sql10,$conn) or die(mysql_error);
			
			if(mysql_num_rows($result10)>0){
				
				while($row10=mysql_fetch_assoc($result10)){
					$idCoordenador = $row10['idProfessor'];
				}
				
				$sql11 = "INSERT INTO curso (idCurso, Departamento_idDepartamento, descricao, nivel, idCoordenador) 
				VALUES (NULL, ".$idDepartamento.", '".$nome."', '".$nivel."', ".$idCoordenador.") ";
				$result11 = mysql_query($sql11,$conn) or die(mysql_error());
				
				$sql12 = "SELECT LAST_INSERT_ID()";
				$result12 = mysql_query($sql12,$conn) or die(mysql_error());
				
				while($row12 = mysql_fetch_assoc($result12)){
					$idCurso = $row12['LAST_INSERT_ID()'];
				}
				
				$sql3 = "SELECT disciplina.idDisciplina FROM disciplina WHERE disciplina.descricao = '".$prereq."' ";
				$result3 = mysql_query($sql3,$conn) or die(mysql_error());
					
				if(mysql_num_rows($result3)>0){
					
					while($row3 = mysql_fetch_assoc($result3)){
						$idPrereq = $row3['idDisciplina'];
					}
					
					$sql6 = "SELECT professor.idProfessor FROM professor WHERE professor.matricula=".$professor."";
					$result6 = mysql_query($sql6,$conn) or die(mysql_error());
					
					if(mysql_num_rows($result6)>0){
						
						while($row6 = mysql_fetch_assoc($result6)){
							$idProfessor = $row6['idProfessor'];
						}
						
						$sql4 = "INSERT INTO disciplina (idDisciplina, descricao, cargaHoraria, quantCreditos) 
						VALUES (NULL, '".$componente."', '".$ch."', '".($ch/20)."')";
						$result4 = mysql_query($sql4,$conn) or die(mysql_error());
						
						$sql5 = "SELECT LAST_INSERT_ID()"; 
						$result5 = mysql_query($sql5,$conn) or die(mysql_error());
						
						while($row5 = mysql_fetch_assoc($result5)){
							$idDisciplina = $row5['LAST_INSERT_ID()'];
						}
						
						$sql7 = "INSERT INTO disciplinacurso (Disciplina_idDisciplina, Curso_idCurso, Professor_idProfessor, periodo) 
						VALUES (".$idDisciplina.", ".$idCurso.", ".$idProfessor.", ".$semestre.") ";
						$result7 = mysql_query($sql7,$conn) or die(mysql_error());
						
						$sql8 = "INSERT INTO prerequisitos (idPreRequisitos) VALUES (".$idPrereq.") ";
						$result8 = mysql_query($sql8,$conn) or die(mysql_error());
						
						$sql9 = "INSERT INTO prerequisitodisciplina (PreRequisitos_idPreRequisitos, Disciplina_idDisciplina) 
						VALUES (".$idPrereq.", ".$idDisciplina.") ";
						$result9 = mysql_query($sql9,$conn) or die(mysql_error());
						
						$_SESSION['mensagem']= "
						<font color='green'>
						Disciplina:".$componente." e Curso:".$nome." cadastrados com sucesso !<br>
						ID da Disciplina: ".$idDisciplina."<br>
						ID do Curso: ".$idCurso."<br>
						</font>";
					
						header('Location:curso.php');
						
					}
					else{
						
						$_SESSION['mensagem']= "<font color='red'>
						Professor não cadastrado. Por favor verifique !
						</font>";
				
						header('Location:curso.php');
						
					}
					
					
				}
				else{
					
					if($prereq=='0'){
						
						$sql6 = "SELECT professor.idProfessor FROM professor WHERE professor.matricula=".$professor."";
						$result6 = mysql_query($sql6,$conn) or die(mysql_error());
						
						if(mysql_num_rows($result6)>0){
							
							while($row6 = mysql_fetch_assoc($result6)){
								$idProfessor = $row6['idProfessor'];
							}
							
							$sql4 = "INSERT INTO disciplina (idDisciplina, descricao, cargaHoraria, quantCreditos) 
							VALUES (NULL, '".$componente."', '".$ch."', '".($ch/20)."')";
							$result4 = mysql_query($sql4,$conn) or die(mysql_error());
							
							$sql5 = "SELECT LAST_INSERT_ID()"; 
							$result5 = mysql_query($sql5,$conn) or die(mysql_error());
							
							while($row5 = mysql_fetch_assoc($result5)){
								$idDisciplina = $row5['LAST_INSERT_ID()'];
							}
							
							$sql7 = "INSERT INTO disciplinacurso (Disciplina_idDisciplina, Curso_idCurso, Professor_idProfessor, periodo) 
							VALUES (".$idDisciplina.", ".$idCurso.", ".$idProfessor.", ".$semestre.") ";
							$result7 = mysql_query($sql7,$conn) or die(mysql_error());
							
							$_SESSION['mensagem']= "
							<font color='green'>
							Disciplina:".$componente." e Curso:".$nome." cadastrados com sucesso !<br>
							ID da Disciplina: ".$idDisciplina."<br>
							ID do Curso: ".$idCurso."<br>
							</font>";
						
							header('Location:curso.php');
							
						}
						else{
							
							$_SESSION['mensagem']= "<font color='red'>
							Professor não cadastrado. Por favor verifique !
							</font>";
					
							header('Location:curso.php');
							
						}
							
					}
					else{
						
						$_SESSION['mensagem']= "<font color='red'>
						Pre-requisito não está cadastrado. Por favor verifique !
						</font>";
				
						header('Location:curso.php');
						
					}
					
				}
				
				
			}
			else{
				$_SESSION['mensagem']= "<font color='red'>
				Coordenador não está cadastrado. Por favor verifique !
				</font>";
				
				header('Location:curso.php');
			}
			
		}
		
		
	}
	else{
		
		$_SESSION['mensagem']= "<font color='red'>
		Departamento não cadastrado. Por favor verifique.
		</font>";
		
		header('Location:curso.php');
		
	}
	
	
	
	

?>

<html>
<head><title>SISACAD</title></head>
<body>
</body>
</html>