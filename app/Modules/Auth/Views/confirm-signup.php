<div class="login">
    <!-- Forgot Password -->
    <div class="login__block active" id="forget-password">
        <div class="login__block__header">
            <img src="<?php echo base_url('assets/img/logo/LogoIcon01.png') ?>"/>
            <h4>
                <span class="">Scada</span>
                <span class="text-success">Unity</span>
            </h4>

            <h4>Digite o codigo de verificação</h4>

        </div>

        <form method="post" action="<?php echo base_url('Auth/requestForgot') ?>">
            <div class="login__block__body">
                <p class="text-muted">Digite o código de verificação enviado para</p>
                <p>scadaunity@gmail.com</p>

                <div class="form-group">
                    <input type="text" class="form-control text-center" placeholder="Insira o codigo de 6 digitos" autocomplete="off"
                           name="code">
                </div>

                <input type="submit" value="Continuar" style="cursor: pointer" class="btn btn-primary btn-block login__block__btn">
            </div>
        </form>

        <button class="btn btn-link" style="cursor: pointer">Precisa de outro código? Reenviar</button>
    </div>
</div>
