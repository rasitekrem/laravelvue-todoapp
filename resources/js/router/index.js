import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import TodoList from "../components/todolist/container";
import MadeList from "../components/madelist/container";

const routes = [
    {
        component: TodoList,
        name: "todolist",
        path: "/todolist"
    },
    {
        component: MadeList,
        name: "madelist",
        path: "/madelist"
    }
];

export default new VueRouter({
    routes
});