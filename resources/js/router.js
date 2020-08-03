import Vue from 'vue'
import VueRouter from 'vue-router'
import store from './store.js'

Vue.use(VueRouter)

import Navigation from './components/Base/Navigation.vue'
import Login from '../views/pages/Signin.vue'
import Home from '../views/pages/Home.vue'
import Accounts from '../views/pages/Accounts.vue'
import Companies from '../views/pages/Companies.vue'
import Departments from '../views/pages/Departments.vue'
import Sections from '../views/pages/Sections.vue'
import Teams from '../views/pages/Teams.vue'
import Employees from '../views/pages/Employees.vue'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            redirect: '/signin'
        },
        {
            path: '/signin',
            component: Login,
        },
        {
            path: '/home',
            name: 'home',
            meta: {
                requiresAuth: true
            },
            components: {
                default: Home,
                nav: Navigation
            }
        },
        {
            path: '/employees',
            name: 'employees',
            meta: {
                requiresAuth: true
            },
            components: {
                default: Employees,
                nav: Navigation
            }
        },
        {
            path: '/teams',
            name: 'teams',
            meta: {
                requiresAuth: true
            },
            components: {
                default: Teams,
                nav: Navigation
            }
        },
        {
            path: '/sections',
            name: 'sections',
            meta: {
                requiresAuth: true
            },
            components: {
                default: Sections,
                nav: Navigation
            }
        },
        {
            path: '/departments',
            name: 'departments',
            meta: {
                requiresAuth: true
            },
            components: {
                default: Departments,
                nav: Navigation
            }
        },
        {
            path: '/companies',
            name: 'companies',
            meta: {
                requiresAuth: true
            },
            components: {
                default: Companies,
                nav: Navigation
            }
        },
        {
            path: '/accounts',
            name: 'accounts',
            meta: {
                requiresAuth: true
            },
            components: {
                default: Accounts,
                nav: Navigation
            }
        },
    ],
});


router.beforeEach((to, from, next) => {
    if(to.meta.requiresAuth) {
        if (store.state.token != 'TRUE') {
            next('/signin') 
        }
        next() 
    } else {
            next() 
        }
    })

export default router


