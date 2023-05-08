<?php
include 'db.php';
if(!isset($_GET['id'])) {
    header('Location: listar.php');
    exit;
}
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM produto WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment){
    header('Location: listar.php');
    exit;
}
$nome     = $appointment['nome'];
$preco    = $appointment['preco'];
$tamanho  = $appointment['tamanho'];
$quantidade = $appointment['quantidade'];
$peso = $appointment ['peso'];
$preco = $appointment['preco'];
?>

<!DOCTYPE html>
<link rel="stylesheet" href="todoscss/atualizar.css">
<html>
<head>
    <title>Atualizar Compromisso</title>
</head>
<body>
     <h1>Atualizar Compromisso</h1>
     <form method="post">
       
     <label for="nome">Nome</label>
        <input type="text" name="nome" value="<?=$appointment['nome'];?>"required><br> 

        <label for="tamanho">Tamanho</label>
        <input type="text" name="tamanho" value="<?=$appointment['tamanho'];?>"required><br> 

        <label for="peso">Peso</label>
        <input type="text" name="peso" maxLength="11" value="<?=$appointment['peso'];?>"required><br> 

        <label for="quantidade">Quantidade</label>
        <input type="text" name="quantidade" value="<?=$appointment['quantidade'];?>"required><br> 

        <label for="preco">Preço</label>
        <input type="text" name="preco" value="<?=$appointment['preco'];?> "required><br> 

        <button type="submit">Atualizar</button>
</form>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $tamanho= $_POST['tamanho'];
    $peso = $_POST['peso'];
    $quantidade = $_POST['quantidade'];

    $stmt = $pdo->prepare('UPDATE produto SET nome = ?, preco = ?, tamanho= ?, peso = ?, quantidade = ? WHERE id = ?');
    $stmt->execute([$nome, $preco, $tamanho, $peso, $quantidade, $id]);
    header('Location: listar.php');
    exit;
}
