import { createRouter, createWebHistory } from "vue-router";

import contatoIndex from "../components/contatos/index.vue";
import contatoNew from "../components/contatos/new.vue";
import contatoEdit from "../components/contatos/edit.vue";

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
        path: '/contato/edit/:id',
        component: contatoEdit,
        props: true
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