<template>
    <form method="post" onsubmit="return false;" id="form-team" enctype="multipart/form-data">
        <div class="page-content">
            <div class="panel" v-for="team in teamsState">
                <div class="panel-heading" id="panel-team">
                    <h3 class="panel-title">
                        <i class="icon md-car" aria-hidden="true"></i>
                        {{ team.name }}
                        <span class="tag tag-round" :class="team.color">#REF</span>
                    </h3>
                    <ul class="panel-actions panel-actions-keep">
                        <li>
                            <button type="button" class="btn btn-sm btn-icon btn-primary btn-round" @click.prevent="member(team.id)" data-toggle="tooltip" data-original-title="Team Composition" data-trigger="hover">
                                <i class="icon md-accounts" aria-hidden="true"></i>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="btn btn-sm btn-icon btn-primary btn-round" @click.prevent="send(team.id)" data-toggle="tooltip" data-original-title="Send Message" data-trigger="hover">
                                <i class="icon md-email" aria-hidden="true"></i>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="btn btn-sm btn-icon btn-primary btn-round" @click.prevent="report(team.id)" data-toggle="tooltip" data-original-title="Report" data-trigger="hover">
                                <i class="icon md-print" aria-hidden="true"></i>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="btn btn-sm btn-icon btn-primary btn-round" @click.prevent="sync(team.id)" data-toggle="tooltip" data-original-title="Synchronize" data-trigger="hover">
                                <i class="icon md-refresh-sync" aria-hidden="true"></i>
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="panel-body container-fluid">
                    <div class="row" id="row-avatar">
                        <div class="col-sm-12">
                            <div id="car_avatar">
                                <span class="avatar avatar-online" v-for="member in team.members">
                                    <img :src="getAvatar(member.id)" data-toggle="tooltip" data-original-title="{{ member.name }}" data-trigger="hover">
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="row-schedule">
                        <div class="col-md-4 col-xs-12" v-for="schedule in team.schedules">
                            <div class="panel panel-primary panel-line">
                                <div class="panel-heading">
                                    <h5 class="panel-title">
                                        {{ schedule.client }}<span class="tag tag-primary tag-sm">{{ schedule.hour }}</span>
                                    </h5>
                                    <div class="panel-actions panel-actions-keep">
                                        <input type="checkbox" data-plugin="switchery" data-size="small" checked="" data-switchery="true" data-color="#3f51b5" style="display: none;">
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <i class="md-pin" aria-hidden="true"> {{ schedule.address }}</i>
                                    <i class="md-comment-alt-text" aria-hidden="true"> {{ schedule.comment }}</i>
                                </div>
                                <div class="panel-footer">
                                    <div class="input-group form-material">
                                        <input class="form-control" type="text" placeholder="Type message here ...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-pure btn-default icon md-mail-send waves-effect" type="button"></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>
<script>
    import {Schedule, Loader} from './../../services/resources'
    import {store} from './Store/store'

    export default{
        data(){
            return{

            }
        },
        components: {

        },
        computed: {
            teamsState() {
                return store.state.teams;
            }
        },
        methods: {
            member: function(id) {
                alert(id);
                alert('Envia todas confirmacoes!');
            },
            send: function(id) {
                alert('Envia todas confirmacoes!');
            },
            report: function(id) {
                alert('Relatatorio de tudo!');
            },
            sync: function(id) {
                this.$http.get('/api/team/sync/' + id, function(response) {
                    console.log(response);
                }).error(function (data, status, request) {
                    console.log('error');
                });
            },
            getAvatar: function(id) {
                return `images/portraits/${ id }.jpg`;
            }
        }
    }
</script>
<style scope>
    .page-content {
        padding: 5px 30px !important;
    }
    .panel-heading .panel-title {
        padding-bottom: 10px !important;
    }
    .panel-body {
        padding: 0px 20px !important;
    }
    #row-avatar .avatar {
        padding: 1px;
    }
    #row-schedule {
        padding-top: 10px;
    }
    #row-schedule .panel-title {
        padding: 20px 20px 10px 20px !important;
        font-size: 16px !important;
    }
    #row-schedule .panel-footer {
        padding: 15px 20px !important;
    }
</style>