<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'

const form = reactive({
    id: null,
    name: null,
    email: null,
    content: null,
    company: null,
    work: [],
    member: 1,
    status: 2,
})
const storeContact = () => {
    Inertia.post('/contacts', form)
}
</script>
<template>
<Head title="お問い合わせフォーム" />
<section class="text-gray-600 body-font relative">

        <div class="md:w-1/2 bg-white flex flex-col md:ml-auto w-full md:mr-auto mt-8 md:mt-0">
            <h1>お問い合わせフォーム</h1>
            <form @submit.prevent="storeContact">
                <input type="hidden" name="id" id="id" v-model="form.id">
                <input type="hidden" name="status" id="status" v-model="form.status">
                <input type="hidden" name="member" id="member" v-model="form.member">
                <div class="relative mb-4">
                    <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                    <input type="text" id="name" name="name" v-model="form.name" class="w-full bg-white rounded border border-gray-300 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <!-- @TODO checkboxの検証する・・・v-modelのform.workが同じ場合はすべてにチェックが入る。案カラムを分ける。 -->
                <div class="relative mb-4">
                    <label for="work" class="leading-7 text-sm text-gray-600">Work</label>
                    <label for="work1" class="ml-10 mr-3 leading-7 text-sm text-gray-600">営業</label>
                    <input type="checkbox" id="work1" name="work1[]" v-model="form.work" class="mr-3 bg-white rounded border border-gray-300 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 text-base outline-none text-gray-700 leading-8 transition-colors duration-200 ease-in-out" value="1">
                    <label for="work1" class="ml-10 mr-3 leading-7 text-sm text-gray-600">エンジニア</label>
                    <input type="checkbox" id="work2" name="work2[]" v-model="form.work" class="mr-3 bg-white rounded border border-gray-300 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 text-base outline-none text-gray-700 leading-8 transition-colors duration-200 ease-in-out" value="2">
                    <label for="work1" class="ml-10 mr-3 leading-7 text-sm text-gray-600">デザイナー</label>
                    <input type="checkbox" id="work3" name="work3[]" v-model="form.work" class="mr-3 bg-white rounded border border-gray-300 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 text-base outline-none text-gray-700 leading-8 transition-colors duration-200 ease-in-out" value="3">
                </div>
                <div class="relative mb-4">
                    <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                    <input type="email" id="email" name="email" v-model="form.email" class="w-full bg-white rounded border border-gray-300 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <div class="relative mb-4">
                    <label for="company" class="leading-7 text-sm text-gray-600">company</label>
                    <input type="company" id="company" name="company" v-model="form.company" class="w-full bg-white rounded border border-gray-300 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <div class="relative mb-4">
                    <label for="content" class="leading-7 text-sm text-gray-600">Message</label>
                    <textarea id="content" name="content" v-model="form.content" class="w-full bg-white rounded border border-gray-300 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                </div>
                <button class="text-white bg-pink-500 border-0 py-2 px-6 focus:outline-none hover:bg-pink-600 rounded text-lg">送信する</button>
            </form>
        </div>
</section>
</template>
