<script setup>
import { ref, computed } from 'vue';
import MapView from "./components/MapView.vue";
import SentiersView from "./components/SentiersView.vue";
import HomeView from "./components/HomeView.vue";
import StarredView from "./components/StarredView.vue";
import ProfileView from "./components/ProfileView.vue";
import TheNav from './components/TheNav.vue';

const routes = {
  '#carte': {
    component: MapView,
    label: 'Cartes',
  },
  '#sentiers': {
    component: SentiersView,
    label: 'Sentiers',
  },
  '#home': {
    component: HomeView,
    label: 'Accueil',
  },
  '#starred': {
    component: StarredView,
    label: 'Enregistré',
  },
  '#profile': {
    component: ProfileView,
    label: 'Profil',
  }
}

const currentPath = ref(window.location.hash);
updateCurrentPath();

function updateCurrentPath() {
  const path = window.location.hash;
  currentPath.value = routes[path] ? path : '#home';
}

window.addEventListener('hashchange', updateCurrentPath);

const currentView = computed(() => {
  return routes[currentPath.value].component;
})
</script>

<template>
  <main>
    <component :is="currentView" />
  </main>
  <TheNav :routes="routes" :currentPath="currentPath" />
</template>

<style>
@import url('https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&display=swap');

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
}

.arimo-normal {
  font-family: "Arimo", sans-serif;
  font-optical-sizing: auto;
  font-weight: 400;
  font-style: normal;
}
</style>