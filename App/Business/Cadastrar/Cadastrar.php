<?php

namespace App\Business\Cadastrar;

use App\Business\Business;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//Load Composer's autoloader
require 'vendor/autoload.php';


class Cadastrar
{
    use Business;
    public function insertTaskUser($post)
    {
        if (!empty($post)) {
            $title = $post['titulo'];
            $description = $post['descricao'];
            $priority = $post['prioridade'];
            
            if ($priority == 3) {
                $mail = new PHPMailer(true);
                    $mail->isSMTP();                                            
                    $mail->Host       = 'mail.enviarformularios.com.br';                     
                    $mail->SMTPAuth   = true;                                   
                    $mail->Username   = 'noreply@enviarformularios.com.br';                     
                    $mail->Password   = 'nd73n7329dn';                               
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
                    $mail->Port       = 465;                                    
    
                    $mail->setFrom('noreply@enviarformularios.com.br', 'Mailer');
                    $mail->addAddress('mario.vale@construsitebrasil.com.br', 'Joe User');     
                    $mail->addReplyTo('noreply@enviarformularios.com.br', 'Information');
    
                    $mail->isHTML(true);                                  
                    $mail->Subject = 'Tarefa alta veio pra você';
                    $mail->Body    = "<b>A tarefa de titulo: $title, chegou pra voce com alta prioridade. </b>";
                    $mail->AltBody = 'Tarefaa';
    
                    $mail->send();
            }
        }

        $data = array(
            'title_task' => $title,
            'description_task' => $description,
            'fk_id_prioridade_tasks_prioridade' => $priority,
        );

        
        return $this->repository->insertTasks($data);
    }
}
