<template>
    <div class="container">
        <form @submit.prevent="handleSubmit">
            <div class="form-group">
                <label for="duration">Durée (minutes)</label>
                <input type="text" id="duration" v-model="formStore.duration" placeholder="72" required />
            </div>

            <ListeFiltres :form="formStore" />

            <div class="buttons">
                <button type="submit" class="btn-primary">Suivant</button>
                <button type="button" class="btn-secondary" @click="handleBack">Retour</button>
            </div>
        </form>
    </div>
</template>

<script setup>
import { inject } from 'vue';
import 'vue-multiselect/dist/vue-multiselect.css';
import ListeFiltres from './ListeFiltres.vue';

const formStore = inject('formStore');

const handleSubmit = () => {
    console.log(formStore);
    window.location.hash = '#ajout-3';
};

const handleBack = () => {
    window.history.back();
};
</script>

<style scoped>
@import url('../../css/filtres.css');
</style>
