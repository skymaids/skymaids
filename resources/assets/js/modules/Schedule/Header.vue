<template>
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active font-size-20">{{ titleState }} {{ tamanho }}<span class="tag tag-primary tag-round">{{ dateState }}</span></li>
        </ol>
        <div class="page-header-actions" slot="actions">
            <button type="button" class="btn btn-sm btn-icon btn-primary btn-round btn-floating" @click.prevent="previousDay" data-toggle="tooltip" data-original-title="Previous Day" data-trigger="hover">
                <i class="icon md-chevron-left" aria-hidden="true"></i>
            </button>
            <button type="button" class="btn btn-sm btn-icon btn-primary btn-round btn-floating" @click.prevent="nextDay" data-toggle="tooltip" data-original-title="Next Day" data-trigger="hover">
                <i class="icon md-chevron-right" aria-hidden="true"></i>
            </button>
            <button type="button" class="btn btn-sm btn-icon btn-primary btn-round btn-floating" @click.prevent="sendAll(dateState)" data-toggle="tooltip" data-original-title="Send Message" data-trigger="hover">
                <i class="icon md-email" aria-hidden="true"></i>
            </button>
            <button type="button" class="btn btn-sm btn-icon btn-primary btn-round btn-floating" @click.prevent="reportAll(dateState)" data-toggle="tooltip" data-original-title="Report All" data-trigger="hover">
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
                this.load();
            },
            nextDay: function() {
                store.commit({
                    type: 'nextDay'
                });
                this.load();
            },
            load: function(load = true) {
                (load) ? Loader.in() : '';
                this.$http.post('/api/schedule/load', {date: store.state.date}).then(response => {
                    store.commit({
                        type: 'setTeams',
                        teams: response.data
                    });
                    (load) ? Loader.out() : '';
                    store.commit({
                        type: 'setLoad'
                    });
                }, response => {
                    toastr.warning('Error in load data', 'Error');
                    (load) ? Loader.out() : '';
                    store.commit({
                        type: 'setLoad'
                    });
                });

                var elems = document.querySelectorAll('.js-switch');

                for (var i = 0; i < elems.length; i++) {
                  var switchery = new Switchery(elems[i]);
                }
            },
            sendAll: function(date) {
                Loader.in();
                this.$http.post('/api/schedule/send', {dateSchedule: window.Moment(date,"MM/DD/YYYY").format("YYYY-MM-DD")}).then(response => {
                    toastr.success('Messages sent successfully', 'Success');
                    Loader.out();
                }, response => {
                    toastr.warning('Error sending messages', 'Error');
                    Loader.out();
                });
            },
            reportAll: function(date) {
                Loader.in();
                window.open('schedule/report/'+ window.Moment(date,"MM/DD/YYYY").format("YYYY-MM-DD") + '', 'Report All');
                Loader.out();
            },
            syncAll: function() {
                Loader.in()
                this.$http.post('/api/schedule/sync', {date: store.state.date}).then(response => {
                    this.load(false);
                    Loader.out();
                }, response => {
                    toastr.warning('Error during sync', 'Error');
                    Loader.out();
                });
            }
        },
        events: {
            'load': function() {
                this.load(false);
            }
        }
    }
</script>