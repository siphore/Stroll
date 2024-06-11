<script setup>
import { ref, inject, onMounted, computed } from "vue";
import Vignette from "./Vignette.vue";
import { runs, fetchRuns } from '../composable/fetchRuns.js';
import { types, fetchTypes } from '../composable/fetchTypes.js';
import QuickFiltres from "./QuickFiltres.vue";

const searchInput = ref("");
const activeFilter = ref(null);

const searchFilter = computed(() => {
    if (!searchInput.value) return runs.value;
    return runs.value?.filter((run) => run.name.toLowerCase().includes(searchInput.value.toLowerCase()));
});

const filterType = computed(() => {
    if (!activeFilter.value || !activeFilter.value.id) return searchFilter.value;
    return searchFilter.value?.filter((run) => run.type_id === activeFilter.value.id);
});

const filteredRuns = computed(() => filterType.value);

const isAuthenticated = inject('isAuthenticated');
const user = inject('user');

function createRoute() {
    window.location.hash = "#ajout-1";
}

function redirectToFilters() {
    window.location.hash = "#filtres";
}

onMounted(async () => {
    await fetchRuns();
    await fetchTypes();
    activeFilter.value = types.value[0];
});
</script>

<template>
    <main>
        <div id="home">
            <!-- Search bar -->
            <div class="search-container">
                <input type="text" v-model="searchInput" class="search" placeholder="Rechercher">
                <img src="../../svg/magnifying-glass.svg" alt="Rechercher" class="search-icon">
                <img src="../../svg/filter.svg" alt="Afficher filtres" class="filter-icon" @click="redirectToFilters">
            </div>

            <!-- Filters -->
            <div class="filter-menu">
                <QuickFiltres :types="types" v-model:activeFilter="activeFilter" />
            </div>

            <!-- Content -->
            <h2 class="title">{{ activeFilter?.descr }}</h2>
            <div class="scrollable">
                <ul class="cards">
                    <li v-for="run in filteredRuns" :key="run.id" class="card-item">
                        <Vignette :run="run" />
                    </li>
                </ul>
            </div>
            <div class="add-route-container" v-if="isAuthenticated && user?.isAdmin">
                <svg @click="createRoute" class="add-route" width="38" height="38" viewBox="0 0 38 38" fill="white"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M19 12.3335V25.6668M12.3333 19.0002H25.6667M35.6667 19.0002C35.6667 28.2049 28.2048 35.6668 19 35.6668C9.79526 35.6668 2.33334 28.2049 2.33334 19.0002C2.33334 9.79542 9.79526 2.3335 19 2.3335C28.2048 2.3335 35.6667 9.79542 35.6667 19.0002Z"
                        stroke="#CD9349" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
        </div>
    </main>
</template>

<style scoped>
@import url('../../css/vignette.css');

#home {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 0 3vw;
    max-height: 100vh;
    overflow: hidden;
}

.scrollable {
    z-index: 1;
}

/* Search box */
.search-container {
    display: flex;
    align-items: center;
    position: relative;
    margin: 3vh 0;
}

.search {
    box-sizing: border-box;
    width: 90vw;
    height: 5vh;
    border: 1px solid #254A3D;
    border-radius: 15px;
    padding-left: 10vw;
    font-size: 4vw;
    z-index: 1;
}

.search-icon,
.filter-icon {
    position: absolute;
    left: 2vw;
    z-index: 1;
}

.search-icon {
    width: 6vw;
    height: 6vw;
}

.filter-icon {
    left: 88%;
    width: 8vw;
    height: 8vw;
}

/* Title */
.title {
    font-family: 'Arimo';
    font-style: normal;
    font-weight: 700;
    font-size: 24px;
    line-height: 28px;
    color: #254A3D;
    align-self: start;
}

/* Filters */
.filter-menu {
    display: flex;
    overflow-x: scroll;
    max-width: 100vw;
    scrollbar-width: none;
    justify-self: end;
    margin-bottom: 5vh;
    flex-shrink: 0;
    z-index: 1;
}

/* Add route */
.add-route-container {
    position: absolute;
    display: flex;
    justify-content: end;
    align-items: end;
    width: 100vw;
    height: 100vh;
}

.add-route {
    padding: 0 1rem 6.5rem 0;
    z-index: 1;
    cursor: pointer;
}

/* Desktop */
@media (min-width: 1000px) {
    .search {
        width: 50vw;
        font-size: 1.5vw;
        padding-left: 4vw;
    }

    .search-icon,
    .filter-icon {
        left: 1vw;
        width: 2vw;
        height: 2vw;
    }

    .filter-icon {
        left: 95%;
    }
}
</style>
