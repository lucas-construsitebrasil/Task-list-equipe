<?php
session_start();
if (($_SESSION['login'] == true)) {
    header("Location: listagem-tarefas");
    die();
}
?>

<div class="center-content">
    <section class="login-area">
        <div class="container h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="<?= CAMINHO_IMAGENS ?>/login-img.png" class="img-fluid" alt="Lista de tarefas">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <?php
                    if ($status == 'F') { ?>
                        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                        <lottie-player class="pt-3" src="https://assets6.lottiefiles.com/packages/lf20_lv3b9ukb.json" background="transparent" speed="1" style="width: 350px; height: 350px;" loop autoplay></lottie-player>
                        <?php
                        $hourBlock = date('H:i', strtotime("+180 seconds", strtotime($dateBlock)));
                        ?>
                        <div class="ps-3 ms-5 fs-4 mb-5">Você foi bloqueado as <?= $dateBlock ?> e será desbloqueado as :<?= $hourBlock ?></div>
                        <input id="hora" type="hidden" data-hourblock="<?= $hourBlock ?>">
                    <?php } else {
                    ?>
                        <form method="post">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="username">Usuário</label>
                                <input type="email" id="username" name="username" class="form-control form-control-lg" placeholder="Digite seu usuário" />
                            </div>
                            <div class="form-outline mb-3">
                                <label class="form-label" for="password">Senha</label>
                                <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Digite sua senha" />
                            </div>
                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</div>