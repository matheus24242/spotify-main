<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aula_php";

// Criar uma conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber dados do formulário
    $nome = $_POST['nome'];
    $codigo = $_POST['codigo'];
    $valor = $_POST['valor'];
    $estoque = $_POST['estoque'];

    // Usar declaração preparada para evitar SQL injection
    $sql = "INSERT INTO produtos (nome, codigo, valor, estoque) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    // Verificar se a preparação da declaração foi bem-sucedida
    if ($stmt === FALSE) {
        die("Erro na preparação da declaração: " . $conn->error);
    }

    // Vincular parâmetros e executar a declaração
    $stmt->bind_param("ssdi", $nome, $codigo, $valor, $estoque);
    $stmt->execute();

    // Verificar se a execução foi bem-sucedida
    if ($stmt->affected_rows > 0) {
        // Mensagem de sucesso
        echo "Cadastro realizado com sucesso";

        // Redirecionar para a página principal com a mensagem de sucesso
        header("Location: index.php?success=true");
        exit();
    } else {
        echo "Erro ao cadastrar no banco de dados: " . $stmt->error;
    }

    // Fechar a declaração preparada
    $stmt->close();
}

// Fechar a conexão
$conn->close();

?>
