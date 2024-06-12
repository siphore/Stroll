import "./bootstrap";

import Alpine from "alpinejs";
import { createApp } from "vue";
import App from "./App.vue";
import { usePwa } from './composable/usePwa'
const { createPwa } = usePwa()
createPwa();

window.Alpine = Alpine;

Alpine.start();

createApp(App).mount("#app");
