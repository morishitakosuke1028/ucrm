<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import FlashMessage from '@/Components/FlashMessage.vue';
defineProps({
    users: Array
})
</script>

<template>
    <Head title="ユーザー一覧" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                ユーザー一覧
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <section class="text-gray-600 body-font">
                            <div class="container px-5 py-24 mx-auto">
                                <FlashMessage />

                                <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                                    <table class="table-auto w-full text-left whitespace-no-wrap">
                                        <thead>
                                            <tr>
                                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl"></th>
                                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">名前</th>
                                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">所属</th>
                                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="user in users" :key="user.id">
                                                <span v-if="user.id === 1">
                                                    <td class="px-4 py-3">
                                                        <Link as="button" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg" :href="route('users.show', { user: user.id })">
                                                        編集する
                                                        </Link>
                                                    </td>
                                                </span>
                                                    <td class="px-4 py-3">{{ user.name }}</td>
                                                    <td class="px-4 py-3">
                                                        <span v-if="user.member === '1'">営業</span>
                                                        <span v-if="user.member === '2'">システムエンジニア</span>
                                                        <span v-if="user.member === '3'">マークアップエンジニア</span>
                                                    </td>
                                                    <td class="px-4 py-3">{{ user.email }}</td>
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
