<?php

session_start();

//VARIAVEL QUE VERIFICA SE A AUTENTICAÇÃO FOI REALIZADA
$usuario_autenticado = false;

$usuario_id = null;

$usuario_perfil_id = null;

$usuario_email = null;

$perfis = array(1 => 'adm', 2 => 'user');

//USUARIOS DO SISTEMA
$usuarios_app = array(
    array('id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '1234','perfil_id' => 1),
    array('id' => 2, 'email' => 'hilton@teste.com.br', 'senha' => '1234', 'perfil_id' => 1),
    array('id' => 3, 'email' => 'user@teste.com.br', 'senha' => 'abcd', 'perfil_id' => 2),
    array('id' => 4, 'email' => 'amanda@teste.com.br', 'senha' => 'abcd', 'perfil_id' => 2)
);

foreach($usuarios_app as $user){
   
    if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
        $usuario_autenticado = true;
        $usuario_id = $user['id'];
        $usuario_perfil_id = $user['perfil_id'];
        $usuario_email = $user['email'];
    }
}

    if($usuario_autenticado){
        echo 'Usuário autenticado.';
        $_SESSION['autenticado'] = 'sim';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        $_SESSION['email'] = $usuario_email;
        header('Location: home.php');
    }else{
        $_SESSION['autenticado'] = 'nao';
        header('Location: index.php?login=erro');
    }

?>