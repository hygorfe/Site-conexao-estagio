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
    <title>Gestão de vagas</title>

</head>

<body>
    <header>
    <header class="cabecalho">
    <a href="dashboard_adm.php"><img class="logo" src="src/img/logo.svg" alt="logo Conexão Estagios"></a>
    <a href="dashboard_adm.php" class="btn-sair">
    Sair
    </a>
    </header>
    </header>

    <main>
    <h1>Gestão de vagas</h1>
    
    <div class="box">
    <input type="search" name="search" id="search" placeholder="Pesquisar">
    <button onclick="searchData()" class="btn-pesquisar">Pesquisar</button>
    </div>

    <div class="qnt">
    <?php 
    
    $sql = "SELECT COUNT(ID_CadastroVagas) as Quantidade_Vagas FROM cadastro_vagas";
    $result = mysqli_query($conn, $sql);


    if($result && mysqli_num_rows($result) > 0){
        $linha = mysqli_fetch_assoc($result);
        $Quantidade_Vagas = $linha["Quantidade_Vagas"];

        echo "<span class=\"vagas\"><strong>$Quantidade_Vagas vagas </strong>encontradas</span>";
    }

    
    
    
    
    
    ?>
    </div>
    <div class="body-table">
    <table>
    <thead>
    <tr>
        <th>Nome Empresa</th>
        <th>Titulo</th>
        <th>Skill</th>
        <th>Tecnologias</th>
        <th>Tamanho</th>
        <th>Modelo</th>
        <th>Data de publicação</th>
        <th>....</th>

    </tr>
    </thead>
    <tbody>
    <tr>
    <?php 
    if((isset($_SESSION["Tipo_usuario"]) == "adm" ) && (isset($_SESSION["senha"]))){
        

    if(!empty($_GET["search"])){
        $data = mysqli_real_escape_string($conn, $_GET['search']);

        $sql = "SELECT * FROM cadastro_vagas WHERE nome_empresa LIKE '%$data%' OR titulo_vaga LIKE '%$data%' OR skill_vaga LIKE '%$data%' OR tecnologias LIKE '%$data%' OR tamanho_empresa LIKE '%$data%' OR modelo_trabalho LIKE '%$data%'";
        $result = mysqli_query($conn, $sql);
        


    
        if($result && mysqli_num_rows($result) > 0){
            while($linha = mysqli_fetch_assoc($result)){
                $ID_CadastroVagas = $linha["ID_CadastroVagas"];
                echo "<tr>";
                echo "<td>" . $linha["nome_empresa"] . "</td>";
                echo "<td>" . $linha["titulo_vaga"] . "</td>";
                echo "<td>" . $linha["skill_vaga"] . "</td>";
                echo "<td>" . $linha["tecnologias"] . "</td>";
                echo "<td>" . $linha["tamanho_empresa"] . "</td>";
                echo "<td>" . $linha["modelo_trabalho"] . "</td>";
                echo "<td>" . $linha["data_publicacao"] . "</td>";
                echo "<td><div class=\"btn\">
                <a href=\"edit_gestao_vagas.php?id=$ID_CadastroVagas\">
                <span class=\"material-symbols-outlined\">
                edit
                </span>
                </a>
                <a href=\"delete_gestao_vagas.php?id=$ID_CadastroVagas\">
                <span class=\"material-symbols-outlined\">
                Delete
                </span>
                </a>
                </div>
                </td>";
                echo "";
                }
        }


    }else{

        $sql = "SELECT * FROM cadastro_vagas";
        $result = mysqli_query($conn, $sql);
    
    
        if($result && mysqli_num_rows($result) > 0){
            while($linha = mysqli_fetch_assoc($result)){
                $ID_CadastroVagas = $linha["ID_CadastroVagas"];
                echo "<tr>";
                echo "<td>" . $linha["nome_empresa"] . "</td>";
                echo "<td>" . $linha["titulo_vaga"] . "</td>";
                echo "<td>" . $linha["skill_vaga"] . "</td>";
                echo "<td>" . $linha["tecnologias"] . "</td>";
                echo "<td>" . $linha["tamanho_empresa"] . "</td>";
                echo "<td>" . $linha["modelo_trabalho"] . "</td>";
                echo "<td>" . $linha["data_publicacao"] . "</td>";
                echo "<td><div class=\"btn\">
                <a href=\"edit_gestao_vagas.php?id=$ID_CadastroVagas\">
                <span class=\"material-symbols-outlined\">
                edit
                </span>
                </a>
                <a href=\"delete_gestao_vagas.php?id=$ID_CadastroVagas\">
                <span class=\"material-symbols-outlined\">
                Delete
                </span>
                </a>
                </div>
                </td>";
                echo "";
                }
            }
        }
    }else{
    unset($_SESSION["emailEmpresa"]);
    unset($_SESSION["senha"]);
    header("Location: tela_de_login.php");
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
        window.location = "tela_gestao_vagas.php?search="+search.value;
    }
   </script>
</html>