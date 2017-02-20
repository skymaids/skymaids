<template>
    <form method="post" class="form-horizontal form-app" @submit.prevent="save" id="form-modal-crud" enctype="multipart/form-data">
        <div class="form-group row form-material row">
            <label class="col-md-2 form-control-label">Nome: </label>
            <div class="col-md-9 col-xs-12">
                <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome" autocomplete="off" v-model="inputs.name" />
                <span v-if="errors.name" class="error text-danger">{{ errors.name }}</span>
            </div>
        </div>
        <div class="modal-footer">
            <page-buttons>
                <div slot="buttons">
                    <button type="button" class="btn btn-info" v-show="idState" @click.prevent="renew">Novo</button>
                    <button type="button" class="btn btn-success" @click.prevent="save">Gravar</button>
                    <button type="button" class="btn btn-danger" v-show="idState" @click.prevent="confirm">Excluir</button>
                    <button type="button" class="btn btn-warning" @click.prevent="clear">Limpar</button>
                </div>
            </page-buttons>
        </div>
    </form>
</template>
<script>
    import PageButtons from '../../../../components/page/Buttons.vue'
    import PageConfirm from '../../../../components/page/Confirm.vue'
    import {StockCategory, Loader} from '../../../../services/resources'
    import {store} from './../Store/store'

    export default{
        data(){
            return{
                inputs: {
                    name: ''
                },
                errors: {},
                modalConfirm: {
                    close: true,
                    title: 'Deseja excluir a categoria?',
                    ref: ''
                }
            }
        },
        computed: {
            idState() {
              return store.state.crud.id;
            },
            modalState() {
                return store.state.crud.modal
            }
        },
        ready() {
            this.init();
        },
        methods: {
            init: function () {
                (this.idState) ? this.load() : this.focus();
            },
            focus: function() {
                setTimeout(function(){
                    $('#form-modal-crud #name').focus();
                }, 500);
            },
            clear: function() {
                this.inputs = {
                    name: ''
                };
                this.errors = {};
                this.focus();
            },
            renew: function() {
                this.setId(null);
                this.$dispatch('created');
                this.clear();
            },
            setId: function(id){
                store.commit({
                    type: 'setId',
                    id: id
                });
                this.actionType;
                return store.state.crud.id;
            },
            save: function() {
                Loader.in();
                if(this.checkId(this.idState)){
                    StockCategory.update({id: this.idState},this.inputs)
                        .then((response) => {
                            this.errors = {};
                            toastr.success('Categoria alterada.', 'Successo');
                            this.$dispatch('reload');
                            this.focus();
                            Loader.out();
                        })
                        .catch((response) => {
                            this.errors = response.data;
                            toastr.warning('Verifique o(s) campo(s)', 'Validação');
                            this.focus();
                            Loader.out();
                        });
                } else{
                    StockCategory.save(this.inputs)
                        .then((response) => {
                            this.setId(response.data.id);
                            this.errors = {};
                            toastr.success('Categoria criada.', 'Successo');
                            this.$dispatch('reload');
                            this.$dispatch('created');
                            this.focus();
                            Loader.out();
                        })
                        .catch((response) => {
                            this.errors = response.data;
                            toastr.warning('Verifique o(s) campo(s)', 'Validação');
                            this.focus();
                            Loader.out();
                        });
                }
            },
            confirm: function(){
                this.modalConfirm.ref = this.inputs.name;
                let element = $('.form').append(`<page-confirm></page-confirm>`);
                this.$compile(element[0]);
                this.$broadcast('load',this.modalConfirm);

                $(`#modal-confirm`).modal({
                    keyboard: false,
                    backdrop: 'static',
                    show: true
                });
            },
            delete: function() {
                if(this.checkId(this.idState)){
                    Loader.in();
                    StockCategory.delete({id: this.idState})
                        .then((response) => {
                            this.clear();
                            toastr.success('Categoria excluida.', 'Successo');
                            this.$dispatch('reload');
                            this.$dispatch('kill');
                            Loader.out();
                        })
                        .catch((response) => {
                            this.errors = response.data;
                            toastr.error('Não foi possível excluir a categoria', 'Erro');
                            Loader.out();
                        });
                } else{
                    toastr.error('Categoria não localizada', 'Erro');
                }
            },
            load: function(){
                if(this.checkId(this.idState)){
                    Loader.in();
                    StockCategory.get({id: this.idState})
                        .then((response) => {
                            this.inputs = response.data;
                            this.modalConfirm.ref = response.data.name;
                            this.focus();
                            Loader.out();
                        })
                        .catch((response) => {
                            toastr.error('Não foi possivel carregar dados!', 'Erro');
                            Loader.out();
                        });
                }
            },
            checkId: function(id){
                return Number.isInteger(id) ? true : false;
            }
        },
        events: {
            'delete': function () {
                this.delete();
            }
        },
        components: {
            PageButtons,
            PageConfirm
        }
    }
</script>