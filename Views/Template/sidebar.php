<?php

use Config\Services;

$routes = Services::routes(true);
$uri = service('uri');

?>
<!--SIDEBAR - LEFT - INICIO (import)-->
<aside class="sidebar">
    <div class="scrollbar-inner">

        <div class="user">
            <div class="user__info" data-toggle="dropdown">
                <img class="user__img" src="<?php echo base_url('src/assets/img/avatar/' . session('avatar') . '.jpg') ?>"
                     alt="">
                <div>
                    <div class="user__name"><?php echo session('name'); ?></div>
                    <div class="user__email"><?php echo session('email'); ?></div>
                </div>
            </div>

            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Perfil</a>
                <a class="dropdown-item" href="#">Configurações</a>
                <a class="dropdown-item" href="help">Ajuda</a>
                <a class="dropdown-item" href="<?php echo base_url('auth/logout') ?>">Sair</a>
            </div>
        </div>

        <ul class="navigation">
            <li class="@@indexactive">
                <a href="<?php echo base_url('Home') ?>"><i class="zmdi zmdi-home"></i>Home</a>
            </li>
            <li class="navigation__sub @@variantsactive active">
                <a href="#"><i class="zmdi zmdi-accounts active"></i> Usuarios</a>
                <ul>
                    <li class="active"><a href="<?php echo base_url('user') ?>">Usuarios</a></li>
                    <li class=""><a href="<?php echo base_url('user/roles') ?>">Grupos</a></li>
                    <li class=""><a href="<?php echo base_url('user/permissions') ?>">Permissões</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
<!--SIDEBAR - LEFT - FIM -->