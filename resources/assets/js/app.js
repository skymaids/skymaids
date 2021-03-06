
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('passport-clients', require('./components/passport/Clients.vue'));
Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue'));
Vue.component('passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue'));

/**
 * Instancia os módulos
 */
Vue.component('page-schedule', require('./modules/Schedule/Page.vue'));
Vue.component('page-stock-categories', require('./modules/Stock/Categories/Page.vue'));
Vue.component('page-stock-products', require('./modules/Stock/Products/Page.vue'));
Vue.component('page-stock-softwares', require('./modules/Stock/Softwares/Page.vue'));

const app = new Vue({
    el: '#app'
});
