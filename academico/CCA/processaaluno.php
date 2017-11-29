<?php
	session_start();
	
	$conn = mysql_connect("localhost","root","");
	mysql_select_db("academico");

	$nome = $_POST['nome'];
	$data_nascimento = $_POST['data'];
	$pai = $_POST['pai'];
	$mae = $_POST['mae'];
	$sangue = $_POST['sangue'];
	$naturalidade = $_POST['naturalidade'];
	$nacionalidade = $_POST['nacionalidade'];
	$sexo = $_POST['gender'];
	
	$endereco = $_POST['rua'].",".$_POST['numero']."(".$_POST['complemento'].")"." - 
	Bairro: ".$_POST['bairro']." - Cidade: ".$_POST['cidade']." - CEP: ".$_POST['cep'];
	
	$telefone = $_POST['celular'];
	$email = $_POST['email'];
	$homepage = $_POST['page'];
	
	$rg = $_POST['rg'];
	$cpf = $_POST['cpf'];
	$titulo = $_POST['titulo'];
	
	$curso = $_POST['curso'];
	$nivel = $_POST['nivel'];
	$turno = $_POST['turno'];
	$semestreentrada = $_POST['semestreentrada'];
	
	$sql = "INSERT INTO contato (idContato, fax, email, homepage, telefone) 
	VALUES (NULL, 'não possui', '".$email."', '".$homepage."', '".$telefone."')";
	
	$sql12 = "SELECT LAST_INSERT_ID()";
	
	$result = mysql_query($sql,$conn) or die(mysql_error());
	$result12 = mysql_query($sql12,$conn) or die(mysql_error());
	
	while($row = mysql_fetch_assoc($result12)){
		
		$idContato = $row['LAST_INSERT_ID()'];
		
	}
	
	$sql2 = "SELECT curso.idCurso FROM curso WHERE curso.descricao = '".$curso."'";
	
	$result2 = mysql_query($sql2,$conn) or die(mysql_error());
	
	if(mysql_num_rows($result2)>0){
		
		while($row2 = mysql_fetch_assoc($result2)){
			$idCurso = $row2['idCurso'];	
		}
		
		$sql3 = "INSERT INTO aluno (idAluno, Contato_idContato, nome, endereco, senha, semestreentrada, 
		idCurso, ira, data_nascimento, pai, mae, tipo_sanguineo, sexo, telefone, cpf, titulo_eleitor, 
		turnoCurso, rg, naturalidade, nacionalidade)
		VALUES (NULL, ".$idContato.", '".$nome."', '".$endereco."', '1234', '".$semestreentrada."', 
		".$idCurso.", 0, '".$data_nascimento."', '".$pai."', '".$mae."', '".$sangue."', '".$sexo."', '".$telefone."', '".$cpf."', '".$titulo."', 
		'".$turno."', '".$rg."', '".$naturalidade."', '".$nacionalidade."') ";
		
		$sql32 = "SELECT LAST_INSERT_ID()"; 
		
		if(mysql_query($sql3,$conn)){
			
			$result32 = mysql_query($sql32,$conn) or die(mysql_error()); 
			
			while($row32 = mysql_fetch_assoc($result32)){
				$idAluno = $row32['LAST_INSERT_ID()'];
			}
			
			$_SESSION['mensagem']= "
			<font color='green'>
			Aluno cadastrado com sucesso !<br>
			Usuario/Matricula: ".$semestreentrada.$idAluno."<br>
			Senha: 1234
			</font>";
			
			header('Location:aluno.php');
		}
		else{
			
			$_SESSION['mensagem']= "<font color='red'>
			Aluno não cadastrado com sucesso !
			</font>";
			
			header('Location:aluno.php');
			
		}
		
	}
	else{
		
		$_SESSION['mensagem']= "<font color='red'>
		Curso não cadastrado. Por favor verifique.
		</font>";
		
		header('Location:aluno.php');
		
	}


?>

<html>
<head><title>SISACAD</title></head>

<body>

</body>

</html>