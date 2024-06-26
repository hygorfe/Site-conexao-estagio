<?php 
session_start();
require_once "config.php";

if(isset($_GET["id"])){
    
    $emailEmpresa = $_SESSION["emailEmpresa"];
    $ID_CadastroVagas = $_GET["id"];


    $sql = "SELECT * FROM empresa_cad WHERE email_empresa = '$emailEmpresa'";
    $resultado = mysqli_query($conn, $sql);

    
// 
    $sql = "SELECT * FROM cadastro_vagas WHERE ID_CadastroVagas = '$ID_CadastroVagas'";
    $result = mysqli_query($conn, $sql);


    if($result){
        $linha = mysqli_fetch_assoc($result);
        $skillVaga = $linha["skill_vaga"];
        $tituloVaga = $linha["titulo_vaga"];
        $tecnologias = explode(",", $linha["tecnologias"]);
        $dataEncerramento = $linha["data_encerramento"];
        $nomeEmpresa = $linha["nome_empresa"];
        $tamanhoEmpresa = $linha["tamanho_empresa"];
        $modeloTrabalho = $linha["modelo_trabalho"];
        $salario = $linha["salario"];
        $tipoContrato = $linha["tipo_contrato"];
        $descEmpresa = $linha["descricao"];
        $atividadeResponsabilidade = $linha["atividades"];
        $requisitos = $linha["requisitos"];
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

    <form class="forms" action="cadastro_vagas_Editsave.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $ID_CadastroVagas?>">
    <h2 class="titulo">Informações da Vaga</h2>
    <div class="box-select">
    <label for="skill-vaga">Skill da Vaga</label>
    <select name="skill-vaga" id="skill-vaga">
    <option></option>
    <option value="front-end" <?php if($skillVaga === 'front-end') echo 'Selected'; ?>>Front-end</option>
    <option value="back-end" <?php if($skillVaga === 'back-end') echo 'Selected'; ?>>Back-end</option>
    <option value="fullstack" <?php if($skillVaga === 'fullstack') echo 'Selected'; ?>>FullStack</option>
    </select>
    <span class="erros"></span>
    </div>

    <div class="box">
    <input type="text" name="titulo-vaga" id="titulo-vaga" value="<?php echo $tituloVaga;?>">
    <label for="titulo-vaga">Titulo da vaga</label>
    <a></a>
    </div>
    
    <div class="box-tec">
    <h2 class="titulo">Tecnologias</hw>
    <select name="tecnologias[]" id="tec" multiple>
    <option value="front-end" <?php if(in_array('front-end', $tecnologias)) echo 'selected'; ?>>Front-End</option>
    <option value="a.net"<?php if(in_array('a.net', $tecnologias)) echo 'selected'; ?>>A.NET</option>
    <option value="abap"<?php if(in_array('abap', $tecnologias)) echo 'selected'; ?>>ABAP</option>
    <option value="actionscript"<?php if(in_array('actionscript', $tecnologias)) echo 'selected'; ?>>ActionScript</option>
    <option value="ada"<?php if(in_array('ada', $tecnologias)) echo 'selected'; ?>>Ada</option>
    <option value="algol_68"<?php if(in_array('algol_68', $tecnologias)) echo 'selected'; ?>>ALGOL 68</option>
    <option value="assembly_language"<?php if(in_array('assembly_language', $tecnologias)) echo 'selected'; ?>>Assembly language</option>
    <option value="bash"<?php if(in_array('bash', $tecnologias)) echo 'selected'; ?>>Bash</option>
    <option value="c"<?php if(in_array('c', $tecnologias)) echo 'selected'; ?>>C</option>
    <option value="c++"<?php if(in_array('c++', $tecnologias)) echo 'selected'; ?>>C++</option>
    <option value="c#"<?php if(in_array('c#', $tecnologias)) echo 'selected'; ?>>C#</option>
    <option value="cobol"<?php if(in_array('cobol', $tecnologias)) echo 'selected'; ?>>COBOL</option>
    <option value="dart"<?php if(in_array('dart', $tecnologias)) echo 'selected'; ?>>Dart</option>
    <option value="elixir"<?php if(in_array('elixir', $tecnologias)) echo 'selected'; ?>>Elixir</option>
    <option value="erlang"<?php if(in_array('erlang', $tecnologias)) echo 'selected'; ?>>Erlang</option>
    <option value="fortran"<?php if(in_array('fortran', $tecnologias)) echo 'selected'; ?>>Fortran</option>
    <option value="go"<?php if(in_array('go', $tecnologias)) echo 'selected'; ?>>Go</option>
    <option value="haskell"<?php if(in_array('haskell', $tecnologias)) echo 'selected'; ?>>Haskell</option>
    <option value="java"<?php if(in_array('java', $tecnologias)) echo 'selected'; ?>>Java</option>
    <option value="javaScript"<?php if(in_array('javaScript', $tecnologias)) echo 'selected'; ?>>JavaScript</option>
    <option value="kotlin"<?php if(in_array('kotlin', $tecnologias)) echo 'selected'; ?>>Kotlin</option>
    <option value="lua"<?php if(in_array('lua', $tecnologias)) echo 'selected'; ?>>Lua</option>
    <option value="matlab"<?php if(in_array('matlab', $tecnologias)) echo 'selected'; ?>>MATLAB</option>
    <option value="objective-C"<?php if(in_array('objective-C', $tecnologias)) echo 'selected'; ?>>Objective-C</option>
    <option value="pascal"<?php if(in_array('pascal', $tecnologias)) echo 'selected'; ?>>Pascal</option>
    <option value="perl"<?php if(in_array('perl', $tecnologias)) echo 'selected'; ?>>Perl</option>
    <option value="php"<?php if(in_array('php', $tecnologias)) echo 'selected'; ?>>PHP</option>
    <option value="node"<?php if(in_array('node', $tecnologias)) echo 'selected'; ?>>Node</option>
    <option value="python"<?php if(in_array('python', $tecnologias)) echo 'selected'; ?>>Python</option>
    <option value="r"<?php if(in_array('r', $tecnologias)) echo 'selected'; ?>>R</option>
    <option value="ruby"<?php if(in_array('ruby', $tecnologias)) echo 'selected'; ?>>Ruby</option>
    <option value="rust"<?php if(in_array('rust', $tecnologias)) echo 'selected'; ?>>Rust</option>
    <option value="scala"<?php if(in_array('scala', $tecnologias)) echo 'selected'; ?>>Scala</option>
    <option value="swift"<?php if(in_array('swift', $tecnologias)) echo 'selected'; ?>>Swift</option>
    <option value="typeScript"<?php if(in_array('typeScript', $tecnologias)) echo 'selected'; ?>>TypeScript</option>
    <option value="back-end"<?php if(in_array('back-end', $tecnologias)) echo 'selected'; ?>>Back-End</option>
    <option value="oracle"<?php if(in_array('oracle', $tecnologias)) echo 'selected'; ?>>Oracle</option>
    <option value="mysql"<?php if(in_array('mysql', $tecnologias)) echo 'selected'; ?>>MySQL</option>
    <option value="sql_server"<?php if(in_array('sql_server', $tecnologias)) echo 'selected'; ?>>SQL Server</option>
    <option value="postgresql"<?php if(in_array('postgresql', $tecnologias)) echo 'selected'; ?>>PostgreSQL</option>
    <option value="mongodb"<?php if(in_array('mongodb', $tecnologias)) echo 'selected'; ?>>MongoDB</option>
    <option value="redis"<?php if(in_array('redis', $tecnologias)) echo 'selected'; ?>>Redis</option>
    <option value="elasticsearch"<?php if(in_array('elasticsearch', $tecnologias)) echo 'selected'; ?>>Elasticsearch</option>
    <option value="ibm_db2"<?php if(in_array('ibm_db2', $tecnologias)) echo 'selected'; ?>>IBM Db2</option>
    <option value="snowflake"<?php if(in_array('snowflake', $tecnologias)) echo 'selected'; ?>>Snowflake</option>
    <option value="sqlite"<?php if(in_array('sqlite', $tecnologias)) echo 'selected'; ?>>SQLite</option>
    <option value="access"<?php if(in_array('access', $tecnologias)) echo 'selected'; ?>>Access</option>
    <option value="cassandra"<?php if(in_array('cassandra', $tecnologias)) echo 'selected'; ?>>Cassandra</option>
    <option value="mariadb"<?php if(in_array('mariadb', $tecnologias)) echo 'selected'; ?>>MariaDB</option>
    <option value="splunk"<?php if(in_array('splunk', $tecnologias)) echo 'selected'; ?>>Splunk</option>
    <option value="databricks"<?php if(in_array('databricks', $tecnologias)) echo 'selected'; ?>>Databricks</option>
    <option value="azure"<?php if(in_array('azure', $tecnologias)) echo 'selected'; ?>>Azure SQL</option>
    <option value="dynamodb"<?php if(in_array('dynamodb', $tecnologias)) echo 'selected'; ?>>DynamoDB</option>
    <option value="hive"<?php if(in_array('hive', $tecnologias)) echo 'selected'; ?>>Hive</option>
    <option value="bigquery"<?php if(in_array('bigquery', $tecnologias)) echo 'selected'; ?>>BigQuery</option>
    <option value="filemaker"<?php if(in_array('filemaker', $tecnologias)) echo 'selected'; ?>>FileMaker</option>
    <option value="react"<?php if(in_array('react', $tecnologias)) echo 'selected'; ?>>React js</option>
    <option value="react_native"<?php if(in_array('react_native', $tecnologias)) echo 'selected'; ?>>React-native</option>
    <option value="vue"<?php if(in_array('vue', $tecnologias)) echo 'selected'; ?>>Vue</option>
    <option value="angular"<?php if(in_array('angular', $tecnologias)) echo 'selected'; ?>>Angular</option>
    <option value="teradata"<?php if(in_array('teradata', $tecnologias)) echo 'selected'; ?>>Teradata</option>
    <option value="html"<?php if(in_array('html', $tecnologias)) echo 'selected'; ?>>HTML</option>
    <option value="sap_hana"<?php if(in_array('sap_hana', $tecnologias)) echo 'selected'; ?>>SAP HANA</option>
    <option value="css"<?php if(in_array('css', $tecnologias)) echo 'selected'; ?>>css</option>
    <option value="neo4j"<?php if(in_array('neo4j', $tecnologias)) echo 'selected'; ?>>Neo4j</option>
    <option value="django"<?php if(in_array('django', $tecnologias)) echo 'selected'; ?>>Django </option>
    <option value="spring"<?php if(in_array('spring', $tecnologias)) echo 'selected'; ?>>Spring </option>
    <option value="ruby_on_rails"<?php if(in_array('ruby_on_rails', $tecnologias)) echo 'selected'; ?>>Ruby on Rails</option>
    <option value="laravel"<?php if(in_array('laravel', $tecnologias)) echo 'selected'; ?>>Laravel</option>
    <option value="asp_net"<?php if(in_array('asp_net', $tecnologias)) echo 'selected'; ?>>ASP.NET</option>
    <option value="express_js"<?php if(in_array('express_js', $tecnologias)) echo 'selected'; ?>>Express js</option>
    <option value="flask"<?php if(in_array('flask', $tecnologias)) echo 'selected'; ?>>Flask</option>
    <option value="cakephp"<?php if(in_array('cakephp', $tecnologias)) echo 'selected'; ?>>CakePHP</option>
    <option value="koa"<?php if(in_array('koa', $tecnologias)) echo 'selected'; ?>>Koa </option>
    <option value="phoenix"<?php if(in_array('phoenix', $tecnologias)) echo 'selected'; ?>>Phoenix</option>
    <option value="fullstack"<?php if(in_array('fullstack', $tecnologias)) echo 'selected'; ?>>Full-Stack</option>
    <option value="nuxt"<?php if(in_array('nuxt', $tecnologias)) echo 'selected'; ?>>Nuxt.js</option>
    <option value="gatsby"<?php if(in_array('gatsby', $tecnologias)) echo 'selected'; ?>>Gatsby</option>
    <option value="tailwind"<?php if(in_array('tailwind', $tecnologias)) echo 'selected'; ?>>Tailwind CSS</option>
    <option value="bootstrap"<?php if(in_array('bootstrap', $tecnologias)) echo 'selected'; ?>>Bootstrap</option>
    <option value="foundation"<?php if(in_array('foundation', $tecnologias)) echo 'selected'; ?>>Foundation</option>
    <option value="materialize"<?php if(in_array('materialize', $tecnologias)) echo 'selected'; ?>>Materialize</option>
    <option value="semantic_ui"<?php if(in_array('semantic_ui', $tecnologias)) echo 'selected'; ?>>Semantic UI:</option>
    <option value="pure_css"<?php if(in_array('pure_css', $tecnologias)) echo 'selected'; ?>>Pure.CSS</option>
    <option value="skeleton"<?php if(in_array('skeleton', $tecnologias)) echo 'selected'; ?>>Skeleton</option>
    <option value="uiKit"<?php if(in_array('uiKit', $tecnologias)) echo 'selected'; ?>>UIKit</option>
    <option value="milligram"<?php if(in_array('milligram', $tecnologias)) echo 'selected'; ?>>Milligram</option>
    <option value="sass"<?php if(in_array('sass', $tecnologias)) echo 'selected'; ?>>Sass</option>
    <option value="less"<?php if(in_array('less', $tecnologias)) echo 'selected'; ?>>Less</option>
    <option value="stylus"<?php if(in_array('stylus', $tecnologias)) echo 'selected'; ?>>Stylus</option>
    <option value="postcss"<?php if(in_array('postcss', $tecnologias)) echo 'selected'; ?>>PostCss</option>
    <option value="stylable"<?php if(in_array('stylable', $tecnologias)) echo 'selected'; ?>>Stylable</option>
    <option value="stylis"<?php if(in_array('stylis', $tecnologias)) echo 'selected'; ?>>Stylis</option>
    <option value="clay"<?php if(in_array('clay', $tecnologias)) echo 'selected'; ?>>Clay</option>
    <option value="css_crush"<?php if(in_array('css_crush', $tecnologias)) echo 'selected'; ?>>Css Crush</option>
    </select>
    </div>

    <div class="box-data">
    <label for="data-encerramento">Data de Encerramento</label>
    <input type="date" name="data-encerramento" id="data-encerramento" value="<?php echo $dataEncerramento;?>">
    <span class="erros"></span>
    </div>
    
    <h2 class="titulo">Sobre a Empresa</h2>
    
    <div class="box">
    <input type="text" name="nome-empresa" id="nome-empresa" value="<?php echo $nomeEmpresa;?>">
    <label for="nome-empresa">Nome da Empresa</label>
    <a></a>
    </div>
    
    <div class="box-select">
    <label for="tamanho-empresa">Tamanho Empresa</label>
    <select name="tamanho-empresa" id="tamanho-empresa">
    <option></option>
    <option value="microempresa"<?php if($tamanhoEmpresa === 'microempresa') echo 'Selected'; ?>>Startup</option>
    <option value="grande-empresa"<?php if($tamanhoEmpresa === 'grande-empresa') echo 'Selected'; ?>>Grande empresa</option>
    <option value="pequena-media"<?php if($tamanhoEmpresa === 'pequena-media') echo 'Selected'; ?>>Pequena/Média empresa</option>
    </select>
    <a></a>
    </div>

    <div class="box-select">
    <label for="modelo-trabalho">Modelo de Trabalho</label>
    <select name="modelo-trabalho" id="modelo-trabalho">
    <option></option>
    <option value="Home-office(remoto)" <?php if($modeloTrabalho === 'Home-office(remoto)') echo 'Selected'?>>Home Office (REMOTO)</option>
    <option value="Home-office"<?php if($modeloTrabalho === 'Home-office') echo 'Selected'; ?>>Home Office</option>
    <option value="hibrido"<?php if($modeloTrabalho === 'hibrido') echo 'Selected'; ?>>Hibrido</option>
    <option value="Presencial"<?php if($modeloTrabalho === 'Presencial') echo 'Selected'; ?>>Presencial</option>
    </select>
    </div>

    <h2 class="titulo">Detalhes</h2>
    <div class="box">
    <p>R&#36:</p>
    <input type="text" name="salario" id="salario" value="<?php echo $salario?>">
    <label for="salario">Salario R&#36;</label>
    <a></a>
    </div>

    <div class="box-select">
    <label for="tipo-contrato">Tipo de Contrato</label>
    <select name="tipo-contrato" id="tipo-contrato">
    <option></option>
    <option value="estagio"<?php if($tipoContrato === 'estagio') echo 'Selected'; ?>>Estagio</option>
    </select>
    </div>
    
    <h2 class="titulo">Descrição da Empresa</h2>

    <textarea class="textarea" name="desc-empresa" placeholder="Escreva" id="desc-empresa" cols="30" rows="10"><?php echo $descEmpresa?></textarea>

    <h2 class="titulo">Atividades e Responsabilidade</h2>

    <textarea class="textarea" name="atividade-responsabilidade" placeholder="Escreva" id="atividade-responsabilidade" cols="30" rows="10"><?php echo $atividadeResponsabilidade?></textarea >

    <h2 class="titulo">Requisitos</h2>

    <textarea class="textarea" name="Requisitos" placeholder="Escreva" id="Requisitos" cols="30" rows="10"><?php echo $requisitos?></textarea>

    <div class="btns">
    <a href="tela_gerenciamento_vagas.php" class="cancelar">
    Cancelar
    </a>

    <button class="cadastrar" type="submit"  name="submitAtualizar">
    Atualizar
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
