<?php

namespace App\Controller\Login;

use App\Controller\Controller;

class Login extends Controller
{

    public function index()
    {
        $this->appendJs('login/cronometro');
        $this->appendCss('login/style');
        $this->business->validationsLoginErro();
        $this->data['dateBlock'] = $this->business->dateBlock();
        $this->data['status'] = $this->business->status();
        $this->nameTemplate = 'login/index';
        $this->render();
    }
}
