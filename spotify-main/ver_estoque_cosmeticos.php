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
    <div class="container">
        <!-- Lógica para exibir o estoque de cosméticos -->
        <?php
        // Conectar ao banco de dados (substitua as informações do banco de dados conforme necessário)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "aula_php";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Falha na conexão com o banco de dados: " . $conn->connect_error);
        }

        // Consultar o estoque de cosméticos
        $result = $conn->query("SELECT * FROM cosmeticos");

        if ($result && $result->num_rows > 0) {
            echo '<table class="table">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Marca</th>';
            echo '<th>Nome</th>';
            echo '<th>Código</th>';
            echo '<th>Valor</th>';
            echo '<th>Estoque</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['marca'] . '</td>';
                echo '<td>' . $row['nome'] . '</td>';
                echo '<td>' . $row['codigo'] . '</td>';
                echo '<td>' . $row['valor'] . '</td>';
                echo '<td>' . $row['estoque'] . '</td>';
                echo '</tr>';
            }
            
            echo '</tbody>';
            echo '</table>';
}