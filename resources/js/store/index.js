import Vue from 'vue'
import Vuex from 'vuex'
import User from './module/user_store/user'
import Leads from './module/leads/leads'
import Clients from './module/clients/clients'
import RoundOne from './module/round_one/round_one'
import RoundTwo from './module/round_two/round_two'
import RoundThree from './module/round_three/round_three'
import Settings from './module/settings/Settings'
import Activity from './module/activity/activity'

Vue.use(Vuex)

const store = new Vuex.Store({

    modules: {
        User,
        Leads,
        Clients,
        RoundOne,
        RoundTwo,
        RoundThree,
        Settings,
        Activity
    }

})

export default store;
