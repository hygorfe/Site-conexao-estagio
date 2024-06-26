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
    <title>Log de acesso</title>

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
    <h1>Log de acesso</h1>
    
    <div class="box">
    <input type="search" name="search" id="search" placeholder="Pesquisar">
    <button onclick="searchData()" class="btn-pesquisar">Pesquisar</button>
</div>
    <div class="body-table">
    <table>
    <thead>
    <tr>
    <th>Nome</th>
    <th>Usuario</th>
    <th>Data e Hora</th>
    <th>2FA</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <?php 
    
    if((isset($_SESSION["Tipo_usuario"]) == "adm" ) && (isset($_SESSION["senha"]))){
    $email = $_SESSION["email"];

    $sql_C = "SELECT * FROM acesso_log_candidato";
    $resultado_C = mysqli_query($conn, $sql_C);
    
    if($resultado_C && mysqli_num_rows($resultado_C) > 0){
        while($linha = mysqli_fetch_assoc($resultado_C)){
            echo "<tr>";
            echo "<td>" . $linha["Nome"] . "</td>";
            echo "<td>" . $linha["Tipo_usuario"] . "</td>";
            echo "<td>" . $linha["Data_e_Hora"] . "</td>";
            echo "<td>" . $linha["2FA"] . "</td>";
            echo "</tr>";
        }

        $sql_E = "SELECT * FROM acesso_log_empresa";
        $resultado_E = mysqli_query($conn, $sql_E);

        if($resultado_E && mysqli_num_rows($resultado_E) > 0){
            while($resultado_E && $linha2 = mysqli_fetch_assoc($resultado_E)){
                echo "<tr>";
                echo "<td>" . $linha2["Nome"] . "</td>";
                echo "<td>" . $linha2["Tipo_usuario"] . "</td>";
                echo "<td>" . $linha2["Data_Hora"] . "</td>";
                echo "<td>" . $linha2["2FA"] . "</td>";
            }
        }


    }


//     $sql = "SELECT DISTINCT acesso_log_candidato.Tipo_usuario AS Tipo_usuario_candidato,
//     acesso_log_candidato.ID_acesso_log AS ID_acesso_log_candidato,
//     acesso_log_candidato.FK_candidato_acesso AS FK_candidato_acesso,
//     acesso_log_candidato.Nome AS Nome_candidato,
//     acesso_log_candidato.Data_e_Hora AS Data_e_Hora_candidato,
//     acesso_log_candidato.2FA AS 2FA_candidato,

//     acesso_log_empresa.Tipo_usuario AS Tipo_usuario_empresa,
//     acesso_log_empresa.ID_acesso_log_empresa AS ID_acesso_log_empresa,
//     acesso_log_empresa.FK_empresa_acesso AS FK_empresa_acesso,
//     acesso_log_empresa.Nome AS Nome_empresa,
//     acesso_log_empresa.Data_Hora AS Data_Hora_empresa,
//     acesso_log_empresa.2FA AS 2FA_empresa
// FROM 
//     acesso_log_candidato 
// JOIN 
//     acesso_log_empresa ON acesso_log_candidato.FK_candidato_acesso = acesso_log_empresa.FK_empresa_acesso ";
    
       
        
    }else{
    unset($_SESSION["Tipo_usuario"]);
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
        window.location = "tela_log.php?search="+search.value;
    }
   </script>
</html>
    