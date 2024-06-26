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
    <title>Gestão de candidato</title>

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
    <h1>Gestão de candidato</h1>
    
    <div class="box">
    <input type="search" name="search" id="search" placeholder="Pesquisar">
    <button onclick="searchData()" class="btn-pesquisar">Pesquisar</button>
</div>

<div class="qnt">
    <?php 
    
    $sql_CC = "SELECT COUNT(ID_candidato) AS Quantidade_Candidato FROM candidato WHERE Tipo_usuario <> 'adm'";
    $result_CC = mysqli_query($conn, $sql_CC);

    if($result_CC && mysqli_num_rows($result_CC) > 0){
    $linha_CC = mysqli_fetch_assoc($result_CC);
    $Quantidade_Candidato = $linha_CC["Quantidade_Candidato"];

    echo "<span class=\"vagas\"><strong>$Quantidade_Candidato candidatos </strong>encontradas</span>";
}

    ?>

    </div>
    <div class="body-table">
    <table>
    <thead>
    <tr>
        <th>Nome Empresa</th>
        <th>CNPJ</th>
        <th>Telefone</th>
        <th>Quantidade estagiarios</th>
        <th>Tamanho</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <?php 
    if((isset($_SESSION["Tipo_usuario"]) == "adm" ) && (isset($_SESSION["senha"]))){
        

    if(!empty($_GET["search"])){
        $data = mysqli_real_escape_string($conn, $_GET['search']);

        $sql = "SELECT * FROM candidato WHERE Tipo_usuario <> 'adm' AND (Nome LIKE '%$data%' OR Sobrenome LIKE '%$data%' OR Email LIKE '%$data%' OR Telefone LIKE '%$data%' OR CPF LIKE '%$data%')";
        $result = mysqli_query($conn, $sql);
        
    
        if($result && mysqli_num_rows($result) > 0){
            while($linha = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>" . $linha["Nome"] . "</td>";
                echo "<td>" . $linha["Sobrenome"] . "</td>";
                echo "<td>" . $linha["Email"] . "</td>";
                echo "<td>" . $linha["Telefone"] . "</td>";
                echo "<td>" . $linha["CPF"] . "</td>";
            }
        }

    }else{

        $sql = "SELECT * FROM candidato WHERE Tipo_usuario <> 'adm'";
        $result = mysqli_query($conn, $sql);
    
    
        if($result && mysqli_num_rows($result) > 0){
            while($linha = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>" . $linha["Nome"] . "</td>";
                echo "<td>" . $linha["Sobrenome"] . "</td>";
                echo "<td>" . $linha["Email"] . "</td>";
                echo "<td>" . $linha["Telefone"] . "</td>";
                echo "<td>" . $linha["CPF"] . "</td>";
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
        window.location = "tela_gestao_candidatos.php?search="+search.value;
    }
   </script>
</html>