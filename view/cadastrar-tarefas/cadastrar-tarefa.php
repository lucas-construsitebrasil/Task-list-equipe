<?php
session_start();
if (($_SESSION['login'] == false)) {
    header("Location: login");
    die();
}
?>
<div class="center-content">
    <section class="login-area">
        <div class="container h-custom">
            <div class="row d-flex justify-content-center align-items-center h-75">
                <div class="col-md-12 col-lg-12 col-xl-12 offset-xl-1">
                    <h2 class="mb-3 ">CADASTRAR TAREFAS</h2>
                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                    <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_wd1udlcz.json" background="transparent" speed="1" style="width: 200px; height: 200px;" loop autoplay></lottie-player>
                    <form method="post">
                        <div class="form-outline mb-3 pt-2 ">
                            <label class="form-label" for="titulo">Titulo da Tarefa:</label>
                            <input type="text" id="titulo" required name="titulo" class="form-control form-control-lg" placeholder="Digite o titulo da tarefa" />
                        </div>
                        <div class="form-outline mb-2">
                            <label class="form-label" for="descricao">Descricao:</label>
                            <input type="text" id="descricao" required name="descricao" class="form-control form-control-lg" placeholder="Digite a descricao" />
                        </div>
                        <div class="form-outline mb-2">
                            <label class="form-label" for="prioridade">Prioridade:</label>
                            <select name="prioridade" id="prioridade" required>
                                <option value="1">Baixa</option>
                                <option value="2">Media</option>
                                <option value="3">Alta</option>
                            </select>
                        </div>
                        <div class="text-center text-lg-start mt-2 pt-2">
                            <a href="../task-list/listagem-tarefas" class="btn btn-danger btn-lg" style=" padding-right: 1.5rem;">Voltar</a>
                            <?php
                            $dia = date('D');
                            $esconder = "";
                            if ($dia == "Sat" || $dia == "Sun") {
                                $esconder = "hidden"; ?>
                                <div class="display-4">Volte em dia útil</div>
                            <?php } else { ?>
                                <button type="submit" name="cadastrar" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem; ">Enviar Tarefa</button>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>