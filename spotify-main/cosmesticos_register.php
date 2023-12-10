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
         
        </nav>
    </header>
    <h1>SISTEMA DE GESTÃO DE VENDAS E COMPRAS</h1>
    <div class="container">
        <!-- Mensagem de sucesso -->
        <?php
            if (isset($_GET['success']) && $_GET['success'] == 'true') {
                echo '<div class="alert alert-success" role="alert">Cadastro realizado com sucesso!</div>';
            }
        ?>



        <!-- Formulário para cadastrar produtos de beleza -->
        <form action="insert_cosmeticos.php" method="post">
            <label for="marca">Marca do Produto:</label><br>
            <input type="text" id="marca" name="marca" class="form-control"><br>
            <label for="nome">Nome do Produto:</label><br>
            <input type="text" id="nome" name="nome" class="form-control"><br>
            <label for="codigo">Código do Produto:</label><br>
            <input type="text" id="codigo" name="codigo" class="form-control"><br>
            <label for="valor">Valor:</label><br>
            <input type="text" id="valor" name="valor" class="form-control"><br>
            <label for="estoque">Estoque:</label><br>
            <input type="text" id="estoque" name="estoque" class="form-control"><br>
            <input type="submit" value="Registrar" class="btn btn-primary">
        </form>

        <!-- Espaçamento entre os elementos -->
        <div style="margin-top: 20px;"></div>

        <!-- Botão para registrar venda de produtos de beleza -->
        <div>
            <a href="register_vendas_comesticos.php" class="btn btn-primary">Registrar Venda de Cosméticos</a>
        </div>

        <!-- Botão para ver o estoque de produtos de beleza -->
        <div style="margin-top: 20px;">
            <a href="ver_estoque_cosmeticos.php" class="btn btn-info">Ver Estoque de Cosméticos</a>
        </div>

        
    </div>

</body>
</html>
