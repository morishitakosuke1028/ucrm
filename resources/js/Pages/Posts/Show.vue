<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia'

defineProps({
    post: Object
})

</script>
<template>
    <Head title="投稿詳細" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                投稿詳細
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <section class="text-gray-600 body-font relative">
                            <div class="container px-5 py-8 mx-auto">
                                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                    <div class="flex flex-wrap -m-2">
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="title" class="leading-7 text-sm text-gray-600">タイトル</label>
                                                <div id="title" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                    {{ post.title }}
                                                </div>
                                            </div>
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="content" class="leading-7 text-sm text-gray-600">内容</label>
                                                    <div id="content" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">
                                                        {{ post.content }}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="p-2 w-full">
                                                <Link as="button" :href="route('posts.edit', { post: post.id })" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">編集する</Link>
                                            </div>
                                            <!-- <div class="mt-20 p-2 w-full">
                                                <button @click="deleteItem(item.id)" class="flex mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">削除する</button>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
