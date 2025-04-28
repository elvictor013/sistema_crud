import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: '0.0.0.0', // aceita conexões externas (não só localhost)
        port: 5174, // pode ser outra se quiser
        hmr: {
            host: 'localhost', // ou o IP do seu computador
            protocol: 'ws', // websocket
        },
    },
    plugins: [
        laravel({
            input: ['resources/sass/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
