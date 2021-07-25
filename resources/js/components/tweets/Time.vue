<template>
    <transition name="slide-fade" mode="out-in">
        <span :key="current" class="opacity-50">· {{ current }}</span>
    </transition>
</template>

<script>
export default {
    name: "Time",
    props: {
        publishedAt: String
    },
    data() {
        return {
            current: 0
        }
    },
    created() {
        this.current = this.calc()
        this.update()
    },
    methods: {
        calc() {
            const today = new Date()
            const tweetDate = new Date(this.publishedAt)
            let timeBetween = 0
            let years = 0
            let months = 0
            let days = 0
            let hours = 0
            let minutes = 0
            let seconds = 0
            let actual = ''

            tweetDate.setHours(tweetDate.getHours() + 2)

            timeBetween = Math.abs(today.getTime() - tweetDate.getTime()) / 1000

            years = Math.floor(timeBetween / 31557600)
            timeBetween -= years * 31557600

            months = Math.floor(timeBetween / 2592000)
            timeBetween -= months * 2592000

            days = Math.floor(timeBetween / 86400)
            timeBetween -= days * 86400

            hours = Math.floor(timeBetween / 3600) % 24
            timeBetween -= hours * 3600

            minutes = Math.floor(timeBetween / 60) % 60
            timeBetween -= minutes * 60

            seconds = Math.round(timeBetween % 60)

            actual = years ? `${years}a` : months ? `${months}m` : days ? `${days}g` : hours ? `${hours}h` : minutes ? `${minutes}min` : seconds ? `${seconds}s` : '1s'

            return actual
        },
        update() {
            document.addEventListener("visibilitychange", () => {
                document.visibilityState === "visible" ? this.current = this.calc() : null
            })
        }
    }
}
</script>

<style scoped>
.slide-fade-enter-active {
    transition: all 200ms ease;
}
.slide-fade-leave-active {
    transition: all 300ms cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to {
    transform: translateX(10px);
    opacity: 0;
}
</style>
