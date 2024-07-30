<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Cidades</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            text-align: center;
            padding: 40px;
        }

        h1 {
            color: #6f42c1; /* Roxo */
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            margin: 5px;
            text-decoration: none;
            color: #ffffff;
            background-color: #6f42c1; /* Roxo */
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #5a2e91; /* Roxo escuro */
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #ffffff;
        }

        th, td {
            border: 1px solid #6f42c1; /* Roxo */
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #6f42c1; /* Roxo */
            color: #ffffff;
        }

        tr:hover {
            background-color: #f1f1f1; /* Fundo ao passar o mouse */
        }
    </style>
</head>
<body>
    <?php
        include('includes/conexao.php');
        $sql = "SELECT * FROM Cidade";
        $result = mysqli_query($con, $sql);
    ?>
    <h1>Consulta de Cidades</h1>
    <div style="text-align: center; margin-bottom: 20px;">
        <a href="CadastroCidade.html" class="btn">Cadastrar Nova Cidade</a>
        <a href="index.html" class="btn">Voltar à página inicial</a>
    </div>
    <table>
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Estado</th>
            <th>Alterar</th>
            <th>Deletar</th>
        </tr>
        <?php
            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['nome']."</td>";
                echo "<td>".$row['estado']."</td>";
                echo "<td><a href='alteraCidade.php?id=".$row['id']."'>Alterar</a></td>";
                echo "<td><a href='DeletarCidade.php?id=".$row['id']."'>Deletar</a></td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>