import { createRouter } from "vue-router";
import { createWebHistory } from "vue-router";

const routes = [
    {
        path: '/',
        component : ()=>import('./Pages/Home.vue')
    },
    {
        path : '/admin',
        component : ()=>import('./Pages/Index.vue')
    }
]
const router =createRouter({
    routes ,
    history : createWebHistory()
})
export default router 