<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aula_php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

$termo_pesquisa = '';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['pesquisa'])) {
    $termo_pesquisa = $_GET['pesquisa'];
}

$result = $conn->query("SELECT * FROM vendas WHERE produto LIKE '%$termo_pesquisa%'");

if (!$result) {
    die("Erro na consulta ao banco de dados: " . $conn->error);
}

$rows = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
}

$totalSaldo = 0;

foreach ($rows as $row) {
    $totalSaldo += floatval($row['valor']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['excluir'])) {
    $idExcluir = $_POST['excluir'];

    $sqlExcluir = "DELETE FROM vendas WHERE id = $idExcluir";
    if ($conn->query($sqlExcluir) === TRUE) {
        header("Location: ver_vendas.php");
        exit();
    } else {
        echo "Erro ao excluir a venda: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lista de Vendas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>   
    <header>
        <!-- ... Seu código de navegação ... -->
    </header>
    <div class="container">
        <h1>Lista de Vendas Realizadas</h1>

        <form action="ver_vendas.php" method="GET" class="mb-3">
            <div class="form-group">
                <label for="pesquisa">Pesquisar Produto:</label>
                <input type="text" name="pesquisa" class="form-control" value="<?php echo htmlspecialchars($termo_pesquisa); ?>">
            </div>
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </form>

        <?php if (!empty($rows)): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Ação</th>
                        <th>Data</th>
                        <th>Produto</th>
                        <th>Codigo</th>
                        <th>Valor</th>
                        <th>Canal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $row): ?>
                        <tr>
                            <td>
                                <!-- Botões Editar e Excluir -->
                                <a href="editar_venda.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Editar</a>
                                <form action="" method="POST" style="display: inline; margin-left: 5px;">
                                    <input type="hidden" name="excluir" value="<?php echo $row['id']; ?>">
                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                </form>
                            </td>
                            <td><?php echo $row['data']; ?></td>
                            <td><?php echo $row['produto']; ?></td>
                            <td><?php echo $row['codigo']; ?></td>
                            <td><?php echo $row['valor']; ?></td>
                            <td><?php echo $row['canal']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <p>Saldo Total de Vendas: R$ <?php echo number_format($totalSaldo, 2, ',', '.'); ?></p>

        <?php else: ?>
            <p>Nenhuma venda encontrada.</p>
        <?php endif; ?>

       <a href="register_vendas.html" class="btn btn-secondary">Voltar</a>

    </div>

</body>
</html>

<?php
if ($conn) {
    $conn->close();
}
?>

