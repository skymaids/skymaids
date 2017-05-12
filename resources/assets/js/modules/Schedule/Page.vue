<template>
    <header-module></header-module>
    <teams-module></teams-module>
</template>
<script>
    import HeaderModule from './Header.vue'
    import TeamsModule from './Teams.vue'
    import {Loader} from '../../services/resources'
    import {store} from './Store/store'

    export default {
        data() {
            return {

            }
        },
        ready() {
            this.initConf();
        },
        computed: {

        },
        methods: {
            initConf: function() {
                this.configStore();
            },
            configStore: function() {
                this.$broadcast('load');
            }
        },
        events: {

        },
        components: {
            HeaderModule,
            TeamsModule
        }
    }
</script>
