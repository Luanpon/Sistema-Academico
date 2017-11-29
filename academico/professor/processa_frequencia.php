<?php

	session_start();
	
	$conn = mysql_connect("localhost","root","");
	mysql_select_db("academico");

	if($_GET['idTurma']!="nulo"){
		
		$conteudo = $_POST['conteudo'];
		$dataaula = $_POST['dataaula'];
		$idTurma = $_GET['idTurma'];
		
		$sql = "SELECT turmaaluno.Aluno_idAluno AS idAluno FROM turmaaluno WHERE turmaaluno.Turma_idTurma=".$idTurma." ORDER BY Aluno_idAluno ASC ";
		$result = mysql_query($sql,$conn) or die(mysql_error());
		
		if(mysql_num_rows($result)>0){
			
			$ind = 0;
			
			while($row = mysql_fetch_assoc($result)){
				
				$idAluno = $row['idAluno'];
				
				$presente = $_POST['simnao'.$ind];
				
				if($presente=='sim'){
					$presente = 1;
				}
				else{
					$presente = 0;
				}
				
				$sql2 = "INSERT INTO frequencia (idFrequencia, TurmaAluno_Aluno_idAluno, TurmaAluno_Turma_idTurma, data_2, presente, conteudoaula) 
						VALUES (NULL, ".$idAluno.", ".$idTurma.", '".$dataaula."', ".$presente.", '".$conteudo."') ";
				
				$result2 = mysql_query($sql2,$conn) or die(mysql_error());
				
				$ind+=1;
				
				$_SESSION['mensagem'] = "<font color='green'>Aula e faltas lançadas com sucesso!</font>";
				header('Location:frequencia.php');
				
			}
			
		}
		
	}
	else{
		header('Location:frequencia.php');
	}
	


?>