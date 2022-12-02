<?php

namespace App\Controller\Task;

use App\Controller\Controller;

class Task extends Controller
{
    public function index()
    {        
        $id = $_POST['id'];
        $this->appendCss('tasks/style');
        $this->appendJs('tasks/taskDelete');
        $this->nameTemplate = 'tasks/listing';
        $this->business->getTasksPriority();
        $this->business->deleteTasksUser($id);
        $this->data['tasks'] = $this->business->getTasksUser();
        $data = array(
            'title_log' => $_POST['titulo'],
            'usuario_log' => $_SESSION['username'],
            'ip_log' =>$_SERVER['REMOTE_ADDR'] ,
            'data_log' => date('d/m/Y H:i'),
        );
        $this->business->logDeleteTasksUser($data);
        $this->render();
    }
}
