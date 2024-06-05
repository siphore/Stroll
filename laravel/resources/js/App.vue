<script setup>
import { ref, computed, onMounted } from 'vue';
import MapView from "./components/MapView.vue";
import SentiersView from "./components/SentiersView.vue";
import HomeView from "./components/HomeView.vue";
import StarredView from "./components/StarredView.vue";
import ProfileView from "./components/ProfileView.vue";
import TheNav from './components/TheNav.vue';
import AddRoute_1 from './components/AddRoute_1.vue';
import AddRoute_2 from './components/AddRoute_2.vue';
import AddRoute_3 from './components/AddRoute_3.vue';
import AddRoute_4 from './components/AddRoute_4.vue';
import AddRoute_5 from './components/AddRoute_5.vue';
import AddRoute_6 from './components/AddRoute_6.vue';
import FiltresView from './components/FiltresView.vue';
import HistoryView from './components/HistoryView.vue';

const routes = {
  '#carte': {
    component: MapView,
    label: 'Cartes',
  },
  '#sentiers': {
    component: SentiersView,
    label: 'Sentiers',
  },
  '#accueil': {
    component: HomeView,
    label: 'Accueil',
  },
  '#favoris': {
    component: StarredView,
    label: 'Enregistré',
  },
  '#profil': {
    component: ProfileView,
    label: 'Profil',
  },
  '#ajout-1': {
    component: AddRoute_1,
  },
  '#ajout-2': {
    component: AddRoute_2,
  },
  '#ajout-3': {
    component: AddRoute_3,
  },
  '#ajout-4': {
    component: AddRoute_4,
  },
  '#ajout-5': {
    component: AddRoute_5,
  },
  '#ajout-6': {
    component: AddRoute_6,
  },
  '#filtres': {
    component: FiltresView,
  },
  '#historique': {
    component: HistoryView,
  },
}

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
  return currentPath.value in navLinks;
});
</script>

<template>
  <component :is="currentView" />
  <TheNav v-if="showNav" :routes="navLinks" :currentPath="currentPath" />
</template>

<style>
@import url('https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&display=swap');
@import url('../css/multiselect.css');

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

.close {
    position: absolute;
    width: 1.5rem;
    height: 1.5rem;
    margin: 3vh 0 0 80vw;
}
</style>