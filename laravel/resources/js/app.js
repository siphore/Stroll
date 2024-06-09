import "./bootstrap";

import Alpine from "alpinejs";
import { createApp } from "vue";
import App from "./App.vue";

window.Alpine = Alpine;

Alpine.start();

if ("serviceWorker" in navigator) {
    window.addEventListener("load", () => {
        navigator.serviceWorker
            .register("/service-worker.js", { scope: "/" })
            .then((registration) => {
                console.log(
                    "ServiceWorker registration successful with scope: ",
                    registration.scope
                );
            })
            .catch((error) => {
                console.error("ServiceWorker registration failed:", error);
            });
    });
}

// navigator.serviceWorker.register(new URL("worker.js", import.meta.url));

createApp(App).mount("#app");
