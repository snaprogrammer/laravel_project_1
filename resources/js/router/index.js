import { createRouter, createWebHistory } from 'vue-router';
import Dashboard from '../Components/Dashboard.vue';
import Content from '../Components/Content.vue';

const routes = [
  { path: '/', name: 'Dashboard', component: Dashboard },
  { path: '/content', name: 'Content', component: Content },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;