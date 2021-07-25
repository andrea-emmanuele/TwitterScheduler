<template>
    <div v-show="$store.state.urlPath === name" class="w-full sm:w-container">
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
        console.log(this.$store.state.urlPath)
        this.$store.state.urlPath === this.name ? this.isActive = true : this.isActive = false
    },
    updated() {
        console.log(this.$store.state.urlPath)
        this.$store.state.urlPath === this.name ? this.isActive = true : this.isActive = false
    }
}
</script>

<style scoped>

</style>
