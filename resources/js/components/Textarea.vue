<template>
    <div
        ref="tweet-message"
        class="text-lg w-full p-0 pl-3 my-3 outline-none break-all overflow-y-auto placeholder"
        :data-placeholder="placeholder"
        @input="returnValue"
    >
    </div>
</template>

<script>
export default {
    name: "Textarea",
    props: {
      placeholder: String
    },
    watch: {
        '$store.state.form.message'() {
            !this.$store.state.form.message ? this.$refs["tweet-message"].innerHTML = '' : null
        }
    },
    methods: {
        returnValue() {
            let value = this.$refs["tweet-message"].innerText

            value = value.replace(/\r?\n|\r/g, "");

            this.showPlaceholder(value)
            this.resize()

            this.$emit('content', value)
        },
        showPlaceholder(value) {
            let textarea = this.$refs["tweet-message"]

            value ? textarea.classList.remove('placeholder') : textarea.classList.add('placeholder')
        },
        resize() {
            const textarea = this.$refs["tweet-message"]

            if (textarea.scrollHeight < 300) {
                textarea.style.height = 'initial'
                textarea.style.height = `${textarea.scrollHeight}px`
            }
        },
        /*detectUrls(value) {
            const regex = /[(http(s)?):\/\/(www\.)?a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/ig

            value = value.replace(regex, "<span class='text-blue font-bold'>$&</span>")

            if (!this.spacePressed) {
                this.spacePressed = false
                this.$refs["tweet-message"].innerHTML = value

                const sel = window.getSelection();
                sel.collapse(this.$refs["tweet-message"], 1);
            }
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
</style>
