<template>
    <div class="slider">
      <component :is="currentPageComponent" />
      <div class="pagination">
        <button
          v-for="(page, index) in pages"
          :key="index"
          @click="currentPage = index"
          :class="{ active: currentPage === index }"
          :style="buttonStyle(index)"
        ></button>
      </div>
    </div>
  </template>
  
  <script>
  import Launch1 from './Launch1.vue';
  import Launch2 from './Launch2.vue';
  import Launch3 from './Launch3.vue';
  
  export default {
    components: {
      Launch1,
      Launch2,
      Launch3
    },
    data() {
      return {
        currentPage: 0,
        pages: ['Launch1', 'Launch2', 'Launch3'],
        colors: ['#CD9349', '#295D38', '#99442A'] // Colors for each page
      };
    },
    computed: {
      currentPageComponent() {
        return this.pages[this.currentPage];
      }
    },
    methods: {
      buttonStyle(index) {
        return {
          backgroundColor: this.colors[index]
        };
      }
    }
  };
  </script>
  
  <style scoped>
  .slider {
    width: 430px;
    height: 932px;
    overflow: hidden;
    position: relative;
  }
  
  .pagination {
    display: flex;
    padding: 12px;
    justify-content: center;
    align-items: center;
    gap: 16px;
    border-radius: 6px;
    backdrop-filter: blur(4px);
    background: var(--Sentier-3, #FFFAF5);
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
  }
  
  .pagination button {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: none;
    cursor: pointer;
  }
  
  .pagination button.active {
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
  }
  </style>
  