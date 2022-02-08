<?php
// require_once(realpath(MODEL_PATH . '/User.php'));
loadModel('User');

class Login extends Model {

    /**
     * Função que verifica as informações de email e senha.
     */
    public function checkLogin() {
        $user = User::getOne(['email' => $this->email]);
        if($user) {
            if(password_verify($this->password, $user->password)) {
                return $user;
            }
        }
        throw new Exception();
    }
}