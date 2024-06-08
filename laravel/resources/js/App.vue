<script setup>
import { ref, computed } from 'vue';
import { routes } from './composable/routes';
import TheNav from "./components/TheNav.vue";

const navLinks = {
  '#carte': routes['#carte'],
  '#sentiers': routes['#sentiers'],
  '#accueil': routes['#accueil'],
  '#favoris': routes['#favoris'],
  '#profil': routes['#profil']
};

const currentPath = ref(window.location.hash || '#accueil');
updateCurrentPath();

function updateCurrentPath() {
  const path = window.location.hash;
  currentPath.value = routes[path] ? path : '#accueil';
}

window.addEventListener('hashchange', updateCurrentPath);

const currentView = computed(() => {
  return routes[currentPath.value].component;
});

const showNav = computed(() => {
  return currentPath.value in navLinks || currentPath.value == '#historique';
});
</script>

<template>
  <component :is="currentView" />
  <TheNav v-if="showNav" :routes="navLinks" :currentPath="currentPath" />
</template>

<style>
@import url('https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&display=swap');
@import url('../css/multiselect.css');

:root {
  background: #fffaf5;
}

html,
body {
  margin: 0;
  padding: 0;
  height: 100%;
  width: 100%;
  font-family: "Arimo", sans-serif;
  font-optical-sizing: auto;
  font-weight: 400;
  font-style: normal;
  overflow: hidden;
}

.arimo-normal {
  font-family: "Arimo", sans-serif;
  font-optical-sizing: auto;
  font-weight: 400;
  font-style: normal;
}

.scrollable {
  overflow-y: scroll;
  max-height: 100vh;
}

.close {
    position: absolute;
    width: 1.5rem;
    height: 1.5rem;
    margin: 3vh 0 0 80vw;
}
</style>