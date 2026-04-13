<?php
include("conexao.php");

$id = $_GET['id'];

$conn->query("DELETE FROM guitarra WHERE GuitarraID=$id");

header("Location: index.php");
?>