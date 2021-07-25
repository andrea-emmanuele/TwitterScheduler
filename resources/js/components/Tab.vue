<template>
    <div v-show="isActive" class="w-full sm:w-container">
        <slot></slot>
    </div>
</template>

<script>
export default {
    name: "Tab",
    props: {
        name: String,
        selected: {
            Boolean,
            required: true
        }
    },
    data() {
        return {
            isActive: false
        }
    },
    created() {
        this.selected === this.name ? this.isActive = true : this.isActive = false
    }
}
</script>

<style scoped>

</style>
