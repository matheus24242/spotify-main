<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aula_php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $idEditar = $_GET['id'];
    
    // Consultar o produto a ser editado
    $sqlEditar = "SELECT * FROM produtos WHERE id = $idEditar";
    $resultEditar = $conn->query($sqlEditar);

    if ($resultEditar && $resultEditar->num_rows > 0) {
        $produto = $resultEditar->fetch_assoc();
    } else {
        echo "Produto não encontrado.";
        exit();
    }
} else {
    echo "Parâmetros inválidos.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>   
    <div class="container">
        <h1>Editar Produto</h1>

        <form method="post" action="processar_edicao.php">
            <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">

            <!-- Campos de edição, por exemplo: -->
            <div class="form-group">
                <label for="nome">Nome do Produto:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $produto['nome']; ?>">
            </div>

            <div class="form-group">
                <label for="codigo">Código do Produto:</label>
                <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $produto['codigo']; ?>">
            </div>

            <div class="form-group">
                <label for="valor">Valor Unitário:</label>
                <input type="text" class="form-control" id="valor" name="valor" value="<?php echo $produto['valor']; ?>">
            </div>

            <div class="form-group">
                <label for="estoque">Quantidade em Estoque:</label>
                <input type="text" class="form-control" id="estoque" name="estoque" value="<?php echo $produto['estoque']; ?>">
            </div>

            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>

        <a href="javascript:history.back()" class="btn btn-secondary">Cancelar</a>
    </div> <!-- Fechamento do container -->

</body>
</html>

<?php
if ($conn) {
    $conn->close();
}
?>
