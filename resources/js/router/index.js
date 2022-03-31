import { createRouter, createWebHistory } from "vue-router";

import contatoIndex from "../components/contatos/index.vue";
import contatoNew from "../components/contatos/new.vue";

import notFound from "../components/notFound.vue";

const routes = [
    {
        path: '/',
        component: contatoIndex
    },
    {
        path: '/contato/new',
        component: contatoNew
    },
    {
        path: '/:pathMatch(.*)*',
        component: notFound
    }
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
});

export default router;