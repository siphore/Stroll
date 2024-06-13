<template>
  <div class="slider">
    <component :is="currentPageComponent" />
    <div class="pagination-container">
  <button
    v-for="(page, index) in pages"
    :key="index"
    @click="currentPage = index"
    :class="{ active: currentPage === index }"
    :style="{ backgroundColor: button1Color, borderRadius: '17px' }"
  >
    {{ index + 1 }}
  </button>
</div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import Bienvenue1 from './Bienvenue1.vue';
import Bienvenue2 from './Bienvenue2.vue';
import Bienvenue3 from './Bienvenue3.vue';

const components = {
  Bienvenue1,
  Bienvenue2,
  Bienvenue3
};

const currentPage = ref(0);
const pages = ref([1, 2, 3]); // Ajustez selon le nombre de pages
const button1Color = ref(['#CD9349', '#295D38', '#99442A']);
const currentPageComponent = computed(() => components[`Bienvenue${pages.value[currentPage.value]}`]);

const backgroundImagePaths = {
  bienvenue1: '../../../resources/img/launch1.jpg',
  bienvenue2: '../../../resources/img/launch2.jpg',
  bienvenue3: '../../../resources/img/launch3.jpg'
};
const currentBackgroundImage = computed(() => backgroundImagePaths[pages.value[currentPage.value]]);

</script>


<style scoped>
.pagination-container {
  display: flex;
  justify-content: center;
  gap: 10px; /* Ajustez selon vos besoins */
}

button.active {
  background-color: var(--button1-color); /* Utilisez une variable CSS si possible */
  border-radius: 17px;
}
</style>
