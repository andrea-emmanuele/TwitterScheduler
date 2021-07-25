<template>
    <div v-show="!$store.state.scheduledTweets.length" class="h-36 flex flex-col justify-center items-center">
        <h2 class="text-xl font-bold text-black mb-2">Non hai Tweet programmati</h2>
        <p class="text-gray-500">Quando ne avrai, li troverai qui.</p>
    </div>
    <scheduled-tweet v-for="scheduledTweet in $store.state.scheduledTweets" :payload="scheduledTweet" />
</template>

<script>
import ScheduledTweet from "./ScheduledTweet";
const axios = require('axios')

export default {
    name: "ScheduledTweets",
    components: { ScheduledTweet },
    props: {
        user: Number
    },
    created() {
        this.getTweets()
            .then((response) => {
                this.$store.commit('setScheduledTweets', response.data)
            })
    },
    methods: {
        async getTweets() {
            return await axios.get('/api/scheduled-tweets', {
                params: {
                    'user': this.user
                }
            })
        }
    }
}
</script>

<style scoped>

</style>

