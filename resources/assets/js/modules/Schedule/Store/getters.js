export default{
    manual: state => {
        return `/base/viewer?file=/storage/manual/${state.search.route}.pdf`;
    }
}