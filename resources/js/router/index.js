import { createRouter, createWebHistory } from "vue-router";

import TodosIndex from '../components/todos/Todo'

const routes= [
    {
        path:'/',
        name:'todos',
        component:TodosIndex
    }
]

export default createRouter({
    history:createWebHistory(),
    routes
})