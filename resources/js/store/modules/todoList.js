import axios from "axios";

const state = {
    tasks: {},
    filter: "all",
    title: ""
};

const getters = {
    getTitle(state) {
        return state.title;
    },
    getTasks(state) {
        if (state.filter == 'all') {
            return state.tasks
        } else if (state.filter == 'active') {
            return state.tasks.filter(task => !task.completed)
        } else if (state.filter == 'completed') {
            return state.tasks.filter(task => task.completed)
        }
        return state.tasks
    },
    getRoute (state)
    {
        return state.path;
    },
    getFilter (state) 
    {
        return state.filter;
    }
};
const actions = {
    getTasks ({ commit }) {
        axios.get("/api/user/tasks",{ path: this.getPath })
        .then( response => {
            commit('setTasks', response.data );
        });
    },
    setTask( { commit, state } ) {
        axios.post("/api/user/tasks", {
            title : state.title
        })
        .then( response => {
            commit('setTask',response.data);
            commit('setTitle','');
        });
    },
    updateTask({ dispatch, commit },task) {
        axios.patch('/api/user/tasks/' + task.id, {
            title: task.title,
            completed: task.completed,
          })
        .then( response => {
            return dispatch('getTasks');
        });
    },
    checkAll({ dispatch }) {
        axios.patch('/api/user/tasksCheckAll')
        .then( response => {
            return dispatch('getTasks');
        });
    },
    deleteTask({ dispatch, commit },task) {
        axios.delete('/api/user/tasks/' + task.id)
        .then( response => {
            return dispatch('getTasks');
        });
    },
    destroyCompleted({ dispatch },task) {
        axios.delete('/api/user/tasksDestroyCompleted')
        .then( response => {
            return dispatch('getTasks');
        });
    },
    updateFilter({ commit }, filter) {
        commit('updateFilter', filter)
    },
};
const mutations = {
    setTitle( state, title ) {
        state.title = title;
    },
    setTasks( state, data ) {
        state.tasks = data;
    },
    setRoute (state,path)
    {
        state.path = path;
    },
    setTask( state, task )
    {
        state.tasks.push(task)
    },
    updateFilter(state, filter) {
        state.filter = filter
    },
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}