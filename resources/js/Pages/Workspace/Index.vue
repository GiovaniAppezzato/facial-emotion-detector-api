<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

import { defineComponent, ref, onMounted } from 'vue';
import { Chart, registerables } from 'chart.js';
import { Pie } from 'vue-chartjs';

const props = defineProps({
    historyOfEmotions: Array,
    workspace: Object,
    summary: Object,
});

Chart.register(...registerables);

const chartData = ref({
    labels: [],
    datasets: [],
});

const chartOptions = ref({
    responsive: true,
    maintainAspectRatio: false,
});

onMounted(() => {
    chartData.value = {
        labels: [
            'Raiva',
            'Nojo',
            'Medo',
            'Felicidade',
            'Tristeza',
            'Surpresa',
            'Neutro',
        ],
        datasets: [
            {
                label: 'Emoções',
                data: [
                    props.summary.angry,
                    props.summary.disgust,
                    props.summary.fear,
                    props.summary.happy,
                    props.summary.sad,
                    props.summary.surprise,
                    props.summary.neutral,
                ],
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#FF6384'],
            },
        ],
    };
});

const formatDateTime = (datetime) => {
    const date = new Date(datetime);
    const hours = date.getHours().toString().padStart(2, '0');
    const minutes = date.getMinutes().toString().padStart(2, '0');
    const seconds = date.getSeconds().toString().padStart(2, '0');
    const formattedDate = date.toLocaleDateString();
    return `${formattedDate} ${hours}:${minutes}:${seconds}`;
};
</script>

<template>
    <Head title="Resumo do workspace" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                {{ workspace.name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg mb-6"
                >
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-8">
                            Resumo geral das emoções ({{ summary.total }} registros)
                        </h3>
                        <div class="chart-container">
                            <Pie :data="chartData" :options="chartOptions" />
                        </div>  
                    </div>
                </div>

                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800">
                            Ultimas emoções registradas
                        </h3>
                    </div>  
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Emoção
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Detectada em
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="emotion in historyOfEmotions" class="bg-white border-b" :key="emotion.id">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ emotion.translated_emotion }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ formatDateTime(emotion.created_at) }}
                                    </td>
                                </tr>
                                <tr v-if="!historyOfEmotions.length">
                                    <td colspan="3" class="px-6 py-4 text-center">
                                        Sem emoções registradas.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
