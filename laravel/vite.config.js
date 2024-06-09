import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import { VitePWA } from "vite-plugin-pwa";

export default defineConfig({
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
            buildBase: '/build/',
            scope: '/',
            base: '/',
            registerType: "autoUpdate",
            includeAssets: [],
            devOptions: {
                enabled: false
            },
            manifest: {
                name: 'VDiscover',
                short_name: 'vdiscover',
                description: 'Sentiers culturels du canton de Vaud',
                theme_color: '#DE9918',
                background_color: '#DE9918',
                orientation: 'portrait',
                display: 'standalone',
                scope: '/',
                start_url: '/',
                id: '/',
            },
            workbox: {
                globPatterns: ["**/*.{js,css,html,png,jpg,jpeg,svg}"],
            },
        }),
    ],
});
