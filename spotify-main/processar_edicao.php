<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aula_php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $idEditar = $_POST['id'];
    $nome = $_POST['nome'];
    $codigo = $_POST['codigo'];
    $valor = $_POST['valor'];
    $estoque = $_POST['estoque'];

    // Atualizar o produto no banco de dados
    $sqlEditar = "UPDATE produtos SET nome = '$nome', codigo = '$codigo', valor = '$valor', estoque = '$estoque' WHERE id = $idEditar";

    if ($conn->query($sqlEditar) === TRUE) {
        // Redirecionar para a página de visualização do estoque após a edição
        header("Location: visualizar_estoque.php");
        exit();
    } else {
        echo "Erro ao editar o produto: " . $conn->error;
        exit();
    }
} else {
    echo "Parâmetros inválidos.";
    exit();
}
?>

<?php
if ($conn) {
    $conn->close();
}
?>
