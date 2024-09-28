<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>
    <link rel="stylesheet" href="cadastro.css"> 
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>
</head>
<body>
    <nav class="navbar">
        <ul>
            <li><a href="/VIVENCIALY-PHP/index.php">Início</a></li>
            <li><a href="/VIVENCIALY-PHP/cadastro.php">Cadastro</a></li>
        </ul>
    </nav>

    <h1 class="poppins-medium">Formulário de Cadastro</h1>

    <?php if (isset($message)): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>

    <form action="resultado.php" method="POST">
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

    <footer class="footer">
        <p class="poppins-medium">&copy; 2024 ViVeNcIaLY. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
