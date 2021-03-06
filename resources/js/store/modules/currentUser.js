import axios from "axios";

const state = {
    user: {}
};

const getters = {
    getUser(state) {
        return state.user;
    }
};
const actions = {
    getUser ({ commit }) {
        axios.get("/api/user/current")
        .then( response => {
            commit('setUser', response.data );
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
    setUser( state, data ) {
        state.user = data;
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}