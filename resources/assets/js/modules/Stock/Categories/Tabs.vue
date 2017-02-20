<template>
    <ul class="nav nav-tabs nav-tabs-line" role="tablist">
        <li class="nav-item" role="presentation" v-for="tab in tabsState">
            <a class="nav-link {{ tab.activeClass }}" data-toggle="tab" href="#{{ tab.ref }}" @click="activeTab" :data-id="tab.ref" :data-component="tab.component" :aria-controls="tab.ref" role="tab">{{ tab.title }}</a>
        </li>
    </ul>
    <div class="modal-body">
        <div class="tab-content">
            <div v-for="tab in tabsState" class="tab-pane {{ tab.activeClass }}" id="{{ tab.ref }}" role="tabpanel"></div>
        </div>
    </div>
</template>
<script>
    import TabCrud from './Tabs/Crud.vue'
    import {store} from './Store/store'

    export default{
        ready(){
            this.actionType;
            this.load(this.currentTabState);
        },
        computed: {
            tabsState() {
              return store.state.crud.modal.tabs;
            },
            currentTabState() {
              return store.state.crud.modal.currentTab;
            },
            actionType(){
                store.commit({
                    type: 'changeTitleTabs',
                    tab: 0,
                    title: (store.state.crud.id) ? 'Editar' : 'Cadastrar'
                });
                (store.state.crud.id) ? $('#tab-modal .nav-link').removeClass('disabled') : $('#tab-modal .nav-link').addClass('disabled')
            }
        },
        components: {
            TabCrud
        },
        methods: {
            activeTab: function(e){
                store.commit({
                    type: 'activeTab',
                    tab: $(event.target).attr('data-id')
                });
                this.load();
            },
            load: function(){
                $(`#${this.currentTabState}`).html('');
                let component = $(`a[data-id='${this.currentTabState}']`).attr('data-component');
                let element = $(`#${this.currentTabState}`).append(`<${component}></${component}>`);
                this.$compile(element[0]);
            }
        },
        events: {
            'created': function() {
                this.actionType;
            }
        },
    }
</script>