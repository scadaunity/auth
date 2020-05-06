<div class="login">
    <!-- Register -->
    <div class="login__block active" id="register">
        <div class="login__block__header">
            <img src="<?php echo base_url('assets/img/logo/LogoIcon01.png') ?>"/>
            <h4>
                <span class="">Scada</span>
                <span class="text-success">Unity</span>
            </h4>

            Criar uma conta

            <div class="actions actions--inverse login__block__actions">
                <div class="dropdown">
                    <i data-toggle="dropdown" class="zmdi zmdi-more-vert actions__item"></i>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="<?php echo base_url('login') ?>">Login</a>
                        <a class="dropdown-item" href="<?php echo base_url('forgot') ?>">Esqueci minha senha
                            ?</a>
                    </div>
                </div>
            </div>
        </div>

        <form method="post" action="<?php echo base_url('Auth/create') ?>">
            <div class="login__block__body">
                <div class="form-group">
                    <input type="text" class="form-control text-center" placeholder="Nome" name="name">
                </div>

                <div class="form-group form-group--centered">
                    <input type="email" class="form-control text-center" placeholder="Email Address"
                           autocomplete="username" name="email">
                </div>

                <div class="form-group form-group--centered">
                    <input type="password" class="form-control text-center" placeholder="Password"
                           autocomplete="current-password" name="password">
                </div>

                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="acept">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Aceito os termos do contrato de licença</span>
                    </label>
                </div>

                <input type="submit" value="Criar" style="cursor: pointer" class="btn btn-block login__block__btn">
            </div>
        </form>
    </div>
</div>