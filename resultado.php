<?php
$status = isset($_GET['status']) ? htmlspecialchars($_GET['status']) : "Desconhecido";
$mensagem = isset($_GET['mensagem']) ? htmlspecialchars($_GET['mensagem']) : "";
$score = isset($_GET['score']) ? htmlspecialchars($_GET['score']) : "";
$imagem = isset($_GET['imagem']) ? htmlspecialchars($_GET['imagem']) : "";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Verificação</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #f4f4f9;
            height: 100vh;
            margin: 0;
        }
        h2 {
            color: #333;
        }
        .result {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 80%;
            max-width: 500px;
        }
        .error {
            color: red;
            font-size: 18px;
        }
        .success {
            color: green;
            font-size: 18px;
        }
        .back-link {
            margin-top: 20px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .back-link:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h2>Resultado da Verificação Facial</h2>

    <div class="result">
        <?php if ($status == "erro"): ?>
            <p class="error"><strong>Erro:</strong> <?php echo $mensagem; ?></p>
        <?php else: ?>
            <p class="success"><strong>Status:</strong> <?php echo $status; ?></p>
            <p><strong>Score de Semelhança:</strong> <?php echo $score; ?></p>
            <p><strong>Melhor Correspondência:</strong> <?php echo $imagem; ?></p>
        <?php endif; ?>
    </div>

    <a href="./" class="back-link">Tentar Novamente</a>

</body>
</html>
