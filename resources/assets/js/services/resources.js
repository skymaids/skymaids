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
                    <h2>Imatec</h2>
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

let StockCategory = Vue.resource('/api/stock/categories{/id}');
let StockProduct = Vue.resource('/api/stock/products{/id}');
let StockSoftware = Vue.resource('/api/stock/softwares{/id}');
let Schedule = Vue.resource('/api/schedule/schedules{/id}');
let Unit = Vue.resource('/api/base/units{/id}');
let MenuPage = Vue.resource('/api/menu/page{/id}');

export {StockCategory,StockProduct,StockSoftware,Unit,MenuPage};