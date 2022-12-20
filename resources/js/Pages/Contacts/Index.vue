<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import FlashMessage from '@/Components/FlashMessage.vue';
import dayjs from 'dayjs'

defineProps({
    contacts: Object
});

window.addEventListener('click', function () {
    let column_no = 0; //今回クリックされた列番号
    let column_no_prev = 0; //前回クリックされた列番号
    document.querySelectorAll('#sort_table th').forEach(elm => {
        elm.onclick = function () {
            column_no = this.cellIndex; //クリックされた列番号
            let table = this.parentNode.parentNode.parentNode;
            let sortType = 0; //0:数値 1:文字
            let sortArray = new Array; //クリックした列のデータを全て格納する配列
            for (let r = 1; r < table.rows.length; r++) {
                //行番号と値を配列に格納
                let column = new Object;
                column.row = table.rows[r];
                column.value = table.rows[r].cells[column_no].textContent;
                sortArray.push(column);
                //数値判定
                if (isNaN(Number(column.value))) {
                    sortType = 1; //値が数値変換できなかった場合は文字列ソート
                }
            }
            if (sortType == 0) { //数値ソート
                if (column_no_prev == column_no) { //同じ列が2回クリックされた場合は降順ソート
                    sortArray.sort(compareNumberDesc);
                } else {
                    sortArray.sort(compareNumber);
                }
            } else { //文字列ソート
                if (column_no_prev == column_no) { //同じ列が2回クリックされた場合は降順ソート
                    sortArray.sort(compareStringDesc);
                } else {
                    sortArray.sort(compareString);
                }
            }
            //ソート後のTRオブジェクトを順番にtbodyへ追加（移動）
            let tbody = this.parentNode.parentNode;
            for (let i = 0; i < sortArray.length; i++) {
                tbody.appendChild(sortArray[i].row);
            }
            //昇順／降順ソート切り替えのために列番号を保存
            if (column_no_prev == column_no) {
                column_no_prev = -1; //降順ソート
            } else {
                column_no_prev = column_no;
            }
        };
    });
});
//数値ソート（昇順）
function compareNumber(a, b) {
    return a.value - b.value;
}
//数値ソート（降順）
function compareNumberDesc(a, b) {
    return b.value - a.value;
}
//文字列ソート（昇順）
function compareString(a, b) {
    if (a.value < b.value) {
        return -1;
    } else {
        return 1;
    }
    return 0;
}
//文字列ソート（降順）
function compareStringDesc(a, b) {
    if (a.value > b.value) {
        return -1;
    } else {
        return 1;
    }
    return 0;
}

</script>

<style>
#sort_table {
    border-collapse: collapse;
}

#sort_table td {
    border: 1px solid lightgray;
}

#sort_table th {
    cursor: pointer;
    background-color: lightgray;
}
</style>

<template>
    <Head title="お問い合わせ管理一覧" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                お問い合わせ管理一覧
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
                                    <table id="sort_table">
                                        <thead>
                                            <tr>
                                                <th class="px-4 py-3 title-font font-medium text-gray-900 text-sm bg-gray-100">名前▼</th>
                                                <th class="px-4 py-3 title-font font-medium text-gray-900 text-sm bg-gray-100">会社名▼</th>
                                                <th class="px-4 py-3 title-font font-medium text-gray-900 text-sm bg-gray-100">内容▼</th>
                                                <th class="px-4 py-3 title-font font-medium text-gray-900 text-sm bg-gray-100">受信日▼</th>
                                            </tr>
                                        </thead>
                                        <tbody v-for="contact in contacts" :key="contact.id">
                                            <tr>
                                                <!-- <td class="px-4 py-3"> -->
                                                    <!-- <Link class="text-blue-400" :href="route('contacts.show', { contact: contact.id })">
                                                        {{ contact.id }}
                                                    </Link> -->
                                                <!-- </td> -->
                                                <td class="px-4 py-3">{{ contact.name }}</td>
                                                <td class="px-4 py-3">{{ contact.company }}</td>
                                                <td class="px-4 py-3">{{ contact.content }}</td>
                                                <td class="px-4 py-3">{{ dayjs(contact.created_at).format('YYYY-MM-DD HH:mm:ss') }}</td>
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
