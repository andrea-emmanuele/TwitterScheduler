<template>
    <div class="text-white whitespace-nowrap w-full sm:w-min bg-blue py-4 px-4 sm:rounded-md fixed left-0 bottom-0 sm:py-2 sm:px-4 sm:bottom-8 sm:inset-x-1/2 sm:transform sm:-translate-x-1/2 z-50 flex">
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
