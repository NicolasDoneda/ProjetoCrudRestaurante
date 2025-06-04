<?php
//Nao tirar esse script daqui pfv ele é uma bomba relógio.
$nomeImagem = $_GET['img'] ?? '';

$caminho = __DIR__ . '/../../../Assets/imagem_pratos/' . basename($nomeImagem);

if(file_exists($caminho)){
    $tipo = getimagesize($caminho);
    header("Content-Type:" . $tipo['mime']);
    readfile($caminho);
    exit;
}
else{
    http_response_code(404);
    echo "Imagem não encontrada";

}