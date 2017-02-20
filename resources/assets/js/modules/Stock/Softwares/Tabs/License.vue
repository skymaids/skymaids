<template>
    <form method="post" class="form-horizontal form-app" id="form-module-search-license">
        <input type="hidden" id="stock_software_id" name="stock_software_id" v-model="idSoftware" />
        <div class="row">
            <div class="col-xs-5 p-l-45">
                <h4><span class="tag tag-dark">{{ref}}</span></h4>
            </div>
            <div class="col-xs-7 text-xs-right p-r-50">
                <button type="button" id="btn-add" class="btn btn-sm btn-icon btn-primary btn-round" @click.prevent="add" data-toggle="tooltip" data-original-title="Cadastrar" data-trigger="hover">
                    <i class="icon md-plus" aria-hidden="true"></i>
                </button>
            </div>
        </div>
        <page-filter :config="filterState"></page-filter>
    </form>
</template>
<script>
    import PageFilter from '../../../../components/page/Filter.vue'
    import {store} from '../Store/store'

    export default{
        computed: {
            filterState() {
                return store.state.filterLicense;
            },
            idSoftware() {
                return store.state.crud.id;
            },
            ref() {
                return store.state.crud.ref;
            }
        },
        methods: {
            modalEdit: function() {
                this.$dispatch('modal','modal-module','module-store')
            },
            add: function() {
                alert('oi');
            }
        },
        components: {
            PageFilter
        }
    }
</script>

<style scope>
    #form-module-search-license .panel-body {
        padding-top: 10px;
    }
</style>

