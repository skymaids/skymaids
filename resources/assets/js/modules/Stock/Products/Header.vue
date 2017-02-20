<template>
    <page-header :config="pageState">
        <div class="page-header-actions" slot="actions">
            <button type="button" id="btn-add" class="btn btn-sm btn-icon btn-primary btn-round" @click.prevent="modalCrud" data-toggle="tooltip" data-original-title="Cadastrar" data-trigger="hover">
                <i class="icon md-plus" aria-hidden="true"></i>
            </button>
            <button type="button" id="btn-help" class="btn btn-sm btn-icon btn-primary btn-round" @click.prevent="download" data-toggle="tooltip" data-original-title="Ajuda (Manual)" data-trigger="hover">
                <i class="icon md-help" aria-hidden="true"></i>
            </button>
        </div>
    </page-header>
</template>
<script>
    import PageHeader from '../../../components/page/Header.vue'
    import {Loader} from '../../../services/resources'
    import {store} from './Store/store'

    export default{
        components: {
            PageHeader
        },
        computed: {
            pageState() {
              return store.state.search;
            }
        },
        methods: {
            modalCrud: function() {
                this.$dispatch('modal','modal-module','module-crud')
            },
            download: function() {
                window.open(`${store.getters.manual}`);
            }
        }
    }
</script>