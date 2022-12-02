<?php

namespace App\Business\Login;

use App\Business\Business;

class Login
{
    use Business;
    public function status()
    {
        $status = $this->repository->getLogin()['0']['status_user_login'];
        return $status;
    }

    public function dateBlock()
    {
        $dateBlock = $this->repository->getLogin()['0']['data_block_login'];
        return $dateBlock;
    }

    public function validationsLoginErro() // Nome  da função e de todas variaveis deveria ser em inglês
    {

        // Função tem muitas responsabilidades, lembrar do princípio da responsabilidade única, divir essa função em 2 ou três.

        $blockBd =  $this->repository->getLogin()['0']['data_block_login'];

        $hourUnblock = date('H:i', strtotime("+180 seconds", strtotime($blockBd)));


        if (date('H:i') == $hourUnblock) {
            $this->repository->updateStatus($status = 'V');
            $this->repository->updateErroLogin($erro = '0');
        }
        $erro =  $this->repository->getLogin()['0']['userqtdfail_login'];
        if (!empty($_POST)) { // Na Business não usamos o $_POST, passamos o post como parametro.

            $userLogin = $this->repository->getLogin()['0']['user_login']; // Por lei a senha sempre deve estar criptografada, ex: md5 ou sha1
            $passwordLogin = $this->repository->getLogin()['0']['password_login'];
            $userFormValid = $_POST['username'];
            $senhaFormValid = $_POST['password'];

            if (($userFormValid ==  $userLogin)
                &&
                ($senhaFormValid == $passwordLogin)
            ) {
                echo "Login efetuado com sucesso";

                $_SESSION['login'] = true;
                $_SESSION['username'] = $userLogin;

                header("Location: listagem-tarefas"); // Sempre que você usa o Header Location você precisa dar um die dps, 
                //pois robos não seguem esse redirecionamento, podendo causar uma falha de segurança
            } elseif ($userFormValid != $userLogin || $passwordLogin != $senhaFormValid) {

                if ($erro <= 2) {
                    $erro += 1;
                    $this->repository->updateErroLogin($erro);
                    if ($erro == 1) {
                        echo ("<h3 class='text-error'>Você errou uma vez </h3>");
                    } elseif ($erro == 2) {
                        echo ("<h3 class='text-error'>Você duas vezes</h3>");
                    } else {
                        echo ("<h3 class='text-error'>Você errou tres vezes e foi bloqueado</h3>");
                        $this->repository->updateBlock(date('H:i'));
                        $this->repository->updateStatus($status = 'F');
                    }
                }
            }
        }
    }
}
