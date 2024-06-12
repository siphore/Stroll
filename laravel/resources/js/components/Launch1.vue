<template>
    <LaunchTemplate
      backgroundImage="../../img/launch1.jpg"
      title="Découvre la carte de tous les sentiers vaudois"
      description="Explore seul ou à plusieurs, les parcours culturelles de ta région."
      button1Text="Visualise la carte"
      button2Text="Plus tard"
      button1TextColor="#FFFFFF"
      button2TextColor="#CD9349"
      button1Color="#CD9349"
      button2Color="#FFFFFF"
      button1Url="https://vdiscover.ch/#carte"
      button2Url="https://vdiscover.ch/#launch2"
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
  