import Axios from "axios"

const state = {
    allSetting: {}
}

const getters = {
    getSettings: (state) => {
        return state.allSetting
    }
}

const mutations = {
    settingsMutations: (state, payload) => {
        state.allSetting = payload
    }
}

const actions = {
    settingAction: (context) => {
        Axios.get('api/access')
            .then(({ data }) => {
                console.log(data)
                context.commit('settingsMutations', data)
            }).catch(err => console.log(err))
    },

}

export default { state, getters, mutations, actions }