<?php

namespace App\Controller\Task;

use App\Controller\Controller;

class Task extends Controller
{
    // Está usando a mesma função pra listar tudo e para excluir a tarefa, criar funções diferentes, index(Listar), ajaxDeleteTaskById (Deletar)
    public function index()
    {        
        $id = $_POST['id']; // Nem sempre o $_POST terá o valor id, precisa ter um if (!empty($_POST['id'])) e só assim atribuir o valor.
        $this->appendCss('tasks/style');
        $this->appendJs('tasks/taskDelete');
        $this->nameTemplate = 'tasks/listing';
        $this->business->getTasksPriority();
        $this->business->deleteTasksUser($id);
        $this->data['tasks'] = $this->business->getTasksUser();
        // Mesmo problema mensionado acima.
        $data = array( // essa logica deveria estar na business da  logDeleteTasksUser
            'title_log' => $_POST['titulo'],
            'usuario_log' => $_SESSION['username'],
            'ip_log' =>$_SERVER['REMOTE_ADDR'] ,
            'data_log' => date('d/m/Y H:i'),
        );
        $this->business->logDeleteTasksUser($data);
        $this->render();
    }
}
