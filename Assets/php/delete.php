<?php
require_once 'conexao.php';
require_once 'verifica.php';

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