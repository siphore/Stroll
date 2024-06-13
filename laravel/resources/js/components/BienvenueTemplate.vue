<template>
  <div class="launch-page">
    <div class ="content">
    <h1 class="title">{{ title }}</h1>
    <p class="description">{{ description }}</p>
    <div class="buttons">
      <button class="button" :style="{ backgroundColor: button1Color, color: button1TextColor }" @click="redirect(button1Url)">{{ button1Text }}</button>
      <button class="button" :style="{ backgroundColor: button2Color, color: button2TextColor }" @click="redirect(button2Url)">{{ button2Text }}</button>
    </div>
  </div>
  <div class="slider">
      <div class="pagination">
        <div class="dot" :class="['dot', { active: currentPage === 1, 'active-color-1': currentPage === 1 }]" @click="changePage(1)"></div>
        <div class="dot" :class="['dot', { active: currentPage === 2, 'active-color-2': currentPage === 2 }]" @click="changePage(2)"></div>
        <div class="dot" :class="['dot', { active: currentPage === 3, 'active-color-3': currentPage === 3 }]" @click="changePage(3)"></div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
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
  data() {
    return {
      currentPage: 1,
      dotColors: ['#CD9349', '#295D38', '#99442A'] // Tableau de couleurs des points
    };
  },
  methods: {
    redirect(url) {
      window.location.href = url;
    },
    changePage(pageNumber) {
      this.currentPage = pageNumber;
      let pageUrl = '';
      switch(pageNumber) {
        case 1:
          pageUrl = '/#bienvenue-1';
          break;
        case 2:
          pageUrl = '/#bienvenue-2';

          break;
        case 3:
          pageUrl = '/#bienvenue-3';
          break;
        default:
          pageUrl = '/';
      }
      window.location.href = pageUrl;
      this.changeColor();
  },
  changeColor() {
    // Mettre à jour la couleur du point actif
    document.querySelectorAll('.dot').forEach((dot, index) => {
      if (index === this.currentPage === 1) {
        dot.classList.add('active-color-1');
      } else if (index === this.currentPage === 2) {
        dot.classList.add('active-color-2');
      } else if (index === this.currentPage === 3) {
        dot.classList.add('active-color-3');
      }
    });



  }
},
};




</script>

<style scoped>


.launch-page {
  display: flex;
  flex-direction: column;
  align-items: left;
  justify-content: left;
  text-align: left;
  color: #FFF;
  height: 932px;
  width: 100%;
  background-image: url('v-bind:image');
  background-size: cover;
  background-position: center;
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
  font-size: 28px;
  font-style: normal;
  padding-left: 24px;
  padding-right: 24px;
  font-weight: 700;
  line-height: normal;
  letter-spacing: -0.48px;
  margin-left: 10% ;
  margin-right:10% ;

}

.description {
  color: #FFF;
  font-family: Inter;
  font-size: 14px;
  font-style: normal;
  font-weight: 500;
  line-height: 20px;
  display: flex;
  padding-left: 24px;
  padding-right: 24px;
  justify-content: left;
  align-self: stretch;
  margin-left: 10% ;
  margin-right:10% ;
}

.buttons {
display: flex;
padding: 10px 14px;
margin-left: 12% ;
margin-right: 12% ;
justify-content: left;
gap: 4px;
align-self: stretch;
border-radius: 8px;
flex-direction: column;
border: none;
box-shadow: none;

}

.button {
  border-radius: 8px;
  color: #FFFAF5;
  font-family: Inter;
  font-size: 14px;
  font-style: normal;
  font-weight: 600;
  line-height: 20px;
  padding: 10px 20px;
  border: none;
  box-shadow: none;
  /* ajouter un espacement entre les boutons */
  margin-top: 10px;
}
  
  .content {
    /* Alligner à gauche en bas */
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    align-items: left;
    margin-top: 100%;

  }
  .slider {
  display: flex;
  justify-content: center;
  margin-top: 20px;
}

.pagination {
  display: flex;
}

.dot {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background-color: #FFFAF5;
  margin: 0 5px;
  cursor: pointer;
}



.active-color-1 {
  background-color: #CD9349;
}

.active-color-2 {
  background-color: #295D38;
}

.active-color-3 {
  background-color: #99442A;
}
</style>
