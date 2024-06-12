<template>
    <LaunchTemplate
      backgroundImage="../../img/launch3.jpg"
      title="Explore le patrimoine vaudois "
      description="Accède à ton tableau de bord et enregistre tous les sentiers à faire absolument."
      button1Text="Identifie-toi"
      button2Text="Plus tard"
      button1TextColor="#FFFFFF"
      button2TextColor="#99442A"
      button1Color="#99442A"
      button2Color="#FFFFFF"
      button1Url="https://vdiscover.ch/login"
      button2Url="https://vdiscover.ch/#accueil"
    />
  </template>
  
  <script>
  import LaunchTemplate from './LaunchTemplate.vue';
  
  export default {
    components: {
      LaunchTemplate
    }
  };
  </script>
  