import Axios from "axios"

const state = {
    allRoundThree: []
}

const getters = {
    getRoundThree: (state) => {
        return state.allRoundThree
    }
}

const mutations = {
    roundThreeMutations: (state, payload) => {
        state.allRoundThree = payload
    }
}

const actions = {
    roundThreeAction: (context) => {
        Axios.get('api/roundthree')
            .then(({ data }) => {
                context.commit('roundThreeMutations', data)
            })
            .catch(err => console.log(err))
    }
}


export default { state, getters, mutations, actions }