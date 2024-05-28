import './bootstrap';

import Alpine from 'alpinejs';
import { createApp } from 'vue';
import App from './App.vue';

window.Alpine = Alpine;

Alpine.start();

createApp(App).mount('#app');
