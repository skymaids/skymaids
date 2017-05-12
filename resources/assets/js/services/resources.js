export class Loader{
    static in(){
        $('body').animsition({
            inClass: 'fade-in',
            outClass: 'fade-out',
            inDuration: 800,
            outDuration: 500,
            loading: true,
            loadingClass: 'loader-overlay',
            loadingParentElement: 'html',
            loadingInner: `
                    <div class="loader-content">
                    <h2>Sky Maids</h2>
                    <div class="loader-index">
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                    </div>
                    </div>`,
            onLoadEvent: true
        });
    }

    static out(){
        $('.loader-overlay').remove();
    }
}

let Schedule = Vue.resource('/api/schedule/schedules{/id}');
let MenuPage = Vue.resource('/api/menu/page{/id}');

export {Schedule,MenuPage};