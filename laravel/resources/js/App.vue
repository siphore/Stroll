<script setup>
import { ref, computed } from 'vue';
import HomeView from "./components/HomeView.vue";
import MapView from "./components/MapView.vue";
import ProfileView from "./components/ProfileView.vue";
import TheHeader from './components/TheHeader.vue';
import TheNav from './components/TheNav.vue';

const routes = {
  '#home': {
    component: HomeView,
    label: 'Home',
  },
  '#map': {
    component: MapView,
    label: 'Map',
  },
  '#profile': {
    component: ProfileView,
    label: 'Profile',
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
  <TheHeader>Stroll</TheHeader>
  <TheNav :routes="routes" :currentPath="currentPath" />
  <main>
    <component :is="currentView" />
  </main>
</template>

<style>
body {
  margin: 0;
  padding: 0;
}
</style>