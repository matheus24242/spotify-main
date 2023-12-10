<?php
$servername = "seu_servidor";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

// Criar uma conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Inicializar as variáveis de venda
$marca = $nome = $codigo = $valor = $quantidade = '';

// Verificar se o formulário de venda foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marca = $_POST['marca'];
    $nome = $_POST['nome'];
    $codigo = $_POST['codigo'];
    $valor = $_POST['valor'];
    $quantidade = $_POST['quantidade'];

    // Inserir a venda no banco de dados
    $sql = "INSERT INTO vendas_cosmeticos (marca, nome, codigo, valor, quantidade) VALUES ('$marca', '$nome', '$codigo', '$valor', '$quantidade')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ver_vendas_cosmeticos.php?success=true");
        exit();
    } else {
        echo "Erro ao registrar a venda: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="CSS/estilo.css">
</head>
<body>   
    <header>
        <nav class="navbar navbar-expand-sm navbar-light fixed-top navbar-transparente">
            <form class="form-inline my-2 my-lg-0" action="pesquisa.php" method="GET">
                <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar" name="pesquisa">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
            </form>
            <ul class="navbar-nav ml-auto">
                <!-- Adicione os itens do menu aqui -->
            </ul>
        </nav>
    </header>
    <h1>SISTEMA DE GESTÃO DE VENDAS E COMPRAS</h1>
    <div class="container">
        <!-- Mensagem de sucesso -->
        <?php
            if (isset($_GET['success']) && $_GET['success'] == 'true') {
                echo '<div class="alert alert-success" role="alert">Venda registrada com sucesso!</div>';
            }
        ?>

        <!-- Formulário para registrar venda de cosméticos -->
        <form action="insert_venda_cosmeticos.php" method="post">
            <label for="marca">Marca do Produto:</label><br>
            <input type="text" id="marca" name="marca" class="form-control"><br>
            <label for="nome">Nome do Produto:</label><br>
            <input type="text" id="nome" name="nome" class="form-control"><br>
            <label for="codigo">Código do Produto:</label><br>
            <input type="text" id="codigo" name="codigo" class="form-control"><br>
            <label for="valor">Valor:</label><br>
            <input type="text" id="valor" name="valor" class="form-control"><br>
            <label for="quantidade">Quantidade:</label><br>
            <input type="text" id="quantidade" name="quantidade" class="form-control"><br>
            <input type="submit" value="Registrar Venda" class="btn btn-primary">
        </form>

        <!-- Espaçamento entre os elementos -->
        <div style="margin-top: 20px;"></div>

        <!-- Botões em uma linha com espaçamento horizontal -->
        <div class="d-flex">
            <a href="ver_vendas_cosmeticos.php" class="btn btn-info mr-2">Ver Vendas de Cosméticos</a>
            <a href="ver_estoque_cosmeticos.php" class="btn btn-info mr-2">Ver Estoque de Cosméticos</a>
        </div>
        
        <footer>
            <p>&copy; 2023 Criado para apenas estudo por Matheus Zipper. Todos os direitos reservados.</p>
        </footer>
    </div>
</body>
</html>
