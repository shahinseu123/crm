const state = {
    allRoundOne: []
}

const getters = {
    getRoundOne: state => {
        return state.allRoundOne
    }
}

const mutations = {
    roundOneMutations: (state, payload) => {
        state.allRoundOne = payload
    }
}

const actions = {
    round_oneActions: context => {
        axios.get('api/roundone')
            .then(({ data }) => {
                // console.log(data)
                context.commit('roundOneMutations', data)
            })
            .catch(err => console.log(err))
    }
}


export default { state, getters, mutations, actions }