import {createApp} from "vue";
import {createRouter, createWebHashHistory} from "vue-router";

import App from '@/App.vue';
import {routes} from "@/routes/routes";
import store from '@/store'

const router = createRouter({
    history: createWebHashHistory(),
    routes
});

const app = createApp(App).use(router).use(store).mount('#app')
