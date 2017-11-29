<!DOCTYPE html>
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
                    <li>
                        <a href="minhas-turmas.php">
                            <p>Minhas turmas</p>
                        </a>
                    </li>
                    <li>
                        <a href="frequencia.php">
                            <p>Frequência</p>
                        </a>
                    </li>
                    <li class="active">
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
                                        <h2>Marcar avaliação</h2> <input class="but" type="image" name="tEnviar" src="imgs/but.png" />
                                        <h4 class="sub-header">Selecione a turma:
                                            <select name="tEst" id="cEst">
                                <optgroup label="Engenharia de Computação">
                                    <option value="ED"> Estrutura de dados</option>
                                    <option value="GR" > Grafos</option>
                                </optgroup>
                                <optgroup label="Engenharia de Telecomunicações">
                                    <option value="ED"> Estrutura de dados</option>
                                    <option value="SS" selected> Sinais e sistemas</option>
                                </optgroup>
                                <optgroup label="Engenharia Mecânica">
                                    <option value="CA"> Cálculo III</option>
                                    <option value="MM"> Mecânica de materiais</option>
                                </optgroup>
                            </select>
                                        </h4>
                                        <h2>Lançar notas</h2>
                                        <h4 class="sub-header">Selecione a turma:
                                            <select name="tEst" id="cEst">
                                <optgroup label="Engenharia de Computação">
                                    <option value="ED"> Estrutura de dados</option>
                                    <option value="GR" > Grafos</option>
                                </optgroup>
                                <optgroup label="Engenharia de Telecomunicações">
                                    <option value="ED"> Estrutura de dados</option>
                                    <option value="SS" selected> Sinais e sistemas</option>
                                </optgroup>
                                <optgroup label="Engenharia Mecânica">
                                    <option value="CA"> Cálculo III</option>
                                    <option value="MM"> Mecânica de materiais</option>
                                </optgroup>
                            </select>
                                        </h4>
                                        <div class="table-responsive">
                                            <table class="table table-striped" style="width:100%">
                                                <tr>
                                                    <th>Matriculas</th>
                                                    <th>Alunos</th>
                                                    <th>N1</th>
                                                    <th>N2</th>
                                                    <th>N3</th>
                                                    <th>N4</th>
                                                    <th>AF</th>
                                                    <th>Media</th>
                                                </tr>
                                                <tr>
                                                    <td>20142017515425</td>
                                                    <td>Willian Shakesspeare</td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <td>20142014244523</td>
                                                    <td>Ludwing Van Beethoven</td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <td>20142014244123</td>
                                                    <td>Selina Kyle</td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <td>20542017244123</td>
                                                    <td>Irene Adler</td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <td>20442017244123</td>
                                                    <td>Charles Xavier</td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <td>20142017294123</td>
                                                    <td>Seya de Pégaso</td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <td>20142017244123</td>
                                                    <td>Stephen Strange</td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <td>20142017244123</td>
                                                    <td>Frodo Bolseiro</td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <td><input class="inp" type="text" id="cTex" min="0" max="10" /></td>
                                                    <th></th>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- Finalizar Notas e avaliações -->

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
            <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
            <!-- polyfiller file to detect and load polyfills -->
            <script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
            <script>
                webshims.setOptions('waitReady', false);
                webshims.setOptions('forms-ext', {
                    types: 'date'
                });
                webshims.polyfill('forms forms-ext');
            </script>

</body>

</html>