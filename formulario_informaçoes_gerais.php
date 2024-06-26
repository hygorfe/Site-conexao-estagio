<?php 
    session_start();
    require_once "config.php";

    if((!isset($_SESSION['email']) && (isset($_SESSION['senha'])))){
        header("Location: tela_de_vagas.php");
        exit;
    }
    
    if((isset($_SESSION['email']) == true) && ((isset($_SESSION['senha']) == true))){

    $email = $_SESSION['email'];

    $sql = "SELECT nome, sobrenome, cpf, email, senha, telefone FROM candidato WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if($result){
    $linha = mysqli_fetch_array($result);
    $nome = $linha['nome'];
    $sobrenome = $linha['sobrenome'];
    $cpf = $linha['cpf'];
    $email = $linha['email'];
    $senha = $linha['senha'];
    $telefone = $linha['telefone'];
    }
}else{
    session_destroy();
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header("Location: tela_de_vagas.php");
    exit;
    }



if((isset($_SESSION['email']) == true) && ((isset($_SESSION['senha']) == true))){

    $email = $_SESSION['email'];

    $sql = "SELECT data_nasc, genero, 2FA_pergunta, 2FA_resposta, estado_civil, link_L, link_P, img_profile FROM infog_candidato WHERE FK_candidato = (SELECT ID_candidato FROM candidato WHERE email = '$email')";
    $result = mysqli_query($conn, $sql);

    if($result && mysqli_num_rows($result) > 0){
        $linha = mysqli_fetch_array($result);
        $data_nasc = $linha['data_nasc'];
        $genero = $linha['genero'];
        $pergunta_2FA = $linha['2FA_pergunta'];
        $resposta_2FA = $linha['2FA_resposta'];
        $estadoCivil = $linha['estado_civil'];
        $link_L = $linha['link_L'];
        $link_P = $linha['link_P'];

        if (isset($linha['img_profile']) && !empty($linha['img_profile'])) {
            $imgProfile = $linha['img_profile'];
        } else {
            $imgProfile = 'imagem_padrao.jpg';
        }

    }else{
    $data_nasc = "";
    $genero = "";
    $pergunta_2FA = "";
    $resposta_2FA = "";
    $estadoCivil = "";
    $link_L = "";
    $link_P = "";
    $imgProfile = 'imagem_padrao.jpg';
    }
}else{
    session_destroy();
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header("Location: tela_de_vagas.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="src/css/formulario_informaçoes_gerais.css">
    <title>Meu Perfil | Informações Gerais</title>
    <script src="src/JS/tela_informacoes_gerais.js" defer></script>
</head>
<body>

    <main class="content" id="content">
    <section class="forms">
    <img class="logo" src="src/img/Logo_black.svg" alt="logo">

    <div class="titulo">
    <div class="circle">
    <span class="material-symbols-outlined">
    edit_square
    </span>
    </div>
    <div class="informacoes">
    <p class="step">Passo 01 de 04</p>
    <p class="strong">Informações Gerais</p>
    </div>
    </div>


    <form class="form" action="salvage.php" method="POST" enctype="multipart/form-data" accept="image/*">
    <div class="circle-container">
    <div class="circle">
    <img src="<?php echo $imgProfile ?>" alt="">
    <input type="file" name="img_profile" id="img_profile" accept="image/*">
    <label for="img_profile"></label>
    <span class="material-symbols-outlined">
    person_add
    </span>
    </div>
    </div>

    <div class="box">
    <input type="text" name="nome" id="nome" value="<?php echo $nome?>">
    <label for="nome">Nome</label>
    <span></span>
    </div>
    <div class="box">
    <input type="text" name="sobrenome" id="sobrenome" value="<?php echo $sobrenome?>">
    <label for="sobrenome">Sobrenome</label>
    <span></span>
    </div>

    <div class="box">
    <h3 class="titulos">Data de nascimento</h3>
    <input type="text" name="dataNasc" id="data-nasc" value="<?php echo $data_nasc;?>">
    <span></span>
    </div>

    <h3 class="titulos">Identidade de Gênero</h3>
    <div class="box">
    <select class="select" name="genero" id="sexo">
    <option class="titulo-opcao">Sexo</option>
    <option value="feminino" <?php if($genero == 'feminino') echo 'selected'; ?>>Mulher Cis</option>
    <option value="masculino" <?php if($genero == 'masculino') echo 'selected'; ?>>Homem Cis</option>
    <option value="nao-binario" <?php if($genero == 'nao-binario') echo 'selected'; ?>>Não-Binario</option>
    <option value="outro" <?php if($genero == 'outro') echo 'selected'; ?>>Não declarar</option>
    <option value="mulher-transgênero" <?php if($genero == 'mulher-transgênero') echo 'selected'; ?>>Mulher transgênero</option>
    <option value="homem-transgênero" <?php if($genero == 'homem-transgênero') echo 'selected'; ?>>Homem transgênero</option>
    <option value="nao-informar" <?php if($genero == 'nao-informar') echo 'selected'; ?>>Prefiro não Informar</option>
    </select>
    <span></span>
    </div>

    <h3 class="titulos">Documentos de Identificação</h3>
    <div class="box">
    <input type="text" name="cpf" id="cpf" value="<?php echo $cpf?>">
    <label for="cpf">CPF</label>
    <span></span>
    </div>

    <div class="box">
    <button type="button" class="btn-edit-password" title="editar">
    <p class="material-symbols-outlined">
    edit
    </p>
    </button>
    <input class="disable" type="password" name="senhaCandidato" id="senha" value="<?php echo $senha?>">
    <label for="senha">Senha</label>
    <span></span>
    </div>


    <div class="box">
    <h3 class="titulos">Pergunta de Segurança</h3>
    <select class="select" name="ask-usuario" id="ask-usuario">
    <option class="titulo-opcao">Selecione uma pergunta</option>
    <option value="nome-mae" <?php if($pergunta_2FA == 'nome-mae') echo 'selected'; ?>>Qual nome da sua mãe ?</option>
    <option value="data-nascimento"<?php if($pergunta_2FA == 'data-nascimento') echo 'selected'; ?>>Qual a data do seu nascimento ?</option>
    <option value="qual-cep"<?php if($pergunta_2FA == 'qual-cep') echo 'selected'; ?>>Qual o CEP do seu endereço ?</option>
    </select>
    <div class="box">
    <input type="text" name="ask-resposta" id="input-Resposta" placeholder="Digite sua Resposta" value="<?php echo $resposta_2FA;?>">
    <label for="ask-resposta"></label>
    <span></span>
    </div>
    </div>
    

    <div class="box">
    <select class="select" name="estadoCivil" id="estado-civil">
    <option class="titulo-opcao" <?php if($estadoCivil == 'titulo-opcao') echo 'selected'; ?>>Estado Civil</option>
    <option value="solteiro" <?php if($estadoCivil == 'solteiro') echo 'selected'; ?>>Solteiro</option>
    <option value="casado" <?php if($estadoCivil == 'casado') echo 'selected'; ?>>Casado</option>
    <option value="separado" <?php if($estadoCivil == 'separado') echo 'selected'; ?>>Separado</option>
    <option value="divorciado" <?php if($estadoCivil == 'divorciado') echo 'selected'; ?>>Divorciado</option>
    <option value="viuvo" <?php if($estadoCivil == 'viuvo') echo 'selected'; ?>>Viúvo</option>
    </select>
    <span></span>
    </div>

    <h3 class="titulos">Contatos</h3>
    <div class="box">
    <button type="button" class="btn-edit-email" title="editar">
    <p class="material-symbols-outlined">
    edit
    </p>
    </button>
    <input class="disable" type="email" name="email"  id="email" value="<?php echo $email?>">
    <label for="email">Email</label>
    <span></span>
    </div>

    <div class="box">
    <input type="tel" name="celular" id="celular" value="<?php echo  $telefone?>">
    <label for="celular">Celular</label>
    <span></span>
    </div>
    
    <div class="box">
    <input type="text" name="link-L" id="link-l" value="<?php echo $link_L?>">
    <label for="link-l">Link - LinkdIn</label>
    </div>
    <div class="box">
    <input type="text" name="link-P" id="link-p" value="<?php echo $link_P?>">
    <label for="link-p">Link - Portfolio</label>
    </div>

    <div class="btn-forms">
    <a href="dashboard_candidato.php" class="cancelar" name="cancelar">
    Cancelar
    </a>
    <input class="salvar" type="submit" name="submit_salva" value="Salvar">
    </input>
    </div>
    </form>
    </section>

    <div class="modal-container">
    <div class="modal-background"></div>
    <div class="modal-edit-password">
    <div class="modal-header">
    <span class="material-symbols-outlined">
    lock
    </span>
    <h3 class="titulo">
        Defina sua senha
    </h3>
    </div>
    
    <form class="form-modal" action="Salved.php" method="POST">

    <div class="box">

    <button type="button" class="visibility-password" id="senha_atual_btn">
    <p class="material-symbols-outlined">
    visibility_off
    </p>
    </button>
    <input type="password" name="senha_atual" id="senha_atual" placeholder="Senha atual">
    <span></span>
    </div>

    <div class="box">
    <button type="button" class="visibility-password" id="nova_senha_btn">
    <p class="material-symbols-outlined">
    visibility_off
    </p>
    </button>
    <input type="password" name="nova_senha" id="nova_senha" placeholder="Nova senha">
    <span></span>
    </div>

    <div class="box">
    <button type="button" class="visibility-password" id="confirmar_nova_senha_btn">
    <p class="material-symbols-outlined">
    visibility_off
    </p>
    </button>
    <input type="password" name="confirmar_nova_senha" id="confirmar_nova_senha" placeholder="Confirmar nova senha">
    <span></span>
    </div>
    
    <div class="box-btn">
    <button type="button" class="cancelar btn-modal-password">
    Cancelar
    </button>
    <input class="btn-salva-senha" type="submit" name="salvar_senha" value="Salvar Senha">
    </div>
    </form>
    </div>
    </div>







    <div class="modal-container-email">
        <div class="modal-background-email"></div>
        <div class="modal-edit-email">
        <div class="modal-header">
        <h3 class="titulo">
            Defina seu email
        </h3>
        </div>
        <p class="paragrafo">Após a alteração de e-mail será necessário reautenticar no portal.
        </p>
        <form class="form-modal-email" action="Salved.php" method="POST">
    
        <div class="box">
        <input type="email" name="novo_email" id="novo_email" placeholder="Novo e-mail">
        <span></span>
        </div>
        <div class="box">
        <input type="email" name="confirmar_novo_email" id="confirmar_novo_email" placeholder="Confirmar novo e-mail">
        <span></span>
        </div>
    
        <div class="box">
        <button type="button" class="visibility-password-email">
        <p class="material-symbols-outlined">
        visibility_off
        </p>
        </button>
        <input type="password" name="senha_padrao" id="senha_padrao" placeholder="Senha">
        <span></span>
        </div>
        
        <div class="box-btn">
        <button type="button" class="cancelar btn-modal-email">
        Cancelar
        </button>
        <input type="submit" name="salvar_email" value="Salvar Email">
        </div>
        </form>
        </div>
        </div>
    </main>
</body>
</html>