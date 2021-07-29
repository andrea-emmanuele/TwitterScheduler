import { createStore } from "vuex";

export default createStore({
    state() {
        return {
            urlPath: '',
            tweets: [],
            scheduledTweets: [],
            selectedScheduledTweets: [],
            form: {
                message: '',
                mediaPath: '',
                publishedAt: '',
                userId: null,
                scheduled: {
                    dateTime: {
                        month: '',
                        dayName: '',
                        day: 0,
                        year: 0,
                        hours: 0,
                        minutes: 0,
                        isInvalid: false
                    }
                }
            },
            windowLoading: true,
            isLoading: false,
            onEdit: false
        }
    },
    mutations: {
        setWindowState(state, value) {
            state.windowLoading = value
        },
        setLoadingState(state, value = true) {
            state.isLoading = value
        },
        setOnEditState(state, value) {
            state.onEdit = value
        },
        setUrlPath(state, value) {
            state.urlPath = value
        },
        setTweets(state, payload) {
            state.tweets = payload
        },
        setScheduledTweets(state, payload) {
            state.scheduledTweets = payload
        },
        setSelectedScheduledTweets(state, value) {
            !state.selectedScheduledTweets.includes(value) ? state.selectedScheduledTweets.push(value) : state.selectedScheduledTweets.splice(state.selectedScheduledTweets.indexOf(value), 1)
        },
        setUserID(state, value) {
            state.form.userId = value
        },
        setMessage(state, value) {
            state.form.message = value
        },
        setMediaPath(state, value) {
            state.form.mediaPath = value
        },
        setDateTime(state, payload) {
            state.form.scheduled.dateTime.month = payload.month
            state.form.scheduled.dateTime.dayName = payload.dayName
            state.form.scheduled.dateTime.day = payload.day
            state.form.scheduled.dateTime.year = payload.year
            state.form.scheduled.dateTime.hours = payload.hours
            state.form.scheduled.dateTime.minutes = payload.minutes
            state.form.scheduled.dateTime.isInvalid = payload.isInvalid
        },
        clearForm(state) {
            state.form.message = ''
            this.commit('clearMediaPath')
            this.commit('clearPublishedAt')
            this.commit('clearSchedule')
        },
        clearMediaPath(state) {
            state.form.mediaPath = ''
        },
        clearPublishedAt(state) {
            state.form.publishedAt = ''
        },
        clearSchedule(state) {
            state.form.scheduled.dateTime.month = ''
            state.form.scheduled.dateTime.dayName = ''
            state.form.scheduled.dateTime.day = 0
            state.form.scheduled.dateTime.year = 0
            state.form.scheduled.dateTime.hours = 0
            state.form.scheduled.dateTime.minutes = 0
            state.form.scheduled.dateTime.isInvalid = false
        },
        clearSelectedScheduledTweets() {
            this.commit('deselectAllScheduledTweets')
            this.commit('setOnEditState', false)
        },
        addNewTweet(state, payload) {
            state.tweets.unshift(payload)
        },
        scheduleTweet(state, value) {
            state.form.publishedAt = value
        },
        selectAllScheduledTweets(state) {
            state.selectedScheduledTweets = state.scheduledTweets.map(tweet => tweet.id)
        },
        deselectAllScheduledTweets(state) {
            state.selectedScheduledTweets = []
        },
        removeScheduledTweet(state, payload) {
            payload.data.forEach(id => {
                state.scheduledTweets = state.scheduledTweets.filter(tweet => tweet.id !== id)
            })
        }
    }
})
