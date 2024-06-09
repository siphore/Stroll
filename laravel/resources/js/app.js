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

let deferredPrompt;

window.addEventListener("beforeinstallprompt", (e) => {
    // Prevent the mini-infobar from appearing on mobile
    e.preventDefault();
    // Stash the event so it can be triggered later.
    deferredPrompt = e;
    // Update UI to notify the user they can add to home screen
    showInstallPromotion();
});

function showInstallPromotion() {
    const installButton = document.getElementById("installButton");
    installButton.style.display = "block";

    installButton.addEventListener("click", (e) => {
        // Hide the install promotion
        installButton.style.display = "none";
        // Show the install prompt
        deferredPrompt.prompt();
        // Wait for the user to respond to the prompt
        deferredPrompt.userChoice.then((choiceResult) => {
            if (choiceResult.outcome === "accepted") {
                console.log("User accepted the A2HS prompt");
            } else {
                console.log("User dismissed the A2HS prompt");
            }
            deferredPrompt = null;
        });
    });
}

createApp(App).mount("#app");
