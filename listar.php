<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href= "todoscss/listar.css">
        <title> produtos </title>
</head>
<body class= "listar">
    <h1>produtos </h1>

    <?php
    $stmt = $pdo->query ('SELECT * FROM produto');
    $stmt->execute();
    $produto = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count ($produto) == 0) {
        echo '<p> Nenhuma fruta escolhida. </p>';
    } else {
        echo '<table border="1">';
        echo '<thead><tr><th>nome</th><th>tamanho</th><th>peso</th><th>quantidade</th><th>Preço</th><th colspan="2">Opções</th></tr></thead>';
        echo '<tbody>';

        foreach ($produto as $produtos) {
            echo '<tr>';
            echo '<td>' . $produtos['nome'] . '</td>';
            echo '<td>' . $produtos['tamanho'] . '</td>';
            echo '<td>' . $produtos['peso'] . '</td>';
            echo '<td>' . $produtos['quantidade'] . '</td>';
            echo '<td>' . $produtos['preco'] . '</td>';
            echo '<td><a style="color:black;" href="atualizar.php?id=' . 
        $produtos ['ID'] . '">atualizar</a></td>';
            echo '<td><a style="color:black;" href="deletar.php?id=' . $produtos ['ID'] . '">Deletar</a></td>';
            echo '<try>';
        }
        echo '</tbody>';
        echo '</table>';
    }

    ?>
    </body>

    </html>