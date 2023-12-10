<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="CSS/estilo.css">
    <!-- Adicione estilos específicos para o calendário, se necessário -->
</head>
<body>   
    <header>
        <!-- Seu cabeçalho aqui -->
    </header>
    <div class="container">

        <h2>Registrar Venda</h2>

        <form action="processar_venda.php" method="post">
            <label for="data">Data da Venda:</label>
            <input type="date" id="data" name="data" class="form-control" required><br>

            <label for="produto">Produto Vendido:</label>
            <input type="text" id="produto" name="produto" class="form-control" required><br>

            <label for="codigo">Código do Produto:</label>
            <input type="text" id="codigo" name="codigo" class="form-control" required><br>

            <label for="valor">Valor:</label>
            <input type="text" id="valor" name="valor" class="form-control" required><br>

            <label for="canal">Canal de Venda:</label>
            <input type="text" id="canal" name="canal" class="form-control" required><br>

            <label for= "marca">Marca do produto:</label>
            <input type="text" id="marca" name="marca"class=" form-control" required><br>

            <button type="submit" class="btn btn-primary">Registrar Venda</button>
        </form>

       <!-- ... Seu código anterior ... -->
<div style="margin-top: 20px;">
    <a href="ver_vendas.php" class="btn btn-info">Ver Vendas Realizadas</a>
    <a href="index.php" class="btn btn-info">Voltar</a>
</div>

<!-- ... Seu código posterior ... -->
<!-- Seu rodapé aqui -->
</body>
</html>

