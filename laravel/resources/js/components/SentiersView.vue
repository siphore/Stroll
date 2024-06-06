<script setup>
import Filtres from "./Filtres.vue";
import { ref } from "vue";
import { filters } from "../composable/thematiques.js";
import Vignette from "./Vignette.vue";

const activeFilter = ref("Populaires");

function createRoute() {
    window.location.hash = "#ajout-1";
}

function redirectToFilters() {
    window.location.hash = "#filtres"
}
</script>

<template>
    <main>
        <div id="home">
            <!-- Logo -->
            <!-- <img src="../../svg/logo.svg" class="logo" alt="Logo application"> -->

            <!-- Search box -->
            <div class="search-container">
                <input type="text" class="search" placeholder="Rechercher">
                <img src="../../svg/magnifying-glass.svg" alt="Rechercher" class="search-icon">
                <img src="../../svg/filter.svg" alt="Afficher filtres" class="filter-icon" @click="redirectToFilters">
            </div>

            <!-- Filters -->
            <div class="filter-menu">
                <Filtres :filters="filters" v-model:activeFilter="activeFilter" />
            </div>

            <!-- Content -->
            <h2 class="title">{{ filters[activeFilter] }}</h2>
            <div class="scrollable">
                <Vignette />
            </div>
            <div class="add-route-container">
                <svg @click="createRoute" class="add-route" width="38" height="38" viewBox="0 0 38 38" fill="none"
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
#home {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 0 3vw;
    max-height: 100vh;
    overflow: hidden;
}

/* Logo */
.logo {
    margin: 5vh 0;
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
}

.search-icon,
.filter-icon {
    position: absolute;
    left: 2vw;
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
    margin: 0 0 3vh 0;
}

/* Filters */
.filter-menu {
    display: flex;
    overflow-x: scroll;
    max-width: 100vw;
    scrollbar-width: none;
    justify-self: end;
    margin-bottom: 5vh;
}

.filter-menu ul {
    display: flex;
    gap: 2vw;
    margin: 0 3vw;
    padding: 0;
    color: #254A3D;
    font-weight: bold;
}

.filter-menu ul>* {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    padding: 1.5vh 4vw;
    width: fit-content;
    background: #A1C9BB;
    box-shadow: 0px 1px 2px rgba(16, 24, 40, 0.05);
    border-radius: 8px;
    cursor: pointer;
    text-wrap: nowrap;
}

.filter-menu.show {
    display: flex;
}

/* Add route */
.add-route-container {
    display: flex;
    justify-content: end;
    width: 100vw;
    margin: 0 5vw 11vh 0;
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
