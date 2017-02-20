<template>
    <div class="modal fade modal-fill-in" id="modal-confirm" aria-hidden="true" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="row">
                    <div class="col-sm-12 centered-text">
                        <h3 class="text-xs-center">{{ config.title }}</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 centered-text">
                        <h5 class="text-xs-center">{{ config.ref }}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-xs-center">
                        <button class="btn-lg btn-flat btn-primary" @click="confirm">Confirmar</button>
                        <button class="btn-lg btn-flat btn-danger" @click="cancel">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import PageButtons from '../../components/page/Buttons.vue'

    export default{
        data(){
            return{
                config: {
                    close: true,
                    title: 'Deseja excluir a registro?',
                    ref: ''
                }
            }
        },
        methods: {
            kill: function(){
                let scope = this;
                $(`#modal-confirm`).remove();
                if($('.modal-backdrop').length > 0){
                    $('.modal-backdrop')[0].remove();
                }
            },
            confirm: function(){
                this.$dispatch('delete');
                this.kill();
            },
            cancel: function(){
                this.kill();
            }
        },
        events: {
            'open': function () {
                this.delete();
            },
            'close': function () {
                this.kill();
            },
            'load': function (config) {
                this.config = config;
            }
        },
        components: {
            PageButtons
        }
    }
</script>
<style scope>
    button {
        cursor:pointer;
    }
</style>