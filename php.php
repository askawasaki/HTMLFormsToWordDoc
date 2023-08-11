<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    // Crie um documento Word usando alguma biblioteca ou método
    // Aqui, vamos usar a biblioteca PHPWord como exemplo:
    require 'vendor/autoload.php'; // Certifique-se de ter a biblioteca instalada via Composer

    $phpWord = new \PhpOffice\PhpWord\PhpWord();
    $section = $phpWord->addSection();
    $section->addText("Dados do Formulário:");
    $section->addText("Nome: $nome");
    $section->addText("Email: $email");

    $filename = 'formulario.docx';
    $phpWord->save($filename);

    // Faça o download do arquivo
    header("Content-Disposition: attachment; filename=$filename");
    readfile($filename);
    unlink($filename); // Remova o arquivo após o download
}
?>
