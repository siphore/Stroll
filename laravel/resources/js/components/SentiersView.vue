<script setup>
import Filtres from "./Filtres.vue";
import { ref } from "vue";
import { displayCards } from "../composable/vignette.js";
import { filters } from "../composable/thematiques.js";

const cards = displayCards();
const cardsKeys = Object.keys(cards);
const activeFilter = ref("Populaires");
const isFilterMenuVisible = ref(false);

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
            <img src="../../svg/logo.svg" class="logo" alt="Logo application">

            <!-- Search box -->
            <div class="search-container">
                <input type="text" class="search" placeholder="Rechercher">
                <img src="../../svg/magnifying-glass.svg" alt="Rechercher" class="search-icon">
                <img src="../../svg/filter.svg" alt="Afficher filtres" class="filter-icon" @click="redirectToFilters">
            </div>

            <!-- Filters -->
            <div class="filter-menu" :class="{ show: isFilterMenuVisible }">
                <Filtres :filters="filters" v-model:activeFilter="activeFilter" />
            </div>

            <!-- Content -->
            <h2 class="title">{{ filters[activeFilter] }}</h2>
            <ul class="cards">
                <li v-for="(index) in cardsKeys" :key="index" class="card-item">
                    <div class="card">
                        <div class="card-image"></div>
                        <div class="card-overlay">
                            <div class="card-header">
                                <span><i class="fas fa-exchange-alt"></i> 1km</span>
                                <span><i class="fas fa-clock"></i> 1h00</span>
                                <span><i class="fas fa-mountain"></i> Facile</span>
                            </div>
                            <h3 class="card-title">Sentier des narcisses</h3>
                            <p class="card-location">Châtel-Saint-Denis</p>
                            <div class="card-indicators">
                                <span class="indicator active"></span>
                                <span class="indicator"></span>
                                <span class="indicator"></span>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
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
    overflow-y: auto;
    overflow-x: hidden;
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
    margin-bottom: 3vh;
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

/* Cards */
.cards {
    margin: 0 0 15vh 0;
    padding: 0;
    overflow-x: hidden;
}

.card-item {
    margin: 10px;
    border-radius: 15px;
    overflow: hidden;
    width: 398px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card {
    position: relative;
    width: 100%;
    height: 240px;
    border-radius: 15px;
}

.card-content {
    padding: 10px;
    background: #fff;
    border-radius: 0 0 15px 15px;
}

.card-header {
    display: flex;
    justify-content: space-between;
    font-size: 0.9em;
    color: #666;
}

.card-header span {
    display: flex;
    align-items: center;
}

.card-header i {
    margin-right: 5px;
}

.card-title {
    font-size: 1.2em;
    margin: 10px 0 5px;
}

.card-location {
    font-size: 0.9em;
    color: #999;
}

.card-indicators {
    display: flex;
    justify-content: center;
    margin-top: 10px;
}

.indicator {
    width: 10px;
    height: 10px;
    background: #ccc;
    border-radius: 50%;
    margin: 0 5px;
}

.indicator.active {
    background: #d4a959;
}

.card-image {
    width: 100%;
    height: 100%;
    background-image: url('https://awwway.ch/wp-content/uploads/2017/06/Pleiades_sentier_narcisses_Montreux_7-1024x683.jpg');
    background-size: cover;
    background-position: center;
    z-index: -1;
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
