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
    methods: {
        returnValue() {
            let value = this.$refs["tweet-message"].innerText

            value = value.replace(/\r?\n|\r/g, "");

            this.showPlaceholder(value)

            this.$emit('content', value)
        },
        showPlaceholder(value) {
            let textarea = this.$refs["tweet-message"]

            value ? textarea.classList.remove('placeholder') : textarea.classList.add('placeholder')
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
