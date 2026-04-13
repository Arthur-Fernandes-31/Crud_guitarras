<?php include("conexao.php"); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Guitarras</title>
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
        <h2>Lista de Guitarras</h2>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Madeira</th>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Corda</th>
                    <th>Luthier</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT g.*, m.Nome as Modelo, ma.Nome as Marca
                        FROM guitarra g
                        JOIN modelo m ON g.ModeloID = m.ModeloID
                        JOIN marca ma ON g.MarcaID = ma.MarcaID";

                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()){
                    echo "<tr>
                        <td>{$row['GuitarraID']}</td>
                        <td>{$row['MadeiraBraco']}</td>
                        <td>{$row['Modelo']}</td>
                        <td>{$row['Marca']}</td>
                        <td>{$row['Corda']}</td>
                        <td>{$row['Luthier']}</td>
                        <td>
                            <div class='actions'>
                                <a class='btn edit' href='editar.php?id={$row['GuitarraID']}'>Editar</a>
                                <a class='btn delete' href='excluir.php?id={$row['GuitarraID']}'>Excluir</a>
                            </div>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </section>
</main>

</body>
</html>