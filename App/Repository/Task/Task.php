<?php

namespace App\Repository\Task;

use App\Repository\Repository;

class Task
{

    use Repository;

    public function getTasksPriority()
    {
        $db = $this->connection;
        return $db->get('tasks_prioridade');
    }

    public function insertTaskslog($data)
    {
        if (!empty($_POST)) {
            $db = $this->connection;
            $db->insert('log', $data);
        }
    }

    public function getTasks()
    {
        $db = $this->connection;
        $db->get('tasks');
        $db->orderBy("fk_id_prioridade_tasks_prioridade", "Desc");
        return $db->get('tasks');
    }

    public function deleteTasks($id)
    {
        $db = $this->connection;
        $db->where('id_task', $id);
        $db->delete('tasks');
    }
}
