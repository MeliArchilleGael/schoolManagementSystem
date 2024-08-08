import './bootstrap';
import '../css/app.css';

import {createApp, h, DefineComponent} from 'vue';
import {createInertiaApp} from '@inertiajs/vue3';
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';
import {ZiggyVue} from '../../vendor/tightenco/ziggy';

const appName: string = "SchoolWise";

// pinia store
import {createPinia} from 'pinia';

const pinia = createPinia();


//init the app
import appSetting from '@/app-setting';

// router

//i18
import i18n from '@/i18n';

// tippy tooltips
import {TippyPlugin} from 'tippy.vue';

//input mask
import Maska from 'maska';

//markdown editor
import VueEasymde from "vue3-easymde";
import 'easymde/dist/easymde.min.css';

// popper
import Popper from 'vue3-popper';

// json to excel
import vue3JsonExcel from 'vue3-json-excel';

import {Link} from "@inertiajs/vue3";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob<DefineComponent>('./Pages/**/*.vue')),
    setup({el, App, props, plugin}) {
        createApp({render: () => h(App, props)})
            .use(plugin)
            .use(pinia)
            .use(i18n)
            .use(TippyPlugin)
            .use(Maska)
            .use(VueEasymde)
            .use(vue3JsonExcel)
            .use(ZiggyVue)
            .component('Popper', Popper)
            .component('InertiaLink', Link)
            .mount(el);
    },


    progress: {
        color: '#066cfb',
    },
}).then(r => appSetting.init());


