/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import store from "./store/index"
import moment from 'moment'
import router from "./router/index"
import Swal from 'sweetalert2'

import Toastr from 'vue-toastr';

Vue.use(Toastr);

import { Form, HasError, AlertError } from 'vform'

window.Bus = new Vue()

window.swal = Swal;

window.Form = Form

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
import Gate from './Gate'
import Axios from "axios";

Vue.prototype.$gate = new Gate(window.user)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
Vue.filter('isleads', (value) => {
    if (value === 1) {
        return "Lead"
    } else {
        return "Client"
    }
})
Vue.filter('isactive', (value) => {
    if (value === 0) {
        return "Inactive"
    } else {
        return "Active"
    }
})

Vue.filter('momentTime', (time) => {
    return moment(time).format("MMM Do YY")
})

Vue.filter('ronedone', (value) => {
    if (value === 0) {
        return "Not done"
    } else {
        return "Done"
    }
})
Vue.filter('activityfilter', (value) => {
    if (value === 1) {
        return "Working"
    } else {
        return "Ready"
    }
})

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);
// import { mapGetters } from 'vuex'
const app = new Vue({
    el: '#app',
    router,
    store,
    data: {
        activity_ok: '',
        oparation_ok: '',
        setting_ok: '',
        lead_ok: '',
        client_ok: '',
        users_ok: '',
        // ------------------------------
        check_user_delete_ok: '',
        check_user_edit_ok: '',
        check_user_create_ok: '',
        check_lead_edit_ok: '',
        check_lead_delete_ok: '',
        check_lead_show_ok: '',
        check_lead_create_ok: '',
        check_lead_to_client_ok: '',
        check_active_to_inactive_ok: '',
        check_client_edit_ok: '',
        check_client_delete_ok: '',
        check_client_show_ok: '',
        check_client_adddoc_ok: '',
        check_activity_ready_to_work_ok: '',
        check_client_to_lead_ok: '',
        check_client_active_to_inactive_ok: '',
        check_r_one_done_not_done_ok: '',
        check_r_two_done_not_done_ok: '',
        check_r_three_done_not_done_ok: '',
        check_activity_show_ok: '',
        // ----------------------
        check_auth: false,
        current_route: '',

        accesses: {}
    },
    computed: {
        // ...mapGetters(['getSettings'])
    },
    methods: {
        currentRouteName() {
            this.current_route = this.$route.name;
        },
        divideAccess() {
            // this.deshboard_ok = this.accesses[0].check_dashboard
            if (this.accesses) {
                this.oparation_ok = this.accesses[0].check_oparation
                this.setting_ok = this.accesses[0].check_setting
                this.lead_ok = this.accesses[0].check_lead
                this.client_ok = this.accesses[0].check_client
                this.users_ok = this.accesses[0].check_users
                this.activity_ok = this.accesses[0].check_activity
                this.check_user_delete_ok = this.accesses[0].check_user_delete
                this.check_user_edit_ok = this.accesses[0].check_user_edit
                this.check_user_create_ok = this.accesses[0].check_user_create
                this.check_lead_delete_ok = this.accesses[0].check_lead_delete
                this.check_lead_show_ok = this.accesses[0].check_lead_show
                this.check_lead_create_ok = this.accesses[0].check_lead_create
                this.check_lead_to_client_ok = this.accesses[0].check_lead_to_client
                this.check_lead_edit_ok = this.accesses[0].check_lead_edit
                this.check_active_to_inactive_ok = this.accesses[0].check_active_to_inactive
                this.check_client_edit_ok = this.accesses[0].check_client_edit
                this.check_client_delete_ok = this.accesses[0].check_client_delete
                this.check_client_show_ok = this.accesses[0].check_client_show
                this.check_client_adddoc_ok = this.accesses[0].check_client_adddoc
                this.check_activity_ready_to_work_ok = this.accesses[0].check_activity_ready_to_work
                this.check_client_to_lead_ok = this.accesses[0].check_client_to_lead
                this.check_client_active_to_inactive_ok = this.accesses[0].check_client_active_to_inactive
                this.check_r_one_done_not_done_ok = this.accesses[0].check_r_one_done_not_done
                this.check_r_two_done_not_done_ok = this.accesses[0].check_r_two_done_not_done
                this.check_r_three_done_not_done_ok = this.accesses[0].check_r_three_done_not_done
                this.check_activity_working_ready_ok = this.accesses[0].check_activity_working_ready
                this.check_activity_show_ok = this.accesses[0].check_activity_show

            } else {
                "Not found"
            }
        }
    },
    computed: {

    },

    created() {
        this.currentRouteName()

        // setTimeout(() => {
        //     this.divideAccess()
        // }, 500)

        if (this.current_route) {
            Axios.get('api/access')
                .then(({ data }) => {
                    this.accesses = data
                    // console.log(data)
                    setTimeout(() => {
                        this.divideAccess()
                    }, 500)
                })
                .catch(err => console.log(err))
        }
    }

});
// export default this.accesses