<template>
    <form method="post" onsubmit="return false;" id="form-team" enctype="multipart/form-data">
        <div class="page-content">
            <div class="panel" v-for="team in teamsState">
                <div class="panel-heading panel-heading-team" id="panel-team">
                    <h3 class="panel-title">
                        <i class="icon md-car" aria-hidden="true"></i>
                        {{ team.name }}
                        <span class="tag tag-round" :class="team.color">#REF</span>
                    </h3>
                    <ul class="panel-actions panel-actions-keep">
                        <li>
                            <button type="button" class="btn btn-sm btn-icon btn-primary btn-round" @click.prevent="composition(team)" data-toggle="tooltip" data-original-title="Team Composition" data-trigger="hover">
                                <i class="icon md-accounts" aria-hidden="true"></i>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="btn btn-sm btn-icon btn-primary btn-round" @click.prevent="send(team)" data-toggle="tooltip" data-original-title="Send Message" data-trigger="hover">
                                <i class="icon md-email" aria-hidden="true"></i>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="btn btn-sm btn-icon btn-primary btn-round" @click.prevent="report(team)" data-toggle="tooltip" data-original-title="Report" data-trigger="hover">
                                <i class="icon md-print" aria-hidden="true"></i>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="btn btn-sm btn-icon btn-primary btn-round" @click.prevent="sync(team)" data-toggle="tooltip" data-original-title="Synchronize" data-trigger="hover">
                                <i class="icon md-refresh-sync" aria-hidden="true"></i>
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="panel-body container-fluid">
                    <div class="row" id="row-avatar">
                        <div class="col-sm-12 p-l-10">
                            <div id="car_avatar">
                                <span class="avatar avatar-online" v-for="member in team.members">
                                    <img :src="getAvatar(member.id)" :id="member.id" @mouseover="tooltip(member.id)"  data-toggle="tooltip" data-original-title="{{ member.name }}" data-trigger="hover">
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="row-schedule">
                        <div class="col-md-4 col-xs-12" v-for="schedule in team.schedules">
                            <div class="panel panel-primary panel-line">
                                <div class="panel-heading">
                                    <h6 class="panel-title">
                                        {{ schedule.client }}
                                    </h6>
                                    <div class="panel-actions panel-actions-keep panel-action-schedule">
                                        <span class="checkbox-custom checkbox-primary">
                                            <input class="selectable-item" type="checkbox" id="row-{{schedule.id}}" v-model="schedule.checked" @click="checkedSchedule(schedule)" >
                                            <label for="row-{{schedule.id}}"></label>
                                        </span>
                                    </div>
                                    <div class="panel-action-tags">
                                        <span class="tag tag-primary tag-sm">{{ schedule.hour }}</span>
                                        <span class="tag tag-primary tag-sm" v-if="schedule.key"><i class="icon md-key" aria-hidden="true"></i></span>
                                    </div>
                                </div >
                                <div class="panel-body">
                                    <div class="row" id="address">
                                        <i class="md-pin p-l-15" aria-hidden="true"> {{ schedule.address }}</i>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <div class="input-group form-material">
                                        <button type="button" class="btn btn-xs waves-effect" v-bind:class="[ schedule.comment ? 'btn-info' : 'btn-primary' ]" @click.prevent="commentSchedule(schedule)"><i class="icon" v-bind:class="[ schedule.comment ? 'md-comment-text' : 'md-comment' ]" aria-hidden="true"></i> Comment</button>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-xs btn-icon dropdown-toggle waves-effect" v-bind:class="schedule.statusColor" data-toggle="dropdown" aria-expanded="false" aria-hidden="true">
                                                <i class="icon" v-bind:class="schedule.statusClass" aria-hidden="true"></i> Status
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" @click.prevent="statusSchedule(schedule,1)" role="menuitem">
                                                    <i class="icon md-block-alt" aria-hidden="true"></i> None
                                                </a>
                                                <a class="dropdown-item" @click.prevent="statusSchedule(schedule,2)" role="menuitem">
                                                    <i class="icon md-check" aria-hidden="true"></i> Waiting
                                                </a>
                                                <a class="dropdown-item" @click.prevent="statusSchedule(schedule,3)" role="menuitem">
                                                    <i class="icon md-check-all" aria-hidden="true"></i> Confirmed
                                                </a>
                                                <a class="dropdown-item" @click.prevent="statusSchedule(schedule,4)" role="menuitem">
                                                    <i class="icon md-close" aria-hidden="true"></i> Cancel
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-content" v-if="checkEvents">
            <div class="panel">
                <div class="alert dark alert-danger" role="alert" v-if="loadState">
                    <h4><i class="icon md-notifications" aria-hidden="true"></i>No events</h4>
                    <p>
                        No event for this day! Please choose another day.
                    </p>
                </div>
                <div class="alert dark alert-warning" role="alert" v-else>
                    <h4><i class="icon md-refresh" aria-hidden="true"></i>Loading</h4>
                    <p>
                        Please wait.
                    </p>
                </div>
            </div>
        </div>
    </form>

    <div class="modal fade" id="compositionModal" aria-hidden="true" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">{{ teamFocusName }}</h4>
                    <div class="modal-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="w-50">Choose</th>
                                    <th>Member</th>
                                    <th>Tag</th>
                                    <th>Rating</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="member in members">
                                    <td>
                                        <span class="checkbox-custom checkbox-primary">
                                            <input class="selectable-item" type="checkbox" id="row-{{member.id}}" value="{{member.id}}" :checked="checkedOrNot(member.id)" @click.prevent="crudMember(member)" >
                                            <label for="row-{{member.id}}"></label>
                                        </span>
                                    </td>
                                    <td>
                                        <img class="avatar avatar-sm m-r-10" :src="getAvatar(member.id)" />
                                        {{ member.name }}
                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <i data-alt="1" class="icon md-star orange-600" title="bad"></i>&nbsp;
                                        <i data-alt="2" class="icon md-star orange-600" title="poor"></i>&nbsp;
                                        <i data-alt="3" class="icon md-star orange-600" title="regular"></i>&nbsp;
                                        <i data-alt="4" class="icon md-star orange-600" title="good"></i>&nbsp;
                                        <i data-alt="5" class="icon md-star" title="gorgeous"></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="commentModal" aria-hidden="true" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">{{ scheduleFocusName }}</h4>
                    <div class="modal-body">
                        <div class="form-group form-material" data-plugin="formMaterial">
                            <label class="form-control-label" for="textarea">Comment</label>
                            <textarea class="form-control" id="textarea" name="textarea" rows="3" v-model="scheduleFocus.comment"></textarea>
                            <input type="hidden" id="oldComment" name="oldComment" :value="scheduleFocus.comment">
                            <span class="checkbox-custom checkbox-primary">
                                <input class="selectable-item" type="checkbox" id="user-comment" value="true" @click="toggleRepeat(scheduleFocus)">
                                <label for="user-comment">Repeat</label>
                            </span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-pure waves-effect" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary waves-effect" @click.prevent="crudComment(scheduleFocus)">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import {Loader} from './../../services/resources'
    import {store} from './Store/store'

    export default{
        data(){
            return{
                teamFocus: null,
                teamFocusName: null,
                scheduleFocus: false,
                scheduleFocusName: null,
                members: null
            }
        },
        components: {

        },
        computed: {
            loadState() {
                return store.state.load;
            },
            teamsState() {
                return store.state.teams;
            },
            checkEvents() {
                return (store.state.teams) ? ((store.state.teams.length == 0) ? true : false)  : true;
            }
        },
        ready() {
            this.loadMembers();
            $(document).ready(function() {
                $('#commentModal').on('hidden.bs.modal', function () {

                });
            });
        },
        methods: {
            checkedOrNot: function(id) {
                if(this.teamFocus !== null){
                    let elem =  this.teamFocus.members.filter(function(item) {
                        return (item.id == id) ? true : false;
                    });
                    return (elem.length == 0) ? false : true;
                }
                return false;
            },
            loadMembers: function() {
                this.$http.get('/api/user/members').then(response => {
                    this.members = response.data;
                }, response => {
                    toastr.warning('Error to load members', 'Error');
                });
            },
            crudMember: function(member) {
                Loader.in();
                let elem  = this.teamFocus.members.filter(function(item) {
                    return (item.id == member.id) ? true : false;
                });

                if(elem.length == 0){
                    this.$http.post('/api/team/composition/store', {member: member,team: this.teamFocus}).then(response => {
                        this.teamFocus.members.push({id: member.id, name: member.name});
                        Loader.out();
                    }, response => {
                        toastr.warning('Error to insert composition', 'Error');
                        Loader.out();
                    });
                } else{
                    this.$http.post('/api/team/composition/destroy', {member: member,team: this.teamFocus}).then(response => {
                        this.teamFocus.members.$remove(elem[0]);
                        Loader.out();
                    }, response => {
                        toastr.warning('Error to delete composition', 'Error');
                        Loader.out();
                    });
                }
            },
            crudComment: function(schedule) {
                Loader.in();
                this.$http.post('/api/schedule/comment', {schedule: schedule}).then(response => {
                    $('#oldComment').val(schedule.comment);
                    $('#commentModal').modal('toggle');
                    Loader.out();
                }, response => {
                    toastr.warning('Error to comment schedule', 'Error');
                    Loader.out();
                });
            },
            toggleRepeat: function(schedule) {
                schedule.repeat = (schedule.repeat) ? false : true;
            },
            commentSchedule: function(schedule) {
                this.scheduleFocus = schedule;
                this.scheduleFocusName = schedule.client;
                $(`#commentModal`).modal({
                    keyboard: false,
                    backdrop: 'static',
                    show: true
                });
            },
            checkedSchedule: function(schedule) {
                Loader.in();
                this.$http.post('/api/schedule/checked', {schedule: schedule}).then(response => {
                    Loader.out();
                }, response => {
                    toastr.warning('Error to checked schedule', 'Error');
                    Loader.out();
                });
            },
            statusSchedule: function(schedule,status){
                schedule.status = status;

                Loader.in();
                this.$http.post('/api/schedule/status', {schedule: schedule}).then(response => {
                    Loader.out();
                }, response => {
                    toastr.warning('Error to change status', 'Error');
                    Loader.out();
                });

                switch(status) {
                    case 2:
                        schedule.statusColor = 'btn-warning';
                        schedule.statusClass = 'md-check';
                        break;
                    case 3:
                        schedule.statusColor = 'btn-info';
                        schedule.statusClass = 'md-check-all';
                        break;
                    case 4:
                        schedule.statusColor = 'btn-danger';
                        schedule.statusClass = 'md-close';
                        break;
                    default:
                        schedule.statusColor = 'btn-primary';
                        schedule.statusClass = 'md-block-alt';
                        break;
                }
            },
            composition: function(team) {
                this.teamFocus = team;
                this.teamFocusName = team.name;
                $(`#compositionModal`).modal({
                    keyboard: false,
                    backdrop: 'static',
                    show: true
                });
            },
            send: function(team) {
                Loader.in();
                this.$http.post('/api/team/send', {team: team}).then(response => {
                    toastr.success('Messages sent successfully', 'Success');
                    Loader.out();
                }, response => {
                    toastr.warning('Error sending messages', 'Error');
                    Loader.out();
                });
            },
            report: function(team) {
                Loader.in();
                window.open('team/report/' + team.id + '/' + window.Moment(team.date,"MM/DD/YYYY").format("YYYY-MM-DD") + '', 'Report Team');
                Loader.out();
            },
            sync: function(team) {
                Loader.in();
                this.$http.post('/api/team/sync', {team: team}).then(response => {
                    toastr.success('Synchronized successfully', 'Success');
                    Loader.out();
                }, response => {
                    toastr.warning('Error during sync', 'Error');
                    Loader.out();
                });
            },
            getAvatar: function(id) {
                return `images/portraits/${ id }.jpg`;
            },
            tooltip: function(id) {
                $(`#${id}`).tooltip('show');
            }
        }
    }
</script>
<style scope>
    .page-content {
        padding: 5px 20px !important;
    }
    .panel-heading .panel-title {
        padding-bottom: 10px !important;
        padding-left: 20px !important;
    }
    .panel-body {
        padding: 0px 10px !important;
    }
    .panel-action-schedule {
        top: 35% !important;
    }
    .panel-action-tags {
        padding-left: 10px;
    }
    #row-avatar .avatar {
        padding: 1px;
    }
    #row-schedule {
        padding-top: 10px;
    }
    #row-schedule .panel-title {
        padding: 10px 10px 5px 10px !important;
        font-size: 14px !important;
    }
    #row-schedule .panel-footer {
        padding: 15px 10px !important;
    }
    .selectable-item {
        cursor: pointer;
    }
    #address {
        min-height: 42px;
    }
</style>