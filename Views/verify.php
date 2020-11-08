<?php ?>
<div class="login">
    <!-- Forgot Password -->
    <div class="login__block active" id="forget-password">
        <div class="login__block__header">
            <img alt="App Logo" src="<?php echo base_url('assets/img/logo/LogoIcon01.png') ?>"/>
            <h4>
                <span class="">Scada</span>
                <span class="text-success">Unity</span>
            </h4>

            Ativar conta

            <div class="actions actions--inverse login__block__actions">
                <div class="dropdown">
                    <i data-toggle="dropdown" class="zmdi zmdi-more-vert actions__item"></i>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="<?php echo base_url('auth/login') ?>">Login</a>
                        <a class="dropdown-item" href="<?php echo base_url('auth/forgot') ?>">Esqueci minha senha
                            ?</a>
                        <a class="dropdown-item" href="<?php echo base_url('auth/register') ?>">Criar uma
                            conta</a>
                    </div>
                </div>
            </div>

        </div>

        <form method="post" action="<?php echo base_url('auth/activateAccount') ?>">
            <div class="login__block__body">

                <div class="form-group">
                    <input type="hidden" name="email" value="<?php echo $user['email']?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control text-center" placeholder="* Insira o codigo de 6 digitos"
                           autocomplete="off" name="activationCode">
                </div>

                <input type="submit" value="Continuar" style="cursor: pointer"
                       class="btn btn-primary btn-block login__block__btn">
            </div>
        </form>

        <button class="btn btn-link" style="cursor: pointer">Precisa de outro código? Reenviar</button>
    </div>
</div>
