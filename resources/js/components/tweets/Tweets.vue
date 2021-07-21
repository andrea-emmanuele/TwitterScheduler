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
    <tweet v-for="tweet in $store.state.tweets" :key="tweet.id" :payload="tweet" />
</template>

<script>
import Tweet from "./Tweet";
const axios = require('axios')

export default {
    name: "Tweets",
    components: { Tweet },
    props: {
        user: String
    },
    data() {
        return {
            isLoading: false
        }
    },
    created() {
        this.getTweets()
            .then((response) => {
                this.isLoading = false

                this.$store.commit('setTweets', response.data)
            })
    },
    methods: {
        async getTweets() {
            this.isLoading = true

            return await axios.get('/api/tweets', {
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
