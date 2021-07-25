<template>
    <div class="text-white whitespace-nowrap w-min bg-blue py-2 px-4 rounded-md fixed inset-x-1/2 bottom-8 transform -translate-x-1/2 flex">
        {{ text }}
        <button class="font-bold text-white ml-3 hover:underline transition" @click="close">Close</button>
    </div>
</template>

<script>
export default {
    name: "Snackbar",
    props: {
        text: String,
        timeout: Number
    },
    mounted() {
        setTimeout(() => {
            this.close()
        }, this.timeout)
    },
    methods: {
        close() {
            this.$emit('closed')
        }
    }
}
</script>

<style scoped>

</style>
