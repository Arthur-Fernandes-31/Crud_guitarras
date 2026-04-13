<?php
include("conexao.php");

$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID não informado.");
}

$result = $conn->query("SELECT * FROM guitarra WHERE GuitarraID = $id");
$row = $result->fetch_assoc();

if (!$row) {
    die("Guitarra não encontrada.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Guitarra</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Cadastro de Guitarras</h1>
    <nav>
        <a href="index.php">Guitarras</a>
        <a href="marcas.php">Marcas</a>
        <a href="modelos.php">Modelos</a>
        <a href="cadastro.php" class="nav-btn">Cadastrar</a>
    </nav>
</header>

<main>
    <section class="card">
        <h2>Editar Guitarra</h2>

        <form action="salvar_edicao.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['GuitarraID']; ?>">

            <input type="text" name="madeira" placeholder="Madeira Braço" value="<?php echo $row['MadeiraBraco']; ?>" required>

            <select name="modelo" required>
                <option value="">Selecione o modelo</option>
                <?php
                $m = $conn->query("SELECT * FROM modelo");
                while($mod = $m->fetch_assoc()){
                    $selected = ($mod['ModeloID'] == $row['ModeloID']) ? "selected" : "";
                    echo "<option value='{$mod['ModeloID']}' $selected>{$mod['Nome']}</option>";
                }
                ?>
            </select>

            <select name="marca" required>
                <option value="">Selecione a marca</option>
                <?php
                $m = $conn->query("SELECT * FROM marca");
                while($mar = $m->fetch_assoc()){
                    $selected = ($mar['MarcaID'] == $row['MarcaID']) ? "selected" : "";
                    echo "<option value='{$mar['MarcaID']}' $selected>{$mar['Nome']}</option>";
                }
                ?>
            </select>

            <input type="text" name="corda" placeholder="Corda" value="<?php echo $row['Corda']; ?>">
            <input type="text" name="luthier" placeholder="Luthier" value="<?php echo $row['Luthier']; ?>">

            <button type="submit" class="btn save">Atualizar</button>
        </form>
    </section>
</main>

</body>
</html>