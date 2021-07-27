<template>
    <div ref="tweet" class="p-4 flex border-b border-solid border-gray">
        <div class="avatar relative w-12 h-12 rounded-full overflow-hidden">
                <a href="#">
                    <img :src="payload.user.avatar_path" :alt="payload.user.name" class="w-full h-full">
                </a>
            </div>
        <div class="ml-5 flex-1">
            <div>
                <a href="#" class="font-bold hover:underline mr-1.5">{{ payload.user.name }}</a>
                <span class="opacity-50 mr-1.5">@{{ payload.user.tag }}</span>
                <Time :published-at="payload.published_at" />
            </div>
            <div class="break-all" v-html="payload.message"></div>
            <div v-if="payload.media_path" class="h-72 my-5">
                <img :src="payload.media_path" class="h-full w-full object-cover rounded-xl" />
            </div>
        </div>
    </div>
</template>

<script>
import Time from "./Time";
export default {
    name: "Tweet",
    components: { Time },
    props: {
        payload: Object
    },
    mounted() {
        this.$refs.tweet.classList.add('fade-in')
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
