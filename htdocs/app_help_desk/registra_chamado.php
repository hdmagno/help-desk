<?php
    session_start();

    //substituindo eventuais # por - 
    $titulo = str_replace('#', '-', $_POST['titulo']);
    $categoria = str_replace('#', '-', $_POST['categoria']);
    $descricao = str_replace('#', '-', $_POST['descricao']);
    $autor = str_replace('#', '-', $_SESSION['email']);
    
    //recuperando as informações que serão salvas no arquivo
    $texto =  $_SESSION['id'] . '#' . $autor . '#' . $titulo . '#' .  $categoria . '#' . $descricao . PHP_EOL;
    
    //abrindo o arquivo
    $arquivo = fopen('../../app_help_desk/arquivo.hd','a');    


    //escrevendo no arquivo
    fwrite($arquivo, $texto);
    
    //fechando o arquivo
    fclose($arquivo);

    header('Location: abrir_chamado.php');

    //echo $texto;
?>