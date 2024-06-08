<template>
    <div class="container">
        <h1>Création de Sentier</h1>
        <form @submit.prevent="handleSubmit">
            <div class="form-group">
                <label for="name">Nom du sentier</label>
                <input type="text" id="name" v-model="form.name" placeholder="Entrer le nom du sentier" required />
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" v-model="form.description" placeholder="Description du sentier"
                    required></textarea>
            </div>

            <div class="form-group">
                <label for="image">Image du sentier</label>
                <div class="file-input-wrapper">
                    <input type="file" id="image" @change="handleImageUpload" accept="image/png, image/jpeg" />
                    <div class="upload-icon">
                        <img src="../../svg/upload-icon.svg" alt="Upload Icon">
                    </div>
                    <p class="file-instructions"><span class="highlight">Cliquer pour ajouter</span> ou drag and
                        drop<br />PNG ou JPG</p>
                </div>
            </div>

            <!-- <div class="form-group">
                <label for="image">PDF du Sentier</label>
                <div class="file-input-wrapper">
                    <input type="file" id="image" @change="handlePdfUpload" accept="application/pdf" />
                    <div class="upload-icon">
                        <img src="../../svg/upload-icon.svg" alt="Upload Icon">
                    </div>
                    <p class="file-instructions"><span class="highlight">Cliquer pour ajouter</span> ou drag and
                        drop<br />PDF</p>
                </div>
            </div> -->

            <div class="buttons">
                <button type="submit" class="btn-primary">Suivant</button>
                <button type="button" class="btn-secondary" @click="handleBack">Retour</button>
            </div>
        </form>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const form = ref({
    name: '',
    theme: '',
    description: '',
    image: null,
    pdf: null,
});

const handleImageUpload = (event) => {
    const file = event.target.files[0];
    if (file && (file.type === 'image/png' || file.type === 'image/jpeg')) {
        form.value.image = file;
    } else {
        alert('Please upload a valid image file (PNG or JPG).');
    }
};

const handlePdfUpload = (event) => {
    const file = event.target.files[0];
    if (file && file.type === 'application/pdf') {
        form.value.pdf = file;
    } else {
        alert('Please upload a valid PDF file.');
    }
};

const handleSubmit = () => {
    console.log(form.value);
    window.location.hash = "#ajout-2";
};

const handleBack = () => {
    window.history.back();
};
</script>

<style scoped>
@import url('../../css/filtres.css');
</style>