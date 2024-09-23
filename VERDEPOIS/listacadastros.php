<?php
include "bd.php"; // Inclui o arquivo de conexão


// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}


$sql = "SELECT idCad, NomeCompleto, Email, DataDeNascimento, Genero, Biografia FROM Cadastro ";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários Cadastrados</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="results-container">
        <h1>Usuários Cadastrados</h1>
       
        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Data de Nascimento</th>
                        <th>Gênero</th>
                        <th>Biografia</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['idCad']); ?></td>
                            <td><?php echo htmlspecialchars($row['NomeCompleto']); ?></td>
                            <td><?php echo htmlspecialchars($row['Email']); ?></td>
                            <td><?php echo htmlspecialchars($row['DataDeNascimento']); ?></td>
                            <td><?php echo htmlspecialchars($row['Genero']); ?></td>
                            <td><?php echo htmlspecialchars($row['Biografia']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Não há usuários cadastrados.</p>
        <?php endif; ?>


        <p><a href="index.php">Voltar ao formulário</a></p>
    </div>


    <?php
    $conn->close();
    ?>
</body>
</html>
