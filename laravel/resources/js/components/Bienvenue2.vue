<template>
  <BienvenueTemplate
  :image="currentBackgroundImage"
    title="Filtre les sentiers et les points d'intérêts"
    description="Trouve les promenades adaptées à tes préférences selon les lieux qui t'intéressent le plus sur le chemin."
    button1Text="Effectue une recherche"
    button2Text="Plus tard"
    button1TextColor="#FFFFFF"
    button2TextColor="#295D38"
    button1Color="#295D38"
    button2Color="#FFFFFF"
    button1Url="#sentiers"
    button2Url="#bienvenue-3"
  />
</template>

<script setup>
import BienvenueTemplate from './BienvenueTemplate.vue';
</script>
<style scoped>
.launch-page {
  background: linear-gradient(0deg, rgba(0, 0, 0, 0.35) 0%, rgba(0, 0, 0, 0.20) 100%), url('../../img/launch2.webp') lightgray 50% / cover no-repeat;
  background-position: center;
}
.dot.active {
  background-color: #295D38;
}
</style>
