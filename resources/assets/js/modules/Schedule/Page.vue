<template>
    <header-module></header-module>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid">
                <div class="row row-lg">
                    <div class="col-sm-12">
                        <div class="form-wrap">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4 class="form-title">
                                        Carro #01 <span class="tag tag-danger tag-round">RED</span>
                                    </h4>
                                </div>
                                <div class="col-sm-6">
                                    <div class="page-header-actions" slot="actions">
                                        <button type="button" class="btn btn-sm btn-icon btn-primary btn-round" @click.prevent="mail" data-toggle="tooltip" data-original-title="Send Message" data-trigger="hover">
                                            <i class="icon md-email" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-icon btn-primary btn-round" @click.prevent="report" data-toggle="tooltip" data-original-title="Report" data-trigger="hover">
                                            <i class="icon md-print" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-icon btn-primary btn-round" @click.prevent="sync" data-toggle="tooltip" data-original-title="Synchronize" data-trigger="hover">
                                            <i class="icon md-refresh-sync" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
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
