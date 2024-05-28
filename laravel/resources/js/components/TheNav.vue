<script setup>
  defineProps({
    routes: {
     type: Object,
     required: true,
    },
    currentPath: {
      type: String,
      required: true,
    },
  })
</script>

<template>
  <nav>
    <ul>
      <li v-for="(route, key) in routes" :key="key">
        <a :href="key" :class="{ active: key === currentPath }">{{ route.label }}</a>
      </li>
    </ul>
  </nav>
</template>

<style scoped>
  nav {
    background-color: #333333d5;
    color: white;
    padding: 1rem;
    text-align: center;
  }
  ul {
    list-style-type: none;
    padding: 0;
  }
  li {
    display: inline;
    margin-right: 1rem;
    padding-right: 1rem;
  }
  li:not(:last-child) {
    border-right: 1px solid white;
  }
  a {
    color: white;
  }
  a.active {
    font-weight: bold;
  }
</style>