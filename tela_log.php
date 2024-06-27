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

    if(!empty($_GET["search"])){
        $data = mysqli_real_escape_string($conn, $_GET['search']);

        

            $sql_C = "SELECT * FROM acesso_log_candidato WHERE Nome LIKE '%$data%' OR Data_e_Hora LIKE '%$data%' OR 2FA LIKE '%$data%' OR Tipo_usuario LIKE '%$data%'";
            $resultado_C = mysqli_query($conn, $sql_C);
        
            if ($resultado_C && mysqli_num_rows($resultado_C) > 0) {
                while ($linha = mysqli_fetch_assoc($resultado_C)) {
                    $nome = $linha["Nome"];
                    $Tipo_usuario = $linha["Tipo_usuario"];
                    $data_e_hora = $linha["Data_e_Hora"];
                    $Resposta2FA = $linha["2FA"];

                    $dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $data_e_hora);
                    $data_formatada = $dateTime->format('d/m/Y H:i:s');
        
                    echo "<tr>";
                    echo "<td>" . $nome . "</td>";
                    echo "<td>" . $Tipo_usuario . "</td>";
                    echo "<td>" . $data_formatada . "</td>";
                    echo "<td>" . $Resposta2FA . "</td>";
                    echo "</tr>";
                }
            }
        
            
            $sql_E = "SELECT * FROM acesso_log_empresa WHERE Nome_empresa LIKE '%$data%' OR Data_Hora LIKE '%$data%' OR 2FA LIKE '%$data%' OR Tipo_usuario LIKE '%$data%'";
            $resultado_E = mysqli_query($conn, $sql_E);
        
            if ($resultado_E && mysqli_num_rows($resultado_E) > 0) {
                while ($linha2 = mysqli_fetch_assoc($resultado_E)) {
                    $nome_empresa = $linha2["Nome_empresa"];
                    $Tipo_usuario_empresa = $linha2["Tipo_usuario"];
                    $data_hora = $linha2["Data_Hora"];  
                    $Resposta2FA_empresa = $linha2["2FA"];

                    $dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $data_hora);
                    $data_formatada_empresa = $dateTime->format('d/m/Y H:i:s');
        
                    echo "<tr>";
                    echo "<td>" . $nome_empresa . "</td>";
                    echo "<td>" . $Tipo_usuario_empresa . "</td>";
                    echo "<td>" . $data_formatada_empresa . "</td>";  
                    echo "<td>" . $Resposta2FA_empresa . "</td>";
                    echo "</tr>";
                }
            }
        
        } else {
            
            $sql_C = "SELECT * FROM acesso_log_candidato";
            $resultado_C = mysqli_query($conn, $sql_C);
        
            if ($resultado_C && mysqli_num_rows($resultado_C) > 0) {
                while ($linha = mysqli_fetch_assoc($resultado_C)) {
                    $nome = $linha["Nome"];
                    $Tipo_usuario = $linha["Tipo_usuario"];
                    $data_e_hora = $linha["Data_e_Hora"];
                    $Resposta2FA = $linha["2FA"];

                    $dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $data_e_hora);
                    $data_formatada = $dateTime->format('d/m/Y H:i:s');
        
                    echo "<tr>";
                    echo "<td>" . $nome . "</td>";
                    echo "<td>" . $Tipo_usuario . "</td>";
                    echo "<td>" . $data_formatada . "</td>";
                    echo "<td>" . $Resposta2FA . "</td>";
                    echo "</tr>";
                }
            }
        
            
            $sql_E = "SELECT * FROM acesso_log_empresa";
            $resultado_E = mysqli_query($conn, $sql_E);
        
            if ($resultado_E && mysqli_num_rows($resultado_E) > 0) {
                while ($linha2 = mysqli_fetch_assoc($resultado_E)) {
                    $nome_empresa = $linha2["Nome_empresa"];
                    $Tipo_usuario_empresa = $linha2["Tipo_usuario"];
                    $data_hora = $linha2["Data_Hora"];  
                    $Resposta2FA_empresa = $linha2["2FA"];

                    $dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $data_hora);
                    $data_formatada_empresa = $dateTime->format('d/m/Y H:i:s');


        
                    echo "<tr>";
                    echo "<td>" . $nome_empresa . "</td>";
                    echo "<td>" . $Tipo_usuario_empresa . "</td>";
                    echo "<td>" . $data_formatada_empresa . "</td>";  
                    echo "<td>" . $Resposta2FA_empresa . "</td>";
                    echo "</tr>";
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
    