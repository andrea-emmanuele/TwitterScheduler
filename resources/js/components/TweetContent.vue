<template>
    <div class="relative">
        <div
            ref="tweet-content"
            :contenteditable="!$store.state.isLoading"
            :data-placeholder="!$store.state.isLoading && !$store.state.form.message ? 'Che c\'è di nuovo?' : ''"
            :class="{ 'opacity-50': $store.state.isLoading }"
            class="text-lg w-full p-0 pl-3 my-3 outline-none break-all overflow-y-auto placeholder"
            @input="returnValue($event)"
        >
        </div>
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
            // Se il messaggio è vuoto, svuota del tutto e setta l'altezza iniziale del div
            if (!this.$store.state.form.message) {
                this.$refs["tweet-content"].innerHTML = ''
                this.$refs["tweet-content"].style.height = 'initial'
            }
        },
    },
    methods: {
        // mostra o nasconde il testo di placeholder
        showPlaceholder(tweetContent, value) {
            value ? tweetContent.classList.remove('placeholder') : tweetContent.classList.add('placeholder')
        },
        // Aumenta l'altezza del div in base al numero di righe di testo inserite
        resize() {
            const textarea = this.$refs["tweet-content"]

            if (textarea.scrollHeight < 300) {
                textarea.style.height = 'initial'
                textarea.style.height = `${textarea.scrollHeight}px`
            }
        },
        returnValue() {
            let tweetContent = this.$refs["tweet-content"]
            let { innerText } = tweetContent

            if (innerText === '\n') {
                innerText = ''
            }

            this.showPlaceholder(tweetContent, innerText)
            this.resize()

            this.$store.commit('setMessage', innerText) // Setta il messaggio nel global storage
        },
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
