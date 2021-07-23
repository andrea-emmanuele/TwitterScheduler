import { createStore } from "vuex";

export default createStore({
    state() {
        return {
            tweets: [],
            form: {
                message: '',
                publishedAt: '',
                userId: null
            },
            isLoading: false
        }
    },
    mutations: {
        setTweets(state, payload) {
            state.tweets = payload
        },
        addNewTweet(state, payload) {
            state.tweets.unshift(payload)
        },
        setUserID(state, value) {
            state.form.userId = value
        },
        setMessage(state, value) {
            state.form.message = value
        },
        clearMessage(state) {
            state.form.message = ''
        },
        setLoadingState(state, value = true) {
            state.isLoading = value
        }
    }
})
