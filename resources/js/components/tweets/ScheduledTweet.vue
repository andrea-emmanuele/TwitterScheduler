<template>
    <div ref="scheduledTweet" class="border-b border-gray py-3 px-3 hover:bg-gray-50 transition">
        <p class="text-sm text-gray-500 flex">
            <svg viewBox="0 0 24 24" aria-hidden="true" class="w-5 h-5 fill-current mr-2.5">
                <g>
                    <path d="M-37.9 18c-.1-.1-.1-.1-.1-.2.1 0 .1.1.1.2z"></path>
                    <path d="M-37.9 18c-.1-.1-.1-.1-.1-.2.1 0 .1.1.1.2zM18 2.2h-1.3v-.3c0-.4-.3-.8-.8-.8-.4 0-.8.3-.8.8v.3H7.7v-.3c0-.4-.3-.8-.8-.8-.4 0-.8.3-.8.8v.3H4.8c-1.4 0-2.5 1.1-2.5 2.5v13.1c0 1.4 1.1 2.5 2.5 2.5h2.9c.4 0 .8-.3.8-.8 0-.4-.3-.8-.8-.8H4.8c-.6 0-1-.5-1-1V7.9c0-.3.4-.7 1-.7H18c.6 0 1 .4 1 .7v1.8c0 .4.3.8.8.8.4 0 .8-.3.8-.8v-5c-.1-1.4-1.2-2.5-2.6-2.5zm1 3.7c-.3-.1-.7-.2-1-.2H4.8c-.4 0-.7.1-1 .2V4.7c0-.6.5-1 1-1h1.3v.5c0 .4.3.8.8.8.4 0 .8-.3.8-.8v-.5h7.5v.5c0 .4.3.8.8.8.4 0 .8-.3.8-.8v-.5H18c.6 0 1 .5 1 1v1.2z"></path>
                    <path d="M15.5 10.4c-3.4 0-6.2 2.8-6.2 6.2 0 3.4 2.8 6.2 6.2 6.2 3.4 0 6.2-2.8 6.2-6.2 0-3.4-2.8-6.2-6.2-6.2zm0 11c-2.6 0-4.7-2.1-4.7-4.7s2.1-4.7 4.7-4.7 4.7 2.1 4.7 4.7c0 2.5-2.1 4.7-4.7 4.7z"></path>
                    <path d="M18.9 18.7c-.1.2-.4.4-.6.4-.1 0-.3 0-.4-.1l-3.1-2v-3c0-.4.3-.8.8-.8.4 0 .8.3.8.8v2.2l2.4 1.5c.2.2.3.6.1 1z"></path>
                </g>
            </svg>
            Verrà inviato il {{ `${dateTime.dayName} ${dateTime.day} ${dateTime.month} ${dateTime.year} alle ${dateTime.hours}:${dateTime.minutes}` }}
        </p>
        <p class="break-all" v-html="payload.message"></p>
        <div v-if="payload.media_path" class="h-72 my-5">
            <img :src="payload.media_path" class="h-full w-full object-cover rounded-xl" />
        </div>
    </div>
</template>

<script>
export default {
    name: "Tweet",
    props: {
        payload: Object
    },
    data() {
        return {
            months: [
                {
                    name: 'Gennaio',
                    days: 31
                },
                {
                    name: 'Febbraio',
                    days: 28
                },
                {
                    name: 'Marzo',
                    days: 31
                },
                {
                    name: 'Aprile',
                    days: 30
                },
                {
                    name: 'Maggio',
                    days: 31
                },
                {
                    name: 'Giugno',
                    days: 30
                },
                {
                    name: 'Luglio',
                    days: 31
                },
                {
                    name: 'Agosto',
                    days: 31
                },
                {
                    name: 'Settembre',
                    days: 30
                },
                {
                    name: 'Ottobre',
                    days: 31
                },
                {
                    name: 'Novembre',
                    days: 30
                },
                {
                    name: 'Dicembre',
                    days: 31
                }],
            days: ['Dom','Lun', 'Mar', 'Mer', 'Gio', 'Ven', 'Sab'],
            dateTime: {
                month: '',
                dayName: '',
                day: 0,
                year: 0,
                hours: 0,
                minutes: 0
            }
        }
    },
    created() {
        this.getExistingDateTime()
    },
    updated() {
        this.getExistingDateTime()
    },
    mounted() {
        this.$refs.scheduledTweet.classList.add('fade-in')
    },
    methods: {
        getExistingDateTime() {
            const date = new Date(this.payload.published_at)
            date.setHours(date.getHours() + 2)

            this.dateTime.month = this.months[date.getMonth()].name
            this.dateTime.dayName = this.days[date.getDay()]
            this.dateTime.day = date.getDate()
            this.dateTime.year = date.getFullYear()
            date.getHours() < 10 ? this.dateTime.hours = `0${date.getHours()}` : this.dateTime.hours = date.getHours()
            date.getMinutes() < 10 ? this.dateTime.minutes = `0${date.getMinutes()}` : this.dateTime.minutes = date.getMinutes()
        }
    }
}
</script>

<style lang="scss" scoped>
.avatar {
    transition: all 200ms ease-in-out;

    &:hover {
         filter: brightness(85%);
     }
}

.fade-in {
    animation: fade-in 600ms ease-in-out;
}

@keyframes fade-in {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}
</style>
