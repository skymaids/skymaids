<template>
    <header-module></header-module>
    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title" style="padding-bottom: 10px !important;">
                    <i class="icon md-truck" aria-hidden="true"></i>
                    Carro #01
                    <span class="tag tag-danger tag-round">RED</span>
                </h3>
                <ul class="panel-actions panel-actions-keep">
                    <li>
                        <button type="button" class="btn btn-sm btn-icon btn-primary btn-round" @click.prevent="mail" data-toggle="tooltip" data-original-title="Send Message" data-trigger="hover">
                            <i class="icon md-email" aria-hidden="true"></i>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-sm btn-icon btn-primary btn-round" @click.prevent="report" data-toggle="tooltip" data-original-title="Report" data-trigger="hover">
                            <i class="icon md-print" aria-hidden="true"></i>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-sm btn-icon btn-primary btn-round" @click.prevent="sync" data-toggle="tooltip" data-original-title="Synchronize" data-trigger="hover">
                            <i class="icon md-refresh-sync" aria-hidden="true"></i>
                        </button>
                    </li>
                </ul>
            </div>
            <div class="panel-body container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="car_avatar">
                            <span class="avatar avatar-online">
                                <img src="//192.168.10.10:3000/images/portraits/6.jpg" data-toggle="tooltip" data-original-title="Ema" data-trigger="hover">
                            </span>
                            <span class="avatar avatar-online">
                                <img src="//192.168.10.10:3000/images/portraits/19.jpg" data-toggle="tooltip" data-original-title="Mirian" data-trigger="hover">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top: 10px;">
                    <div class="col-md-4 col-xs-12">
                        <div class="panel panel-primary panel-line">
                            <div class="panel-heading">
                                <h5 class="panel-title" style="padding: 20px 20px 10px 20px !important;font-size: 16px !important;">
                                    Celeste Fuertes <span class="tag tag-primary tag-sm">08:00</span>
                                </h5>
                                <div class="panel-actions panel-actions-keep">
                                    <input type="checkbox" data-plugin="switchery" data-size="small" checked="" data-switchery="true" style="display: none;">

                                </div>
                            </div>
                            <div class="panel-body" style="padding: 0px 20px !important;">
                                <i class="md-pin" aria-hidden="true"> 5108 Donovan Dr, Alexandria, VA 22304, USA</i>
                                <i class="md-comment-alt-text" aria-hidden="true"> Chaves de baixo do tapete</i>
                            </div>
                            <div class="panel-footer" style="padding: 15px 20px !important;">
                                <div class="input-group form-material">
                                    <input class="form-control" type="text" placeholder="Type message here ...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-pure btn-default icon md-mail-send waves-effect" type="button"></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="panel panel-primary panel-line">
                            <div class="panel-heading">
                                <h5 class="panel-title" style="padding: 20px 20px 10px 20px !important;font-size: 16px !important;">
                                    Toleda Baldino <span class="tag tag-primary tag-sm">10:00</span>
                                </h5>
                                <div class="panel-actions panel-actions-keep">
                                    <input type="checkbox" data-plugin="switchery" data-size="small" checked="" data-switchery="true" style="display: none;">

                                </div>
                            </div>
                            <div class="panel-body" style="padding: 0px 20px !important;">
                                <i class="md-pin" aria-hidden="true"> 12404 Borges Avenue - Silverspring</i>
                                <i class="md-comment-alt-text" aria-hidden="true"> Limpar geladeira</i>
                            </div>
                            <div class="panel-footer" style="padding: 15px 20px !important;">
                                <div class="input-group form-material">
                                    <input class="form-control" type="text" placeholder="Type message here ...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-pure btn-default icon md-mail-send waves-effect" type="button"></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="panel panel-primary panel-line">
                            <div class="panel-heading">
                                <h5 class="panel-title" style="padding: 20px 20px 10px 20px !important;font-size: 16px !important;">
                                    Tamara Bowman <span class="tag tag-primary tag-sm">01:00</span>
                                </h5>
                                <div class="panel-actions panel-actions-keep">
                                    <input type="checkbox" data-plugin="switchery" data-size="small" checked="" data-switchery="true" style="display: none;">
                                </div>
                            </div>
                            <div class="panel-body" style="padding: 0px 20px !important;">
                                <i class="md-pin" aria-hidden="true"> 2702 Beechmont Ln, Silver Spring, MD 20906, USA</i>
                                <i class="md-comment-alt-text" aria-hidden="true"> Nunca entrar nos quartos e limpar banheira</i>
                            </div>
                            <div class="panel-footer" style="padding: 15px 20px !important;">
                                <div class="input-group form-material">
                                    <input class="form-control" type="text" placeholder="Type message here ...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-pure btn-default icon md-mail-send waves-effect" type="button"></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="panel panel-primary panel-line">
                            <div class="panel-heading">
                                <h5 class="panel-title" style="padding: 20px 20px 10px 20px !important;font-size: 16px !important;">
                                    Flower Hill School <span class="tag tag-primary tag-sm">03:00</span>
                                </h5>
                                <div class="panel-actions panel-actions-keep">
                                    <input type="checkbox" data-plugin="switchery" data-size="small" checked="" data-switchery="true" style="display: none;">

                                </div>
                            </div>
                            <div class="panel-body" style="padding: 0px 20px !important;">
                                <i class="md-pin" aria-hidden="true"> 18243 Flower Hill Way, Gaithersburg, MD 20879, USA</i>
                                <i class="md-comment-alt-text" aria-hidden="true"> Pegar chave com guarda</i>
                            </div>
                            <div class="panel-footer" style="padding: 15px 20px !important;">
                                <div class="input-group form-material">
                                    <input class="form-control" type="text" placeholder="Type message here ...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-pure btn-default icon md-mail-send waves-effect" type="button"></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title" style="padding-bottom: 10px !important;">
                    <i class="icon md-truck" aria-hidden="true"></i>
                    Carro #02
                    <span class="tag tag-primary tag-round">Blue</span>
                </h3>
                <ul class="panel-actions panel-actions-keep">
                    <li>
                        <button type="button" class="btn btn-sm btn-icon btn-primary btn-round" @click.prevent="mail" data-toggle="tooltip" data-original-title="Send Message" data-trigger="hover">
                            <i class="icon md-email" aria-hidden="true"></i>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-sm btn-icon btn-primary btn-round" @click.prevent="report" data-toggle="tooltip" data-original-title="Report" data-trigger="hover">
                            <i class="icon md-print" aria-hidden="true"></i>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-sm btn-icon btn-primary btn-round" @click.prevent="sync" data-toggle="tooltip" data-original-title="Synchronize" data-trigger="hover">
                            <i class="icon md-refresh-sync" aria-hidden="true"></i>
                        </button>
                    </li>
                </ul>
            </div>
            <div class="panel-body container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="car_avatar">
                            <span class="avatar avatar-online">
                                <img src="//192.168.10.10:3000/images/portraits/8.jpg" data-toggle="tooltip" data-original-title="Alma" data-trigger="hover">
                            </span>
                            <span class="avatar avatar-online">
                                <img src="//192.168.10.10:3000/images/portraits/11.jpg" data-toggle="tooltip" data-original-title="Stefany" data-trigger="hover">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top: 10px;">
                    <div class="col-md-4 col-xs-12">
                        <div class="panel panel-primary panel-line">
                            <div class="panel-heading">
                                <h5 class="panel-title" style="padding: 20px 20px 10px 20px !important;font-size: 16px !important;">
                                    Celeste Fuertes <span class="tag tag-primary tag-sm">08:00</span>
                                </h5>
                                <div class="panel-actions panel-actions-keep">
                                    <input type="checkbox" data-plugin="switchery" data-size="small" checked="" data-switchery="true" style="display: none;">

                                </div>
                            </div>
                            <div class="panel-body" style="padding: 0px 20px !important;">
                                <i class="md-pin" aria-hidden="true"> 5108 Donovan Dr, Alexandria, VA 22304, USA</i>
                                <i class="md-comment-alt-text" aria-hidden="true"> Chaves de baixo do tapete</i>
                            </div>
                            <div class="panel-footer" style="padding: 15px 20px !important;">
                                <div class="input-group form-material">
                                    <input class="form-control" type="text" placeholder="Type message here ...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-pure btn-default icon md-mail-send waves-effect" type="button"></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="panel panel-primary panel-line">
                            <div class="panel-heading">
                                <h5 class="panel-title" style="padding: 20px 20px 10px 20px !important;font-size: 16px !important;">
                                    Toleda Baldino <span class="tag tag-primary tag-sm">10:00</span>
                                </h5>
                                <div class="panel-actions panel-actions-keep">
                                    <input type="checkbox" data-plugin="switchery" data-size="small" checked="" data-switchery="true" style="display: none;">

                                </div>
                            </div>
                            <div class="panel-body" style="padding: 0px 20px !important;">
                                <i class="md-pin" aria-hidden="true"> 12404 Borges Avenue - Silverspring</i>
                                <i class="md-comment-alt-text" aria-hidden="true"> Limpar geladeira</i>
                            </div>
                            <div class="panel-footer" style="padding: 15px 20px !important;">
                                <div class="input-group form-material">
                                    <input class="form-control" type="text" placeholder="Type message here ...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-pure btn-default icon md-mail-send waves-effect" type="button"></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="panel panel-primary panel-line">
                            <div class="panel-heading">
                                <h5 class="panel-title" style="padding: 20px 20px 10px 20px !important;font-size: 16px !important;">
                                    Tamara Bowman <span class="tag tag-primary tag-sm">01:00</span>
                                </h5>
                                <div class="panel-actions panel-actions-keep">
                                    <input type="checkbox" data-plugin="switchery" data-size="small" checked="" data-switchery="true" style="display: none;">
                                </div>
                            </div>
                            <div class="panel-body" style="padding: 0px 20px !important;">
                                <i class="md-pin" aria-hidden="true"> 2702 Beechmont Ln, Silver Spring, MD 20906, USA</i>
                                <i class="md-comment-alt-text" aria-hidden="true"> Nunca entrar nos quartos e limpar banheira</i>
                            </div>
                            <div class="panel-footer" style="padding: 15px 20px !important;">
                                <div class="input-group form-material">
                                    <input class="form-control" type="text" placeholder="Type message here ...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-pure btn-default icon md-mail-send waves-effect" type="button"></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="panel panel-primary panel-line">
                            <div class="panel-heading">
                                <h5 class="panel-title" style="padding: 20px 20px 10px 20px !important;font-size: 16px !important;">
                                    Flower Hill School <span class="tag tag-primary tag-sm">03:00</span>
                                </h5>
                                <div class="panel-actions panel-actions-keep">
                                    <input type="checkbox" data-plugin="switchery" data-size="small" checked="" data-switchery="true" style="display: none;">

                                </div>
                            </div>
                            <div class="panel-body" style="padding: 0px 20px !important;">
                                <i class="md-pin" aria-hidden="true"> 18243 Flower Hill Way, Gaithersburg, MD 20879, USA</i>
                                <i class="md-comment-alt-text" aria-hidden="true"> Pegar chave com guarda</i>
                            </div>
                            <div class="panel-footer" style="padding: 15px 20px !important;">
                                <div class="input-group form-material">
                                    <input class="form-control" type="text" placeholder="Type message here ...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-pure btn-default icon md-mail-send waves-effect" type="button"></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="panel panel-primary panel-line">
                            <div class="panel-heading">
                                <h5 class="panel-title" style="padding: 20px 20px 10px 20px !important;font-size: 16px !important;">
                                    Celeste Fuertes <span class="tag tag-primary tag-sm">05:00</span>
                                </h5>
                                <div class="panel-actions panel-actions-keep">
                                    <input type="checkbox" data-plugin="switchery" data-size="small" checked="" data-switchery="true" style="display: none;">

                                </div>
                            </div>
                            <div class="panel-body" style="padding: 0px 20px !important;">
                                <i class="md-pin" aria-hidden="true"> 5108 Donovan Dr, Alexandria, VA 22304, USA</i>
                                <i class="md-comment-alt-text" aria-hidden="true"> Limpar carpete e janelas do quarto</i>
                            </div>
                            <div class="panel-footer" style="padding: 15px 20px !important;">
                                <div class="input-group form-material">
                                    <input class="form-control" type="text" placeholder="Type message here ...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-pure btn-default icon md-mail-send waves-effect" type="button"></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title" style="padding-bottom: 10px !important;">
                    <i class="icon md-truck" aria-hidden="true"></i>
                    Carro #03
                    <span class="tag tag-default tag-round">Grey</span>
                </h3>
                <ul class="panel-actions panel-actions-keep">
                    <li>
                        <button type="button" class="btn btn-sm btn-icon btn-primary btn-round" @click.prevent="mail" data-toggle="tooltip" data-original-title="Send Message" data-trigger="hover">
                            <i class="icon md-email" aria-hidden="true"></i>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-sm btn-icon btn-primary btn-round" @click.prevent="report" data-toggle="tooltip" data-original-title="Report" data-trigger="hover">
                            <i class="icon md-print" aria-hidden="true"></i>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-sm btn-icon btn-primary btn-round" @click.prevent="sync" data-toggle="tooltip" data-original-title="Synchronize" data-trigger="hover">
                            <i class="icon md-refresh-sync" aria-hidden="true"></i>
                        </button>
                    </li>
                </ul>
            </div>
            <div class="panel-body container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="car_avatar">
                            <span class="avatar avatar-online">
                                <img src="//192.168.10.10:3000/images/portraits/13.jpg" data-toggle="tooltip" data-original-title="Elyn" data-trigger="hover">
                            </span>
                            <span class="avatar avatar-online">
                                <img src="//192.168.10.10:3000/images/portraits/15.jpg" data-toggle="tooltip" data-original-title="Mayra" data-trigger="hover">
                            </span>
                            <span class="avatar avatar-online">
                                <img src="//192.168.10.10:3000/images/portraits/18.jpg" data-toggle="tooltip" data-original-title="Yocelin" data-trigger="hover">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top: 10px;">
                    <div class="col-md-4 col-xs-12">
                        <div class="panel panel-primary panel-line">
                            <div class="panel-heading">
                                <h5 class="panel-title" style="padding: 20px 20px 10px 20px !important;font-size: 16px !important;">
                                    Celeste Fuertes <span class="tag tag-primary tag-sm">08:00</span>
                                </h5>
                                <div class="panel-actions panel-actions-keep">
                                    <input type="checkbox" data-plugin="switchery" data-size="small" checked="" data-switchery="true" style="display: none;">

                                </div>
                            </div>
                            <div class="panel-body" style="padding: 0px 20px !important;">
                                <i class="md-pin" aria-hidden="true"> 5108 Donovan Dr, Alexandria, VA 22304, USA</i>
                                <i class="md-comment-alt-text" aria-hidden="true"> Chaves de baixo do tapete</i>
                            </div>
                            <div class="panel-footer" style="padding: 15px 20px !important;">
                                <div class="input-group form-material">
                                    <input class="form-control" type="text" placeholder="Type message here ...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-pure btn-default icon md-mail-send waves-effect" type="button"></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="panel panel-primary panel-line">
                            <div class="panel-heading">
                                <h5 class="panel-title" style="padding: 20px 20px 10px 20px !important;font-size: 16px !important;">
                                    Toleda Baldino <span class="tag tag-primary tag-sm">10:00</span>
                                </h5>
                                <div class="panel-actions panel-actions-keep">
                                    <input type="checkbox" data-plugin="switchery" data-size="small" checked="" data-switchery="true" style="display: none;">

                                </div>
                            </div>
                            <div class="panel-body" style="padding: 0px 20px !important;">
                                <i class="md-pin" aria-hidden="true"> 12404 Borges Avenue - Silverspring</i>
                                <i class="md-comment-alt-text" aria-hidden="true"> Limpar geladeira</i>
                            </div>
                            <div class="panel-footer" style="padding: 15px 20px !important;">
                                <div class="input-group form-material">
                                    <input class="form-control" type="text" placeholder="Type message here ...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-pure btn-default icon md-mail-send waves-effect" type="button"></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="panel panel-primary panel-line">
                            <div class="panel-heading">
                                <h5 class="panel-title" style="padding: 20px 20px 10px 20px !important;font-size: 16px !important;">
                                    Tamara Bowman <span class="tag tag-primary tag-sm">01:00</span>
                                </h5>
                                <div class="panel-actions panel-actions-keep">
                                    <input type="checkbox" data-plugin="switchery" data-size="small" checked="" data-switchery="true" style="display: none;">
                                </div>
                            </div>
                            <div class="panel-body" style="padding: 0px 20px !important;">
                                <i class="md-pin" aria-hidden="true"> 2702 Beechmont Ln, Silver Spring, MD 20906, USA</i>
                                <i class="md-comment-alt-text" aria-hidden="true"> Nunca entrar nos quartos e limpar banheira</i>
                            </div>
                            <div class="panel-footer" style="padding: 15px 20px !important;">
                                <div class="input-group form-material">
                                    <input class="form-control" type="text" placeholder="Type message here ...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-pure btn-default icon md-mail-send waves-effect" type="button"></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="panel panel-primary panel-line">
                            <div class="panel-heading">
                                <h5 class="panel-title" style="padding: 20px 20px 10px 20px !important;font-size: 16px !important;">
                                    Flower Hill School <span class="tag tag-primary tag-sm">03:00</span>
                                </h5>
                                <div class="panel-actions panel-actions-keep">
                                    <input type="checkbox" data-plugin="switchery" data-size="small" checked="" data-switchery="true" style="display: none;">

                                </div>
                            </div>
                            <div class="panel-body" style="padding: 0px 20px !important;">
                                <i class="md-pin" aria-hidden="true"> 18243 Flower Hill Way, Gaithersburg, MD 20879, USA</i>
                                <i class="md-comment-alt-text" aria-hidden="true"> Pegar chave com guarda</i>
                            </div>
                            <div class="panel-footer" style="padding: 15px 20px !important;">
                                <div class="input-group form-material">
                                    <input class="form-control" type="text" placeholder="Type message here ...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-pure btn-default icon md-mail-send waves-effect" type="button"></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="panel panel-primary panel-line">
                            <div class="panel-heading">
                                <h5 class="panel-title" style="padding: 20px 20px 10px 20px !important;font-size: 16px !important;">
                                    Celeste Fuertes <span class="tag tag-primary tag-sm">05:00</span>
                                </h5>
                                <div class="panel-actions panel-actions-keep">
                                    <input type="checkbox" data-plugin="switchery" data-size="small" checked="" data-switchery="true" style="display: none;">

                                </div>
                            </div>
                            <div class="panel-body" style="padding: 0px 20px !important;">
                                <i class="md-pin" aria-hidden="true"> 5108 Donovan Dr, Alexandria, VA 22304, USA</i>
                                <i class="md-comment-alt-text" aria-hidden="true"> Limpar carpete e janelas do quarto</i>
                            </div>
                            <div class="panel-footer" style="padding: 15px 20px !important;">
                                <div class="input-group form-material">
                                    <input class="form-control" type="text" placeholder="Type message here ...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-pure btn-default icon md-mail-send waves-effect" type="button"></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title" style="padding-bottom: 10px !important;">
                    <i class="icon md-truck" aria-hidden="true"></i>
                    Carro #04
                    <span class="tag tag-success tag-round">Green</span>
                </h3>
                <ul class="panel-actions panel-actions-keep">
                    <li>
                        <button type="button" class="btn btn-sm btn-icon btn-primary btn-round" @click.prevent="mail" data-toggle="tooltip" data-original-title="Send Message" data-trigger="hover">
                            <i class="icon md-email" aria-hidden="true"></i>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-sm btn-icon btn-primary btn-round" @click.prevent="report" data-toggle="tooltip" data-original-title="Report" data-trigger="hover">
                            <i class="icon md-print" aria-hidden="true"></i>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-sm btn-icon btn-primary btn-round" @click.prevent="sync" data-toggle="tooltip" data-original-title="Synchronize" data-trigger="hover">
                            <i class="icon md-refresh-sync" aria-hidden="true"></i>
                        </button>
                    </li>
                </ul>
            </div>
            <div class="panel-body container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="car_avatar">
                            <span class="avatar avatar-online">
                                <img src="//192.168.10.10:3000/images/portraits/6.jpg" data-toggle="tooltip" data-original-title="Veronica 3" data-trigger="hover">
                            </span>
                            <span class="avatar avatar-online">
                                <img src="//192.168.10.10:3000/images/portraits/19.jpg" data-toggle="tooltip" data-original-title="Maribel" data-trigger="hover">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top: 10px;">
                    <div class="col-md-4 col-xs-12">
                        <div class="panel panel-primary panel-line">
                            <div class="panel-heading">
                                <h5 class="panel-title" style="padding: 20px 20px 10px 20px !important;font-size: 16px !important;">
                                    Celeste Fuertes <span class="tag tag-primary tag-sm">08:00</span>
                                </h5>
                                <div class="panel-actions panel-actions-keep">
                                    <input type="checkbox" data-plugin="switchery" data-size="small" checked="" data-switchery="true" style="display: none;">

                                </div>
                            </div>
                            <div class="panel-body" style="padding: 0px 20px !important;">
                                <i class="md-pin" aria-hidden="true"> 5108 Donovan Dr, Alexandria, VA 22304, USA</i>
                                <i class="md-comment-alt-text" aria-hidden="true"> Chaves de baixo do tapete</i>
                            </div>
                            <div class="panel-footer" style="padding: 15px 20px !important;">
                                <div class="input-group form-material">
                                    <input class="form-control" type="text" placeholder="Type message here ...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-pure btn-default icon md-mail-send waves-effect" type="button"></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="panel panel-primary panel-line">
                            <div class="panel-heading">
                                <h5 class="panel-title" style="padding: 20px 20px 10px 20px !important;font-size: 16px !important;">
                                    Toleda Baldino <span class="tag tag-primary tag-sm">10:00</span>
                                </h5>
                                <div class="panel-actions panel-actions-keep">
                                    <input type="checkbox" data-plugin="switchery" data-size="small" checked="" data-switchery="true" style="display: none;">

                                </div>
                            </div>
                            <div class="panel-body" style="padding: 0px 20px !important;">
                                <i class="md-pin" aria-hidden="true"> 12404 Borges Avenue - Silverspring</i>
                                <i class="md-comment-alt-text" aria-hidden="true"> Limpar geladeira</i>
                            </div>
                            <div class="panel-footer" style="padding: 15px 20px !important;">
                                <div class="input-group form-material">
                                    <input class="form-control" type="text" placeholder="Type message here ...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-pure btn-default icon md-mail-send waves-effect" type="button"></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="panel panel-primary panel-line">
                            <div class="panel-heading">
                                <h5 class="panel-title" style="padding: 20px 20px 10px 20px !important;font-size: 16px !important;">
                                    Tamara Bowman <span class="tag tag-primary tag-sm">01:00</span>
                                </h5>
                                <div class="panel-actions panel-actions-keep">
                                    <input type="checkbox" data-plugin="switchery" data-size="small" checked="" data-switchery="true" style="display: none;">
                                </div>
                            </div>
                            <div class="panel-body" style="padding: 0px 20px !important;">
                                <i class="md-pin" aria-hidden="true"> 2702 Beechmont Ln, Silver Spring, MD 20906, USA</i>
                                <i class="md-comment-alt-text" aria-hidden="true"> Nunca entrar nos quartos e limpar banheira</i>
                            </div>
                            <div class="panel-footer" style="padding: 15px 20px !important;">
                                <div class="input-group form-material">
                                    <input class="form-control" type="text" placeholder="Type message here ...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-pure btn-default icon md-mail-send waves-effect" type="button"></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="panel panel-primary panel-line">
                            <div class="panel-heading">
                                <h5 class="panel-title" style="padding: 20px 20px 10px 20px !important;font-size: 16px !important;">
                                    Flower Hill School <span class="tag tag-primary tag-sm">03:00</span>
                                </h5>
                                <div class="panel-actions panel-actions-keep">
                                    <input type="checkbox" data-plugin="switchery" data-size="small" checked="" data-switchery="true" style="display: none;">

                                </div>
                            </div>
                            <div class="panel-body" style="padding: 0px 20px !important;">
                                <i class="md-pin" aria-hidden="true"> 18243 Flower Hill Way, Gaithersburg, MD 20879, USA</i>
                                <i class="md-comment-alt-text" aria-hidden="true"> Pegar chave com guarda</i>
                            </div>
                            <div class="panel-footer" style="padding: 15px 20px !important;">
                                <div class="input-group form-material">
                                    <input class="form-control" type="text" placeholder="Type message here ...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-pure btn-default icon md-mail-send waves-effect" type="button"></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="panel panel-primary panel-line">
                            <div class="panel-heading">
                                <h5 class="panel-title" style="padding: 20px 20px 10px 20px !important;font-size: 16px !important;">
                                    Celeste Fuertes <span class="tag tag-primary tag-sm">05:00</span>
                                </h5>
                                <div class="panel-actions panel-actions-keep">
                                    <input type="checkbox" data-plugin="switchery" data-size="small" checked="" data-switchery="true" style="display: none;">

                                </div>
                            </div>
                            <div class="panel-body" style="padding: 0px 20px !important;">
                                <i class="md-pin" aria-hidden="true"> 5108 Donovan Dr, Alexandria, VA 22304, USA</i>
                                <i class="md-comment-alt-text" aria-hidden="true"> Limpar carpete e janelas do quarto</i>
                            </div>
                            <div class="panel-footer" style="padding: 15px 20px !important;">
                                <div class="input-group form-material">
                                    <input class="form-control" type="text" placeholder="Type message here ...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-pure btn-default icon md-mail-send waves-effect" type="button"></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title" style="padding-bottom: 10px !important;">
                    <i class="icon md-truck" aria-hidden="true"></i>
                    Carro #05
                    <span class="tag tag-info tag-round">Turquoise</span>
                </h3>
                <ul class="panel-actions panel-actions-keep">
                    <li>
                        <button type="button" class="btn btn-sm btn-icon btn-primary btn-round" @click.prevent="mail" data-toggle="tooltip" data-original-title="Send Message" data-trigger="hover">
                            <i class="icon md-email" aria-hidden="true"></i>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-sm btn-icon btn-primary btn-round" @click.prevent="report" data-toggle="tooltip" data-original-title="Report" data-trigger="hover">
                            <i class="icon md-print" aria-hidden="true"></i>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-sm btn-icon btn-primary btn-round" @click.prevent="sync" data-toggle="tooltip" data-original-title="Synchronize" data-trigger="hover">
                            <i class="icon md-refresh-sync" aria-hidden="true"></i>
                        </button>
                    </li>
                </ul>
            </div>
            <div class="panel-body container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="car_avatar">
                            <span class="avatar avatar-online">
                                <img src="//192.168.10.10:3000/images/portraits/6.jpg" data-toggle="tooltip" data-original-title="Erika" data-trigger="hover">
                            </span>
                            <span class="avatar avatar-online">
                                <img src="//192.168.10.10:3000/images/portraits/19.jpg" data-toggle="tooltip" data-original-title="Lisseth" data-trigger="hover">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top: 10px;">
                    <div class="col-md-4 col-xs-12">
                        <div class="panel panel-primary panel-line">
                            <div class="panel-heading">
                                <h5 class="panel-title" style="padding: 20px 20px 10px 20px !important;font-size: 16px !important;">
                                    Celeste Fuertes <span class="tag tag-primary tag-sm">08:00</span>
                                </h5>
                                <div class="panel-actions panel-actions-keep">
                                    <input type="checkbox" data-plugin="switchery" data-size="small" checked="" data-switchery="true" style="display: none;">

                                </div>
                            </div>
                            <div class="panel-body" style="padding: 0px 20px !important;">
                                <i class="md-pin" aria-hidden="true"> 5108 Donovan Dr, Alexandria, VA 22304, USA</i>
                                <i class="md-comment-alt-text" aria-hidden="true"> Chaves de baixo do tapete</i>
                            </div>
                            <div class="panel-footer" style="padding: 15px 20px !important;">
                                <div class="input-group form-material">
                                    <input class="form-control" type="text" placeholder="Type message here ...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-pure btn-default icon md-mail-send waves-effect" type="button"></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="panel panel-primary panel-line">
                            <div class="panel-heading">
                                <h5 class="panel-title" style="padding: 20px 20px 10px 20px !important;font-size: 16px !important;">
                                    Toleda Baldino <span class="tag tag-primary tag-sm">10:00</span>
                                </h5>
                                <div class="panel-actions panel-actions-keep">
                                    <input type="checkbox" data-plugin="switchery" data-size="small" checked="" data-switchery="true" style="display: none;">

                                </div>
                            </div>
                            <div class="panel-body" style="padding: 0px 20px !important;">
                                <i class="md-pin" aria-hidden="true"> 12404 Borges Avenue - Silverspring</i>
                                <i class="md-comment-alt-text" aria-hidden="true"> Limpar geladeira</i>
                            </div>
                            <div class="panel-footer" style="padding: 15px 20px !important;">
                                <div class="input-group form-material">
                                    <input class="form-control" type="text" placeholder="Type message here ...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-pure btn-default icon md-mail-send waves-effect" type="button"></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="panel panel-primary panel-line">
                            <div class="panel-heading">
                                <h5 class="panel-title" style="padding: 20px 20px 10px 20px !important;font-size: 16px !important;">
                                    Tamara Bowman <span class="tag tag-primary tag-sm">01:00</span>
                                </h5>
                                <div class="panel-actions panel-actions-keep">
                                    <input type="checkbox" data-plugin="switchery" data-size="small" checked="" data-switchery="true" style="display: none;">
                                </div>
                            </div>
                            <div class="panel-body" style="padding: 0px 20px !important;">
                                <i class="md-pin" aria-hidden="true"> 2702 Beechmont Ln, Silver Spring, MD 20906, USA</i>
                                <i class="md-comment-alt-text" aria-hidden="true"> Nunca entrar nos quartos e limpar banheira</i>
                            </div>
                            <div class="panel-footer" style="padding: 15px 20px !important;">
                                <div class="input-group form-material">
                                    <input class="form-control" type="text" placeholder="Type message here ...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-pure btn-default icon md-mail-send waves-effect" type="button"></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="panel panel-primary panel-line">
                            <div class="panel-heading">
                                <h5 class="panel-title" style="padding: 20px 20px 10px 20px !important;font-size: 16px !important;">
                                    Flower Hill School <span class="tag tag-primary tag-sm">03:00</span>
                                </h5>
                                <div class="panel-actions panel-actions-keep">
                                    <input type="checkbox" data-plugin="switchery" data-size="small" checked="" data-switchery="true" style="display: none;">

                                </div>
                            </div>
                            <div class="panel-body" style="padding: 0px 20px !important;">
                                <i class="md-pin" aria-hidden="true"> 18243 Flower Hill Way, Gaithersburg, MD 20879, USA</i>
                                <i class="md-comment-alt-text" aria-hidden="true"> Pegar chave com guarda</i>
                            </div>
                            <div class="panel-footer" style="padding: 15px 20px !important;">
                                <div class="input-group form-material">
                                    <input class="form-control" type="text" placeholder="Type message here ...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-pure btn-default icon md-mail-send waves-effect" type="button"></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="panel panel-primary panel-line">
                            <div class="panel-heading">
                                <h5 class="panel-title" style="padding: 20px 20px 10px 20px !important;font-size: 16px !important;">
                                    Celeste Fuertes <span class="tag tag-primary tag-sm">05:00</span>
                                </h5>
                                <div class="panel-actions panel-actions-keep">
                                    <input type="checkbox" data-plugin="switchery" data-size="small" checked="" data-switchery="true" style="display: none;">

                                </div>
                            </div>
                            <div class="panel-body" style="padding: 0px 20px !important;">
                                <i class="md-pin" aria-hidden="true"> 5108 Donovan Dr, Alexandria, VA 22304, USA</i>
                                <i class="md-comment-alt-text" aria-hidden="true"> Limpar carpete e janelas do quarto</i>
                            </div>
                            <div class="panel-footer" style="padding: 15px 20px !important;">
                                <div class="input-group form-material">
                                    <input class="form-control" type="text" placeholder="Type message here ...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-pure btn-default icon md-mail-send waves-effect" type="button"></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title" style="padding-bottom: 10px !important;">
                    <i class="icon md-truck" aria-hidden="true"></i>
                    Carro #07
                    <span class="tag tag-dark tag-round">Black</span>
                </h3>
                <ul class="panel-actions panel-actions-keep">
                    <li>
                        <button type="button" class="btn btn-sm btn-icon btn-primary btn-round" @click.prevent="mail" data-toggle="tooltip" data-original-title="Send Message" data-trigger="hover">
                            <i class="icon md-email" aria-hidden="true"></i>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-sm btn-icon btn-primary btn-round" @click.prevent="report" data-toggle="tooltip" data-original-title="Report" data-trigger="hover">
                            <i class="icon md-print" aria-hidden="true"></i>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-sm btn-icon btn-primary btn-round" @click.prevent="sync" data-toggle="tooltip" data-original-title="Synchronize" data-trigger="hover">
                            <i class="icon md-refresh-sync" aria-hidden="true"></i>
                        </button>
                    </li>
                </ul>
            </div>
            <div class="panel-body container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="car_avatar">
                            <span class="avatar avatar-online">
                                <img src="//192.168.10.10:3000/images/portraits/13.jpg" data-toggle="tooltip" data-original-title="Gladis" data-trigger="hover">
                            </span>
                            <span class="avatar avatar-online">
                                <img src="//192.168.10.10:3000/images/portraits/15.jpg" data-toggle="tooltip" data-original-title="Veronica 1" data-trigger="hover">
                            </span>
                            <span class="avatar avatar-online">
                                <img src="//192.168.10.10:3000/images/portraits/18.jpg" data-toggle="tooltip" data-original-title="Malvia" data-trigger="hover">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top: 10px;">
                    <div class="col-md-4 col-xs-12">
                        <div class="panel panel-primary panel-line">
                            <div class="panel-heading">
                                <h5 class="panel-title" style="padding: 20px 20px 10px 20px !important;font-size: 16px !important;">
                                    Celeste Fuertes <span class="tag tag-primary tag-sm">08:00</span>
                                </h5>
                                <div class="panel-actions panel-actions-keep">
                                    <input type="checkbox" data-plugin="switchery" data-size="small" checked="" data-switchery="true" style="display: none;">

                                </div>
                            </div>
                            <div class="panel-body" style="padding: 0px 20px !important;">
                                <i class="md-pin" aria-hidden="true"> 5108 Donovan Dr, Alexandria, VA 22304, USA</i>
                                <i class="md-comment-alt-text" aria-hidden="true"> Chaves de baixo do tapete</i>
                            </div>
                            <div class="panel-footer" style="padding: 15px 20px !important;">
                                <div class="input-group form-material">
                                    <input class="form-control" type="text" placeholder="Type message here ...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-pure btn-default icon md-mail-send waves-effect" type="button"></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="panel panel-primary panel-line">
                            <div class="panel-heading">
                                <h5 class="panel-title" style="padding: 20px 20px 10px 20px !important;font-size: 16px !important;">
                                    Toleda Baldino <span class="tag tag-primary tag-sm">10:00</span>
                                </h5>
                                <div class="panel-actions panel-actions-keep">
                                    <input type="checkbox" data-plugin="switchery" data-size="small" checked="" data-switchery="true" style="display: none;">

                                </div>
                            </div>
                            <div class="panel-body" style="padding: 0px 20px !important;">
                                <i class="md-pin" aria-hidden="true"> 12404 Borges Avenue - Silverspring</i>
                                <i class="md-comment-alt-text" aria-hidden="true"> Limpar geladeira</i>
                            </div>
                            <div class="panel-footer" style="padding: 15px 20px !important;">
                                <div class="input-group form-material">
                                    <input class="form-control" type="text" placeholder="Type message here ...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-pure btn-default icon md-mail-send waves-effect" type="button"></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="panel panel-primary panel-line">
                            <div class="panel-heading">
                                <h5 class="panel-title" style="padding: 20px 20px 10px 20px !important;font-size: 16px !important;">
                                    Tamara Bowman <span class="tag tag-primary tag-sm">01:00</span>
                                </h5>
                                <div class="panel-actions panel-actions-keep">
                                    <input type="checkbox" data-plugin="switchery" data-size="small" checked="" data-switchery="true" style="display: none;">
                                </div>
                            </div>
                            <div class="panel-body" style="padding: 0px 20px !important;">
                                <i class="md-pin" aria-hidden="true"> 2702 Beechmont Ln, Silver Spring, MD 20906, USA</i>
                                <i class="md-comment-alt-text" aria-hidden="true"> Nunca entrar nos quartos e limpar banheira</i>
                            </div>
                            <div class="panel-footer" style="padding: 15px 20px !important;">
                                <div class="input-group form-material">
                                    <input class="form-control" type="text" placeholder="Type message here ...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-pure btn-default icon md-mail-send waves-effect" type="button"></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="panel panel-primary panel-line">
                            <div class="panel-heading">
                                <h5 class="panel-title" style="padding: 20px 20px 10px 20px !important;font-size: 16px !important;">
                                    Flower Hill School <span class="tag tag-primary tag-sm">03:00</span>
                                </h5>
                                <div class="panel-actions panel-actions-keep">
                                    <input type="checkbox" data-plugin="switchery" data-size="small" checked="" data-switchery="true" style="display: none;">

                                </div>
                            </div>
                            <div class="panel-body" style="padding: 0px 20px !important;">
                                <i class="md-pin" aria-hidden="true"> 18243 Flower Hill Way, Gaithersburg, MD 20879, USA</i>
                                <i class="md-comment-alt-text" aria-hidden="true"> Pegar chave com guarda</i>
                            </div>
                            <div class="panel-footer" style="padding: 15px 20px !important;">
                                <div class="input-group form-material">
                                    <input class="form-control" type="text" placeholder="Type message here ...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-pure btn-default icon md-mail-send waves-effect" type="button"></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="panel panel-primary panel-line">
                            <div class="panel-heading">
                                <h5 class="panel-title" style="padding: 20px 20px 10px 20px !important;font-size: 16px !important;">
                                    Celeste Fuertes <span class="tag tag-primary tag-sm">05:00</span>
                                </h5>
                                <div class="panel-actions panel-actions-keep">
                                    <input type="checkbox" data-plugin="switchery" data-size="small" checked="" data-switchery="true" style="display: none;">

                                </div>
                            </div>
                            <div class="panel-body" style="padding: 0px 20px !important;">
                                <i class="md-pin" aria-hidden="true"> 5108 Donovan Dr, Alexandria, VA 22304, USA</i>
                                <i class="md-comment-alt-text" aria-hidden="true"> Limpar carpete e janelas do quarto</i>
                            </div>
                            <div class="panel-footer" style="padding: 15px 20px !important;">
                                <div class="input-group form-material">
                                    <input class="form-control" type="text" placeholder="Type message here ...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-pure btn-default icon md-mail-send waves-effect" type="button"></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="filter-render"></div>
    </div>
</template>
<script>
    import HeaderModule from './Header.vue'
    import {MenuPage, Loader} from '../../services/resources'
    import {store} from './Store/store'

    export default{
        data(){
            return{

            }
        },
        ready() {

        },
        computed: {

        },
        methods: {

        },
        events: {

        },
        components: {
            HeaderModule
        }
    }
</script>
