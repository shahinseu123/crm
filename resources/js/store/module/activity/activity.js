import Axios from "axios"

const state = {
    allActivity: []
}

const getters = {
    activityGetter: state => {
        return state.allActivity
    }
}

const mutations = {
    activityMutation: (state, payload) => {
        state.allActivity = payload
    }
}

const actions = {
    activityAction: context => {
        Axios.get('api/activity')
            .then(({ data }) => {
                context.commit('activityMutation', data)
            })
            .catch(err => console.log(err))
    }
}

export default { state, getters, mutations, actions }