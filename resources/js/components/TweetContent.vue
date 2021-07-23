<template>
    <div class="relative">
        <div
            ref="tweet-content"
            :contenteditable="!$store.state.isLoading"
            :data-placeholder="!$store.state.isLoading && !$store.state.form.message ? 'What is happening?' : ''"
            :class="{ 'opacity-50': $store.state.isLoading }"
            class="text-lg w-full p-0 pl-3 my-3 outline-none break-all overflow-y-auto placeholder"
            @input="returnValue($event)"
        >
        </div>
        <div v-show="hashtags.data.length" class="bg-white w-2/4 rounded mt-2 absolute top-full left-3 z-30 list-shadow">
            <ul>
                <li v-for="hashtag in hashtags.data" :key="hashtag.id" class="font-bold py-4 px-4 border-b border-gray hover:bg-gray-50 transition cursor-pointer" v-text="hashtag.name"></li>
            </ul>
        </div>
    </div>
</template>

<script>
const axios = require('axios')

export default {
    name: "TweetContent",
    props: {
      placeholder: String
    },
    data() {
        return {
            hashtags: {
                data: [],
                values: [],
                last: {
                    value: '',
                    lastLength: 0
                },
                failedRequestAt: 0
            }
        }
    },
    watch: {
        '$store.state.form.message'() {
            if (!this.$store.state.form.message) {
                this.$refs["tweet-content"].innerHTML = ''
                this.$refs["tweet-content"].style.height = 'initial'
            }
        },
        'hashtags.last.value.length'() {
            if (this.hashtags.values) {
                if (this.hashtags.last.value.length < this.hashtags.failedRequestAt || this.hashtags.failedRequestAt === 0) {
                    this.getExistingHashtags().then(response => {
                        this.hashtags.data = response.data
                        this.hashtags.failedRequestAt = 0
                    })
                    .catch(error => {
                        this.hashtags.data = []
                        this.hashtags.failedRequestAt = this.hashtags.last.value.length
                    })
                }
            }
            else {
                this.hashtags.failedRequestAt = 0
            }

            this.hashtags.last.lastLength = this.hashtags.last.value.length
        }
    },
    methods: {
        returnValue(event) {
            let tweetContent = this.$refs["tweet-content"]
            let { innerText } = tweetContent

            if (innerText === '\n') {
                innerText = ''
            }

            /*value = value.replace(/^\s+|\s+$/g, '');*/

            this.showPlaceholder(tweetContent, innerText)
            this.resize()
            this.findHashtags(innerText)

            this.$store.commit('setMessage', innerText)
        },
        showPlaceholder(tweetContent, value) {
            value ? tweetContent.classList.remove('placeholder') : tweetContent.classList.add('placeholder')
        },
        resize() {
            const textarea = this.$refs["tweet-content"]

            if (textarea.scrollHeight < 300) {
                textarea.style.height = 'initial'
                textarea.style.height = `${textarea.scrollHeight}px`
            }
        },
        findHashtags(value) {
            const hash = /\B(\#[a-zA-Z\d]+\b)(?![$-/:-?{-~!"^_`\[\]])/g

            this.hashtags.values = value.match(hash)

            if (this.hashtags.values) {

                if (this.hashtags.values[this.hashtags.values.length - 1].length === this.hashtags.last.lastLength) {
                    this.hashtags.data = []
                }

                this.hashtags.last.value = this.hashtags.values[this.hashtags.values.length - 1]
            }
            else {
                this.hashtags.data = []
                this.hashtags.last.value = ''
            }
        },
        async getExistingHashtags() {
            return await axios.get('/api/hashtags', {
                params: {
                    'name': this.hashtags.values[this.hashtags.values.length - 1]
                }
            })
        }
    }
}
</script>

<style lang="scss" scoped>
    .placeholder {
        &:before {
            position: absolute;
            content:attr(data-placeholder);
            opacity: 0.7;
            pointer-events: none;
        }
    }
    .list-shadow {
        box-shadow: rgba(101, 119, 134, 0.2) 0px 0px 15px, rgba(101, 119, 134, 0.15) 0px 0px 3px 1px
    }
</style>
