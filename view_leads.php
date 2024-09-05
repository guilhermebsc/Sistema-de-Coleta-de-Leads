<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "captacaoleads";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Selecionar todos os leads da tabela
$sql = "SELECT * FROM leads";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Leads</title>
    <link rel="stylesheet" href="style_view_lead.css">
</head>
<body>
    <div class="container">
        <h2>Leads Cadastrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome Responsável</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Nome Filho</th>
                    <th>Idade Filho</th>
                    <th>Disponibilidade</th>
                    <th>Data de Cadastro</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["nome_responsavel"] . "</td>";
                        echo "<td>" . $row["telefone"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["nome_filho"] . "</td>";
                        echo "<td>" . $row["idade_filho"] . "</td>";
                        echo "<td>" . $row["disponibilidade"] . "</td>";
                        echo "<td>" . $row["created_at"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Nenhum lead cadastrado.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <form action="export_csv.php" method="post">
            <button type="submit">Baixar Leads em CSV</button>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
