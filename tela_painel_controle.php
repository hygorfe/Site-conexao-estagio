<?php 
require_once "config.php";

$sql = "SELECT COUNT(ID_empresa_cad) as Quantidade_Empresa FROM empresa_cad";
$result = mysqli_query($conn, $sql);


if($result && mysqli_num_rows($result) > 0){
    $linha = mysqli_fetch_assoc($result);
    $QuantidadeEmpresa = $linha["Quantidade_Empresa"];
}


$sql_CC = "SELECT COUNT(ID_candidato) AS Quantidade_Candidato FROM candidato WHERE Tipo_usuario <> 'adm'";
$result_CC = mysqli_query($conn, $sql_CC);

if($result_CC && mysqli_num_rows($result_CC) > 0){
$linha_CC = mysqli_fetch_assoc($result_CC);
$QuantidadeCandidato = $linha_CC["Quantidade_Candidato"];

}

$sql_V = "SELECT COUNT(ID_CadastroVagas) AS Quantidade_Vagas FROM cadastro_vagas";

$result_V = mysqli_query($conn, $sql_V);

if($result_V && mysqli_num_rows($result_V) > 0){
$linha_V = mysqli_fetch_assoc($result_V);
$Quantidade_Vagas = $linha_V["Quantidade_Vagas"];
}





?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="src/css/tela-painel-controle.css">
    <title>Dashboard | Administrativo - Painel de controle</title>
</head>
<body>

    <header class="cabecalho">
    <a href="dashboard_adm.php"><img class="logo" src="src/img/logo.svg" alt="logo Conexão Estagios"></a>
    <a class="btn-sair" href="dashboard_adm.php">Sair</a>
    </header>
    <main class="content">
    <section class="painel-container">
    <div class="header">
    <h2 class="titulo">Painel de Controle</h2>
    </div>

    <div class="boxing">

    <div class="box">
    <div class="icon-container">
    <span class="material-symbols-outlined">
    Location_city
    </span>
    </div>
    <h3 class="subtitulo">Empresas Cadastradas</h3>
    <span class="value"><?php echo $QuantidadeEmpresa?></span>
    </div>

    <div class="box">
    <div class="icon-container">
    <span class="material-symbols-outlined">
    Groups
    </span>
    </div>
    <h3 class="subtitulo">Candidatos Cadastrados</h3>
    <span class="value"><?php echo $QuantidadeCandidato?></span>
    </div>


    <div class="box">
    <div class="icon-container">
    <span class="material-symbols-outlined">
    business_center
    </span>
    </div>
    <h3 class="subtitulo">Vagas Cadastradas</h3>
    <span class="value"><?php echo $Quantidade_Vagas?></span>
    </div>


    </div>
    </section>
    </main>
</body>
</html>