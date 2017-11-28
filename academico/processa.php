<?php
	
	session_start();

	$conn = mysql_connect("localhost","root","");
	mysql_select_db("academico");
	
	$usuario = $_POST['login'];
	$senha = $_POST['password'];
	
	$sql = "SELECT * FROM aluno WHERE CONCAT(semestreentrada,idAluno)=".$usuario." AND senha='".$senha."'";
	
	$result = mysql_query($sql,$conn) or die(mysql_error());
	
	
	if(mysql_num_rows($result)>0){
		
		while($row = mysql_fetch_assoc($result)){
			$nome = $row['nome'];
			$idAluno = $row['idAluno'];
		}
		
		$_SESSION['nomeusuario'] = $nome;
		$_SESSION['idAluno'] = $idAluno;
		$_SESSION['usuario'] = $usuario;
		
		header('Location:aluno/inicio.php');
	}
	else{
		
		$sql2 = "SELECT * FROM professor WHERE professor.matricula=".$usuario." AND professor.senha='".$senha."' ";
		$result2 = mysql_query($sql2,$conn) or die(mysql_error());
		
		if(mysql_num_rows($result2)>0){
			
			while($row2 = mysql_fetch_assoc($result2)){
				
				$nome = $row2['nome'];
				$idProfessor = $row2['idProfessor'];
				
			}
			
			
			$_SESSION['nomeusuario'] = $nome;
			$_SESSION['idProfessor'] = $idProfessor;
			$_SESSION['usuario'] = $usuario;
			
			header('Location:professor/inicio.php');
			
		}
		
		else{
			
			if($usuario=="000" && $senha=="admin"){
				header('Location:CCA/inicio.php');
			}
			
			else{
				$_SESSION['mensagem'] = "Usuario ou senha incorretos. Por favor verifique";
				header('Location:index.php');
			}
			
		}
		
	}
	
?>
<html>

<head>
<title>Processando...</title>
</head>

<body>
</body>

</html>