import Vuex from 'vuex'

import getters from './getters'
import mutations from './mutations'
import actions from './actions'

export const store = new Vuex.Store({
    state: {
        header: {
            title: 'Schedule'
        },
        date: window.Moment().format("MM/DD/YYYY"),
        teams: null,
        load: false
    },
    mutations,
    getters,
    actions
});