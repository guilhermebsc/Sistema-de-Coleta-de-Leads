<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Lead</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="logo"><img src="logo.png"></div>
        <h2>Ctrl+Play Goiânia</h2>
        <form action="lead_form.php" method="post">
            <label for="nome_responsavel">Nome Responsável:</label>
            <input type="text" name="nome_responsavel" id="nome_responsavel" required><br>
            <label for="telefone">Telefone:</label>
            <input type="tel" name="telefone" id="telefone" required><br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required><br>
            <label for="nome_filho">Nome Filho:</label>
            <input type="text" name="nome_filho" id="nome_filho" required><br>
            <label for="idade_filho">Idade Filho:</label>
            <input type="number" name="idade_filho" id="idade_filho" min="0" required><br>
            <label for="disponibilidade">Disponibilidade:</label>
            <select name="disponibilidade" id="disponibilidade" required>
                <option value="">Selecione</option>
                <option value="manha">Manhã</option>
                <option value="tarde">Tarde</option>
                <option value="noite">Noite</option>
            </select><br>
            <button type="submit">Cadastrar</button>
        </form>
        <p>Desenvolvido por Ctrl+Play Goiânia 2024</p>
    </div>
</body>
</html>
