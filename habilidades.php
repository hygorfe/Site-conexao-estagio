<?php 
session_start();
require_once "config.php";


if(isset($_POST["btnSalvar"])){
    
    $tecnologias = implode(", ", $_POST["tecnologias"]);;
    $sobreVc = trim( $_POST["sobreVc"]);

    $email = $_SESSION["email"];

    $sql = "SELECT ID_candidato FROM candidato WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0){
        $linha = mysqli_fetch_assoc($result);
        $ID_candidato = $linha["ID_candidato"];
        

    $sql = "SELECT * FROM habilidades WHERE FK_candidatoHab = '$ID_candidato'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){

    $sql = "UPDATE habilidades SET tecnologias = '$tecnologias', sobre = '$sobreVc' WHERE FK_candidatoHab = '$ID_candidato'";
    }
    else{

    $sql = "INSERT INTO habilidades (FK_candidatoHab, tecnologias, sobre) VALUES ('$ID_candidato', '$tecnologias', '$sobreVc')";
    }

    if(mysqli_query($conn, $sql)){
        
    }
  }
}


if((isset($_SESSION["email"]) && (isset($_SESSION["senha"])))){

    $email = $_SESSION["email"];

    $sql = "SELECT ID_candidato FROM candidato WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    

    if(mysqli_num_rows($result) > 0){
    $linha = mysqli_fetch_assoc($result);
    $ID_candidato = $linha["ID_candidato"];

    $sql = "SELECT tecnologias, sobre FROM habilidades WHERE FK_candidatoHab = (SELECT ID_candidato FROM candidato WHERE ID_candidato = '$ID_candidato')"; 
    $result = mysqli_query($conn, $sql);   
    
    $tecnologias = [];
    $sobreVc = "";

    if ($result && mysqli_num_rows($result) > 0) {
        $linha = mysqli_fetch_assoc($result);
        if ($linha["tecnologias"]) {
            $tecnologias = explode(", ", $linha["tecnologias"]);
        }
        if ($linha["sobre"] !== null) {
            $sobreVc = trim($linha["sobre"]);
        }
        }
  }
}else{
    unset($_SESSION["email"]);
    unset($_SESSION["senha"]);
    header("Location: tela_de_vagas.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/css/multi-select-tag.css">

    <link rel="stylesheet" href="src/css/habilidade.css">
    <title>Meu Perfil | Habilidades</title>
    <script src="src/JS/habilidades.js" defer></script>
</head>
<body>
    <main class="content">
    <section class="habilidades">
    <img class="logo" src="src/img/Logo_black.svg" alt="logo">

    <div class="titulo">
    <div class="circle">
    <span class="material-symbols-outlined">
    Star
    </span>
    </div>
    <div class="informacoes">
    <p class="step">Passo 04 de 04</p>
    <p class="strong">Habilidades</p>
    </div>
    </div>


    <form class="forms" action="habilidades.php" method="POST">
    <div class="box-tec">
    <label for="tecnologias">Tecnologias</label>
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

    <div class="tags-container">
    <div class="tag">
    
    </div>
    </div>
    </div>

    <h2 class="subtitulo">
    Sobre você
    </h2>

    <textarea class="textarea" name="sobreVc" id="sobre-vc" cols="30" rows="10"  placeholder="Escreva">
    <?php 
    echo $sobreVc
    
    ?>
    </textarea>

    <div class="btns">
    <a href="dashboard_candidato.php" class="cancelar">
    Cancelar
    </a>
    <button type="submit"  name="btnSalvar" class="salvar">
    Salvar
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