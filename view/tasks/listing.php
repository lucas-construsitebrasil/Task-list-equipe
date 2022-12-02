<?php
session_start();
if (($_SESSION['login'] == false)) {
    header("Location: login");
    die();
}
?>
<section class="section-listing-taks">
    <div class="container mt-1 ">
        <h2 class="text-center fs-1">Tarefas</h2>
        <p class="text-center fs-4">As tarefas são ordenadas pela sua ordem de prioridade: </p>
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_ZcIjtY.json" background="transparent" speed="1" style="width: 100px; height: 100px;" loop autoplay></lottie-player>
        <a class="btn btn-success" href="cadastrar-tarefas">Cadastrar</a>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Nome da tarefa</th>
                    <th>Descrição</th>
                    <th>Prioridade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($tasks as $value) {
                    if ($value['fk_id_prioridade_tasks_prioridade'] == 1) {
                        $priority = "Baixa";
                        $taskColor = "#4871c6";
                    } else if ($value['fk_id_prioridade_tasks_prioridade'] == 2) {
                        $priority = "Media";
                        $taskColor = "#dcdc23b5";
                    } else {
                        $priority = "Alta";
                        $taskColor = "#b92020";
                    }
                ?>
                    <tr style="background-color:<?= $taskColor ?>" id="<?= $value['id_task'] ?>">
                        <td class="title-jquery"><?= $value['title_task'] ?></td>
                        <td><?= $value['description_task'] ?></td>
                        <td><?= $priority ?></td>
                        <td>
                            <button class="btn btn-danger excludeTask" data-titulo="<?= $value['title_task'] ?>" value="<?= $value['id_task'] ?>">
                                <i class="fa-sharp fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
</section>
<!-- 
class="
    ($task["fk_id_prioridade_tasks_prioridade"] == 2) ?
        'media'
            : (($task["fk_id_prioridade_tasks_prioridade"] == 3) ?
                'alta'
            :
                'baixa')
" -->