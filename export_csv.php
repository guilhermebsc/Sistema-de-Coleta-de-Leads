<?php
// Conexão com o banco de dados
$servername = "38.50.130.7:5589";
$username = "guilherme.admin";
$password = "1R5Fy4F9B5DaNWGs*";
$dbname = "captacaoleads";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Selecionar todos os leads da tabela
$sql = "SELECT id, nome_responsavel, telefone, email, nome_filho, idade_filho, disponibilidade, created_at FROM leads";
$result = $conn->query($sql);

// Gerar arquivo CSV
$filename = "leads.csv";
$file = fopen($filename, 'w');

// Cabeçalho do CSV
$header = array("ID", "Nome Responsável", "Telefone", "Email", "Nome Filho", "Idade Filho", "Disponibilidade", "Data de Cadastro");
fputcsv($file, $header);

// Dados do CSV
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        fputcsv($file, $row);
    }
}

fclose($file);

// Download do arquivo CSV
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '"');
readfile($filename);

$conn->close();
?>
