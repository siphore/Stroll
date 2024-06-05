<template>
    <div>
        <canvas id="monthlyHikesChart"></canvas>
    </div>
</template>

<script setup>
import { onMounted } from 'vue';
import { Chart } from 'chart.js/auto';

const labels = ["Janv", "Févr", "Mars", "Avr", "Mai", "Juin", "Juil", "Août", "Sept", "Oct", "Nov", "Déc"];
const data = {
    labels: labels,
    datasets: [{
        label: 'Nombre de balades',
        data: [4, 2, 4, 3, 4, 4, 4, 3, 4, 3, 5, 4], // Remplacez ces valeurs par les données réelles
        backgroundColor: 'rgba(37, 74, 61, 0.5)',
        borderColor: '#254A3D',
        borderWidth: 1
    }]
};

const config = {
    type: 'bar',
    data: data,
    options: {
        scales: {
            y: {
                beginAtZero: true,
                max: 6
            }
        }
    }
};

onMounted(() => {
    const ctx = document.getElementById('monthlyHikesChart').getContext('2d');
    new Chart(ctx, config);
});
</script>

<style scoped>
#monthlyHikesChart {
    max-width: 100%;
    height: auto;
}
</style>
