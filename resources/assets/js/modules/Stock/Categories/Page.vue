<template>
    <header-module></header-module>
    <page :config="pageState">
        <div class="form" slot="content">
            <form method="post" class="form-horizontal form-app" @submit.prevent="filter" id="form-module-search">
                <div class="form-group row form-material row">
                    <label class="col-xs-12 col-md-3 form-control-label">Nome: </label>
                    <div class="col-md-9 col-xs-12">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Digite a categoria ou parte dela" v-model="inputs.name" autocomplete="off" />
                    </div>
                </div>
                <page-buttons>
                    <div slot="buttons">
                        <button type="button" id="btn-search" class="btn btn-primary" @click.prevent="filter">Pesquisar</button>
                        <button type="button" id="btn-clean" class="btn btn-warning" @click.prevent="clear">Limpar</button>
                    </div>
                </page-buttons>
            </form>
        </div>
    </page>
</template>
<script>
    import Page from '../../../components/page/Page.vue'
    import PageButtons from '../../../components/page/Buttons.vue'
    import HeaderModule from './Header.vue'
    import FilterModule from './Filter.vue'
    import ModalModule from './Modal.vue'
    import {MenuPage, Loader} from '../../../services/resources'
    import {store} from './Store/store'

    export default{
        props: ['pageId'],
        data(){
            return{
                page: {},
                inputs: {
                    name: ''
                }
            }
        },
        ready() {
            this.initConf();
        },
        computed: {
            pageState() {
              return store.state.search;
            },
            formState() {
                return store.state.search.form.name
            }
        },
        methods: {
            initConf: function() {
                this.configStore();
                this.page = this.pageState;
                this.focus();
            },
            configStore: function() {
                if(Number.isInteger(this.pageId)){
                    MenuPage.get({id: this.pageId})
                        .then((response) => {
                            store.commit({
                                type: 'configStore',
                                page: response.data
                            });
                        })
                        .catch((response) => {
                            toastr.error('Não foi possivel carregar dados de configuração da página!', 'Erro');
                        });
                } else{
                    toastr.error('Código de configuração inválido!', 'Erro');
                }
            },
            filter: function() {
                $('#filter-render').html('');
                let element = $('#filter-render').append(`<filter-module></filter-module>`);
                this.$compile(element[0]);
                Loader.in();
            },
            focus: function() {
                setTimeout(function(){
                    $('#form-module-search #name').focus();
                }, 500);
            },
            clear: function() {
                this.inputs = {
                    name: ''
                };
                this.focus();
            },
            setId: function(id) {
                store.commit({
                    type: 'setId',
                    id: id
                });
            }
        },
        events: {
            'modal':  function(component,modal, id) {
                this.setId(id);

                let element = $('#form-module-search').append(`<${component}></${component}>`);
                this.$compile(element[0]);

                $(`#${modal}`).modal({
                  keyboard: false,
                  backdrop: 'static',
                  show: true
                })
            },
            'reload': function() {
                this.$broadcast('reload');
            },
            'kill': function() {
                this.$broadcast('kill');
            }
        },
        components: {
            Page,
            PageButtons,
            HeaderModule,
            FilterModule,
            ModalModule
        }
    }
</script>
