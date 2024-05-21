import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue(),
    ],
    server: {
        host: 'localhost',
        hmr: {
            host: 'localhost'
        },
        proxy: {
            '/api': 'http://localhost:8000',
       
            rewrite: (path) => path.replace(/^\/api/, '')
        }
    }
});
