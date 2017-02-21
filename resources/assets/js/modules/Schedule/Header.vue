<template>
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active font-size-20">{{ titleState }} <span class="tag tag-primary tag-round">{{ dateState }}</span></li>
        </ol>
        <div class="page-header-actions" slot="actions">
            <button type="button" class="btn btn-sm btn-icon btn-primary btn-round btn-floating" @click.prevent="previousDay" data-toggle="tooltip" data-original-title="Previous Day" data-trigger="hover">
                <i class="icon md-chevron-left" aria-hidden="true"></i>
            </button>
            <button type="button" class="btn btn-sm btn-icon btn-primary btn-round btn-floating" @click.prevent="nextDay" data-toggle="tooltip" data-original-title="Next Day" data-trigger="hover">
                <i class="icon md-chevron-right" aria-hidden="true"></i>
            </button>
            <button type="button" class="btn btn-sm btn-icon btn-primary btn-round btn-floating" @click.prevent="sendAll" data-toggle="tooltip" data-original-title="Send Message" data-trigger="hover">
                <i class="icon md-email" aria-hidden="true"></i>
            </button>
            <button type="button" class="btn btn-sm btn-icon btn-primary btn-round btn-floating" @click.prevent="reportAll" data-toggle="tooltip" data-original-title="Report All" data-trigger="hover">
                <i class="icon md-print" aria-hidden="true"></i>
            </button>
            <button type="button" class="btn btn-sm btn-icon btn-primary btn-round btn-floating" @click.prevent="syncAll" data-toggle="tooltip" data-original-title="Synchronize All" data-trigger="hover">
                <i class="icon md-refresh-sync" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</template>
<script>
    import {Loader} from './../../services/resources'
    import {store} from './Store/store'

    export default{
        data(){
            return{

            }
        },
        components: {

        },
        computed: {
            titleState() {
                return store.state.header.title;
            },
            dateState() {
                return store.state.date;
            }
        },
        methods: {
            previousDay: function() {
                store.commit({
                    type: 'previousDay'
                });
            },
            nextDay: function() {
                store.commit({
                    type: 'nextDay'
                });
            },
            sendAll: function() {
                alert('Envia todas confirmacoes!');
            },
            reportAll: function() {
                alert('Relatatorio de tudo!');
            },
            syncAll: function() {
                alert('Sincronizar tudo!');
            }
        }
    }
</script>