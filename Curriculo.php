<?php

use Dompdf\Dompdf;
use Dompdf\Options;

require 'vendor/autoload.php';
require_once "config.php";

if(isset($_GET["id"])){
    $ID_candidato = $_GET["id"];
    
    $sql = "SELECT * FROM candidato WHERE ID_candidato = '$ID_candidato'";
    $result = mysqli_query($conn, $sql);
    
    if($result && mysqli_num_rows($result) > 0){
        $linha = mysqli_fetch_assoc($result);
        $nome = $linha["Nome"];
        $sobrenome = $linha["Sobrenome"];
        $email = $linha["Email"];
        $telefone = $linha["Telefone"];
        $CPF = $linha["CPF"];
        $nome = $linha["Nome"];
        $nome = $linha["Nome"];
    }

    $sql_L = "SELECT * FROM localidade WHERE FK_candidato_local = '$ID_candidato'";
    $result_L = mysqli_query($conn, $sql_L);

    if($result_L && mysqli_num_rows($result_L) > 0){
        $linhaL = mysqli_fetch_assoc($result_L);
        $cep = $linhaL["cep"];
        $endereco = $linhaL["endereco"];
        $numero = $linhaL["numero"];
        $complemento = $linhaL["complemento"];
        $bairro = $linhaL["bairro"];
        $cidade = $linhaL["cidade"];
        $estado = $linhaL["estado"];
    }else{
        $cep = "";
        $endereco = "";
        $numero = "";
        $complemento = "";
        $bairro = "";
        $cidade = "";
        $estado = "";
    }

    $sql_G = "SELECT * FROM infog_candidato WHERE FK_candidato = '$ID_candidato'";
    $result_G = mysqli_query($conn, $sql_G);

    if($result_G && mysqli_num_rows($result_G) > 0){
        $linhaG = mysqli_fetch_assoc($result_G);
        $data_nasc = $linhaG["data_nasc"];
        $estado_civil = $linhaG["estado_civil"];
        $link_L = $linhaG["link_L"];
        $link_P = $linhaG["link_P"];
        
        $ano_atual =  date('Y');
        $partes = explode('/', $data_nasc);
        $ano_nasc = $partes[2];

        $Idade = ($ano_atual - $ano_nasc);


    }else{
        $Idade = "";
        $link_L = "";
        $link_P = "";
    }

    $sql_H = "SELECT * FROM habilidades WHERE FK_candidatoHab = '$ID_candidato'";
    $result_H = mysqli_query($conn, $sql_H);

    if($result_H && mysqli_num_rows($result_H)){
        $linhaH = mysqli_fetch_assoc($result_H);
        $sobre = $linhaH["sobre"];
        if(is_array($linhaH["tecnologias"])) {
            $tecnologias = implode(",", $linhaH["tecnologias"]);
        } else {
            $tecnologias = explode(",", $linhaH["tecnologias"]);
            $tecnologias = implode("," , $tecnologias);
        }

    }else{
        $sobre = "";
        $tecnologias = "";
    }

    $sql_F = "SELECT * FROM formacao WHERE FK_candidato_form = '$ID_candidato'";
    $result_F = mysqli_query($conn, $sql_F);

    if($result_F && mysqli_num_rows($result_F)){
        $linhaF = mysqli_fetch_assoc($result_F);
        $instituicao_ensino = $linhaF["instituicao_ensino"];
        $tipo_formacao = $linhaF["tipo_formacao"];
        $periodo_curso = $linhaF["periodo_curso"];
        $curso = $linhaF["curso"];
    }else{
        $instituicao_ensino = "";
        $tipo_formacao = "";
        $periodo_curso = "";
        $curso = "";
    }

    $pdfOptions = new Options();
    $pdfOptions->set('defaultFont', 'Assistant", sans-serif');


    $dompdf = new Dompdf($pdfOptions);


    $html ='
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=""https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,900;1,300;1,400;1,600&display=swap">
    <body>
    <style>

    p{
    font-family: "Assistant", sans-serif; 
    font-size: 16px;
    }


    .header{
    display: flex;
    justify-content: space-between;
    font-family: "Assistant", sans-serif; 
    font-size: 16px;
    width: 100%;
    }
    .titulo{
    font-family: "Assistant", sans-serif;
    font-size: 25px;
    }

    .header .headerLocal p{
    white-space: wrap;
    font-size: 17px;
    
}
    .footer{
    margin-top: 100px;
    width: 100%;
}
    .footer p{
    font-family: "Assistant", sans-serif;
    font-weight: 600;
    }
    
    
    </style>
    <div class="header">
    <h1>'.$nome.' '.$sobrenome.'</h1>
    <div class="headerLocal">
    <p>• <strong>Idade:</strong> '.$Idade.' </p>
    <p>• <strong>Endereço:</strong> Cep: '.$cep.', '.$endereco.' N°:'.$numero.'</p>
    <p> &nbsp; '.$complemento.' '.$cidade.' '.$bairro.' - '.$estado.' </p>
    <p>• <strong>Celular:</strong> '.$telefone.' </p>
    </div>
    </div>
    <div class="apresentacao">
    <h1  class="titulo">Sobre</h1>
    <p>'.$sobre.'</p>
    </div>
    <div class="formacao">
    <h1 class="titulo">Formação</h1>
    <p>• <strong>Instituição:</strong> '.$instituicao_ensino.'</p>
    <p>• <strong>Formação:</strong> '.$tipo_formacao.'</p>
    <p>• <strong>Periodo:</strong> '.$periodo_curso.'</p>
    <p>• <strong>Curso:</strong> '.$curso.'</p>
    </div>
    <div class="conhecimentos">
    <h1  class="titulo">Conhecimentos</h1>
    <p>• <strong>Tecnologias:</strong> '.$tecnologias.'</p>
    </div>
    <div class="links">
    <h1 class="titulo">Link</h1>
    <p>• <strong>Linkedin:</strong> '.$link_L.' </p>
    <p>• <strong>Portifolio:</strong> '.$link_P.'</p>
    </div>
    <footer class="footer">
    <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Grupo 10 &copy; 2024 Conexão Estagios</p>
    </footer>
    </body>
    </html>
    
    ';

    print_r($html);

    $dompdf->loadHtml($html);
    
    $dompdf->setPaper('A4', 'portrait');
    
    $dompdf->render();

    ob_clean(); 
    $dompdf->stream();



}

?>