export default{
    previousDay(state,payload) {
        state.date = window.Moment(state.date,"MM/DD/YYYY").subtract(1, 'day').format("MM/DD/YYYY");
    },
    nextDay(state,payload) {
        state.date = window.Moment(state.date,"MM/DD/YYYY").add(1, 'day').format("MM/DD/YYYY");
    }
}