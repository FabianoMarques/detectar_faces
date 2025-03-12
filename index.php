<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capturar e Analisar Foto</title>
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
        video {
            border: 2px solid #333;
            border-radius: 8px;
        }
        button {
            width: 640px;  /* Define a largura do botão */
            height: 50px;   /* Define a altura do botão */
            margin-top: 0px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #45a049;
        }
        .loading {
            display: none;
            margin-top: 20px;
            font-size: 20px;
            color:rgb(255, 0, 0);
        }
        .container {
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1><strong>CAPTURAR E ANALISAR</strong></h1>
        <video id="video" width="640" height="480" autoplay></video>
        <canvas id="canvas" width="640" height="480" style="display:none;"></canvas>
        <br>
        <button id="capturar">CAPTURAR E ANALISAR</button>
        <div id="loading" class="loading"><strong>PROCESSANDO... POR FAVOR AGUARDE!!!</strong></div>
    </div>

    <script>
        const video = document.getElementById("video");
        const canvas = document.getElementById("canvas");
        const context = canvas.getContext("2d");
        const capturarBtn = document.getElementById("capturar");
        const loadingDiv = document.getElementById("loading");

        // Iniciar a webcam
        navigator.mediaDevices.getUserMedia({ video: true })
            .then(stream => { video.srcObject = stream; })
            .catch(err => { console.error("Erro ao acessar a webcam", err); });

        // Capturar e enviar imagem
        capturarBtn.addEventListener("click", () => {
            // Mostrar a mensagem de carregamento
            loadingDiv.style.display = 'block';

            context.drawImage(video, 0, 0, 640, 480);
            const dataUrl = canvas.toDataURL("image/png");

            fetch("salvar_foto.php", {
                method: "POST",
                body: JSON.stringify({ imagem: dataUrl }),
                headers: { "Content-Type": "application/json" }
            })
            .then(response => response.text())  // Recebemos um redirecionamento
            .then(data => {
                // Redireciona para a URL recebida
                window.location.href = data;
            })
            .catch(error => {
                console.error("Erro:", error);
                alert("Ocorreu um erro ao processar a imagem.");
            })
            .finally(() => {
                // Ocultar a mensagem de carregamento após a requisição
                loadingDiv.style.display = 'none';
            });
        });
    </script>

</body>
</html>
