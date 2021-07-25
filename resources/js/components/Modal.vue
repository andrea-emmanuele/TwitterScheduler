<template>
    <TransitionRoot as="template" :show="opened">
        <Dialog as="div" static class="fixed inset-y-0 sm:inset-y-12 inset-x-0 z-40" :open="opened">
            <div class="flex items-end justify-center text-center sm:pt-4 sm:px-4 sm:pb-20">
                <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                    <DialogOverlay class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
                </TransitionChild>

                <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                    <div class="w-full sm:w-container">
                        <Tab name="schedule">
                            <div class="w-full h-screen flex flex-col bg-white sm:rounded-lg text-left shadow-xl transform transition-all sm:h-full sm:my-8 sm:inline-block sm:align-middle">
                                <div class="bg-white px-4 pt-5 pb-4 border-b border-gray-100 rounded-t-lg sm:pt-2 sm:pb-1 sm:px-2">
                                    <div class="flex items-center">
                                        <button
                                            class="action relative w-10 h-10 rounded-full mr-3 flex outline-none justify-center items-center overflow-hidden cursor-pointer"
                                            @click="changeUrl('/', '')"
                                        >
                                            <svg viewBox="0 0 24 24" aria-hidden="true" class="relative text-blue fill-current w-6 h-6 z-20 pointer-events-none">
                                                <g>
                                                    <path
                                                        d="M13.414 12l5.793-5.793c.39-.39.39-1.023 0-1.414s-1.023-.39-1.414 0L12 10.586 6.207 4.793c-.39-.39-1.023-.39-1.414 0s-.39 1.023 0 1.414L10.586 12l-5.793 5.793c-.39.39-.39 1.023 0 1.414.195.195.45.293.707.293s.512-.098.707-.293L12 13.414l5.793 5.793c.195.195.45.293.707.293s.512-.098.707-.293c.39-.39.39-1.023 0-1.414L13.414 12z"></path>
                                                </g>
                                            </svg>
                                        </button>
                                        <div class="text-center sm:text-left">
                                            <DialogTitle as="h3" class="text-xl leading-6 font-bold text-gray-900">
                                                Programma
                                            </DialogTitle>
                                        </div>
                                        <div class="ml-auto flex">
                                            <button
                                                v-if="$store.state.form.publishedAt"
                                                class="action relative rounded-full mr-3 flex outline-none justify-center items-center overflow-hidden cursor-pointer"
                                                @click="clearSchedule"
                                            >
                                                <span class="text-blue font-bold py-1 px-4">Cancella</span>
                                            </button>
                                            <button
                                                class="text-white font-bold bg-blue py-1 px-4 rounded-full mr-1 outline-none flex items-center hover:opacity-75 transition disabled:opacity-50"
                                                @click="submit"
                                                :disabled="dateTime.isInvalid"
                                            >
                                                <span>{{ $store.state.form.publishedAt ? 'Aggiorna' : 'Conferma' }}</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="my-3 mx-3">
                                    <p v-show="!dateTime.isInvalid" class="text-sm text-gray-500 flex">
                                        <svg viewBox="0 0 24 24" aria-hidden="true" class="w-5 h-5 fill-current mr-2.5">
                                            <g>
                                                <path d="M-37.9 18c-.1-.1-.1-.1-.1-.2.1 0 .1.1.1.2z"></path>
                                                <path
                                                    d="M-37.9 18c-.1-.1-.1-.1-.1-.2.1 0 .1.1.1.2zM18 2.2h-1.3v-.3c0-.4-.3-.8-.8-.8-.4 0-.8.3-.8.8v.3H7.7v-.3c0-.4-.3-.8-.8-.8-.4 0-.8.3-.8.8v.3H4.8c-1.4 0-2.5 1.1-2.5 2.5v13.1c0 1.4 1.1 2.5 2.5 2.5h2.9c.4 0 .8-.3.8-.8 0-.4-.3-.8-.8-.8H4.8c-.6 0-1-.5-1-1V7.9c0-.3.4-.7 1-.7H18c.6 0 1 .4 1 .7v1.8c0 .4.3.8.8.8.4 0 .8-.3.8-.8v-5c-.1-1.4-1.2-2.5-2.6-2.5zm1 3.7c-.3-.1-.7-.2-1-.2H4.8c-.4 0-.7.1-1 .2V4.7c0-.6.5-1 1-1h1.3v.5c0 .4.3.8.8.8.4 0 .8-.3.8-.8v-.5h7.5v.5c0 .4.3.8.8.8.4 0 .8-.3.8-.8v-.5H18c.6 0 1 .5 1 1v1.2z"></path>
                                                <path
                                                    d="M15.5 10.4c-3.4 0-6.2 2.8-6.2 6.2 0 3.4 2.8 6.2 6.2 6.2 3.4 0 6.2-2.8 6.2-6.2 0-3.4-2.8-6.2-6.2-6.2zm0 11c-2.6 0-4.7-2.1-4.7-4.7s2.1-4.7 4.7-4.7 4.7 2.1 4.7 4.7c0 2.5-2.1 4.7-4.7 4.7z"></path>
                                                <path
                                                    d="M18.9 18.7c-.1.2-.4.4-.6.4-.1 0-.3 0-.4-.1l-3.1-2v-3c0-.4.3-.8.8-.8.4 0 .8.3.8.8v2.2l2.4 1.5c.2.2.3.6.1 1z"></path>
                                            </g>
                                        </svg>
                                        Verrà inviato il {{ `${dateTime.dayName} ${dateTime.day} ${dateTime.month} ${dateTime.year} alle ${dateTime.hours}:${dateTime.minutes}` }}
                                    </p>
                                    <p v-show="dateTime.isInvalid" class="text-sm text-red-500 flex">
                                        <svg viewBox="0 0 32 32" aria-hidden="true" class="w-5 h-5 fill-current mr-2.5"
                                             style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                             preserveAspectRatio="xMidYMid meet">
                                            <g fill="none" stroke="currentColor" stroke-linecap="round"
                                               stroke-linejoin="round" stroke-width="2">
                                                <path d="M16 3l14 26H2zm0 8v8m0 4v2"/>
                                            </g>
                                        </svg>
                                        Non è possibile programmare la condivisione di un tweet nel passato.
                                    </p>
                                </div>
                                <div class="my-4 mx-3 grid grid-cols-4 gap-2 flex items-end">
                                    <Select
                                        title="Data"
                                        :data="months"
                                        :current-data="dateTime.month"
                                        @selected="change('month', $event)"
                                        class="col-span-4 sm:col-span-2"
                                    />
                                    <Select
                                        :key="dateTime.month"
                                        :numbers="monthDays"
                                        :current-data="dateTime.day"
                                        @selected="change('day', $event)"
                                        class="col-span-2 sm:col-span-1"
                                    />
                                    <Select
                                        :data="years"
                                        :current-data="dateTime.year"
                                        @selected="change('year', $event)"
                                        class="col-span-2 sm:col-span-1"
                                    />
                                </div>
                                <div class="my-4 mx-3 grid grid-cols-4 gap-2 flex items-end">
                                    <Select
                                        title="Ora"
                                        :data="hours"
                                        :current-data="dateTime.hours"
                                        @selected="change('hours', $event)"
                                        class="col-span-2 sm:col-span-1"
                                    />
                                    <Select
                                        :data="minutes"
                                        :current-data="dateTime.minutes"
                                        @selected="change('minutes', $event)"
                                        class="col-span-2 sm:col-span-1"
                                    />
                                </div>
                                <div class="px-2 py-3 border-t border-gray mt-auto sm:mt-0">
                                    <button
                                        class="action relative rounded-full mr-3 flex outline-none justify-center items-center overflow-hidden cursor-pointer"
                                        @click="changeUrl('/schedule/tweets', 'scheduledTweets')"
                                    >
                                        <span class="text-blue font-bold py-1 px-4">Tweet programmati</span>
                                    </button>
                                </div>
                            </div>
                        </Tab>
                        <Tab name="scheduledTweets">
                            <div class="w-full h-screen flex flex-col bg-white sm:rounded-lg text-left shadow-xl transform transition-all sm:h-full sm:my-8 sm:inline-block sm:align-middle">
                                <div class="bg-white px-4 pt-5 pb-4 border-b border-gray rounded-t-lg sm:pt-2 sm:pb-1 sm:px-2">
                                    <div class="flex items-center">
                                        <button
                                            class="action relative w-10 h-10 rounded-full mr-3 flex outline-none justify-center items-center overflow-hidden cursor-pointer"
                                            @click="changeUrl('/schedule', 'schedule')"
                                        >
                                            <svg viewBox="0 0 24 24" aria-hidden="true" class="relative text-blue fill-current w-6 h-6 z-20 pointer-events-none">
                                                <g>
                                                    <path d="M20 11H7.414l4.293-4.293c.39-.39.39-1.023 0-1.414s-1.023-.39-1.414 0l-6 6c-.39.39-.39 1.023 0 1.414l6 6c.195.195.45.293.707.293s.512-.098.707-.293c.39-.39.39-1.023 0-1.414L7.414 13H20c.553 0 1-.447 1-1s-.447-1-1-1z"></path>
                                                </g>
                                            </svg>
                                        </button>
                                        <div class="text-center sm:text-left">
                                            <DialogTitle as="h3" class="text-xl leading-6 font-bold text-gray-900">
                                                Tweet non inviati
                                            </DialogTitle>
                                        </div>
                                        <div class="ml-auto">
                                            <button class="text-white font-bold bg-blue py-1 px-4 rounded-full mr-1 outline-none flex items-center hover:opacity-75 transition disabled:opacity-50">
                                                <span>Modifica</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="h-full sm:h-96 overflow-y-auto">
                                    <scheduled-tweets :user="$store.state.form.userId"/>
                                </div>
                                <div class="px-2 py-3 border-t border-gray mt-auto sm:mt-0">
                                    <button
                                        class="action relative rounded-full mr-3 flex outline-none justify-center items-center overflow-hidden cursor-pointer"
                                    >
                                        <span class="text-blue font-bold py-1 px-4">Seleziona tutto</span>
                                    </button>
                                </div>
                            </div>
                        </Tab>
                    </div>
                </TransitionChild>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script>
import { Dialog, DialogOverlay, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import Select from "./Select";
import Tab from "./Tab";
import ScheduledTweets from "./tweets/ScheduledTweets";

export default {
    components: {
        ScheduledTweets,
        Tab,
        Select,
        Dialog,
        DialogOverlay,
        DialogTitle,
        TransitionChild,
        TransitionRoot
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
                minutes: 0,
                isInvalid: false
            },
            today: new Date(),
            opened: false
        }
    },
    computed: {
        numericMonth() {
            return this.months.findIndex(month => month.name === this.dateTime.month)
        },
        monthDays() {
            return this.months.find(month => month.name === this.dateTime.month).days
        },
        years() {
            let actualYear = new Date().getFullYear()
            const years = [];

            for (let i = 0; i < 3; i++) {
                years.push({ name: actualYear++ })
            }

            return years
        },
        hours() {
            const hours = [];

            for (let i = 0; i < 24; i++) {
                i < 10 ? hours.push({ name: '0' + i }) : hours.push({ name: i })
            }

            return hours
        },
        minutes() {
            const minutes = [];

            for (let i = 0; i < 60; i++) {
                i < 10 ? minutes.push({ name: '0' + i }) : minutes.push({ name: i })
            }

            return minutes
        }
    },
    watch: {
        '$store.state.urlPath'() {
            window.location.pathname.includes('/schedule') ? this.opened = true : this.opened = false
        }
    },
    created() {
        this.getActualDateTime()
        this.getDayName()

        if (window.location.pathname.includes('/schedule/tweets')) {
            this.$store.commit('setUrlPath', 'scheduledTweets')
            this.opened = true
            return
        }

        if (window.location.pathname.includes('/schedule')) {
            this.$store.commit('setUrlPath', 'schedule')
            this.opened = true
        }

    },
    updated() {
        if (!this.$store.state.form.publishedAt) {
            this.dateTime.isInvalid = false
            this.getActualDateTime()
            return
        }

        this.getExistingDataTime()
    },
    methods: {
        getActualDateTime() {
            this.dateTime.month = this.months[this.today.getMonth()].name
            this.dateTime.day = this.getTomorrowDay()
            this.dateTime.year = this.today.getFullYear()
            this.today.getHours() < 10 ? this.dateTime.hours = `0${this.today.getHours()}` : this.dateTime.hours = this.today.getHours()
            this.today.getMinutes() < 10 ? this.dateTime.minutes = `0${this.today.getMinutes()}` : this.dateTime.minutes = this.today.getMinutes()
        },
        getExistingDataTime() {
            const { month, dayName, day, year, hours, minutes, isInvalid } = this.$store.state.form.scheduled.dateTime
            this.dateTime.month = month
            this.dateTime.dayName = dayName
            this.dateTime.day = day
            this.dateTime.year = year
            this.dateTime.hours = hours
            this.dateTime.minutes = minutes
            this.dateTime.isInvalid = isInvalid
        },
        getTomorrowDay() {
            const tomorrow = new Date()
            tomorrow.setDate(this.today.getDate() + 1)

            return tomorrow.getDate()
        },
        getDayName() {
            const { day, year } = this.dateTime

            let date = new Date(`${this.numericMonth + 1}/${day}/${year}`)
            this.dateTime.dayName = this.days[date.getDay()]
        },
        change(field, value) {
            this.dateTime[field] = value

            field === 'month' ? this.dateTime.day = 1 : null

            this.getDayName()
            this.checkValidDateTime()
        },
        checkValidDateTime() {
            const { day, year, hours, minutes } = this.dateTime

            const date = new Date(year, this.numericMonth, day, hours, minutes)

            date < this.today ? this.dateTime.isInvalid = true : this.dateTime.isInvalid = false
        },
        clearSchedule() {
            this.$store.commit('clearPublishedAt')
            this.$store.commit('clearSchedule')
            this.changeUrl('/', '')
        },
        changeUrl(url, name) {
            if (window.history.replaceState) {
                window.history.replaceState('', '', url);
            }
            this.$store.commit('setUrlPath', name)
        },
        submit() {
            const { day, year, hours, minutes } = this.dateTime

            this.$store.commit('scheduleTweet', `${year}-${this.numericMonth + 1}-${day} ${hours - 2}:${minutes}:00`)
            this.$store.commit('setDateTime', this.dateTime)
            this.changeUrl('/', '')
        }
    }
}
</script>

<style lang="scss" scoped>
.action {
    transition: background-color 200ms ease-in-out;

    &:hover {
        background: rgba(29, 161, 242, 0.1);
    }
}
button[disabled] {
    cursor: default;
}
</style>
