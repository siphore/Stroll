<script setup>
import Filtres from "./Filtres.vue";
import { onMounted } from "vue";

const filters = {
    "Tout": "Tous les sentiers",
    "Populaires": "Sentiers les plus populaires",
    "Ville": "Sentiers de ville",
    "Forêt": "Sentiers de forêt",
    "Monuments": "Sentiers de monuments",
    "Gastronomie": "Sentiers de gastronomie",
    "Architecture": "Sentiers d'architecture",
};

function loadFiltersText() {
    const allFilters = document.querySelectorAll(".liste-filtres li");
    const filterKeys = Object.keys(filters);
    let counter = 0;
    allFilters.forEach((filter) => {
        filter.textContent = filterKeys[counter++];
    })
}

function handleClick() {
    const allFilters = document.querySelectorAll(".liste-filtres li");
    document.addEventListener("click", (e) => {
        if (e.target.nodeName == "LI") {
            allFilters.forEach((filter) => {
                filter.classList.remove("active");
            })
            e.target.classList.add("active");

            const filter = e.target.textContent;
            const title = document.querySelector(".title");
            title.textContent = filters[`${filter}`];
        }
    })
}

function handleDisplay() {
    const filterButton = document.querySelector(".filter-icon");
    const filterMenu = document.querySelector(".filter-menu");

    filterButton.addEventListener("click", function () {
        filterMenu.classList.toggle("show");
    });
}

onMounted(() => {
    loadFiltersText();
    handleClick();
    handleDisplay();
})
</script>

<template>
    <main>
        <div id="home">
            <!-- Logo -->
            <img src="../../svg/logo.svg" class="logo" alt="Application logo">

            <!-- Search box -->
            <div class="search-container">
                <input type="text" class="search" placeholder="Rechercher">
                <img src="../../svg/magnifying-glass.svg" alt="Loupe" class="search-icon">
                <img src="../../svg/filter.svg" alt="Afficher filtres" class="filter-icon">
            </div>

            <!-- Filters -->
            <div class="filter-menu">
                <Filtres />
            </div>

            <!-- Content -->

            <h2 class="title">{{ filters.Populaires }}</h2>
        </div>
    </main>
</template>

<style scoped>
#home {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 0 3vw;
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
    margin: 0;
}

/* Filters */
.filter-menu {
    display: none;
    overflow-x: scroll;
    max-width: 100vw;
    scrollbar-width: none;
    cursor: pointer;
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
}

.show {
    display: flex;
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