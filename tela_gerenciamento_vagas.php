<?php 
session_start();
require_once "config.php";
// print_r($_SESSION);

if(isset($_SESSION["emailEmpresa"]) && (isset($_SESSION["senha"]))){
    
    $emailEmpresa = $_SESSION["emailEmpresa"];


    $sql  = "SELECT * FROM empresa_cad WHERE email_empresa = '$emailEmpresa'";
    $result = mysqli_query($conn, $sql);
    
    if($result){
        $linha = mysqli_fetch_assoc($result);
        $ID_empresa_cad = $linha["ID_empresa_cad"];

    }

    $sql = "SELECT * FROM cadastro_vagas WHERE FK_empresa_vagas = (SELECT ID_empresa_cad FROM empresa_cad WHERE email_empresa = '$emailEmpresa')";
    $resultado = mysqli_query($conn, $sql);


}else{
    unset($_SESSION["emailEmpresa"]);
    unset($_SESSION["senha"]);
    header("Location: tela_de_login_empresa.php");
    exit;
}





?>


<!DOCTYPE html>
<html lang="br-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="src/css/tela_gerenciamento_vagas.css">
    <title>Gerenciamento de vagas</title>

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
    <h1>Gerenciamento de vagas</h1>
    
    <div class="box">
    <input type="search" name="search" id="search" placeholder="Pesquisar">
    <button onclick="searchData()" class="btn-pesquisar">Pesquisar</button>
    </div>

    <div class="body-table">
    <table>
    <thead>
    <tr>
    <th>Skill</th>
    <th>Titulo</th>
    <th>Tecnologias</th>
    <th>Data de encerramento</th>
    <th>Tamanho da empresa</th>
    <th>salario</th>
    <th>...</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <?php 

    if(!empty($_GET["search"])) {
    $data = mysqli_real_escape_string($conn, $_GET['search']);
    
    $sql = "SELECT * FROM cadastro_vagas WHERE FK_empresa_vagas = (SELECT ID_empresa_cad FROM empresa_cad WHERE email_empresa = '$emailEmpresa') AND (skill_vaga LIKE '%$data%' OR titulo_vaga LIKE '%$data%' OR tecnologias LIKE '%$data%' OR data_encerramento LIKE '%$data%')";
    $resultado = mysqli_query($conn, $sql);
    
    if($resultado){
        while($linha = mysqli_fetch_assoc($resultado)){
            $ID_CadastroVagas = $linha["ID_CadastroVagas"];
            echo "<tr>";
            echo "<td>".$linha["skill_vaga"]."</td>";
            echo "<td>".$linha["titulo_vaga"]."</td>";
            echo "<td>".$linha["tecnologias"]."</td>";
            echo "<td>".$linha["data_encerramento"]."</td>";
            echo "<td>".$linha["tamanho_empresa"]."</td>";
            echo "<td>".$linha["salario"]."</td>";
            echo "<td><div class=\"btn\">
            <a href=\"Editcadastro_vaga.php?id=$ID_CadastroVagas\">
            <span class=\"material-symbols-outlined\">
            edit
            </span>
            </a>
            <a href=\"deleteVaga.php?id=$ID_CadastroVagas\">
            <span class=\"material-symbols-outlined\">
            Delete
            </span>
            </a>
            </div>
            </td>";
        }

    }
    }else{
        $sql = "SELECT * FROM cadastro_vagas WHERE FK_empresa_vagas = (SELECT ID_empresa_cad FROM empresa_cad WHERE email_empresa = '$emailEmpresa')";
        $result = mysqli_query($conn, $sql);

        if($result){
            while($linha = mysqli_fetch_assoc($resultado)){
                $ID_CadastroVagas = $linha["ID_CadastroVagas"];
                echo "<tr>";
                echo "<td>".$linha["skill_vaga"]."</td>";
                echo "<td>".$linha["titulo_vaga"]."</td>";
                echo "<td>".$linha["tecnologias"]."</td>";
                echo "<td>".$linha["data_encerramento"]."</td>";
                echo "<td>".$linha["tamanho_empresa"]."</td>";
                echo "<td>".$linha["salario"]."</td>";
                echo "<td><div class=\"btn\">
                <a href=\"Editcadastro_vaga.php?id=$ID_CadastroVagas\">
                <span class=\"material-symbols-outlined\">
                edit
                </span>
                </a>
                <a href=\"deleteVaga.php?id=$ID_CadastroVagas\">
                <span class=\"material-symbols-outlined\">
                Delete
                </span>
                </a>
                </div>
                </td>";
        }
      }
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
        window.location = "tela_gerenciamento_vagas.php?search="+search.value;
    }
    
   </script>
</html>