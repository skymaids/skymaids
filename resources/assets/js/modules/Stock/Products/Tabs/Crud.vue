<template>
    <form method="post" class="form-horizontal form-app" @submit.prevent="save" id="form-modal-crud" enctype="multipart/form-data">
        <div class="form-group row form-material row">
            <label class="col-md-2 form-control-label">Nome: </label>
            <div class="col-md-9 col-xs-12">
                <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome" autocomplete="off" v-model="inputs.name" />
                <span v-if="errors.name" class="error text-danger">{{ errors.name }}</span>
            </div>
        </div>
        <div class="form-group row form-material row">
            <label class="col-md-2 form-control-label">Categoria: </label>
            <div class="col-md-9 col-xs-12">
                <select class="form-control" id="stock_category_id" disabled name="stock_category_id" v-model="inputs.stock_category_id">
                    <option v-for="category in categories" :value="category.id">{{category.name}}</option>
                </select>
                <span v-if="errors.stock_category_id" class="error text-danger">{{ errors.stock_category_id }}</span>
            </div>
        </div>
        <div class="form-group row form-material row">
            <label class="col-md-2 form-control-label">Medida: </label>
            <div class="col-md-9 col-xs-12">
                <select class="form-control" id="unit_id" disabled name="unit_id" v-model="inputs.unit_id">
                    <option v-for="unit in units" :value="unit.id" >{{unit.name}} ({{unit.code}})</option>
                </select>
                <span v-if="errors.unit_id" class="error text-danger">{{ errors.unit_id }}</span>
            </div>
        </div>
        <div class="form-group row form-material row">
            <label class="col-md-2 form-control-label">Ativo: </label>
            <div class="col-md-9 col-xs-12">
                <div class="checkbox-custom checkbox-primary">
                    <input type="checkbox" id="asset" name="asset" :checked="inputs.asset" @click="setAsset" />
                    <label for="inputChecked"> Patrimônio (item valorado)</label>
                </div>
                <span v-if="errors.asset" class="error text-danger">{{ errors.asset }}</span>
            </div>
        </div>
        <div class="form-group row form-material row">
            <label class="col-md-2 form-control-label">Máximo: </label>
            <div class="col-md-9 col-xs-12">
                <input type="text" class="form-control" id="max" name="max" placeholder="Digite o máximo em estoque" autocomplete="off" v-model="inputs.max" v-on:keypress="isNumber(event)" />
                <span v-if="errors.max" class="error text-danger">{{ errors.max }}</span>
            </div>
        </div>
        <div class="form-group row form-material row">
            <label class="col-md-2 form-control-label">Mínimo: </label>
            <div class="col-md-9 col-xs-12">
                <input type="text" class="form-control" id="min" name="min" placeholder="Digite o minimo em estoque" autocomplete="off" v-model="inputs.min" v-on:keypress="isNumber(event)" />
                <span v-if="errors.min" class="error text-danger">{{ errors.min }}</span>
            </div>
        </div>
        <div class="form-group row form-material row">
            <label class="col-md-2 form-control-label">Compra: </label>
            <div class="col-md-9 col-xs-12">
                <input type="text" class="form-control" id="purchase" name="purchase" placeholder="Digite a quantidade de compra" autocomplete="off" v-model="inputs.purchase" v-on:keypress="isNumber(event)" />
                <span v-if="errors.purchase" class="error text-danger">{{ errors.purchase }}</span>
            </div>
        </div>
        <div class="form-group row form-material row">
            <label class="col-md-2 form-control-label">Quantidade: </label>
            <div class="col-md-9 col-xs-12">
                <input type="text" class="form-control" id="qtd" name="qtd" placeholder="Digite a quantidade inicial" autocomplete="off" v-model="inputs.qtd" v-on:keypress="isNumber(event)" />
                <span v-if="errors.qtd" class="error text-danger">{{ errors.qtd }}</span>
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
    import {StockCategory, StockProduct, Unit, Loader} from '../../../../services/resources'
    import {store} from './../Store/store'

    export default{
        data(){
            return{
                inputs: {
                    name: '',
                    stock_category_id: '',
                    unit_id: '',
                    asset: 0,
                    max: '',
                    min: '',
                    purchase: '',
                    qtd: ''
                },
                errors: {},
                modalConfirm: {
                    close: true,
                    title: 'Deseja excluir a categoria?',
                    ref: ''
                },
                categories: [],
                units: []
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
            self = this;
            $(document).ready(function() {
                setTimeout(function(){
                    $("#form-module-search select").select2({
                        dropdownParent: $("#module-crud")
                    });
                }, 1000);
                $('select').on('change',function(){
                    switch($(this).attr('id')) {
                        case 'stock_category_id':
                            self.inputs.stock_category_id = $(this).val();
                        break;
                        case 'unit_id':
                            self.inputs.unit_id = $(this).val();
                        break;
                    }

                });
            });
        },
        methods: {
            isNumber: function(event) {
                event = (event) ? event : window.event;
                let keyCode = (event.which) ? event.which : event.keyCode;
                if (keyCode > 31 && (keyCode < 48 || keyCode > 57)) {
                    event.preventDefault();
                } else {
                    return true;
                }
            },
            setAsset: function() {
                this.inputs.asset = (this.inputs.asset == 1) ? 0 : 1;
            },
            comboCategory: function(){
                StockCategory.get()
                    .then((response) => {
                       this.categories = response.data;
                       $("#form-modal-crud #stock_category_id").removeAttr("disabled");
                    })
                    .catch((response) => {
                        toastr.error('Não foi possivel carregar o combo!', 'Erro');
                    });
            },
            comboUnit: function(){
                Unit.get()
                    .then((response) => {
                       this.units = response.data;
                       $("#form-modal-crud #unit_id").removeAttr("disabled");
                    })
                    .catch((response) => {
                        toastr.error('Não foi possivel carregar o combo!', 'Erro');
                    });
            },
            init: function () {
                (this.idState) ? this.load() : this.focus();
                this.comboCategory();
                this.comboUnit();
            },
            focus: function() {
                setTimeout(function(){
                    $('#form-modal-crud #name').focus();
                }, 500);
            },
            clear: function() {
                this.inputs = {
                    name: '',
                    stock_category_id: '',
                    unit_id: '',
                    asset: 0,
                    max: '',
                    min: '',
                    purchase: '',
                    qtd: ''
                };
                $("#form-module-search select").val("");
                $('.select2-selection__rendered').html('').removeAttr( "title" );
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
                    StockProduct.update({id: this.idState},this.inputs)
                        .then((response) => {
                            this.errors = {};
                            toastr.success('Produto alterado.', 'Successo');
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
                    StockProduct.save(this.inputs)
                        .then((response) => {
                            this.setId(response.data.id);
                            this.errors = {};
                            toastr.success('Produto criado.', 'Successo');
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
                    StockProduct.delete({id: this.idState})
                        .then((response) => {
                            this.clear();
                            toastr.success('Produto excluido.', 'Successo');
                            this.$dispatch('reload');
                            this.$dispatch('kill');
                            Loader.out();
                        })
                        .catch((response) => {
                            this.errors = response.data;
                            toastr.error('Não foi possível excluir o produto', 'Erro');
                            Loader.out();
                        });
                } else{
                    toastr.error('Produto não localizado', 'Erro');
                }
            },
            load: function(){
                if(this.checkId(this.idState)){
                    Loader.in();
                    StockProduct.get({id: this.idState})
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