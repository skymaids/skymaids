<template>
    <header-module></header-module>
    <teams-module></teams-module>
</template>
<script>
    import HeaderModule from './Header.vue'
    import TeamsModule from './Teams.vue'
    import {MenuPage, Loader} from '../../services/resources'
    import {store} from './Store/store'

    export default {
        data() {
            return {

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
            HeaderModule,
            TeamsModule
        }
    }
</script>
