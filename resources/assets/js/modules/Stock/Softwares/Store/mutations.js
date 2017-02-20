export default{
    configStore(state,payload) {
        state.route = (payload.page.route) ? payload.page.route : null;
        state.search = (payload.page) ? payload.page : null;
        state.crud.modal.title = (payload.page.title) ? payload.page.title : null;
        state.filter.id = (payload.page.method) ? payload.page.method : null;
        state.filter.module = (payload.page.module) ? payload.page.module : null;
        state.filterLicense.module = (payload.page.module) ? payload.page.module : null;
    },
    setId(state,payload) {
        state.crud.id = (payload.id) ? parseInt(payload.id) : null;
    },
    setRef(state,payload) {
        state.crud.ref = (payload.ref) ? payload.ref : null;
    },
    changeTitleTabs(state,payload) {
        state.crud.modal.tabs[payload.tab].title = payload.title;
    },
    activeTab(state,payload) {
        state.crud.modal.currentTab = payload.tab;
    }
}