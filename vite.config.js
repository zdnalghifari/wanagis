import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'node_modules/ol/ol.css',
                'resources/js/main.js',
                'resources/css/style.css',
                'node_modules/ol-ext/dist/ol-ext.css',
            ],
            refresh: true,
        }),
    ],
});
