import VueRouter from 'vue-router'
import Vue from 'vue'

Vue.use(VueRouter)

import Home from '../components/Home'
import User from '../components/user/User'
import Leads from '../components/leads/Leads'
import AddLead from '../components/leads/AddLead'
import ShowLead from '../components/leads/ShowLead'
import Client from '../components/clients/Client'
import RoundOneComplete from '../components/oparations/RoundOneComplete'
import RoundTwoComplete from '../components/oparations/RoundTwoComplete'
import RoundThreeComplete from '../components/oparations/RoundThreeComplete'
import Setting from '../components/setting/Setting'
import Developer from '../components/Developer.vue'
import Activity from '../components/activity/Activity'
import EditClient from '../components/clients/EditClient'
import ShowClient from '../components/clients/ShowClient'
import ShowActivity from '../components/activity/ShowActivity'
import NotFound from '../components/NotFound'


const routes = [
    { path: '/home', name: 'Home', component: Home },
    { path: '/user', name: 'User', component: User },
    { path: '/leads', name: 'Leads', component: Leads },
    { path: '/clients', name: 'Client', component: Client },
    {
        path: '/editclient/lead_id', name: 'EditClient', component: EditClient, props: true,
        beforeEnter: (to, from, next) => {
            if (to.params.data) {
                next()
            } else {
                next('/clients')
            }
        }
    },
    { path: '/activity', name: 'Activity', component: Activity },
    { path: '/roundonecomplete', name: 'RoundOneComplete', component: RoundOneComplete },
    { path: '/roundtwocomplete', name: 'RoundTwoComplete', component: RoundTwoComplete },
    { path: '/roundthreecomplete', name: 'RoundThreeComplete', component: RoundThreeComplete },
    {
        path: '/addlead', name: 'AddLead', component: AddLead, props: true,
        beforeEnter: (to, from, next) => {
            let h = to.params.data
            if (h) {
                next()
            } else {
                next({ path: '/leads' })
            }
        }

    },
    { path: '/setting', name: 'Setting', component: Setting },
    { path: '/developer', name: 'Developer', component: Developer },
    {
        path: '/editlead/:lead_id', name: 'AddLead', component: AddLead, props: true,
        beforeEnter: (to, from, next) => {
            if (to.params.data) {
                next()
            } else {
                next('/leads')
            }
        }

    },
    {
        path: '/showlead/:lead_id', name: 'ShowLead', component: ShowLead, props: true,
        beforeEnter: (to, from, next) => {
            if (to.params.data) {
                next()
            } else {
                next('/leads')
            }
        }
    },
    {
        path: '/showclient/:lead_id', name: 'ShowClient', component: ShowClient, props: true,
        beforeEnter: (to, from, next) => {
            if (to.params.data) {
                next()
            } else {
                next('/clients')
            }
        }

    },
    {
        path: '/showactivity/:lead_id', name: 'ShowActivity', component: ShowActivity,
        beforeEnter: (to, from, next) => {
            if (to.params.data) {
                next()
            } else {
                next('/activity')
            }
        }
    },
    { path: '*', name: 'NotFound', component: NotFound },
]


const router = new VueRouter({
    mode: "history",
    base: process.env.BASE_URL,
    routes
});

// router.beforeEach((to, from, next) => {

//     if () {
//         next('/')
//     } else if () {
//         next()
//     } else {
//         next()
//     }
// })



export default router