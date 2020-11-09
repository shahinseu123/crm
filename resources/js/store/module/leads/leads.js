const state = {
    leads: []
}

const getters = {
    getLeadsAll: (state) => {
        return state.leads
    }
}

const mutations = {
    getAllLeads: (state, payload) => {
        state.leads = payload
    }
}

const actions = {
    getLeads: (context) => {
        axios.get('api/leads')
            .then(({ data }) => {
                // console.log(data)
                context.commit('getAllLeads', data)
            })
            .catch(err => console.log(err))
    },
}

export default { state, getters, mutations, actions }