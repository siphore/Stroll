<template>
    <div class="container">
        <form @submit.prevent="handleSubmit">
            <div class="form-group">
                <label for="distance">Distance (km)</label>
                <input type="text" id="distance" v-model="form.distance" placeholder="5,1 km" required />
            </div>

            <div class="form-group">
                <label for="duration">Durée (heures)</label>
                <input type="text" id="duration" v-model="form.duration" placeholder="1h" required />
            </div>

            <ListeFiltres :form="form" />

            <div class="buttons">
                <button type="submit" class="btn-primary">Suivant</button>
                <button type="button" class="btn-secondary" @click="handleBack">Retour</button>
            </div>
        </form>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import 'vue-multiselect/dist/vue-multiselect.css';
import ListeFiltres from './ListeFiltres.vue';

const form = ref({
    distance: '',
    duration: '',
    radius: 0,
    level: '',
    season: [],
    public: [],
    accessibility: [],
    equipment: [],
    district: [],
});

const handleSubmit = () => {
    // Handle form submission
    console.log(form.value);
    // Navigate to the next view or handle submission logic
};

const handleBack = () => {
    // Handle back action
    window.history.back();
};
</script>

<style scoped>
@import url('../../css/filtres.css');
</style>
