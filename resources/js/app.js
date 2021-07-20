import LoginForm from "./components/LoginForm";

import { createApp } from 'vue'

const axios = require('axios')

const app = createApp({
    components: {
        LoginForm
    },
    methods: {
        async logout() {
            const response = await axios.post('/logout')

            response.status === 200 ? window.location.replace('/login') : null
        }
    }
}).mount('#app')


