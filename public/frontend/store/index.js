import {createStore} from "vuex";

export default createStore({
    state: {
        tokens: {
            accessToken: '',
            refreshToken: ''
        },
    },
    mutations: {
        setTokens(state, accessToken, refreshToken,) {
            state.tokens.accessToken = accessToken
            state.tokens.refreshToken = refreshToken
        },
        deleteTokens(state) {
            state.tokens.accessToken = ''
            state.tokens.refreshToken = ''
        }
    }
});
