<?php 
session_start();
require_once "config.php";

if(isset($_POST["submitCadastrar"])){
    $emailEmpresa = $_SESSION["emailEmpresa"];

    $skillVaga = mysqli_escape_string($conn, $_POST["skill-vaga"]);
    $tituloVaga = mysqli_escape_string($conn, $_POST["titulo-vaga"]);
    $tecnologias = mysqli_escape_string($conn,  implode(",", $_POST["tecnologias"]));
    $dataEncerramento = mysqli_escape_string($conn, $_POST["data-encerramento"]);
    $nomeEmpresa = mysqli_escape_string($conn, $_POST["nome-empresa"]);
    $tamanhoEmpresa = mysqli_escape_string($conn, $_POST["tamanho-empresa"]);
    $modeloTrabalho = mysqli_escape_string($conn, $_POST["modelo-trabalho"]);
    $salario = mysqli_escape_string($conn, $_POST["salario"]);
    $tipoContrato = mysqli_escape_string($conn, $_POST["tipo-contrato"]);
    $descEmpresa = mysqli_escape_string($conn, $_POST["desc-empresa"]);
    $atividadeResponsabilidade = mysqli_escape_string($conn, $_POST["atividade-responsabilidade"]);
    $requisitos = mysqli_escape_string($conn, $_POST["Requisitos"]);

    date_default_timezone_set('America/Sao_Paulo');
    $data_publicacao = new DateTime();
    $data_publicacao_formatada = $data_publicacao->format('Y-m-d');
    
    

    $sql = "SELECT ID_empresa_cad FROM empresa_cad WHERE email_empresa = '$emailEmpresa'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $linha = mysqli_fetch_assoc($result);
        $ID_empresa_cad = $linha["ID_empresa_cad"];




    $sql = "INSERT INTO cadastro_vagas (FK_empresa_vagas, skill_vaga, titulo_vaga, tecnologias, data_encerramento, nome_empresa, tamanho_empresa, modelo_trabalho, salario, tipo_contrato, descricao, atividades, requisitos, data_publicacao) VALUES('$ID_empresa_cad', '$skillVaga', '$tituloVaga', '$tecnologias', '$dataEncerramento', '$nomeEmpresa', '$tamanhoEmpresa', '$modeloTrabalho', '$salario', '$tipoContrato', '$descEmpresa', '$atividadeResponsabilidade', '$requisitos', '$data_publicacao_formatada')";

    if(mysqli_query($conn, $sql)){

    }

    }

}

?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/css/multi-select-tag.css">

    <link rel="stylesheet" href="src/css/cadastro_vagas.css">
    <title>Cadastre uma vaga</title>
    <script src="src/JS/cadastro_vagas.js" defer></script>
</head>
<body>
    <main class="content">
    <section class="cadastro-vagas">
    <img class="logo" src="src/img/Logo_black.svg" alt="logo">

    <div class="titulo-info">
    <div class="circle">
    <span class="material-symbols-outlined">
    work
    </span>
    </div>
    <div class="informacoes">
    <p class="strong">Cadastrar Vagas</p>
    </div>
    </div>

     <form class="forms" action="cadastro_vagas.php" method="POST">
    <h2 class="titulo">Informações da Vaga</h2>

    <div class="box-select">
    <label for="skill-vaga">Skill da Vaga</label>
    <select name="skill-vaga" id="skill-vaga">
    <option></option>
    <option value="front-end">Front-end</option>
    <option value="back-end">Back-end</option>
    <option value="fullstack">FullStack</option>
    </select>
    <span class="erros"></span>
    </div>

    <div class="box">
    <input type="text" name="titulo-vaga" id="titulo-vaga">
    <label for="titulo-vaga">Titulo da vaga</label>
    <a></a>
    </div>
    
    <div class="box-tec">
    <h2 class="titulo">Tecnologias</hw>
    <select name="tecnologias[]" id="tec" multiple>
    <option value="front-end">Front-End</option>
    <option value="a.net">A.NET</option>
    <option value="abap">ABAP</option>
    <option value="actionscript">ActionScript</option>
    <option value="ada">Ada</option>
    <option value="algol_68">ALGOL 68</option>
    <option value="assembly_language">Assembly language</option>
    <option value="react">React js</option>
    <option value="react_native">React-native</option>
    <option value="vue">Vue</option>
    <option value="angular">Angular</option>
    <option value="bash">Bash</option>
    <option value="c">C</option>
    <option value="c++">C++</option>
    <option value="c#">C#</option>
    <option value="cobol">COBOL</option>
    <option value="dart">Dart</option>
    <option value="elixir">Elixir</option>
    <option value="erlang">Erlang</option>
    <option value="fortran">Fortran</option>
    <option value="go">Go</option>
    <option value="haskell">Haskell</option>
    <option value="java">Java</option>
    <option value="javaScript">JavaScript</option>
    <option value="kotlin">Kotlin</option>
    <option value="lua">Lua</option>
    <option value="matlab">MATLAB</option>
    <option value="objective-C">Objective-C</option>
    <option value="pascal">Pascal</option>
    <option value="perl">Perl</option>
    <option value="php">PHP</option>
    <option value="node">Node</option>
    <option value="python">Python</option>
    <option value="r">R</option>
    <option value="ruby">Ruby</option>
    <option value="rust">Rust</option>
    <option value="scala">Scala</option>
    <option value="swift">Swift</option>
    <option value="typeScript">TypeScript</option>
    <option value="back-end">Back-End</option>
    <option value="oracle">Oracle</option>
    <option value="mysql">MySQL</option>
    <option value="sql_server">SQL Server</option>
    <option value="postgresql">PostgreSQL</option>
    <option value="mongodb">MongoDB</option>
    <option value="redis">Redis</option>
    <option value="elasticsearch">Elasticsearch</option>
    <option value="ibm_db2">IBM Db2</option>
    <option value="snowflake">Snowflake</option>
    <option value="sqlite">SQLite</option>
    <option value="access">Access</option>
    <option value="cassandra">Cassandra</option>
    <option value="mariadb">MariaDB</option>
    <option value="splunk">Splunk</option>
    <option value="databricks">Databricks</option>
    <option value="azure">Azure SQL</option>
    <option value="dynamodb">DynamoDB</option>
    <option value="hive">Hive</option>
    <option value="bigquery">BigQuery</option>
    <option value="filemaker">FileMaker</option>
    <option value="teradata">Teradata</option>
    <option value="sap_hana">SAP HANA</option>
    <option value="neo4j">Neo4j</option>
    <option value="django">Django </option>
    <option value="spring">Spring </option>
    <option value="ruby_on_rails">Ruby on Rails</option>
    <option value="laravel">Laravel</option>
    <option value="asp_net">ASP.NET</option>
    <option value="express_js">Express js</option>
    <option value="flask">Flask</option>
    <option value="cakephp">CakePHP</option>
    <option value="koa">Koa </option>
    <option value="phoenix">Phoenix</option>
    <option value="fullstack">Full-Stack</option>
    <option value="nuxt">Nuxt.js</option>
    <option value="gatsby">Gatsby</option>
    <option value="tailwind">Tailwind CSS</option>
    <option value="html">HTML</option>
    <option value="bootstrap">Bootstrap</option>
    <option value="foundation">Foundation</option>
    <option value="materialize">Materialize</option>
    <option value="semantic_ui">Semantic UI:</option>
    <option value="pure_css">Pure.CSS</option>
    <option value="skeleton">Skeleton</option>
    <option value="uiKit">UIKit</option>
    <option value="milligram">Milligram</option>
    <option value="sass">Sass</option>
    <option value="less">Less</option>
    <option value="stylus">Stylus</option>
    <option value="postcss">PostCss</option>
    <option value="stylable">Stylable</option>
    <option value="stylis">Stylis</option>
    <option value="clay">Clay</option>
    <option value="css_crush">Css Crush</option>
    <option value="css">Css</option>
    </select>
    </div>

    <div class="box-data">
    <label for="data-encerramento">Data de Encerramento</label>
    <input type="date" name="data-encerramento" id="data-encerramento">
    <span class="erros"></span>
    </div>
    
    <h2 class="titulo">Sobre a Empresa</h2>
    
    <div class="box">
    <input type="text" name="nome-empresa" id="nome-empresa">
    <label for="nome-empresa">Nome da Empresa</label>
    <a></a>
    </div>
    
    <div class="box-select">
    <label for="tamanho-empresa">Tamanho Empresa</label>
    <select name="tamanho-empresa" id="tamanho-empresa">
    <option></option>
    <option value="microempresa">Startup</option>
    <option value="grande-empresa">Grande empresa</option>
    <option value="pequena-media">Pequena/Média empresa</option>
    </select>
    <a></a>
    </div>

    <div class="box-select">
    <label for="modelo-trabalho">Modelo de Trabalho</label>
    <select name="modelo-trabalho" id="modelo-trabalho">
    <option></option>
    <option value="Home-office(remoto)">Home Office (REMOTO)</option>
    <option value="Home-office">Home Office</option>
    <option value="hibrido">Hibrido</option>
    <option value="Presencial">Presencial</option>
    </select>
    </div>

    <h2 class="titulo">Detalhes</h2>
    <div class="box">
    <p>R&#36:</p>
    <input type="text" name="salario" id="salario">
    <label for="salario">Salario R&#36;</label>
    <a></a>
    </div>

    <div class="box-select">
    <label for="tipo-contrato">Tipo de Contrato</label>
    <select name="tipo-contrato" id="tipo-contrato">
    <option></option>
    <option value="estagio">Estagio</option>
    </select>
    </div>
    
    <h2 class="titulo">Descrição da Empresa</h2>

    <textarea class="textarea" name="desc-empresa" placeholder="Escreva" id="desc-empresa" cols="30" rows="10"></textarea>

    <h2 class="titulo">Atividades e Responsabilidade</h2>

    <textarea class="textarea" name="atividade-responsabilidade" placeholder="Escreva" id="atividade-responsabilidade" cols="30" rows="10"></textarea >

    <h2 class="titulo">Requisitos</h2>

    <textarea class="textarea" name="Requisitos" placeholder="Escreva" id="Requisitos" cols="30" rows="10"></textarea>

    <div class="btns">
    <a href="dashboard_empresa.php" class="cancelar">
    Cancelar
    </a>

    <button class="cadastrar" type="submit"  name="submitCadastrar">
    Cadastrar
    </button>
    </div>
     </form>
    </section>
    </main>

    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/js/multi-select-tag.js"></script>

    <script>
    new MultiSelectTag('tec', {
    rounded: true,    // default true
    shadow: true,      // default false
    placeholder: 'Search',  // default Search...
    tagColor: {
    textColor: '#327b2c',
    borderColor: '#92e681',
    bgColor: '#eaffe6',
    },
    onChange: function(values) {
        console.log(values)
    }
})
</script>
</body>
</html>