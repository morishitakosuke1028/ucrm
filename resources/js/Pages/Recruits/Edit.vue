<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'
const props = defineProps({
    recruit: Object
})
const form = reactive({
    id: props.recruit.id,
    name: props.recruit.name,
    email: props.recruit.email,
    content: props.recruit.content,
    status: props.recruit.status,
})
const updateRecruit = id => {
    Inertia.put(route('recruits.update', { recruit: id }), form)
}
const deleteRecruit = id => {
    Inertia.delete(route('recruits.destroy', { recruit: id }), {
        onBefore: () => confirm('本当に削除しますか？')
    })
}
</script>

<template>
    <Head title="求人編集" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                求人編集
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <section class="text-gray-600 body-font relative">
                            <form @submit.prevent="updateRecruit(form.id)">
                                <div class="container px-5 py-8 mx-auto">
                                    <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                        <div class="flex flex-wrap -m-2">
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="name" class="leading-7 text-sm text-gray-600">名前</label>
                                                    <input type="text" id="name" name="name" v-model="form.name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" disabled>
                                                </div>
                                            </div>
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="email" class="leading-7 text-sm text-gray-600">メールアドレス</label>
                                                    <input type="text" id="email" name="email" v-model="form.email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" disabled>
                                                </div>
                                            </div>
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="content" class="leading-7 text-sm text-gray-600">お問い合わせ内容</label>
                                                    <textarea id="content" name="content" v-model="form.content" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out" disabled></textarea>
                                                </div>
                                            </div>
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="status" class="leading-7 text-sm text-gray-600 mr-4">ステータス</label>
                                                    <input type="radio" id="status" name="status" v-if="form.status === '2'" v-model="form.status" value="2" checked />
                                                    <input type="radio" id="status" name="status" v-else v-model="form.status" value="2" />
                                                    <label class="ml-2 mr-4">未対応</label>
                                                    <input type="radio" id="status" name="status" v-if="form.status === '1'" v-model="form.status" value="1" checked />
                                                    <input type="radio" id="status" name="status" v-else v-model="form.status" value="1" />
                                                    <label class="ml-2 mr-4">対応済み</label>
                                                </div>
                                            </div>

                                            <div class="p-2 w-full">
                                                <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新する</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="p-2 w-full">
                                <button @click="deleteContact(recruit.id)" class="flex mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">削除する</button>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
