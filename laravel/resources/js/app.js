import './bootstrap';

import Alpine from 'alpinejs';
import { createApp } from 'vue';
import App from './App.vue';
import router from './composable/router.js';

window.Alpine = Alpine;

Alpine.start();

const app = createApp(App);
app.use(router);
app.mount('#app');