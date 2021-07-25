<template>
    <div v-show="isLoading" class="flex justify-center py-3">
        <svg class="animate-spin mr-2 h-7 w-7 text-blue"
             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                    stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor"
                  d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
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

