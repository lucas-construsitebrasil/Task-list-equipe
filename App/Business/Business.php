<?php

namespace App\Business;

trait Business
{

    protected $repository;

    public function __construct()
    {

        $class = '\App\Repository\\' . str_replace('App\Business\\', '', get_class($this));

        if (empty($class)) {
            die('get class não funcionou');
        }
        if (class_exists($class)) {
            $this->repository = new $class;
        } else {
            die('class "' . $class . '" não existe');
        }
    }

}
