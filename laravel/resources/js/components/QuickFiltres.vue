<template>
    <ul class="liste-filtres">
        <li v-for="type in types" :key="type.id" :class="{ active: type === activeFilter }"
            @click="setActiveFilter(type)">
            {{ type.name }}
        </li>
    </ul>
</template>

<script setup>
import { defineProps, defineEmits } from 'vue';

const props = defineProps({
    types: Array,
    activeFilter: Object,
});

const emit = defineEmits(['update:activeFilter']);

function setActiveFilter(filter) {
    emit('update:activeFilter', filter);
}
</script>

<style scoped>
.liste-filtres {
    display: flex;
    gap: 10px;
    padding: 0;
    margin: 0;
    list-style-type: none;
}

.liste-filtres li {
    padding: 10px 20px;
    background: #A1C9BB;
    border-radius: 8px;
    cursor: pointer;
}

.liste-filtres li.active {
    background: #254A3D;
    color: white;
}
</style>
