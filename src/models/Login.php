<?php
// require_once(realpath(MODEL_PATH . '/User.php'));
loadModel('User');

class Login extends Model {


    public function validate() {
        $errors = [];

        if(!$this->email) {
            $errors['email'] = 'Email é um campo obrigatório.'; 
        }

        if(!$this->password) {
            $errors['password'] = 'Senha é um campo obrigatório.'; 
        }

        if(count($errors) > 0) {
            throw new ValidationException($errors);
        }
    }

    /**
     * Função que verifica as informações de email e senha.
     */
    public function checkLogin() {
        $this->validate();
        $user = User::getOne(['email' => $this->email]);
        if($user) {

            if($user->end_date) {
                throw new AppException('Usuário desligado da empresa.');
            }

            if(password_verify($this->password, $user->password)) {
                return $user;
            }
        }
        throw new AppException('Usuário e senha inválidos.');
    }
}