<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexão com o banco de dados
    $servername = "38.50.130.7:5589";
    $username = "guilherme.admin";
    $password = "1R5Fy4F9B5DaNWGs*";
    $dbname = "captacaoleads";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Recebendo dados do formulário
    $nome_responsavel = $_POST['nome_responsavel'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $nome_filho = $_POST['nome_filho'];
    $idade_filho = $_POST['idade_filho'];
    $disponibilidade = $_POST['disponibilidade'];

    // Inserindo dados na tabela de leads
    $sql = "INSERT INTO leads (nome_responsavel, telefone, email, nome_filho, idade_filho, disponibilidade)
    VALUES ('$nome_responsavel', '$telefone', '$email', '$nome_filho', '$idade_filho', '$disponibilidade')";

    if ($conn->query($sql) === TRUE) {
        // Redirecionar para uma página de confirmação
        header("Location: sucesso.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
