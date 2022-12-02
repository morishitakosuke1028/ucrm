import './bootstrap';
import './micromodal';
import '../css/app.css';
import '../css/micromodal.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

// window.Vue = require('vue');

import '@fortawesome/fontawesome-free/js/all.js';
import 'bootstrap-table/dist/bootstrap-table.min.css';
import 'bootstrap-table/dist/bootstrap-table.js';

// import 'tableexport.jquery.plugin';
// import 'bootstrap-table/dist/extensions/export/bootstrap-table-export.min.js';
// import 'bootstrap-table/dist/extensions/print/bootstrap-table-print.min.js';

import 'bootstrap-table/dist/extensions/filter-control/bootstrap-table-filter-control.min.css';
import 'bootstrap-table/dist/extensions/filter-control/bootstrap-table-filter-control.min.js';

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('BootstrapTableComponent', require('./components/BootstrapTableComponent.vue').default);

// const app = new Vue({
//     el: '#app',
// });

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
