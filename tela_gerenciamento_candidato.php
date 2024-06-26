<?php 
session_start();
require_once "config.php";
?>


<!DOCTYPE html>
<html lang="br-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="src/css/tela_gerenciamento_vagas.css">
    <title>Gerenciamento de candidatos</title>

</head>

<body>
    <header>
    <header class="cabecalho">
    <a href="dashboard_empresa.php"><img class="logo" src="src/img/logo.svg" alt="logo Conexão Estagios"></a>
    <a href="dashboard_empresa.php" class="btn-sair">
    Sair
    </a>
    </header>
    </header>

    <main>
    <h1>Gerenciamento de candidatos</h1>
    
    <div class="box">
    <input type="search" name="search" id="search" placeholder="Pesquisar">
    <button onclick="searchData()" class="btn-pesquisar">Pesquisar</button>
</div>
    <div class="body-table">
    <table>
    <thead>
    <tr>
        <th>Nome</th>
        <th>Sobrenome</th>
        <th>Celular</th>
        <th>CPF</th>
        <th>Skill</th>
        <th>Titulo</th>
        <th>...</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <?php 



if(isset($_SESSION["emailEmpresa"]) && isset($_SESSION["senha"])){
    $emailEmpresa = $_SESSION["emailEmpresa"];

    if(!empty($_GET["search"])) {
        $data = mysqli_real_escape_string($conn, $_GET['search']);

    $sql = "SELECT DISTINCT candidato.ID_candidato, candidato.Nome, candidato.Sobrenome, candidato.Email, candidato.Telefone, candidato.CPF, cadastro_vagas.skill_vaga, cadastro_vagas.titulo_vaga
            FROM aplicacao 
            INNER JOIN candidato ON aplicacao.FK_ID_candidato = candidato.ID_candidato 
            INNER JOIN cadastro_vagas ON aplicacao.FK_ID_CadastroVagas = cadastro_vagas.ID_cadastroVagas 
            WHERE cadastro_vagas.FK_empresa_vagas = (SELECT ID_empresa_cad FROM empresa_cad WHERE email_empresa = '$emailEmpresa') AND (candidato.Nome LIKE '%$data%' OR cadastro_vagas.skill_vaga LIKE '%$data%' OR cadastro_vagas.titulo_vaga LIKE '%$data%')";
            $resultado = mysqli_query($conn, $sql);

    if(mysqli_num_rows($resultado) > 0){
        while($linha = mysqli_fetch_assoc($resultado)){
            $ID_candidato = $linha["ID_candidato"];
            echo "<tr>";
            echo "<td>" . $linha["Nome"] . "</td>";
            echo "<td>" . $linha["Sobrenome"] . "</td>";
            echo "<td>" . $linha["Telefone"] . "</td>";
            echo "<td>" . $linha["CPF"] . "</td>";
            echo "<td>" . $linha["skill_vaga"] . "</td>";
            echo "<td>" . $linha["titulo_vaga"] . "</td>";
            echo "<td><div class=\"btn\">
            <a href=\"Curriculo.php?id=$ID_candidato\">
            <span class=\"material-symbols-outlined\">
            article
            </span>
            </a>
            </div>
            </td>";
            echo "";
        }
     } 
  }else{
    $sql = "SELECT DISTINCT candidato.ID_candidato, candidato.Nome, candidato.Sobrenome, candidato.Email, candidato.Telefone, candidato.CPF, cadastro_vagas.skill_vaga, cadastro_vagas.titulo_vaga
            FROM aplicacao 
            INNER JOIN candidato ON aplicacao.FK_ID_candidato = candidato.ID_candidato 
            INNER JOIN cadastro_vagas ON aplicacao.FK_ID_CadastroVagas = cadastro_vagas.ID_cadastroVagas 
            WHERE cadastro_vagas.FK_empresa_vagas = (SELECT ID_empresa_cad FROM empresa_cad WHERE email_empresa = '$emailEmpresa')";
            $resultado = mysqli_query($conn, $sql);

    if(mysqli_num_rows($resultado) > 0){
        while($linha = mysqli_fetch_assoc($resultado)){
            $ID_candidato = $linha["ID_candidato"];
            echo "<tr>";
            echo "<td>" . $linha["Nome"] . "</td>";
            echo "<td>" . $linha["Sobrenome"] . "</td>";
            echo "<td>" . $linha["Telefone"] . "</td>";
            echo "<td>" . $linha["CPF"] . "</td>";
            echo "<td>" . $linha["skill_vaga"] . "</td>";
            echo "<td>" . $linha["titulo_vaga"] . "</td>";
            echo "<td><div class=\"btn\">
            <a href=\"Curriculo.php?id=$ID_candidato\">
            <span class=\"material-symbols-outlined\">
            article
            </span>
            </a>
            </div>
            </td>";
        }
    } 
  }
}else{
    unset($_SESSION["emailEmpresa"]);
    unset($_SESSION["senha"]);
    header("Location: tela_de_login_empresa.php");
    exit;
}
?>
    </tr>
    </tbody>
    </table>
    </div>
    </main>
    <footer>
        <p>&copy; 2024 Conexão Estagios</p>
    </footer>
</body>
<script>
    var search = document.getElementById('search');
    var data = document.getElementById('data');
    search.addEventListener('keypress', function(event){
        if(event.key === "Enter"){
            console.log('apertou')
            searchData();
        }

        });

    function searchData(){
        window.location = "tela_gerenciamento_candidato.php?search="+search.value;
    }
   </script>
</html>