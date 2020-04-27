<!--SIDEBAR - LEFT - INICIO (import)-->
<aside class="sidebar">
    <div class="scrollbar-inner">

        <div class="user">
            <div class="user__info" data-toggle="dropdown">
                <img class="user__img" src="<?php echo base_url('assets/img/avatar/'.session('avatar').'.jpg') ?>" alt="">
                <div>
                    <div class="user__name"><?php echo session('name');?></div>
                    <div class="user__email"><?php echo session('email');?></div>
                </div>
            </div>

            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Perfil</a>
                <a class="dropdown-item" href="#">Configurações</a>
                <a class="dropdown-item" href="<?php echo base_url('Auth/logout') ?>">Sair</a>
            </div>
        </div>

        <ul class="navigation">
            <li class="@@indexactive"><a href="<?php echo base_url('Home') ?>"><i class="zmdi zmdi-home"></i>Home</a></li>
            <li class="@@indexactive"><a href="<?php echo base_url('Home/user') ?>"><i class="zmdi zmdi-account"></i>Usuarios</a></li>

            <li class="navigation__sub @@variantsactive">
                <a href="#"><i class="zmdi zmdi-view-week"></i> Cadastro</a>
                <ul>
                    <li class="@@sidebaractive"><a href="#">Clientes</a></li>
                    <li class="@@boxedactive"><a href="#">Produtos</a></li>
                    <li class="@@hiddensidebarboxedactive"><a href="#">Serviços</a></li>
                </ul>
            </li>


        </ul>
    </div>
</aside>
<!--SIDEBAR - LEFT - FIM -->
