<?php
// echo "Login controller... <br>";
loadModel('Login');

//Definindo a variável como nula no início
$exception = null;

if(count($_POST) >0) {
    $login = new Login($_POST);

    try {
        $user = $login->checkLogin();
        echo "Usuário {$user->name} logado!";
    } catch(AppException $e) {
        $exception = $e;
    }
}

loadView('login', $_POST + ['exception' => $exception]);