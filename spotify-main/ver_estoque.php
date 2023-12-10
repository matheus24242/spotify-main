<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aula_php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['excluir'])) {
    $idExcluir = $_GET['excluir'];
    $sqlExcluir = "DELETE FROM produtos WHERE id = $idExcluir";

    if ($conn->query($sqlExcluir) === TRUE) {
        // Redirecionar para a página atual após a exclusão
        header("Location: $_SERVER[PHP_SELF]");
        exit();
    } else {
        echo "Erro ao excluir o produto: " . $conn->error;
    }
}

$result = $conn->query("SELECT * FROM produtos");

if (!$result) {
    die("Erro na consulta ao banco de dados: " . $conn->error);
}

$totalValor = 0;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ver Estoque</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>   
    <header>
        <!-- ... Seu código de navegação ... -->
    </header>
    <div class="container">
        <h1>Lista de Produtos - Estoque</h1>

        <?php if ($result->num_rows > 0): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome do Produto</th>
                        <th>Código do Produto</th>
                        <th>Valor Unitário</th>
                        <th>Quantidade em Estoque</th>
                        <th>Valor Total</th>
                        <th>Ação</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['nome']; ?></td>
                            <td><?php echo $row['codigo']; ?></td>
                            <td><?php echo $row['valor']; ?></td>
                            <td><?php echo $row['estoque']; ?></td>
                            <td><?php
                                $valorTotal = floatval($row['valor']) * intval($row['estoque']);
                                echo 'R$ ' . number_format($valorTotal, 2, ',', '.');
                                $totalValor += $valorTotal;
                            ?></td>
                            <td><a href="?excluir=<?php echo $row['id']; ?>" class="btn btn-danger">Excluir</a></td>
                            <td><a href="editar_produto.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Editar</a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <p>Total Valor dos Produtos no Estoque: R$ <?php echo number_format($totalValor, 2, ',', '.'); ?></p>

        <?php else: ?>
            <p>Nenhum produto encontrado no estoque.</p>
        <?php endif; ?>

        <a href="javascript:history.back()" class="btn btn-secondary">Voltar</a>
    </div> <!-- Fechamento do container -->

</body>
</html>

<?php
if ($conn) {
    $conn->close();
}
?>


