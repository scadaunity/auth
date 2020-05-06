<!--NAVBAR - TOP - INICIO (import)-->
<header class="header">
    <div class="navigation-trigger hidden-xl-up" data-sa-action="aside-open" data-sa-target=".sidebar">
        <i class="zmdi zmdi-menu"></i>
    </div>

    <div class="logo hidden-sm-down">
        <h1>

            <a href="index-2.html" class="align-middle">
                <img class="listview__img" src="<?php echo base_url('assets/img/logo/LogoIcon01.png') ?>"/>
                <span class="pt-3">Scada Unity</span>
            </a>
        </h1>
    </div>

    <form class="search">
        <div class="search__inner">
            <input type="text" class="search__text" placeholder="Pesquisar" style="border-radius: 20px">
            <i class="zmdi zmdi-search search__helper" data-sa-action="search-close"></i>
        </div>
    </form>

    <ul class="top-nav">
        <li class="hidden-xl-up"><a href="#" data-sa-action="search-open"><i class="zmdi zmdi-search"></i></a></li>

        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="top-nav__notify"><i class="zmdi zmdi-email"></i></a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu--block">
                <div class="dropdown-header">
                    Messages

                    <div class="actions">
                        <a href="messages.html" class="actions__item zmdi zmdi-plus"></a>
                    </div>
                </div>

                <div class="listview listview--hover">
                    <a href="#" class="listview__item">
                        <img src="<?php echo base_url('assets/img/avatar/1.jpg') ?>"
                             class="listview__img" alt="">

                        <div class="listview__content">
                            <div class="listview__heading">
                                David Belle <small>12:01 PM</small>
                            </div>
                            <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                        </div>
                    </a>

                    <a href="#" class="listview__item">
                        <img src="<?php echo base_url('assets/img/avatar/2.jpg') ?>"
                             class="listview__img" alt="">

                        <div class="listview__content">
                            <div class="listview__heading">
                                Jonathan Morris
                                <small>02:45 PM</small>
                            </div>
                            <p>Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</p>
                        </div>
                    </a>


                    <a href="#" class="view-more">View all messages</a>
                </div>
            </div>
        </li>

        <li class="dropdown top-nav__notifications">
            <a href="#" data-toggle="dropdown" class="top-nav__notify">
                <i class="zmdi zmdi-notifications"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu--block">
                <div class="dropdown-header">
                    Notifications

                    <div class="actions">
                        <a href="#" class="actions__item zmdi zmdi-check-all"
                           data-sa-action="notifications-clear"></a>
                    </div>
                </div>

                <div class="listview listview--hover">
                    <div class="listview__scroll scrollbar-inner">
                        <a href="#" class="listview__item">
                            <img src="<?php echo base_url('assets/img/avatar/1.jpg') ?>"
                                 class="listview__img" alt="">

                            <div class="listview__content">
                                <div class="listview__heading">David Belle</div>
                                <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                            </div>
                        </a>

                        <a href="#" class="listview__item">
                            <img src="<?php echo base_url('assets/img/avatar/2.jpg') ?>"
                                 class="listview__img" alt="">

                            <div class="listview__content">
                                <div class="listview__heading">Jonathan Morris</div>
                                <p>Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</p>
                            </div>
                        </a>

                        <a href="#" class="listview__item">
                            <img src="<?php echo base_url('assets/img/avatar/3.jpg') ?>"
                                 class="listview__img" alt="">

                            <div class="listview__content">
                                <div class="listview__heading">Fredric Mitchell Jr.</div>
                                <p>Phasellus a ante et est ornare accumsan at vel magnauis blandit turpis at augue
                                    ultricies</p>
                            </div>
                        </a>

                    </div>

                    <div class="p-1"></div>
                </div>
            </div>
        </li>

        <li class="dropdown hidden-xs-down">
            <a href="#" data-toggle="dropdown"><i class="zmdi zmdi-check-circle"></i></a>

            <div class="dropdown-menu dropdown-menu-right dropdown-menu--block" role="menu">
                <div class="dropdown-header">Tasks</div>

                <div class="listview listview--hover">
                    <a href="#" class="listview__item">
                        <div class="listview__content">
                            <div class="listview__heading">HTML5 Validation Report</div>

                            <div class="progress mt-1">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 25%"
                                     aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </a>

                    <a href="#" class="listview__item">
                        <div class="listview__content">
                            <div class="listview__heading">Google Chrome Extension</div>

                            <div class="progress mt-1">
                                <div class="progress-bar bg-warning" style="width: 43%" aria-valuenow="43"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </a>

                    <a href="#" class="listview__item">
                        <div class="listview__content">
                            <div class="listview__heading">Social Intranet Projects</div>

                            <div class="progress mt-1">
                                <div class="progress-bar bg-success" style="width: 20%" aria-valuenow="20"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </a>

                    <a href="#" class="listview__item">
                        <div class="listview__content">
                            <div class="listview__heading">Bootstrap Admin Template</div>

                            <div class="progress mt-1">
                                <div class="progress-bar bg-info" style="width: 60%" aria-valuenow="60"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </a>

                    <a href="#" class="listview__item">
                        <div class="listview__content">
                            <div class="listview__heading">Youtube Client App</div>

                            <div class="progress mt-1">
                                <div class="progress-bar bg-danger" style="width: 80%" aria-valuenow="80"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </a>

                    <a href="#" class="view-more">View all Tasks</a>
                </div>
            </div>
        </li>

        <li class="dropdown hidden-xs-down">
            <a href="#" data-toggle="dropdown"><i class="zmdi zmdi-apps"></i></a>

            <div class="dropdown-menu dropdown-menu-right dropdown-menu--block" role="menu">
                <div class="row app-shortcuts">
                    <a class="col-4 app-shortcuts__item" href="#">
                        <i class="zmdi zmdi-calendar"></i>
                        <small class="">Calendar</small>
                    </a>
                    <a class="col-4 app-shortcuts__item" href="#">
                        <i class="zmdi zmdi-file-text"></i>
                        <small class="">Files</small>
                    </a>
                    <a class="col-4 app-shortcuts__item" href="#">
                        <i class="zmdi zmdi-email"></i>
                        <small class="">Email</small>
                    </a>
                    <a class="col-4 app-shortcuts__item" href="#">
                        <i class="zmdi zmdi-trending-up"></i>
                        <small class="">Reports</small>
                    </a>
                    <a class="col-4 app-shortcuts__item" href="#">
                        <i class="zmdi zmdi-view-headline"></i>
                        <small class="">News</small>
                    </a>
                    <a class="col-4 app-shortcuts__item" href="#">
                        <i class="zmdi zmdi-image"></i>
                        <small class="">Gallery</small>
                    </a>
                </div>
            </div>
        </li>

        <li class="dropdown hidden-xs-down">
            <a href="#" data-toggle="dropdown"><i class="zmdi zmdi-more-vert"></i></a>

            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-item theme-switch">
                    Theme Switch

                    <div class="btn-group btn-group--colors mt-2 d-block" data-toggle="buttons">
                        <label class="btn active border-0" style="background-color: #772036"><input type="radio"
                                                                                                    value="1"
                                                                                                    autocomplete="off"
                                                                                                    checked></label>
                        <label class="btn border-0" style="background-color: #273C5B"><input type="radio" value="2"
                                                                                             autocomplete="off"></label>
                        <label class="btn border-0" style="background-color: #174042"><input type="radio" value="3"
                                                                                             autocomplete="off"></label>
                        <label class="btn border-0" style="background-color: #383844"><input type="radio" value="4"
                                                                                             autocomplete="off"></label>
                        <label class="btn border-0" style="background-color: #49423F"><input type="radio" value="5"
                                                                                             autocomplete="off"></label>

                        <br>

                        <label class="btn border-0" style="background-color: #5e3d22"><input type="radio" value="6"
                                                                                             autocomplete="off"></label>
                        <label class="btn border-0" style="background-color: #234d6d"><input type="radio" value="7"
                                                                                             autocomplete="off"></label>
                        <label class="btn border-0" style="background-color: #3b5e5e"><input type="radio" value="8"
                                                                                             autocomplete="off"></label>
                        <label class="btn border-0" style="background-color: #0a4c3e"><input type="radio" value="9"
                                                                                             autocomplete="off"></label>
                        <label class="btn border-0" style="background-color: #7b3d54"><input type="radio" value="10"
                                                                                             autocomplete="off"></label>
                    </div>
                </div>
                <a href="#" class="dropdown-item" data-sa-action="fullscreen">Fullscreen</a>
                <a href="#" class="dropdown-item">Clear Local Storage</a>
            </div>
        </li>
    </ul>

    <div class="clock hidden-md-down">
        <div class="time">
            <span class="hours"></span>
            <span class="min"></span>
            <span class="sec"></span>
        </div>
    </div>
</header>
<!--NAVBAR - TOP - FIM -->
