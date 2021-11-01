require('./bootstrap');


import { createApp } from "vue";
import mitt from 'mitt';
const emitter = mitt();

// import Home from "./components/Home.vue";
import add_product from "./components/add-product.vue";
import bestsellers from "./components/bestsellers.vue";
import registration from "./components/registration.vue";
import header_nav from "./components/header-nav.vue";
import product from "./components/product.vue";
import user_profile from "./components/user-profile.vue";
import recently_added from "./components/recently-added.vue";
import tabs from "./components/tabs.vue";
import tab from "./components/tab.vue";
import search from "./components/search.vue";
import cart from "./components/cart.vue";
import slider from "./components/slider.vue";
import track_order from "./components/track-order.vue";
import cart_preview from "./components/cart-preview.vue";
import navigation from "./components/navigation.vue";



const app = createApp({
 	components: {
    	add_product, recently_added, tabs, tab, search, user_profile, slider, track_order, cart_preview, header_nav, product, bestsellers, registration, navigation, cart
  	}
});

app.config.globalProperties.emitter = emitter;


// Vue.component('products-list', require('./components/products.vue').default);
// Vue.component('registration', require('./components/registration.vue'));
// Vue.component('product', require('./components/product.vue').default);
// Vue.component('add-product', require('./components/add-product.vue').default);
// Vue.component('cart', require('./components/cart.vue').default);
// Vue.component('search', require('./components/search.vue').default);
// Vue.component('cart-preview', require('./components/cart-preview.vue').default);
// Vue.component('tabs', require('./components/tabs.vue').default);
// Vue.component('tab', require('./components/tab.vue').default);
// Vue.component('user-profile', require('./components/user-profile.vue').default);
// Vue.component('test', require('./components/test.vue').default);
// Vue.component('navigation', require('./components/navigation.vue').default);
// Vue.component('header-nav', require('./components/header-nav.vue').default);
// Vue.component('bestsellers', require('./components/bestsellers.vue').default);
// Vue.component('track-order', require('./components/track-order.vue').default);
// Vue.component('recently-added', require('./components/recently-added.vue').default);
// Vue.component('slider', require('./components/slider.vue').default);



// const app = Vue.createApp({
//     components: {
//         add_product, recently_added, tabs, tab, search, user_profile, slider, track_order, cart_preview, header_nav, product, bestsellers, registration
//      }
// });

app.mount("#app");