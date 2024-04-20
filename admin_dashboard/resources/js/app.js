import * as Vue from 'vue';
import { createApp } from 'vue';
import VueRouter from 'vue-router';
import addProductStore from './components/addProductStore.vue';

Vue.use(VueRouter);

const app = createApp({});
app.component('add-product-store', addProductStore);

const router = new VueRouter({
  mode: 'history', // Usa la historia para rutas limpias
  routes: [
    { path: '/addProductStore', component: addProductStore },
    { path: '/addProductTechnology', component: addProductTechnology },
  ],
});

app.use(router);

app.mount('#app');
