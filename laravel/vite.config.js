import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import { VitePWA } from "vite-plugin-pwa";

export default () => {
    const manifestIcons = [
        {
            src: "/LogoBig.png",
            sizes: "256x256",
            type: "image/png",
            purpose: "any",
        },
        {
            src: "/LogoBig.png",
            sizes: "512x512",
            type: "image/png",
            purpose: "any",
        },
    ];

    return defineConfig({
        plugins: [
            laravel({
                input: ["resources/css/app.css", "resources/js/app.js"],
                refresh: true,
            }),
            vue({
                template: {
                    transformAssetUrls: {
                        base: null,
                        includeAbsolute: false,
                    },
                },
            }),
            VitePWA({
                buildBase: "/build/",
                scope: "/",
                base: "/",
                registerType: "autoUpdate",
                includeAssets: [],
                devOptions: {
                    enabled: false,
                },
                manifest: {
                    name: "VDiscover",
                    short_name: "vdiscover",
                    description: "Sentiers culturels du canton de Vaud",
                    theme_color: "#A1C9BB",
                    background_color: "#254A3D",
                    orientation: "portrait",
                    display: "standalone",
                    scope: "/",
                    start_url: "/",
                    id: "/",
                    icons: [...manifestIcons],
                },
                workbox: {
                    globPatterns: ["**/*.{js,css,html,png,jpg,jpeg,svg}"],
                },
            }),
        ],
    });
};
