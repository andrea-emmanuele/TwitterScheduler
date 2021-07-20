<template>
    <form @submit.prevent="submit">
        <input type="text" v-model="form.email">
        <input type="password" v-model="form.password">
        <input type="submit">
    </form>
</template>

<script>
const axios = require('axios')

export default {
    name: "LoginForm",
    props: {
        credentials: Object
    },
    data() {
        return {
            form: {
                email: '',
                password: '',
            }
        }
    },
    created() {
      this.form.email = this.credentials.email
      this.form.password = this.credentials.password
    },
    methods: {
        async submit() {
            const response = await axios.post('/login', this.form)

            response.status === 200 ? window.location.replace('/') : null
        }
    }
}
</script>

<style scoped>

</style>
