<template>
    <div class="modal fade" :id="config.id" aria-hidden="true" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="kill" v-show="config.close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">{{ config.title }}</h4>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        props:{
            config:{
            type: Object,
                default(){
                    return {
                        id: '',
                        close: true,
                        title: ''
                    }
                }
            }
        },
        methods: {
            kill: function(e) {
                let scope = this;
                $(`#${scope.config.id}`).remove();
                if($('.modal-backdrop').length > 0){
                    $('.modal-backdrop')[0].remove();
                }

            }
        },
        events: {
            'kill': function() {
                this.kill();
            }
        }
    }
</script>

<style scope>
    .modal-open .select2-container {
        z-index: 1;
    }
</style>