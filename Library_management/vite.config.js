import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js', 
                'resources/css/admin/dashboard.css', 
                'resources/css/login/login.css',
                'resources/css/admin/display.css'
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '@fortawesome': '/node_modules/@fortawesome', // Sử dụng đường dẫn tuyệt đối cho Font Awesome
        },
    },
});
