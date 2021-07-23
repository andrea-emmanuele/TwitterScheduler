<template>
    <div class="relative">
        <div
            ref="tweet-content"
            :contenteditable="!$store.state.isLoading"
            :data-placeholder="!$store.state.isLoading && !$store.state.form.message ? 'What is happening?' : ''"
            :class="{ 'opacity-50': $store.state.isLoading }"
            class="text-lg w-full p-0 pl-3 my-3 outline-none break-all overflow-y-auto placeholder"
            @input="returnValue"
        >
        </div>
        <div v-show="apiData.length" class="bg-white w-2/4 rounded mt-2 absolute top-full left-3 z-30 list-shadow">
            <ul v-if="hashtags.values">
                <li v-for="hashtag in apiData" :key="hashtag.id" class="font-bold py-4 px-4 border-b border-gray hover:bg-gray-50 transition cursor-pointer" v-text="hashtag.name"></li>
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
            apiData: [],
            hashtags: {
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
                        this.apiData = response.data
                        this.hashtags.failedRequestAt = 0
                    })
                    .catch(error => {
                        this.apiData = []
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
        returnValue() {
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
                this.hashtags.last.value = this.hashtags.values[this.hashtags.values.length - 1]

                if (this.hashtags.last.lastLength === this.hashtags.last.value.length) {
                    this.apiData = []
                    this.hashtags.failedRequestAt = 0
                }
            }
            else {
                this.apiData = []
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
        /*detectUrls(value) {
            if (event.key === " ") {
                console.log('space!')
            }
            console.log('a')
            const regex = /[(http(s)?):\/\/(www\.)?a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/ig

            value = value.replace(regex, "<span class='text-blue font-bold'>$&</span>")

            this.$refs["tweet-content"].append(value)

            const sel = window.getSelection();
            sel.collapse(this.$refs["tweet-content"], 1);
        }*/
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
