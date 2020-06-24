import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import TodoList from "../components/todolist/container";

const routes = [
    {
        component: TodoList,
        name: "home",
        path: "/:filter",
        props: true
    }
];

export default new VueRouter({
    mode: "history",
    routes
});