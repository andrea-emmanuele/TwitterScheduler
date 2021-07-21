<template>
    <div class="p-4 flex border-b border-solid border-gray">
        <div class="relative w-12 h-12 rounded-full overflow-hidden" :class="{ avatar: !isLoading }">
            <a href="#" :class="{ 'pointer-events-none': isLoading}">
                <img :src="profile.avatar_path" :alt="profile.name" class="w-full h-full" :class="{ 'opacity-50':  isLoading }">
            </a>
        </div>
        <div class="ml-1 flex-1">
            <form @submit.prevent="submit">
                <Textarea @content="setValue" :contenteditable="!isLoading" :class="{ 'opacity-50': isLoading }" :placeholder="!isLoading && !$store.state.form.message ? 'What is happening?' : ''" />
                    <div class="flex">
                        <div v-show="!isLoading" class="actions flex items-center">
                            <div class="action relative w-10 h-10 rounded-full flex justify-center items-center overflow-hidden">
                                <input type="file" class="absolute top-0 w-full h-full opacity-0 cursor-pointer">
                                <svg viewBox="0 0 24 24" aria-hidden="true" class="relative text-blue fill-current w-5 h-5 z-20 pointer-events-none">
                                    <g>
                                        <path d="M19.75 2H4.25C3.01 2 2 3.01 2 4.25v15.5C2 20.99 3.01 22 4.25 22h15.5c1.24 0 2.25-1.01 2.25-2.25V4.25C22 3.01 20.99 2 19.75 2zM4.25 3.5h15.5c.413 0 .75.337.75.75v9.676l-3.858-3.858c-.14-.14-.33-.22-.53-.22h-.003c-.2 0-.393.08-.532.224l-4.317 4.384-1.813-1.806c-.14-.14-.33-.22-.53-.22-.193-.03-.395.08-.535.227L3.5 17.642V4.25c0-.413.337-.75.75-.75zm-.744 16.28l5.418-5.534 6.282 6.254H4.25c-.402 0-.727-.322-.744-.72zm16.244.72h-2.42l-5.007-4.987 3.792-3.85 4.385 4.384v3.703c0 .413-.337.75-.75.75z"></path>
                                        <circle cx="8.868" cy="8.309" r="1.542"></circle>
                                    </g>
                                </svg>
                            </div>
                            <div class="action relative w-10 h-10 rounded-full flex justify-center items-center overflow-hidden cursor-pointer">
                                <svg viewBox="0 0 24 24" aria-hidden="true" class="relative text-blue fill-current w-5 h-5 z-20 pointer-events-none">
                                    <g>
                                        <path d="M-37.9 18c-.1-.1-.1-.1-.1-.2.1 0 .1.1.1.2z"></path>
                                        <path d="M-37.9 18c-.1-.1-.1-.1-.1-.2.1 0 .1.1.1.2zM18 2.2h-1.3v-.3c0-.4-.3-.8-.8-.8-.4 0-.8.3-.8.8v.3H7.7v-.3c0-.4-.3-.8-.8-.8-.4 0-.8.3-.8.8v.3H4.8c-1.4 0-2.5 1.1-2.5 2.5v13.1c0 1.4 1.1 2.5 2.5 2.5h2.9c.4 0 .8-.3.8-.8 0-.4-.3-.8-.8-.8H4.8c-.6 0-1-.5-1-1V7.9c0-.3.4-.7 1-.7H18c.6 0 1 .4 1 .7v1.8c0 .4.3.8.8.8.4 0 .8-.3.8-.8v-5c-.1-1.4-1.2-2.5-2.6-2.5zm1 3.7c-.3-.1-.7-.2-1-.2H4.8c-.4 0-.7.1-1 .2V4.7c0-.6.5-1 1-1h1.3v.5c0 .4.3.8.8.8.4 0 .8-.3.8-.8v-.5h7.5v.5c0 .4.3.8.8.8.4 0 .8-.3.8-.8v-.5H18c.6 0 1 .5 1 1v1.2z"></path><path d="M15.5 10.4c-3.4 0-6.2 2.8-6.2 6.2 0 3.4 2.8 6.2 6.2 6.2 3.4 0 6.2-2.8 6.2-6.2 0-3.4-2.8-6.2-6.2-6.2zm0 11c-2.6 0-4.7-2.1-4.7-4.7s2.1-4.7 4.7-4.7 4.7 2.1 4.7 4.7c0 2.5-2.1 4.7-4.7 4.7z"></path>
                                        <path d="M18.9 18.7c-.1.2-.4.4-.6.4-.1 0-.3 0-.4-.1l-3.1-2v-3c0-.4.3-.8.8-.8.4 0 .8.3.8.8v2.2l2.4 1.5c.2.2.3.6.1 1z"></path>
                                    </g>
                                </svg>
                            </div>
                        </div>
                        <div class="flex items-center ml-auto">
                            <span v-show="$store.state.form.message && !isLoading">{{ remainingChars }}</span>
                            <div v-show="$store.state.form.message && !isLoading" class="h-8 border-r border-solid border-gray-100 mx-3"></div>
                            <button type="submit" class="text-white font-bold bg-blue py-2 px-4 rounded-full flex items-center" :disabled="!canSubmit">
                                <svg v-show="isLoading" class="animate-spin mr-2 h-5 w-5 text-white"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                            stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                          d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span>Tweet</span>
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
    <div class="bg-gray-50 h-2.5"></div>
</template>

<script>
import Textarea from "./Textarea";

const axios = require('axios')

export default {
    name: "TweetForm",
    components: { Textarea },
    props: {
        user: String
    },
    data() {
        return {
            profile: {},
            isLoading: false,
        }
    },
    computed: {
        remainingChars() {
            return 320 - this.$store.state.form.message.length
        },
        canSubmit() {
            return this.$store.state.form.message && this.remainingChars >= 0 && !this.isLoading
        }
    },
    created() {
        this.profile = JSON.parse(this.user)
        this.$store.commit('setUserID', this.profile.id)
    },
    methods: {
        async createTweet() {
            this.isLoading = true
            return await axios.post('/api/create-tweet', this.processText(this.$store.state.form))
        },
        setValue(value) {
            this.$store.commit('setMessage', value)
        },
        processText(payload) {
            const lineBreak = /(\r\n|\r|\n)/g

            payload.message = payload.message.replace(lineBreak, '<br>');
            return payload
        },
        submit() {
            console.log(this.processText(this.$store.state.form))
            this.createTweet()
                .then(response => {
                    this.isLoading = false

                    this.$store.commit('clearMessage')
                    this.$store.commit('addNewTweet', response.data[0])
            })
        }
    }
}
</script>

<style scoped lang="scss">
.avatar {
    transition: all 200ms ease-in-out;

    &:hover {
       filter: brightness(85%);
    }
}

.actions {
    .action {
        transition: background-color 200ms ease-in-out;

        &:hover {
            background: rgba(29, 161, 242, 0.1);
        }
    }
}

button[disabled] {
    opacity: 50%;
    cursor: default;
}
</style>
