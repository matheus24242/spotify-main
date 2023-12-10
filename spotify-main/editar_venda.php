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
    
    // Consultar a venda a ser editada
    $sqlEditar = "SELECT * FROM vendas WHERE id = $idEditar";
    $resultEditar = $conn->query($sqlEditar);

    if ($resultEditar && $resultEditar->num_rows > 0) {
        $venda = $resultEditar->fetch_assoc();
    } else {
        echo "Venda não encontrada.";
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
    <title>Editar Venda</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>   
    <div class="container">
        <h1>Editar Venda</h1>

        <form method="post" action="processar_edicao_venda.php">
            <input type="hidden" name="id" value="<?php echo $venda['id']; ?>">

            <!-- Campos de edição, por exemplo: -->
            <div class="form-group">
                <label for="data">Data:</label>
                <input type="text" class="form-control" id="data" name="data" value="<?php echo $venda['data']; ?>">
            </div>

            <div class="form-group">
                <label for="produto">Produto:</label>
                <input type="text" class="form-control" id="produto" name="produto" value="<?php echo $venda['produto']; ?>">
            </div>

            <div class="form-group">
                <label for="codigo">Código:</label>
                <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $venda['codigo']; ?>">
            </div>

            <div class="form-group">
                <label for="valor">Valor:</label>
                <input type="text" class="form-control" id="valor" name="valor" value="<?php echo $venda['valor']; ?>">
            </div>

            <div class="form-group">
                <label for="canal">Canal:</label>
                <input type="text" class="form-control" id="canal" name="canal" value="<?php echo $venda['canal']; ?>">
            </div>
<div class="container">
    <form action="processar_edicao_venda.php" method="POST">
        <!-- Seu código de formulário para a edição -->

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>

    <div class="btn-group">
        <a href="javascript:history.back()" class="btn btn-secondary">Cancelar</a>
        
    </div>
</div> <!-- Fechamento do container -->

</body>
</html>

<?php
if ($conn) {
    $conn->close();
}
?>
