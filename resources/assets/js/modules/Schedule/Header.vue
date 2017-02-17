<template>
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active font-size-20">{{ title }} <span class="tag tag-primary tag-round">{{ date }}</span></li>
            </ol>
            <div class="page-header-actions" slot="actions">
                <button type="button" class="btn btn-sm btn-icon btn-primary btn-round btn-floating" @click.prevent="previous" data-toggle="tooltip" data-original-title="Previous Day" data-trigger="hover">
                    <i class="icon md-chevron-left" aria-hidden="true"></i>
                </button>
                <button type="button" class="btn btn-sm btn-icon btn-primary btn-round btn-floating" @click.prevent="next" data-toggle="tooltip" data-original-title="Next Day" data-trigger="hover">
                    <i class="icon md-chevron-right" aria-hidden="true"></i>
                </button>
                <button type="button" class="btn btn-sm btn-icon btn-primary btn-round btn-floating" @click.prevent="mail" data-toggle="tooltip" data-original-title="Send Message" data-trigger="hover">
                    <i class="icon md-email" aria-hidden="true"></i>
                </button>
                <button type="button" class="btn btn-sm btn-icon btn-primary btn-round btn-floating" @click.prevent="report" data-toggle="tooltip" data-original-title="Report All" data-trigger="hover">
                    <i class="icon md-print" aria-hidden="true"></i>
                </button>
                <button type="button" class="btn btn-sm btn-icon btn-primary btn-round btn-floating" @click.prevent="sync" data-toggle="tooltip" data-original-title="Synchronize All" data-trigger="hover">
                    <i class="icon md-refresh-sync" aria-hidden="true"></i>
                </button>
            </div>
        </div>

    </page-header>
</template>
<script>
    import PageHeader from './../../components/page/Header.vue'
    import {Loader} from './../../services/resources'
    import {store} from './Store/store'

    export default{
        data(){
            return{
                title: 'Schedule',
                date: '02/17/2017'
            }
        },
        components: {
            PageHeader
        },
        computed: {
            pageState() {
              return store.state.header;
            }
        },
        methods: {
            report: function() {
                alert('Relatatorio de tudo!');
            },
            sync: function() {
                alert('Sincronizar tudo!');
            }
        }
    }
</script>