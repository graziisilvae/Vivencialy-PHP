<?php

// Função para validar se o nome contém ao menos dois nomes
function validarNome($nome) {
    $nomes = explode(' ', trim($nome));
    return count($nomes) >= 2;
}


// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST["NomeCompleto"]);
    $email = trim($_POST["Email"]);
    $data_nascimento = $_POST["DataDeNascimento"];
    $genero = $_POST["Genero"];
    $biografia = trim($_POST["Biografia"]);


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
            echo "<script>alert('$erro');</script>";
        }
        echo "<script>window.location.href = 'index.php';</script>"; // Altere 'index.php' para o caminho correto do seu formulário
    } else {
        // Prepara e executa a inserção no banco de dados
        $stmt = $conn->prepare("INSERT INTO Cadastro (NomeCompleto, Email, DataDeNascimento, Genero, Biografia) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nome, $email, $data_nascimento, $genero, $biografia);


        if ($stmt->execute()) {
            echo "<script>alert('Cadastro realizado com sucesso!');</script>";
        } else {
            echo "<script>alert('Erro ao realizar o cadastro: " . $stmt->error . "');</script>";
        }


        $stmt->close();
        $conn->close();


        echo "<script>window.location.href = 'cadastro.php';</script>"; // Altere 'index.php' para o caminho correto do seu formulário
    }
}
?>
