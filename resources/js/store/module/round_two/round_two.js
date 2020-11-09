import Axios from "axios"

const state = {
    allRoundTwoDone: []
}

const getters = {
    getAllRoundTwo: (state) => {
        return state.allRoundTwoDone
    }
}

const mutations = {
    roundTwoMutations: (state, payload) => {
        state.allRoundTwoDone = payload
    }
}

const actions = {
    actionRoundTwo: (context) => {
        Axios.get('api/roundtwo')
            .then(({ data }) => {
                context.commit('roundTwoMutations', data)
            })
    }
}


export default { state, getters, mutations, actions }