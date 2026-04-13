<?php
include("conexao.php");

$id = $_POST['id'];
$madeira = $_POST['madeira'];
$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$corda = $_POST['corda'];
$luthier = $_POST['luthier'];

if(empty($id)){
    $sql = "INSERT INTO guitarra (MadeiraBraco, ModeloID, MarcaID, Corda, Luthier)
            VALUES ('$madeira', '$modelo', '$marca', '$corda', '$luthier')";
}else{
    $sql = "UPDATE guitarra SET
            MadeiraBraco='$madeira',
            ModeloID='$modelo',
            MarcaID='$marca',
            Corda='$corda',
            Luthier='$luthier'
            WHERE GuitarraID=$id";
}

$conn->query($sql);

header("Location: index.php");
?>