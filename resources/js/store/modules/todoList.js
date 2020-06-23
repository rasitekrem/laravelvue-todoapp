import axios from "axios";

const state = {
    tasks: {}
};

const getters = {
    getTasks(state) {
        return state.tasks;
    }
};
const actions = {
    getTasks ({ commit }) {
        axios.get("/api/user/tasks")
        .then( response => {
            commit('setTasks', response.data );
        });
    },
    loginUser( {}, user ) {
        axios.post("/api/user/login", {
            email: user.email,
            password: user.password
        })
        .then( response => {
            if (response.data.access_token) {
                // Giriş başarılı ise dönen token değerini local storage tarafında kaydediyoruz.
                localStorage.setItem(
                    "todoapp_token",
                    response.data.access_token
                );

                window.location.replace("/");
            }
        });
    },
    logoutUser() {
        localStorage.removeItem("todoapp_token");

        window.location.replace("/login");
    }
};
const mutations = {
    setTasks( state, data ) {
        state.tasks = data;
        console.log(data);
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}