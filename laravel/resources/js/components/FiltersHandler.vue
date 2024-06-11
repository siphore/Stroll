<template>
    <div>
        <FiltresView @apply-filters="setFilters" />
        <Vignette :filters="filters" />
    </div>
</template>

<script setup>
import { ref } from 'vue';
import FiltresView from './FiltresView.vue';
import Vignette from './Vignette.vue';

const filters = ref({});

const setFilters = (newFilters) => {
    filters.value = newFilters;
};
</script>
