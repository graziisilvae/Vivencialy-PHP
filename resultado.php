<?php
// Função para validar se o nome contém ao menos dois nomes
function validarNome($nome) {
    $nomes = explode(' ', trim($nome));
    return count($nomes) >= 2;
}

// Inicializa variáveis
$message = '';
$nome = '';
$email = '';
$data_nascimento = '';
$genero = '';
$biografia = '';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $data_nascimento = $_POST["data_nascimento"];
    $genero = $_POST["genero"];
    $biografia = trim($_POST["biografia"]);

    // Inicializa um array para armazenar mensagens de erro
    $erros = [];

    // Valida os campos
    if (empty($nome) || !validarNome($nome)) {
        $erros[] = "O nome deve conter mais de uma palavra.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = "E-mail inválido.";
    }
    if (empty($data_nascimento)) {
        $erros[] = "A data de nascimento é obrigatória.";
    }
    if (empty($genero)) {
        $erros[] = "O gênero é obrigatório.";
    }
    if (empty($biografia)) {
        $erros[] = "A biografia é obrigatória.";
    }

    // Se houver erros, exibe-os
    if (!empty($erros)) {
        foreach ($erros as $erro) {
            $message .= "<p>$erro</p>";
        }
    } else {
        // Aqui você deve inserir no banco de dados (se estiver usando um)
        // Simulando inserção com sucesso
        $message = "Cadastro realizado com sucesso!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Cadastro</title>
    <link rel="stylesheet" href="cadastro.css"> 
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }

        .navbar {
            background-color: #ec8f8c;
            color: #fff;
            padding: 10px 20px;
        }

        .navbar ul {
            list-style: none;
            padding: 0;
        }

        .navbar li {
            display: inline;
            margin-right: 15px;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
        }

        h1 {
            margin-top: 20px;
        }

        .resultado {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .footer {
        background-color: #FAF4F0; /* Cor de fundo do footer */
        width: 100%; 
        height: 60px; /* Altura do footer */
        display: flex;
        justify-content: center; 
        align-items: center; 
        margin-top: 30px; 
}


        @media (max-width: 600px) {
            .resultado {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <ul>
            <li><a href="/VIVENCIALY-PHP/index.php">Início</a></li>
            <li><a href="/VIVENCIALY-PHP/cadastro.php">Cadastro</a></li>
        </ul>
    </nav>

    <h1>Resultado do Cadastro</h1>

    <div class="resultado">
        <?php if ($message): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>

        <?php if (empty($erros) && $_SERVER["REQUEST_METHOD"] == "POST"): ?>
            <h2>Informações Cadastradas:</h2>
            <p><strong>Nome:</strong> <?php echo htmlspecialchars($nome); ?></p>
            <p><strong>E-mail:</strong> <?php echo htmlspecialchars($email); ?></p>
            <p><strong>Data de Nascimento:</strong> <?php echo htmlspecialchars($data_nascimento); ?></p>
            <p><strong>Gênero:</strong> <?php echo htmlspecialchars($genero); ?></p>
            <p><strong>Biografia:</strong> <?php echo nl2br(htmlspecialchars($biografia)); ?></p>
        <?php endif; ?>
    </div>

    <footer>
        <p>&copy; 2024 ViVeNcIaLY. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
