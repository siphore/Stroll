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

            <div class="form-group">
                <label for="pdf">PDF de Sentier</label>
                <input type="file" id="pdf" @change="handlePdfUpload" accept="application/pdf" required />
                <p class="file-instructions">Cliquer pour ajouter ou drag and drop<br />PDF</p>
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
    // Handle form submission
    console.log(form.value);
};

const handleBack = () => {
    // Handle back action
    window.history.back();
};
</script>

<style scoped>
.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #FFFAF5;
    border-radius: 8px;
}

h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

select {
    background-color: #ecf7f2;
}

input[type="text"],
textarea,
select {
    width: 100%;
    padding: 8px;
    margin-bottom: 5px;
    border: 1px solid #a1c9bb;
    border-radius: 4px;
    font-size: 16px;
}

input[type="file"] {
    display: block;
    margin-bottom: 5px;
}

.file-instructions {
    font-size: 12px;
    color: #6c757d;
}

.buttons {
    display: flex;
    justify-content: space-between;
}

.btn-primary {
    background-color: #198754;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.btn-primary:hover {
    background-color: #157347;
}

.btn-secondary {
    background-color: #adb5bd;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.btn-secondary:hover {
    background-color: #8b9aa1;
}
</style>