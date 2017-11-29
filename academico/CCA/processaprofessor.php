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
	
	$titulacao = $_POST['nivel'];
	$dpto = $_POST['dpto'];
	
	$sql = "INSERT INTO contato (idContato, fax, email, homepage, telefone) 
	VALUES (NULL, 'não possui', '".$email."', '".$homepage."', '".$telefone."')";
	
	$sql12 = "SELECT LAST_INSERT_ID()";
	
	$result = mysql_query($sql,$conn) or die(mysql_error());
	$result12 = mysql_query($sql12,$conn) or die(mysql_error());
	
	while($row = mysql_fetch_assoc($result12)){
		
		$idContato = $row['LAST_INSERT_ID()'];
		
	}
	
	$sql2 = "SELECT departamento.idDepartamento FROM departamento WHERE departamento.nome = '".$dpto."'";
	
	$result2 = mysql_query($sql2,$conn) or die(mysql_error());
	
	if(mysql_num_rows($result2)>0){
		
		while($row2 = mysql_fetch_assoc($result2)){
			$idDepartamento = $row2['idDepartamento'];	
		}
		
		$sql3 = "INSERT INTO professor (idProfessor, Contato_idContato, Departamento_idDepartamento, nome, 
		endereco, titulacao, senha, data_nascimento, pai, mae, sangue, 
		naturalidade, nacionalidade, sexo, rg, 
		cpf, titulo_eleitor, matricula) 
		VALUES (NULL, ".$idContato.", ".$idDepartamento.", '".$nome."', 
		'".$endereco."', '".$titulacao."', '5678', '".$data_nascimento."', '".$pai."', '".$mae."', '".$sangue."', 
		'".$naturalidade."', '".$nacionalidade."', '".$sexo."', '".$rg."', 
		'".$cpf."', '".$titulo."', 0)";
		
		$sql32 = "SELECT LAST_INSERT_ID()"; 
		
		if(mysql_query($sql3,$conn)){
			
			$result32 = mysql_query($sql32,$conn) or die(mysql_error()); 
			
			while($row32 = mysql_fetch_assoc($result32)){
				$idProfessor = $row32['LAST_INSERT_ID()'];
			}
			
			$sql4 = "UPDATE professor SET professor.matricula=1305".$idProfessor." WHERE professor.idProfessor=".$idProfessor."";
			
			$result4 = mysql_query($sql4,$conn) or die(mysql_error());
			
			$_SESSION['mensagem']= "
			<font color='green'>
			Professor cadastrado com sucesso !<br>
			Usuario/Matricula: 1305".$idProfessor."<br>
			Senha: 5678
			</font>";
			
			header('Location:professor.php');
		}
		else{
			
			$_SESSION['mensagem']= "<font color='red'>
			Professor não cadastrado com sucesso !
			</font>";
			
			header('Location:professor.php');
			
		}
		
	}
	else{
		
		$_SESSION['mensagem']= "<font color='red'>
		Departamento não cadastrado. Por favor verifique.
		</font>";
		
		header('Location:professor.php');
		
	}


?>

<html>
<head><title>SISACAD</title></head>

<body>

</body>

</html>