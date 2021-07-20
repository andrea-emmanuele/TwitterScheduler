import LoginForm from "./components/LoginForm";
import TweetForm from "./components/TweetForm";
import Tweets from "./components/tweets/Tweets";

import { createApp } from 'vue'

const axios = require('axios')

const app = createApp({
    components: {
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
}).mount('#app')


