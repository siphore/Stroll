<template>
    <div class="container">
        <img class="close" src="../../svg/close.svg" alt="Fermer le menu" @click="redirectToSentiers">
        <h1><img class="icon filter" src="../../svg/filter-simple.svg"> Filtres</h1>
        <sub>Sélectionner les filtres de recherche</sub>

        <form @submit.prevent="handleSubmit">
            <div class="form-group">
                <label for="radius">Rayon de recherche</label>
                <input type="range" id="radius" v-model="form.radius" min="0" max="80" />
                <div class="range-values">
                    <span>0 Km</span>
                    <span>{{ form.radius }} Km</span>
                    <span>80 Km</span>
                </div>
            </div>

            <!-- <div class="form-group">
                <select id="theme" v-model="form.theme" required>
                    <option value="" disabled>Thématiques</option>
                    <option v-for="(filter) in filteredFilters">
                        {{ `Sentier ${filter[0]}` }}
                    </option>
                </select>
            </div> -->

            <ListeFiltres :form="form" />
        </form>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import 'vue-multiselect/dist/vue-multiselect.css';
import ListeFiltres from './ListeFiltres.vue';

const form = ref({
    radius: 0,
    theme: '',
    level: [],
    season: [],
    public: [],
    accessibility: [],
    equipment: [],
    district: [],
});

const handleSubmit = () => {
    // Handle form submission
    console.log(form.value);
};

const handleBack = () => {
    // Handle back action
    window.history.back();
};

function redirectToSentiers() {
    window.location.hash = '#sentiers';
}
</script>

<style scoped>
@import url('../../css/filtres.css');

.icon.filter {
    width: 1.5rem;
    height: 1.5rem;
}
</style>
