import Vuex from 'vuex'

import getters from './getters'
import mutations from './mutations'
import actions from './actions'

export const store = new Vuex.Store({
    state: {
        search: {}, //Pega informações do banco
        crud: {
            id: null, //ID que define se tela vai ser montada como edição ou cadastro
            modal: {
                id: 'module-crud',
                close: true,
                title: null,
                currentTab: 'crud',
                tabs: [
                    {
                        title: 'Cadastrar',
                        component: 'tab-crud',
                        ref: 'crud',
                        activeClass: 'active'
                    }
                ]
            },
        },
        filter: {
            id: null,
            module: null,
            url: null,
            form: 'form-module-search',
            pageLength: 25,
            excel: true,
            columns: [
                {
                    name: 'Ações',
                    className: 'actions',
                    sortable: false,
                    searchable: false,
                    action: true,
                    width: "5%"
                },
                {
                    name: 'Nome',
                    data: 'name'
                }
            ],
            footer: {
                columns: false
            },
            order: {
                target: 1,
                direction: 'asc'
            },
            actions: [
                {
                    name: 'edit',
                    icon: 'icon md-edit'
                }
            ]
        }
    },
    mutations,
    getters,
    actions
});