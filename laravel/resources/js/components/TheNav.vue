<script setup>
import { defineProps, onMounted } from 'vue';

defineProps({
  routes: {
    type: Object,
    required: true,
  },
  currentPath: {
    type: String,
    required: true,
  },
})

const icons = {
  Cartes: `<svg class="icon" viewBox="0 0 26 27" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M9.49992 20.5L1.33325 25.1667V6.50004L9.49992 1.83337M9.49992 20.5L17.6666 25.1667M9.49992 20.5V1.83337M17.6666 25.1667L24.6666 20.5V1.83337L17.6666 6.50004M17.6666 25.1667V6.50004M17.6666 6.50004L9.49992 1.83337" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>`,
  Sentiers: `<svg class="icon" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M10.5 4.5H10.9344C13.9816 4.5 15.5053 4.5 16.0836 5.04729C16.5836 5.52037 16.8051 6.21728 16.6702 6.89221C16.514 7.67302 15.2701 8.55285 12.7823 10.3125L8.71772 13.1875C6.2299 14.9471 4.98599 15.827 4.82984 16.6078C4.69486 17.2827 4.91642 17.9796 5.41636 18.4527C5.99474 19 7.51836 19 10.5656 19H11.5M7 4.5C7 6.15685 5.65685 7.5 4 7.5C2.34315 7.5 1 6.15685 1 4.5C1 2.84315 2.34315 1.5 4 1.5C5.65685 1.5 7 2.84315 7 4.5ZM21 18.5C21 20.1569 19.6569 21.5 18 21.5C16.3431 21.5 15 20.1569 15 18.5C15 16.8431 16.3431 15.5 18 15.5C19.6569 15.5 21 16.8431 21 18.5Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>`,
  Accueil: `<svg class="icon" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path
      d="M21 11C21 16.5228 16.5228 21 11 21M21 11C21 5.47715 16.5228 1 11 1M21 11H19M11 21C5.47715 21 1 16.5228 1 11M11 21V19M1 11C1 5.47715 5.47715 1 11 1M1 11H3M11 1V3M18.0711 18.0711L16.6569 16.6569M5.34315 5.34315L3.92893 3.92893M16.6569 5.34315L18.0711 3.92893M3.92893 18.0711L5.34315 16.6569M7 11L9.5 9.5L11 7L12.5 9.5L15 11L12.5 12.5L11 15L9.5 12.5L7 11Z"
      stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
    </svg>`,
  Enregistré: `<svg class="icon" viewBox="0 0 16 21" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M5 9L7 11L11.5 6.5M15 19.5V6.3C15 4.61984 15 3.77976 14.673 3.13803C14.3854 2.57354 13.9265 2.1146 13.362 1.82698C12.7202 1.5 11.8802 1.5 10.2 1.5H5.8C4.11984 1.5 3.27976 1.5 2.63803 1.82698C2.07354 2.1146 1.6146 2.57354 1.32698 3.13803C1 3.77976 1 4.61984 1 6.3V19.5L8 15.5L15 19.5Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>`,
  Profil: `<svg class="icon" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M1 18.5C3.33579 16.0226 6.50702 14.5 10 14.5C13.493 14.5 16.6642 16.0226 19 18.5M14.5 6C14.5 8.48528 12.4853 10.5 10 10.5C7.51472 10.5 5.5 8.48528 5.5 6C5.5 3.51472 7.51472 1.5 10 1.5C12.4853 1.5 14.5 3.51472 14.5 6Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>`
};

function placeNav() {
  const nav = document.querySelector('nav')
  const navHeight = nav.offsetHeight;
  nav.style.top = `${window.innerHeight - navHeight}px`;
}

onMounted(() => {
  placeNav();
});
</script>

<template>
  <nav>
    <ul>
      <li v-for="(route, key) in routes" :key="key">
        <a :href="key" :class="{ active: key === currentPath }">
          <div v-html="icons[route.label]" class="icon" :class="{ active: key === currentPath }"></div>
          {{ route.label }}
        </a>
      </li>
    </ul>
  </nav>
</template>

<style scoped>
html,
body {
  overflow: hidden;
  overscroll-behavior: none;
}

nav {
  position: absolute;
  width: 100vw;
  background: #FFFAF5;
}

ul {
  display: flex;
  justify-content: space-evenly;
  list-style-type: none;
  padding: 0;
  margin: 0;
  gap: 3vw;
}

a {
  display: flex;
  flex-direction: column;
  align-items: center;
}

a {
  text-decoration: none;
  color: #254A3D;
  font-size: 3vw;
}

a.active {
  font-weight: bold;
  color: #CD9349;
  font-size: 3.5vw;
}

.icon {
  stroke: #254A3D;
}

.icon.active {
  stroke: #CD9349;
}

@media (min-width: 1000px) {
  nav {
    padding: 1rem 0;
    text-align: center;
  }

  .icon>* {
    width: 2vw;
    height: 2vw;
  }

  a {
    font-size: 1vw;
  }

  a.active {
    font-size: 1.2vw;
  }
}

@media (max-width: 1000px) {
  nav {
    padding: 1.5rem 0;
  }

  .icon>* {
    width: 6vw;
    height: 6vw;
  }

  a {
    font-size: 3vw;
  }

  a.active {
    font-size: 3.5vw;
  }
}
</style>