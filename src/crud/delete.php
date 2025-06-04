<?php
require_once(__DIR__ . '/../../src/conexao.php');
require_once(__DIR__ . '/../../src/crud/verifica.php');

if (isset($_GET['id'])){

    $id = $_GET['id'];

    $sql = "DELETE FROM pratos WHERE id = :id";
    $stmt = $pdo -> prepare ($sql);
    $stmt -> bindParam (':id', $id);

    if($stmt -> execute()){
        echo "Prato excluído com sucesso!";
        
    }
    else{
        echo"Erro ao excluir o filme.";

    }
}
else{
    echo "ID não especificado.";

}
?>