<?php

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar e limpar os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $data_nascimento = $_POST['data_nascimento'];
    $genero = $_POST['genero'];
    $biografia = $_POST['biografia'];

    // Preparar a consulta SQL para inserir os dados
    $sql = "INSERT INTO CADASTRO (nome, email, data_nascimento, genero, biografia) 
            VALUES (?, ?, ?, ?, ?)";

    // Preparar a declaração
    $stmt = $conn->prepare($sql);

    // Verificar se a preparação foi bem-sucedida
    if ($stmt === false) {
        die("Erro na preparação da consulta: " . $conn->error);
    }

    // Bind os parâmetros
    $stmt->bind_param("sssss", $nome, $email, $data_nascimento, $genero, $biografia);

    // Executar a consulta
    if ($stmt->execute()) {
        $message = "Cadastro realizado com sucesso!";
    } else {
        $message = "Erro ao realizar o cadastro: " . $stmt->error;
    }

    // Fechar a declaração
    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>
    <link rel="stylesheet" href="cadastro.css"> 

</head>

<nav class="navbar">
    <ul>
        <li><a href="/LOJAJOIAS/index.php">Início</a></li>
        <li><a href="/LOJAJOIAS/cadastro.php">Cadastro</a></li>
    </ul>
</nav>

<body>

    <h1>Formulário de Cadastro</h1>
    
    <!-- Mostrar a mensagem de resultado se estiver definida -->
    <?php if (isset($message)): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>

    <form action="index.php" method="POST">
        <label for="nome">Nome Completo:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" id="data_nascimento" name="data_nascimento" required><br><br>

        <label for="genero">Gênero:</label>
        <select id="genero" name="genero" required>
            <option value="masculino">Masculino</option>
            <option value="feminino">Feminino</option>
            <option value="outros">Outros</option>
        </select><br><br>

        <label for="biografia">Biografia:</label><br>
        <textarea id="biografia" name="biografia" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>

<footer class="footer">
    <p>&copy; 2024 Loja de Joias. Todos os direitos reservados.</p>
</footer>

</html>