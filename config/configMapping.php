<?php

/* Mapa de rotas para páginas logadas */

$mapLoggedIn = array(
    'home' => array('Home/Home', 'index'),
);

/* Mapa de rotas para páginas logadas via AJAX */

$mapAjaxLoggedIn = array(
    'ajax-tarefas' => array('Task\Task', 'index'), // O nome não está bacana, ela deleta uma tarefa, não tem nada na rota que remeta a isso
);
/* Mapa de rotas para páginas NAO logadas */
$map = array(
    'login' => array('Login\Login', 'index'),
    'listagem-tarefas' => array('Task\Task', 'index'),
    'cadastrar-tarefas' => array('Cadastrar\Cadastrar', 'index'),

);
 