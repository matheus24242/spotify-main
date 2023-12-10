<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Conecta ao banco de dados (ajuste conforme suas configurações)
    $conexao = new mysqli("localhost", "root", "", "aula_php");

    // Verifica a conexão
    if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
    }

    // Obtém os dados do formulário
    $data = $_POST["data"];
    $produto = $_POST["produto"];
    $codigo = $_POST["codigo"];
    $valor = $_POST["valor"];
    $canal = $_POST["canal"];

    // Prepara a instrução SQL para a inserção
    $sql = "INSERT INTO vendas (data, produto, codigo, valor, canal) 
            VALUES ('$data', '$produto', '$codigo', '$valor', '$canal')";

    // Executa a inserção
    if ($conexao->query($sql) === TRUE) {
        echo "Venda registrada com sucesso!";
    } else {
        echo "Erro ao registrar venda: " . $conexao->error;
    }

    // Fecha a conexão
    $conexao->close();
}
?>
