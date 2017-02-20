<template>
    <page-filter :config="filterState"></page-filter>
</template>
<script>
    import PageFilter from '../../../components/page/Filter.vue'
    import {store} from './Store/store'

    export default{
        computed: {
            filterState() {
              return store.state.filter;
            }
        },
        methods: {
            modalEdit: function() {
                this.$dispatch('modal','modal-module','module-store')
            }
        },
        components: {
            PageFilter
        }
    }
</script>