import Router from 'vue-router';
import Vue from 'vue';

Vue.use(Router);

import Index from "./views/Index";
import Feedback from "./views/Feedback";

const routes = [
    {
        path: "/",
        component: Index
    },
    {
        path: "/feedback/create",
        component: Feedback
    }
];

export default new Router({
    mode: "history",
    routes
});
