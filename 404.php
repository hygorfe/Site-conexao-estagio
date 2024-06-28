<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Não Encontrada</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .error-container {
            text-align: center;
        }
        .error-container img {
            max-width: 20%;
            height: auto;
        }
        .error-container h1 {
            font-size: 2em;
            margin: 0.5em 0;
        }
        .error-container p {
            font-size: 1.2em;
            color: #666;
        }
        .error-container a {
            display: inline-block;
            margin-top: 20px;
            padding: 8px 20px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
        }
        .error-container a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <img src="src/img/erro.jpg" alt="404 Page Not Found">
        <h1>Oops... Página Não Encontrada</h1>
        <p>Desculpe, mas a página que você está procurando não existe ou foi removida.</p>
        <a href="landing_page.php">Voltar para a Página Inicial</a>
    </div>
</body>
</html>