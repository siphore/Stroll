<template>
  <BienvenueTemplate
  :image="currentBackgroundImage"
  title="Découvre la carte de tous les sentiers vaudois"
    description="Explore seul ou à plusieurs, les parcours culturelles de ta région."
    button1Text="Visualise la carte"
    button2Text="Plus tard"
    button1TextColor="#FFFFFF"
    button2TextColor="#CD9349"
    button1Color="#CD9349"
    button2Color="#FFFFFF"
    button1Url="#carte"
    button2Url="#bienvenue-2"
  />
</template>

<script setup>
import BienvenueTemplate from './BienvenueTemplate.vue';
</script>

<style scoped>
.launch-page {
  background: linear-gradient(0deg, rgba(0, 0, 0, 0.20) 0%, rgba(0, 0, 0, 0.20) 100%), url('../../img/launch1.webp') lightgray 50% / cover no-repeat;
  /* positionner l'image au centre */
  background-position: left;
}
.dot.active {
  background-color: #CD9349;
}

</style>
