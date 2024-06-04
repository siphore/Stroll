<script setup>
import Multiselect from 'vue-multiselect';
import { defineProps } from 'vue';

const props = defineProps({
    form: Object
});

const levels = [
    { name: "Facile" },
    { name: "Moyen" },
    { name: "Difficile" }
];

const seasons = [
    { name: "Printemps" },
    { name: "Été" },
    { name: "Automne" },
    { name: "Hiver" },
];

const publicOptions = [
    { name: "Famille" },
    { name: "Scolaire" },
    { name: "Sénior" },
];

const accessibilities = [
    { name: "Mobilité réduite" },
    { name: "Poussettes" },
    { name: "Chiens bienvenus" },
    { name: "Parking gratuit" },
    { name: "Accès en transport public" },
];

const equipments = [
    { name: "Banc" },
    { name: "Table de pique-nique" },
    { name: "Toilette" },
    { name: "Place de feu" },
    { name: "Place de jeu" },
];

const districts = [
    { name: "Aigle" },
    { name: "Broye-Vully" },
    { name: "Gros-de-Vaud" },
    { name: "Jura-Nord vaudois" },
    { name: "Lausanne" },
    { name: "Lavaux-Oron" },
    { name: "Morges" },
    { name: "Nyon" },
    { name: "Ouest Lausannois" },
    { name: "Riviera-Pays-d'Enhaut" },
];

// Define custom labels for French
const customLabels = {
    addOption: "Ajouter l'option",
    noResults: "Aucun résultat trouvé",
    noOptions: "Aucune option disponible",
    search: "Rechercher",
    selected: "Sélectionné",
    deselectLabel: "Désélectionner",
    selectLabel: "Sélectionner"
};
</script>

<template>
    <div class="form-group">
        <multiselect v-model="form.theme" :options="levels" :multiple="true" :close-on-select="false"
            label="name" track-by="name">
            <template #placeholder>
                <img src="../../svg/thematiques.svg" class="icon"> Thématiques
            </template>
        </multiselect>
    </div>

    <div class="form-group">
        <multiselect v-model="form.levels" :options="levels" :multiple="true" :close-on-select="false" label="name"
            track-by="name" :labels="customLabels">
            <template #placeholder>
                <img src="../../svg/niveau.svg" class="icon"> Niveau
            </template>
        </multiselect>
    </div>

    <div class="form-group">
        <multiselect v-model="form.season" :options="seasons" :multiple="true" :close-on-select="false" label="name"
            track-by="name" :labels="customLabels">
            <template #placeholder>
                <img src="../../svg/saison.svg" class="icon"> Saison
            </template>
        </multiselect>
    </div>

    <div class="form-group">
        <multiselect v-model="form.public" :options="publicOptions" :multiple="true" :close-on-select="false"
            placeholder="Public" label="name" track-by="name" :labels="customLabels">
            <template #placeholder>
                <img src="../../svg/public.svg" class="icon"> Public
            </template>
        </multiselect>
    </div>

    <div class="form-group">
        <multiselect v-model="form.accessibility" :options="accessibilities" :multiple="true" :close-on-select="false"
            placeholder="Accessibilité (facultatif)" label="name" track-by="name" :labels="customLabels">
            <template #placeholder>
                <img src="../../svg/accessibilite.svg" class="icon"> Accessibilité (facultatif)
            </template>
        </multiselect>
    </div>

    <div class="form-group">
        <multiselect v-model="form.equipment" :options="equipments" :multiple="true" :close-on-select="false"
            placeholder="Équipement" label="name" track-by="name" :labels="customLabels">
            <template #placeholder>
                <img src="../../svg/equipement.svg" class="icon"> Équipement
            </template>
        </multiselect>
    </div>

    <div class="form-group">
        <multiselect v-model="form.district" :options="districts" :multiple="true" :close-on-select="false"
            placeholder="District" label="name" track-by="name" :labels="customLabels">
            <template #placeholder>
                <img src="../../svg/district.svg" class="icon"> District
            </template>
        </multiselect>
    </div>
</template>

<style scoped>
@import url('../../css/filtres.css');
@import url('../../css/multiselect.css');
</style>
