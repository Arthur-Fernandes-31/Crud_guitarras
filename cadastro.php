<?php include("conexao.php"); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Guitarra</title>
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
        <h2>Nova Guitarra</h2>

        <form action="salvar.php" method="POST">
            <input type="hidden" name="id" id="id">

            <input type="text" name="madeira" placeholder="Madeira Braço" required>

            <select name="modelo" required>
                <option value="">Selecione o modelo</option>
                <?php
                $m = $conn->query("SELECT * FROM modelo");
                while($row = $m->fetch_assoc()){
                    echo "<option value='{$row['ModeloID']}'>{$row['Nome']}</option>";
                }
                ?>
            </select>

            <select name="marca" required>
                <option value="">Selecione a marca</option>
                <?php
                $m = $conn->query("SELECT * FROM marca");
                while($row = $m->fetch_assoc()){
                    echo "<option value='{$row['MarcaID']}'>{$row['Nome']}</option>";
                }
                ?>
            </select>

            <input type="text" name="corda" placeholder="Corda">
            <input type="text" name="luthier" placeholder="Luthier">

            <button type="submit" class="btn save">Salvar</button>
        </form>
    </section>
</main>

</body>
</html>