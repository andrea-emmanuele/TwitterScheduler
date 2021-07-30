<template>
    <div class="p-4 flex border-b border-solid border-gray">
        <div class="relative w-12 h-12 rounded-full overflow-hidden" :class="{ avatar: !$store.state.isLoading }">
            <a href="#" :class="{ 'pointer-events-none': $store.state.isLoading}">
                <img :src="profile.avatar_path" :alt="profile.name" class="w-full h-full" :class="{ 'opacity-50':  $store.state.isLoading }">
            </a>
        </div>
        <div class="ml-1 flex-1">
            <div v-show="$store.state.form.publishedAt" class="ml-3">
                <p class="text-sm text-gray-500 flex">
                    <svg viewBox="0 0 24 24" aria-hidden="true" class="w-5 h-5 fill-current mr-2.5">
                        <g>
                            <path d="M-37.9 18c-.1-.1-.1-.1-.1-.2.1 0 .1.1.1.2z"></path>
                            <path d="M-37.9 18c-.1-.1-.1-.1-.1-.2.1 0 .1.1.1.2zM18 2.2h-1.3v-.3c0-.4-.3-.8-.8-.8-.4 0-.8.3-.8.8v.3H7.7v-.3c0-.4-.3-.8-.8-.8-.4 0-.8.3-.8.8v.3H4.8c-1.4 0-2.5 1.1-2.5 2.5v13.1c0 1.4 1.1 2.5 2.5 2.5h2.9c.4 0 .8-.3.8-.8 0-.4-.3-.8-.8-.8H4.8c-.6 0-1-.5-1-1V7.9c0-.3.4-.7 1-.7H18c.6 0 1 .4 1 .7v1.8c0 .4.3.8.8.8.4 0 .8-.3.8-.8v-5c-.1-1.4-1.2-2.5-2.6-2.5zm1 3.7c-.3-.1-.7-.2-1-.2H4.8c-.4 0-.7.1-1 .2V4.7c0-.6.5-1 1-1h1.3v.5c0 .4.3.8.8.8.4 0 .8-.3.8-.8v-.5h7.5v.5c0 .4.3.8.8.8.4 0 .8-.3.8-.8v-.5H18c.6 0 1 .5 1 1v1.2z"></path><path d="M15.5 10.4c-3.4 0-6.2 2.8-6.2 6.2 0 3.4 2.8 6.2 6.2 6.2 3.4 0 6.2-2.8 6.2-6.2 0-3.4-2.8-6.2-6.2-6.2zm0 11c-2.6 0-4.7-2.1-4.7-4.7s2.1-4.7 4.7-4.7 4.7 2.1 4.7 4.7c0 2.5-2.1 4.7-4.7 4.7z"></path><path d="M18.9 18.7c-.1.2-.4.4-.6.4-.1 0-.3 0-.4-.1l-3.1-2v-3c0-.4.3-.8.8-.8.4 0 .8.3.8.8v2.2l2.4 1.5c.2.2.3.6.1 1z"></path>
                        </g>
                    </svg>
                    Verrà inviato il {{ `${$store.state.form.scheduled.dateTime.dayName} ${$store.state.form.scheduled.dateTime.day} ${$store.state.form.scheduled.dateTime.month} ${$store.state.form.scheduled.dateTime.year} alle ${$store.state.form.scheduled.dateTime.hours}:${$store.state.form.scheduled.dateTime.minutes}` }}
                </p>
            </div>
            <form @submit.prevent="submit" enctype="multipart/form-data">
                <tweet-content :user="profile.id"/>
                <div v-if="previewImage" class="relative h-72 pl-3 my-5">
                    <div class="absolute top-2 left-5 bg-black w-8 h-8 rounded-full opacity-75 flex justify-center items-center cursor-pointer hover:opacity-60 transition" @click="removeImage">
                        <svg viewBox="0 0 24 24" aria-hidden="true" class="text-white fill-current h-5 w-5">
                            <g>
                                <path d="M13.414 12l5.793-5.793c.39-.39.39-1.023 0-1.414s-1.023-.39-1.414 0L12 10.586 6.207 4.793c-.39-.39-1.023-.39-1.414 0s-.39 1.023 0 1.414L10.586 12l-5.793 5.793c-.39.39-.39 1.023 0 1.414.195.195.45.293.707.293s.512-.098.707-.293L12 13.414l5.793 5.793c.195.195.45.293.707.293s.512-.098.707-.293c.39-.39.39-1.023 0-1.414L13.414 12z"></path>
                            </g>
                        </svg>
                    </div>
                    <img :src="previewImage" class="h-full w-full object-cover rounded-xl" />
                </div>
                <div class="flex">
                    <div v-show="!$store.state.isLoading" class="actions flex items-center">
                        <div class="action relative w-10 h-10 rounded-full flex justify-center items-center overflow-hidden">
                            <input type="file" class="absolute top-0 w-full h-full opacity-0 cursor-pointer" @change="getPreview">
                            <svg viewBox="0 0 24 24" aria-hidden="true" class="relative text-blue fill-current w-5 h-5 z-20 pointer-events-none">
                                <g>
                                    <path d="M19.75 2H4.25C3.01 2 2 3.01 2 4.25v15.5C2 20.99 3.01 22 4.25 22h15.5c1.24 0 2.25-1.01 2.25-2.25V4.25C22 3.01 20.99 2 19.75 2zM4.25 3.5h15.5c.413 0 .75.337.75.75v9.676l-3.858-3.858c-.14-.14-.33-.22-.53-.22h-.003c-.2 0-.393.08-.532.224l-4.317 4.384-1.813-1.806c-.14-.14-.33-.22-.53-.22-.193-.03-.395.08-.535.227L3.5 17.642V4.25c0-.413.337-.75.75-.75zm-.744 16.28l5.418-5.534 6.282 6.254H4.25c-.402 0-.727-.322-.744-.72zm16.244.72h-2.42l-5.007-4.987 3.792-3.85 4.385 4.384v3.703c0 .413-.337.75-.75.75z"></path>
                                    <circle cx="8.868" cy="8.309" r="1.542"></circle>
                                </g>
                            </svg>
                        </div>
                        <div class="action relative w-10 h-10 rounded-full flex justify-center items-center overflow-hidden cursor-pointer" @click="openModal">
                            <svg viewBox="0 0 24 24" aria-hidden="true" class="relative text-blue fill-current w-5 h-5 z-20 pointer-events-none">
                                <g>
                                    <path d="M-37.9 18c-.1-.1-.1-.1-.1-.2.1 0 .1.1.1.2z"></path>
                                    <path d="M-37.9 18c-.1-.1-.1-.1-.1-.2.1 0 .1.1.1.2zM18 2.2h-1.3v-.3c0-.4-.3-.8-.8-.8-.4 0-.8.3-.8.8v.3H7.7v-.3c0-.4-.3-.8-.8-.8-.4 0-.8.3-.8.8v.3H4.8c-1.4 0-2.5 1.1-2.5 2.5v13.1c0 1.4 1.1 2.5 2.5 2.5h2.9c.4 0 .8-.3.8-.8 0-.4-.3-.8-.8-.8H4.8c-.6 0-1-.5-1-1V7.9c0-.3.4-.7 1-.7H18c.6 0 1 .4 1 .7v1.8c0 .4.3.8.8.8.4 0 .8-.3.8-.8v-5c-.1-1.4-1.2-2.5-2.6-2.5zm1 3.7c-.3-.1-.7-.2-1-.2H4.8c-.4 0-.7.1-1 .2V4.7c0-.6.5-1 1-1h1.3v.5c0 .4.3.8.8.8.4 0 .8-.3.8-.8v-.5h7.5v.5c0 .4.3.8.8.8.4 0 .8-.3.8-.8v-.5H18c.6 0 1 .5 1 1v1.2z"></path><path d="M15.5 10.4c-3.4 0-6.2 2.8-6.2 6.2 0 3.4 2.8 6.2 6.2 6.2 3.4 0 6.2-2.8 6.2-6.2 0-3.4-2.8-6.2-6.2-6.2zm0 11c-2.6 0-4.7-2.1-4.7-4.7s2.1-4.7 4.7-4.7 4.7 2.1 4.7 4.7c0 2.5-2.1 4.7-4.7 4.7z"></path>
                                    <path d="M18.9 18.7c-.1.2-.4.4-.6.4-.1 0-.3 0-.4-.1l-3.1-2v-3c0-.4.3-.8.8-.8.4 0 .8.3.8.8v2.2l2.4 1.5c.2.2.3.6.1 1z"></path>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <div class="flex ml-auto">
                        <div class="h-0 overflow-hidden flex items-center" :class="{ 'h-full': $store.state.form.message && !$store.state.isLoading && noWhitespaceOnly }">
                            <div ref="progress" class="relative w-6 h-6">
                                <svg id="progress" height="100%" style="overflow: visible;" viewBox="0 0 20 20" width="100%">
                                    <circle cx="50%" cy="50%" fill="none" stroke-width="2" r="9" stroke="#EFF3F4"></circle>
                                    <circle ref="spinner" cx="50%" cy="50%" fill="none" stroke-width="2" r="9" stroke="#1DA1F2" stroke-linecap="round"></circle>
                                </svg>
                                <span v-show="remainingChars <= 20" ref="chars" class="text-sm absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 opacity-75">{{ remainingChars }}</span>
                            </div>
                            <div class="h-8 border-r border-solid border-gray-100 mx-3"></div>
                        </div>
                        <button type="submit" class="text-white font-bold bg-blue py-2 px-4 rounded-full flex items-center" :disabled="!canSubmit">
                            <svg v-show="$store.state.isLoading" class="animate-spin mr-2 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span>{{ $store.state.form.publishedAt ? 'Programma' : 'Twitta' }}</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="bg-gray-50 h-2.5"></div>
    <teleport to="body">
        <modal />
        <snackbar v-if="addedScheduled" text="Il tuo tweet è stato programmato con successo." :timeout="5000" @closed="addedScheduled = false" />
    </teleport>
</template>

<script>
import TweetContent from "./TweetContent";
import Modal from "./Modal";
import Snackbar from "./Snackbar";

const axios = require('axios')

export default {
    name: "TweetForm",
    components: { Snackbar, Modal, TweetContent },
    props: {
        user: String
    },
    data() {
        return {
            profile: {},
            previewImage: '',
            open: false,
            addedScheduled: false
        }
    },
    computed: {
        // Calcoliamo i restanti caretteri che l'utente può immettere
        remainingChars() {
            return 320 - this.$store.state.form.message.length
        },
        // Controlliamo che il testo non sia formato da soli spazi
        noWhitespaceOnly() {
            const { message } = this.$store.state.form
            const regex = /[^\s]+/

            return regex.test(message)
        },
        // Effettuiamo vari controlli per abilitare il pulsante di submit del form
        canSubmit() {
            const { message } = this.$store.state.form

            return message && this.noWhitespaceOnly && message !== ' ' && this.remainingChars >= 0 && !this.$store.state.isLoading || this.previewImage
        }
    },
    watch: {
        // Quando il messaaggio cambia aggiorniamo il progresso dello spinner inerente alla lunghezza del testo
        '$store.state.form.message'() {
            this.changeSpinnerProgress()
        }
    },
    created() {
        this.profile = JSON.parse(this.user) // Salviamo i dati dell'utente che ha effettuato il login
        this.$store.commit('setUserID', this.profile.id) // Settiamo l'id dell'utente nel nostro global storage al quale verranno associati i tweet inviati
    },
    mounted() {
        this.setSpinnerInitialState()
    },
    methods: {
        // Chiamata asincrona di tipo POST per salvare nel database il tweet inviato
        async createTweet() {
            const { message, mediaPath, publishedAt, userId } = this.$store.state.form
            const data = new FormData()

            data.append('message', message)
            mediaPath ? data.append('mediaPath', mediaPath) : null
            data.append('publishedAt', publishedAt)
            data.append('userId', userId)

            this.$store.commit('setLoadingState', true)

            return await axios.post('/api/create-tweet', data)
        },
        openModal() {
            if (window.history.replaceState) {
                window.history.replaceState('', '', '/schedule');
            } // Modifichiamo l'url senza aggiornare la pagina
            this.$store.commit('setUrlPath', 'schedule') // Settiamo il pathname dell'url attuale
        },
        // Serve a mostrare l'anteprima dell'immagine o gif selezionata dall'utente
        getPreview(event) {
            const image = event.target.files[0]
            const reader = new FileReader();

            reader.readAsDataURL(image);
            reader.onload = e => {
                this.previewImage = e.target.result
            };

            this.setImage(image)
        },
        // Salva il path dell'immagine
        setImage(image) {
            this.$store.commit('setMediaPath', image)
        },
        // Rimuove l'anteprima dell'immagine
        removeImage() {
            this.previewImage = ''
            this.$store.commit('clearMediaPath')
        },
        setSpinnerInitialState() {
            const length = this.$refs.spinner.getTotalLength() // Otteniamo la lunghezza della svg

            this.$refs.spinner.style.strokeDasharray = length
            this.$refs.spinner.style.strokeDashoffset = length
        },
        // Anima la progress bar circolare quando viene immesso il testo
        changeSpinnerProgress() {
            let svg = document.querySelector('#progress')
            let length = this.$refs.spinner.getTotalLength()

            if (this.remainingChars > 20) {
                this.$refs.progress.classList.remove('w-9', 'h-9')
                this.$refs.progress.classList.add('w-6', 'h-6')
                this.$refs.spinner.style.stroke = '#1da1f2'
                length = this.$refs.spinner.getTotalLength()
            }

            if (this.remainingChars <= 20) {
                this.$refs.progress.classList.remove('w-6', 'h-6')
                this.$refs.progress.classList.add('w-9', 'h-9')
                this.$refs.spinner.style.stroke = '#ffad1f'
                length = this.$refs.spinner.getTotalLength()
            }

            if (this.remainingChars > 0) {
                this.$refs.chars.style.color = '#000'
                const progress = length * (this.$store.state.form.message.length / 320)

                this.$refs.spinner.style.strokeDashoffset = length - progress

                svg.classList.remove('fade-in')
                svg.classList.remove('fade-out')
            }

            if (this.remainingChars < 0) {
                this.$refs.spinner.style.stroke = '#e0245e'
                this.$refs.chars.style.color = '#e0245e'
            }


            if (this.remainingChars < -9) {
                svg.classList.remove('fade-in')
                svg.classList.add('fade-out')
            }
            else if (this.remainingChars > -10) {
                    console.log(this.remainingChars)
                    svg.classList.remove('fade-out')
                    svg.classList.add('fade-in')
            }
        },
        // Effettua la chiamata createTweet ed aggiunge il nuovo tweet alla lista se va a buon fine
        submit() {
            this.previewImage = ''

            this.createTweet()
                .then(response => {
                    this.$store.commit('setLoadingState', false)

                    !this.$store.state.form.publishedAt ? this.$store.commit('addNewTweet', response.data[0]) : this.addedScheduled = true
                    this.$store.commit('clearForm')
            })
            .catch(error => {
                this.$store.commit('setLoadingState', false)
                this.previewImage = this.$store.state.form.mediaPath
            })
        }
    }
}
</script>

<style scoped lang="scss">
.avatar {
    transition: all 200ms ease-in-out;

    &:hover {
       filter: brightness(85%);
    }
}

.actions {
    .action {
        transition: background-color 200ms ease-in-out;

        &:hover {
            background: rgba(29, 161, 242, 0.1);
        }
    }
}

#progress {
    transform: rotateZ(-90deg);
}

button[disabled] {
    opacity: 50%;
    cursor: default;
}

.fade-in {
    animation: fade-in 200ms cubic-bezier(.95,.05,.8,.04);
    animation-fill-mode: forwards;
}

.fade-out {
    animation: fade-out 200ms cubic-bezier(.95,.05,.8,.04);
    animation-fill-mode: forwards;
}

@keyframes fade-in {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes fade-out {
    from {
        opacity: 1;
    }
    to {
        opacity: 0;
    }
}
</style>
