<template>
    <div v-show="$store.state.urlPath === name" class="w-full h-full sm:w-container sm:h-auto">
        <slot></slot>
    </div>
</template>

<script>
export default {
    name: "Tab",
    props: {
        name: String
    },
    data() {
        return {
            isActive: false
        }
    },
    created() {
        this.$store.state.urlPath === this.name ? this.isActive = true : this.isActive = false
    },
    updated() {
        this.$store.state.urlPath === this.name ? this.isActive = true : this.isActive = false
    }
}
</script>

<style scoped>

</style>
