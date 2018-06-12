require('./bootstrap');

window.Vue = require('vue');
import Vuetify from 'vuetify';
Vue.use(Vuetify);

const Vuex = require('vuex');

window.store = new Vuex.Store({
	state: {
      productsCount: 0
	},
	mutations: {
		decrement(state){
		  return state.productsCount--	
		},
		increment(state){
		  return state.productsCount++	
		},
		set(state, value){
			return state.productsCount = value
		}
	}
});

/* CMS */
Vue.component('login-form', require('./components/cms/Login.vue'));	
Vue.component('cms-home-page', require('./components/cms/Home.vue'));
Vue.component('cms-side-bar', require('./components/cms/SideBar.vue'));	

Vue.component('product-form', require('./components/cms/products/Form.vue'));	
Vue.component('product-catalog', require('./components/cms/products/List.vue'));	
/* CMS */

Vue.component('input-file-image', require('./components/media/InputFileImage.vue'));

Vue.component('sweet-alert', require('./components/sweetAlert.vue'));
Vue.component('product-list', require('./components/products/ProductList.vue'));

Vue.component('add-product-btn', require('./components/products/AddToCartComponent.vue'));
Vue.component('products-counter', require('./components/shopping_cart/CounterComponent.vue'));
Vue.component('cart-products-list', require('./components/shopping_cart/ProductList.vue'));

Vue.component('product-card', require('./components/products/ProductCard.vue'));
Vue.component('material-transition-group', require('./components/animations/MaterialCollection.vue'));

window.onload = function () {
    const app = new Vue({
	    el: '#app'/*,
	  	router*/
	});
}