<div class="login">
    <!-- Forgot Password -->
    <div class="login__block active" id="forget-password">
        <div class="login__block__header">
            <img src="<?php echo base_url('assets/img/logo/LogoIcon01.png') ?>"/>
            <h4>
                <span class="">Scada</span>
                <span class="text-success">Unity</span>
            </h4>

            Esqueci minha senha?

            <div class="actions actions--inverse login__block__actions">
                <div class="dropdown">
                    <i data-toggle="dropdown" class="zmdi zmdi-more-vert actions__item"></i>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="<?php echo base_url('login') ?>">Login</a>
                        <a class="dropdown-item" href="<?php echo base_url('register') ?>">Criar uma
                            conta</a>
                    </div>
                </div>
            </div>
        </div>

        <form method="post" action="<?php echo base_url('Auth/requestForgot') ?>">
            <div class="login__block__body">
                <p class="mb-5">Informe seu endereço de e-mail e enviaremos um e-mail com as instruções para a
                    recuperação da sua senha</p>

                <div class="form-group">
                    <input type="email" class="form-control text-center" placeholder="Email" autocomplete="username"
                           name="email">
                </div>

                <input type="submit" value="Enviar" style="cursor: pointer" class="btn btn-block login__block__btn">
            </div>
        </form>
    </div>
</div>
