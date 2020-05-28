<div class="login">
    <!-- Register -->
    <div class="login__block active" id="register">
        <div class="login__block__header">
            <img alt="App Logo" src="<?php echo base_url('assets/img/logo/LogoIcon01.png') ?>"/>
            <h4>
                <span class="">Scada</span>
                <span class="text-success">Unity</span>
            </h4>

            Redefinir senha

            <div class="actions actions--inverse login__block__actions">
                <div class="dropdown">
                    <i data-toggle="dropdown" class="zmdi zmdi-more-vert actions__item"></i>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="<?php echo base_url('Auth/login') ?>">Login</a>
                        <a class="dropdown-item" href="<?php echo base_url('Auth/forgot') ?>">Esqueci minha senha
                            ?</a>
                    </div>
                </div>
            </div>
        </div>

        <form method="post" action="<?php echo base_url('Auth/create') ?>">
            <div class="login__block__body">
                <div class="form-group">
                    <input type="text" class="form-control text-center" placeholder="Nova senha" name="name">
                </div>

                <div class="form-group>
                    <input type="password" class="form-control text-center" placeholder="Confirmar">
                </div>

                <input type="submit" value="Continuar" style="cursor: pointer" class="btn btn-block login__block__btn">
            </div>
        </form>
    </div>
</div>