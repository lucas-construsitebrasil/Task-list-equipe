<?php

namespace App\Business\Task;

use App\Business\Business;

class Task
{
    use Business;

    public function getTasksPriority()
    {
        return $this->repository->getTasksPriority();
    }


    public function logDeleteTasksUser($data)
    {
        return $this->repository->insertTaskslog($data);
    }
    
    public function getTasksUser()
    {
        return $this->repository->getTasks();
    }

    public function deleteTasksUser($id)
    {
        return $this->repository->deleteTasks($id);
    }
}
