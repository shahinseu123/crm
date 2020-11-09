import Axios from "axios"

const state = {
    allClients: []
}

const getters = {
    getClients: state => {
        return state.allClients
    }
}

const mutations = {
    mutateClient: (state, payload) => {
        state.allClients = payload
    }
}

const actions = {
    actionClient: (context) => {
        Axios.get('api/clients')
            .then(({ data }) => {
                context.commit('mutateClient', data)
            })
    }
}

export default { state, getters, mutations, actions }