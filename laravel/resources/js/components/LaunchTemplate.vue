<template>
    <div class="launch-page">
      <div class="image" :style="backgroundImageStyle"></div>
      <h1 class="title">{{ title }}</h1>
      <p class="description">{{ description }}</p>
      <div class="buttons">
        <button class="button" :style="{ backgroundColor: button1Color, color: button1TextColor }" @click="redirect(button1Url)">{{ button1Text }}</button>
        <button class="button" :style="{ backgroundColor: button2Color, color: button2TextColor }" @click="redirect(button2Url)">{{ button2Text }}</button>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      backgroundImage: String,
      title: String,
      description: String,
      button1Text: String,
      button2Text: String,
      button1Color: {
        type: String,
        default: '#295D38'
      },
      button2Color: {
        type: String,
        default: '#295D38'
      },
      button1TextColor: {
        type: String,
        default: '#CD9349'
      },
      button2TextColor: {
        type: String,
        default: '#FFFFFF'
      },
      button1Url: {
        type: String,
        default: '#'
      },
      button2Url: {
        type: String,
        default: '#'
      }
    },
    computed: {
      backgroundImageStyle() {
        return `linear-gradient(0deg, rgba(0, 0, 0, 0.50) 0%, rgba(0, 0, 0, 0.50) 100%), url(${this.backgroundImage}) lightgray 50% / cover no-repeat`;
      }
    },
    methods: {
      redirect(url) {
        window.location.href = url;
      }
    }
  };
  </script>
  
  <style scoped>
  .launch-page {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: #FFF;
    height: 100%;
    width: 100%;
    background-color: black; /* Optional */
  }
  
  .image {
    width: 100%;
    height: 60%;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
  }
  
  .title {
    align-self: stretch;
    color: #FFF;
    font-family: Arimo;
    font-size: 24px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
    letter-spacing: -0.48px;
  }
  
  .description {
    color: #FFF;
    font-family: Inter;
    font-size: 14px;
    font-style: normal;
    font-weight: 500;
    line-height: 20px;
    display: flex;
    padding: 10px 14px;
    justify-content: center;
    align-items: center;
    gap: 4px;
    align-self: stretch;
  }
  
  .buttons {
    display: flex;
    gap: 10px;
    padding: 10px 14px;
  }
  
  .button {
    border-radius: 8px;
    color: #FFF;
    font-family: Inter;
    font-size: 14px;
    font-style: normal;
    font-weight: 600;
    line-height: 20px;
    padding: 10px 20px;
    box-shadow: 0px 1px 2px 0px rgba(16, 24, 40, 0.05);
    cursor: pointer;
  }
  </style>
  