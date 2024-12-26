import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js','resources/js/translations/translation.js','resources/js/adminJs/*.js'],
            refresh: true,
        }),
    ],
});
