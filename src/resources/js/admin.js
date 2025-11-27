import '../css/app.css';
import './bootstrap';

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import ElementPlus from 'element-plus';
import { createYmaps } from 'vue-yandex-maps';

import 'element-plus/dist/index.css';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';
const apikey = import.meta.env.VITE_YANDEX_MAP;

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Admin/Pages/${name}.vue`,
            import.meta.glob('./Admin/Pages/**/*.vue'),
        ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(ElementPlus)
            .use(createYmaps({
              apikey: apikey,
            }))
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
