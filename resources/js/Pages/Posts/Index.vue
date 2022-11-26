<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import FlashMessage from '@/Components/FlashMessage.vue';
import dayjs from 'dayjs'

defineProps({
    posts: Array
})

</script>

<template>
    <Head title="投稿一覧" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                投稿一覧
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <section class="text-gray-600 body-font">
                            <div class="container px-5 py-24 mx-auto">
                                <FlashMessage />
                                <div class="flex pl-4 my-4 lg:w-2/3 w-full mx-auto">
                                    <Link as="button" :href="route('posts.create')" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">新規投稿</Link>
                                </div>
                                <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                                    <table class="table-auto w-full text-left whitespace-no-wrap">
                                        <thead>
                                            <tr>
                                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">ID</th>
                                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">タイトル</th>
                                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">内容</th>
                                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">投稿日</th>
                                            </tr>
                                        </thead>
                                        <tbody v-for="post in posts" :key="post.id">
                                            <tr>
                                                <td class="px-4 py-3">
                                                    <Link class="text-blue-400" :href="route('posts.show', { post: post.id })">
                                                        {{ post.id }}
                                                    </Link>
                                                </td>
                                                <td class="px-4 py-3">{{ post.title }}</td>
                                                <td class="px-4 py-3">{{ post.content }}</td>
                                                <td class="px-4 py-3">{{ dayjs(post.created_at).format('YYYY-MM-DD HH:mm:ss') }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
