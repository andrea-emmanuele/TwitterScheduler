import LoginForm from "./components/LoginForm";
import TweetForm from "./components/TweetForm";

import { createApp } from 'vue'

const axios = require('axios')

const app = createApp({
    components: {
        LoginForm,
        TweetForm,
    },
    methods: {
        async logout() {
            const response = await axios.post('/logout')

            response.status === 200 ? window.location.replace('/login') : null
        }
    }
}).mount('#app')


