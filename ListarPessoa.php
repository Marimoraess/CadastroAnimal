
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Pessoas</title>
    <link rel="stylesheet" href="css/style11.css">
</head>
<body>
<?php
    include('includes/conexao.php');

    $sql = "SELECT pessoa.id, pessoa.nome nomepessoa, pessoa.email, pessoa.endereco, pessoa.bairro, pessoa.cep, cid.nome_cidade nomecidade, cid.estado 
            FROM Pessoa pessoa 
            LEFT JOIN cidade cid ON cid.id = pessoa.id_cidade";

    $result = mysqli_query($con, $sql);

    if (!$result) {
        die("Erro na consulta: " . mysqli_error($con));
    }
?>
    <h1>Consulta de Pessoas</h1>
    <div style="text-align: center; margin-bottom: 20px;">
        <a href="CadastroPessoa.php" class="btn">Cadastrar Pessoa</a>
        <a href="../index.html" class="btn">Voltar à página inicial</a>
    </div>
    <table align="center" border="1">
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Endereço</th>
            <th>Bairro</th>
            <th>CEP</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>Alterar</th>
            <th>Deletar</th>
        </tr>
        <?php
            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['nomepessoa']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['endereco']."</td>";
                echo "<td>".$row['bairro']."</td>";
                echo "<td>".$row['cep']."</td>";
                echo "<td>".$row['nomecidade']."</td>";
                echo "<td>".$row['estado']."</td>";
                echo "<td><a href='alteraPessoa.php?id=".$row['id']."'>Alterar</a></td>";
                echo "<td><a href='deletaPessoa.php?id=".$row['id']."'>Deletar</a></td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>
