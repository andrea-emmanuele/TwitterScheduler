import { createStore } from "vuex";

export default createStore({
    state() {
        return {
            urlPath: '',
            tweets: [],
            scheduledTweets: [],
            form: {
                message: '',
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
            isLoading: false
        }
    },
    mutations: {
        setUrlPath(state, value) {
            state.urlPath = value
        },
        setTweets(state, payload) {
            state.tweets = payload
        },
        setScheduledTweets(state, payload) {
            state.scheduledTweets = payload
        },
        addNewTweet(state, payload) {
            state.tweets.unshift(payload)
        },
        scheduleTweet(state, value) {
            state.form.publishedAt = value
        },
        setUserID(state, value) {
            state.form.userId = value
        },
        setMessage(state, value) {
            state.form.message = value
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
            this.commit('clearPublishedAt')
            this.commit('clearSchedule')
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
        setLoadingState(state, value = true) {
            state.isLoading = value
        }
    }
})
