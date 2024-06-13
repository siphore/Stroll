<template>
  <BienvenueTemplate 
   :image="currentBackgroundImage"
    title="Explore le patrimoine vaudois"
    description="Accède à ton tableau de bord et enregistre tous les sentiers à faire absolument."
    button1Text="Identifie-toi"
    button2Text="Plus tard"
    button1TextColor="#FFFFFF"
    button2TextColor="#99442A"
    button1Color="#99442A"
    button2Color="#FFFFFF"
    button1Url="/login"
    button2Url="#accueil"
  />
</template>

<script setup>
import BienvenueTemplate from './BienvenueTemplate.vue';
</script>

<style scoped>
.launch-page {
  background: linear-gradient(0deg, rgba(0, 0, 0, 0.35) 0%, rgba(0, 0, 0, 0.20) 100%), url('../../img/launch3.webp') lightgray 50% / cover no-repeat;
  background-position: center;

}
.dot.active {
  background-color: #99442A;
}
</style>
