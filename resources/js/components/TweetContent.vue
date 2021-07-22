<template>
    <div
        ref="tweet-content"
        class="text-lg w-full p-0 pl-3 my-3 outline-none break-all overflow-y-auto placeholder"
        :data-placeholder="placeholder"
        @input="returnValue"
    >
    </div>
</template>

<script>
export default {
    name: "TweetContent",
    props: {
      placeholder: String
    },
    watch: {
        '$store.state.form.message'() {
            if (!this.$store.state.form.message) {
                this.$refs["tweet-content"].innerHTML = ''
                this.$refs["tweet-content"].style.height = 'initial'
            }
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
            /*this.detectUrls(value)*/
            this.showPlaceholder(tweetContent, innerText)
            this.resize()

            this.$emit('content', innerText)
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
        detectUrls(value) {
            if (event.key === " ") {
                console.log('space!')
            }
            console.log('a')
            const regex = /[(http(s)?):\/\/(www\.)?a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/ig

            value = value.replace(regex, "<span class='text-blue font-bold'>$&</span>")

            this.$refs["tweet-content"].append(value)

            const sel = window.getSelection();
            sel.collapse(this.$refs["tweet-content"], 1);
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
</style>
