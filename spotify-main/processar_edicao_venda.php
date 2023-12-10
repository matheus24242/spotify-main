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
    $data = $_POST['data'];
    $produto = $_POST['produto'];
    $codigo = $_POST['codigo'];
    $valor = $_POST['valor'];
    $canal = $_POST['canal'];

    // Atualizar a venda no banco de dados
    $sqlEditar = "UPDATE vendas SET data = '$data', produto = '$produto', codigo = '$codigo', valor = '$valor', canal = '$canal' WHERE id = $idEditar";

    if ($conn->query($sqlEditar) === TRUE) {
        // Redirecionar para a página de visualização de vendas após a edição
        header("Location: ver_vendas.php");
        exit();
    } else {
        echo "Erro ao editar a venda: " . $conn->error;
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
