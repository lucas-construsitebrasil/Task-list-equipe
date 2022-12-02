<?php

namespace App\Repository\Cadastrar;

use App\Repository\Repository;

class Cadastrar
{

    use Repository;
    
    public function insertTasks($data)
    {
        $db = $this->connection;
        if (isset($_POST['cadastrar'])) {
            $dados = $db->insert('tasks', $data);
            if ($dados) { // Repositório não pode retornar HTML nele só pode retornar informações do banco, ou true/false
                echo '<h3 class="text-sucess text-center"> Cadastro realizado com sucesso!</h3>';
            } else {
                echo '<h3 class="text text-center"> Erro no cadastro!</h3>';
            }
        }
    }
}
