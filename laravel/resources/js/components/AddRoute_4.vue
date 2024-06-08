<template>
    <div class="container">
        <h1>Création de Sentier</h1>
        <form @submit.prevent="handleSubmit">
            <div class="form-group">
                <label for="name">Nom de sentier</label>
                <input type="text" id="name" v-model="form.name" placeholder="Entrer le nom du sentier" required />
            </div>

            <div class="form-group">
                <label for="theme">Thématiques</label>
                <select id="theme" v-model="form.theme" required>
                    <option value="" disabled>Thématiques</option>
                    <option v-for="(filter) in filteredFilters">
                        {{ `Sentier ${filter[0]}` }}
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" v-model="form.description" placeholder="Description du sentier"
                    required></textarea>
            </div>

            <div class="form-group">
                <label for="image">Image de sentier</label>
                <input type="file" id="image" @change="handleImageUpload" accept="image/png, image/jpeg" required />
                <p class="file-instructions">Cliquer pour ajouter ou drag and drop<br />PNG ou JPG</p>
            </div>

            <div class="buttons">
                <button type="submit" class="btn-primary">Suivant</button>
                <button type="button" class="btn-secondary" @click="handleBack">Retour</button>
            </div>
        </form>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import { filters } from '../composable/thematiques.js';

const filteredFilters = computed(() => {
    return Object.entries(filters).slice(2);
});

const form = ref({
    name: '',
    theme: '',
    description: '',
    image: null,
});

const handleImageUpload = (event) => {
    const file = event.target.files[0];
    if (file && (file.type === 'image/png' || file.type === 'image/jpeg')) {
        form.value.image = file;
    } else {
        alert('Please upload a valid image file (PNG or JPG).');
    }
};

const handleSubmit = () => {
    // Handle form submission
    console.log(form.value);
};

const handleBack = () => {
    // Handle back action
    window.history.back();
};
</script>

<style scoped>
@import url('../../css/filtres.css');
</style>