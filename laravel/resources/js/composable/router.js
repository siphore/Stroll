import { createRouter, createWebHistory } from 'vue-router';
import ProfileView from '../components/ProfileView.vue';
import LoginView from '../components/LoginView.vue';

const routes = [
  { path: '/#profile', component: ProfileView },
  { path: '/login', component: LoginView },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
