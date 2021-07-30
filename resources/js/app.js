import { createApp } from 'vue'
import store from './store'
import LoginForm from "./components/LoginForm";
import TweetForm from "./components/TweetForm";
import Tweets from "./components/tweets/Tweets";
import LoadingView from "./components/LoadingView";

const axios = require('axios')

const app = createApp({
    components: {
        LoadingView,
        LoginForm,
        TweetForm,
        Tweets
    },
    methods: {
        async logout() {
            const response = await axios.post('/logout')

            response.status === 200 ? window.location.replace('/login') : null
        }
    }
}).use(store).mount('#app')


