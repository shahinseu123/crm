import Axios from "axios"

const state = {
    users: []
}

const getters = {
    getAllUsers: (state) => {
        return state.users
    }
}

const mutations = {
    getUsers: (state, payload) => {
        state.users = payload
    }
}

const actions = {
    getuser: (context) => {
        Axios.get('/api/user')
            .then(({ data }) => {
                // console.log(data)
                context.commit('getUsers', data)
            })
    }
}

export default { state, getters, mutations, actions }