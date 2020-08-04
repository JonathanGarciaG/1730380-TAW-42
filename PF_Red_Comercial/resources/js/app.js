/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import * as VueGoogleMaps from 'vue2-google-maps'
 
Vue.use(VueGoogleMaps, {
  load: {
    key: 'AIzaSyBc_wz4sMOOGvERLu6E6jGM8hb_YlLr414',
    libraries: 'places', // This is required if you use the Autocomplete plugin
    // OR: libraries: 'places,drawing'
    // OR: libraries: 'places,drawing,visualization'
    // (as you require)
 
    //// If you want to set the version, you can do so:
    // v: '3.26',
  },
 
  //// If you intend to programmatically custom event listener code
  //// (e.g. `this.$refs.gmap.$on('zoom_changed', someFunc)`)
  //// instead of going through Vue templates (e.g. `<GmapMap @zoom_changed="someFunc">`)
  //// you might need to turn this on.
  // autobindAllEvents: false,
 
  //// If you want to manually install components, e.g.
  //// import {GmapMarker} from 'vue2-google-maps/src/components/marker'
  //// Vue.component('GmapMarker', GmapMarker)
  //// then disable the following:
  // installComponents: true,
})

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('map-component', require('./components/MapComponent.vue').default);
Vue.component('usuarios-component', require('./components/UsuariosComponent.vue').default);
Vue.component('empresas-component', require('./components/EmpresasComponent.vue').default);
Vue.component('productos-component', require('./components/ProductosComponent.vue').default);
Vue.component('productos-super-component', require('./components/ProductosSuperComponent.vue').default);
Vue.component('categorias-empresas-component', require('./components/CategoriasEmpresasComponent.vue').default);
Vue.component('categorias-productos-component', require('./components/CategoriasProductosComponent.vue').default);
Vue.component('ubicacion-component', require('./components/UbicacionComponent.vue').default);
Vue.component('micrositio-carousel-component', require('./components/MicrositioCarouselComponent.vue').default);
Vue.component('micrositio-productos-component', require('./components/MicrositioProductosComponent.vue').default);
Vue.component('imagenes-micrositio-component', require('./components/ImagenesSitioComponent.vue').default);
//Vue.component('login-component', require('./components/LoginComponent.vue').default);
//Vue.component('register-component', require('./components/RegisterComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
