<template>
  <a :href="link" :style="{ backgroundColor: color }" class="custom-button">
    <span class="iconbutton">
      <slot name="icon"></slot>
    </span>
    <img>
    <span class="textbutton">{{ text }}</span>
  </a>
</template>

<script>
export default {
  name: 'CustomButton',
  props: {
    text: {
      type: String,
      required: true
    },
    link: {
      type: String,
      required: true
    },
    color: {
      type: String,
      default: '#254A3D'
    }
  }
};
</script>

<style scoped>
.custom-button {
  display: flex;
  justify-content: center;
  align-items: center;
  /* width: fit-content; */
  margin-bottom: 2rem;
  padding: 1rem 0;
  border-radius: 8px;
  text-decoration: none;
}

.iconbutton {
  width: 24px;
  height: 24px;
  margin-right: .8rem;
}

.textbutton {
  /* font-family: 'Inter'; */
  font-size: 16px;
  color: #FFFAF5;
  font-weight: 600;
  text-decoration: none;
}

.span.textbutton {
  text-decoration: none;
}

.link {
  text-decoration: none;
}
</style>