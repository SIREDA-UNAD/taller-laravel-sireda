import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    // Si no utlizas Docker, puedes cambiar por localhost o ::1
    server: {
        host: '0.0.0.0'
    }
});
