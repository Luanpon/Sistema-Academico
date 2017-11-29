<!DOCTYPE html>
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
                <li><a href="inicio.html"><p>Início</p></a></li>
                <li><a href="horario.html"><p>Horário Individual</p></a></li>
                <li><a href="diario.html"><p>Diários</p></a></li>
                <li><a href="boletim.html"><p>Boletim</p></a></li>
                <li><a href="historico.html"><p>Histórico Escolar</p></a></li>
                <li class="active"><a href="matriz.html"><p>Matriz Curricular</p></a></li>
                <li><a href="material.html"><p>Material de Aula</p></a></li>
                <li><a href="logout.html"><p>Logout</p></a></li>
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
                                <h2>Matriz Curricular</h2>
                                <h3 class="sub-header">Curso: Bacharelado em Engenharia de Computação</h3>
                                  <div class="table-responsive">
                                    <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th>Componente Curricular</th>
                                          <th>Carga Horária</th>
                                          <th>Créditos</th>
                                          <th>Pré-requisitos</th>
                                        </tr>

                                      </thead>
                                      <tbody>

                                        <thead>
                                          <th>S1</th>
                                        </thead>
                                        <tr>
                                          <td>Cálculo 1</td>
                                          <td>80</td>
                                          <td>4</td>
                                          <td>-</td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td>Eletrônica Digital</td>
                                          <td>120</td>
                                          <td>6</td>
                                          <td>-</td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td>Lógica de Programação 1</td>
                                          <td>120</td>
                                          <td>6</td>
                                          <td>-</td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td>Matemática Discreta</td>
                                          <td>80</td>
                                          <td>4</td>
                                          <td>-</td>
                                          <td></td>
                                        </tr>

                                        <thead>
                                          <th>S2</th>
                                        </thead>

                                        <tr>
                                          <td>Cálculo 2</td>
                                          <td>80</td>
                                          <td>4</td>
                                          <td>Cálculo 1</td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td>Eletrônica Analógica</td>
                                          <td>80</td>
                                          <td>4</td>
                                          <td>-</td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td>Física 1</td>
                                          <td>80</td>
                                          <td>4</td>
                                          <td>-</td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td>Lógica de Programação 2</td>
                                          <td>80</td>
                                          <td>4</td>
                                          <td>Lógica de Programação 1</td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td>Lógica Matemática</td>
                                          <td>80</td>
                                          <td>4</td>
                                          <td>-</td>
                                          <td></td>
                                        </tr>

                                        <thead>
                                          <th>S3</th>
                                        </thead>

                                        <tr>
                                          <td>Arquitetura de Computadores</td>
                                          <td>80</td>
                                          <td>4</td>
                                          <td>Eletrônica Digital</td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td>Equações Diferenciais</td>
                                          <td>80</td>
                                          <td>4</td>
                                          <td>Cálculo 2</td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td>Estrutura de Dados</td>
                                          <td>120</td>
                                          <td>6</td>
                                          <td>Lógica de Programação 2</td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td>Física 2</td>
                                          <td>80</td>
                                          <td>4</td>
                                          <td>Cálculo 1 + Física 1</td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td>Introdução a Análise de Algorítmos</td>
                                          <td>40</td>
                                          <td>2</td>
                                          <td>Matemática Discreta + Lógica Matemática</td>
                                          <td></td>
                                        </tr>

                                        <thead>
                                          <th>S4</th>
                                        </thead>

                                        <tr>
                                          <td>Aspectos Teóricos da Computação</td>
                                          <td>80</td>
                                          <td>4</td>
                                          <td>Introdução a Análise de Algorítmos</td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td>Metodologia Científica e Tecnológica</td>
                                          <td>40</td>
                                          <td>2</td>
                                          <td>-</td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td>Microcontroladores e Microprocessadores</td>
                                          <td>120</td>
                                          <td>6</td>
                                          <td>Arquitetura de Computadores + Eletrônica Analógica</td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td>Paradigmas de Programação</td>
                                          <td>80</td>
                                          <td>4</td>
                                          <td>Estrutura de Dados</td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td>Pesquisa e Ordenação</td>
                                          <td>80</td>
                                          <td>4</td>
                                          <td>Estrutura de Dados</td>
                                          <td></td>
                                        </tr>

                                        <thead>
                                          <th>S5</th>
                                        </thead>

                                        <tr>
                                          <td>Construção de Compiladores</td>
                                          <td>80</td>
                                          <td>4</td>
                                          <td>Aspéctos Teóricos da Computação</td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td>Geometria Análitica e Algebra Linear</td>
                                          <td>120</td>
                                          <td>6</td>
                                          <td>-</td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td>Probabilidade e Estatística</td>
                                          <td>80</td>
                                          <td>4</td>
                                          <td>-</td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td>Produção Textual</td>
                                          <td>40</td>
                                          <td>2</td>
                                          <td>-</td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td>Sistemas Operacionais</td>
                                          <td>80</td>
                                          <td>4</td>
                                          <td>Microcontroladores e Microprocessadores</td>
                                          <td></td>
                                        </tr>

                                      </tbody>
                                    </table>
                                  </div>
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

</body>
</html>
