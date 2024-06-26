<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!--  -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="src/css/tela_de_login_empresa.css">
    <title>Oportunidades - Conexão estágios</title>
    <script src="src/JS/tela_de_login_empresa.js" defer></script>
</head>
<body>
    <main class="content">
    <section class="login-container">

    <div class="forms">
        <img src="src/img/logo.svg" alt="logo Conexão estágios">

    <form action="testLogin_empresa.php" method="POST">

    <div class="box">
    <input type="email" name="emailEmpresa" id="emailEmpresa" placeholder="Email">
    <span>O email é Obrigatório</span>
    </div>

    <div class="box">
    <input type="password" name="senha" id="senha" placeholder="Senha">
    <span>A senha é Obrigatório</span>
    </div>

    <div class="box">
    <button class="minha-senha">Esqueci minha senha</button>
    <input class="btnEntrar" type="submit" name="submitEntrar" value="Entrar">

    <div class="text">
        <p>Ainda não tem conta ?</p>
        <a href="tela_de_cadastro_empresa.php">cadastre-se</a>
    </div>
    </div>
    </form>
    </div>

    <div class="modal-redefinir-senha">
    <div class="modal">
    <div class="header-modal">
    <p>Redefinir Senha</p>
    <button class="btnCloseModal">
    <span class="material-symbols-outlined">
    close
    </span>
    </button>
    </div>
    <div class="body-modal">
    <h4>Redefinir Senha</h4>
    <p>Insira seu e-mail cadastrado para redefinir sua senha
    </p>
    <form class="form-redefinir" action="" method="POST">
    <div class="box">
    <input type="email" name="emailRedefinir" id="emailRedefinir" placeholder="Email">
    <span></span>
    </div>
    </form>
    <div class="btn-loading">
    <input class="btnRedefinir" type="submit" value="Redefinir Senha">
    <span class="loading"></span>
    </div>
    </div>
    </div>
    </div>

    <div class="modal-email-enviado">
    <div class="modalEmail">
    <div class="header-modal">
    <p>Redefinir Senha</p>
    <button class="btnCloseModal">
    <span class="material-symbols-outlined">
    close
    </span>
    </button>
    </div>
    <div class="body-modal">
    <h4>Te enviamos um e-mail</h4>
    <span class="material-symbols-outlined">
    send
    </span>
    <p>Você receberá um link para redefinir sua senha, caso seu e-mail seja encontrado em nossa plataforma
    </p>
    <button class="btnContinuar">
    Continuar
    </button>
    </div>
    </div>

    </section>
    </main>
</body>
</html>