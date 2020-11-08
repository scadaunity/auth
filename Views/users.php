<?php

use Config\Services;

$routes = Services::routes(true);
$uri = service('uri');

?>
<section class="content">
    <div class="content__inner">
        <?php

        ?>

        <header class="content__title">
            <h1>Usuários</h1>

            <div class="actions">
                <a href="#" class="actions__item zmdi zmdi-plus float-left" data-toggle="modal" data-target="#modal-create-new-user" ></a>

                <div class="dropdown actions__item">
                    <i data-toggle="dropdown" class="zmdi zmdi-more-vert" aria-expanded="false"></i>
                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(35px, 26px, 0px); top: 0px; left: 0px; will-change: transform;">
                        <a href="#" class="dropdown-item">Atualizar</a>
                        <a href="#" class="dropdown-item">Configurar</a>
                    </div>
                </div>
            </div>
        </header>

        <div class="toolbar">
            <div class="toolbar__label">
                <?php
                    echo '<bold>'.count($users). '</bold> Usuários';
                ?>
            </div>

            <div class="actions">
                <i class="actions__item zmdi zmdi-search" data-sa-action="toolbar-search-open"></i>
                <a href="#" class="actions__item zmdi zmdi-info-outline hidden-xs-down" onclick="getUsers()"></a>

                <div class="dropdown actions__item hidden-xs-down">
                    <i class="zmdi zmdi-more-vert" data-toggle="dropdown"></i>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item">Refresh</a>
                        <a href="#" class="dropdown-item">Delete</a>
                        <a href="#" class="dropdown-item">Settings</a>
                    </div>
                </div>
            </div>

            <div class="toolbar__search" style="display: none;">
                <input type="text" placeholder="Pesquisar...">

                <i class="toolbar__search__close zmdi zmdi-long-arrow-left" data-sa-action="toolbar-search-close"></i>
            </div>
        </div>

        <div class="contacts row">

            <?php foreach ($users as $user_item): ?>

                <div class="col-xl-3 col-lg-3 col-sm-4 col-6">
                    <div class="contacts__item">
                        <a href="#" class="contacts__img">
                            <img src="<?php echo base_url('src/assets/img/avatar/' . $user_item->avatar . '.jpg') ?>" alt="">
                        </a>

                        <div class="contacts__info">
                            <strong><?= $user_item->name ;?></strong>
                            <small><?= $user_item->email ;?></small>
                        </div>

                        <button class="contacts__btn"
                            onclick="window.location.href='<?php echo base_url('user/view/'.$user_item->id) ?>'"
                            data-id="<?= $user_item->id ;?>"
                            data-name="<?= $user_item->name ;?>"
                            data-email="<?= $user_item->email ;?>"
                        >
                            Visualizar
                        </button>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>

    </div>

    <!-- Modal create new user -->
    <div class="modal fade" id="modal-create-new-user" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title pull-left">Novo usuario</h5>
                </div>
                <form method="post" id="formteste" action="<?php echo base_url('auth/create_user') ?>">
                    <div class="modal-body">

                        <div class="tab-pane fade active show" id="conta" role="tabpanel" aria-expanded="false">
                            <div class="form-group">
                                <input type="hidden" name="avatar" value="7">
                                <input type="text" class="form-control" placeholder="Nome" name="name">
                                <i class="form-group__bar"></i>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email" autocomplete="off" name="email">
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" autocomplete="off" maxlength="14" name="password">
                                <i class="form-group__bar"></i>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-link btn-danger">Salvar</button>
                        <button type="button" class="btn btn-link" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal view user -->
    <div class="modal fade" id="modal-view-user" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title pull-left">Visualizar usuario</h5>
                </div>
                <form method="post" id="formteste" action="<?php echo base_url('auth/create_user') ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="avatar" value="7">
                            <input type="text" class="form-control" disabled="" placeholder="Nome" name="name" id="view-name">
                            <i class="form-group__bar"></i>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" disabled="" placeholder="Email" autocomplete="off" name="email" id="view-email">
                            <i class="form-group__bar"></i>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" autocomplete="off" maxlength="14" name="password">
                            <i class="form-group__bar"></i>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-link btn-danger">Salvar</button>
                        <button type="button" class="btn btn-link" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>

<script>


    fetch('<?php echo base_url('users/findAll')?>')
        .then(response => {
            response.json()
                .then(data => console.log(data))
        })
        .catch(e => console.log('Deu erro: '+e.message))

   const getUsers = () =>{

        fetch('<?php echo base_url('users/findAll')?>')
            .then(response => {
                response.json()
                    .then(data => console.log(data))
            })
            .catch(e => console.log('Deu erro: '+e.message))
    }
    async function loadUser() {
        await fetch('<?php echo base_url('users/findAll')?>')
            .then(response => {
                response.json()
                    .then(function (data) {
                        console.log(data)
                    })
            })
    }




    /**
     * Abre o modal para visualizar o usuario selecionado
     * @param data
     */
    function viewUser(data) {
        let user = data.dataset;
        $('#view-name').val(user.name);
        $('#view-email').val(user.email);
        $("#modal-view-user").modal("show")
    }

    /**
     * Limpa a lista de usuarios
     */
    function clearUsers() {
        let users = $('.contacts');
        users.empty();
        console.log('Limpando lista de usuarios...')
    }

    /**
     * Gera a lista de usuarios
     */
    function updateUsers() {
        let par = $('.contacts');
        clearUsers();
        let users = findAll();
        console.log(users)

    }

</script>


