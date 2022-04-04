<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

const props = defineProps({
  tweets : {
    type : Array,
    default : []
  }
})
</script>

<template>
    <AppLayout title="Tweets">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Liste des tweets
            </h2>
        </template>

          <div class="py-12">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div v-for="tweet in props.tweets" v-bind:key="tweet.id" class="flex items-center space-x-4 bg-white overflow-hidden rounded rounded-b-none border-b-2 border-gray-200 py-6 px-4">
                    <img class="h-16 w-16 object-cover rounded-full" :src="tweet.user.profile_photo_url">
                    <div class="flex flex-col w-2/3">
                    <div>
                        <a class="text-sm text-gray-900 font-bold hover:text-blue-400" href="#">
                            {{ tweet.user.name }}
                        </a>
                        <span class="font-thin text-gray-400">· le {{ tweet.created_at }}</span>
                    </div>
                    <div class="text-sm text-gray-400 font-thin">{{ tweet.content }}</div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
