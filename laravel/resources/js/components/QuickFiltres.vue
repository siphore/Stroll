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
    gap: .7rem;
    margin: 0 3vw;
    padding: 0;
    color: #254A3D;
    font-weight: bold;
}

.liste-filtres li {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 1rem 2rem;
    width: fit-content;
    background: #A1C9BB;
    box-shadow: 0px 1px 2px rgba(16, 24, 40, 0.05);
    border-radius: 8px;
    cursor: pointer;
    text-wrap: nowrap;
}

.liste-filtres li.active {
    background: #254A3D;
    color: white;
}
</style>
