<template>
    <div id="map"></div>
</template>

<script setup>
import { onMounted } from 'vue';
import { loadMap } from '../composable/map.js';

onMounted(() => {
    loadMap();
})
</script>